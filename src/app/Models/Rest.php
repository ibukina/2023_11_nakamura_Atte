<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Rest extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function work(){
        return $this->belongsTo('App\Models\Work');
    }

    protected $fillable = [
        'work_id',
        'rest_start',
        'rest_stop',
    ];

    protected $dates=[
        'rest_start',
        'rest_stop',
    ];

    protected $appends = ['rest_time'];

    public function getRestTimeAttribute(){
        $start = new Carbon($this->rest_start);
        $end = new Carbon($this->rest_stop);
        $time = $end->diffInSeconds($start);

        $seconds = $time % 60;
        $minutes = ($time - $seconds) % 60;
        $hours = ($time - $seconds - $minutes * 60) / 3600;
        return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
    }
}
