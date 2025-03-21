<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SosialMedia extends Model
{
    use HasFactory;
    protected $table = 'tb_sosialmedia';

    protected $fillable = [
        'id_sosialmedia',
        'link_tiktok_sosialmedia',
        'link_instagram_sosialmedia',
        'link_youtube_sosialmedia',
        'link_linkedin_sosialmedia',
        'status_sosialmedia',
        
    ];


    public static function GenerateID()
    {

        $prefix = "SosialMedia" . date('Ymd');
        $lastID = DB::table('tb_sosialmedia')->where('id_sosialmedia', 'like', $prefix . '%')->max('id_sosialmedia');

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