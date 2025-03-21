<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Email extends Model
{
    use HasFactory;
    protected $table = 'tb_email';

    protected $fillable = [
        'id_email',
        'name_email',
        'status_email',
    ];


    public static function GenerateID()
    {

        $prefix = "Email" . date('Ymd');
        $lastID = DB::table('tb_email')->where('id_email', 'like', $prefix . '%')->max('id_email');

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