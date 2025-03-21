<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You Must Login First');
        }

        $data['gallery'] = DB::table('tb_gallery')->get();

        return view('pages.halaman_admin.gallery.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You must login first');
        }

        return view('pages.halaman_admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'image_gallery' => 'required|mimes:png,jpg',
            'status_gallery' => 'required',
        ]);



        if ($request->hasFile('image_gallery')) {
            $file = $request->file('image_gallery');
            $namaFile = Str::uuid() . '.' . $file->getClientOriginalExtension(); // Nama unik
            $file->move(public_path('assets_images/image_gallery'), $namaFile);

            $path = 'assets_images/image_gallery/' . $namaFile;
        } else {
            $path = 'default.png';
        }

        $create = Gallery::create([
            'id_gallery' => Gallery::GenerateID(),

            'status_gallery' => $request->status_gallery,
            'image_gallery' => $path
        ]);

        return $create
            ? redirect()->route('gallery.index')->with('success', 'Data Added Successfully')
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

        $data['dataById'] = DB::table('tb_gallery')->where('id_gallery', $id)->first();
        return view('pages.halaman_admin.gallery.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'status_gallery' => 'required',
        ]);



        $dataById = DB::table('tb_gallery')->where('id_gallery', $id)->first();

        if ($request->file('image_gallery')) {

            $namaFileOri = $request->file('image_gallery')->getClientOriginalName();

            $request->file('image_gallery')->move(public_path('assets_images/image_gallery'), $namaFileOri);

            $namaFile = 'assets_images/image_gallery/' . $namaFileOri;
        } else {

            $namaFile = $dataById->image_gallery;
        }

        $update = gallery::where('id_gallery', $id)->update([
            'status_gallery' => $request->status_gallery,
            'image_gallery' => $namaFile
        ]);

        if ($update) {

            return redirect()->route('gallery.index')->with('success', 'Data updated successfully');
        } else {

            return redirect()->route('gallery.index')->with('error', 'data failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if (DB::table('tb_gallery')->where('id_gallery', $id)->delete()) {
            return redirect()->route('gallery.index')->with('success', 'Data Delete successfully');
        }

        return redirect()->route('gallery.index')->with('error', 'Data Failed to Delete');
    }
}
