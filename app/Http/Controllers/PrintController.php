<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoanMonths;
use App\Models\Loan;

class PrintController extends Controller
{
    public function index(){
        return view('print.index');
    }

    public function pay(Request $request){
        $months = LoanMonths::where(['index'=>$request->month, 'year'=>$request->year, 'status'=>'1'])->get();
        switch ($request->month) {
            case 1:
                $month_name = 'يناير';
                break;
            case 2:
                $month_name = 'فبراير';
                break;
            case 3:
                $month_name = 'مارس';
                break;
            case 4:
                $month_name = 'إبريل';
                break;
            case 5:
                $month_name = 'مايو';
                break;
            case 6:
                $month_name = 'يونيو';
                break;
            case 7:
                $month_name = 'يوليو';
                break;
            case 8:
                $month_name = 'أغسطس';
                break;
            case 9:
                $month_name = 'سبتمبر';
                break;
            case 10:
                $month_name = 'أكتوبر';
                break;
            case 11:
                $month_name = 'نوفمبر';
                break;
            case 12:
                $month_name = 'ديسمبر';
                break;
        }
        $year = $request->year;
        return view('print.pay', compact('months', 'month_name','year'));
    }

    public function late(Request $request){
        $this_month = now()->month;
        $this_year= now()->year;
        //recalculate late months
        $late_months = LoanMonths::where('year','<=',$this_year)
                                    ->where('index', '<', $this_month)
                                    ->where('status','0')->get();
        if(count($late_months) > 0){
            foreach($late_months as $late_month){
                $this_loan = Loan::find($late_month->loan_id);
                $late_month->late = $this_month - $late_month->index;
                $late_month->value = ($late_month->late/10)*$this_loan->installment+$this_loan->installment;
                $late_month->save();
            }
        }

        $months = LoanMonths::where(['index'=>$request->month, 'year'=>$request->year, 'status'=>'0'])->get();
        switch ($request->month) {
            case 1:
                $month_name = 'يناير';
                break;
            case 2:
                $month_name = 'فبراير';
                break;
            case 3:
                $month_name = 'مارس';
                break;
            case 4:
                $month_name = 'إبريل';
                break;
            case 5:
                $month_name = 'مايو';
                break;
            case 6:
                $month_name = 'يونيو';
                break;
            case 7:
                $month_name = 'يوليو';
                break;
            case 8:
                $month_name = 'أغسطس';
                break;
            case 9:
                $month_name = 'سبتمبر';
                break;
            case 10:
                $month_name = 'أكتوبر';
                break;
            case 11:
                $month_name = 'نوفمبر';
                break;
            case 12:
                $month_name = 'ديسمبر';
                break;
        }
        $year = $request->year;
        return view('print.late', compact('months', 'month_name','year'));

    }
}
