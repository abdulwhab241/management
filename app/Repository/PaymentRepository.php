<?php


namespace App\Repository;

use App\Models\FundAccount;
use App\Models\PaymentStudent;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PaymentRepository implements PaymentRepositoryInterface
{

    public function index()
    {
        $payment_students = PaymentStudent::all();
        return view('pages.Payments.index',compact('payment_students'));
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('pages.Payments.add',compact('student'));
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
            $payment_students->student_id = strip_tags($request->student_id);
            $payment_students->amount = strip_tags($request->Debit);
            $payment_students->description = strip_tags($request->description);
            $payment_students->create_by = auth()->user()->name;
            $payment_students->save();


            // حفظ البيانات في جدول الصندوق
            $fund_accounts = new FundAccount();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->student_id = strip_tags($request->student_id);
            $fund_accounts->payment = strip_tags($payment_students->description);
            $fund_accounts->Debit_payment = strip_tags($request->Debit);
            // $fund_accounts->credit_payment = 0.00; 
            // $fund_accounts->description = strip_tags($request->description);
            $fund_accounts->create_by = auth()->user()->name;
            $fund_accounts->save();


            // حفظ البيانات في جدول حساب الطلاب
            $students_accounts = new StudentAccount();
            $students_accounts->date = date('Y-m-d');
            $students_accounts->type = 'سند صرف';
            $students_accounts->student_id = strip_tags($request->student_id);
            $students_accounts->payment_id = strip_tags($payment_students->id);
            $students_accounts->Debit_payment = strip_tags($request->Debit);
            $students_accounts->credit_payment = 0.00; 
            $students_accounts->description = strip_tags($request->description);
            $students_accounts->create_by = auth()->user()->name;
            $students_accounts->save();

            // DB::commit();
            toastr()->success('تـم إضـافـة سـند الصـرف  بنجـاح');
            return redirect()->route('Payments.index');
        } catch (\Exception $e) {
            // DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        try {

            // تعديل البيانات في جدول سندات الصرف
            $payment_students = PaymentStudent::findOrFail(strip_tags($request->id));
            $payment_students->date = date('Y-m-d');
            $payment_students->student_id = strip_tags($request->student_id);
            $payment_students->amount = strip_tags($request->Debit);
            $payment_students->description = strip_tags($request->description);
            $payment_students->create_by = auth()->user()->name;
            $payment_students->save();


            // حفظ البيانات في جدول الصندوق
            $fund_accounts = FundAccount::where('payment_id',strip_tags($payment_students->id))->first();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->student_id = strip_tags($request->student_id);
            $fund_accounts->payment = strip_tags($payment_students->description);
            $fund_accounts->Debit_payment = strip_tags($request->Debit);
            // $fund_accounts->credit_payment = 0.00;
            // $fund_accounts->description = strip_tags($request->description);
            $fund_accounts->create_by = auth()->user()->name;
            $fund_accounts->save();


            // حفظ البيانات في جدول حساب الطلاب
            $students_accounts = StudentAccount::where('payment_id',strip_tags($request->id))->first();
            $students_accounts->date = date('Y-m-d');
            $students_accounts->type = 'تعديل سند الصرف';
            $students_accounts->student_id = strip_tags($request->student_id);
            $students_accounts->payment_id = strip_tags($payment_students->id);
            $students_accounts->Debit_payment = strip_tags($request->Debit);
            $students_accounts->credit_payment = 0.00; 
            $students_accounts->description = strip_tags($request->description);
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
            StudentAccount::destroy(strip_tags($request->id));
            // FundAccount::destroy(strip_tags($request->id));
            toastr()->error('تـم حـذف سـند الصـرف  بنجـاح');
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}