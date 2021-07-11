<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Governorate;

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

        return redirect()->back()->with('success','تم إنشاء  محافظة بنجاح');
    }

    public function get_cities(Request $request){
        $cities = City::where('governorate_id',$request->id)->get();
        return $cities;
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

}
