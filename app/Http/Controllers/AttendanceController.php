<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Student;
use App\Models\attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function attend($id)
    {
         $attend = Student::where('classes',$id)->get();
         $attendace = attendance::get();
         $current_date = date("Y-m-d");

        $check = attendance::where(["date"=>$current_date,"class_id"=>$id])->get();

        if(count($check)){
            return redirect()->back()->with('fail','Attendance Already Taken.');
        }

         $date = $attendace;
        return view('layouts.attend')->with(compact('attend','date','attendace'));

    }
    public function studid(Request $request)
    {
        $student_class = $request->class;

            $list = $request->student;
            foreach ($list as $key => $value) {
                $attendace_std = $request->input('attendance'.$value);

                $attendace = new attendance;
                $attendace->date = date("Y-m-d");
                $attendace->user_id = $value;
                $attendace->class_id = $student_class;
                $attendace->attendance = $attendace_std;
                $attendace->save();
            }
            return redirect()->route('class');

    }
}
