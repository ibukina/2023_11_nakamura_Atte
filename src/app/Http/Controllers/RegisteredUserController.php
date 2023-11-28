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
        // $password=Hash::make($request->password);
        // $user=[$request->only(['username', 'email']), $password];
        // User::create($user);
        User::create([
            'name' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        $username=$request->only('username');
        $credentials=$request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect('/')->intended('/login');
        }
        // return view('login', compact('username'));
        // $password=$request->password;
        // $hash_password=Hash::make($password);
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
    }
}
