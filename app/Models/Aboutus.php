<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Aboutus extends Model
{
    use HasFactory;

    protected $table = 'tb_aboutus';

    protected $fillable = [
        'id_aboutus',
        'description_aboutus',
        'status_aboutus',
    ];


    public static function GenerateID()
    {

        $prefix = "aboutus" . date('Ymd');
        $lastID = DB::table('tb_aboutus')->where('id_aboutus', 'like', $prefix . '%')->max('id_aboutus');

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
