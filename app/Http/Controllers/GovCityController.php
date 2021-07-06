<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Governorate;

class GovCityController extends Controller
{
    public function governorates()
    {
        $governorates = Governorate::all();
        return view('governorate.index',compact('governorates'));
    }

    public function governorate_save(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:governorates|max:50',
        ]);

        $governorate = new Governorate;
        $governorate->name = $request->name;
        $governorate->save();

        return redirect()->back();
    }

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
        ]);

        $city = new City;
        $city->name = $request->name;
        $city->governorate_id = $request->governorate;
        $city->save();

        return redirect()->back();
    }

}
