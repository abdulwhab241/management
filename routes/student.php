<?php

use App\Http\Controllers\ClassController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentAttendanceController;
use App\Http\Controllers\StudentInformationController;
use App\Http\Controllers\StudentResultController;
use App\Models\Student;
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
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:student']
    ], function () {

    //==============================dashboard============================
    // Route::get('/student/dashboard', function () {
    //     return view('pages.Students.dashboard');
    // });

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

    //==============================Student Class============================
    Route::resource('StudentTable', ClassController::class);

    //==============================Student Attendance============================
    Route::resource('StudentAttendance', StudentAttendanceController::class);

    //==============================Student Result============================
    Route::resource('StudentResult', StudentResultController::class);

        //==============================Student Profile============================
    Route::post('StudentImage/{id}', 'StudentProfileController@editImage')->name('StudentImage.editImage');
    Route::get('StudentProfile', 'StudentProfileController@index')->name('StudentProfile.show');
    Route::post('StudentProfile/{id}', 'StudentProfileController@update')->name('StudentProfile.update');
    // Route::post('StudentProfile/{id}', 'StudentProfileController@update')->name('StudentProfile.editImage');

});


   

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Route::get('/logout/{type}', [LoginController::class,'logout']);

require __DIR__.'/auth.php';