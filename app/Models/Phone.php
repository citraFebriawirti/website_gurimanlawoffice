<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Phone extends Model
{
    use HasFactory;
    protected $table = 'tb_phone';



    protected $fillable = [
        'id_phone',
        'no_phone',
        'status_phone',
    ];


    public static function GenerateID()
    {

        $prefix = "Phone" . date('Ymd');
        $lastID = DB::table('tb_phone')->where('id_phone', 'like', $prefix . '%')->max('id_phone');

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