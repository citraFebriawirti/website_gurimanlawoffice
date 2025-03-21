<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MisiOffice extends Model
{
    use HasFactory;

    protected $table = 'tb_misi';

    protected $fillable = [
        'id_misi',
        'title_misi',
        'status_misi',
    ];


    public static function GenerateID()
    {

        $prefix = "misi" . date('Ymd');
        $lastID = DB::table('tb_misi')->where('id_misi', 'like', $prefix . '%')->max('id_misi');

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
