<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssuedAsset extends Model
{
    protected $table = 'issued_asset';
    protected $primaryKey = 'id';
    protected $fillable = [
        'i_par_no',
        'i_description',
        'i_date_acquired',
        'i_property_no',
        'i_req_office',
        'i_unit',
        'i_quantity',
        'i_unit_value',
        'i_total_value',
    ];

    public function getKeyName()
    {
        return 'id';
    }

    public static function generateParNo()
    {
        $year = date('Y');
        $lastParNo = self::where('i_par_no', 'like', $year.'-%')->orderBy('i_par_no', 'desc')->first();

        if ($lastParNo) {
            $number = intval(substr($lastParNo->iar_no, 5)) + 1;
        } else {
            $number = 1;
        }
        $number = str_pad($number, 4, '0', STR_PAD_LEFT);

        return $year . '-' . $number;
    }

    public static function generatePropertyNo()
    {
        $year = date('Y');
        $lastPropertyNo = self::where('i_property_no', 'like', $year.'-%')->orderBy('i_property_no', 'desc')->first();

        if ($lastPropertyNo) {
            $parts = explode('-', $lastPropertyNo->property_no);
            $middleNumber = intval($parts[1]) + 1;
            $lastNumber = intval($parts[2]) + 1;
        } else {
            $middleNumber = 1;
            $lastNumber = 1;
        }
        $middleNumber = str_pad($middleNumber, 2, '0', STR_PAD_LEFT);
        $lastNumber = str_pad($lastNumber, 3, '0', STR_PAD_LEFT);

        return $year . '-' . $middleNumber . '-' . $lastNumber;
    }
}
