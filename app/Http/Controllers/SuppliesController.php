<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplies;
use App\Models\Issued;
use App\Models\User;
use App\Models\Supplier;
use App\Models\Department;
use App\Models\Delivered;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\PDF;
use Picqer\Barcode\BarcodeGeneratorHTML;


class SuppliesController extends Controller
{
    //MAIN TABLE
    public function displaysupplies()
    {
        $notifications = Notification::all();
        $supplies = Issued::select('description')
                    ->groupBy('description')
                    ->get();
        $issuedTotals = Issued::select('description', \DB::raw('SUM(quantity_issued) as total_quantity'))
                            ->groupBy('description')
                            ->pluck('total_quantity', 'description');
        $totalDelivered = Delivered::select('item_description', \DB::raw('SUM(delivered) as total_delivered')) // Use 'item_description'
                            ->groupBy('item_description') // Use 'item_description'
                            ->pluck('total_delivered', 'item_description'); // Use 'item_description'

        return view('pages.supplies.displaysupplies', ['supplies' => $supplies, 'notifications' => $notifications, 'issuedTotals' => $issuedTotals, 'totalDelivered' => $totalDelivered]);
    }


    //ISSUED TABLE
    public function displayissued()
    {
        $issued = Issued::all();
        $searched_description = request('description');
        $notifications = Notification::all();
        
        return view('pages.supplies.displayissued', ['issued' => $issued, 'searched_description' => $searched_description, 'notifications' => $notifications]);
    }

    public function issuedsearch(Request $request)
    {
        $description = $request->input('description');
        $issued = Issued::where('description', 'like', "%{$description}%")->get();
        $notifications = Notification::all();

        return view('pages.supplies.displayissued', ['issued' => $issued, 'searched_description' => $description, 'notifications' => $notifications]);
    }

    public function addissued()
    {
        $items = Delivered::all();
        $delivered = Delivered::select('item_description', 'unit')
                     ->distinct('item_description')
                     ->get();
        $issuedTotals = Issued::select('description', \DB::raw('SUM(quantity_issued) as total_quantity'))
                            ->groupBy('description')
                            ->pluck('total_quantity', 'description');
        $totalDelivered = Delivered::select('item_description', \DB::raw('SUM(delivered) as total_delivered'))
                            ->groupBy('item_description')
                            ->pluck('total_delivered', 'item_description');
        $departments = Department::all();
        
        return view('pages.supplies.addissued', ['items' => $items, 'supplies' => $delivered, 'issuedTotals' => $issuedTotals, 'departments' => $departments, 'totalDelivered' => $totalDelivered]);
    }
    

    public function deleteissued($stock_no)
    {
        $issued = Issued::where('stock_no', $stock_no)->first();
        $issued->delete();

        $notification = new Notification;
        $notification->type = 'Delete';
        $notification->details =  $issued->stock_no;
        $notification->item =  $issued->description;
        $notification->save();

        return redirect('/issued-supplies-view')->with('status', 'Issued Supply Deleted Successfully! Item can be recovered in archive...');
    }

    public function storenewissued(Request $request)
    {
        $issued = new Issued;
        
        $validatedData = $request->validate([
            'stock_no' => 'required',
            'date_issuance' => 'required',
            'report_no' => 'required',
            'requesting_office' => 'required',
            'quantity_issued' => 'required',
            'ris_no' => 'required',
            'description' => 'required',
        ]);

        $issued->date_issuance = $request->input('date_issuance');
        $issued->stock_no = $request->input('stock_no');
        $issued->report_no = $request->input('report_no');
        $issued->requesting_office = $request->input('requesting_office');
        $issued->quantity_issued = $request->input('quantity_issued');
        $issued->ris_no = $request->input('ris_no');
        $issued->description = $request->input('description');

        $issued->save();

        $notification = new Notification;
        $notification->type = 'Add';
        $notification->details =  $issued->stock_no;
        $notification->item = $issued->description;
        $notification->save();

        return redirect('/issued-supplies-view')->with('status', 'Issued Supply Added Successfully!');
    }

