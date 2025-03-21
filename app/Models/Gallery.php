<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'tb_gallery';



    protected $fillable = [
        'id_gallery', 
        'image_gallery',
        'status_gallery',
    ];


    public static function GenerateID()
    {

        $prefix = "gallery" . date('Ymd');
        $lastID = DB::table('tb_gallery')->where('id_gallery', 'like', $prefix . '%')->max('id_gallery');

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