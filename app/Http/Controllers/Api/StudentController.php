<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;
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
        $Student = Student::create($request->all());

        if($Student){
            return $this->apiResponse(new StudentResource($Student),'The Student Save',201);
        }

        return $this->apiResponse(null,'The Student Not Save',400);
    }
}
