<?php

namespace App\Imports;

use App\SavingTransaction;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class SavingImport implements ToModel,WithHeadingRow,WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function headingRow(): int
    {
        return 4;
    }
//
//    /**
//     * @return int
//     */
    public function startRow(): int
    {
        return 5;
    }

    public function model(array $row)
    {

        return new SavingTransaction([
            "client_name" => $row['client_name'],
            "account_no" => $row['account_no'],
            "branch"   => $row['branch'],
            "group" => $row['group'],
            "loan_officer" => $row['loan_officer'],
            "product"  => $row['product'],
            "action"  => $row['action'],
            "deposited" => $row['deposited'],
            "withdrawn" => $row['withdrawn'],
            "balance"  => $row['balance'],
            "date"  => $row['date'],
            "reference" => $row['reference'],
            "channel"  => $row['channel']
        ]);
    }
}
