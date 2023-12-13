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

    public function work(){
        return $this->belongsTo('App\Models\Work');
    }

    public function scopeWorkDateSearch($query, $date){
        if(!empty($date)){
            $query->where('clock_in', 'like', '%' . $date . '%');
        }
    }

    public function scopeRestDateSearch($query, $date){
        if(!empty($date)){
            $query->where('rest_start', 'like', '%' . $date . '%');
        }
    }

    protected $fillable = [
        'user_id',
        'work_id',
        'rest_start',
        'rest_stop',
    ];
}
