<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Job;
use App\Models\Rest;

class TimeStampsController extends Controller
{
    public function create(){
        if(Auth::check()){
            $users=User::all();
            return view ('stamp', compact('users'));
        }
        return redirect('/login');
    }

    public function start(){
        return view('stamp');
    }

    public function break(){
        return view('stamp');
    }

    public function restart(){
        return view('stamp');
    }

    public function stop(){
        return view('stamp');
    }
}
