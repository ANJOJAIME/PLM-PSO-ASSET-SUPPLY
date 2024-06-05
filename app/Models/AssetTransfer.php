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
        'at_are_no',
        'at_received_from',
        'at_received_by',
        'at_received_from_office',
        'at_used_in_office',
        'at_date_received',
        'at_end_user',
        'at_new_are_no',
        'at_prs_no',
    ];

    public function getKeyName()
    {
        return 'id';
    }
    use SoftDeletes;

    public static function generatePrsNo()
    {
        $year = date('Y');
        $lastPrsNo = self::where('at_prs_no', 'like', $year.'-%')->orderBy('at_prs_no', 'desc')->first();

        if ($lastPrsNo) {
            $number = intval(substr($lastPrsNo->at_prs_no, 5)) + 1;
        } else {
            $number = 1;
        }
        $number = str_pad($number, 4, '0', STR_PAD_LEFT);

        return $year . '-' . $number;
    }
}
