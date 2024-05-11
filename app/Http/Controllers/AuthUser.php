<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class AuthUser extends Controller
{
    
    
    public function register(){
        return view('login.register',[
            'pageTitle' => 'User | Register'
        ]);
    }

    public function store(Request $request){

        // ddd($request);

        $rulesValidation = $request->validate([
            'nama' => ['required','max:200'],
            'username' => ['required','min:3','max:200','unique:user'],
            'email' => ['required','email:dns','unique:user'],
            'password' => ['required','min:6']
        ]);
        $rulesValidation['password'] = Hash::make($rulesValidation['password']);

        Users::create($rulesValidation);

        return redirect('/user/login')->with('RegisterSuccess', 'Register successfull, login here');
    }

    public function index(){
        return view('login.user',[
            'pageTitle' => 'User | Login'
        ]);
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if(Auth::guard('users')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('user/dashboard');
        }

        return back()->with('loginFailed', 'Login failed, try again');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
