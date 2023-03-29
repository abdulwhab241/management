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
            'List_Classes.*.Grade_id'=>'required',
            'List_Classes.*.Day_id'=>'required',
            'List_Classes.*.Section_id'=>'required',
            'List_Classes.*.Teacher_id'=>'required',
            'List_Classes.*.Subject_id'=>'required',
            'List_Classes.*.School_id'=>'required',
        ];
    }
}
