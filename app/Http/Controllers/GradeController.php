<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grade;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\GradeRequest;
use App\Notifications\GradeNotification;
use Illuminate\Support\Facades\Notification;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::where('year',date('Y'))->get();
        return view('pages.Grades.index', compact('grades'));
    }

    public function store(GradeRequest $request)
    {
        try
        {
        
            $Grade = new Grade();
            $Grade->name = strip_tags($request->Name);
            $Grade->notes = strip_tags($request->Notes);
            $Grade->create_by = auth()->user()->name;
            $Grade->year = date('Y');

            $Grade->save();
            // $users = User::all();
            $users = User::where('id', '!=', auth()->user()->id)->get();
            $create_by = auth()->user()->name;

            Notification::send($users, new GradeNotification($Grade->id,$create_by,$Grade->name));

            toastr()->success('تم إضـافة المرحلة بنجاح');
            return redirect()->route('Grades.index');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(GradeRequest $request)
    {
        try
        {

            $Grade = Grade::findOrFail(strip_tags($request->id));
            $Grade->update([
                $Grade->name = strip_tags($request->Name),
                $Grade->notes = strip_tags($request->Notes),
                $Grade->year = date('Y'),
                $Grade->create_by = auth()->user()->name,
            ]);

            toastr()->success('تم تعديل المرحلة بنجاح');
            return redirect()->route('Grades.index');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $Grades = Grade::findOrFail($id);
        $get_id = DB::table('notifications')->where('data->Grade_id',$id)->pluck('id');
        DB::table('notifications')->where('id',$get_id)->update(['read_at'=>now()]);
        return view('pages.Grades.notification', compact('Grades'));
    }

    public function markAsRead()
    {
        $user = User::find(auth()->user()->id);
        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }
        return redirect()->back();
    }

    public function destroy(Request $request)
    {

        $MyClass_id = Classroom::where('grade_id',strip_tags($request->id))->pluck('grade_id');

        if($MyClass_id->count() == 0){

            $Grades = Grade::findOrFail(strip_tags($request->id))->delete();
            toastr()->error('تم حذف المرحلة بنجاح');
            return redirect()->route('Grades.index');
        }

        else{

            toastr()->warning(' لايمكن حذف المرحلة بسبب وجود صفوف تابعة لها احذف الصفوف ثم احذف المرحلة');
            return redirect()->route('Grades.index');
        }
    }
    
}
