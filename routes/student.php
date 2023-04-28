<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentInformationController;
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

    Route::get('/student/dashboard', function () {
        return view('pages.Students.dashboard');
    })->name('dashboard.Students');

    Route::resource('Information', StudentInformationController::class);

    Route::get('/student/information', function () {
        return view('pages.Students.information.index');
    })->name('Students.information');

    // Route::get('/student/fee', function () {
    //     return view('pages.Students.information.show');
    // })->name('Students.fee');

});



// Route::get('/logout/{type}', [LoginController::class,'logout']);

require __DIR__.'/auth.php';