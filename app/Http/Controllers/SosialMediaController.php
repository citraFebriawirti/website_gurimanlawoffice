<?php

namespace App\Http\Controllers;

use App\Models\SosialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SosialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You Must Login First');
        }

        $data['sosialmedia'] = DB::table('tb_sosialmedia')->get();

        return view('pages.halaman_admin.sosialmedia.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You must login first');
        }

        return view('pages.halaman_admin.sosialmedia.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'link_tiktok_sosialmedia' => 'required',
            'link_instagram_sosialmedia' => 'required',
            'link_youtube_sosialmedia' => 'required',
            'link_linkedin_sosialmedia' => 'required',
            'status_sosialmedia' => 'required',
        ]);

        // Cek apakah sudah ada status 'Aktif'
        if ($request->status_sosialmedia == 'Aktif') {
            $countActive = SosialMedia::where('status_sosialmedia', 'Aktif')->count();
            if ($countActive > 0) {
                return redirect()->back()->with('error', 'There can only be one data with Active status.');
            }
        }



        $create = sosialmedia::create([
            'id_sosialmedia' => sosialmedia::GenerateID(),
            'link_tiktok_sosialmedia' => $request->link_tiktok_sosialmedia,
            'link_instagram_sosialmedia' => $request->link_instagram_sosialmedia,
            'link_youtube_sosialmedia' => $request->link_youtube_sosialmedia,
            'link_linkedin_sosialmedia' => $request->link_linkedin_sosialmedia,
            'status_sosialmedia' => $request->status_sosialmedia,

        ]);

        return $create
            ? redirect()->route('sosialmedia.index')->with('success', 'Data Added Successfully')
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

        $data['dataById'] = DB::table('tb_sosialmedia')->where('id_sosialmedia', $id)->first();
        return view('pages.halaman_admin.sosialmedia.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'link_tiktok_sosialmedia' => 'required',
            'link_instagram_sosialmedia' => 'required',
            'link_youtube_sosialmedia' => 'required',
            'link_linkedin_sosialmedia' => 'required',
            'status_sosialmedia' => 'required',
        ]);

        // Cek apakah sudah ada status 'Aktif' selain data yang sedang diupdate
        if ($request->status_sosialmedia == 'Aktif') {
            $countActive = sosialmedia::where('status_sosialmedia', 'Aktif')
                ->where('id_sosialmedia', '!=', $id) // Pastikan tidak menghitung dirinya sendiri
                ->count();
            if ($countActive > 0) {
                return redirect()->back()->with('error', 'There can only be one data with Active status.');
            }
        }


        $dataById = DB::table('tb_sosialmedia')->where('id_sosialmedia', $id)->first();



        $update = sosialmedia::where('id_sosialmedia', $id)->update([
            'id_sosialmedia' => sosialmedia::GenerateID(),
            'link_tiktok_sosialmedia' => $request->link_tiktok_sosialmedia,
            'link_instagram_sosialmedia' => $request->link_instagram_sosialmedia,
            'link_youtube_sosialmedia' => $request->link_youtube_sosialmedia,
            'link_linkedin_sosialmedia' => $request->link_linkedin_sosialmedia,
            'status_sosialmedia' => $request->status_sosialmedia,
        ]);

        if ($update) {

            return redirect()->route('sosialmedia.index')->with('success', 'Data updated successfully');
        } else {

            return redirect()->route('sosialmedia.index')->with('error', 'data failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if (DB::table('tb_sosialmedia')->where('id_sosialmedia', $id)->delete()) {
            return redirect()->route('sosialmedia.index')->with('success', 'Data Delete successfully');
        }

        return redirect()->route('sosialmedia.index')->with('error', 'Data Failed to Delete');
    }
}
