<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisteredUserController extends Controller
{
    public function create(){
        return view('register');
    }

    public function store(RegisterRequest $request){
        User::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect('/login');
    }
}
