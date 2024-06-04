<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Delivered extends Model
{
    use HasFactory;

    protected $table = 'delivered';
    protected $primaryKey = 'id';
    protected $fillable = [
        'actual_delivery_date',
        'stock_no',
        'iar_no',
        'item_no',
        'stock_no',
        'item_description',
        'delivered',
        'unit',
        'dr_no',
        'check_no',
        'po_no',
        'po_date',
        'po_amount',
        'pr_number',
        'price_per_purchase_request',
        'bur',
        'remarks',
        'supplier',
        'photo',
    ];

    public function getKeyName()
    {
        return 'id';
    }

    use SoftDeletes;

    public static function generateIARNo()
    {
        $date = now();
        $year = $date->format('Y'); // Get the four-digit year
        $month = $date->format('m'); // Get the two-digit month
        $maxNumber = 0;
        $number = str_pad($maxNumber + 1, 4, '0', STR_PAD_LEFT);

        return "S{$year}-{$month}-{$number}";
    }

    public static function generateStockNo($stock_type)
    {
        $prefixes = ['CS', 'GOS', 'MIS', 'MIM', 'OUR', 'IBM'];

        if (!in_array($stock_type, $prefixes)) {
            throw new \Exception("Invalid stock type: {$stock_type}");
        }

        $stockNos = self::withTrashed()->where('stock_no', 'like', "{$stock_type}%")->pluck('stock_no')->toArray();

        $maxNumber = 0;
        foreach ($stockNos as $stockNo) {
            $number = intval(substr($stockNo, strlen($stock_type)));
            if ($number > $maxNumber) {
                $maxNumber = $number;
            }
        }

        // Increment the number
        $number = str_pad($maxNumber + 1, 4, '0', STR_PAD_LEFT);

        return "{$stock_type}{$number}";
    }


    public static function generateItemNo()
    {
        // Get all item_no values, including soft deleted items
        $itemNos = self::withTrashed()->pluck('item_no')->toArray();

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
