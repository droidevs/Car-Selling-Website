<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
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
            'maker' => 'required|string|max:255',
        'model' => 'required|string|max:255',
        'year' => 'required|integer|min:1950|max:' . date('Y'),
        'car_type' => 'required|in:sedan,hatchback,suv',
        'price' => 'required|numeric|min:0',
        'vin' => 'nullable|string|max:255',
        'mileage' => 'nullable|numeric|min:0',
        'fuel_type' => 'required|in:gasoline,diesel,electric,hybrid',
        'state' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'phone' => 'required|string|max:30',

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
        'leather_seats' => 'nullable|boolean'
        ];
    }
}
