<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrainingRequest extends FormRequest
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
            'date'       => 'required|date',
            'time'       => 'required|date_format:H:i',
            'participant'=> 'required|numeric|min:1',
            'instructor' => 'required|min:3',
            'duration'   => 'required|numeric|min:1',  // Durasi dalam menit
            'notes'      => 'nullable|min:3',
        ];
    }
}
