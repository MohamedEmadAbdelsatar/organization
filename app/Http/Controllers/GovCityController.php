<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Governorate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class GovCityController extends Controller
{
    //Governorate Section
    public function governorates()
    {
        $governorates = Governorate::all();
        return view('governorate.index',compact('governorates'));
    }

    public function governorate_save(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:governorates|max:50',
        ],[
            'name.required' => 'يجب إدخال إسم المحافظة',
            'name.unique' => 'يوجد محافظة أخرى بنفس الإسم',
            'name.max' => 'يجب أن يكون إسم المحافظة قل من 70 حرف',

        ]);

        $governorate = new Governorate;
        $governorate->name = $request->name;
        $governorate->save();

        return redirect()->back()->with('success','تم إنشاء محافظة بنجاح');
    }

    public function get_cities(Request $request){
        $cities = City::where('governorate_id',$request->id)->get();
        return $cities;
    }

    public function governorate_edit($id){
        $governorate = Governorate::find($id);
        return view('governorate.edit',compact('governorate'));
    }

    public function governorate_update(Request $request, $id){
        Validator::make($request->all(), [
            'name' => ['required','max:50',Rule::unique('cities')->ignore($id),],
        ],[
            'name.required' => 'يجب إدخال إسم المحافظة',
            'name.unique' => 'يوجد محافظة أخرى بنفس الإسم',
            'name.max' => 'يجب أن يكون إسم المحافظة قل من 70 حرف',
        ]);

        Governorate::where('id',$id)->update($request->except('_token'));
        return redirect('/governorates')->with('success','تم تعديل بيانات  المحافظة بنجاح');
    }

    public function governorate_destroy($id){
        City::where('governorate_id',$id)->delete();
        Governorate::where('id',$id)->delete();
        return redirect()->back()->with('success','تم حذف المحافظة بنجاح');
    }

    //City Section
    public function cities()
    {
        $governorates = Governorate::all();
        $cities = City::all();
        return view('city.index', compact('cities','governorates'));
    }

    public function city_save(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:cities|max:50',
            'governorate' => 'required',
        ],[
            'name.required' => 'يجب إدخال إسم المدينة',
            'name.unique' => 'يوجد مدينة أخرى بنفس الإسم',
            'name.max' => 'يجب أن يكون إسم المدينة قل من 70 حرف',
            'governorate.required' => 'يجب إختيار المحافظة',
        ]);

        $city = new City;
        $city->name = $request->name;
        $city->governorate_id = $request->governorate;
        $city->save();

        return redirect()->back()->with('success','تم إنشاء مدينة بنجاح');
    }

    public function city_edit($id){
        $city = City::find($id);
        $governorates = Governorate::all();
        return view('city.edit',compact('city','governorates'));
    }

    public function city_update(Request $request, $id){
        Validator::make($request->all(), [
            'name' => ['required','max:50',Rule::unique('cities')->ignore($id),],
            'governorate_id' => 'required',
        ],[
            'name.required' => 'يجب إدخال إسم المدينة',
            'name.unique' => 'يوجد مدينة أخرى بنفس الإسم',
            'name.max' => 'يجب أن يكون إسم المدينة قل من 70 حرف',
            'governorate_id.required' => 'يجب إختيار المحافظة',
        ]);

        City::where('id',$id)->update($request->except('_token'));
        return redirect('/cities')->with('success','تم تعديل بيانات المدينة بنجاح');
    }

    public function city_destroy($id){
        City::where('id',$id)->delete();
        return redirect()->back()->with('success','تم حذف المدينة بنجاح');
    }
}
