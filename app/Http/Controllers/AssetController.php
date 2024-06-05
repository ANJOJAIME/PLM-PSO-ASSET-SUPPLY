<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Department;
use App\Models\PurchaseOrder;
use App\Models\DeliveredAsset;
use App\Models\IssuedAsset;
use App\Models\ClassCategory;
use App\Models\AssetTransfer;
use App\Models\Notification;
use Barryvdh\DomPDF\Facade\PDF;

class AssetController extends Controller
{
    //MAIN TABLE
    public function displayasset()
    {
        $asset = IssuedAsset::select('i_description')
                    ->groupBy('i_description')
                    ->get();

        $issuedAssetTotals = IssuedAsset::select('i_description', \DB::raw('SUM(i_quantity) as i_total_quantity'))
                            ->groupBy('i_description')
                            ->pluck('i_total_quantity', 'i_description');

        $deliveredAssetTotals = DeliveredAsset::select('d_description', \DB::raw('SUM(d_qty) as d_totalDelivered'))
                            ->groupBy('d_description')
                            ->pluck('d_totalDelivered', 'd_description');

        return view('pages.assets.displayassets', ['asset' => $asset, 'issuedAssetTotals' => $issuedAssetTotals, 'deliveredAssetTotals' => $deliveredAssetTotals]);
    }

