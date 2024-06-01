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
        'balance_after',
        'status',
    ];

        use SoftDeletes;

    public function getTotalDeliveredAttribute()
    {
        return self::where('description', $this->description)->sum('delivered');
    }

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

    

    public static function generatePrNo()
    {
        $date = now();
        $year = $date->format('Y');
        // Get all pr_no values, including soft deleted items
        $prNos = self::withTrashed()->pluck('pr_no')->toArray();
        // Extract the numeric part of each pr_no and get the maximum value
        $maxNumber = 0;
        foreach ($prNos as $prNo) {
            $number = intval(substr($prNo, 5, 2));
            if ($number > $maxNumber) {
                $maxNumber = $number;
            }
        }
        // Increment the number
        $number = str_pad($maxNumber + 1, 2, '0', STR_PAD_LEFT);
        $prNo = "{$year}-00-00-{$number}-00";
        
        // Check if the generated pr_no already exists
        while (in_array($prNo, $prNos)) {
            $maxNumber++;
            $number = str_pad($maxNumber, 2, '0', STR_PAD_LEFT);
            $prNo = "{$year}-00-00-{$number}-00";
        }
        
        return $prNo;
    }
}
