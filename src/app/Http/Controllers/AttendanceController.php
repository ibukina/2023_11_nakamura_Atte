<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;
use App\Models\rest;

class AttendanceController extends Controller
{
    public function _construct(){
        $this->middleware('auth')->only(['stamp', 'attendance']);
    }

    public function create(){
        return view('attendance');
    }
}
