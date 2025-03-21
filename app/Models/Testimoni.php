<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Testimoni extends Model
{
    use HasFactory;

    protected $table = 'tb_testimoni';



    protected $fillable = [
        'id_testimoni',
        'name_testimoni',
        'position_testimoni',
        'description_testimoni',
        'image_testimoni',
        'status_testimoni',
    ];


    public static function GenerateID()
    {

        $prefix = "testimoni" . date('Ymd');
        $lastID = DB::table('tb_testimoni')->where('id_testimoni', 'like', $prefix . '%')->max('id_testimoni');

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
