<?php

use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Teacher\StudentGradeController;
use App\Http\Controllers\Teacher\TeacherResultController;
use App\Http\Controllers\Teacher\TeacherClassesController;
use App\Http\Controllers\Teacher\TeacherProfileController;
use App\Http\Controllers\Teacher\StudentMidResultController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Teacher\StudentFinalResultController;

/*
|--------------------------------------------------------------------------
| student Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//==============================Translate all pages============================
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher']
    ], function () {

    //==============================Teacher dashboard============================
    Route::get('/teacher/dashboard', function () {

        $ids = Teacher::findOrFail(auth()->user()->id)->SectionsWith()->pluck('section_id');
        $data['count_sections']= $ids->count();
        $data['count_students']= \App\Models\Student::whereIn('section_id',$ids)->count();

        return view('pages.Teachers.dashboard.dashboard',$data);

    });

    //==============================students============================
    Route::group(['namespace' => 'App\Http\Controllers\Teacher'], function () {

        //==============================Teacher Students============================
        Route::get('TeacherStudent','TeacherStudentController@index')->name('student.index');
        Route::get('TeacherSections','TeacherStudentController@sections')->name('sections');
        Route::post('editAttendance','TeacherStudentController@editAttendance')->name('editAttendance');
        Route::get('attendance_report','TeacherStudentController@attendanceReport')->name('attendance.report');
        Route::post('attendance_report','TeacherStudentController@attendanceSearch')->name('attendance.search');

        //==============================Teacher Exam============================
        Route::resource('TeacherExams', 'TeacherExamController');

        //==============================Teacher Result============================
        Route::resource('TeacherResult', 'TeacherResultController');
        Route::get('/print_Teacher_Results/{id}', [TeacherResultController::class, 'print']) -> name('TeacherResult.print');

        //==============================Teacher Student Grades============================
        Route::resource('Teacher_Grades', StudentGradeController::class);
        Route::get('/print_Teacher_Grades/{id}', [StudentGradeController::class, 'print']) -> name('Teacher_Grades.print');
        
        //==============================Teacher Attendance============================
        Route::resource('TeacherAttendance', 'TeacherAttendanceController');

        //==============================Teacher Classes============================
        Route::resource('Teacher_Classes', TeacherClassesController::class);

        //==============================Student Mid Results============================
        Route::resource('StudentMidResults', StudentMidResultController::class);

        //==============================Student Final Results============================
        Route::resource('StudentFinalResults', StudentFinalResultController::class);

        //==============================Notifications Red All============================
        Route::get('Notification/Read', [TeacherProfileController::class, 'Read']) -> name('Read');

        //==============================Teacher Profile============================
        Route::post('TeacherImage/{id}', 'TeacherProfileController@editImage')->name('TeacherImage.editImage');
        Route::get('TeacherProfile', 'TeacherProfileController@index')->name('TeacherProfile.show');
        Route::post('TeacherProfile/{id}', 'TeacherProfileController@update')->name('TeacherProfile.update');

        //==============================Teacher Logout============================
        Route::post('/logout/{type}', [LoginController::class,'logout'])->name('logout_teacher');


    });



});
