<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Work;
use App\Models\rest;

class AttendanceController extends Controller
{
    public function create(){
        if(Auth::check()){
            // $items=User::with('work')->WorkDateSearch($request->date)->RestDateSearch($request->date)->get();
            $items=User::with('work')->with('rest')->get();
            return view ('attendance', compact('items'));
        }
        return redirect('/login');
    }
}
