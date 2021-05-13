<?php

namespace App\Exports;

use App\Outstanding;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Sixty1to90Export implements FromCollection,WithHeadings
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

//    function __construct($name) {
//        $this->name = $name;
//    }
    use Exportable;
    public function collection()
    {
        return Outstanding::all()->where('branch','=',$this->name)->whereBetween('days_in_arrears', array(61,90));
    }

    public function headings(): array
    {
        return [
            'Database ID',
            'Client ID',
            'Client Name',
            'DOB',
            'Gender',
            'Account',
            'Branch',
            'Product',
            'Interest At Disbursement',
            'EIR',
            'Disbursement',
            'Outstanding Principal',
            'Outstanding Interest',
            'Outstanding Fee',
            'Total Outstanding',
            'Loan Officer Name',
            'Disbursement Date',
            'installments Time',
            'Loan Frequency',
            'Status',
            'TRP',
            'Group Name',
            'Business Type',
            'loan purpose',
            'Payment Type',
            'final_payment_date',
            'Maturity Date',
            'Arrear Amount',
            'Days In Arrears'
        ];
    }
}
