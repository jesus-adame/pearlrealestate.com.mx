<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
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
            'name'          => 'required|min:4|max:255',
            'description'   => 'required',
            'state'         => 'required',
            'city'          => 'required',
            'address'       => 'required',
            'image'         => 'nullable',
            'price'         => 'required|numeric|max:9999999999',
            'toilets'       => ['required', 'numeric'],
            'bedrooms'      => ['required', 'numeric'],
            'cars'          => ['required', 'numeric'],
            'floors_number' => ['required', 'numeric'],
            'building_meters' => 'required',
            'ground_meters' => 'required',
            'building_age'  => 'required',
            'property_status' => 'required',
        ];
    }
}
