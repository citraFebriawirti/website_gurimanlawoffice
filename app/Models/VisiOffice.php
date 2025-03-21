<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class VisiOffice extends Model
{
    use HasFactory;
    protected $table = 'tb_visi';

    protected $fillable = [
        'id_visi',
        'title_visi',
        'status_visi',
    ];


    public static function GenerateID()
    {

        $prefix = "visi" . date('Ymd');
        $lastID = DB::table('tb_visi')->where('id_visi', 'like', $prefix . '%')->max('id_visi');

        if ($lastID == null) {
            return $prefix . "0000001";
        } else {
            $lastID = str_replace($prefix, '', $lastID);
            $lastID = (int) $lastID;
            $lastID += 1;
            $lastID = str_pad($lastID, 7, '0', STR_PAD_LEFT);
            return $prefix . $lastID;
        }
    }
}