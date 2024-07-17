<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuelConsumptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'vehicle_id' => 'required|exists:vehicles,id',
            'fuel_type' => 'required',
            'date' => 'required|date',
            'liters' => 'required|numeric|min:0',
        ];
    }
}
