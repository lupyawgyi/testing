<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        "branch",
        "nol",
        "tprincipal",
        "tinterest",
        "totalout",
        "ontime",
        "ontimeamount",
        "oneto30",
        "oneto30out",
        "thirty1to60",
        "thirty1to60out",
        "sixty1to90",
        "sixty1t090out",
        "ninety1to180",
        "ninety1to180out",
        "morethan180",
        "one80out",
        "totalNOL",
        "totaloverout",
        "compulsory",
        "voluntary",

    ];
}