    public function editissued($stock_no)
    {
        $issued = Issued::where('stock_no', $stock_no)->first();

        return view('pages.supplies.editissued', ['issued' => $issued]);
    }

    public function updateissued(Request $request, $stock_no)
    {
        $issued = Issued::where('stock_no', $stock_no)->first();

        if (!$issued) {
            return redirect('issued-supplies-view')->with('error', 'No matching record found!');
        }
        $issued->description = $request->input('description');
        $issued->date_issuance = $request->input('date_issuance');
        $issued->stock_no = $request->input('stock_no');
        $issued->report_no = $request->input('report_no');
        $issued->requesting_office = $request->input('requesting_office');
        $issued->quantity_issued = $request->input('quantity_issued');
        $issued->ris_no = $request->input('ris_no');
    
        $issued->save();
    
        return redirect('issued-supplies-view')->with('status', 'Issued Supply Updated Successfully!');
    }

    //DELIVERED TABLE
    public function displaydelivered()
    {
        $delivered = Delivered::all();
        $searched_item_description = request('item_description');
        $notifications = Notification::all();
        
        return view('pages.supplies.displaydelivered', ['delivered' => $delivered, 'searched_item_description' => $searched_item_description, 'notifications' => $notifications]);
    }

    public function deliveredsearch(Request $request)
    {
        $item_description = $request->input('item_description');
        $delivered = Delivered::where('item_description', 'like', "%{$item_description}%")->get();
        $notifications = Notification::all();

        return view('pages.supplies.displaydelivered', ['delivered' => $delivered, 'searched_item_description' => $item_description, 'notifications' => $notifications]);
    }

    public function adddelivered()
    {
        $delivered = Delivered::all();
        $suppliers = Supplier::all();

        return view('pages.supplies.adddelivered', ['delivered' => $delivered, 'suppliers' => $suppliers]);
    }

