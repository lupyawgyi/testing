<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavingTransaction extends Model
{
    protected $fillable = [
        "client_name",
        "account_no",
        "branch",
        "group",
        "loan_officer",
        "product",
        "action",
        "deposited",
        "withdrawn",
        "balance" ,
        "date" ,
        "reference",
        "channel"
        ];
}
