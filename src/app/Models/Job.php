<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function rests(){
        return $this->hasMany('App\Models\Rest');
    }

    protected $fillable = [
        'rest_id',
        'clock_in',
        'clock_out',
    ];
}