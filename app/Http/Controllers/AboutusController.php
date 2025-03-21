<?php

namespace App\Http\Controllers;

use App\Models\Aboutus;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AboutusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You Must Login First');
        }

        $data['aboutus'] = DB::table('tb_aboutus')->get();

        return view('pages.halaman_admin.aboutus.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You must login first');
        }

        return view('pages.halaman_admin.aboutus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'description_aboutus' => 'required',
            'status_aboutus' => 'required',
        ]);

        // Cek apakah sudah ada status 'Aktif'
        if ($request->status_aboutus == 'Aktif') {
            $countActive = Aboutus::where('status_aboutus', 'Aktif')->count();
            if ($countActive > 0) {
                return redirect()->back()->with('error', 'There can only be one data with Active status.');
            }
        }


        $create = Aboutus::create([
            'id_aboutus' => Aboutus::GenerateID(),
            'description_aboutus' => $request->description_aboutus,
            'status_aboutus' => $request->status_aboutus,

        ]);

        return $create
            ? redirect()->route('aboutus.index')->with('success', 'Data Added Successfully')
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
            return redirect('/login')->with('error', 'anda harus login terlebih dahulu');
        }

        $data['dataById'] = DB::table('tb_aboutus')->where('id_aboutus', $id)->first();
        return view('pages.halaman_admin.aboutus.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([

            'description_aboutus' => 'required',

            'status_aboutus' => 'required',
        ]);

        // Cek apakah sudah ada status 'Aktif' selain data yang sedang diupdate
        if ($request->status_aboutus == 'Aktif') {
            $countActive = Aboutus::where('status_aboutus', 'Aktif')
                ->where('id_aboutus', '!=', $id) // Pastikan tidak menghitung dirinya sendiri
                ->count();
            if ($countActive > 0) {
                return redirect()->back()->with('error', 'There can only be one data with Active status.');
            }
        }


        $dataById = DB::table('tb_aboutus')->where('id_aboutus', $id)->first();



        $update = aboutus::where('id_aboutus', $id)->update([
            'id_aboutus' => aboutus::GenerateID(),

            'description_aboutus' => $request->description_aboutus,

            'status_aboutus' => $request->status_aboutus,

        ]);

        if ($update) {

            return redirect()->route('aboutus.index')->with('success', 'Data updated successfully');
        } else {

            return redirect()->route('aboutus.index')->with('error', 'data failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if (DB::table('tb_aboutus')->where('id_aboutus', $id)->delete()) {
            return redirect()->route('aboutus.index')->with('success', 'Data Delete successfully');
        }

        return redirect()->route('aboutus.index')->with('error', 'Data Failed to Delete');
    }
}