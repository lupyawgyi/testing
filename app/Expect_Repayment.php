<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expect_Repayment extends Model
{
    protected $table = "expect__repayments";
    protected $fillable = [
        "ClientName",
        "ClientID",
        "AccountNo",
        "LoanStatus",
        "Branch",
        "Group",
        "LoanOfficer",
        "Product",
        "ExpectedRepaymentDate",
        "Expected_Repayment",
        "AmountRepaid",
        "RepaidSinceStart",
        "TotalDue",
        "Arrears",
        "PhoneNo",
        "OriginOfFund"
    ];
}
