<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Exports\StudentsExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StudentRequest;
use App\Repository\StudentRepositoryInterface;

class StudentController extends Controller
{
    protected $Student;

    public function __construct(StudentRepositoryInterface $Student)
    {
        $this->Student = $Student;
    }

    public function index()
    {
        return $this->Student->Get_Student();
    }
    public function create()
    {
        return $this->Student->Create_Student();
    }
    public function store(StudentRequest $request)
    {
        return $this->Student->Store_Student($request);
    }
    public function show($id)
    {
        return $this->Student->Show_Student($id);
    }
    public function edit($id)
    {
        return $this->Student->Edit_Student($id);
    }
    public function update(StudentRequest $request)
    {
        return $this->Student->Update_Student($request);
    }
    public function destroy(Request $request)
    {
        return $this->Student->Delete_Student($request);
    }

    public function Get_classrooms($id)
    {
        return $this->Student->Get_classrooms($id);
    }

    public function Get_Sections($id)
    {
        return $this->Student->Get_Sections($id);
    }

    public function show_student($id)
    {
        $Students = Student::findOrFail($id);
        $get_id = DB::table('notifications')->where('data->student_id',$id)->pluck('id');
        DB::table('notifications')->where('id',$get_id)->update(['read_at'=>now()]);
        return view('pages.Students.notification', compact('Students'));
    }

    public function print()
    {
        $Student = Student::all();
        return view('pages.Students.print', compact('Student'));
    }

    public function export() 
    {
        return Excel::download(new StudentsExport, 'الطلاب.xlsx');
    }

    // public function Upload_attachment(Request $request)
    // {
    //     return $this->Student->Upload_attachment($request);
    // }

    // public function Download_attachment($studentsname,$filename)
    // {
    //     return $this->Student->Download_attachment($studentsname,$filename);
    // }

    // public function Delete_attachment(Request $request)
    // {
    //     return $this->Student->Delete_attachment($request);

    // }
}
