<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Classes;
use App\Models\Assgin;
use App\Models\Teacher;

use DB;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function subject()
    {
        $subject = DB::table('subjects')
        ->join('classes', 'classes.c_id', '=', 'subjects.class')
        ->select('subjects.*', 'classes.Class_name')
        ->get();
        return view('layouts.subject')->with(compact('subject'));
    }

    public function createsubject()
    {
        $class = Classes::get();
        $title = 'Create Subject';
        $url = url('/subject/savesubject');
        $data = compact('url', 'title','class');
        return view("layouts.create_subj")->with($data);
    }
    public function savesubject(Request $request)
    {
        $subject = new Subject;
        $class = Classes::get();
        $subject->name = $request['subject'];
        $subject->class = $request['class'];
        $subject->save();
        return redirect()->route('subject');

    }
    public function delete($id)
    {
        $subject = Subject::find($id);
        if (!is_null($subject)) {
            $subject->delete();
        }
        return redirect()->route('subject');
    }
    public function edit($id)
    {
        $subject = Subject::find($id);
        $class = Classes::get();

        if (is_null($subject)) {
            return redirect()->route('subject');
        } else {
            $title = 'Update Subject';
            $url = url('/subject/update') . '/' . $id;
            $data = compact( 'class','subject', 'url', 'title');
            return view('layouts.create_subj', $data);
        }
    }
    public function update($id, Request $request)
    {
        $subject = Subject::get()->where('id', $id)->first();
        $subject->name = $request['subject'];
        $subject->class = $request['class'];
        $subject->save();
        return redirect(route('subject'));
    }

    public function assginsubj(Request $request)
    {
        $subject = Subject::get();
        $teacher = Teacher::get();
        // $classid = $request->classid;
        return view('layouts.assgin-subj',compact('subject','teacher'));
    }
    public function assgin(Request $request)
    {
        $assgin = new Assgin;
        $assgin->subject_id = $request['subject'];
        $assgin->teacher_id = $request['teacher'];
        $assgin->save();
        return redirect(route('subject'));
    }
}
