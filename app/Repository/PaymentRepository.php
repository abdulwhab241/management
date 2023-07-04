<?php


namespace App\Repository;

use App\Models\User;
use App\Models\FundAccount;
use App\Models\PaymentStudent;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\PaymentNotification;
use Illuminate\Support\Facades\Notification;

class PaymentRepository implements PaymentRepositoryInterface
{

    public function index()
    {
        $payment_students = PaymentStudent::where('year', date('Y'))->get();
        return view('pages.Payments.index',compact('payment_students'));
    }


    public function edit($id)
    {
        $payment_student = PaymentStudent::findOrFail($id);
        return view('pages.Payments.edit',compact('payment_student'));
    }

    public function store($request)
    {
        try {

            // حفظ البيانات في جدول سندات الصرف
            $payment_students = new PaymentStudent();
            $payment_students->date = date('Y-m-d');
            $payment_students->student_id = strip_tags($request->Student_id);
            $payment_students->amount = strip_tags($request->Debit);
            $payment_students->description = strip_tags($request->description);
            $payment_students->year = date('Y');
            $payment_students->create_by = auth()->user()->name;
            $payment_students->save();


            // حفظ البيانات في جدول الصندوق
            $fund_accounts = new FundAccount();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->type = 'إضافة سند صرف';
            $fund_accounts->student_id = strip_tags($request->Student_id);
            $fund_accounts->payment = strip_tags($payment_students->description);
            $fund_accounts->Debit_payment = strip_tags($request->Debit);
            $fund_accounts->year = date('Y');
            $fund_accounts->create_by = auth()->user()->name;
            $fund_accounts->save();


            // حفظ البيانات في جدول حساب الطلاب
            $students_accounts = new StudentAccount();
            $students_accounts->date = date('Y-m-d');
            $students_accounts->type = 'سند صرف';
            $students_accounts->student_id = strip_tags($request->Student_id);
            $students_accounts->payment_id = strip_tags($payment_students->id);
            $students_accounts->Debit_payment = strip_tags($request->Debit);
            $students_accounts->credit_payment = 0.00; 
            $students_accounts->description = strip_tags($request->description);
            $students_accounts->year = date('Y');
            $students_accounts->create_by = auth()->user()->name;
            $students_accounts->save();

            // $users = User::all();
            $users = User::where('id', '!=', auth()->user()->id)->get();
            // $student = Student::where('id', '=', $ProcessingFee->student_id)->get();
            $create_by = auth()->user()->name;

            Notification::send($users, new PaymentNotification($payment_students->id,$create_by,$payment_students->amount));

            toastr()->success('تـم إضـافـة سـند الصـرف  بنجـاح');
            return redirect()->route('Payments.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        try {
// dd($request);
            // تعديل البيانات في جدول سندات الصرف
            $payment_students = PaymentStudent::findOrFail(strip_tags($request->id));
            $payment_students->date = date('Y-m-d');
            $payment_students->student_id = strip_tags($request->Student_id);
            $payment_students->amount = strip_tags($request->Debit);
            $payment_students->description = strip_tags($request->description);
            $payment_students->year = date('Y');
            $payment_students->create_by = auth()->user()->name;
            $payment_students->save();


            // حفظ البيانات في جدول الصندوق
            $fund_accounts = new FundAccount();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->type = 'تعديل سند الصرف';
            $fund_accounts->student_id = strip_tags($request->Student_id);
            $fund_accounts->payment = strip_tags($payment_students->description);
            $fund_accounts->Debit_payment = strip_tags($request->Debit);
            $fund_accounts->year = date('Y');

            $fund_accounts->create_by = auth()->user()->name;
            $fund_accounts->save();


            // حفظ البيانات في جدول حساب الطلاب
            $students_accounts = StudentAccount::where('payment_id',strip_tags($request->id))->first();
            $students_accounts->date = date('Y-m-d');
            $students_accounts->type = 'تعديل سند الصرف';
            $students_accounts->student_id = strip_tags($request->Student_id);
            $students_accounts->Debit_payment = strip_tags($request->Debit);
            $students_accounts->credit_payment = 0.00; 
            $students_accounts->description = strip_tags($request->description);
            $students_accounts->year = date('Y');
            $students_accounts->create_by = auth()->user()->name;
            $students_accounts->save();

            toastr()->success('تـم تعـديـل سـند الصـرف  بنجـاح');
            return redirect()->route('Payments.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            PaymentStudent::destroy(strip_tags($request->id));
            StudentAccount::where('payment_id',strip_tags($request->id))->delete();
            toastr()->error('تـم حـذف سـند الصـرف  بنجـاح');
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}