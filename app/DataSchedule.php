<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataSchedule extends Model
{
    protected $fillable = [
        "branch",
        "group",
        "birthday",
        "gender",
        "phone",
        "loan_officer",
        "account",
        "porduct",
        "p_out",
        "i_out",
        "f_out",
        "tot_out",
        "due_date",
    ];

//    public function clientID()
//    {
//        return $this->hasOne('App\Outstanding', ('account'), ('account'));
//    }
}
