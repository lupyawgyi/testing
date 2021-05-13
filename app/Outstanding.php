<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outstanding extends Model
{
    protected $fillable = [
        "client_id",
        "client_name",
        "dob",
        "gender",
        "account",
        "branch",
        "product",
        "interest_at_disbursement",
        "eir",
        "loan_p",
        "principal",
        "interest",
        "fees",
        "total",
        "loan_officer",
        "disbursed",
        "installments",
        "loan_frequency",
        "status",
        "trp",
        "group",
        "business_type",
        "loan_purpose",
        "payment_type",
        "final_payment_date",
        "maturity_date",
        "arrear_amount",
        "days_in_arrears",
    ];

    public function schedule()
    {
        return $this->belongsTo('App\DataSchedule', 'account', 'account');
    }


}
