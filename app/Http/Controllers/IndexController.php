<?php

namespace App\Http\Controllers;
use App\Models\Classes;

use App\Models\Student;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    // public function index()
    // {

    //     return view("components.header_navbar");

    // }
    public function Home()
    {
        return view('layouts.home');
    }

    public function register()
    {

        $url = '/student/storestudent';
        $title = 'Registration Here';
        $classes = Classes::get();
        return view('layouts.registration')->with(compact('classes','url','title'));
    }



}

