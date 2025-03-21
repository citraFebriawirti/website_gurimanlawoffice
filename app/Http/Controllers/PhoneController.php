<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You Must Login First');
        }

        $data['phone'] = DB::table('tb_phone')->get();

        return view('pages.halaman_admin.phone.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You must login first');
        }

        return view('pages.halaman_admin.phone.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'no_phone' => 'required|numeric|digits_between:1,13',
            'status_phone' => 'required',
        ]);

        // Cek apakah sudah ada status 'Aktif'
        if ($request->status_phone == 'Aktif') {
            $countActive = Phone::where('status_phone', 'Aktif')->count();
            if ($countActive > 0) {
                return redirect()->back()->with('error', 'There can only be one data with Active status.');
            }
        }



        $create = phone::create([
            'id_phone' => phone::GenerateID(),
            'no_phone' => $request->no_phone,
            'status_phone' => $request->status_phone,

        ]);

        return $create
            ? redirect()->route('phone.index')->with('success', 'Data Added Successfully')
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

        $data['dataById'] = DB::table('tb_phone')->where('id_phone', $id)->first();
        return view('pages.halaman_admin.phone.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'no_phone' => 'required|numeric|digits_between:1,13',
            'status_phone' => 'required',
        ]);

        // Cek apakah sudah ada status 'Aktif' selain data yang sedang diupdate
        if ($request->status_phone == 'Aktif') {
            $countActive = phone::where('status_phone', 'Aktif')
                ->where('id_phone', '!=', $id) // Pastikan tidak menghitung dirinya sendiri
                ->count();
            if ($countActive > 0) {
                return redirect()->back()->with('error', 'There can only be one data with Active status.');
            }
        }


        $dataById = DB::table('tb_phone')->where('id_phone', $id)->first();



        $update = phone::where('id_phone', $id)->update([
            'no_phone' => $request->no_phone,
            'status_phone' => $request->status_phone,

        ]);

        if ($update) {

            return redirect()->route('phone.index')->with('success', 'Data updated successfully');
        } else {

            return redirect()->route('phone.index')->with('error', 'data failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if (DB::table('tb_phone')->where('id_phone', $id)->delete()) {
            return redirect()->route('phone.index')->with('success', 'Data Delete successfully');
        }

        return redirect()->route('phone.index')->with('error', 'Data Failed to Delete');
    }
}
