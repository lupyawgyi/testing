<?php

namespace App\Imports;

use App\Portfolio;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;


class PortfolioImport implements ToModel,WithHeadingRow,WithStartRow
{
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


    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
//        dd($row);

        return new Portfolio([
            "branch" => $row['branch'],
            "nol" => str_replace(",", "", $row['nol']),
            "tprincipal" => str_replace(",", "",$row['p']),
            "tinterest" => str_replace(",", "",$row['i']),
            "totalout" => str_replace(",", "",$row['total']),
            "ontime" => str_replace(",", "",$row['ontime']),
            "ontimeamount" => str_replace(",", "",$row['amount']),
            "oneto30" => str_replace(",", "",$row['1to30']),
            "oneto30out" => str_replace(",", "",$row['1to30out']),
            "thirty1to60" => str_replace(",", "",$row['31to60']),
            "thirty1to60out" => str_replace(",", "",$row['31to60out']),
            "sixty1to90" => str_replace(",", "",$row['61to90']),
            "sixty1t090out" => str_replace(",", "",$row['61t090out']),
            "ninety1to180" => str_replace(",", "",$row['91to180']),
            "ninety1to180out" => str_replace(",", "",$row['91to180out']),
            "morethan180" => str_replace(",", "",$row['morethan180']),
            "one80out" => str_replace(",", "",$row['180out']),
            "totalNOL" => str_replace(",", "",$row['totalnol']),
            "totaloverout" => str_replace(",", "",$row['totalout']),
            "compulsory" => str_replace(",", "",$row['c']),
            "voluntary"  => str_replace(",", "",$row['v']),

        ]);

    }
}
