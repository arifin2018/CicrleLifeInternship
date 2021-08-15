<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageManagementsRequest extends FormRequest
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
            'customer_name' => 'required',
            'weight' => 'required|integer',
            'delivery_address' => 'required|max:100',
            'customer_mobile_number' => 'required|max:20',
            'driver_id' => 'required',
            'vehicle_management_id' => 'required',
        ];
    }
}
