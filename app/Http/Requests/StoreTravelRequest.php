<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTravelRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'nullable',
            'quota' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'hotel_name' => 'string|nullable',
            'price' => 'required|string',
            'img' => 'nullable',
        ];
    }
}
