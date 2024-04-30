<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Supplies;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\PDF;
use Picqer\Barcode\BarcodeGeneratorHTML;


class SuppliesController extends Controller
{
    //MAIN TABLE
    public function calendar()
    {
        return view('pages.supplies.calendar');
    }
    public function displaysupplies()
    {
        $supplies = Supplies::where('added', true)->get();
        $notifications = Notification::all();

        return view('pages.supplies.displaysupplies', ['supplies' => $supplies, 'notifications' => $notifications]);
    }

    public function addsupply()
    {
        $items = Supplies::all();

        return view('pages.supplies.addsupply', ['items' => $items]);
    }

    public function storenewsupply(Request $request)
    {
        $validatedData = $request->validate([
            'pr_no' => 'required',
        ]);

        // Try to find the item with the provided stock_no
        $supply = Supplies::where('pr_no', $request->input('pr_no'))->first();

        if ($supply) {
            $supply->added = true;
        } else {
            $supply = new Supplies;
            $supply->pr_no = $request->input('pr_no');
            $supply->added = true;
        }

        $supply->save();

        $notification = new Notification;
        $notification->type = 'Add';
        $notification->item = $supply->pr_no;
        $notification->save();

        return redirect('/supplies-view')->with('status', 'Supply Added Successfully!');
    }
 
    public function editsupply($pr_no)
    {
        $supply = Supplies::where('pr_no', $pr_no)->first();
        return view('pages.supplies.editsupply', ['supply' => $supply]);
    }

    public function updatesupply(Request $request, $pr_no)
    {
            $request->validate([
                'stock_no' => 'required',
                'description' => 'required',
                'unit' => 'required',
            ]);
        $supply = Supplies::find($pr_no);
        $supply->stock_no = $request->input('stock_no');
        $supply->description = $request->input('description');
        $supply->unit = $request->input('unit');
        $supply->update();

        $notification = new Notification;
        $notification->type = 'Edit';
        $notification->details =  $supply->pr_no;
        $notification->item =  $supply->description;
        $notification->save();

        return redirect('/supplies-view')->with('status', 'Supply Updated Successfully!');
    }

    public function deletesupply($stock_no)
    {
        $supply = Supplies::where('stock_no', $stock_no)->first();
        $supply->delete();

        $notification = new Notification;
        $notification->type = 'Delete';
        $notification->details =  $supply->stock_no;
        $notification->item =  $supply->description;
        $notification->save();
        
        return redirect('/supplies-view')->with('status', 'Supply Deleted Successfully! Item can be recovered in archive...');
    }

    public function search(Request $request)
    {
        $stock_no = $request->input('stock_no');
        $supplies = Supplies::where('stock_no', 'like', "%{$stock_no}%")->get();
        $notifications = Notification::all(); // Fetch all notifications

        return view('pages.supplies.displaysupplies', ['supplies' => $supplies, 'notifications' => $notifications, 'searched_stock_no' => $stock_no]); // Pass both supplies and notifications to the view
    }

    //ISSUED TABLE
    public function displayissued()
    {
        $issued = Supplies::where('added', true)->get();
        $searched_stock_no = request('stock_no');
        return view('pages.supplies.displayissued', ['issued' => $issued, 'searched_stock_no' => $searched_stock_no]);
    }

    public function issuedsearch(Request $request)
    {
        $stock_no = $request->input('stock_no');
        $issued = Supplies::where('stock_no', 'like', "%{$stock_no}%")->get();

        return view('pages.supplies.displayissued', ['issued' => $issued, 'searched_stock_no' => $stock_no]);
    }

    public function editissued($stock_no)
    {
        $issued = Supplies::where('stock_no', $stock_no)->first();
        return view('pages.supplies.editissued', compact('issued'));
    }

    public function updateissued(Request $request, $stock_no)
    {
            $request->validate([
                'date_issuance' => 'required',
                'requesting_office' => 'required',
                'report_no' => 'required',
                'ris_no' => 'required',
                'issued' => 'required',
            ]);
        $issued = Supplies::where('stock_no', $stock_no)->first();
        $issued->date_issuance = $request->input('date_issuance');
        $issued->requesting_office = $request->input('requesting_office');
        $issued->report_no = $request->input('report_no');
        $issued->ris_no = $request->input('ris_no');
        $issued->issued = $request->input('issued');
        $issued->update();
        return redirect('/issued-supplies-view')->with('status', 'Issued Supply Updated Successfully!');
    }

