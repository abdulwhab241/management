<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $Students = StudentResource::collection(Student::get());
        return $this->apiResponse($Students,'ok',200);
    }

    public function show ($id)
    {
        $Student = Student::find($id);

        if($Student){
            return $this->apiResponse(new StudentResource($Student),'ok',200);
        }

        return $this->apiResponse(null,'The Student Not Found',401);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'birth_date' => 'required|date|date_format:Y-m-d',
            'gender_id' => 'integer',
            'grade_id' => 'integer',
            'classroom_id' => 'integer',
            'section_id' => 'integer',
            'academic_year' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:4|max:4',
            'father_name' => 'required',
            'father_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9|max:9',
            'father_job' => 'required',
            'address' => 'required',
            'mother_name' => 'required',
            'mother_job' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null,$validator->errors(),400);
        }


        $Student = Student::create($request->all());

        if($Student){
            return $this->apiResponse(new StudentResource($Student),'The Student Save',201);
        }

        return $this->apiResponse(null,'The Student Not Save',400);
    }

    public function update(Request $request ,$id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'birth_date' => 'required|date|date_format:Y-m-d',
            'gender_id' => 'integer',
            'grade_id' => 'integer',
            'classroom_id' => 'integer',
            'section_id' => 'integer',
            'academic_year' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:4|max:4',
            'father_name' => 'required',
            'father_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9|max:9',
            'father_job' => 'required',
            'address' => 'required',
            'mother_name' => 'required',
            'mother_job' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null,$validator->errors(),400);
        }

        $Student = Student::find($id);

        if(!$Student){
            return $this->apiResponse(null,'The Student Not Found',404);
        }

        $Student->update($request->all());

        if($Student){
            return $this->apiResponse(new StudentResource($Student),'The Student update',201);
        }
    }

    public function destroy($id)
    {
        $Student = Student::find($id);

        if(!$Student){
            return $this->apiResponse(null,'The Student Not Found',404);
        }

        $Student->delete($id);

        if($Student){
            return $this->apiResponse(null,'The Student deleted',200);
        }
    }
}
