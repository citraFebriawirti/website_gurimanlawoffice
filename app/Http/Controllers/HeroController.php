<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You Must Login First');
        }

        $data['hero'] = DB::table('tb_hero')->get();

        return view('pages.halaman_admin.hero.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You must login first');
        }

        return view('pages.halaman_admin.hero.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'title_hero' => 'required',
            'description_hero' => 'required',
            'link_hero' => 'required',
            'image_hero' => 'required',
            'image_hero.*' => 'image|mimes:jpg,jpeg,png|max:2048',
            'status_hero' => 'required',
        ]);

        // Cek apakah sudah ada status 'Aktif'
        if ($request->status_hero == 'Aktif') {
            $countActive = Hero::where('status_hero', 'Aktif')->count();
            if ($countActive > 0) {
                return redirect()->back()->with('error', 'There can only be one data with Active status.');
            }
        }

        $images = [];

        if ($request->hasFile('image_hero')) {

            foreach ($request->file('image_hero') as $file) {

                $fileName =
                    Str::uuid() .
                    '.' .
                    $file->getClientOriginalExtension();

                $file->move(
                    public_path('assets_images/image_hero'),
                    $fileName
                );

                $images[] =
                    'assets_images/image_hero/' .
                    $fileName;
            }
        }

        $create = hero::create([
            'id_hero' => hero::GenerateID(),
            'title_hero' => $request->title_hero,
            'description_hero' => $request->description_hero,
            'link_hero' => $request->link_hero,
            'status_hero' => $request->status_hero,
            'image_hero' => $images
        ]);

        return $create
            ? redirect()->route('hero.index')->with('success', 'Data Added Successfully')
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

        $data['dataById'] = DB::table('tb_hero')->where('id_hero', $id)->first();
        return view('pages.halaman_admin.hero.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title_hero' => 'required',
            'description_hero' => 'required',
            'link_hero' => 'required',
            'status_hero' => 'required',
            'image_hero.*' => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Validasi hanya 1 data aktif
        if ($request->status_hero == 'Aktif') {

            $countActive = Hero::where('status_hero', 'Aktif')
                ->where('id_hero', '!=', $id)
                ->count();

            if ($countActive > 0) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'There can only be one data with Active status.');
            }
        }

        $dataById = Hero::where('id_hero', $id)->firstOrFail();

        // Ambil gambar lama
        $images = $dataById->image_hero ?? [];

        // Jika upload gambar baru
        if ($request->hasFile('image_hero')) {

            $images = [];

            foreach ($request->file('image_hero') as $file) {

                $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();

                $file->move(
                    public_path('assets_images/image_hero'),
                    $fileName
                );

                $images[] = 'assets_images/image_hero/' . $fileName;
            }
        }

        $update = Hero::where('id_hero', $id)->update([
            'title_hero' => $request->title_hero,
            'description_hero' => $request->description_hero,
            'link_hero' => $request->link_hero,
            'status_hero' => $request->status_hero,
            'image_hero' => $images
        ]);

        if ($update) {
            return redirect()
                ->route('hero.index')
                ->with('success', 'Data updated successfully');
        }

        return redirect()
            ->route('hero.index')
            ->with('error', 'Data failed to update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if (DB::table('tb_hero')->where('id_hero', $id)->delete()) {
            return redirect()->route('hero.index')->with('success', 'Data Delete successfully');
        }

        return redirect()->route('hero.index')->with('error', 'Data Failed to Delete');
    }
}