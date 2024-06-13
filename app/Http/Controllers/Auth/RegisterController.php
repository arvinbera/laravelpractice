<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class RegisterController extends Controller
{
    public function register()
    {
        return view('authentication.register');
    }

    public function register_submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $entity = new User();
        $entity->name = $request->name;
        $entity->email = $request->email;
        $entity->password = Hash::make($request->password);
        $entity->save();

        return redirect()->back()->with('success', 'Registration Successful');
    }

    public function login()
    {
        return view('authentication.login');
    }

    public function login_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('user.home');
        } else {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
    }

    public function home()
    {
        $students = Student::all();
        return view('home', compact('students'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.login');
    }
}
