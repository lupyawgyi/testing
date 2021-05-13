<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyDisbursement extends Model
{
    protected $fillable = [
        "client_id",
        "client_name",
        "dob",
        "gender",
        "account",
        "branch",
        "product",
        "loan_p",
        "interest",
        "fees",
        "total",
        "loan_officer",
        "cycle",
        "fund",
        "disbursed",
        "group",
        "business_type"
    ];
}
