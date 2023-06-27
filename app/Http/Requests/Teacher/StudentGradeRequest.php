<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;

class StudentGradeRequest extends FormRequest
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
            'Semester_id' => 'required|integer',
            'Student_id' => 'required|integer',
            'Subject_id' => 'required|integer',
            'Homework' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:0|max:2',
            'Verbal' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:0|max:2',
            'Attendance' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:0|max:2',
            'Month' => 'required|integer',
        ];
    }
}
