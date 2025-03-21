<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Hero extends Model
{
    use HasFactory;

    protected $table = 'tb_hero';



    protected $fillable = [
        'id_hero',
        'title_hero',
        'description_hero',
        'link_hero',
        'image_hero',
        'status_hero',
    ];


    public static function GenerateID()
    {

        $prefix = "hero" . date('Ymd');
        $lastID = DB::table('tb_hero')->where('id_hero', 'like', $prefix . '%')->max('id_hero');

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
