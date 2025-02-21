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
            'name'          => 'required|string|max:255',
            'photo'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'birth_date'    => 'nullable|date',
            'birth_place'   => 'nullable|string|max:255',
            'phone'         => 'nullable|string|max:15',
            'email'         => 'required|string|email|max:255|unique:coaches,email,' . $this->route('coach')->id,
            'address'       => 'nullable|string',
            'experience'    => 'nullable|string|max:255',
            'remove_photo'   => 'nullable|boolean'
        ];
    }
}