    //DELIVERED TABLE
    public function displaydelivered()
    {
        $delivered = Supplies::where('added', true)->get();
        $searched_stock_no = request('stock_no');
        return view('pages.supplies.displaydelivered', ['delivered' => $delivered, 'searched_stock_no' => $searched_stock_no]);
    }

    public function deliveredsearch(Request $request)
    {
        $stock_no = $request->input('stock_no');
        $delivered = Supplies::where('stock_no', 'like', "%{$stock_no}%")->get();

        return view('pages.supplies.displaydelivered', ['delivered' => $delivered, 'searched_stock_no' => $stock_no]);
    }

    public function editdelivered($stock_no)
    {
        $delivered = Supplies::where('stock_no', $stock_no)->first();
        return view('pages.supplies.editdelivered', compact('delivered'));
    }

    public function updatedelivered(Request $request, $stock_no)
    {
            $request->validate([
                'delivery_date' => 'required',
                'actual_delivery_date' => 'required',
                'acceptance_date' => 'required',
                'delivered' => 'required',
                'iar_no' => 'required',
                'item_no' => 'required',
                'dr_no' => 'required',
                'check_no' => 'required',
                'po_no' => 'required',
                'po_date' => 'required',
                'description' => 'required',
                'unit' => 'required',
                'po_date' => 'required',
                'po_amount' => 'required',
                'pr_no' => 'required',
                'price_per_purchase_request' => 'required',
                'bur' => 'required',
                'remarks' => 'required',
            ]);
        
        $delivered = Supplies::where('stock_no', $stock_no)->first();
        $delivered->delivery_date = $request->input('delivery_date');
        $delivered->actual_delivery_date = $request->input('actual_delivery_date');
        $delivered->acceptance_date = $request->input('acceptance_date');
        $delivered->delivered = $request->input('delivered');
        $delivered->iar_no = $request->input('iar_no');
        $delivered->item_no = $request->input('item_no');
        $delivered->dr_no = $request->input('dr_no');
        $delivered->check_no = $request->input('check_no');
        $delivered->po_no = $request->input('po_no');
        $delivered->description = $request->input('description');
        $delivered->unit = $request->input('unit');
        $delivered->po_date = $request->input('po_date');
        $delivered->po_amount = $request->input('po_amount');
        $delivered->pr_no = $request->input('pr_no');
        $delivered->price_per_purchase_request = $request->input('price_per_purchase_request');
        $delivered->bur = $request->input('bur');
        $delivered->remarks = $request->input('remarks');
        $delivered->update();
        return redirect('/delivered-supplies-view')->with('status', 'Delivered Supply Updated Successfully!');
    }

    //ARCHIVE CONTROLLER
    public function destroy(Supplies $supply)
    {
        $supply->delete();

        return redirect()->route('pages.supplies.displaysupplies');
    }

    public function archive()
    {
        $supplies = Supplies::onlyTrashed()->get();

        return view('pages.supplies.archive', ['supplies' => $supplies]);
    }

    public function recover($stock_no)
    {
        $supply = Supplies::onlyTrashed()->where('stock_no', $stock_no)->first();

        if ($supply) {
            $supply->restore();

            $notification = new Notification;
            $notification->type = 'Recover Item';
            $notification->details =  $supply->stock_no;
            $notification->item =  $supply->description;
            $notification->save();

            return redirect()->route('pages.supplies.archive');
        }

        // Handle the case where $supply is null, e.g., show an error message
        return redirect()->route('pages.supplies.archive')->with('error', 'Supply not found');
    }

    public function forceDelete($stock_no)
    {
        $supply = Supplies::onlyTrashed()->where('stock_no', $stock_no)->first();
    
        $supply->forceDelete();
        $notification = new Notification;
        $notification->type = 'Item Permanently Delete';
        $notification->details =  $supply->stock_no;
        $notification->item =  $supply->description;
        $notification->save();
    
        return redirect()->route('pages.supplies.archive');
    }

    //NO. GENERATION
    public function generateIARNo()
    {
        return response()->json(['iar_no' => Supplies::generateIARNo()]);
    }

    public function generateStockNo()
    {
        return response()->json(['stock_no' => Supplies::generateStockNo()]);
    }

    public function generateItemNo()
    {
        return response()->json(['item_no' => Supplies::generateItemNo()]);
    }

