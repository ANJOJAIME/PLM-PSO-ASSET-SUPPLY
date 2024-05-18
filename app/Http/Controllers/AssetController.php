<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\Supplier;
use App\Models\Department;
use App\Models\PurchaseOrder;
use App\Models\DeliveredAsset;
use Barryvdh\DomPDF\Facade\PDF;

class AssetController extends Controller
{
    //MAIN TABLE
    public function displayasset()
    {
        $asset = Asset::where('added', true)->get();
        //$notifications = Notification::all();

        return view('pages.assets.displayassets', ['asset' => $asset]); //'notifications' => $notifications]);
    }

    public function addasset()
    {
        $assets = Asset::all();
        $asset = $assets->first();

        return view('pages.assets.addasset', ['assets' => $assets, 'asset' => $asset]);
    }

    public function storenewasset(Request $request)
    {
        $validatedData = $request->validate([
            'pr_no' => 'required',
            'category' => 'required',
        ]);
        
        $asset = Asset::where('pr_no', $request->input('pr_no'))->first();

        if ($asset) {
            $asset->added = true;
        } else {
            $asset = new Asset;
            $asset->pr_no = $request->input('pr_no');
            $asset->added = true;
        }

        // Use the generated values
        //$asset->item_no = Asset::generateItemNo();
        $asset->class_id = Asset::generateClassId();
        $asset->category = $request->input('category');

        $asset->save();

        return redirect('asset-view')->with('status', 'Asset Added Successfully!');
    }

    public function editasset($pr_no)
    {
        $asset = Asset::where('pr_no', $pr_no)->first();
        return view('pages.assets.editasset', ['asset' => $asset]);
    }

    public function updateasset(Request $request, $pr_no)
    {
            $request->validate([
                'item_no' => 'required',
                'class_id' => 'required',
                'category' => 'required',
                'details',
            ]);
        $asset = Asset::find($pr_no);
        $asset->item_no = $request->input('item_no');
        $asset->class_id = $request->input('class_id');
        $asset->category = $request->input('category');
        $asset->details = $request->input('details');
        $asset->update();

        return redirect('/asset-view')->with('status', 'Asset Updated Successfully!');
    }

    public function deleteasset($item_no)
    {
        $asset = Asset::find($item_no);
        $asset->delete();

        return redirect('/asset-view')->with('status', 'Asset Deleted Successfully!');
    }

    public function search(Request $request)
    {
        $item_no = $request->input('item_no');
        $asset = Asset::where('item_no', 'like', "%{$item_no}%")->get();
        //$notifications = Notification::all(); Fetch all notifications

        return view('pages.assets.displayassets', ['asset' => $asset,  'searched_item_no' => $item_no]); // Pass both supplies and notifications to the view
    }

    //PURCHASE ORDER
    public function displaypurchaseorder()
    {
        $orders = PurchaseOrder::all();
        $dasset = DeliveredAsset::all();
        return view('pages.assets.purchase_order', ['orders' => $orders, 'dasset' => $dasset]);
    }

    public function makePurchaseOrder()
    {
        $orders = PurchaseOrder::all();
        $suppliers = Supplier::all();

        return view('pages.assets.makepurchaseorder', ['orders' => $orders, 'suppliers' => $suppliers]);
    }

    public function storePurchaseOrder(Request $request)
    {
        $orders = new PurchaseOrder;
        $validatedData = $request->validate([
            'item_no' => 'required',
            'description' => 'required',
            'supplier',
            'tin_no' => 'required',
            'po_no' => 'required',
            'pr_no' => 'required',
            'mode_of_proc',
            'place_dev',
            'date_dev' => 'required',
            'price_val' => 'required',
            'payment_term',
            'quantity'  => 'required',
            'unit',
            'unit_cost' => 'required',
        ]);
        
        $orders->item_no = $request->input('item_no');
        $orders->description = $request->input('description');
        $orders->supplier = $request->input('supplier');
        $orders->tin_no = $request->input('tin_no');
        $orders->po_no = $request->input('po_no');
        $orders->pr_no = $request->input('pr_no');
        $orders->mode_of_proc = $request->input('mode_of_proc');
        $orders->place_dev = $request->input('place_dev');
        $orders->date_dev = $request->input('date_dev');
        $orders->price_val = $request->input('price_val');
        $orders->payment_term = $request->input('payment_term');
        $orders->quantity = $request->input('quantity');
        $orders->unit = $request->input('unit');
        $orders->unit_cost = $request->input('unit_cost');

        $orders->save();

        return redirect('/purchase-order-view')->with('status', 'Purchase Order Added Successfully!');
    }

    public function getDescription($itemNo)
    {
        $orders = PurchaseOrder::where('item_no', $itemNo)->first();
        return response()->json(['orders' => $orders]);
    }

    //DELIVERY
    public function displaydelivery()
    {
        $dasset = DeliveredAsset::all();
        return view('pages.assets.displaydelivery', ['dasset' => $dasset]);
    }

