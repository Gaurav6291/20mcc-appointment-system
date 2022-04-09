<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ScheduleController;

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

Route::get('/', function () {
    return view('welcome');
});


// when user is not login/register

Route::group(['middleware'=>'guest'], function(){

//login screen
Route::get('login', [Authcontroller::class, 'index'])->name('login');
Route::post('login', [Authcontroller::class, 'login'])->name('login')->middleware('throttle:2,1');
//registration screen
Route::get('register', [Authcontroller::class, 'register_view'])->name('register');
Route::post('register', [Authcontroller::class, 'register'])->name('register');


});

//when user is register and logged in

Route::group(['middleware'=>'auth'], function(){


Route::get('home', [AuthController::class, 'home'])->name('home');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('project_type', [ScheduleController::class, 'project_type']);
Route::get('third_screen/{id}', [ScheduleController::class, 'third_screen'])->name('third_screen');
Route::get('fourth_screen/{id}', [ScheduleController::class, 'fourth_screen'])->name('third_screen');;
Route::get('fifth_screen/{id}', [ScheduleController::class, 'fifth_screen'])->name('fifth_screen');;
Route::get('sixth_screen/{id}', [ScheduleController::class, 'sixth_screen'])->name('sixth_screen');;
Route::post('/img_submit', [ScheduleController::class, 'img_submit'])->name('img.submit');;

Route::get('fullcalender', [ScheduleController::class, 'indexx']);
Route::post('fullcalenderAjax', [ScheduleController::class, 'ajax']);

Route::post('final_submit/{id}', [ScheduleController::class, 'final_submit']);


});