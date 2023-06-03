<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizController;
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
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\FeeInvoiceController;
use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\ProcessingFeeController;
use App\Http\Controllers\ReceiptStudentsController;
use App\Http\Controllers\StudentGradeController;
use App\Http\Controllers\TeacherClassesController;
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
        Route::get('/box', [HomeController::class, 'box']) -> name('box');

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
            Route::resource('TeacherClasses', TeacherClassesController::class);    
            Route::get('/print_teacher/', [TeacherClassesController::class, 'print']) -> name('TeacherClasses.print');        
        });


         //==============================Students============================
        Route::group(['namespace' => 'App\Http\Controllers'], function () {
            //==============================Students============================
            Route::resource('Students', StudentController::class);

            Route::post('Upload_attachment', [StudentController::class,'Upload_attachment'])->name('Upload_attachment');
            Route::get('Download_attachment/{studentsname}/{filename}', [StudentController::class,'Download_attachment'])->name('Download_attachment');
            Route::post('Delete_attachment', [StudentController::class,'Delete_attachment'])->name('Delete_attachment');

            Route::get('/show_student/{id}', [StudentController::class, 'show_student']) -> name('show_student');
            Route::get('/print_student/', [StudentController::class, 'print']) -> name('print');

            //==============================Students Graduated============================
            Route::resource('Graduated', GraduatedController::class);

            //==============================Students Promotion============================
            Route::resource('Upgrades',  PromotionController::class);
            Route::get('/print_promotion/', [PromotionController::class, 'print']) -> name('promotion.print');

            //==============================Students FeeInvoice============================
            Route::resource('Fees_Invoices', FeeInvoiceController::class);
            Route::get('/show_fee_invoice/{id}', [FeeInvoiceController::class, 'show_fee_invoice']) -> name('show_fee_invoice');

            //==============================Fees============================
            Route::resource('Fees',  FeeController::class);

            //==============================Students Receipt============================
            Route::resource('Receipts', ReceiptStudentsController::class);
            Route::get('/show_receipt/{id}', [ReceiptStudentsController::class, 'show_receipt']) -> name('show_receipt');

            //==============================Students Processing Fee============================
            Route::resource('ProcessingFee', ProcessingFeeController::class);
            Route::get('/show_processing/{id}', [ProcessingFeeController::class, 'show_processing']) -> name('show_processing');

            //==============================Students Payment============================
            Route::resource('Payments', PaymentController::class);
            Route::get('/show_payment/{id}', [PaymentController::class, 'show_payment']) -> name('show_payment');

            //==============================Students Attendance============================
            Route::resource('Attendance', AttendanceController::class);

            //==============================Students Grades============================
            Route::resource('Student_Grades', StudentGradeController::class);
            Route::get('/print_studentGrades/', [StudentGradeController::class, 'print']) -> name('StudentGrades.print');
            Route::get('/edit_student_grade/{id}', [StudentGradeController::class, 'edit_notification']) -> name('edit_notification');


    });

        //==============================Subjects============================
        Route::group(['namespace' => 'App\Http\Controllers'], function () {
            Route::resource('Subjects', SubjectController::class);
        });

         //==============================Quizzes============================
        Route::group(['namespace' => 'App\Http\Controllers'], function () {
            Route::resource('Quizzes', QuizController::class);
        });

        //==============================Results============================
        Route::group(['namespace' => 'App\Http\Controllers'], function () {
            Route::resource('Results', ResultController::class);
        });

        //==============================StudentClasses============================
        Route::group(['namespace' => 'App\Http\Controllers'], function () {
            Route::resource('Classes', StudentClassController::class);
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
