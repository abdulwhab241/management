<?php


namespace App\Repository;


use App\Models\Fee;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Classroom;
use App\Models\FeeInvoice;
use App\Models\StudentAccount;


class FeeInvoicesRepository implements FeeInvoicesRepositoryInterface
{

    public function index()
    {
        $Fee_invoices = FeeInvoice::all();
        $Grades = Grade::all();
        return view('pages.Fees_Invoices.index',compact('Fee_invoices','Grades'));
    }
    public function create()
    {
        $Fees =Fee::all();
        $Students = Student::all();
        $Grades = Grade::all();
        $Classrooms =Classroom::all();
        return view('pages.Fees_Invoices.add',compact('Students','Fees','Grades','Classrooms'));
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        $fees = Fee::where('classroom_id',$student->classroom_id)->get();
        return view('pages.Fees_Invoices.show',compact('student','fees'));
    }

    public function edit($id)
    {
        $fee_invoices = FeeInvoice::findOrFail($id);
        $fees = Fee::where('classroom_id',$fee_invoices->classroom_id)->get();
        $student = Student::all();
        return view('pages.Fees_Invoices.edit',compact('fee_invoices','fees','student'));
    }

    public function store($request)
    {

        try {

                // حفظ البيانات في جدول فواتير الرسوم الدراسية
                $Fees = new FeeInvoice();
                $Fees->invoice_date = date('Y-m-d');
                $Fees->student_id = strip_tags($request->Student_id);
                $Fees->grade_id = strip_tags($request->Grade_id);
                $Fees->classroom_id = strip_tags($request->Classroom_id);
                $Fees->fee_id = strip_tags($request->Fee_id);
                $Fees->amount = strip_tags($request->amount);
                $Fees->description = strip_tags($request->description);
                $Fees->create_by = auth()->user()->name;
                $Fees->save();
                
                // حفظ البيانات في جدول حسابات الطلاب
                $StudentAccount = new StudentAccount();
                $StudentAccount->student_id = strip_tags($request->Student_id);
                $StudentAccount->date = date('Y-m-d');
                $StudentAccount->type = 'فـاتـورة دراسية (مـديـن)';
                $StudentAccount->fee_invoice_id = strip_tags($Fees->id);
                $StudentAccount->Debit = strip_tags($request->amount);
                $StudentAccount->credit = 0.00;
                $StudentAccount->description = strip_tags($request->description);
                $StudentAccount->create_by = auth()->user()->name;
                $StudentAccount->save();

            toastr()->success('تـم إضافـة الفـاتـورة بنجـاح');
            return redirect()->route('Fees_Invoices.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        try {
            // تعديل البيانات في جدول فواتير الرسوم الدراسية
            // $Fees = FeeInvoice::findOrFail($request->id);
            // $Fees->invoice_date = date('Y-m-d');
            // // $Fees->student_id = strip_tags($request->student_id);
            // // $Fees->grade_id = strip_tags($request->Grade_id);
            // // $Fees->classroom_id = strip_tags($request->Classroom_id);
            // // $Fees->fee_id = strip_tags($request->fee_id);
            // // $Fees->amount = strip_tags($request->amount);
            // // $Fees->description = strip_tags($request->description);
            // // $Fees->create_by = auth()->user()->name;
            // $Fees->student_id = strip_tags($request->Student_id);
            // $Fees->grade_id = strip_tags($request->Grade_id);
            // $Fees->classroom_id = strip_tags($request->Classroom_id);
            // $Fees->fee_id = strip_tags($request->Fee_id);
            // $Fees->amount = strip_tags($request->amount);
            // $Fees->description = strip_tags($request->description);
            // $Fees->create_by = auth()->user()->name;
            // $Fees->save();

            // // تعديل البيانات في جدول حسابات الطلاب
            // $StudentAccount = StudentAccount::where('fee_invoice_id',$request->id)->first();
            // $StudentAccount->student_id = strip_tags($request->Student_id);
            // $StudentAccount->date = date('Y-m-d');
            // // $StudentAccount->type = 'invoice';
            // // $StudentAccount->fee_invoice_id = $Fees->id;
            // // $StudentAccount->Debit = strip_tags($request->amount);
            // // $StudentAccount->credit = 0.00;
            // // $StudentAccount->description = strip_tags($request->description);
            // // $StudentAccount->create_by = auth()->user()->name;
            // $StudentAccount->type = 'تعديل فـاتـورة دراسية (مـديـن)';
            // $StudentAccount->fee_invoice_id = strip_tags($request->id);
            // $StudentAccount->Debit = strip_tags($request->amount);
            // $StudentAccount->credit = 0.00;
            // $StudentAccount->description = strip_tags($request->description);
            // $StudentAccount->create_by = auth()->user()->name;
            // $StudentAccount->save();

            $Fees = FeeInvoice::findOrFail($request->id);
            $Fees->fee_id = strip_tags($request->Fee_id);
            $Fees->amount = strip_tags($request->amount);
            $Fees->description = strip_tags($request->description);
            $Fees->create_by = auth()->user()->name;
            $Fees->save();

            // تعديل البيانات في جدول حسابات الطلاب
            $StudentAccount = StudentAccount::where('fee_invoice_id',$request->id)->first();
            $StudentAccount->type = 'تعديل فـاتـورة دراسية (مـديـن)';
            $StudentAccount->Debit = strip_tags($request->amount);
            $StudentAccount->description = strip_tags($request->description);
            $StudentAccount->create_by = auth()->user()->name;
            $StudentAccount->save();

            toastr()->success('تـم تـعديـل الفـاتـورة بنجـاح');
            return redirect()->route('Fees_Invoices.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            // dd($request);
            FeeInvoice::destroy($request->id);
            StudentAccount::destroy($request->id);
            toastr()->error('تـم حـذف الفـاتـورة بنجـاح');
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}