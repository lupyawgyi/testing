<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repayment extends Model
{
    protected $fillable = [
        "ClientName",
        "account_no",
        "branch",
        "group",
        "loan_officer",
        "product_name",
        "principal",
        "interest",
        "fees",
        "overpayment",
        "total_repaid",
        "repayment_date",
        "reference",
        "channel",
        "phone_number",
        "fund"
    ];
}
