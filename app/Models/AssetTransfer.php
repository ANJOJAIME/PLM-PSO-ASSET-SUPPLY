<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetTransfer extends Model
{
    use HasFactory;

    protected $table = 'asset_transfer';
    protected $primaryKey = 'id';
    protected $fillable = [
        'are_no',
        'received_from',
        'received_by',
        'received_from_office',
        'used_in_office',
        'date_received',
        'end_user',
        'new_are_no',
        'prs_no',
    ];

    public function getKeyName()
    {
        return 'id';
    }
}
