<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\FeeInvoice;
use Illuminate\Http\Request;
use App\Models\ProcessingFee;
use App\Models\PaymentStudent;
use App\Models\ReceiptStudent;
use App\Models\StudentAccount;

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


}
