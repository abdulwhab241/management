<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return 
        [
            'A' => $this->id,
            'B' => $this->name,
            'C' => $this->gender_id,
            'D' => $this->birth_date,
            'E' => $this->grade_id,
            'F' => $this->classroom_id,
            'G' => $this->section_id,
            'H' => $this->academic_year,
            'I' => $this->father_name,
            'J' => $this->employer,
            'K' => $this->father_job,
            'L' => $this->father_phone,
            'M' => $this->password,
            'N' => $this->job_phone,
            'O' => $this->home_phone,
            'P' => $this->address,
            'Q' => $this->mother_name,
            'R' => $this->mother_phone,
            'S' => $this->mother_job,
        ];
    }
}
