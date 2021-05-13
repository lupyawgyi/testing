<?php

namespace App\Imports;

use App\Outstanding;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;


class OutstandingImport implements ToModel,WithHeadingRow,WithStartRow,WithProgressBar
{

    use Importable;
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
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
     *
    */
//    public static function beforeImport(BeforeImport array $row)
//    {
//        if (Outstanding::where('branch','=',$row['branch']))
//            Outstanding::where('branch','=',$row['branch'])->delete();
//    }
//    public function __construct(array $row)
//
//    {
//        if (Outstanding::where('branch','=',$row['branch']))
//            Outstanding::where('branch','=',$row['branch'])->delete();
//    }
    public function model(array $row)
    {
//        dd($row);
//


        return new Outstanding([
            "client_id" => $row['client_id'],
            "client_name" => $row['client_name'],
            "dob" => $row['dob'],
            "gender" => $row['gender'],
            "account" => $row['account'],
            "branch" => $row['branch'],
            "product" => $row['product'],
            "interest_at_disbursement" => $row['interest_at_disbursement'],
            "eir" => $row['eir'],
            "loan_p" => $row['loan_p'],
            "principal" => $row['principal'],
            "interest" => $row['interest'],
            "fees" => $row['fees'],
            "total" => $row['total'],
            "loan_officer" => $row['loan_officer'],
            "disbursed" => $row['disbursed'],
            "installments" => $row['installments'],
            "loan_frequency" => $row['loan_frequency'],
            "status" => $row['status'],
            "trp" => $row['trp'],
            "group" => $row['group'],
            "business_type" => $row['business_type'],
            "loan_purpose" => $row['loan_purpose'],
            "payment_type" => $row['payment_type'],
            "final_payment_date" =>  \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['final_payment_date']),
            "maturity_date" => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['maturity_date']),
            "arrear_amount" => $row['arrear_amount'],
            "days_in_arrears" => $row['days_in_arrears']
        ]);
    }
}
