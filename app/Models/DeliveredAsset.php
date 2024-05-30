<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeliveredAsset extends Model
{
    protected $table = 'delivered_asset';
    protected $primaryKey = 'id';
    protected $fillable = [
        'd_item_no',
        'd_description',
        'd_unit',
        'd_iar_no',
        'd_supplier',
        'd_pr_no',
        'd_po_no',
        'd_bur_no',
        'd_invoice_no',
        'd_date_invoice',
        'd_qty',
        'd_unit_cost',
        'd_total_cost',
        'd_date_po',
    ];

    public function getKeyName()
    {
        return 'id';
    }
    use SoftDeletes;

    public function getTotalDeliveredAttribute()
    {
        return DeliveredAsset::where('d_description', $this->d_description)->sum('d_qty');
    }

    public static function generateAssetIARNo()
    {
        $year = date('Y');
        $lastIarNo = self::where('d_iar_no', 'like', $year.'-%')->orderBy('d_iar_no', 'desc')->first();

        if ($lastIarNo) {
            $number = intval(substr($lastIarNo->d_iar_no, 5)) + 1;
        } else {
            $number = 1;
        }
        $number = str_pad($number, 4, '0', STR_PAD_LEFT);

        return $year . '-' . $number;
    }
}
