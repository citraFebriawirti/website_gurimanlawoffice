<?php

namespace App\Http\Controllers;

use App\Models\BusinessPartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class BusinessPartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You Must Login First');
        }

        $data['business_partner'] = DB::table('tb_business_partner')->get();

        return view('pages.halaman_admin.business_partner.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You must login first');
        }

        return view('pages.halaman_admin.business_partner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'image_business_partner' => 'required|mimes:png,jpg',
            'status_business_partner' => 'required',
        ]);



        if ($request->hasFile('image_business_partner')) {
            $file = $request->file('image_business_partner');
            $namaFile = Str::uuid() . '.' . $file->getClientOriginalExtension(); // Nama unik
            $file->move(public_path('assets_images/image_business_partner'), $namaFile);

            $path = 'assets_images/image_business_partner/' . $namaFile;
        } else {
            $path = 'default.png';
        }

        $create = BusinessPartner::create([
            'id_business_partner' => BusinessPartner::GenerateID(),
            'status_business_partner' => $request->status_business_partner,
            'image_business_partner' => $path
        ]);

        return $create
            ? redirect()->route('businespartner.index')->with('success', 'Data Added Successfully')
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

        $data['dataById'] = DB::table('tb_business_partner')->where('id_business_partner', $id)->first();
        return view('pages.halaman_admin.business_partner.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'status_business_partner' => 'required',
        ]);




        $dataById = DB::table('tb_business_partner')->where('id_business_partner', $id)->first();

        if ($request->file('image_business_partner')) {

            $namaFileOri = $request->file('image_business_partner')->getClientOriginalName();

            $request->file('image_business_partner')->move(public_path('assets_images/image_business_partner'), $namaFileOri);

            $namaFile = 'assets_images/image_business_partner/' . $namaFileOri;
        } else {

            $namaFile = $dataById->image_business_partner;
        }

        $update = BusinessPartner::where('id_business_partner', $id)->update([
            'status_business_partner' => $request->status_business_partner,
            'image_business_partner' => $namaFile
        ]);

        if ($update) {

            return redirect()->route('businespartner.index')->with('success', 'Data updated successfully');
        } else {

            return redirect()->route('businespartner.index')->with('error', 'data failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if (DB::table('tb_business_partner')->where('id_business_partner', $id)->delete()) {
            return redirect()->route('businespartner.index')->with('success', 'Data Delete successfully');
        }

        return redirect()->route('businespartner.index')->with('error', 'Data Failed to Delete');
    }
}
