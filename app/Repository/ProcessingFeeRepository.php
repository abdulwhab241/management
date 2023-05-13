<?php


namespace App\Repository;


use App\Models\Student;
use App\Models\FundAccount;
use App\Models\ProcessingFee;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ProcessingFeeRepository implements ProcessingFeeRepositoryInterface
{

    public function index()
    {
        $ProcessingFees = ProcessingFee::all();
        return view('pages.ProcessingFee.index',compact('ProcessingFees'));
    }

    public function show($id)
    {
        $Student = Student::findOrFail($id);
        return view('pages.ProcessingFee.add',compact('Student'));
    }

    public function edit($id)
    {
        $ProcessingFee = ProcessingFee::findOrFail($id);
        // $Student = Student::findOrFail($id);
        return view('pages.ProcessingFee.edit',compact('ProcessingFee'));
    }

    public function store($request)
    {
        try {
            // حفظ البيانات في جدول معالجة الرسوم
            $ProcessingFee = new ProcessingFee();
            $ProcessingFee->date = date('Y-m-d');
            $ProcessingFee->student_id = strip_tags($request->student_id);
            $ProcessingFee->amount = strip_tags($request->Debit);
            $ProcessingFee->description = strip_tags($request->description);
            $ProcessingFee->create_by = auth()->user()->name;
            $ProcessingFee->save();


            // حفظ البيانات في جدول حساب الطلاب
            $students_accounts = new StudentAccount();
            $students_accounts->date = date('Y-m-d');
            $students_accounts->type = 'إستبعاد رسوم دراسية (مدين)';
            $students_accounts->student_id = strip_tags($request->student_id);
            $students_accounts->processing_id = strip_tags($ProcessingFee->id);
            $students_accounts->Debit_processing = 0.00;
            $students_accounts->credit_processing = strip_tags($request->Debit);
            $students_accounts->description = strip_tags($request->description);
            $students_accounts->create_by = auth()->user()->name;
            $students_accounts->save();

            // حفظ البيانات في جدول الصندوق
            $fund_accounts = new FundAccount();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->student_id = strip_tags($request->student_id);
            $fund_accounts->processing = strip_tags($ProcessingFee->description);
            // $fund_accounts->Debit_processing = 0.00;
            $fund_accounts->credit_processing = strip_tags($request->Debit);
            // $fund_accounts->description = strip_tags($request->description);
            $fund_accounts->create_by = auth()->user()->name;
            $fund_accounts->save();


            // DB::commit();
            toastr()->success('تـم إضـافـة إستبـاعد رسـوم الطـالـب  بنجـاح');
            return redirect()->route('ProcessingFee.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        // DB::beginTransaction();

        try {
            // تعديل البيانات في جدول معالجة الرسوم
            $ProcessingFee = ProcessingFee::findOrFail($request->id);;
            $ProcessingFee->date = date('Y-m-d');
            $ProcessingFee->student_id = strip_tags($request->student_id);
            $ProcessingFee->amount = strip_tags($request->Debit);
            $ProcessingFee->description = strip_tags($request->description);
            $ProcessingFee->create_by = auth()->user()->name;
            $ProcessingFee->save();

            // تعديل البيانات في جدول حساب الطلاب
            $students_accounts = StudentAccount::where('processing_id',$request->id)->first();;
            $students_accounts->date = date('Y-m-d');
            $students_accounts->type = 'تعديل إستبعاد رسوم دراسية (مدين)';
            $students_accounts->student_id = strip_tags($request->student_id);
            $students_accounts->processing_id = strip_tags($ProcessingFee->id);
            $students_accounts->Debit_processing = 0.00;
            $students_accounts->credit_processing = strip_tags($request->Debit);
            $students_accounts->description = strip_tags($request->description);
            $students_accounts->create_by = auth()->user()->name;
            $students_accounts->save();

            // حفظ البيانات في جدول الصندوق
            $fund_accounts = FundAccount::where('processing_id',$request->id)->first();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->student_id = strip_tags($request->student_id);
            $fund_accounts->processing = strip_tags($ProcessingFee->description);
            // $fund_accounts->Debit_processing = 0.00;
            $fund_accounts->credit_processing = strip_tags($request->Debit);
            // $fund_accounts->description = strip_tags($request->description);
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
            ProcessingFee::destroy($request->id);
            StudentAccount::destroy($request->id);
            FundAccount::destroy($request->id);
            toastr()->error('تـم حـذف إستبـاعد رسـوم الطـالـب  بنجـاح');
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}