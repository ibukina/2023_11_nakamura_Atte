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
            $works=Work::whereDate('clock_in', $date)->with('user', 'rests')->paginate(5);
            return view ('attendance', compact('date', 'works'));
        }
        return redirect('/login');
    }

    public function back(Request $request){
        $request->validate([
            'date' => 'required|date',
        ]);
        $dates=Carbon::parse($request->date);
        $date=$dates->subDays(1)->format('Y-m-d');
        $works=Work::whereDate('clock_in', $date)->with('user', 'rests')->paginate(5);
        foreach($works as $work){
            var_dump($work->work_time);
            foreach($work->rests as $rest){
                var_dump($rest->rest_time);
            }
        }
        return view('attendance', compact('date', 'works'));
    }

    public function next(Request $request){
        $request->validate([
            'date' => 'required|date',
        ]);
        $dates=Carbon::parse($request->date);
        $date=$dates->addDays(1)->format('Y-m-d');
        $works=Work::whereDate('clock_in', $date)->with('user', 'rests')->paginate(5);
        foreach($works as $work){
            var_dump($work->work_time);
            foreach($work->rests as $rest){
                var_dump($rest->rest_time);
            }
        }
        return view('attendance', compact('date', 'works'));
    }
}
