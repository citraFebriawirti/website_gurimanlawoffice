<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Address extends Model
{
    use HasFactory;

    protected $table = 'tb_address';



    protected $fillable = [
        'id_address',
        'title_address',
        'link_gmap_address',
        'status_address',
    ];


    public static function GenerateID()
    {

        $prefix = "Address" . date('Ymd');
        $lastID = DB::table('tb_address')->where('id_address', 'like', $prefix . '%')->max('id_address');

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