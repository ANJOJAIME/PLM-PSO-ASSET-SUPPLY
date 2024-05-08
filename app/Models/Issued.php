<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issued extends Model
{
    use HasFactory;
    protected $table = 'issued';
    protected $primaryKey = 'id';
    protected $fillable = [
        'date_issuance',
        'stock_no',
        'report_no',
        'requesting_office',
        'quantity_issued',
        'ris_no',
        'description',
    ];

    public function getTotalQuantityIssuedAttribute()
    {
        return self::where('description', $this->description)->sum('quantity_issued');
    }
}
