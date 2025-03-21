<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $table = 'tb_product';



    protected $fillable = [
        'id_product',
        'title_product',
        'description_product',
        'status_product',
    ];


    public static function GenerateID()
    {

        $prefix = "product" . date('Ymd');
        $lastID = DB::table('tb_product')->where('id_product', 'like', $prefix . '%')->max('id_product');

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
