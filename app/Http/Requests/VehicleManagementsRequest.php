<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleManagementsRequest extends FormRequest
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
            'driver_id' => 'required',
            'vehicle_number' => 'required|unique:vehicle_managements,vehicle_number',
            'color' => 'required',
            'picture' =>'required|mimes:jpg,jpeg,png,gif,svg|image',
        ];
    }
}
