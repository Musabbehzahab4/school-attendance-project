<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class CustomAuthController extends Controller
{
    public function login()
    {
        return view('authsss.loginnn');
    }
    public function registration()
    {
        return view('authsss.registration');
    }
    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:12',

        ]);
        $user = new User;
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->save();
        if ($user) {
            return redirect()->route('home');   //->with('success', 'You have registered')
        } else {
            return back()->with('fail', 'Something wrong');
        }
    }
    public function loginUser(Request $request)
    {

        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required|min:5|max:12',
        //     'newpassword' => 'required|min:5|max:12'
        // ]);
        $user = User::where('email', $request->email)->first();

        if (!empty($user)) {
            if ($user->password == null) {

                $user = User::where('email', '=', $request->email)->first();

                $user->password = Hash::make($request['newpassword']);
                $user->save();
            }

            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);

                $request->session()->put('role', $user->role); // Role session

                return redirect()->route('class');
            } else {
                return back()->with('fail', 'Password is not Matches');
            }
        } else {
            return back()->with('fail', 'This eamil is not registered');
        }
    }
    public function logout()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect()->route('login');
        }
    }
    public function check_pass($email)
    {

        $checkpass = User::where('email', $email)->first();

        if ($checkpass->password) {
            $result = "true";
        } else {
            $result = "false";
        }
        return response()->json(['result' => $result]);

    }
}
