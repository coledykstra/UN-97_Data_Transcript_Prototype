<?php

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

Route::get('/courses', 'App\Http\Controllers\CourseController@index');
Route::get('/students', 'App\Http\Controllers\StudentController@index');
Route::get('/enrollments/{studentId}', 'App\Http\Controllers\EnrollmentController@index');


