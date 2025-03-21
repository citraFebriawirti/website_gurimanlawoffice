<?php

namespace App\Http\Controllers;

use App\Models\JobAssociate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class JobAssociateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You Must Login First');
        }

        $data['jobassociate'] = DB::table('tb_jobassociate')->get();

        return view('pages.halaman_admin.jobassociate.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You must login first');
        }

        return view('pages.halaman_admin.jobassociate.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'requirenments_jobassociate' => 'required',
            'job_descriptions_jobassociate' => 'required',
            'status_jobassociate' => 'required',
        ]);

        // Cek apakah sudah ada status 'Aktif'
        if ($request->status_jobassociate == 'Aktif') {
            $countActive = JobAssociate::where('status_jobassociate', 'Aktif')->count();
            if ($countActive > 0) {
                return redirect()->back()->with('error', 'There can only be one data with Active status.');
            }
        }



        $create = JobAssociate::create([
            'id_jobassociate' => JobAssociate::GenerateID(),
            'requirenments_jobassociate' => $request->requirenments_jobassociate,
            'status_jobassociate' => $request->status_jobassociate,
            'job_descriptions_jobassociate' => $request->job_descriptions_jobassociate,
        ]);

        return $create
            ? redirect()->route('jobassociate.index')->with('success', 'Data Added Successfully')
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

        $data['dataById'] = DB::table('tb_jobassociate')->where('id_jobassociate', $id)->first();
        return view('pages.halaman_admin.jobassociate.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'requirenments_jobassociate' => 'required',
            'job_descriptions_jobassociate' => 'required',
            'status_jobassociate' => 'required',
        ]);

        // Cek apakah sudah ada status 'Aktif' selain data yang sedang diupdate
        if ($request->status_jobassociate == 'Aktif') {
            $countActive = JobAssociate::where('status_jobassociate', 'Aktif')
                ->where('id_jobassociate', '!=', $id) // Pastikan tidak menghitung dirinya sendiri
                ->count();
            if ($countActive > 0) {
                return redirect()->back()->with('error', 'There can only be one data with Active status.');
            }
        }


        $dataById = DB::table('tb_jobassociate')->where('id_jobassociate', $id)->first();



        $update = JobAssociate::where('id_jobassociate', $id)->update([
            'id_jobassociate' => JobAssociate::GenerateID(),
            'requirenments_jobassociate' => $request->requirenments_jobassociate,
            'status_jobassociate' => $request->status_jobassociate,
            'job_descriptions_jobassociate' => $request->job_descriptions_jobassociate,
        ]);

        if ($update) {

            return redirect()->route('jobassociate.index')->with('success', 'Data updated successfully');
        } else {

            return redirect()->route('jobassociate.index')->with('error', 'data failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if (DB::table('tb_jobassociate')->where('id_jobassociate', $id)->delete()) {
            return redirect()->route('jobassociate.index')->with('success', 'Data Delete successfully');
        }

        return redirect()->route('jobassociate.index')->with('error', 'Data Failed to Delete');
    }
}
