<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingPageTeamWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $data['team'] = DB::table('tb_team')->where('status_team', 'aktif')->get();


        return view('pages.halaman_landingpage.team.index', $data);
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

    public function show(string $id_team)
    {
        $team = Team::where('id_team', $id_team)->firstOrFail();


        return view('pages.halaman_landingpage.team.show', compact('team'));
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
