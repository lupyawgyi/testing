<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GeneralRequest extends Model
{
    use SoftDeletes;
    public function branch(){
        return $this->belongsTo('App\Branch','branch_id','id');
    }
//    public function request(){
//        return $this->belongsTo('App\Error','error_id','id');
//    }
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function comments(){
        return $this->morphMany('App\GeneralComment','commendable');
    }
    public function assign(){
        return $this->belongsTo('App\User', 'assign_id', 'id');

    }
}