    //USER PROFILE
    public function displayprofile()
    {
        $user = Auth::user();

        if ($user) {
            return view('pages.supplies.supplyprofile', ['user' => $user]);
        } else {
            return redirect('/Supply-login')->with('error', 'You must be logged in to see this page');
        }
    }

    //PDF
    public function displayPDF()
    {
        $supplies = Supplies::all();
        return view('pages.supplies.order', ['supplies' => $supplies]);
    }

    public function downloadPDF()
    {
        $supplies = Supplies::where('added', true)->get();
        $pdf = PDF::loadView('pages.supplies.order', ['supplies' => $supplies])->setPaper('a4', 'landscape');
        return $pdf->download('General Report Supplies.pdf');
    }
    
    public function forms()
    {
        $supplies = Supplies::all();
        return view('pages.supplies.suppliesforms', ['supplies' => $supplies]);
    }

    public function getItemDetails(Request $request)
    {
        $item_no = $request->item_no;
        $item = Item::where('item_no', $item_no)->first();

        return response()->json([
            'unit' => $item->unit,
            'description' => $item->description
        ]);
    }

    //Forms' view
    //PURCHASE REQUEST
    public function PRForm()
    {
        $supplies = Supplies::all();
        return view('pages.supplies.purchaserequest', ['supplies' => $supplies]);
    }
    
    public function generatePDF(Request $request)
    {
        // Store the form data in the session
        $request->session()->put('form_data', $request->all());

        // Retrieve all supplies
        $supplies = Supplies::all();

        $pdf = PDF::loadView('pages.supplies.purchaserequest', ['pdf' => true, 'supplies' => $supplies]);
        // Download the PDF
        return $pdf->download('purchase_request.pdf');
    }

    public function getUnit(Request $request) 
    {
        $item_no = $request->get('item_no');
        $supply = Supplies::all()->where('item_no', $item_no)->first();
        return response()->json(['unit' => $supply->unit, 'description' => $supply->description]);
    }
    //REQUISITION AND ISSUE SLIP
    public function RISForm()
    {
        $supplies = Supplies::all();
        return view('pages.supplies.risform', ['supplies' => $supplies]);
    }
    public function generatePDF1(Request $request)
    {
        // Store the form data in the session
        $request->session()->put('form_data', $request->all());

        // Retrieve all supplies
        $supplies = Supplies::all();

        $pdf = PDF::loadView('pages.supplies.risform', ['pdf' => true, 'supplies' => $supplies]);
        // Download the PDF
        return $pdf->download('requistion_issue_slip.pdf');
    }
    public function getUnit1(Request $request) 
    {
        $stock_no = $request->get('stock_no');
        $supply = Supplies::all()->where('stock_no', $stock_no)->first();
        return response()->json(['unit' => $supply->unit, 'description' => $supply->description]);
    }
    //INSPECTION AND ACCEPTANCE REPORT
    public function IARForm()
    {
        $supplies = Supplies::all();
        return view('pages.supplies.iarform', ['supplies' => $supplies]);
    }
    
    public function generatePDF2(Request $request)
    {
        // Store the form data in the session
        $request->session()->put('form_data', $request->all());

        // Retrieve all supplies
        $supplies = Supplies::all();

        $pdf = PDF::loadView('pages.supplies.iarform', ['pdf' => true, 'supplies' => $supplies]);
        // Download the PDF
        return $pdf->download('inspection_acceptance.pdf');
    }

    public function getUnit2(Request $request) 
    {
        $item_no = $request->get('item_no');
        $supply = Supplies::all()->where('item_no', $item_no)->first();
        return response()->json(['unit' => $supply->unit]);
    }

    //BARCODE
    public function generateBarcode(Request $request)
    {
        $item_no = $request->get('stock_no');
        $supply = Supplies::where('stock_no', $item_no)->first();

        if (!$supply) {
            return response()->json(['error' => 'Item not found'], 404);
        }

        $data = $supply->item_no . ', ' .
                $supply->description . ', ' .
                $supply->unit . ', ' .
                $supply->date_issuance . ', ' .
                $supply->requesting_office . ', ' .
                $supply->report_no . ', ' .
                $supply->ris_no;

        $generator = new BarcodeGeneratorHTML();
        $barcode = $generator->getBarcode($data, $generator::TYPE_CODE_128);

        $pdf = PDF::loadView('pages.supplies.barcode', ['barcode' => $barcode]);
        $pdf->setPaper([0, 0, 127, 254], 'landscape');
        
        return $pdf->download($supply->stock_no . '_barcode.pdf');
    }

}
