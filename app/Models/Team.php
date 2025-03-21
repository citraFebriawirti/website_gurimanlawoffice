<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Team extends Model
{
    use HasFactory;


    protected $table = 'tb_team';



    protected $fillable = [
        'id_team',
        'title_team',
        'description_team',
        'image_team',
        'status_team',
    ];


    public static function GenerateID()
    {

        $prefix = "team" . date('Ymd');
        $lastID = DB::table('tb_team')->where('id_team', 'like', $prefix . '%')->max('id_team');

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