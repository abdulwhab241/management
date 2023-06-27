<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FinalRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'Student_id' => 'required|integer',
            'Subject_id' => 'required|integer',
            'Degree' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:0|max:2',
        ];
    }
}
