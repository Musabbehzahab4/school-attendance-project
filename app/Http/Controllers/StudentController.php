<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Classes;

class StudentController extends Controller
{
    public function student()
    {
        $students = Student::with('student_class')->get();
        return view('layouts.student_data', compact('students'));
    }
    public function createstudent()
    {
        return view("layouts.create_student");
    }
    public function storestudent(Request $request)
    {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('students'), $imageName);

        $student = new Student;
        $student->name = $request['name'];
        $student->email = $request['email'];
        $student->address = $request['address'];
        $student->gender = $request['gender'];
        $student->classes = $request['class'];
        $student->phone_no = $request['phone_no'];
        $student->image = $imageName;
        $student->save();
        return redirect(url('/student'));
    }


    public function destroy($id)
    {
        $student = Student::find($id);
        if (!is_null($student)) {
            $student->delete();
        }
        return redirect()->route('student');
    }

    public function edit($id)
    {
        $student = Student::find($id);
        $classes = Classes::get();
        if (is_null($student)) {
            return redirect()->route('student');
        } else {
            $title = 'Update Student';
            $url = url('/student/update') . '/' . $id;
            return view('layouts.registration')->with(compact('classes', 'student', 'url', 'title'));
        }
    }
    public function update($id, Request $request)
    {
        $student = Student::get()->where('s_id', $id)->first();
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('students'), $imageName);
            $student->image = $imageName;
        }
        $student->name = $request['name'];
        $student->email = $request['email'];
        $student->address = $request['address'];
        $student->gender = $request['gender'];
        $student->classes = $request['class'];
        $student->phone_no = $request['phone_no'];
        $student->save();
        return redirect()->route('student');
    }

    public function show($id)
    {
        $student = Student::where('s_id', $id)->get();
        return view('layouts.student-show', compact('student'));
    }

}
