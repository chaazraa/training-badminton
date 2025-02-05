<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCoachRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'image'    => 'required|string',
            'name'     => 'required|string',
            'phone'    => 'required|string',
            'email'    => 'required|string|email|unique:coaches,email,' . $this->route('coach')->id,
            'address'  => 'required|string',
            'date'     => 'required|date',
            'time'     => 'required|date_format:H:i',
        ];
    }
}
