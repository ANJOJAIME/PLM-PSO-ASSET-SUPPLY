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
}
