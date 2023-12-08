<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Work;
use App\Models\Rest;

class TimeStampsController extends Controller
{
    public function create(){
        if(Auth::check()){
            $users=[Auth::user()->username];
            return view ('stamp', compact('users'));
        }
        return redirect('/login');
    }

    public function start(Request $request){
        $request->validate([
            'clock_in' => 'required|date',
        ]);
        $users=[Auth::user()->username];
        Work::create([
            'user_id'=>Auth::user()->id,
            'clock_in'=>$request->input('clock_in'),
        ]);
        return view('stamp', compact('users'));
    }

    public function stop(Request $request){
        $request->validate([
            'clock_out' => 'required|date',
        ]);
        $users=[Auth::user()->username];
        $user_id=Auth::user()->id;
        $clock_out=$request->input('clock_out');
        $work=Work::where('user_id', $user_id)->whereNull('clock_out')->first();
        if($work){
            $work->update([
                'clock_out'=>$clock_out,
            ]);
        }
        return view('stamp', compact('users'));
    }

    public function break(Request $request){
        $request->validate([
            'rest_start' => 'required|date',
        ]);
        $users=[Auth::user()->username];
        $user_id=Auth::user()->id;
        $work_id=Work::where('user_id',$user_id)->whereNull('clock_out')->first()->id;
        $work=Work::where('user_id', $user_id)->whereNull('clock_out')->first();
        if($work){
            Rest::create([
            'user_id'=>$user_id,
            'work_id'=>$work_id,
            'rest_start'=>$request['rest_start'],
            ]);
        }
        return view('stamp', compact('users'));
    }

    public function restart(Request $request){
        $request->validate([
            'rest_stop' => 'required|date',
        ]);
        $users=[Auth::user()->username];
        return redirect('/');
    }
}
