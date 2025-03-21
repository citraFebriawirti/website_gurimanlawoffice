<?php

namespace App\Http\Controllers;

use App\Models\Legalitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class LegalitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You Must Login First');
        }

        $data['legalitas'] = DB::table('tb_legalitas')->get();

        return view('pages.halaman_admin.legalitas.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You must login first');
        }

        return view('pages.halaman_admin.legalitas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'title_legalitas' => 'required',
            'description_legalitas' => 'required',
            'image_legalitas' => 'required|mimes:png,jpg,pdf',
            'status_legalitas' => 'required',
        ]);

        // Cek apakah sudah ada status 'Aktif'
        if ($request->status_legalitas == 'Aktif') {
            $countActive = Legalitas::where('status_legalitas', 'Aktif')->count();
            if ($countActive > 0) {
                return redirect()->back()->with('error', 'There can only be one data with Active status.');
            }
        }

        if ($request->hasFile('image_legalitas')) {
            $file = $request->file('image_legalitas');
            $namaFile = Str::uuid() . '.' . $file->getClientOriginalExtension(); // Nama unik
            $file->move(public_path('assets_images/image_legalitas'), $namaFile);

            $path = 'assets_images/image_legalitas/' . $namaFile;
        } else {
            $path = 'default.png';
        }

        $create = legalitas::create([
            'id_legalitas' => legalitas::GenerateID(),
            'title_legalitas' => $request->title_legalitas,
            'description_legalitas' => $request->description_legalitas,
            'status_legalitas' => $request->status_legalitas,
            'image_legalitas' => $path
        ]);

        return $create
            ? redirect()->route('legalitas.index')->with('success', 'Data Added Successfully')
            : redirect()->back()->with('error', 'Data Added Failed');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You must login first');
        }

        $data['dataById'] = DB::table('tb_legalitas')->where('id_legalitas', $id)->first();
        return view('pages.halaman_admin.legalitas.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'title_legalitas' => 'required',
            'description_legalitas' => 'required',
            'status_legalitas' => 'required',
        ]);

        // Cek apakah sudah ada status 'Aktif' selain data yang sedang diupdate
        if ($request->status_legalitas == 'Aktif') {
            $countActive = legalitas::where('status_legalitas', 'Aktif')
                ->where('id_legalitas', '!=', $id) // Pastikan tidak menghitung dirinya sendiri
                ->count();
            if ($countActive > 0) {
                return redirect()->back()->with('error', 'There can only be one data with Active status.');
            }
        }


        $dataById = DB::table('tb_legalitas')->where('id_legalitas', $id)->first();

        if ($request->file('image_legalitas')) {

            $namaFileOri = $request->file('image_legalitas')->getClientOriginalName();

            $request->file('image_legalitas')->move(public_path('assets_images/image_legalitas'), $namaFileOri);

            $namaFile = 'assets_images/image_legalitas/' . $namaFileOri;
        } else {

            $namaFile = $dataById->image_legalitas;
        }

        $update = legalitas::where('id_legalitas', $id)->update([
            'title_legalitas' => $request->title_legalitas,
            'description_legalitas' => $request->description_legalitas,
            'status_legalitas' => $request->status_legalitas,
            'image_legalitas' => $namaFile
        ]);

        if ($update) {

            return redirect()->route('legalitas.index')->with('success', 'Data updated successfully');
        } else {

            return redirect()->route('legalitas.index')->with('error', 'data failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if (DB::table('tb_legalitas')->where('id_legalitas', $id)->delete()) {
            return redirect()->route('legalitas.index')->with('success', 'Data Delete successfully');
        }

        return redirect()->route('legalitas.index')->with('error', 'Data Failed to Delete');
    }
}
