<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['hero'] = DB::table('tb_hero')->where('status_hero', 'aktif')->get();
        $data['testimoni'] = DB::table('tb_testimoni')->get();
        $data['aboutus'] = DB::table('tb_aboutus')->get();
        $data['team'] = DB::table('tb_team')->where('status_team', 'aktif')->get();
        $data['business_partner'] = DB::table('tb_business_partner')->where('status_business_partner', 'aktif')->get();
        $data['product'] = DB::table('tb_product')->where('status_product', 'aktif')->get();
        $data['testimoni'] = DB::table('tb_testimoni')->where('status_testimoni', 'aktif')->get();

        return view('pages.halaman_landingpage.homepage.index', $data);
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