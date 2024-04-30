<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
    //use HasFactory;

    protected $fillable = [
        'item_no',
        'class_id',
        'category',
        'description',
        'details',
        'po_no',
        'supplier',
        'address',
        'tel_no',
        'tin_no',
        'date',
        'mode_of_proc',
        'pr_no',
        'place_dev',
        'date_dev',
        'price_val',
        'payment_term',
        'quantity',
        'unit',
        'unit_cost',
        'amount',
        'sub_total',
        'iar_no',
        'bur_no',
        'date_po',
        'invoice_no',
        'req_office',
        'date_invoice',
        'date_inspected',
        'date_received',
        'par_no',
        'issuance_qty',
        'name_desc',
        'date_acquired',
        'property_no',
        'total_value_issued',
        'entity_name',
        'fund_cluster',
        'name_accountable',
        'accumulated_losses',
        'carrying_amount',
        'disposal',
        'appraised_value',
        'record_sale',
        'name_lgu',
        'purpose',
        'enduser',
        'date_received',
        'date_returned',
    ];
    protected $table = 'asset';

    use SoftDeletes;

    public function getKeyName()
    {
        return 'pr_no';
    }
    public $incrementing = false;

    public static function generateItemNo()
    {
        $year = date('Y');
        $lastItemNo = self::where('item_no', 'like', $year.'%')->orderBy('item_no', 'desc')->first();

        if ($lastItemNo) {
            $number = intval(substr($lastItemNo->item_no, 4)) + 1;
        } else {
            $number = 1;
        }
        $number = str_pad($number, 6, '0', STR_PAD_LEFT);

        return $year . $number;
    }

    public static function generateClassId()
    {
        $classId = self::pluck('class_id')->toArray();
        $maxNumber = 0;
        foreach ($classId as $classIds) {
            $number = intval(substr($classIds, 2));
            if ($number > $maxNumber) {
                $maxNumber = $number;
            }
        }
        $number = str_pad($maxNumber + 1, 3, '0', STR_PAD_LEFT);

        return "CS{$number}";
    }

    public static function generateAssetIARNo()
    {
        $year = date('Y');
        $lastIarNo = self::where('iar_no', 'like', $year.'-%')->orderBy('iar_no', 'desc')->first();

        if ($lastIarNo) {
            $number = intval(substr($lastIarNo->iar_no, 5)) + 1;
        } else {
            $number = 1;
        }
        $number = str_pad($number, 4, '0', STR_PAD_LEFT);

        return $year . '-' . $number;
    }

    public static function generatePropertyNo()
    {
        $year = date('Y');
        $lastPropertyNo = self::where('property_no', 'like', $year.'-%')->orderBy('property_no', 'desc')->first();

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

    public static function generateParNo()
    {
        $year = date('Y');
        $lastParNo = self::where('par_no', 'like', $year.'-%')->orderBy('par_no', 'desc')->first();

        if ($lastParNo) {
            $number = intval(substr($lastParNo->iar_no, 5)) + 1;
        } else {
            $number = 1;
        }
        $number = str_pad($number, 4, '0', STR_PAD_LEFT);

        return $year . '-' . $number;
    }
}
