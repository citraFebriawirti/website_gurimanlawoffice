<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You Must Login First');
        }

        $data['team'] = DB::table('tb_team')->get();

        return view('pages.halaman_admin.team.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You must login first');
        }

        return view('pages.halaman_admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'title_team' => 'required',
            'description_team' => 'required',
            'image_team' => 'required|mimes:png,jpg',
            'status_team' => 'required',
        ]);



        if ($request->hasFile('image_team')) {
            $file = $request->file('image_team');
            $namaFile = Str::uuid() . '.' . $file->getClientOriginalExtension(); // Nama unik
            $file->move(public_path('assets_images/image_team'), $namaFile);

            $path = 'assets_images/image_team/' . $namaFile;
        } else {
            $path = 'default.png';
        }

        $create = Team::create([
            'id_team' => Team::GenerateID(),
            'title_team' => $request->title_team,
            'description_team' => $request->description_team,
            'status_team' => $request->status_team,
            'image_team' => $path
        ]);

        return $create
            ? redirect()->route('team.index')->with('success', 'Data Added Successfully')
            : redirect()->back()->with('error', 'Data Added Failed');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    //     $dataTeam = Team::findOrFail($id);
    // $shortDescription = Str::limit($dataTeam->description_team, 50);
    // return view('team.show', compact('dataTeam', 'shortDescription'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You must login first');
        }

        $data['dataById'] = DB::table('tb_team')->where('id_team', $id)->first();
        return view('pages.halaman_admin.team.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'title_team' => 'required',
            'description_team' => 'required',
            'status_team' => 'required',
        ]);




        $dataById = DB::table('tb_team')->where('id_team', $id)->first();

        if ($request->file('image_team')) {

            $namaFileOri = $request->file('image_team')->getClientOriginalName();

            $request->file('image_team')->move(public_path('assets_images/image_team'), $namaFileOri);

            $namaFile = 'assets_images/image_team/' . $namaFileOri;
        } else {

            $namaFile = $dataById->image_team;
        }

        $update = Team::where('id_team', $id)->update([
            'title_team' => $request->title_team,
            'description_team' => $request->description_team,
            'status_team' => $request->status_team,
            'image_team' => $namaFile
        ]);

        if ($update) {

            return redirect()->route('team.index')->with('success', 'Data updated successfully');
        } else {

            return redirect()->route('team.index')->with('error', 'data failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if (DB::table('tb_team')->where('id_team', $id)->delete()) {
            return redirect()->route('team.index')->with('success', 'Data Delete successfully');
        }

        return redirect()->route('team.index')->with('error', 'Data Failed to Delete');
    }
}