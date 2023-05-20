<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'Name' => 'required',
            'Date_Birth' => 'required|date|date_format:Y-m-d',
            'Gender_id' => 'integer',
            'Grade_id' => 'integer',
            'Classroom_id' => 'integer',
            'Section_id' => 'integer',
            'academic_year' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:4|max:4',
            'Father_Name' => 'required',
            'Father_Phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9|max:9',
            'Father_Job' => 'required',
            'Address' => 'required',
            'Mother_Name' => 'required',
            'Mother_Job' => 'required',
        ];
    }
}
