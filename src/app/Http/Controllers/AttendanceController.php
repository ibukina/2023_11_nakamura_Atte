<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Work;
use App\Models\Rest;

class AttendanceController extends Controller
{
    public function create(){
        if(Auth::check()){
            $date=Carbon::now()->format('Y-m-d');
            $year=Carbon::parse($date)->format('Y');
            $month=Carbon::parse($date)->format('m');
            $day=Carbon::parse($date)->format('d');
            $users=User::select('username')->withWorks($year, $month, $day)->withRests($year, $month, $day)->paginate(5);
            return view ('attendance', compact('date', 'users'));
        }
        return redirect('/login');
    }

    public function back(Request $request){
        $request->validate([
            'date' => 'required|date',
        ]);
        $dates=Carbon::parse($request->date);
        $date=$dates->subDays(1)->format('Y-m-d');
        $year=Carbon::parse($date)->format('Y');
        $month=Carbon::parse($date)->format('m');
        $day=Carbon::parse($date)->format('d');
        $users=User::select('username')->withWorks($year, $month, $day)->withRests($year, $month, $day)->paginate(5);
        foreach($users as $user){
            foreach($user->works as $work){
                var_dump($work->work_time);
            }foreach($user->rests as $rest){
                var_dump($rest->rest_time);
            }
        }
        return view('attendance', compact('date', 'users'));
    }

    public function next(Request $request){
        $request->validate([
            'date' => 'required|date',
        ]);
        $dates=Carbon::parse($request->date);
        $date=$dates->addDays(1)->format('Y-m-d');
        $year=Carbon::parse($date)->format('Y');
        $month=Carbon::parse($date)->format('m');
        $day=Carbon::parse($date)->format('d');
        $users=User::select('username')->withWorks($year, $month, $day)->withRests($year, $month, $day)->get();
        // $users=User::paginate(5);
        foreach($users as $user){
            foreach($user->works as $work){
                var_dump($work->work_time);
            }foreach($user->rests as $rest){
                var_dump($rest->rest_time);
            }
        }
        return view('attendance', compact('date', 'users'));
    }
}
