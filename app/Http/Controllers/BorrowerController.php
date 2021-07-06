<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrower;
use App\Models\Governorate;
use App\Models\City;

class BorrowerController extends Controller
{
    public function index(){
        $borrowers = Borrower::all();
        $governorates = Governorate::all();
        $cities = City::all();
        return view('borrower.index', compact('borrowers','cities','governorates'));
    }
}
