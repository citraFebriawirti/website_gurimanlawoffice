<?php

namespace App\Http\Controllers;

use App\Models\Email;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You Must Login First');
        }

        $data['email'] = DB::table('tb_email')->get();

        return view('pages.halaman_admin.email.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You must login first');
        }

        return view('pages.halaman_admin.email.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'name_email' => 'required',
            'status_email' => 'required',
        ]);

        // Cek apakah sudah ada status 'Aktif'
        if ($request->status_email == 'Aktif') {
            $countActive = Email::where('status_email', 'Aktif')->count();
            if ($countActive > 0) {
                return redirect()->back()->with('error', 'There can only be one data with Active status.');
            }
        }



        $create = email::create([
            'id_email' => email::GenerateID(),
            'name_email' => $request->name_email,
            'status_email' => $request->status_email,

        ]);

        return $create
            ? redirect()->route('email.index')->with('success', 'Data Added Successfully')
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

        $data['dataById'] = DB::table('tb_email')->where('id_email', $id)->first();
        return view('pages.halaman_admin.email.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'name_email' => 'required',
            'status_email' => 'required',

        ]);

        // Cek apakah sudah ada status 'Aktif' selain data yang sedang diupdate
        if ($request->status_email == 'Aktif') {
            $countActive = email::where('status_email', 'Aktif')
                ->where('id_email', '!=', $id) // Pastikan tidak menghitung dirinya sendiri
                ->count();
            if ($countActive > 0) {
                return redirect()->back()->with('error', 'There can only be one data with Active status.');
            }
        }


        $dataById = DB::table('tb_email')->where('id_email', $id)->first();



        $update = email::where('id_email', $id)->update([
            'name_email' => $request->name_email,
            'status_email' => $request->status_email,

        ]);

        if ($update) {

            return redirect()->route('email.index')->with('success', 'Data updated successfully');
        } else {

            return redirect()->route('email.index')->with('error', 'data failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if (DB::table('tb_email')->where('id_email', $id)->delete()) {
            return redirect()->route('email.index')->with('success', 'Data Delete successfully');
        }

        return redirect()->route('email.index')->with('error', 'Data Failed to Delete');
    }
}
