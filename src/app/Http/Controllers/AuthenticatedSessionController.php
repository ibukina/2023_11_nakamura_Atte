<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    public function create(){
        return view ('login');
    }

    public function store(LoginRequest $request){
        $credentials=$request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect('/')->intended('/login');
        }
    }

    public function destroy(){
        Auth::logout($user);
        return redirect('/register')->intended('/login');
    }
}
