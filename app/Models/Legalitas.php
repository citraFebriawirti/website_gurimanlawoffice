<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Legalitas extends Model
{
    use HasFactory;

    protected $table = 'tb_legalitas';


    protected $fillable = [
        'id_legalitas',
        'title_legalitas',
        'description_legalitas',
        'image_legalitas',
        'status_legalitas',
    ];


    public static function GenerateID()
    {

        $prefix = "legalitas" . date('Ymd');
        $lastID = DB::table('tb_legalitas')->where('id_legalitas', 'like', $prefix . '%')->max('id_legalitas');

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
