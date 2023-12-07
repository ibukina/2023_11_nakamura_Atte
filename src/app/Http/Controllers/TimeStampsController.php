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
            $users=[Auth::user()->username];
            return view ('stamp', compact('users'));
        }
        return redirect('/login');
    }

    public function start(Request $request){
        $request->validate([
            'clock_in' => 'required|date',
        ]);
        Job::create([
            'user_id'=>Auth::user()->id,
            'clock_in'=>$request->input('clock_in'),
        ]);
        return redirect('/');
    }

    public function stop(Request $request){
        $request->validate([
            'clock_out' => 'required|date',
        ]);
        $user_id=Auth::user()->id;
        $clock_out=$request->input('clock_out');
        $job=Job::where('user_id', $user_id)->whereNull('clock_out')->first();
        if($job){
            $job->update([
                'clock_out'=>$clock_out,
            ]);
        }
        return redirect('/');
    }

    public function break(Request $request){
        $request->validate([
            'rest_start' => 'required|date',
        ]);
        $user_id=Auth::user()->id;
        $job_id=Job::where('user_id',$user_id)->whereNull('clock_out')->first()->id;
        $job=Job::where('user_id', $user_id)->whereNull('clock_out')->first();
        if($job){
            Rest::create([
            'user_id'=>$user_id,
            'job_id'=>$job_id,
            'rest_start'=>$request['rest_start'],
            ]);
        }
        return redirect('/');
    }

    public function restart(Request $request){
        $request->validate([
            'rest_stop' => 'required|date',
        ]);
        return redirect('/');
    }
}
