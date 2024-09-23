<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function signin(){
        return view('pages.auth.sign-in');
    }
    public function signup(){
        return view('pages.auth.sign-up');
    }

    public function login(){
        Validator::make(request()->all(), [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth()->attempt(request()->only(['email', 'password']))) {
            $user = auth()->user();
            if ($user) {
                return redirect('/dashboard')->with('status', 'Login successful');
            }
        }
        return redirect()->back()->withErrors(['email' => 'Invalid Credentials']);
    }    

    public function register(){
        $data = request()->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'password' => ['required', 'string']
        ]);

        User::create($data);
    
        return redirect('/sign-up')->with('status', 'Registration successful');    
    }

    public function logout(){
        auth()->logout();
        return redirect('/sign-in')->with('status','Logout successful');
    }
}