    public function storenewdelivered(Request $request)
    {
        $delivered = new Delivered;
        
        $validatedData = $request->validate([
            'stock_type' => 'required',
            'actual_delivery_date' => 'required',
            'iar_no' => 'required',
            'item_no' => 'required',
            'stock_no' => 'required',
            'item_description' => 'required',
            'supplier' => 'required',
            'delivered' => 'required',
            'unit' => 'required',
            'dr_no' => 'required',
            'check_no',
            'po_no' => 'required',
            'po_date' => 'required',
            'po_amount' => 'required',
            'pr_number' => 'required',
            'price_per_purchase_request' => 'required',
            'bur' => 'required',
            'remarks' => 'required',
            'photo' => 'image|mimes:jpeg,jpg|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            $imageName = time().'.'.$request->photo->extension();  
            $request->photo->move(public_path('images'), $imageName);
        }

        $delivered->actual_delivery_date = $request->input('actual_delivery_date');
        $delivered->stock_type = $request->input('stock_type');
        $delivered->iar_no = $request->input('iar_no');
        $delivered->item_no = $request->input('item_no');
        $delivered->stock_no = $request->input('stock_no');
        $delivered->item_description = $request->input('item_description');
        $delivered->supplier = $request->input('supplier');
        $delivered->unit = $request->input('unit');
        $delivered->delivered = $request->input('delivered');
        $delivered->dr_no = $request->input('dr_no');
        $delivered->check_no = $request->input('check_no');
        $delivered->po_no = $request->input('po_no');
        $delivered->po_date = $request->input('po_date');
        $delivered->po_amount = $request->input('po_amount');
        $delivered->pr_number = $request->input('pr_number');
        $delivered->price_per_purchase_request = $request->input('price_per_purchase_request');
        $delivered->bur = $request->input('bur');
        $delivered->remarks = $request->input('remarks');
        $delivered->photo = $imageName;
        $delivered->save();

        $notification = new Notification;
        $notification->type = 'Add';
        $notification->details =  $delivered->stock_no;
        $notification->item =  $delivered->item_description;
        $notification->save();

        return redirect('/delivered-supplies-view')->with('status', 'Delivered Supply Added Successfully!');
    }

    public function deletedelivered($stock_no)
    {
        $delivered = Delivered::where('stock_no', $stock_no)->first();
        $delivered->delete();

        $notification = new Notification;
        $notification->type = 'Delete';
        $notification->details =  $delivered->stock_no;
        $notification->item =  $delivered->item_description;
        $notification->save();

        return redirect('/delivered-supplies-view')->with('status', 'Delivered Supply Deleted Successfully! Item can be recovered in archive...');
    }

    public function editdelivered($stock_no)
    {
        $delivered = Delivered::where('stock_no', $stock_no)->first();
        return view('pages.supplies.editdelivered', ['delivered' => $delivered]);
    }

    public function updatedelivered(Request $request, $stock_no)
    {
        $delivered = Delivered::where('stock_no', $stock_no)->first();

        if (!$delivered) {
            return redirect('delivered-supplies-view')->with('error', 'No matching record found!');
        }

        $delivered->actual_delivery_date = $request->input('actual_delivery_date');
        $delivered->stock_type = $request->input('stock_type');
        $delivered->iar_no = $request->input('iar_no');
        $delivered->item_no = $request->input('item_no');
        $delivered->stock_no = $request->input('stock_no');
        $delivered->item_description = $request->input('item_description');
        $delivered->supplier = $request->input('supplier');
        $delivered->unit = $request->input('unit');
        $delivered->delivered = $request->input('delivered');
        $delivered->dr_no = $request->input('dr_no');
        $delivered->check_no = $request->input('check_no');
        $delivered->po_no = $request->input('po_no');
        $delivered->po_date = $request->input('po_date');
        $delivered->po_amount = $request->input('po_amount');
        $delivered->pr_number = $request->input('pr_number');
        $delivered->price_per_purchase_request = $request->input('price_per_purchase_request');
        $delivered->bur = $request->input('bur');
        $delivered->remarks = $request->input('remarks');

        $delivered->save();
    
        return redirect('delivered-supplies-view')->with('status', 'Delivered Supply Updated Successfully!');
    }

    //DEPARTMENT
    public function displaydepartment()
    {
        $departments = Department::all();
        $searched_dept = request('department_name');
        $notifications = Notification::all();
    
        return view('pages.supplies.displaydepartment', ['departments' => $departments, 'notifications' => $notifications, 'searched_dept' => $searched_dept]);
    }

    public function departmentsearch(Request $request)
    {
        $department_name = $request->input('department_name');
        $departments = Department::where('department_name', 'like', "%{$department_name}%")->get();
        $notifications = Notification::all();

        return view('pages.supplies.displaydepartment', ['departments' => $departments, 'searched_dept' => $department_name, 'notifications' => $notifications]);
    }
    
    public function adddepartment()
    {
        $departments = Department::all();   
        return view('pages.supplies.adddepartment');
    }

    public function storedepartment(Request $request)
    {
        $department = new Department;
        
        $validatedData = $request->validate([
            'department_name' => 'required',
            'department_head' => 'required',
            'contact' => 'required',
        ]);

        $department->department_name = $request->input('department_name');
        $department->department_head = $request->input('department_head');
        $department->contact = $request->input('contact');

        $department->save();

        $notification = new Notification;
        $notification->type = 'Add';
        $notification->details =  $department->department_name;
        $notification->item =  $department->department_head;
        $notification->save();

        return redirect('/plm-departments')->with('status', 'Department Added Successfully!');
    }

    public function deletedepartment($id)
    {
        $department = Department::where('id', $id)->first();
        $department->delete();

        $notification = new Notification;
        $notification->type = 'Delete';
        $notification->details =  $department->department_name;
        $notification->item =  $department->department_head;
        $notification->save();

        return redirect('/plm-departments')->with('status', 'Department Deleted Successfully!');
    }

    //ARCHIVE CONTROLLER
    //ISSUED
    public function destroyIssued(Issued $issued)
    {
        $issued->delete();

        return redirect()->route('pages.issued.displayissued');
    }

    public function archiveIssued()
    {
        $issued = Issued::onlyTrashed()->get();

        return view('pages.supplies.issuedarchive', ['issued' => $issued]);
    }

    public function recoverIssued($stock_no)
    {
        $issued = Issued::onlyTrashed()->where('stock_no', $stock_no)->first();

        if ($issued) {
            $issued->restore();

            $notification = new Notification;
            $notification->type = 'Recover Item';
            $notification->details =  $issued->stock_no;
            $notification->item =  $issued->description;
            $notification->save();

            return redirect()->route('pages.issued.archive');
        }

        // Handle the case where $supply is null, e.g., show an error message
        return redirect()->route('pages.issued.archive')->with('error', 'Issued Supply not found');
    }

    public function forceDeleteIssued($stock_no)
    {
        $issued = Issued::onlyTrashed()->where('stock_no', $stock_no)->first();
    
        $issued->forceDelete();
        $notification = new Notification;
        $notification->type = 'Item Permanently Delete';
        $notification->details =  $issued->stock_no;
        $notification->item =  $issued->description;
        $notification->save();
    
        return redirect()->route('pages.issued.archive');
    }

    //DELIVERED
    public function destroyDelivered(Delivered $delivered)
    {
        $delivered->delete();

        return redirect()->route('pages.delivered.displaydelivered');
    }

    public function archiveDelivered()
    {
        $delivered = Delivered::onlyTrashed()->get();

        return view('pages.supplies.archive', ['delivered' => $delivered]);
    }

    public function recoverDelivered($stock_no)
    {
        $delivered = Delivered::onlyTrashed()->where('stock_no', $stock_no)->first();

        if ($delivered) {
            $delivered->restore();

            $notification = new Notification;
            $notification->type = 'Recover Item';
            $notification->details =  $delivered->stock_no;
            $notification->item =  $delivered->item_description;
            $notification->save();

            return redirect()->route('pages.delivered.archive');
        }
        return redirect()->route('pages.delivered.archive')->with('error', 'Delivered Supply not found');
    }

    public function forceDeleteDelivered($stock_no)
    {
        $delivered = Delivered::onlyTrashed()->where('stock_no', $stock_no)->first();
    
        $delivered->forceDelete();
        $notification = new Notification;
        $notification->type = 'Item Permanently Delete';
        $notification->details =  $delivered->stock_no;
        $notification->item =  $delivered->item_description;
        $notification->save();
    
        return redirect()->route('pages.delivered.archive');
    }
    
    //NO. GENERATION
    public function generateIARNo()
    {
        return response()->json(['iar_no' => Delivered::generateIARNo()]);
    }

    public function generateStockNo(Request $request)
    {
        $stockType = $request->query('stock_type');
        return response()->json(['stock_no' => Delivered::generateStockNo($stockType)]);
    }

    public function generateItemNo()
    {
        return response()->json(['item_no' => Delivered::generateItemNo()]);
    }

    public function generateReportNo()
    {
        $issued = new Issued();
        return response()->json(['report_no' => $issued->generateReportNo()]);
    }

    public function generateRisNo()
    {
        $issued = new Issued();
        return response()->json(['ris_no' => $issued->generateRisNo()]);
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
        $supplies = Issued::select('description')
                    ->groupBy('description')
                    ->get();
        $issuedTotals = Issued::select('description', \DB::raw('SUM(quantity_issued) as total_quantity'))
                    ->groupBy('description')
                    ->pluck('total_quantity', 'description');
        $totalDelivered = Delivered::select('item_description', \DB::raw('SUM(delivered) as total_delivered'))
                    ->groupBy('item_description')
                    ->pluck('total_delivered', 'item_description');
    
        return view('pages.supplies.order', ['supplies' => $supplies, 'issuedTotals' => $issuedTotals, 'totalDelivered' => $totalDelivered]);
    }
    
    public function downloadPDF()
    {
        $supplies = Issued::select('description')
                    ->groupBy('description')
                    ->get();
        $issuedTotals = Issued::select('description', \DB::raw('SUM(quantity_issued) as total_quantity'))
                    ->groupBy('description')
                    ->pluck('total_quantity', 'description');
        $totalDelivered = Delivered::select('item_description', \DB::raw('SUM(delivered) as total_delivered'))
                    ->groupBy('item_description')
                    ->pluck('total_delivered', 'item_description');
    
        $pdf = PDF::loadView('pages.supplies.order', ['supplies' => $supplies, 'issuedTotals' => $issuedTotals, 'totalDelivered' => $totalDelivered])->setPaper('a4', 'landscape');
        return $pdf->download('General Report Supplies.pdf');
    }
    
    public function forms()
    {
        $issuedStockNos = Issued::select('stock_no')->distinct()->get()->pluck('stock_no')->toArray();
        
        $supplies = Supplies::select('description', 'unit', 'stock_no')
                            ->whereIn('stock_no', $issuedStockNos)
                            ->distinct('description')
                            ->get();
        $issuedTotals = Issued::select('description', \DB::raw('SUM(quantity_issued) as total_quantity'))
                     ->groupBy('description')
                     ->pluck('total_quantity', 'description');
                     
        return view('pages.supplies.suppliesforms', ['supplies' => $supplies, 'issuedTotals' => $issuedTotals, 'issuedStockNos' => $issuedStockNos]);
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
        $supplies = Delivered::all();
        return view('pages.supplies.purchaserequest', ['supplies' => $supplies]);
    }

    public function generatePDF(Request $request)
    {
        // Store the form data in the session
        $request->session()->put('form_data', $request->all());

        // Retrieve all supplies
        $supplies = Delivered::all();

        $pdf = PDF::loadView('pages.supplies.purchaserequest', ['pdf' => true, 'supplies' => $supplies]);
        // Download the PDF
        return $pdf->download('purchase_request.pdf');
    }

    public function getUnit(Request $request) 
    {
        $item_description = $request->get('item_description');
        $supply = Delivered::all()->where('item_description', $item_description)->first();
        return response()->json(['unit' => $supply->unit]);
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
        return response()->json(['description' => $supply->description, 'unit' => $supply->unit]);
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
        $stock_no = $request->get('stock_no');
        $issued = Issued::where('stock_no', $stock_no)->first();
    
        if (!$issued) {
            return response()->json(['error' => 'Item not found'], 404);
        }
    
        // Create an associative array for the supply data
        $data = [
            'stock_no' => $issued->stock_no,
            'description' => $issued->description,
            'date_issuance' => $issued->date_issuance,
            'requesting_office' => $issued->requesting_office,
            'report_no' => $issued->report_no,
            'ris_no' => $issued->ris_no
        ];
    
        $generator = new BarcodeGeneratorHTML();
        $barcode = $generator->getBarcode($supply->stock_no, $generator::TYPE_CODE_128);
    
        // Pass both the barcode and the array of supply data to the view
        $pdf = Pdf::loadView('pages.supplies.barcode', [
            'barcode' => $barcode,
            'data' => $data
        ]);
    
        // PDF options
        $pdf->setPaper([0, 0, 127, 300], 'landscape');
        $pdf->setOptions([
            'dpi' => 300,
            'defaultFont' => 'sans-serif',
            'margin-left' => 0,
            'margin-right' => 0,
            'margin-top' => 0,
            'margin-bottom' => 0,
            'page-width' => '100%',
            'page-height' => '100%',
            'viewport-size' => '100%',
            'viewport-width' => '100%',
            'viewport-height' => '100%'
        ]);
    
        return $pdf->download($issued->stock_no . '_barcode.pdf');
    }

}
