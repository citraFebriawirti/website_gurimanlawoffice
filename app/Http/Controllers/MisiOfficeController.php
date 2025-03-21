<?php

namespace App\Http\Controllers;

use App\Models\MisiOffice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MisiOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You Must Login First');
        }

        $data['misi'] = DB::table('tb_misi')->get();

        return view('pages.halaman_admin.misi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You Must Login First');
        }

        return view('pages.halaman_admin.misi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'title_misi' => 'required',
            'status_misi' => 'required',
        ]);

        // Cek apakah sudah ada status 'Aktif'
        // if ($request->status_misi == 'Aktif') {
        //     $countActive = MisiOffice::where('status_misi', 'Aktif')->count();
        //     if ($countActive > 0) {
        //         return redirect()->back()->with('error', 'There can only be one data with Active status.');
        //     }
        // }



        $create = MisiOffice::create([
            'id_misi' => MisiOffice::GenerateID(),
            'title_misi' => $request->title_misi,
            'status_misi' => $request->status_misi,

        ]);

        return $create
            ? redirect()->route('misi.index')->with('success', 'Data Added Successfully')
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

        $data['dataById'] = DB::table('tb_misi')->where('id_misi', $id)->first();
        return view('pages.halaman_admin.misi.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'title_misi' => 'required',

            'status_misi' => 'required',
        ]);

        // Cek apakah sudah ada status 'Aktif' selain data yang sedang diupdate
        // if ($request->status_misi == 'Aktif') {
        //     $countActive = misiOffice::where('status_misi', 'Aktif')
        //         ->where('id_misi', '!=', $id) // Pastikan tidak menghitung dirinya sendiri
        //         ->count();
        //     if ($countActive > 0) {
        //         return redirect()->back()->with('error', 'There can only be one data with Active status.');
        //     }
        // }


        $dataById = DB::table('tb_misi')->where('id_misi', $id)->first();



        $update = misiOffice::where('id_misi', $id)->update([
            'title_misi' => $request->title_misi,
            'status_misi' => $request->status_misi,

        ]);

        if ($update) {

            return redirect()->route('misi.index')->with('success', 'Data updated successfully');
        } else {

            return redirect()->route('misi.index')->with('error', 'data failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if (DB::table('tb_misi')->where('id_misi', $id)->delete()) {
            return redirect()->route('misi.index')->with('success', 'Data Delete successfully');
        }

        return redirect()->route('misi.index')->with('error', 'Data Failed to Delete');
    }
}