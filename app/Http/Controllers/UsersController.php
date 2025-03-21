<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['User'] = DB::table('users')->get();

        return view('pages.halaman_admin.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('pages.halaman_admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama_user' => 'required',
            'jenis_kelamin_user' => 'required',
            'alamat_user' => 'required',
            'nomor_hp_user' => 'required',
            'email' => 'required',
            'password' => 'required',
            'status_user' => 'required',
        ]);


        // cek email
        if (DB::table('users')->where('email', $request->email)->exists()) {

            return redirect()->back()->with('error', 'email yang anda masukan sudah terdaftar');
        }

        $create = User::create([
            'id_user' => User::GenerateID(),
            'nama_user' => $request->nama_user,
            'jenis_kelamin_user' => $request->jenis_kelamin_user,
            'alamat_user' => $request->alamat_user,
            'nomor_hp_user' => $request->nomor_hp_user,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status_user' => $request->status_user,
        ]);

        if ($create) {

            return redirect()->route('users.index')->with('success', 'data berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'data gagal ditambahkan');
        }
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
        $data['dataById'] = DB::table('users')->where('id_user', $id)->first();

        return view('pages.halaman_admin.users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'nama_user' => 'required',
            'jenis_kelamin_user' => 'required',
            'alamat_user' => 'required',
            'nomor_hp_user' => 'required',
            'email' => 'required',
            'status_user' => 'required',
        ]);

        if ($request->password != null) {
            $password = Hash::make($request->password);
        } else {
            $password = DB::table('users')->where('id_user', $id)->value('password');
        }


        $update = User::where('id_user', $id)->update([
            'nama_user' => $request->nama_user,
            'jenis_kelamin_user' => $request->jenis_kelamin_user,
            'alamat_user' => $request->alamat_user,
            'nomor_hp_user' => $request->nomor_hp_user,
            'email' => $request->email,
            'password' => $password,
            'status_user' => $request->status_user,
        ]);

        if ($update) {

            return redirect()->route('users.index')->with('success', 'data berhasil diupdate');
        } else {
            return redirect()->route('users.index')->with('success', 'data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (DB::table('users')->where('id_user', $id)->delete()) {
            return redirect()->route('users.index')->with('success', 'data berhasil di delete');
        }

        return redirect()->route('users.index')->with('error', 'data gagal di delete');
    }
}
