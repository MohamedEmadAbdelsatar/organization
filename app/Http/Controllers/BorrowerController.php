<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrower;
use App\Models\Governorate;
use App\Models\City;
use App\Models\Loan;

class BorrowerController extends Controller
{
    public function index()
    {
        $borrowers = Borrower::all();
        $governorates = Governorate::all();
        $cities = City::all();
        return view('borrower.index', compact('borrowers','cities','governorates'));
    }

    public function borrower_save(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5|max:70',
            'city' => 'required',
            'governorate' => 'required',
            'phone' => 'required|min:11|max:11|numeric',
            'national_id' => 'required|min:14|max:14|numeric|unique:borrowers',
            'location' => 'required|min:5|max:100',
            'job' => 'required|min:5|max:100',

            'guaranator_name' => 'required|min:5|max:70',
            'guaranator_city' => 'required',
            'guaranator_governorate' => 'required',
            'guaranator_phone' => 'required|min:11|max:11|numeric',
            'guaranator_national_id' => 'required|min:14|max:14|numeric|unique:borrowers',
            'guaranator_location' => 'required|min:5|max:100',
            'guaranator_job' => 'required|min:5|max:100'
        ],[
            'name.required' => 'يجب إدخال إسم العميل',
            'name.min' => 'يجب أن يكون إسم العميل أكثر من 5 حروف',
            'name.max' => 'يجب أن يكون إسم العميل قل من 70 حرف',
            'city.required' => 'يجب إدخال المدينة',
            'governorate.required' => 'يجب إدخال المحافظة ',
            'phone.required' => 'يجب إدخال رقم الهاتف ',
            'phone.min' => 'يجب أن لا يقل رقم الهاتف عن 11 رقم',
            'phone.max' => 'يجب أن لا يزيد رقم الهاتف عن 11 رقم',
            'phone.numeric' => 'يجب أن يكون رقم الهاتف مكون من أرقام فقط',
            'national_id.required' => ' يجب إدخال الرقم القومى ',
            'national_id.min' => 'يجب أن لا يقل الرقم القومى عن 14 رقم',
            'national_id.max' => 'يجب أن لا يزيد الرقم القومى عن 14 رقم',
            'national_id.numeric' => 'يجب أن يكون الرقم القومى مكون من أرقام فقط',
            'national_id.unique' => 'يوجد عميل مسجل بنفس الرقم القومى',
            'location.required' => ' يجب إدخال العنوان ',
            'location.min' => 'يجب أن لا يقل العنوان عن 5 حروف',
            'location.max' => 'يجب أن لا يزيد العنوان عن 100 حرف',
            'job.required' => ' يجب إدخال الوظيفة ',
            'job.min' => 'يجب أن لا يقل الوظيفة عن 5 حروف',
            'job.max' => 'يجب أن لا يزيد الوظيفة عن 100 حرف',

            'guaranator_name.required' => 'يجب إدخال إسم الضامن',
            'guaranator_name.min' => 'يجب أن يكون إسم الضامن أكثر من 5 حروف',
            'guaranator_name.max' => 'يجب أن يكون إسم الضامن قل من 70 حرف',
            'guaranator_city.required' => 'يجب إدخال المدينة الضامن',
            'guaranator_governorate.required' => 'يجب إدخال المحافظة الضامن',
            'guaranator_phone.required' => 'يجب إدخال رقم هاتف الضامن',
            'guaranator_phone.min' => 'يجب أن لا يقل رقم هاتف الضامن عن 11 رقم',
            'guaranator_phone.max' => 'يجب أن لا يزيد رقم هاتف الضامن عن 11 رقم',
            'guaranator_phone.numeric' => 'يجب أن يكون رقم هاتف الضامن مكون من أرقام فقط',
            'guaranator_national_id.required' => ' يجب إدخال الرقم القومى للضامن ',
            'guaranator_national_id.min' => 'يجب أن لا يقل الرقم القومى للضامن عن 14 رقم',
            'guaranator_national_id.max' => 'يجب أن لا يزيد الرقم القومى للضامن عن 14 رقم',
            'guaranator_national_id.numeric' => 'يجب أن يكون الرقم القومى للضامن مكون من أرقام فقط',
            'guaranator_national_id.unique' => 'يوجد عميل مسجل بنفس الرقم القومى للضامن',
            'guaranator_location.required' => ' يجب إدخال عنوان الضامن ',
            'guaranator_location.min' => 'يجب أن لا يقل عنوان الضامن عن 5 حروف',
            'guaranator_location.max' => 'يجب أن لا يزيد عنوان الضامن عن 100 حرف',
            'guaranator_job.required' => ' يجب إدخال وظيفة الضامن ',
            'guaranator_job.min' => 'يجب أن لا يقل وظيفة الضامن عن 5 حروف',
            'guaranator_job.max' => 'يجب أن لا يزيد وظيفة الضامن عن 100 حرف',

        ]);

        Borrower::create($request->except('_token'));
        return redirect()->back()->with('success','تم إنشاء عميل مقترض بنجاح');
    }

    public function loans(Request $request)
    {
        $loans = Loan::where(['borrower_id' => $request->id, 'status' => '0'])->get();
        if(count($loans) == 0){
            return 'لا يوجد قروض لهذا العميل';
        }
        return $loans;
    }
}
