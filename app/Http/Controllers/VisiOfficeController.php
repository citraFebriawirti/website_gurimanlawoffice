<?php

namespace App\Http\Controllers;

use App\Models\VisiOffice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class VisiOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You Must Login First');
        }

        $data['visi'] = DB::table('tb_visi')->get();

        return view('pages.halaman_admin.visi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You Must Login First');
        }

        return view('pages.halaman_admin.visi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'title_visi' => 'required',
            'status_visi' => 'required',
        ]);

        // Cek apakah sudah ada status 'Aktif'
        if ($request->status_visi == 'Aktif') {
            $countActive = VisiOffice::where('status_visi', 'Aktif')->count();
            if ($countActive > 0) {
                return redirect()->back()->with('error', 'There can only be one data with Active status.');
            }
        }



        $create = VisiOffice::create([
            'id_visi' => VisiOffice::GenerateID(),
            'title_visi' => $request->title_visi,
            'status_visi' => $request->status_visi,

        ]);

        return $create
            ? redirect()->route('visi.index')->with('success', 'Data Added Successfully')
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

        $data['dataById'] = DB::table('tb_visi')->where('id_visi', $id)->first();
        return view('pages.halaman_admin.visi.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'title_visi' => 'required',

            'status_visi' => 'required',
        ]);

        // Cek apakah sudah ada status 'Aktif' selain data yang sedang diupdate
        if ($request->status_visi == 'Aktif') {
            $countActive = VisiOffice::where('status_visi', 'Aktif')
                ->where('id_visi', '!=', $id) // Pastikan tidak menghitung dirinya sendiri
                ->count();
            if ($countActive > 0) {
                return redirect()->back()->with('error', 'There can only be one data with Active status.');
            }
        }


        $dataById = DB::table('tb_visi')->where('id_visi', $id)->first();



        $update = VisiOffice::where('id_visi', $id)->update([
            'title_visi' => $request->title_visi,
            'status_visi' => $request->status_visi,

        ]);

        if ($update) {

            return redirect()->route('visi.index')->with('success', 'Data updated successfully');
        } else {

            return redirect()->route('visi.index')->with('error', 'data failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if (DB::table('tb_visi')->where('id_visi', $id)->delete()) {
            return redirect()->route('visi.index')->with('success', 'Data Delete successfully');
        }

        return redirect()->route('visi.index')->with('error', 'Data Failed to Delete');
    }
}
