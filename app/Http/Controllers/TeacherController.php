<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Classes;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function teach()
    {
        $teachers = Teacher::get();

        return view('layouts.teacher')->with(compact('teachers'));
    }
    public function createteach()
    {
        $title = 'Add Teacher';
            $url = url('/teacher/saveteacher');
        return view('layouts.create_teacher')->with(compact('title','url'));
    }
    public function saveteacher(Request $request)
    {
        $teacher = new Teacher;
        $teacher->name = $request['name'];
        $teacher->email = $request['email'];
        $teacher->address = $request['address'];
        $teacher->gender = $request['gender'];
        $teacher->phone_no = $request['phone_no'];
        $teacher->save();
        $user = new user;
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->role = 2;
        $user->save();
        return redirect(url('/teacher'));
    }

    public function delete($id)
    {
        $teacher = Teacher::find($id);
        if (!is_null($teacher)) {
            $teacher->delete();
        }
        return redirect()->route('teacher');
    }
    public function edit($id)
    {
        $teacher = Teacher::find($id);
        if (is_null($teacher)) {
            return redirect()->route('teacher');
        } else {
            $title = 'Update Teacher';
            $url = url('/teacher/update') . '/' . $id;
            return view('layouts.create_teacher')->with(compact('teacher', 'url', 'title'));
        }
    }
    public function update($id, Request $request){
        $teacher = Teacher::get()->where('T_id',$id)->first();
        $teacher->name = $request['name'];
        $teacher->email = $request['email'];
        $teacher->address = $request['address'];
        $teacher->gender = $request['gender'];
        $teacher->phone_no = $request['phone_no'];
        $teacher->save();
        return redirect(route('teacher'));
 }
 public function detail($id)
    {
         $teacherList = Teacher::where('T_id',$id)->get();

        return view('layouts.teacher_detail',compact('teacherList'));
    }
}
