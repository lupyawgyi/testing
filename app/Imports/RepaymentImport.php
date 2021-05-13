<?php

namespace App\Imports;

use App\Repayment;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class RepaymentImport implements ToModel,WithHeadingRow,WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function headingRow(): int
    {
        return 13;
    }
//
//    /**
//     * @return int
//     */
    public function startRow(): int
    {
        return 14;
    }

    public function model(array $row)

    {

        return new Repayment([
            "ClientName" => $row['client_name'],
            "account" => $row['account_no'],
            "branch" => $row['branch'],
            "group" => $row['group'],
            "loan_officer" => $row['loan_officer'],
            "product_name" => $row['product_name'],
            "principal" => str_replace(",", "",$row["principal"]),
            "interest" => str_replace(",", "",$row["interest"]),
            "fees" => str_replace(",", "",$row["fees"]),
            "overpayment" => str_replace(",", "",$row['overpayment']),
            "total_repaid" => str_replace(",", "",$row["total_repaid"]),
            "repayment_date" => $row["date"],
            "reference" => $row["reference"],
            "channel" => $row["channel"],
            "phone_number" => $row["phone_number"],
            "fund" => $row["origin_of_fund"]
        ]);
    }
}
