<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Student;

class ClassController extends Controller
{

    public function createclass()
    {
        $title = 'Create Classes';
        $url = url('/class/saveclass');
        $data = compact('url', 'title');
        return view("layouts.create_class")->with($data);
    }

    public function saveclass(Request $request)
    {


        $classes = new Classes;
        $classes->Class_name = $request['class'];
        $classes->save();
        return redirect()->route('class');

    }

    public function class ()
    {
        $class = Classes::get();
        return view('layouts.class')->with(compact('class'));
    }
    public function delete($id)
    {
        $class = Classes::find($id);
        if (!is_null($class)) {
            $class->delete();
        }
        return redirect()->route('class');
    }
    public function edit($id)
    {
        $class = Classes::find($id);
        if (is_null($class)) {
            return redirect()->route('class');
        } else {
            $title = 'Update Classes';
            $url = url('/class/update') . '/' . $id;
            $data = compact('class', 'url', 'title');
            return view('layouts.create_class', $data);
        }
    }
    public function update($id, Request $request)
    {
        $class = Classes::get()->where('c_id', $id)->first();
        $class->Class_name = $request['class'];
        $class->save();
        return redirect(route('class'));
    }
    public function detail($id)
    {
        $classesList = Student::where('classes', $id)->get();
        $classid = $id;
    //  echo $classid;die;
        return view('layouts.student-detail', compact('classesList', 'classid'));
    }


}
