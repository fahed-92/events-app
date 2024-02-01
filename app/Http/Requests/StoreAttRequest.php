<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAttRequest extends FormRequest
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
            'checkIn'=>'required' ,
            'checkOut'=>'required' ,
            'date'=>'required' ,
            'staff'=>'required' ,
        ];
    }

    public function message()
    {
        return [
            'check_in.required' => 'Check-in is required',
            'check_out.required' => 'check-out is required',
            'date.required' => 'Date is required',
            'staff_id.required' => 'Staff Name is required',
        ];
    }
}
