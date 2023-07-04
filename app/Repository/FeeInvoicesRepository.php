<?php


namespace App\Repository;


use App\Models\Fee;
use App\Models\User;
use App\Models\Grade;
use App\Models\Enrollment;
use App\Models\FeeInvoice;
use App\Models\FundAccount;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\Notification;
use App\Notifications\FeeInvoiceNotification;


class FeeInvoicesRepository implements FeeInvoicesRepositoryInterface
{

    public function index()
    {
        $Fee_invoices = FeeInvoice::where('year', date('Y'))->get();
        return view('pages.Fees_Invoices.index',compact('Fee_invoices'));
    }
    public function create()
    {
        $Students = Enrollment::where('year', date("Y"))->get();
        $Grades = Grade::where('year', date("Y"))->get();
        return view('pages.Fees_Invoices.add',compact('Students','Grades'));
    }

    public function edit($id)
    {
        $fee_invoices = FeeInvoice::findOrFail($id);
        $fees = Fee::where('classroom_id',$fee_invoices->classroom_id)->where('year', date("Y"))->get();
        return view('pages.Fees_Invoices.edit',compact('fee_invoices','fees'));
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
            $Fees->year = date('Y');
            $Fees->create_by = auth()->user()->name;
            $Fees->save();

            // حفظ البيانات في جدول الصندوق
            $fund_accounts = new FundAccount();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->type = 'إضافة فاتورة دراسية ';
            $fund_accounts->student_id = strip_tags($request->Student_id);
            $fund_accounts->fee_invoice = strip_tags($Fees->description);
            $fund_accounts->Debit_feeInvoice = strip_tags($request->amount);
            $fund_accounts->year = date('Y');
            $fund_accounts->create_by = auth()->user()->name;
            $fund_accounts->save();
            
            // حفظ البيانات في جدول حسابات الطلاب
            $StudentAccount = new StudentAccount();
            $StudentAccount->student_id = strip_tags($request->Student_id);
            $StudentAccount->date = date('Y-m-d');
            $StudentAccount->type = 'فـاتـورة دراسية ';
            $StudentAccount->fee_invoice_id = strip_tags($Fees->id);
            $StudentAccount->Debit_feeInvoice = strip_tags($request->amount);
            $StudentAccount->credit_feeInvoice = 0.00;
            $StudentAccount->description = strip_tags($request->description);
            $StudentAccount->create_by = auth()->user()->name;
            $StudentAccount->year = date('Y');
            $StudentAccount->save();

            // $users = User::all();
            $users = User::where('id', '!=', auth()->user()->id)->get();
            $create_by = auth()->user()->name;

            Notification::send($users, new FeeInvoiceNotification($Fees->id,$create_by,$Fees->amount));

            toastr()->success('تـم إضافـة الفـاتـورة بنجـاح');
            return redirect()->route('Fees_Invoices.create');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        try {
            $Fees = FeeInvoice::findOrFail(strip_tags($request->id));
            $Fees->fee_id = strip_tags($request->Fee_id);
            $Fees->amount = strip_tags($request->amount);
            $Fees->description = strip_tags($request->description);
            $Fees->create_by = auth()->user()->name;
            $Fees->year = date('Y');
            $Fees->save();

            // تعديل البيانات في جدول حسابات الطلاب
            $StudentAccount = StudentAccount::where('fee_invoice_id',strip_tags($request->id))->first();
            $StudentAccount->type = 'تعديل فـاتـورة دراسية ';
            $StudentAccount->Debit_feeInvoice = strip_tags($request->amount);
            $StudentAccount->description = strip_tags($request->description);
            $StudentAccount->create_by = auth()->user()->name;
            $StudentAccount->year = date('Y');
            $StudentAccount->save();

            // حفظ البيانات في جدول الصندوق
            $fund_accounts = new FundAccount();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->type = 'تعديل فاتورة دراسية ';
            $fund_accounts->student_id = strip_tags($request->Student_id);
            $fund_accounts->fee_invoice = strip_tags($Fees->description);
            $fund_accounts->Debit_feeInvoice = strip_tags($request->amount);
            $fund_accounts->year = date('Y');
            $fund_accounts->create_by = auth()->user()->name;
            $fund_accounts->save();

            toastr()->success('تـم تـعديـل الفـاتـورة بنجـاح');
            return redirect()->route('Fees_Invoices.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            FeeInvoice::destroy(strip_tags($request->id));
            StudentAccount::where('fee_invoice_id',strip_tags($request->id))->delete();
            toastr()->error('تـم حـذف الفـاتـورة بنجـاح');
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}