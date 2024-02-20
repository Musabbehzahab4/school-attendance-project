<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use app\Models\Classes;

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

// Route::get('/', function () {
//     return view('welcome');
// });
//------------------------IndexController-----------------------------
// Route::get('/', [IndexController::class, 'index']);
// Route::get('/home', [IndexController::class, 'Home'])->name('home')->middleware('alreadyloggedin');
Route::get('/register', [IndexController::class, 'register'])->name('register');

//--------------------------ClassController---------------------------
Route::get('/class', [ClassController::class, 'class'])->name('class')->middleware('isLoggedIn');    //---AuthCheck
Route::get('/class/createclass', [ClassController::class, 'createclass'])->name('createclass');
Route::post('/class/saveclass', [ClassController::class, 'saveclass'])->name('saveclass');
Route::get('/class/delete/{id}', [ClassController::class, 'delete'])->name('classdelete');
Route::get('/class/edit/{id}', [ClassController::class, 'edit'])->name('classedit');
Route::post('/class/update/{id}', [ClassController::class, 'update'])->name('classupdate');
Route::get('/student/{id}/detail', [ClassController::class, 'detail'])->name('studentdetail');

// ---------------------------StudentController---------------------------------
Route::get('/student', [StudentController::class, 'student'])->name('student')->middleware('isLoggedIn'); //---AuthCheck
Route::get('/student/createstudent', [StudentController::class, 'createstudent'])->name('createstudent');
Route::post('/student/storestudent', [StudentController::class, 'storestudent'])->name('storestudent');
Route::get('/student/delete/{id}', [StudentController::class, 'destroy'])->name('studentdelete');
Route::get('/student/edit/{id}', [StudentController::class, 'edit'])->name('studentedit');
Route::post('/student/update/{id}', [StudentController::class, 'update'])->name('studentupdate');
Route::get('/student/show/{id}', [StudentController::class, 'show'])->name('showstudent');

// ---------------------------AttendanceController------------------------------
Route::get('/attendance/{id}', [AttendanceController::class, 'attend'])->name('attendance')->middleware('alreadyloggedin');
Route::post('/attendance/studid', [AttendanceController::class, 'studid'])->name('studid');

// --------------------------TeacherController----------------------------------
Route::get('/teacher', [TeacherController::class, 'Teach'])->name('teacher')->middleware('isLoggedIn');   //---AuthCheck
Route::get('/teacher/createteacher', [TeacherController::class, 'createteach'])->name('createteacher');
Route::post('/teacher/saveteacher', [TeacherController::class, 'saveteacher'])->name('saveteacher');
Route::get('/teacher/delete/{id}', [TeacherController::class, 'delete'])->name('teacherdelete');
Route::get('/teacher/edit/{id}', [TeacherController::class, 'edit'])->name('teacheredit');
Route::post('/teacher/update/{id}', [TeacherController::class, 'update'])->name('teacherupdate');
Route::get('/teacher/{id}/detail', [TeacherController::class, 'detail'])->name('teacherdetail');

//----------------------------------------SubjectController---------------------------------------------//
Route::get('/subject', [SubjectController::class, 'subject'])->name('subject')->middleware('isLoggedIn');
Route::get('/subject/createsubject', [SubjectController::class, 'createsubject'])->name('createsubject');
Route::post('/subject/savesubject', [SubjectController::class, 'savesubject'])->name('savesubject');
Route::get('/subject/delete/{id}', [SubjectController::class, 'delete'])->name('subj');
Route::get('/subject/edit/{id}', [SubjectController::class, 'edit'])->name('editsubj');
Route::post('/subject/update/{id}', [SubjectController::class, 'update'])->name('subjupdate');

Route::get('/subject/assg',[SubjectController::class,'assginsubj'])->name('assgin');
Route::post('/subject/assgin',[SubjectController::class,'assgin'])->name('assgin-subj');

//---------------------------------TimetableController------------------------------------------------//
Route::any('/timetable', [TimetableController::class, 'table'])->name('timetable');
Route::get('/timeform', [TimetableController::class, 'timefrom'])->name('time-from');
Route::post('/table/savetable', [TimetableController::class, 'savetable'])->name('savetable');

Route::get('/ajaxcall', [TimetableController::class, 'ajaxCall'])->name('ajax-call');




// ----------------------------------------Auth System---------------------------------------------//

//-------------------------CustomAuthController----------------------------------------
Route::get('/', [CustomAuthController::class, 'login'])->name('login')->middleware('alreadyloggedin');
Route::get('/registration', [CustomAuthController::class, 'registration'])->name('registration')->middleware('alreadyloggedin');
Route::post('/register-user', [CustomAuthController::class, 'registerUser'])->name('register-user');
Route::post('/login-user', [CustomAuthController::class, 'loginUser'])->name('login-user');
Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout')->middleware('isLoggedIn');

//----------------------------------AjaxRoute---------------------------------------------------//
Route::get('/getData/{email}', [CustomAuthController::class, 'check_pass'])->name('check.pass');


