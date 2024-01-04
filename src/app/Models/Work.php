<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Work extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function rests(){
        return $this->hasMany('App\Models\Rest');
    }

    protected $fillable = [
        'user_id',
        'rest_id',
        'clock_in',
        'clock_out',
    ];

    protected $dates=[
        'clock_in',
        'clock_out',
    ];

    protected $appends = ['work_time'];

    public function getWorkTimeAttribute(){
        $start = new Carbon($this->clock_in);
        $end = new Carbon($this->clock_out);
        $time = $end->diffInSeconds($start);

        $seconds = $time % 60;
        $minutes = ($time - $seconds) % 60;
        $hours = ($time - $seconds - $minutes * 60) / 3600;
        return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
    }
}
