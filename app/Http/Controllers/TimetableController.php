<?php

namespace App\Http\Controllers;

use App\Models\Assgin;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Timetable;
use Illuminate\Http\Request;

    class TimetableController extends Controller
{
    public function table(Request $request)
    {
        $classid = $request->class;
        $timetable = Timetable::where('timetables.class_id',$classid)
        ->join('subjects','subjects.id','=','timetables.subject_id')
        ->join('techer','techer.T_id','=','timetables.teacher_id')
        ->select('timetables.*','subjects.name as subject_name','techer.name as teacher_name')
        ->get();
        // dd($timetable);die;
        // $timetable->class_id = $request['classid'];
        $timetable->days = $request['day'];
        $timetable->time = $request['time'];
        $timetable->subject_id = $request['subject'];
        $timetable->teacher_id = $request['teacher'];
        // return $timetable;die;
        return view('layouts.timetable')->with(compact('classid','timetable'));
    }
    public function timefrom(Request $request)
    {
        $subject = Subject::where('class', $request->classid)->get();
        $teacher = Teacher::get();
        $assgin = Assgin::get();
        $classid = $request->classid;
        return view('layouts.table-form')->with(compact('subject', 'teacher', 'classid',));
    }
    public function ajaxCall(Request $request)
    {
        $assgin = Assgin::where('subject_id',$request->subject_id)
        ->join('techer','techer.T_id','=','assgins.teacher_id')
        ->select('assgins.*','techer.name as teacher_name')
        ->get();
        return $assgin;
    }
    public function savetable(Request $request)
    {

        $table = new timetable;
        $table->class_id = $request['classid'];
        $table->days = $request['day'];
        $table->time = $request['time'];
        $table->subject_id = $request['subject'];
        $table->teacher_id = $request['teacher'];
        $table->save();
        return redirect()->route('class');
    }



}
