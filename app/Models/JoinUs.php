<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JoinUs extends Model
{
    use HasFactory;

    protected $table = 'tb_joinus';

    protected $fillable = [
        'id_joinus',
        'title_joinus',
        'status_joinus',
    ];


    public static function GenerateID()
    {

        $prefix = "joinus" . date('Ymd');
        $lastID = DB::table('tb_joinus')->where('id_joinus', 'like', $prefix . '%')->max('id_joinus');

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
