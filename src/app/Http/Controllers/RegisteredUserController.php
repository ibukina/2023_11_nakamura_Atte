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
        $password=Hash::make($request->password);
        $user=[$request->only(['username', 'email']), $password];
        User::create($user);
        // $password=$request->password;
        // $hash_password=Hash::make($password);
        // $credentials=$request->only('email', 'password');
        // if(Auth::attempt($credentials)){
            // $username=$request->username;
            // $request->session()->regenerate();
            // return redirect('/', compact('username'))->intended('/');;
        // }
        // return redirect()->back();
        // $credentials=[$request->only('email'),$password];
        // $username=$request->only(['username']);
        // if(Auth::attempt($credentials)){
            // return redirect('stamp', compact('username'));
        // }else{
            // return redirect('login');
        // }
        // Auth::attempt($user);
        // $username=$request->only(['username']);
        return view('login', compact('username'));
    }
}
