<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingPageContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $data['phone'] = DB::table('tb_phone')->where('status_phone', 'aktif')->get();
        
        $data['address'] = DB::table('tb_address')->where('status_address', 'aktif')->get();

        
        $data['email'] = DB::table('tb_email')->where('status_email', 'aktif')->get();

        return view('pages.halaman_landingpage.contact.index', $data);
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