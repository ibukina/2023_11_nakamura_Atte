<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        $password=$request->password;
        $hash_password=Hash::make($password);
        if(Hash::check($password, $hash_password)){
            $username=$request->username;
            return redirect('stamp', compact('username'));
        }else{
            return redirect('login');
        }
        // $credentials=[$request->only('email'),$password];
        // $username=$request->only(['username']);
        // if(Auth::attempt($credentials)){
            // return redirect('stamp', compact('username'));
        // }else{
            // return redirect('login');
        // }
        // Auth::attempt($user);
        // $username=$request->only(['username']);
        // return view('stamp', compact('username'));
    }
}
