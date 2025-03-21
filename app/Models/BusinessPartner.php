<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BusinessPartner extends Model
{
    use HasFactory;

    protected $table = 'tb_business_partner';



    protected $fillable = [
        'id_business_partner',
        'image_business_partner',
        'status_business_partner',
    ];


    public static function GenerateID()
    {

        $prefix = "business_partner" . date('Ymd');
        $lastID = DB::table('tb_business_partner')->where('id_business_partner', 'like', $prefix . '%')->max('id_business_partner');

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
