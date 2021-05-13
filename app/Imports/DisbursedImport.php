<?php

namespace App\Imports;

use App\DailyDisbursement;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class DisbursedImport implements ToModel,WithHeadingRow,WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
     *
     *
    */
    public function headingRow(): int
    {
        return 14;
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 15;
    }

    public function model(array $row)
    {
//        dd($row);
        return new DailyDisbursement([
            "client_id" => $row['client_id'],
            "client_name" => $row['client_name'],
            "dob" => $row['dob'],
            "gender" => $row['gender'],
            "account" => $row['account'],
            "branch" => $row['branch'],
            "product" => $row['product'],
            "loan_p" => $row['loan_p'],
            "interest" => $row['interest'],
            "fees" => $row['fees'],
            "total" => $row['total'],
            "loan_officer" => $row['loan_officer'],
            "cycle" => $row['cycle'],
            "fund" => $row['fund'],
            "disbursed" => $row['disbursed'],
            "group" => $row['group'],
            "business_type" => $row['business_type']
        ]);
    }
}
