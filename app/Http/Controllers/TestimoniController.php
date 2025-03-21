<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You Must Login First');
        }

        $data['testimoni'] = DB::table('tb_testimoni')->get();

        return view('pages.halaman_admin.testimoni.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You must login first');
        }

        return view('pages.halaman_admin.testimoni.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'name_testimoni' => 'required',
            'position_testimoni' => 'required',
            'description_testimoni' => 'required',
            'image_testimoni' => 'required|mimes:png,jpg',
            'status_testimoni' => 'required',
        ]);



        if ($request->hasFile('image_testimoni')) {
            $file = $request->file('image_testimoni');
            $namaFile = Str::uuid() . '.' . $file->getClientOriginalExtension(); // Nama unik
            $file->move(public_path('assets_images/image_testimoni'), $namaFile);

            $path = 'assets_images/image_testimoni/' . $namaFile;
        } else {
            $path = 'default.png';
        }

        $create = Testimoni::create([
            'id_testimoni' => Testimoni::GenerateID(),
            'name_testimoni' => $request->name_testimoni,
            'position_testimoni' => $request->position_testimoni,
            'description_testimoni' => $request->description_testimoni,
            'status_testimoni' => $request->status_testimoni,
            'image_testimoni' => $path
        ]);

        return $create
            ? redirect()->route('testimoni.index')->with('success', 'Data Added Successfully')
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

        $data['dataById'] = DB::table('tb_testimoni')->where('id_testimoni', $id)->first();
        return view('pages.halaman_admin.testimoni.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'name_testimoni' => 'required',
            'position_testimoni' => 'required',
            'description_testimoni' => 'required',
            'image_testimoni' => 'required|mimes:png,jpg',
            'status_testimoni' => 'required',
        ]);




        $dataById = DB::table('tb_testimoni')->where('id_testimoni', $id)->first();

        if ($request->file('image_testimoni')) {

            $namaFileOri = $request->file('image_testimoni')->getClientOriginalName();

            $request->file('image_testimoni')->move(public_path('assets_images/image_testimoni'), $namaFileOri);

            $namaFile = 'assets_images/image_testimoni/' . $namaFileOri;
        } else {

            $namaFile = $dataById->image_testimoni;
        }

        $update = testimoni::where('id_testimoni', $id)->update([
            'id_testimoni' => Testimoni::GenerateID(),
            'name_testimoni' => $request->name_testimoni,
            'position_testimoni' => $request->position_testimoni,
            'description_testimoni' => $request->description_testimoni,
            'status_testimoni' => $request->status_testimoni,
            'image_testimoni' => $namaFile
        ]);

        if ($update) {

            return redirect()->route('testimoni.index')->with('success', 'Data updated successfully');
        } else {

            return redirect()->route('testimoni.index')->with('error', 'data failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if (DB::table('tb_testimoni')->where('id_testimoni', $id)->delete()) {
            return redirect()->route('testimoni.index')->with('success', 'Data Delete successfully');
        }

        return redirect()->route('testimoni.index')->with('error', 'Data Failed to Delete');
    }
}
