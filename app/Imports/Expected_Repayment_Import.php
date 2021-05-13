<?php

namespace App\Imports;

use App\Expect_Repayment;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;


class Expected_Repayment_Import implements ToModel,WithHeadingRow,WithStartRow
{
    public function headingRow(): int
    {
        return 8;
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 9;
    }

    public function model(array $row)
    {
//        dd($row);
        return new Expect_Repayment([

            "ClientName" => $row['client_name'],
            "ClientID" => $row['client_id'],
            "AccountNo" => $row['account_no'],
            "LoanStatus" => $row['loan_status'],
            "Branch" => substr($row['branch'], 0, strrpos($row['branch'], ' ')),
            "Group" => $row['group'],
            "LoanOfficer" => $row['loan_officer'],
            "Product" => $row['product'],
            "ExpectedRepaymentDate" => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['expected_repayment_date']),
            "Expected_Repayment" => $row['expected_repayment'],
            "AmountRepaid" => $row['amount_repaid'],
            "RepaidSinceStart" => $row['repaid_since_start'],
            "TotalDue" => $row['total_due'],
            "Arrears" => $row['arrears'],
            "PhoneNo" => $row['phone_number'],
            "OriginOfFund" => $row['origin_of_fund'],

        ]);
    }
}
