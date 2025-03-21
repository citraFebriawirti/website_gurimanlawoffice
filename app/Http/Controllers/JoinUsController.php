<?php

namespace App\Http\Controllers;

use App\Models\JoinUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class JoinUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You Must Login First');
        }

        $data['joinus'] = DB::table('tb_joinus')->get();

        return view('pages.halaman_admin.joinus.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You Must Login First');
        }

        return view('pages.halaman_admin.joinus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'title_joinus' => 'required',
            'status_joinus' => 'required',
        ]);

        // Cek apakah sudah ada status 'Aktif'
        // if ($request->status_joinus == 'Aktif') {
        //     $countActive = joinusOffice::where('status_joinus', 'Aktif')->count();
        //     if ($countActive > 0) {
        //         return redirect()->back()->with('error', 'There can only be one data with Active status.');
        //     }
        // }



        $create = JoinUs::create([
            'id_joinus' => JoinUs::GenerateID(),
            'title_joinus' => $request->title_joinus,
            'status_joinus' => $request->status_joinus,

        ]);

        return $create
            ? redirect()->route('joinus.index')->with('success', 'Data Added Successfully')
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

        $data['dataById'] = DB::table('tb_joinus')->where('id_joinus', $id)->first();
        return view('pages.halaman_admin.joinus.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'title_joinus' => 'required',

            'status_joinus' => 'required',
        ]);

        // Cek apakah sudah ada status 'Aktif' selain data yang sedang diupdate
        // if ($request->status_joinus == 'Aktif') {
        //     $countActive = joinusOffice::where('status_joinus', 'Aktif')
        //         ->where('id_joinus', '!=', $id) // Pastikan tidak menghitung dirinya sendiri
        //         ->count();
        //     if ($countActive > 0) {
        //         return redirect()->back()->with('error', 'There can only be one data with Active status.');
        //     }
        // }


        $dataById = DB::table('tb_joinus')->where('id_joinus', $id)->first();



        $update = JoinUs::where('id_joinus', $id)->update([
            'title_joinus' => $request->title_joinus,
            'status_joinus' => $request->status_joinus,

        ]);

        if ($update) {

            return redirect()->route('joinus.index')->with('success', 'Data updated successfully');
        } else {

            return redirect()->route('joinus.index')->with('error', 'data failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if (DB::table('tb_joinus')->where('id_joinus', $id)->delete()) {
            return redirect()->route('joinus.index')->with('success', 'Data Delete successfully');
        }

        return redirect()->route('joinus.index')->with('error', 'Data Failed to Delete');
    }
}
