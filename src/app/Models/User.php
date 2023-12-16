<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    public function works(){
        return $this->hasMany('App\Models\Work');
    }

    public function rests(){
        return $this->hasMany('App\Models\Rest');
    }

    public function scopeWithWorks($query, $year, $month, $day){
        return $query->with(['works'=>function($query)use($year, $month, $day){
            $query->select('user_id', 'clock_in', 'clock_out', DB::raw('TIMEDIFF(clock_in, clock_out) as work_time'))
            ->whereYear('clock_in', $year)->whereMonth('clock_in', $month)->whereDay('clock_in', $day);
        }]);
    }

    public function scopeWithRests($query, $year, $month, $day){
        return $query->with(['rests'=>function($query)use($year, $month, $day){
            $query->select('user_id', 'work_id', 'rest_start', 'rest_stop', DB::raw('TIMEDIFF(rest_start, rest_stop) as rest_time'))->whereYear('rest_start', $year)->whereMonth('rest_start', $month)->whereDay('rest_start', $day);
        }]);
    }

    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    // public function insertUser($username, $email, $password)
    // {
        // return $this->create([
            // 'username' => $username,
            // 'email'=> $email,
            // 'password'     => Hash::make($password),
        // ]);
    // }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
