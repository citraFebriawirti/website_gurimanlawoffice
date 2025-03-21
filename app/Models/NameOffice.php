<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



class NameOffice extends Model
{
    use HasFactory;
    protected $table = 'tb_nameoffice';



    protected $fillable = [
        'id_nameoffice',
        'title_nameoffice',
        'image_nameoffice',
        'status_nameoffice',
    ];


    public static function GenerateID()
    {

        $prefix = "NameOffice" . date('Ymd');
        $lastID = DB::table('tb_nameoffice')->where('id_nameoffice', 'like', $prefix . '%')->max('id_nameoffice');

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