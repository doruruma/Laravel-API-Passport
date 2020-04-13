<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    
    public function __construct()
    { 
        $this->middleware('isLogin')->except(['logout']);
    }

    // View
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }


    // Form Handler
    public function postLogin(Request $req)
    {
        $this->loginValidation();
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
            return redirect(route('HomeController.home'));
        } else {
            return redirect(route('AuthController.login'))->with([
                'type' => 'error',
                'message' => 'Invalid Email or Password'
            ]);
        }
    }

    public function postRegister(Request $req)
    {
        User::create($this->registerValidation());
        return redirect(route('AuthController.login'))->with([
            'type' => 'success',
            'message' => 'Account Registered Successfully, Please Login'
        ]);
    }


    // Validation
    private function loginValidation()
    {
        return request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    }

    private function registerValidation()
    {
        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required',
            'confirmPass' => 'required|same:password'
        ]);
    }

    
    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect(route('AuthController.login'));
    }

}