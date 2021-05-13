<?php

namespace App\Imports;

use App\DataSchedule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class DataScheduleImport implements ToModel,WithHeadingRow,WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function headingRow(): int
    {
        return 1;
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
//        dd($row);
        return new DataSchedule([
            "branch" => $row['branch_name'],
            "group" => $row['group_name'],
            "birthday" =>  $row['date_of_birth'],
            "gender" => $row['gender'],
            "phone"  => $row['phone_number'],
            "loan_officer" => $row['staff_name'],
            "account" => $row['account_number'],
            "porduct" => $row['product_name'],
            "p_out" => $row['principal_outstanding'],
            "i_out" => $row['interest_outstanding'],
            "f_out" => $row['fees_outstanding'],
            "tot_out" => $row['total_outstanding'],
            "due_date" => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['due_date'])->format('Y-m-d'),
        ]);
    }
}
