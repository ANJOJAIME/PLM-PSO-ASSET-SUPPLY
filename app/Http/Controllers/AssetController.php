<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\Supplier;
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
        $asset->item_no = Asset::generateItemNo();
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
        $asset = Asset::where('po_added', true)->get();
        return view('pages.assets.purchase_order', ['asset' => $asset]);
    }

    public function makePurchaseOrder()
    {
        $assets = Asset::all();
        $asset = $assets->first();
        $suppliers = Supplier::all();

        return view('pages.assets.makepurchaseorder', ['assets' => $assets, 'asset' => $asset, 'suppliers' => $suppliers]);
    }

    public function storePurchaseOrder(Request $request, $pr_no)
    {
        $validatedData = $request->validate([
            'item_no' => 'required',
            'supplier' => 'required',
        ]);
        
        $asset = Asset::where('pr_no', $request->input('pr_no'))->first();

        $asset = Asset::find($pr_no);
        $asset->item_no = $request->input('item_no');
        $asset->supplier = $request->input('supplier');
        $asset->tin_no = $request->input('tin_no');
        $asset->date_po = $request->input('date_po');
        $asset->mode_of_proc = $request->input('mode_of_proc');
        $asset->place_of_dev = $request->input('place_of_dev');
        $asset->date_dev = $request->input('date_dev');
        $asset->price_val = $request->input('price_val');
        $asset->payment_term = $request->input('payment_term');
        $asset->quantity = $request->input('quantity');
        $asset->unit = $request->input('unit');
        $asset->unit_cost = $request->input('unit_cost');
        
        $asset->update();

        return redirect('/purchase-order-view')->with('status', 'Purchase Order Added Successfully!');
    }

    //DELIVERY
    public function displaydelivery()
    {
        $asset = Asset::where('added', true)->get();
        return view('pages.assets.displaydelivery', ['asset' => $asset]);
    }

    public function editdelivery($item_no)
    {
        $asset = Asset::where('item_no', $item_no)->first();   
        return view('pages.assets.editdelivery', ['asset' => $asset]);
    }

    public function updatedelivery(Request $request, $item_no)
    {
        $request->validate([
            'iar_no' => 'required',
            'supplier' => 'required',
            'bur_no' => 'required',
            'date_po' => 'required',
            'invoice_no' => 'required',
            'date_invoice' => 'required',
            'req_office' => 'required',
            'unit' => 'required',
            'delivery_qty' => 'required',
            'unit_cost' => 'required',
        ]); //commit
        $asset = Asset::where('item_no', $item_no)->first();
        $asset->iar_no = $request->input('iar_no');
        $asset->supplier = $request->input('supplier');
        $asset->bur_no = $request->input('bur_no');
        $asset->date_po = $request->input('date_po');
        $asset->invoice_no = $request->input('invoice_no');
        $asset->date_invoice = $request->input('date_invoice');
        $asset->req_office = $request->input('req_office');
        $asset->unit = $request->input('unit');
        $asset->delivery_qty = $request->input('delivery_qty');
        $asset->unit_cost = $request->input('unit_cost');

        $asset->update();

        return redirect('/delivery-view')->with('status', 'Delivery Updated Successfully!');
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
        return response()->json(['item_no' => Asset::generateItemNo()]);
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

}
