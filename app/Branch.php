<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'name',
        'openingDate',
        'address',
        'city',
        'phone',
        'manager',
        'dataSim1',
        'dataSim2',
        'url',
    ];
    public function region()
    {
        return $this->belongsTo('App\Region', 'region_id', 'id');
    }
    public function staff()
    {
        return $this->hasMany('App\Staff');
    }
}
