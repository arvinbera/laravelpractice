<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/user/register', [RegisterController::class, 'register'])->name('user.register');
Route::get('/user/login', [RegisterController::class, 'login'])->name('user.login');
Route::post('/user/register/submit', [RegisterController::class, 'register_submit'])->name('user.register.submit');
Route::post('/user/login/submit', [RegisterController::class, 'login_submit'])->name('user.login.submit');
Route::get('/user/home', [RegisterController::class, 'home'])->name('user.home');
Route::get('/user/logout', [RegisterController::class, 'logout'])->name('user.logout');
Route::post('/student/add', [StudentController::class, 'add_student_submit'])->name('student.add');
