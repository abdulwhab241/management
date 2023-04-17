<?php


namespace App\Repository;


use App\Models\Fee;
use App\Models\Student;
use App\Models\FundAccount;
use App\Models\ReceiptStudent;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ReceiptStudentsRepository implements ReceiptStudentsRepositoryInterface
{

    public function index()
    {
        $receipt_students = ReceiptStudent::all();
        return view('pages.Receipts.index',compact('receipt_students'));

    }

    public function create()
    {
        $fee =Fee::all();
        $student = Student::all();
        return view('pages.Receipts.add',compact('student','fee'));
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('pages.Receipts.show',compact('student'));
    }

    public function edit($id)
    {
        $receipt_student = ReceiptStudent::findOrFail($id);
        $Students = Student::all();
        return view('pages.Receipts.edit',compact('receipt_student','Students'));
    }

    public function store($request)
    {

        try {

            // $Fee = Student::select('*')->where('fee_id','=',$request->Student_id)->get();
            // $The_Rest = $request->Debit- $Fee ; 
            // حفظ البيانات في جدول سندات القبض
            $receipt_students = new ReceiptStudent();
            $receipt_students->date = date('Y-m-d');
            $receipt_students->student_id = strip_tags($request->Student_id);
            $receipt_students->Debit = strip_tags($request->Debit);
            $receipt_students->description = strip_tags($request->description);
            $receipt_students->create_by = auth()->user()->name;
            $receipt_students->save();

            // حفظ البيانات في جدول الصندوق
            $fund_accounts = new FundAccount();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->student_id = strip_tags($request->Student_id);
            $fund_accounts->receipt_id = strip_tags($receipt_students->id);
            $fund_accounts->Debit_receipt = 0.00;
            $fund_accounts->credit_receipt =  strip_tags($request->Debit);
            $fund_accounts->description = strip_tags($request->description);
            $fund_accounts->create_by = auth()->user()->name;
            $fund_accounts->save();

            // حفظ البيانات في جدول حساب الطالب
            $student_accounts = new StudentAccount();
            $student_accounts->date = date('Y-m-d');
            $student_accounts->type = 'تسديـد رسـوم  (دائن)';
            $student_accounts->receipt_id = strip_tags($receipt_students->id);
            // $student_accounts->fee_id = strip_tags($receipt_students->fee_id);
            $student_accounts->student_id = strip_tags($request->Student_id);
            $student_accounts->Debit_receipt =  0.00;
            $student_accounts->credit_receipt = strip_tags($request->Debit);
            $student_accounts->description = strip_tags($request->description);
            $student_accounts->create_by = auth()->user()->name;
            $student_accounts->save();

            toastr()->success('تـم إضافـة سنـد القبـض بنجـاح');
            return redirect()->route('Receipts.index');

        }

        catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {

        try {

            // تعديل البيانات في جدول سندات القبض
            $receipt_students = ReceiptStudent::findOrFail($request->id);
            $receipt_students->date = date('Y-m-d');
            $receipt_students->student_id = strip_tags($request->Student_id);
            $receipt_students->Debit = strip_tags($request->Debit);
            $receipt_students->description = strip_tags($request->description);
            $receipt_students->create_by = auth()->user()->name;
            $receipt_students->save();

            // تعديل البيانات في جدول الصندوق
            $fund_accounts = FundAccount::where('receipt_id',$request->id)->first();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->student_id = strip_tags($request->Student_id);
            $fund_accounts->receipt_id = strip_tags($receipt_students->id);
            $fund_accounts->Debit_receipt = 0.00;
            $fund_accounts->credit_receipt =  strip_tags($request->Debit);
            $fund_accounts->description = strip_tags($request->description);
            $fund_accounts->create_by = auth()->user()->name;
            $fund_accounts->save();

            // تعديل البيانات في جدول الصندوق

            $student_accounts = StudentAccount::where('receipt_id',$request->id)->first();
            $student_accounts->date = date('Y-m-d');
            $student_accounts->type = 'تعديل تسديـد رسـوم  (دائن)';
            $student_accounts->receipt_id = strip_tags($receipt_students->id);
            $student_accounts->student_id = strip_tags($request->Student_id);
            $student_accounts->Debit_receipt =  0.00;
            $student_accounts->credit_receipt = strip_tags($request->Debit);
            $student_accounts->description = strip_tags($request->description);
            $student_accounts->create_by = auth()->user()->name;
            $student_accounts->save();

            toastr()->success('تـم تعديـل سنـد القبـض بنجـاح');
            return redirect()->route('Receipts.index');
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            ReceiptStudent::destroy($request->id);
            StudentAccount::destroy($request->id);
            FundAccount::destroy($request->id);
            toastr()->error('تـم حـذف سنـد القبـض بنجـاح');
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}