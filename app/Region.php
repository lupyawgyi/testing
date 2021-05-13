<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = [
        'name'
    ];
    public function branches()
    {
        return $this->hasMany('App\Branch');
    }
}
