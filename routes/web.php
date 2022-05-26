<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\TeacherController;

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
//     return view('welcome');
// });

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('student','App\Http\Controllers\StudentController');
Route::post('student-list','App\Http\Controllers\StudentController@studentList');
Route::resource('marks','App\Http\Controllers\MarksReportController');
Route::get('/class','App\Http\Controllers\StudentController@viewClasses');
Route::post('/class-list','App\Http\Controllers\StudentController@listClass');
Route::get('/create-class','App\Http\Controllers\StudentController@createClass')->name('class.create');
Route::post('/save-class','App\Http\Controllers\StudentController@saveClass')->name('class.store');
Route::post('mark-list','App\Http\Controllers\MarksReportController@searchList');


//division
Route::resource('division',DivisionController::class);
Route::post('division-list',[DivisionController::class,'searchList']);
Route::post('get-division',[DivisionController::class,'getDivision']);
Route::resource('teacher',TeacherController::class);
Route::post('teacher-list',[TeacherController::class,'searchList']);





require __DIR__.'/auth.php';