    public function storenew_delivered_asset(Request $request)
    {
        $dasset = new DeliveredAsset;

        $validatedData = $request->validate([
            'd_item_no' => 'required',
            'd_description' => 'required',
            'd_unit' => 'required',
            'd_iar_no' => 'required',
            'd_supplier' => 'required',
            'd_pr_no' => 'required',
            'd_po_no' => 'required',
            'd_bur_no' => 'required',
            'd_invoice_no' => 'required',
            'd_date_invoice' => 'required',
            'd_qty' => 'required',
            'd_unit_cost' => 'required',
            'd_total_cost' => 'required',
            'd_date_po' => 'required',
        ]);

        $dasset->d_item_no = $request->input('d_item_no');
        $dasset->d_description = $request->input('d_description');
        $dasset->d_unit = $request->input('d_unit');
        $dasset->d_iar_no = $request->input('d_iar_no');
        $dasset->d_supplier = $request->input('d_supplier');
        $dasset->d_pr_no = $request->input('d_pr_no');
        $dasset->d_po_no = $request->input('d_po_no');
        $dasset->d_bur_no = $request->input('d_bur_no');
        $dasset->d_invoice_no = $request->input('d_invoice_no');
        $dasset->d_date_invoice = $request->input('d_date_invoice');
        $dasset->d_qty = $request->input('d_qty');
        $dasset->d_unit_cost = $request->input('d_unit_cost');
        $dasset->d_total_cost = $request->input('d_total_cost');
        $dasset->d_date_po = $request->input('d_date_po');

        session()->put('delivery_successful', true);
        $dasset->save();
        

        return redirect('/delivery-view')->with('status', 'Delivered Asset Added Successfully!');
    }

    public function deletedeliveredasset($id)
    {
        $dasset = DeliveredAsset::find($id);
        $dasset->delete();

        return redirect('/delivery-view')->with('status', 'Delivered Asset Deleted Successfully!');
    }

    //ISSUANCE
    public function displayissuance()
    {
        $asset = Asset::where('added', true)->get();
        return view('pages.assets.displayissuance', ['asset' => $asset]);
    }

    public function editissuance($item_no)
    {
        $asset = Asset::where('item_no', $item_no)->first();
        return view('pages.assets.editissuance', ['asset' => $asset]);
    }

    public function updateissuance(Request $request, $item_no)
    {
        $request->validate([
            'par_no' => 'required',
            'date_acquired' => 'required',
            'property_no' => 'required',
            'unit' => 'required',
            'issue_qty' => 'required',
            
        ]);
        $asset = Asset::where('item_no', $item_no)->first();
        $asset->par_no = $request->input('par_no');
        $asset->date_acquired = $request->input('date_acquired');
        $asset->property_no = $request->input('property_no');
        $asset->unit = $request->input('unit');
        $asset->issue_qty = $request->input('issue_qty');
    

        $asset->update();

        return redirect('/issuance-view')->with('status', 'Issuance Updated Successfully!');
    }


    //NO. GENERATION
    public function generateItemNo()
    {
        return response()->json(['item_no' => PurchaseOrder::generateItemNo()]);
    }

    public function generateClassId()
    {
        return response()->json(['class_id' => Asset::generateClassId()]);
    }

    public function generateAssetIARNo()
    {
        return response()->json(['iar_no' => Asset::generateAssetIARNo()]);
    }

    public function generatePropertyNo()
    {
        return response()->json(['property_no' => Asset::generatePropertyNo()]);
    }

    public function generateParNo()
    {
        return response()->json(['par_no' => Asset::generateParNo()]);
    }

    //FORMS
    public function assetsforms()
    {
        $asset = Asset::all();
        return view('pages.assets.assetsforms', ['asset' => $asset]);
    }

    //GENERAL
    public function assetPDF()     //displayPDF()
    {
        $asset = Asset::all();
        return view('pages.assets.assets', ['asset' => $asset]);
    }

    public function downloadAssets()     //downloadPDF()
    {
        $asset = Asset::where('added', true)->get();
        $pdf = PDF::loadView('pages.assets.assets', ['asset' => $asset])->setPaper('a4', 'landscape');
        return $pdf->download('General Report Assets.pdf');
    }
    

    //ARCHIVE CONTROLLER
    public function archive()
    {
        $asset = Asset::onlyTrashed()->get();
        return view('pages.assets.asset_archive', ['asset' => $asset]);
    }

    public function recover($item_no)
    {
        $asset = Asset::withTrashed()->find($item_no);
        $asset->restore();

        return redirect('/asset-view')->with('status', 'Asset Recovered Successfully!');
    }

    public function forceDelete($item_no)
    {
        $asset = Asset::withTrashed()->find($item_no);
        $asset->forceDelete();

        return redirect('/asset-view')->with('status', 'Asset Deleted Permanently!');
    }

    //DEPARTMENT
    public function assetdisplaydepartment()
    {
        $departments = Department::all();
        $searched_dept = request('department_name');
       
    
        return view('pages.assets.displaydepartment', ['departments' => $departments, 'searched_dept' => $searched_dept]);
    }

    public function assetdepartmentsearch(Request $request)
    {
        $department_name = $request->input('department_name');
        $departments = Department::where('department_name', 'like', "%{$department_name}%")->get();
        
        return view('pages.assets.displaydepartment', ['departments' => $departments, 'searched_dept' => $department_name]);
    }
    
    public function assetadddepartment()
    {
        $departments = Department::all();   
        return view('pages.assets.adddepartment');
    }

    public function assetstoredepartment(Request $request)
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

        return redirect('/asset-plm-departments')->with('status', 'Department Added Successfully!');
    }

    public function assetdeletedepartment($id)
    {
        $department = Department::where('id', $id)->first();
        $department->delete();

        return redirect('/asset-plm-departments')->with('status', 'Department Deleted Successfully!');
    }

}
