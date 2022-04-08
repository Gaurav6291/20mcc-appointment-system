<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::get('login', [Authcontroller::class, 'index'])->name('login');
Route::post('login', [Authcontroller::class, 'login'])->name('login')->middleware('throttle:2,1');

Route::get('register', [Authcontroller::class, 'register_view'])->name('register');
Route::post('register', [Authcontroller::class, 'register'])->name('register');
});

//when user is register and logged in

Route::group(['middleware'=>'auth'], function(){
Route::get('home', [AuthController::class, 'home'])->name('home');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('project_type', [AuthController::class, 'project_type']);
Route::get('third_screen/{id}', [AuthController::class, 'third_screen'])->name('third_screen');
Route::get('fourth_screen/{id}', [AuthController::class, 'fourth_screen'])->name('third_screen');;
Route::get('fifth_screen/{id}', [AuthController::class, 'fifth_screen'])->name('fifth_screen');;
Route::get('sixth_screen/{id}', [AuthController::class, 'sixth_screen'])->name('sixth_screen');;
Route::post('/img_submit', [AuthController::class, 'img_submit'])->name('img.submit');;

Route::get('fullcalender', [AuthController::class, 'indexx']);
Route::post('fullcalenderAjax', [AuthController::class, 'ajax']);

Route::post('final_submit/{id}', [AuthController::class, 'final_submit']);
});