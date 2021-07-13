<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Import;
use App\Models\Supplier;
use App\Models\Batch;
use App\Models\Account;

class ImportController extends Controller
{
    public function index(){
        $imports = Import::all();
        $suppliers = Supplier::All();
        return view('import.index',compact('imports','suppliers'));
    }

    public function import_save(Request $request){

        $import = new Import;
        $import->supplier_id = $request->supplier_id;
        $import->value = $request->value;
        $import->earn = $request->earn;

        $total = $request->value + ($request->value * $request->earn / 100);
        $import->total = number_format((float)$total, 2, '.', '');
        $import->interest = $total-$request->value;

        $import->base_payment = $request->base_payment;
        $import->interest_payment = $request->interest_payment;

        switch($request->base_payment){
            case 1: //monthly
                $n_base = $request->period;
                $installment = $import->value/$request->period;
                $import->base_installment = number_format((float)$installment, 2, '.', '');
                break;
            case 3: //quarter year
                $n_base = floor($request->period/3);
                $installment = $import->value/$n_base;
                $import->base_installment = number_format((float)$installment, 2, '.', '');
                break;
            case 6: //half year
                $n_base = floor($request->period/6);
                $installment = $import->value/$n_base;
                $import->base_installment = number_format((float)$installment, 2, '.', '');
                break;
            case 12: //every year
                $n_base = floor($request->period/12);
                $installment = $import->value/$n_base;
                $import->base_installment = number_format((float)$installment, 2, '.', '');
                break;
        }

        switch($request->interest_payment){
            case 1: //monthly
                $n_interest = $request->period;
                $installment = $import->interest/$request->period;
                $import->interest_installment = number_format((float)$installment, 2, '.', '');
                break;
            case 3: //quarter year
                $n_interest = floor($request->period/3);
                $installment = $import->interest/$n_interest;
                $import->interest_installment = number_format((float)$installment, 2, '.', '');
                break;
            case 6: //half year
                $n_interest = floor($request->period/6);
                $installment = $import->interest/$n_interest;
                $import->interest_installment = number_format((float)$installment, 2, '.', '');
                break;
            case 12: //every year
                $n_interest = floor($request->period/12);
                $installment = $import->interest/$n_interest;
                $import->interest_installment = number_format((float)$installment, 2, '.', '');
                break;
        }
        $import->n_base = $n_base;
        $import->n_interest = $n_interest;
        $import->base_remaining = $request->value;
        $import->interest_remaining = $total-$request->value;
        $import->period = $request->period;
        $import->start = $request->start;
        $import->start_year = $request->start_year;
        $import->end = $request->end;
        $import->end_year = $request->end_year;
        $import->save();

        $account = Account::find(2);
        $account->charge += $request->value;
        $account->save();

        $month = $request->start;
        $year = $request->start_year;
        $base_step = $request->base_payment;

        //save base batches
        for($i=0;$i<$n_base;$i++){
            if($i > 0){
                if(($month+$base_step) >= 12 ){
                    $year++;
                    $month = $month+$base_step-12;
                } else {
                    $month += $base_step;
                }
            }
                $batch = new Batch;
                $batch->supplier_id = $request->supplier_id;
                $batch->import_id = $import->id;
                $batch->year = $year;
                $batch->month = $month;
                switch ($batch->month) {
                    case '1':
                        $month_name = 'يناير';
                        break;
                    case '2':
                        $month_name = 'فبراير';
                        break;
                    case '3':
                        $month_name = 'مارس';
                        break;
                    case '4':
                        $month_name = 'إبريل';
                        break;
                    case '5':
                        $month_name = 'مايو';
                        break;
                    case '6':
                        $month_name = 'يونيو';
                        break;
                    case '7':
                        $month_name = 'يوليو';
                        break;
                    case '8':
                        $month_name = 'أغسطس';
                        break;
                    case '9':
                        $month_name = 'سبتمبر';
                        break;
                    case '10':
                        $month_name = 'أكتوبر';
                        break;
                    case '11':
                        $month_name = 'نوفمبر';
                        break;
                    case '12':
                        $month_name = 'ديسمبر';
                        break;
                }
                $batch->month_name = $month_name;
                $batch->type = 1;
                $batch->value = $import->base_installment;
                $batch->save();

        }

        $month = $request->start;
        $year = $request->start_year;
        $interest_step = $request->interest_payment;

        //save interest batches
        for($i=0;$i<$n_interest;$i++){
            if($i > 0){
                if(($month+$interest_step) >= 12 ){
                    $year++;
                    $month = $month+$interest_step-12;
                } else {
                    $month += $interest_step;
                }
            }
                $batch = new Batch;
                $batch->supplier_id = $request->supplier_id;
                $batch->import_id = $import->id;
                $batch->year = $year;
                $batch->month = $month;
                switch ($batch->month) {
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
                $batch->month_name = $month_name;
                $batch->type = 2;
                $batch->value = $import->interest_installment;
                $batch->save();

        }

        return redirect()->back();
    }

    public function import_pay(){
        $suppliers = Supplier::all();
        return view('import.pay',compact('suppliers'));
    }

    public function get_batches(Request $request){
        $batches = Batch::where(['import_id'=>$request->import_id,'status' => '0'])->get();
        return $batches;
    }

    public function save_payment(Request $request){
        //return $request->all();


        $batch = Batch::find($request->batch_id);
        $account = Account::find(2);
        if($batch->value > $account->charge){
            return redirect()->back()->with('fail','رصيد الحساب لا يكفى');
        } else {
            $account->charge -= $batch->value;
            $account->save();
        }
        $batch->status = 1;
        $batch->save();

        $import = Import::find($request->import_id);
        if($batch->type == '1'){
            $import->base_remaining -= $import->base_installment;
            $import->base_total_paid += $batch->value;

            $paid_base_batches = Batch::where(['import_id'=>$request->import_id,'status' => '1','type'=>'1'])->get();
            $n_base = count($paid_base_batches);
            if($n_base = $import->n_base){
                $import->base_status = 1;
            }
        } else {
            $import->interest_remaining -= $import->interest_installment;
            $import->interest_total_paid += $batch->value;

            $paid_interest_batches = Batch::where(['import_id'=>$request->import_id,'status' => '1','type'=>'2'])->get();
            $n_interest = count($paid_interest_batches);
            if($n_interest = $import->n_interest){
                $import->interest_status = 1;
            }
        }
        $import->save();

        return redirect()->back()->with('success','تم تسديد القسط  بنجاح');

    }

    public function import_show($id){
        $import = Import::find($id);
        return view('import.show', compact('import'));
    }

}
