<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{

    public function index(Request $request)
    {
        $data['agen'] = DB::table('tb_agen')->get();
        $data['gallery'] = DB::table('tb_gallery')->get();
        $data['profile'] = DB::table('tb_profile')->where('status_profile', 'aktif')->get();
        $data['tentang'] = DB::table('tb_tentang')->where('status_tentang', 'aktif')->get();
    }
}
