<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JobIntership extends Model
{
    use HasFactory;

    protected $table = 'tb_jobintership';



    protected $fillable = [
        'id_jobintership',
        'requirenments_jobintership',
        'job_descriptions_jobintership',
        'status_jobintership',
    ];


    public static function GenerateID()
    {

        $prefix = "jobintership" . date('Ymd');
        $lastID = DB::table('tb_jobintership')->where('id_jobintership', 'like', $prefix . '%')->max('id_jobintership');

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
