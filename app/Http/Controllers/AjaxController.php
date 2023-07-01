<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Section;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    // Get Classrooms
    public function getClassrooms($id)
    {
        return Classroom::where("grade_id", $id)->where('year',date('Y'))->pluck("name_class", "id");
    }

    //Get Sections
    public function Get_Sections($id)
    {
        return Section::where("class_id", $id)->where('year',date('Y'))->pluck("name_section", "id");
    }

    public function Get_Title($id)
    {
        $list_title = Fee::where("classroom_id", $id)->where('year',date('Y'))->pluck("fee_type", "id");
        return $list_title;
    }

    public function Get_Prices($id){

        $list_price = Fee::where("id", $id)->where('year',date('Y'))->pluck("total", "id");
        return $list_price;
    }

    // public function Get_StudentsClass($id){

    //     $list_student = Student::where("classroom_id", $id)->pluck("name_class", "id");
    //     return $list_student;
    // }

}
