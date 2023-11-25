<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;
use App\Models\Rest;

class TimeStampsController extends Controller
{
    // public function _construct(){
        // $this->middleware('auth')->only(['stamp', 'attendance']);
    // }

    public function create(){
        $this->middleware(function(){
            $user=Auth::user($user);
            return view('stamp', ['user'=>$user]);
        });
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
