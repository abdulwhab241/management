<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentResultController extends Controller
{
    public function index()
    {
        $Result = Result::select('*')->where('student_id', auth()->user()->id)->get();
    
        return view('pages.Students.Result.index',compact('Result'));
    }

    public function show($id)
    {
        $Results = Result::findOrFail($id);
        $get_id = DB::table('notifications')->where('data->result_id',$id)->pluck('id');
        DB::table('notifications')->where('id',$get_id)->update(['read_at'=>now()]);
        return view('pages.Results.notification', compact('Results'));
    }

    public function markAsRead()
    {
        $user = Student::find(auth()->user()->id);
        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }
        return redirect()->back();
    }
}
