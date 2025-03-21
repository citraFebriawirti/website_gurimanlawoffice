<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingPageJoinUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['joinus'] = DB::table('tb_joinus')->where('status_joinus', 'Aktif')->get();
        $data['jobassociate'] = DB::table('tb_jobassociate')->where('status_jobassociate', 'Aktif')->get();
        $data['jobintership'] = DB::table('tb_jobintership')->where('status_jobintership', 'Aktif')->get();

        return view('pages.halaman_landingpage.joinus.index', $data);
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
