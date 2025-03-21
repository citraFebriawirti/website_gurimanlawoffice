<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You Must Login First');
        }

        $data['hero'] = DB::table('tb_hero')->get();

        return view('pages.halaman_admin.hero.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You must login first');
        }

        return view('pages.halaman_admin.hero.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'title_hero' => 'required',
            'description_hero' => 'required',
            'link_hero' => 'required',
            'image_hero' => 'required|mimes:png,jpg',
            'status_hero' => 'required',
        ]);

        // Cek apakah sudah ada status 'Aktif'
        if ($request->status_hero == 'Aktif') {
            $countActive = Hero::where('status_hero', 'Aktif')->count();
            if ($countActive > 0) {
                return redirect()->back()->with('error', 'There can only be one data with Active status.');
            }
        }

        if ($request->hasFile('image_hero')) {
            $file = $request->file('image_hero');
            $namaFile = Str::uuid() . '.' . $file->getClientOriginalExtension(); // Nama unik
            $file->move(public_path('assets_images/image_hero'), $namaFile);

            $path = 'assets_images/image_hero/' . $namaFile;
        } else {
            $path = 'default.png';
        }

        $create = hero::create([
            'id_hero' => hero::GenerateID(),
            'title_hero' => $request->title_hero,
            'description_hero' => $request->description_hero,
            'link_hero' => $request->link_hero,
            'status_hero' => $request->status_hero,
            'image_hero' => $path
        ]);

        return $create
            ? redirect()->route('hero.index')->with('success', 'Data Added Successfully')
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

        $data['dataById'] = DB::table('tb_hero')->where('id_hero', $id)->first();
        return view('pages.halaman_admin.hero.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'title_hero' => 'required',
            'description_hero' => 'required',
            'link_hero' => 'required',

            'status_hero' => 'required',
        ]);

        // Cek apakah sudah ada status 'Aktif' selain data yang sedang diupdate
        if ($request->status_hero == 'Aktif') {
            $countActive = hero::where('status_hero', 'Aktif')
                ->where('id_hero', '!=', $id) // Pastikan tidak menghitung dirinya sendiri
                ->count();
            if ($countActive > 0) {
                return redirect()->back()->with('error', 'There can only be one data with Active status.');
            }
        }


        $dataById = DB::table('tb_hero')->where('id_hero', $id)->first();

        if ($request->file('image_hero')) {

            $namaFileOri = $request->file('image_hero')->getClientOriginalName();

            $request->file('image_hero')->move(public_path('assets_images/image_hero'), $namaFileOri);

            $namaFile = 'assets_images/image_hero/' . $namaFileOri;
        } else {

            $namaFile = $dataById->image_hero;
        }

        $update = hero::where('id_hero', $id)->update([
            'id_hero' => hero::GenerateID(),
            'title_hero' => $request->title_hero,
            'description_hero' => $request->description_hero,
            'link_hero' => $request->link_hero,
            'status_hero' => $request->status_hero,
            'image_hero' => $namaFile
        ]);

        if ($update) {

            return redirect()->route('hero.index')->with('success', 'Data updated successfully');
        } else {

            return redirect()->route('hero.index')->with('error', 'data failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if (DB::table('tb_hero')->where('id_hero', $id)->delete()) {
            return redirect()->route('hero.index')->with('success', 'Data Delete successfully');
        }

        return redirect()->route('hero.index')->with('error', 'Data Failed to Delete');
    }
}