    //PURCHASE ORDER
    public function displaypurchaseorder()
    {
        $orders = PurchaseOrder::all();
        $dasset = DeliveredAsset::all();
        $class = ClassCategory::all();
        $classToCategoryMap = ClassCategory::all()->groupBy('class_id')->map(function ($classItems) {
            return $classItems->pluck('category');
        });
        return view('pages.assets.purchase_order', ['orders' => $orders, 'dasset' => $dasset, 'class' => $class, 'classToCategoryMap' => $classToCategoryMap]);
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
            'price_val' => 'required',
            'payment_term',
            'quantity'  => 'required',
            'unit',
            'unit_cost' => 'required',
            'is_delivered',
            'ics_no',
        ]);
        
        $orders->item_no = $request->input('item_no');
        $orders->description = $request->input('description');
        $orders->supplier = $request->input('supplier');
        $orders->tin_no = $request->input('tin_no');
        $orders->po_no = $request->input('po_no');
        $orders->pr_no = $request->input('pr_no');
        $orders->mode_of_proc = $request->input('mode_of_proc');
        $orders->price_val = $request->input('price_val');
        $orders->payment_term = $request->input('payment_term');
        $orders->quantity = $request->input('quantity');
        $orders->unit = $request->input('unit');
        $orders->unit_cost = $request->input('unit_cost'); 
        $orders->ics_no = $request->input('ics_no');
        $orders->save();

        return redirect('/purchase-order-view')->with('status', 'Purchase Order Added Successfully!');
    }

    public function deletePurchaseOrder($id)
    {
        $orders = PurchaseOrder::find($id);
        $orders->delete();

        return redirect('/purchase-order-view')->with('status', 'Purchase Order Deleted Successfully! Item can be recovered in archive...');
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
        $issuedAssetTotals = IssuedAsset::select('i_description', \DB::raw('SUM(i_quantity) as i_total_quantity'))
                            ->groupBy('i_description')
                            ->pluck('i_total_quantity', 'i_description');

        $deliveredAssetTotals = DeliveredAsset::select('d_description', \DB::raw('SUM(d_qty) as d_totalDelivered'))
                            ->groupBy('d_description')
                            ->pluck('d_totalDelivered', 'd_description');
        $iasset = IssuedAsset::all();
        $departments = Department::all();
        
        return view('pages.assets.displaydelivery', ['dasset' => $dasset, 'iasset' => $iasset, 'departments' => $departments, 'issuedAssetTotals' => $issuedAssetTotals, 'deliveredAssetTotals' => $deliveredAssetTotals]);
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
            'd_date_of_delivery' => 'required',
            'd_place_of_delivery' => 'required',
            'd_class_id' => 'required',
            'd_category' => 'required',
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
        $dasset->d_date_of_delivery = $request->input('d_date_of_delivery');
        $dasset->d_place_of_delivery = $request->input('d_place_of_delivery');
        $dasset->d_class_id = $request->input('d_class_id');
        $dasset->d_category = $request->input('d_category');
        $dasset->d_date_invoice = $request->input('d_date_invoice');
        $dasset->d_qty = $request->input('d_qty');
        $dasset->d_unit_cost = $request->input('d_unit_cost');
        $dasset->d_total_cost = $request->input('d_total_cost');
        $dasset->d_date_po = $request->input('d_date_po');

        $dasset->save();
        $order = PurchaseOrder::where('po_no', $dasset->d_po_no)->first();
        if ($order) {
            $order->is_delivered = true;
            $order->save();
        }

        return redirect('/delivery-view')->with('status', 'Delivered Asset Added Successfully!');
    }

    public function deletedeliveredasset($id)
    {
        $dasset = DeliveredAsset::find($id);
        $dasset->delete();
        $order = PurchaseOrder::where('po_no', $dasset->d_po_no)->first();
        if ($order) {
            $order->is_delivered = false;
            $order->save();
        }

        return redirect('/delivery-view')->with('status', 'Delivered Asset Deleted Successfully! Item can be recovered in archive...');
    }

    //ISSUANCE
    public function displayissuance()
    {
        $iasset = IssuedAsset::all();
        return view('pages.assets.displayissuance', ['iasset' => $iasset]);
    }

    public function storenew_issued_asset(Request $request)
    {
        $iasset = new IssuedAsset;
        $validatedData = $request->validate([
            'i_par_no'=> 'required',
            'i_description'=>'required',
            'i_date_acquired'=>'required',
            'i_property_no'=>'required',
            'i_req_office'=>'required',
            'i_location'=>'required',
            'i_location_id'=>'required',
            'i_site'=>'required',
            'i_site_id'=>'required',
            'i_unit'=>'required',
            'i_quantity'=>'required',
            'i_unit_value'=>'required',
        ]);

        $iasset->i_par_no = $request->input('i_par_no');
        $iasset->i_description = $request->input('i_description');
        $iasset->i_date_acquired = $request->input('i_date_acquired');
        $iasset->i_property_no = $request->input('i_property_no');
        $iasset->i_req_office = $request->input('i_req_office');
        $iasset->i_location = $request->input('i_location');
        $iasset->i_location_id = $request->input('i_location_id');
        $iasset->i_site = $request->input('i_site');
        $iasset->i_site_id = $request->input('i_site_id');
        $iasset->i_unit = $request->input('i_unit');
        $iasset->i_quantity = $request->input('i_quantity');
        $iasset->i_unit_value = $request->input('i_unit_value');
        $iasset->i_total_value = $iasset->i_quantity * $iasset->i_unit_value;
        $iasset->save();

        return redirect('/issuance-view')->with('status', 'Issuance Added Successfully!');
    }

    public function delete_issued_asset($id)
    {
        $iasset = IssuedAsset::find($id);
        $iasset->delete();

        return redirect('/issuance-view')->with('status', 'Issued Asset Deleted Successfully! Item can be recovered in archive...');
    }

    //CLASS AND CATEGORY
    public function displayclasscategory()
    {
        $class = ClassCategory::all();
        return view('pages.assets.displayclasscategory', ['class' => $class]);
    }

    public function addclasscategory()
    {
        $class = ClassCategory::all();
        return view('pages.assets.addclasscategory');
    }

    public function storeclasscategory(Request $request)
    {
        $class = new ClassCategory;
        $validatedData = $request->validate([
            'class_id' => 'required',
            'category' => 'required',
        ]);

        $class->class_id = $request->input('class_id');
        $class->category = $request->input('category');
        $class->save();

        return redirect('/class-category')->with('status', 'Class and Category Added Successfully!');
    }

    public function deleteclasscategory($id)
    {
        $class = ClassCategory::find($id);
        $class->delete();

        return redirect('/class-category')->with('status', 'Class and Category Deleted Successfully!');
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
        return response()->json(['d_iar_no' => DeliveredAsset::generateAssetIARNo()]);
    }

    public function generatePropertyNo()
    {
        return response()->json(['i_property_no' => IssuedAsset::generatePropertyNo()]);
    }

    public function generateParNo()
    {
        return response()->json(['i_par_no' => IssuedAsset::generateParNo()]);
    }

    public function generatePrsNo()
    {
        return response()->json(['prs_no' => AssetTransfer::generatePrsNo()]);
    }

    public function generateICSNo($unit_cost)
    {
        $ics_no = PurchaseOrder::generateICSNo($unit_cost);
        return response()->json(['ics_no' => $ics_no]);
    }

    //FORMS
    

    //GENERAL
    
    

    //ARCHIVE CONTROLLER
    //PURCHASE ORDER
    public function po_archive()
    {
        $orders = PurchaseOrder::onlyTrashed()->get();
        return view('pages.assets.po_archive', ['orders' => $orders]);
    }

    public function po_recover($id)
    {
        $orders = PurchaseOrder::withTrashed()->find($id);
        $orders->restore();

        return redirect('/purchase-order-view')->with('status', 'Purchase Order Recovered Successfully!');
    }

    public function po_forceDelete($id)
    {
        $orders = PurchaseOrder::withTrashed()->find($id);
        $orders->forceDelete();

        return redirect('/purchase-order-view')->with('status', 'Purchase Order Deleted Permanently!');
    }

    //DELIVERED ASSET
    public function del_archive()
    {
        $dasset = DeliveredAsset::onlyTrashed()->get();
        return view('pages.assets.del_archive', ['dasset' => $dasset]);
    }

    public function del_recover($id)
    {
        $dasset = DeliveredAsset::withTrashed()->find($id);
        $dasset->restore();
        $order = PurchaseOrder::where('po_no', $dasset->d_po_no)->first();
        if ($order) {
            $order->is_delivered = true;
            $order->save();
        }

        return redirect('/delivery-view')->with('status', 'Delivered Asset Recovered Successfully!');
    }

    public function del_forceDelete($id)
    {
        $dasset = DeliveredAsset::withTrashed()->find($id);
        $dasset->forceDelete();

        return redirect('/delivery-view')->with('status', 'Delivered Asset Deleted Permanently!');
    }

    //ISSUED ASSET
    public function iss_archive()
    {
        $iasset = IssuedAsset::onlyTrashed()->get();
        return view('pages.assets.iss_archive', ['iasset' => $iasset]);
    }

    public function iss_recover($id)
    {
        $iasset = IssuedAsset::withTrashed()->find($id);
        $iasset->restore();

        return redirect('/issuance-view')->with('status', 'Issued Asset Recovered Successfully!');
    }

    public function iss_forceDelete($id)
    {
        $iasset = IssuedAsset::withTrashed()->find($id);
        $iasset->forceDelete();

        return redirect('/issuance-view')->with('status', 'Issued Asset Deleted Permanently!');
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
