<?php

namespace App\Http\Controllers;

use App\Models\NameOffice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class NameOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You Must Login First');
        }

        $data['NameOffice'] = DB::table('tb_nameoffice')->get();

        return view('pages.halaman_admin.nameoffice.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You must login first');
        }

        return view('pages.halaman_admin.nameoffice.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'title_nameoffice' => 'required',
            'image_nameoffice' => 'required|mimes:png,jpg',
            'status_nameoffice' => 'required',
        ]);

        // Cek apakah sudah ada status 'Aktif'
        if ($request->status_nameoffice == 'Aktif') {
            $countActive = NameOffice::where('status_nameoffice', 'Aktif')->count();
            if ($countActive > 0) {
                return redirect()->back()->with('error', 'There can only be one data with Active status.');
            }
        }

        if ($request->hasFile('image_nameoffice')) {
            $file = $request->file('image_nameoffice');
            $namaFile = Str::uuid() . '.' . $file->getClientOriginalExtension(); // Nama unik
            $file->move(public_path('assets_images/image_nameoffice'), $namaFile);

            $path = 'assets_images/image_nameoffice/' . $namaFile;
        } else {
            $path = 'default.png';
        }

        $create = NameOffice::create([
            'id_nameoffice' => NameOffice::GenerateID(),
            'title_nameoffice' => $request->title_nameoffice,
            'status_nameoffice' => $request->status_nameoffice,
            'image_nameoffice' => $path
        ]);

        return $create
            ? redirect()->route('nameoffice.index')->with('success', 'Data Added Successfully')
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

        $data['dataById'] = DB::table('tb_nameoffice')->where('id_nameoffice', $id)->first();
        return view('pages.halaman_admin.nameoffice.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'title_nameoffice' => 'required',
            'status_nameoffice' => 'required',
        ]);

        // Cek apakah sudah ada status 'Aktif' selain data yang sedang diupdate
        if ($request->status_nameoffice == 'Aktif') {
            $countActive = NameOffice::where('status_nameoffice', 'Aktif')
                ->where('id_nameoffice', '!=', $id) // Pastikan tidak menghitung dirinya sendiri
                ->count();
            if ($countActive > 0) {
                return redirect()->back()->with('error', 'There can only be one data with Active status.');
            }
        }


        $dataById = DB::table('tb_nameoffice')->where('id_nameoffice', $id)->first();

        if ($request->file('image_nameoffice')) {

            $namaFileOri = $request->file('image_nameoffice')->getClientOriginalName();

            $request->file('image_nameoffice')->move(public_path('assets_images/image_nameoffice'), $namaFileOri);

            $namaFile = 'assets_images/image_nameoffice/' . $namaFileOri;
        } else {

            $namaFile = $dataById->image_nameoffice;
        }

        $update = NameOffice::where('id_nameoffice', $id)->update([
            'title_nameoffice' => $request->title_nameoffice,
            'status_nameoffice' => $request->status_nameoffice,
            'image_nameoffice' => $namaFile
        ]);

        if ($update) {

            return redirect()->route('nameoffice.index')->with('success', 'Data updated successfully');
        } else {

            return redirect()->route('nameoffice.index')->with('error', 'data failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if (DB::table('tb_nameoffice')->where('id_nameoffice', $id)->delete()) {
            return redirect()->route('nameoffice.index')->with('success', 'Data Delete successfully');
        }

        return redirect()->route('nameoffice.index')->with('error', 'Data Failed to Delete');
    }
}
