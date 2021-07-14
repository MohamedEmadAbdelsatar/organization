<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBorrowerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:70',
            'phone' => 'required|digits:11',
            'national_id' => ['required','digits:14','unique:borrowers,national_id,'.$this->id],
            'location' => 'required|min:2|max:100',
            'job' => 'required|min:2|max:100',
            'guaranator_name' => 'required|min:2|max:70',
            'guaranator_phone' => 'required|digits:11',
            'guaranator_national_id' => 'required|digits:14|unique:borrowers',
            'guaranator_location' => 'required|min:2|max:100',
            'guaranator_job' => 'required|min:2|max:100',
        ];
    }

    public function messages()
    {
        return [
                'name.required' => 'يجب إدخال إسم العميل',
                'name.min' => 'يجب أن يكون إسم العميل أكثر من 2 حروف',
                'name.max' => 'يجب أن يكون إسم العميل قل من 70 حرف',
                'phone.required' => 'يجب إدخال رقم الهاتف ',
                'phone.digits' => 'يجب أن يكون رقم الهاتف 11 رقم',
                'phone.numeric' => 'يجب أن يكون رقم الهاتف مكون من أرقام فقط',
                'national_id.required' => ' يجب إدخال الرقم القومى ',
                'national_id.digits' => 'يجب أن يكون الرقم القومى 14 رقم',
                'national_id.numeric' => 'يجب أن يكون الرقم القومى مكون من أرقام فقط',
                'national_id.unique' => 'يوجد عميل مسجل بنفس الرقم القومى',
                'location.required' => ' يجب إدخال العنوان ',
                'location.min' => 'يجب أن لا يقل العنوان عن 2 حروف',
                'location.max' => 'يجب أن لا يزيد العنوان عن 100 حرف',
                'job.required' => ' يجب إدخال الوظيفة ',
                'job.min' => 'يجب أن لا يقل الوظيفة عن 2 حروف',
                'job.max' => 'يجب أن لا يزيد الوظيفة عن 100 حرف',
                'guaranator_name.required' => 'يجب إدخال إسم الضامن',
                'guaranator_name.min' => 'يجب أن يكون إسم الضامن أكثر من 2 حروف',
                'guaranator_name.max' => 'يجب أن يكون إسم الضامن قل من 70 حرف',
                'guaranator_phone.required' => 'يجب إدخال رقم هاتف الضامن',
                'guaranator_phone.digits' => 'يجب أن يكون رقم الهاتف للضامن 11 رقم',
                'guaranator_phone.numeric' => 'يجب أن يكون رقم هاتف الضامن مكون من أرقام فقط',
                'guaranator_national_id.required' => ' يجب إدخال الرقم القومى للضامن ',
                'guaranator_national_id.digits' => 'يجب أن يكون الرقم القومى  للضامن 14 رقم',
                'guaranator_national_id.numeric' => 'يجب أن يكون الرقم القومى للضامن مكون من أرقام فقط',
                'guaranator_national_id.unique' => 'يوجد عميل مسجل بنفس الرقم القومى للضامن',
                'guaranator_location.required' => ' يجب إدخال عنوان الضامن ',
                'guaranator_location.min' => 'يجب أن لا يقل عنوان الضامن عن 2 حروف',
                'guaranator_location.max' => 'يجب أن لا يزيد عنوان الضامن عن 100 حرف',
                'guaranator_job.required' => ' يجب إدخال وظيفة الضامن ',
                'guaranator_job.min' => 'يجب أن لا يقل وظيفة الضامن عن 2 حروف',
                'guaranator_job.max' => 'يجب أن لا يزيد وظيفة الضامن عن 100 حرف',
        ];
    }
}
