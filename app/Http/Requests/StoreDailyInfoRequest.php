<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDailyInfoRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'corner'=>'required|integer' ,
            'numberOfKids'=>'required|integer' ,
            'numberOfStaff'=>'required|integer' ,
            'mostLikedActivity'=>'required' ,
            'linkForPhotosAndVideos'=>'required' ,
            'date'=>'required' ,
        ];
    }
    public function message(): array
    {
        return [
            'corner_id.required' => 'A Corner is required',
            'no_Kids.required' => 'A number Of Kids is required',
            'no_staff.required' => 'A number Of Steff is required',
            'liked_activity.required' => 'A Liked Activity is required',
            'photos_link.required' => 'A Photos link is required',
            'date.required' => 'A date is required',
        ];
    }
}

