<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplies extends Model
{
    //use HasFactory;
    protected $fillable = [
        'stock_no',
        'description',
        'unit',
        'delivered',
        'issued',
        'date_issuance',
        'requesting_office',
        'report_no',
        'ris_no',
        'delivery_date',
        'actual_delivery_date',
        'acceptance_date',
        'iar_no',
        'item_no',
        'dr_no',
        'check_no',
        'po_no',
        'po_date',
        'po_amount',
        'pr_no',
        'price_per_purchase_request',
        'bur',
        'remarks',
    ];

        use SoftDeletes;

    public function getKeyName()
    {
        return 'pr_no';
    }
    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($supply) {
            $supply->stock_no = self::generateStockNo();
        });
    }
    public static function generateIARNo()
    {
        $date = now();
        $year = $date->format('y');
        $month = $date->format('m');
        // Get all stock_no values
        $iarNos = self::pluck('iar_no')->toArray();

        // Extract the last 4 digits of each stock_no and get the maximum value
        $maxNumber = 0;
        foreach ($iarNos as $iarNo) {
            $number = intval(substr($iarNo, -4));
            if ($number > $maxNumber) {
                $maxNumber = $number;
            }
        }
        // Increment the number
        $number = str_pad($maxNumber + 1, 4, '0', STR_PAD_LEFT);

        return "S{$year}-{$month}-{$number}";
    }

    public static function generateStockNo()
    {
        // Get all stock_no values
        $stockNos = self::pluck('stock_no')->toArray();

        // Extract the last 3 digits of each stock_no and get the maximum value
        $maxNumber = 0;
        foreach ($stockNos as $stockNo) {
            $number = intval(substr($stockNo, 2)); // start at 2 to skip the "CS"
            if ($number > $maxNumber) {
                $maxNumber = $number;
            }
        }
        // Increment the number
        $number = str_pad($maxNumber + 1, 3, '0', STR_PAD_LEFT);

        return "CS{$number}";
    }

    public static function generateItemNo()
    {
        // Get all item_no values
        $itemNos = self::pluck('item_no')->toArray();

        // Extract the numeric part of each item_no and get the maximum value
        $maxNumber = 0;
        foreach ($itemNos as $itemNo) {
            $number = intval($itemNo);
            if ($number > $maxNumber) {
                $maxNumber = $number;
            }
        }
        $number = str_pad($maxNumber + 1, 3, '0', STR_PAD_LEFT);

        return $number;
    }
}
