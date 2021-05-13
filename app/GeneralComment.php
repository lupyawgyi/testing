<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralComment extends Model
{
    public function commendable(){
        return $this->morphTo();
    }
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
