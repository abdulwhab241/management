<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResultRequest extends FormRequest
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
            'Exam_id' => 'required|integer',
            'Student_id' => 'required|integer',
            'Semester_id' => 'required|integer',
            'Marks' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:0|max:2',
            'Appreciation' => 'required',
            'Result_name' => 'required|integer',
        ];
    }
}
