<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function displaySuppliers(){
        $suppliers = Supplier::all();
        return view('pages.assets.suppliers', ['suppliers' => $suppliers]);
    }

    public function addSupplier(){
        return view('pages.assets.addsupplier');
    }

    public function storeSupplier(Request $request){
        $supplier = new Supplier;
        $supplier->name = $request->name;
        $supplier->address = $request->address;
        $supplier->contact_number = $request->contact_number;
        $supplier->save();
        return redirect('suppliers-view');
    }

    public function deleteSupplier($id){
        $supplier = Supplier::find($id);
        $supplier->delete();
        return redirect('suppliers-view');
    }
}
