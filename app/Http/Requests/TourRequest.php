<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourRequest extends FormRequest
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
            'title'=> 'nullable',
            'description'=> 'sometimes|nullable',
            'location'=> 'sometimes|nullable',
            'time'=> 'sometimes|nullable',
            'price'=> 'sometimes|nullable',
            'status'=> 'sometimes|nullable',
            'slider'=> 'sometimes|nullable',
            'best'=> 'sometimes|nullable',
            'famous'=> 'sometimes|nullable',
            'type'=> 'sometimes|nullable',
            'position'=> 'sometimes|nullable',
            'special'=> 'sometimes|nullable',
        ];
    }
}
