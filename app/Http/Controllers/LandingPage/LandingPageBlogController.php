<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingPageBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['artikel'] = DB::table('tb_artikel')
            ->where('status_artikel', 'aktif')
            ->paginate(5); // Tambahkan pagination 5 item per halaman


        return view('pages.halaman_landingpage.blog.index', $data);
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
    public function show(string $id_artikel)
    {
        $artikel = Artikel::where('id_artikel', $id_artikel)->firstOrFail();

        $recent_artikel = Artikel::orderBy('created_at', 'desc')->limit(5)->get();
        return view('pages.halaman_landingpage.blog.show', compact('artikel', 'recent_artikel'));
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
