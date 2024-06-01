<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;   

class SemiEx extends Model
{
    use HasFactory;

    protected $table = 'semi_ex';
    protected $primaryKey = 'id';
    protected $fillable = [
        's_item_no',
        's_po_number',
        's_ics_no',
        's_quantity',
        's_acquisition_cost',
        's_site',
        's_location',
        's_office',
        's_accountable_id',
        's_remarks',
        's_updated_by',
        's_transaction_date',
    ];

    public function getKeyName()
    {
        return 'id';
    }

    use SoftDeletes;
}
