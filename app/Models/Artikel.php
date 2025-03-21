<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'tb_artikel';

    protected $fillable = [
        'id_artikel',
        'title_artikel',
        'author_artikel',
        'description_artikel',
        'image_artikel',
        'status_artikel',
    ];


    public static function GenerateID()
    {

        $prefix = "artikel" . date('Ymd');
        $lastID = DB::table('tb_artikel')->where('id_artikel', 'like', $prefix . '%')->max('id_artikel');

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
