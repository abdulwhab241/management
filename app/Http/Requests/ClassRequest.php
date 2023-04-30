<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'Grade_id' => 'required|integer',
            'Classroom_id' => 'required|integer',
            'Section_id' => 'required|integer',
            'Day_id' => 'required',
            'First' => 'required',
            'Second' => 'required',
            'Third' => 'required',
            'Fourth' => 'required',
            'Fifth' => 'required',
            'Sixth' => 'required',
    
        ];
    }
}
