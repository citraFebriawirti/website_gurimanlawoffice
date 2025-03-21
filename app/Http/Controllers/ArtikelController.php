<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You Must Login First');
        }

        $data['artikel'] = DB::table('tb_artikel')->get();

        return view('pages.halaman_admin.artikel.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You must login first');
        }

        return view('pages.halaman_admin.artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'title_artikel' => 'required',
            'author_artikel' => 'required',
            'description_artikel' => 'required',
            'image_artikel' => 'required|mimes:png,jpg',
            'status_artikel' => 'required',
        ]);

        // Cek apakah sudah ada status 'Aktif'
        // if ($request->status_artikel == 'Aktif') {
        //     $countActive = Artikel::where('status_artikel', 'Aktif')->count();
        //     if ($countActive > 0) {
        //         return redirect()->back()->with('error', 'There can only be one data with Active status.');
        //     }
        // }

        if ($request->hasFile('image_artikel')) {
            $file = $request->file('image_artikel');
            $namaFile = Str::uuid() . '.' . $file->getClientOriginalExtension(); // Nama unik
            $file->move(public_path('assets_images/image_artikel'), $namaFile);

            $path = 'assets_images/image_artikel/' . $namaFile;
        } else {
            $path = 'default.png';
        }

        $create = Artikel::create([
            'id_artikel' => Artikel::GenerateID(),
            'title_artikel' => $request->title_artikel,
            'author_artikel' => $request->author_artikel,
            'description_artikel' => $request->description_artikel,
            'status_artikel' => $request->status_artikel,
            'image_artikel' => $path
        ]);

        return $create
            ? redirect()->route('artikel.index')->with('success', 'Data Added Successfully')
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

        $data['dataById'] = DB::table('tb_artikel')->where('id_artikel', $id)->first();
        return view('pages.halaman_admin.artikel.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'title_artikel' => 'required',
            'author_artikel' => 'required',
            'description_artikel' => 'required',

            'status_artikel' => 'required',
        ]);

        // Cek apakah sudah ada status 'Aktif' selain data yang sedang diupdate
        // if ($request->status_artikel == 'Aktif') {
        //     $countActive = artikel::where('status_artikel', 'Aktif')
        //         ->where('id_artikel', '!=', $id) // Pastikan tidak menghitung dirinya sendiri
        //         ->count();
        //     if ($countActive > 0) {
        //         return redirect()->back()->with('error', 'There can only be one data with Active status.');
        //     }
        // }


        $dataById = DB::table('tb_artikel')->where('id_artikel', $id)->first();

        if ($request->file('image_artikel')) {

            $namaFileOri = $request->file('image_artikel')->getClientOriginalName();

            $request->file('image_artikel')->move(public_path('assets_images/image_artikel'), $namaFileOri);

            $namaFile = 'assets_images/image_artikel/' . $namaFileOri;
        } else {

            $namaFile = $dataById->image_artikel;
        }

        $update = artikel::where('id_artikel', $id)->update([
            'id_artikel' => artikel::GenerateID(),
            'title_artikel' => $request->title_artikel,
            'author_artikel' => $request->author_artikel,
            'description_artikel' => $request->description_artikel,
            'status_artikel' => $request->status_artikel,
            'image_artikel' => $namaFile
        ]);

        if ($update) {

            return redirect()->route('artikel.index')->with('success', 'Data updated successfully');
        } else {

            return redirect()->route('artikel.index')->with('error', 'data failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if (DB::table('tb_artikel')->where('id_artikel', $id)->delete()) {
            return redirect()->route('artikel.index')->with('success', 'Data Delete successfully');
        }

        return redirect()->route('artikel.index')->with('error', 'Data Failed to Delete');
    }
}