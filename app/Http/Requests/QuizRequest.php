<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizRequest extends FormRequest
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
            'Teacher_id' => 'required|integer',
            'Subject_id' => 'required|integer',
            'Classroom_id' => 'required|integer',
            'Exam_Date' => 'required|integer',
            'Total' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:2',
        ];
    }
}
