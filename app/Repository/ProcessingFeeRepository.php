<?php


namespace App\Repository;


use App\Models\User;
use App\Models\Student;
use App\Models\Enrollment;
use App\Models\FeeInvoice;
use App\Models\FundAccount;
use App\Models\ProcessingFee;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ProcessingNotification;

class ProcessingFeeRepository implements ProcessingFeeRepositoryInterface
{

    public function index()
    {
        $ProcessingFees = ProcessingFee::where('year', date('Y'))->get();
        return view('pages.ProcessingFee.index',compact('ProcessingFees'));
    }

    public function create()
    {
        $Enrollments = FeeInvoice::distinct()->where('year', date("Y"))->get(['student_id']);
        return view('pages.ProcessingFee.add',compact('Enrollments'));
    }

    public function edit($id)
    {
        $ProcessingFee = ProcessingFee::findOrFail($id);
        return view('pages.ProcessingFee.edit',compact('ProcessingFee'));
    }

    public function store($request)
    {
        try {
            // حفظ البيانات في جدول معالجة الرسوم
            $ProcessingFee = new ProcessingFee();
            $ProcessingFee->date = date('Y-m-d');
            $ProcessingFee->student_id = strip_tags($request->Student_id);
            $ProcessingFee->amount = strip_tags($request->Debit);
            $ProcessingFee->description = strip_tags($request->description);
            $ProcessingFee->year = date('Y');
            $ProcessingFee->create_by = auth()->user()->name;
            $ProcessingFee->save();


            // حفظ البيانات في جدول حساب الطلاب
            $students_accounts = new StudentAccount();
            $students_accounts->date = date('Y-m-d');
            $students_accounts->type = 'إستبعاد رسوم دراسية ';
            $students_accounts->student_id = strip_tags($request->Student_id);
            $students_accounts->processing_id = strip_tags($ProcessingFee->id);
            $students_accounts->Debit_processing = 0.00;
            $students_accounts->credit_processing = strip_tags($request->Debit);
            $students_accounts->description = strip_tags($request->description);
            $students_accounts->year = date('Y');
            $students_accounts->create_by = auth()->user()->name;
            $students_accounts->save();

            // حفظ البيانات في جدول الصندوق
            $fund_accounts = new FundAccount();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->type = 'إستبعاد رسوم دراسية ';
            $fund_accounts->student_id = strip_tags($request->Student_id);
            $fund_accounts->processing = strip_tags($ProcessingFee->description);
            $fund_accounts->credit_processing = strip_tags($request->Debit);
            $fund_accounts->year = date('Y');
            $fund_accounts->create_by = auth()->user()->name;
            $fund_accounts->save();

            $users = User::all();
            // $users = User::where('id', '!=', auth()->user()->id)->get();
            // $student = Student::where('id', '=', $ProcessingFee->student_id)->get();
            $create_by = auth()->user()->name;

            Notification::send($users, new ProcessingNotification($ProcessingFee->id,$create_by,$ProcessingFee->amount));

            toastr()->success('تـم إضـافـة إستبـاعد رسـوم الطـالـب  بنجـاح');
            return redirect()->route('ProcessingFee.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {

        try {
            // dd($request);
            // تعديل البيانات في جدول معالجة الرسوم
            $ProcessingFee = ProcessingFee::findOrFail(strip_tags($request->id));;
            $ProcessingFee->date = date('Y-m-d');
            $ProcessingFee->student_id = strip_tags($request->Student_id);
            $ProcessingFee->amount = strip_tags($request->Debit);
            $ProcessingFee->description = strip_tags($request->description);
            $ProcessingFee->year = date('Y');
            $ProcessingFee->create_by = auth()->user()->name;
            $ProcessingFee->save();

            // تعديل البيانات في جدول حساب الطلاب
            $students_accounts = StudentAccount::where('processing_id',strip_tags($request->id))->first();;
            $students_accounts->date = date('Y-m-d');
            $students_accounts->type = 'تعديل إستبعاد رسوم دراسية ';
            $students_accounts->student_id = strip_tags($request->Student_id);
            $students_accounts->processing_id = strip_tags($ProcessingFee->id);
            $students_accounts->Debit_processing = 0.00;
            $students_accounts->credit_processing = strip_tags($request->Debit);
            $students_accounts->description = strip_tags($request->description);
            $students_accounts->year = date('Y');
            $students_accounts->create_by = auth()->user()->name;
            $students_accounts->save();

            // حفظ البيانات في جدول الصندوق
            $fund_accounts = new FundAccount();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->type = 'تعديل إستبعاد رسوم دراسية ';
            $fund_accounts->student_id = strip_tags($request->Student_id);
            $fund_accounts->processing = strip_tags($ProcessingFee->description);
            $fund_accounts->credit_processing = strip_tags($request->Debit);
            $fund_accounts->year = date('Y');
            $fund_accounts->create_by = auth()->user()->name;
            $fund_accounts->save();


    
            toastr()->success('تـم تعـديـل إستبـاعد رسـوم الطـالـب  بنجـاح');
            return redirect()->route('ProcessingFee.index');
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            ProcessingFee::destroy(strip_tags($request->id));
            StudentAccount::where('processing_id',strip_tags($request->id))->delete();
            toastr()->error('تـم حـذف إستبـاعد رسـوم الطـالـب  بنجـاح');
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}