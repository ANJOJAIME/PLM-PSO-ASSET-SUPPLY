<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $fillable = [
        'item_no',
        'description',
        'supplier',
        'tin_no',
        'po_no',
        'pr_no',
        'mode_of_proc',
        'place_dev',
        'date_dev',
        'price_val',
        'payment_term',
        'quantity',
        'unit',
        'unit_cost',
    ];

    protected $table = 'purchase_order';

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
}