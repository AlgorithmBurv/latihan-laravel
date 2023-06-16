<?php

use Illuminate\Support\Facades\Route;


use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassRoomController;


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


// Route::get('/', function () {
//     return view('home', [
//         'name' => 'Maman',
//         'role' => 'admin',
//         'buah' => ['mangga', 'apel', 'kurma', 'jeruk']
//     ]);
// })->middleware('auth');

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticating'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');


//show all
Route::get('/students', [StudentController::class, 'index'])->middleware('auth');
// Route::get('/students', [StudentController::class, 'index']);

//show detail
// Route::get('/student/{id}', [StudentController::class, 'show']);
Route::get('/student/{id}', [StudentController::class, 'show'])->middleware('auth','must-admin');

//add
Route::get('/student_add', [StudentController::class, 'create'])->middleware('auth','must-admin');
// Route::get('/student_add', [StudentController::class, 'create']);
Route::post('/student_add', [StudentController::class, 'store'])->middleware('auth','must-admin');
// Route::post('/student_add', [StudentController::class, 'store']);

//edit
Route::get('/student_edit/{id}', [StudentController::class, 'edit'])->middleware('auth','must-admin');
Route::put('/student_edit/{id}', [StudentController::class, 'update'])->middleware('auth','must-admin');

//deleted
Route::get('/student_delete/{id}', [StudentController::class, 'delete'])->middleware('auth','must-admin');
Route::delete('/student_destroy/{id}', [StudentController::class, 'destroy'])->middleware('auth','must-admin');

//deleted soft
Route::get('/student_deleted', [StudentController::class, 'deleted_student'])->middleware('auth','must-admin');
Route::get('/student_deleted/{id}/restore', [StudentController::class, 'restore'])->middleware('auth','must-admin');

Route::get('/class', [ClassRoomController::class, 'index'])->middleware('auth');
