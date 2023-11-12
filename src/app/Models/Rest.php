<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rest extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function job(){
        return $this->belongsTo('App\Models\Job');
    }

    protected $fillable = [
        'rest_start',
        'rest_stop',
    ];
}
