<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetCitiesRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Only allow authenticated users
        return true;
    }

    public function rules(): array
    {
        return [
            'state_id' => 'required|exists:states,id', // Validate that the state exists
        ];
    }

    public function casts(): array
    {
        return [
            'state_id' => 'integer',
        ];
    }

    public function messages(): array
    {
        return [
            'state_id.required' => 'State is required to fetch cities.',
            'state_id.exists' => 'The selected state does not exist.',
        ];
    }


}

