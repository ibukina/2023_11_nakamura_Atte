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
        Work::create([
            'user_id'=>Auth::user()->id,
            'clock_in'=>$request->input('clock_in'),
        ]);
        return response()->json([
        'message' => 'データベースに値を格納しました',
        'redirect' => '/' // リダイレクト先のURL
        ]);
    }

    public function stop(Request $request){
        $request->validate([
            'clock_out' => 'required|date',
        ]);
        $user_id=Auth::user()->id;
        $clock_out=$request->input('clock_out');
        $work=Work::where('user_id', $user_id)->whereNull('clock_out')->first();
        if($work){
            $work->update([
                'clock_out'=>$clock_out,
            ]);
        }
        return response()->json([
        'message' => 'データベースに値を格納しました',
        'redirect' => '/'
        ]);
    }

    public function break(Request $request){
        $request->validate([
            'rest_start' => 'required|date',
        ]);
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
        return response()->json([
        'message' => 'データベースに値を格納しました',
        'redirect' => '/'
        ]);
    }

    public function restart(Request $request){
        $request->validate([
            'rest_stop' => 'required|date',
        ]);
        $user_id=Auth::user()->id;
        $rest=Rest::where('user_id', $user_id)->whereNull('rest_stop')->first();
        return response()->json([
        'message' => 'データベースに値を格納しました',
        'redirect' => '/'
        ]);
    }
}
