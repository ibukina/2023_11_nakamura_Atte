<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisteredUserController extends Controller
{
    public function create(){
        return view('register');
    }

    public function store(RegisterRequest $request){
        $user=$request->only(['username', 'email', 'password']);
        User::create($user);
        $username=$request->only(['username']);
        return view('stamp', compact('username'));
    }
}
