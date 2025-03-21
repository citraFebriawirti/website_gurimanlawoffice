<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JobAssociate extends Model
{
    use HasFactory;

    protected $table = 'tb_jobassociate';



    protected $fillable = [
        'id_jobassociate',
        'requirenments_jobassociate',
        'job_descriptions_jobassociate',
        'status_jobassociate',
    ];


    public static function GenerateID()
    {

        $prefix = "jobassociate" . date('Ymd');
        $lastID = DB::table('tb_jobassociate')->where('id_jobassociate', 'like', $prefix . '%')->max('id_jobassociate');

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