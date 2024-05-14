<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Issued extends Model
{
    protected $fillable = [
        'date_issuance',
        'requesting_office',
        'report_no',
        'ris_no',
        'stock_no',
        'description',
        'issued',
    ];
    protected $table = 'issued';
    use SoftDeletes;

}
