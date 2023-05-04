<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassroomRequest extends FormRequest
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
            'Name'=>'required|unique:classrooms,name_class',
            'Grade_id'=>'required|integer',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'Name.required' => 'validation.required',
    //         'Name.unique' => 'validation.unique',
    //     ];
    // }
}
