<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupplyDelivered;
use PDF;
class PDFController extends Controller
{
    public function downloadPDF()
    {
        $deliveredsupply = SupplyDelivered::all();
        $data = [
            'iar_no' => 'All Posts Data',
            'po_no' => 'All Posts Data',
            'bur_no' => 'All Posts Data',
            'po_date' => date('m/d/Y'),
            'pr_no' => 'All Posts Data',
            'item_no' => 'All Posts Data',
            'unit' => 'All Posts Data'
        ];

        $pdf = PDF::loadView('handlepdf.iarform', $data);
        return $pdf->stream('pdf_file.pdf');
    }
}
