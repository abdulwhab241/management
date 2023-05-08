<?php

use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

    //==============================dashboard============================
    Route::get('/teacher/dashboard', function () {

        $ids = Teacher::findOrFail(auth()->user()->id)->SectionsWith()->pluck('section_id');
        $data['count_sections']= $ids->count();
        $data['count_students']= \App\Models\Student::whereIn('section_id',$ids)->count();


        return view('pages.Teachers.dashboard.dashboard',$data);
    });

    //==============================students============================
    Route::group(['namespace' => 'App\Http\Controllers'], function () {
        Route::get('student','TeacherStudentController@index')->name('student.index');
        Route::get('sections','TeacherStudentController@sections')->name('sections');
        Route::post('attendance','TeacherStudentController@attendance')->name('attendance');
        Route::post('edit_attendance','TeacherStudentController@editAttendance')->name('attendance.edit');
        Route::get('attendance_report','TeacherStudentController@attendanceReport')->name('attendance.report');
        Route::post('attendance_report','TeacherStudentController@attendanceSearch')->name('attendance.search');

        Route::resource('Exams', 'TeacherExamController');
        
        Route::resource('Questions', 'TeacherQuestionController');

        Route::get('profile', 'TeacherProfileController@index')->name('profile.show');
        Route::post('profile/{id}', 'TeacherProfileController@update')->name('profile.update');
    });



});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';