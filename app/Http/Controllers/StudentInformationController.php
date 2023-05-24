<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\FeeInvoice;
use Illuminate\Http\Request;
use App\Models\ProcessingFee;
use App\Models\PaymentStudent;
use App\Models\ReceiptStudent;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

class StudentInformationController extends Controller
{
    public function index()
    {
        $Student_Account = StudentAccount::select('*')->where('student_id', auth()->user()->id)->get();
        $Payment = PaymentStudent::select('*')->where('student_id','=',auth()->user()->id)->get();
        $ReceiptStudent = ReceiptStudent::select('*')->where('student_id','=',auth()->user()->id)->get();
        $ProcessingFee = ProcessingFee::select('*')->where('student_id','=',auth()->user()->id)->get();
        $FeeInvoices = FeeInvoice::select('*')->where('student_id','=',auth()->user()->id)->get();
        return view('pages.Students.Accounts.index',compact('Student_Account','Payment','FeeInvoices','ReceiptStudent','ProcessingFee'));
    }

    public function receipt($id)
    {
        $Receipts = ReceiptStudent::findOrFail($id);
        $get_id = DB::table('notifications')->where('data->student_receipt_id',$id)->pluck('id');
        DB::table('notifications')->where('id',$get_id)->update(['read_at'=>now()]);
        return view('pages.Students.Accounts.receipt', compact('Receipts'));
    }

    public function ReadAll()
    {
        $user = User::find(auth()->user()->id);
        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }
        return redirect()->back();
    }


}
