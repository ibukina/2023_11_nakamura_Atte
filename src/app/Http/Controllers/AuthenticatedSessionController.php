<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticatedSessionController extends Controller
{
    public function create(){
        return view ('login');
    }

    public function store(){
        return view ('login');
    }

    public function destroy(){
        return view('login');
    }
}
