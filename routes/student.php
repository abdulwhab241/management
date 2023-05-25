<?php

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Student\ClassController;
use App\Http\Controllers\Student\StudentResultController;
use App\Http\Controllers\Student\StudentProfileController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Student\StudentAttendanceController;
use App\Http\Controllers\Student\StudentInformationController;


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
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:student']
    ], function () {


     //==============================Student Dashboard============================
    Route::get('/student/dashboard', function () {
        $Image = Student::findOrFail(auth()->user()->id)->get();
        return view('pages.Students.dashboard', compact('Image'));
    })->name('dashboard.Students');

    //==============================Student Information============================~
    Route::get('/student/information', function () {
        return view('pages.Students.information.index');
    })->name('Students.information');

    //==============================Student Group============================
Route::group(['namespace' => 'App\Http\Controllers'], function () {

    //==============================Student Accounts============================
    Route::resource('StudentAccounts', StudentInformationController::class);

    //==============================Student Receipt============================
    Route::get('/receipt/{id}', [StudentInformationController::class, 'receipt']) -> name('receipt');

    //==============================Student Class============================
    Route::resource('StudentTable', ClassController::class);

    //==============================Student Attendance============================
    Route::resource('StudentAttendance', StudentAttendanceController::class);

    //==============================Student Result============================
    Route::resource('StudentResult', StudentResultController::class);

    //==============================Student Profile============================
    Route::post('StudentImage/{id}', [StudentProfileController::class,'editImage'])->name('StudentImage.editImage');
    Route::get('StudentProfile', [StudentProfileController::class,'index'])->name('StudentProfile.show');
    Route::post('StudentProfile/{id}', [StudentProfileController::class,'update'])->name('StudentProfile.update');

    //==============================Notifications Red All============================
    Route::get('Notification/ReadAll', [StudentInformationController::class, 'ReadAll']) -> name('ReadAll');

    //==============================Student Logout============================
    Route::post('/logout/{type}', [LoginController::class,'logout'])->name('logout_student');

});



});

