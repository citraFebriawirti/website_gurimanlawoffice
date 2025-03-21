<?php

namespace App\Http\Controllers;

use App\Models\JobIntership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class JobIntershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You Must Login First');
        }

        $data['jobintership'] = DB::table('tb_jobintership')->get();

        return view('pages.halaman_admin.jobintership.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You must login first');
        }

        return view('pages.halaman_admin.jobintership.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'requirenments_jobintership' => 'required',
            'job_descriptions_jobintership' => 'required',
            'status_jobintership' => 'required',
        ]);

        // Cek apakah sudah ada status 'Aktif'
        if ($request->status_jobintership == 'Aktif') {
            $countActive = JobIntership::where('status_jobintership', 'Aktif')->count();
            if ($countActive > 0) {
                return redirect()->back()->with('error', 'There can only be one data with Active status.');
            }
        }



        $create = JobIntership::create([
            'id_jobintership' => JobIntership::GenerateID(),
            'requirenments_jobintership' => $request->requirenments_jobintership,
            'status_jobintership' => $request->status_jobintership,
            'job_descriptions_jobintership' => $request->job_descriptions_jobintership,
        ]);

        return $create
            ? redirect()->route('jobintership.index')->with('success', 'Data Added Successfully')
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

        $data['dataById'] = DB::table('tb_jobintership')->where('id_jobintership', $id)->first();
        return view('pages.halaman_admin.jobintership.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'requirenments_jobintership' => 'required',
            'job_descriptions_jobintership' => 'required',
            'status_jobintership' => 'required',
        ]);

        // Cek apakah sudah ada status 'Aktif' selain data yang sedang diupdate
        if ($request->status_jobintership == 'Aktif') {
            $countActive = JobIntership::where('status_jobintership', 'Aktif')
                ->where('id_jobintership', '!=', $id) // Pastikan tidak menghitung dirinya sendiri
                ->count();
            if ($countActive > 0) {
                return redirect()->back()->with('error', 'There can only be one data with Active status.');
            }
        }


        $dataById = DB::table('tb_jobintership')->where('id_jobintership', $id)->first();



        $update = JobIntership::where('id_jobintership', $id)->update([
            'id_jobintership' => JobIntership::GenerateID(),
            'requirenments_jobintership' => $request->requirenments_jobintership,
            'status_jobintership' => $request->status_jobintership,
            'job_descriptions_jobintership' => $request->job_descriptions_jobintership,
        ]);

        if ($update) {

            return redirect()->route('jobintership.index')->with('success', 'Data updated successfully');
        } else {

            return redirect()->route('jobintership.index')->with('error', 'data failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if (DB::table('tb_jobintership')->where('id_jobintership', $id)->delete()) {
            return redirect()->route('jobintership.index')->with('success', 'Data Delete successfully');
        }

        return redirect()->route('jobintership.index')->with('error', 'Data Failed to Delete');
    }
}
