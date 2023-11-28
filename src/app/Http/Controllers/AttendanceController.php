<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Job;
use App\Models\rest;

class AttendanceController extends Controller
{
    public function create(){
        if(Auth::check()){
            return view ('attendance');
        }
    }
}
