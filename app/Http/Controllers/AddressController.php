<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You Must Login First');
        }

        $data['address'] = DB::table('tb_address')->get();

        return view('pages.halaman_admin.address.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You must login first');
        }

        return view('pages.halaman_admin.address.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'title_address' => 'required',
            'link_gmap_address' => 'required',
            'status_address' => 'required',
        ]);

        // Cek apakah sudah ada status 'Aktif'
        if ($request->status_address == 'Aktif') {
            $countActive = Address::where('status_address', 'Aktif')->count();
            if ($countActive > 0) {
                return redirect()->back()->with('error', 'There can only be one data with Active status.');
            }
        }



        $create = Address::create([
            'id_address' => address::GenerateID(),
            'title_address' => $request->title_address,
            'status_address' => $request->status_address,
            'link_gmap_address' => $request->link_gmap_address,
        ]);

        return $create
            ? redirect()->route('address.index')->with('success', 'Data Added Successfully')
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

        $data['dataById'] = DB::table('tb_address')->where('id_address', $id)->first();
        return view('pages.halaman_admin.address.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'title_address' => 'required',
            'link_gmap_address' => 'required',
            'status_address' => 'required',
        ]);

        // Cek apakah sudah ada status 'Aktif' selain data yang sedang diupdate
        if ($request->status_address == 'Aktif') {
            $countActive = address::where('status_address', 'Aktif')
                ->where('id_address', '!=', $id) // Pastikan tidak menghitung dirinya sendiri
                ->count();
            if ($countActive > 0) {
                return redirect()->back()->with('error', 'There can only be one data with Active status.');
            }
        }


        $dataById = DB::table('tb_address')->where('id_address', $id)->first();



        $update = address::where('id_address', $id)->update([
            'title_address' => $request->title_address,
            'status_address' => $request->status_address,
            'link_gmap_address' => $request->link_gmap_address,
        ]);

        if ($update) {

            return redirect()->route('address.index')->with('success', 'Data updated successfully');
        } else {

            return redirect()->route('address.index')->with('error', 'data failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if (DB::table('tb_address')->where('id_address', $id)->delete()) {
            return redirect()->route('address.index')->with('success', 'Data Delete successfully');
        }

        return redirect()->route('address.index')->with('error', 'Data Failed to Delete');
    }
}
