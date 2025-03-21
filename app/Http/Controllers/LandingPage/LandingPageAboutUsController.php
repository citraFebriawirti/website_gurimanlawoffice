<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingPageAboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['aboutus'] = DB::table('tb_aboutus')->get();
        $data['visi'] = DB::table('tb_visi')->where('status_visi', 'Aktif')->get();
        $data['misi'] = DB::table('tb_misi')->where('status_misi', 'Aktif')->get();
        $data['legalitas'] = DB::table('tb_legalitas')->where('status_legalitas', 'Aktif')->get();
        return view('pages.halaman_landingpage.aboutus.index', $data);
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
    public function show(string $id)
    {
        //
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