<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    use SoftDeletes;

    public static function generatePrsNo()
    {
        $year = date('Y');
        $lastPrsNo = self::where('prs_no', 'like', $year.'-%')->orderBy('prs_no', 'desc')->first();

        if ($lastPrsNo) {
            $number = intval(substr($lastPrsNo->prs_no, 5)) + 1;
        } else {
            $number = 1;
        }
        $number = str_pad($number, 4, '0', STR_PAD_LEFT);

        return $year . '-' . $number;
    }
}
