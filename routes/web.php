<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DoctorsController;
use App\Http\Controllers\Admin\SpecialtiesController;
use App\Http\Controllers\PatientListController;
use App\Http\Controllers\AppoinmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReviewController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'FrontEndController@index');



Route::get('/home', 'HomeController@index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';





//Route::get('/welcome/to/laravel','\App\Http\Controllers\DoctorController@welcome')->name('welcome.index');
//Route::get('/welcome.php',[DoctorController::class,'welcome']);
//Route::match(['get','post','put'],'match','DoctorConttroller@welcome');
//Route::redirect('home','/');
//Route::get('specializets',[SpecializetsController::class,'index']);
//Route::get('specializets/{name?}',[SpecializetsController::class,'show']);
Route::resource('/admin/doctors','\App\Http\Controllers\Admin\DoctorsController');
Route::resource('/admin/specialties','\App\Http\Controllers\Admin\SpecialtiesController');
//Home Page Routes
Route::get('/','\App\Http\Controllers\FrontEndController@index');

Route::get('/home', '\App\Http\Controllers\HomeController@index');
// patient
Route::get('/patients', '\App\Http\Controllers\PatientListController@index')->name('patients');
Route::get('/patientList/{doctorId}/{userId}', '\App\Http\Controllers\PatientListController@show')->name('patientlist');
Route::get('/status/update/{id}', '\App\Http\Controllers\PatientListController@toggleStatus')->name('update.status');
Route::get('/all-patients', '\App\Http\Controllers\PatientListController@allTimeAppointment')->name('all.appointments');
Route::resource('appoinment', '\App\Http\Controllers\AppoinmentController');
    Route::post('/appoinment/check', '\App\Http\Controllers\AppoinmentController@check')->name('appointment.check');
    Route::post('/appoinment/update', '\App\Http\Controllers\AppoinmentController@updateTime')->name('update');
    Route::get('/user-profile', '\App\Http\Controllers\ProfileController@index')->name('profile');
    Route::post('/user-profile', '\App\Http\Controllers\ProfileController@store')->name('profile.store');
    Route::post('/profile-pic', '\App\Http\Controllers\ProfileController@profilePic')->name('profile.pic');
    Route::resource('/contact', '\App\Http\Controllers\ContactController');
    Route::get('/review', '\App\Http\Controllers\ReviewController@showReviews');





