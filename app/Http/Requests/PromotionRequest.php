<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromotionRequest extends FormRequest
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
            'Grade_id_new' => 'required|integer',
            'Classroom_id_new' => 'required|integer',
            // 'section_id_new' => 'required|integer',
            'academic_year_new' => 'required|integer',
            'Grade_id' => 'required|integer',
            'Classroom_id' => 'required|integer',
            // 'section_id' => 'required|integer',
            'academic_year' => 'required|integer',
        ];
    }
}
