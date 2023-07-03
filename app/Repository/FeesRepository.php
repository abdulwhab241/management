<?php


namespace App\Repository;

use App\Models\Fee;
use App\Models\User;
use App\Models\Grade;
use App\Models\Classroom;
use App\Notifications\FeeNotification;
use App\Repository\FeesRepositoryInterface;
use Illuminate\Support\Facades\Notification;

class FeesRepository implements FeesRepositoryInterface
{

    public function index(){

        $fees = Fee::where('year', date('Y'))->get();
        $Grades = Grade::where('year', date("Y"))->get();
        return view('pages.Fees.index',compact('fees','Grades'));

    }

    public function create(){

        $Grades = Grade::where('year', date("Y"))->get();
        return view('pages.Fees.add',compact('Grades'));
    }

    public function edit($id){

        $fee = Fee::findOrFail($id);
        $Grades = Grade::where('year', date("Y"))->get();
        $Classrooms = Classroom::where('year', date("Y"))->get();
        return view('pages.Fees.edit',compact('fee','Grades','Classrooms'));

    }


    public function store($request)
    {
        try {

            $total = 0;
            $sub_total = strip_tags($request->amount) * strip_tags($request->Discount) / 100;
            $total += $sub_total;
            $All = strip_tags($request->amount) - $sub_total;


            $fees = new Fee();
            $fees->title =  strip_tags($request->title);
            $fees->amount  = strip_tags($request->amount);
            $fees->grade_id  = strip_tags($request->Grade_id);
            $fees->classroom_id  = strip_tags($request->Classroom_id);
            $fees->description  = strip_tags($request->description);
            $fees->year  = strip_tags($request->year);
            $fees->fee_type  = strip_tags($request->Fee_type);
            $fees->discount  = strip_tags($request->Discount);
            $fees->total = $All;
            $fees->create_by = auth()->user()->name;
            $fees->save();

            // $users = User::where('year', date("Y"))->get();
            $users = User::where('id', '!=', auth()->user()->id)->get();
            $create_by = auth()->user()->name;

            Notification::send($users, new FeeNotification($fees->id,$create_by,$fees->amount));
        
            toastr()->success('تم إضـافـة الرسوم الـدراسيـة بنجاح');
            return redirect()->route('Fees.create');

        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        try {

            $total = 0;
            $sub_total = strip_tags($request->amount) * strip_tags($request->Discount) / 100;
            $total += $sub_total;
            $All = strip_tags($request->amount) - $sub_total;


            $fees = Fee::findOrFail(strip_tags($request->id));
            $fees->title =  strip_tags($request->title);
            $fees->amount  = strip_tags($request->amount);
            $fees->grade_id  = strip_tags($request->Grade_id);
            $fees->classroom_id  = strip_tags($request->Classroom_id);
            $fees->description  = strip_tags($request->description);
            $fees->year  = strip_tags($request->year);
            $fees->fee_type  = strip_tags($request->Fee_type);
            $fees->discount  = strip_tags($request->Discount);
            $fees->total = $All;
            $fees->create_by = auth()->user()->name;
            $fees->save();
            toastr()->success('تم تعديل الرسوم الـدراسيـة بنجاح');
            return redirect()->route('Fees.index');
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            Fee::destroy(strip_tags($request->id));
            toastr()->error('تم حذف الرسوم الـدراسيـة بنجاح');
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}