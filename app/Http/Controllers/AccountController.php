<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\AccountLog;
use App\Models\Borrower;
use App\Models\Supplier;

class AccountController extends Controller
{
    public function index(){
        $accounts = Account::all();
        $logs = AccountLog::orderByDesc('id')->get();
        $borrowers = Borrower::all();
        $suppliers = Supplier::all();
        return view('account.index',compact('accounts','logs','borrowers','suppliers'));
    }

    public function account_save(Request $request){
        /*$this->validate($request,[
            'charge' => 'required|numeric',
        ],[
            'charge.required' => 'يجب إدخال قيمة الحساب',
            'charge.numeric' => 'يجب أن تكون قيمة الحساب أرقام',
        ]);*/
        $account1 = Account::find(1);
        $account1->charge = $request->charge[0];
        $account1->save();

        $account2 = Account::find(2);
        $account2->charge = $request->charge[1];
        $account2->save();

        return redirect()->back()->with('success','تم تعديل الرصيد بنجاح');
    }
}
