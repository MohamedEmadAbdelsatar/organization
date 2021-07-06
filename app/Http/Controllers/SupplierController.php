<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;


class SupplierController extends Controller
{
    public function index(){
        $suppliers = Supplier::all();
        return view('supplier.index', compact('suppliers'));
    }

    public function supplier_save(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:suppliers|max:50',
            'percent' => 'required|numeric',
        ]);

        $supplier = new Supplier;
        $supplier->name = $request->name;
        $supplier->percent = $request->percent;
        $supplier->save();

        return redirect()->back();
    }
}
