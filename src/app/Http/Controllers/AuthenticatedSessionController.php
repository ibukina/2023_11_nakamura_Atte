<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    public function create(){
        return view ('login');
    }

    public function store(LoginRequest $request){
        $credentials=$request->only('username', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->intended('/stamp');
        }
    }

    public function destroy(){
        return view('login');
    }
}
