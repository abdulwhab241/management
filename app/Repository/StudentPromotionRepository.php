<?php


namespace App\Repository;


use App\Models\Grade;
use App\Models\Student;
use App\Models\Promotion;
use App\Models\Enrollment;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class StudentPromotionRepository implements StudentPromotionRepositoryInterface
{

    public function create()
    {
        $Grades = Grade::where('year', date("Y"))->get();
        
        return view('pages.Upgrades.create',compact('Grades'));
    }

    public function index()
    {
        $promotions = promotion::where('year', date('Y'))->get();
        return view('pages.Upgrades.index',compact('promotions'));
    }

    public function store($request)
    {
        try {

            $students = Enrollment::where('grade_id',$request->Grade_id)->where('classroom_id',$request->Classroom_id)->where('year',$request->academic_year)->where('year', date('Y'))->get();

            if($students->count() < 1){
                toastr()->error('لاتوجد بيانات في جدول تسـجيـل الطلاب');
                return redirect()->back();
            }

            // else
            // {
            // update in table student
            foreach ($students as $student){

                $ids = explode(',',$student->student_id);
                Student::whereIn('id', $ids)
                    ->update([
                        'grade_id'=>strip_tags($request->Grade_id_new),
                        'classroom_id'=> strip_tags($request->Classroom_id_new),
                        'academic_year'=> strip_tags($request->academic_year_new),
                        'year'=>strip_tags($request->academic_year_new),
                        'create_by' =>auth()->user()->name,
                    ]);

                // insert in to promotions
                Promotion::updateOrCreate([
                    'student_id'=>$student->student_id,
                    'from_grade'=> strip_tags($request->Grade_id),
                    'from_Classroom'=> strip_tags($request->Classroom_id),
                    'to_grade'=> strip_tags($request->Grade_id_new),
                    'to_Classroom'=> strip_tags($request->Classroom_id_new),
                    'academic_year'=> strip_tags($request->academic_year),
                    'academic_year_new'=> strip_tags($request->academic_year_new),
                    'year' => date('Y'),
                    'create_by' =>auth()->user()->name,
                ]);

            }

            toastr()->success('تم ترقيـة الطـلاب بنجاح');
            return redirect()->route('Upgrades.index');
        // }

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

        public function destroy($request)
        {

        try {

            // التراجع عن الكل
            if($request->page_id ==1){

                $Promotions = Promotion::all();
                foreach ($Promotions as $Promotion){

                    //التحديث في جدول الطلاب
                    $ids = explode(',',$Promotion->student_id);
                    Student::whereIn('id', $ids)
                    ->update([
                    'grade_id'=>$Promotion->from_grade,
                    'classroom_id'=>$Promotion->from_Classroom,
                    'academic_year'=>$Promotion->academic_year,
                ]);

                    //حذف جدول الترقيات
                    Promotion::truncate();

                }
                toastr()->error('تم إرجـاع جميـع الطـلاب بنجاح');
                return redirect()->back();
            }
            else
            {
                $Promotion = Promotion::findOrFail($request->id);
                Student::where('id', $Promotion->student_id)
                ->update([
                'grade_id'=>$Promotion->from_grade,
                'classroom_id'=>$Promotion->from_Classroom,
                // 'academic_year'=>$Promotion->academic_year,
            ]);

            Promotion::destroy($request->id);
            toastr()->warning('تم إرجاع الطالـب بنجاح');
            return redirect()->back();

            }

        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
        }
    }

