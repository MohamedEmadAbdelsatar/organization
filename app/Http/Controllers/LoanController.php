<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\LoanMonths;
use App\Models\Borrower;
use App\Models\Account;
use App\Models\AccountLog;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::all();
        $borrowers = Borrower::all();
        $accounts = Account::all();
        return view('loan.index',compact('loans','borrowers','accounts'));
    }

    public function loan_save(Request $request)
    {
        $this->validate($request,[
            'borrower_id' => 'required',
            'value' => 'required|numeric|min:0|not_in:0',
            'earn' => 'required|numeric|min:0|not_in:0',
            'start' => 'required|numeric|min:0|not_in:0',
            'start_year' => 'required|numeric|min:0|not_in:0',
            'end' => 'required|numeric|min:0|not_in:0',
            'end_year' => 'required|numeric|min:0|not_in:0',
        ],[
            'borrower_id.required' => 'يجب إختيار عميل مقترض',
            'value.required' => 'يجب أدخال قيمة القرض',
            'value.numeric' => 'يجب أن تكون قيمة القرض أرقام',
            'value.min' => 'يجب أن تكون قيمة القرض أكبر من صفر',
            'value.not_in' => 'يجب أن تكون قيمة القرض أكبر من صفر',
            'earn.required' => 'يجب أدخال قيمة المعاملة',
            'earn.numeric' => 'يجب أن تكون قيمة المعاملة أرقام',
            'earn.min' => 'يجب أن تكون قيمة المعاملة أكبر من صفر',
            'earn.not_in' => 'يجب أن تكون قيمة المعاملة أكبر من صفر',
            'start.required' => 'يجب أدخال شهر البداية',
            'start.numeric' => 'يجب أن تكون شهر البداية أرقام',
            'start.min' => 'يجب أن تكون شهر البداية أكبر من صفر',
            'start.not_in' => 'يجب أن تكون شهر البداية أكبر من صفر',
            'start_year.required' => 'يجب أدخال سنة البداية',
            'start_year.numeric' => 'يجب أن تكون سنة البداية أرقام',
            'start_year.min' => 'يجب أن تكون سنة البداية أكبر من صفر',
            'start_year.not_in' => 'يجب أن تكون سنة البداية أكبر من صفر',
            'end.required' => 'يجب أدخال شهر النهاية',
            'end.numeric' => 'يجب أن تكون شهر النهاية أرقام',
            'end.min' => 'يجب أن تكون شهر النهاية أكبر من صفر',
            'end.not_in' => 'يجب أن تكون شهر النهاية أكبر من صفر',
            'end_year.required' => 'يجب أدخال سنة النهاية',
            'end_year.numeric' => 'يجب أن تكون سنة النهاية أرقام',
            'end_year.min' => 'يجب أن تكون سنة النهاية أكبر من صفر',
            'end_year.not_in' => 'يجب أن تكون سنة النهاية أكبر من صفر',
        ]);
        $account = Account::find($request->account_id);
        if($account->charge < $request->value){
            return redirect()->back()->with('fail','رصيد الحساب لا يكفى');
        } else{
            $account->charge -= $request->value;
            $account->save();
        }
        //return $request->all();
        $total = $request->value + ($request->value * $request->earn / 100);
        $installment = $total/12;
        $loan = new Loan;
        $loan->borrower_id = $request->borrower_id;
        $loan->account_id = $request->account_id;
        $loan->earn = $request->earn;
        $loan->value = $request->value;
        $loan->total = number_format((float)$total, 2, '.', '');
        $loan->installment =number_format((float)$installment, 2, '.', '');
        $loan->start = $request->start;
        $loan->start_year = $request->start_year;
        $loan->end = $request->end;
        $loan->end_year = $request->end_year;
        $loan->remaining = $loan->total;
        $loan->save();

        $log = new AccountLog;
        $log->type = '1';
        $log->user_id = $request->borrower_id;
        $log->interest_id = $loan->id;
        $log->method = 'minus';
        $log->account_id = $account->id;
        if($account->id == '1'){
            $log->body = ' تم سحب مبلغ '.$request->value.' من حساب الجمعية لعمل قرض ';
        } else {
            $log->body = ' تم سحب مبلغ '.$request->value.' من حساب الموردين لعمل قرض ';
        }
        $log->save();
        $month = $request->start;
        $year = $request->start_year;
        //$months = ['1' ,'2' ,'3' ,'4' ,'5' ,'6' ,'7' ,'8' ,'9' ,'10' ,'11' ,'12'];
        for($i=0;$i<12;$i++)
        {
            switch ($month) {
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
            $loan_month = new LoanMonths;
            $loan_month->index = $month;
            $loan_month->year = $year;
            $loan_month->loan_id = $loan->id;
            $loan_month->value = $loan->installment;
            $loan_month->month_name = $month_name;
            $loan_month->borrower_id = $loan->borrower_id;
            $loan_month->save();

            if($month == 12)
            {
                $month = 1;
                $year++;
            }
            else
            {
                $month++;
            }
        }
        return redirect()->back()->with('success','تم إنشاء قرض بنجاح');
    }

    public function loan_pay(){
        $borrowers = Borrower::all();
        return view('loan.pay',compact('borrowers'));
    }

    public function get_months(Request $request){
        $months = LoanMonths::where(['loan_id'=>$request->loan_id,'status' => '0'])->get();
        return $months;
    }

    public function save_payment(Request $request){
        //return $request->all();
        $month = LoanMonths::find($request->month_id);
        if($month->status == 1){
            return redirect()->back()->with('wrong','هذا الشهر مسدد بالفعل لا يمكن التسديد أكثر من مرة');
        }
        $month->status = 1;
        $month->save();


        $paid_months = LoanMonths::where(['loan_id'=>$request->loan_id,'status' => '1'])->get();
        $n = count($paid_months);
        $loan = Loan::find($request->loan_id);
        $loan->remaining -= $loan->installment;
        $loan->total_paid += $month->value;
        if($n == 12){
            $loan->status = 1;
        }
        $loan->save();

        $account = Account::find($loan->account_id);
        $account->charge += $month->value;
        $account->save();

        $log = new AccountLog;
        $log->type = '1';
        $log->user_id = $loan->borrower_id;
        $log->interest_id = $loan->id;
        $log->method = 'add';
        $log->account_id = $account->id;
        if($account->id == '1'){
            $log->body = ' قام المقترض '.$loan->borrower->name.' بتسديد مبلغ '.$month->value.' من القرض وتم إضافته فى حساب الجمعية ';
        } else {
            $log->body = ' قام المقترض '.$loan->borrower->name.' بتسديد مبلغ '.$month->value.' من القرض وتم إضافته فى حساب الموردين ';
        }
        $log->save();
        return redirect()->back()->with('success','تم تسديد الشهر  بنجاح');

    }

    public function loan_show($id){
        $loan = Loan::find($id);
        return view('loan.show', compact('loan'));
    }

    public function loan_select(){
        $borrowers = Borrower::all();
        return view('loan.settle',compact('borrowers'));
    }

    public function loan_settle(Request $request){
        //return $request->all();
        $loan = Loan::find($request->loan_id);
        $loan->status = 1;
        $loan->save();

        $unpaid_months = LoanMonths::where(['loan_id'=>$request->loan_id,'status'=>'0'])->get();

        $value = 0;
        foreach($unpaid_months as $month){
            $value += $month->value;
        }
        $total = $value + $value*.16;
        $installment = $total/12;

        $new_loan = new Loan;
        $new_loan->borrower_id = $loan->borrower_id;
        $new_loan->value = $value;
        $new_loan->earn = 16;
        $new_loan->installment = number_format((float)$installment, 2, '.', '');
        $new_loan->total = number_format((float)$total, 2, '.', '');
        $new_loan->start = $request->start;
        $new_loan->end = $request->end;
        $new_loan->start_year = $request->start_year;
        $new_loan->end_year = $request->end_year;
        $new_loan->account_id = $loan->account_id;
        $new_loan->remaining = number_format((float)$total, 2, '.', '');
        $new_loan->total_paid = 0;
        $new_loan->save();

        $month = $request->start;
        $year =  $request->start_year;

        for($i=0;$i<12;$i++)
        {
            switch ($month) {
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
            $loan_month = new LoanMonths;
            $loan_month->index = $month;
            $loan_month->year = $year;
            $loan_month->loan_id = $new_loan->id;
            $loan_month->value = $new_loan->installment;
            $loan_month->month_name = $month_name;
            $loan_month->borrower_id = $new_loan->borrower_id;
            $loan_month->save();

            if($month == 12)
            {
                $month = 1;
                $year++;
            }
            else
            {
                $month++;
            }
        }
        LoanMonths::where(['loan_id'=>$request->loan_id,'status'=>'0'])->delete();
        return redirect()->back()->with('success','تم تسوية القرض القديم وإنشاء جديد');
    }

    public function loan_destroy($id){
        $loan = Loan::find($id);
        if($loan->status == 0){
            return redirect()->back()->with('wrong','لا يمكن حذف القرض لم يتم تسديد القرض حتى الأن');
        }
        Loan::where('id',$id)->delete();
        return redirect()->back()->with('success','تم حذف القرض بنجاح');
    }
}
