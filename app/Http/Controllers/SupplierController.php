<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\City;
use App\Models\Governorate;



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

        return redirect()->back()->with('success','تم إضافة المورد بنجاح');
    }

    public function supplier_edit($id){
        $supplier = Supplier::find($id);
        $cities = City::all();
        $governorates = Governorate::all();
        return view('supplier.edit',compact('supplier','cities','governorates'));
    }

    public function supplier_update(Request $request, $id){
        Supplier::where('id',$id)->update($request->except('_token'));
        return redirect()->back()->with('success','تم تعديل بيانات المورد بنجاح');
    }

    public function imports(Request $request){
        $imports = Supplier::find($request->id)->imports;
        return $imports;
    }
}
