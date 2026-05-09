<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingPagegalleryWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $data['gallery'] = DB::table('tb_gallery')->where('status_gallery', 'aktif')->get();


        return view('pages.halaman_landingpage.gallery.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id_gallery)
    {
        $gallery = Gallery::where('id_gallery', $id_gallery)->firstOrFail();


        return view('pages.halaman_landingpage.gallery.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
