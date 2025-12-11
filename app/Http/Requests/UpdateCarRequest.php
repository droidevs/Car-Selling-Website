<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarRequest extends FormRequest
{
    public function authorize(): bool
    {
        // You can add authorization logic here, e.g., only owner can update
        return true;
    }

    public function rules(): array
    {
        $currentYear = date('Y');

        return [
            'maker_id' => 'required|exists:makers,id',
            'model_id' => 'required|exists:models,id',
            'year' => "required|integer|min:1950|max:$currentYear",
            'car_type_id' => 'required|exists:car_types,id',
            'price' => 'required|numeric|min:0',
            'vin' => 'nullable|string|max:255',
            'mileage' => 'nullable|numeric|min:0',
            'fuel_type_id' => 'required|exists:fuel_types,id',
            'city_id' => 'required|exists:cities,id',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:30',
            'description' => 'nullable|string',

            // Features (boolean)
            'air_conditioning' => 'nullable|boolean',
            'power_windows' => 'nullable|boolean',
            'power_door_locks' => 'nullable|boolean',
            'abs' => 'nullable|boolean',
            'cruise_control' => 'nullable|boolean',
            'bluetooth_connectivity' => 'nullable|boolean',
            'remote_start' => 'nullable|boolean',
            'gps_navigation' => 'nullable|boolean',
            'heated_seats' => 'nullable|boolean',
            'climate_control' => 'nullable|boolean',
            'rear_parking_sensors' => 'nullable|boolean',
            'leather_seats' => 'nullable|boolean',
        ];
    }
}
