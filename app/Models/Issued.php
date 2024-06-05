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

    public function generateReportNo()
    {
        // Get the current year and month
        $year = date('Y');
        $month = date('m');

        // Get the last issued report
        $lastIssued = $this->orderBy('created_at', 'desc')->first();

        // If there's no last issued report, start from 1
        $number = $lastIssued ? intval(substr($lastIssued->report_no, -4)) + 1 : 1;

        // Return the formatted report_no
        return $year . '-' . $month . '-' . str_pad($number, 4, '0', STR_PAD_LEFT);
    }
    
    public function generateRisNo()
    {
        // Get the last two digits of the current year and the current month
        $year = substr(date('Y'), -2);
        $month = date('m');

        // Get the last issued report
        $lastIssued = $this->orderBy('created_at', 'desc')->first();

        // If there's no last issued report, start from 1
        $number = $lastIssued ? intval(substr($lastIssued->ris_no, -4)) + 1 : 1;

        // Return the formatted ris_no
        return $year . '-' . $month . '-' . str_pad($number, 4, '0', STR_PAD_LEFT);
    }
}
