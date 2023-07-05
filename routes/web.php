<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\GraduatedController;
use App\Http\Controllers\MidResultController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\FeeInvoiceController;
use App\Http\Controllers\FinalResultController;
use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\StudentGradeController;
use App\Http\Controllers\ProcessingFeeController;
use App\Http\Controllers\TeacherClassesController;
use App\Http\Controllers\ReceiptStudentsController;
use App\Http\Controllers\TeacherSubjectController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth' ]
    ], function(){ 
        
        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
        Route::get('/dashboard', [HomeController::class, 'dashboard']) -> name('dashboard');

        // define('PAGINATION_COUNT', 2);

        //==============================Boxes============================
        Route::get('/box', [HomeController::class, 'box']) -> name('box');
        Route::get('export_boxes', [HomeController::class, 'export'])->name('export_Boxes'); 

        //==============================Grades============================
        Route::group(['namespace' => 'App\Http\Controllers'], function () {
            Route::resource('Grades', GradeController::class);
            Route::get('Notification/markAsRead', [GradeController::class, 'markAsRead']) -> name('Notification.Read');
        });

        //==============================Classrooms============================
        Route::group(['namespace' => 'App\Http\Controllers'], function () {
            Route::resource('Classrooms', ClassroomController::class);
            Route::post('delete_all', [ClassroomController::class,'delete_all'])->name('delete_all');
        });


        //==============================Sections============================
        Route::group(['namespace' => 'App\Http\Controllers'], function () {
            Route::resource('Sections', SectionController::class);
            Route::get('/classes/{id}', [SectionController::class, 'getclasses']);
        });

        //==============================Teachers============================
        Route::group(['namespace' => 'App\Http\Controllers'], function () {
            Route::resource('Teachers', TeacherController::class);            
        });

        //==============================Teacher Classes============================
        Route::group(['namespace' => 'App\Http\Controllers'], function () {
            Route::resource('Classes_Teacher', TeacherClassesController::class);    
            Route::get('/print_teacher/', [TeacherClassesController::class, 'print']) -> name('TeacherClasses.print');        
        });

        //==============================Final Results============================
        Route::group(['namespace' => 'App\Http\Controllers'], function () {
            Route::resource('Final_Results', FinalResultController::class);  
            Route::post('find_student_final', [FinalResultController::class,'find_student_final'])->name('find_student_final');
            Route::post('send_final_result', [FinalResultController::class,'send_final_result'])->name('send_final_result');                          
            Route::get('export_final_results', [FinalResultController::class, 'export'])->name('export_finals');  
        });

        //==============================Mid Results============================
        Route::group(['namespace' => 'App\Http\Controllers'], function () {
            Route::resource('MidResults', MidResultController::class);
            Route::get('export_mid_results', [MidResultController::class, 'export'])->name('export_mid'); 
            Route::post('find_student_mid', [MidResultController::class,'add_student_mid'])->name('find_student_mid');
            Route::post('send_mid_result', [MidResultController::class,'send_mid_result'])->name('send_mid_result');                          
        });


         //==============================Students============================
        Route::group(['namespace' => 'App\Http\Controllers'], function () {
            //==============================Students============================
            Route::resource('Students', StudentController::class);
            Route::get('export_students', [StudentController::class, 'export'])->name('export_students');

            Route::post('Upload_attachment', [StudentController::class,'Upload_attachment'])->name('Upload_attachment');
            Route::get('Download_attachment/{studentsname}/{filename}', [StudentController::class,'Download_attachment'])->name('Download_attachment');
            Route::post('Delete_attachment', [StudentController::class,'Delete_attachment'])->name('Delete_attachment');

            Route::get('/show_student/{id}', [StudentController::class, 'show_student']) -> name('show_student');
            Route::get('/print_student/', [StudentController::class, 'print']) -> name('print');

            //==============================Students Graduated============================
            Route::resource('Graduated', GraduatedController::class);

            //==============================Enrollment Students============================
            Route::resource('Enrollments', EnrollmentController::class);
            Route::post('add_student', [EnrollmentController::class,'add_student'])->name('add_student_enrollment');

            //==============================Students Promotion============================
            Route::resource('Upgrades',  PromotionController::class);
            Route::get('/print_promotion/', [PromotionController::class, 'print']) -> name('promotion.print');

            //==============================Students FeeInvoice============================
            Route::resource('Fees_Invoices', FeeInvoiceController::class);
            Route::get('/show_fee_invoice/{id}', [FeeInvoiceController::class, 'show_fee_invoice']) -> name('show_fee_invoice');
            Route::get('export_fee_invoices', [FeeInvoiceController::class, 'export'])->name('export_fee_invoices');

            //==============================Fees============================
            Route::resource('Fees',  FeeController::class);

            //==============================Teacher Subjects============================
            Route::resource('TeacherSubjects',  TeacherSubjectController::class);

            //==============================Students Receipt============================
            Route::resource('Receipts', ReceiptStudentsController::class);
            Route::get('/show_receipt/{id}', [ReceiptStudentsController::class, 'show_receipt']) -> name('show_receipt');
            Route::get('export_receipts', [ReceiptStudentsController::class, 'export'])->name('export_receipts');

            //==============================Students Processing Fee============================
            Route::resource('ProcessingFee', ProcessingFeeController::class);
            Route::get('/show_processing/{id}', [ProcessingFeeController::class, 'show_processing']) -> name('show_processing');
            Route::get('export_process', [ProcessingFeeController::class, 'export'])->name('export_process');

            //==============================Students Payment============================
            Route::resource('Payments', PaymentController::class);
            Route::get('/show_payment/{id}', [PaymentController::class, 'show_payment']) -> name('show_payment');
            Route::get('export_payments', [PaymentController::class, 'export'])->name('export_payments');

            //==============================Students Attendance============================
            Route::resource('Attendance', AttendanceController::class);

            //==============================Students Grades============================
            Route::resource('Student_Grades', StudentGradeController::class);
            Route::get('export_student_grades', [StudentGradeController::class, 'export'])->name('export_student_grades');
            Route::get('/print_studentGrades/', [StudentGradeController::class, 'print']) -> name('StudentGrades.print');
            Route::get('/edit_student_grade/{id}', [StudentGradeController::class, 'edit_notification']) -> name('edit_notification');


    });

        //==============================Subjects============================
        Route::group(['namespace' => 'App\Http\Controllers'], function () {
            Route::resource('Subjects', SubjectController::class);
        });

        //==============================Users============================
        Route::group(['namespace' => 'App\Http\Controllers'], function () {
            Route::resource('Users', UserController::class);
            Route::post('/UserImage/{id}', [UserController::class, 'edit_user_Image']) -> name('edit_user_Image');
            Route::get('UserProfile', [UserController::class, 'show_profile']) -> name('show_profile');
            Route::post('/UserProfile/{id}', [UserController::class, 'edit_user_password']) -> name('edit_user_password');
        });

         //==============================Quizzes============================
        Route::group(['namespace' => 'App\Http\Controllers'], function () {
            Route::resource('Quizzes', QuizController::class);
        });

        //==============================Results============================
        Route::group(['namespace' => 'App\Http\Controllers'], function () {
            Route::resource('Results', ResultController::class);
            Route::get('export_results', [ResultController::class, 'export'])->name('export_results');
        });

        //==============================StudentClasses============================
        Route::group(['namespace' => 'App\Http\Controllers'], function () {
            Route::resource('Classes', StudentClassController::class);
            Route::get('export_student_classes', [StudentClassController::class, 'export'])->name('export_student_classes');
        });

        //==============================User Logout============================
        Route::post('/logout/{type}', [LoginController::class,'logout'])->name('logout');


          //==============================Setting============================
        Route::resource('Settings', SettingController::class);


    });




// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
