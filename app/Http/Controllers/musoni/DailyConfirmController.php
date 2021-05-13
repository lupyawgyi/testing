<?php

namespace App\Http\Controllers\musoni;

use App\DailyDisbursement;
use App\Dashboard;
use App\Expect_Repayment;
use App\Http\Controllers\Controller;
use App\Http\Middleware\branch_delete;
use App\Outstanding;
use App\Portfolio;
use App\Repayment;
use App\SavingTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class DailyConfirmController extends Controller


{   public function index(){
    $branch = Auth::user()->branch->name;
    $str=substr($branch, 0, strrpos($branch, ' '));
//    echo $str;

    $noupdate = Dashboard::query()->where('branch','=',$branch)->whereDate('created_at','=',Carbon::yesterday())->first();

    $outstanding = Portfolio::query()->where('branch','=',$branch)->whereDate('created_at','=',Carbon::yesterday())->first();
    $repayment = Repayment::query()->where('branch','=',$branch)->sum('total_repaid');
    $expectrepayment = Expect_Repayment::query()->where('Branch','=',$str)->sum('Expected_Repayment');
    $dailysavingdeposit = SavingTransaction::query()->where('branch','=',$branch)->sum('deposited');
    $dailysavingwithdraw = SavingTransaction::query()->where('branch','=',$branch)->sum('withdrawn');
    $dailydisburse = DailyDisbursement::query()->where('branch','=',$branch)->sum('total');
//    echo $expectrepayment;
    $user_branch = $branch;
    $date = Carbon::yesterday();
//    echo $outstanding;
    $totalout =  $outstanding->totalout;
    $totaloverout =  $outstanding->totaloverout;
    $totalrepayment = $repayment;
    $totalcompulsory = $outstanding->compulsory;
    $totalvoluntary = $outstanding->voluntary;

    if ($noupdate == null)
        return view('musoni.dailyConfirm.index',compact('totalout',
            'totaloverout','totalrepayment','totalcompulsory','totalvoluntary','user_branch','date','expectrepayment','noupdate','dailysavingdeposit','dailysavingwithdraw','dailydisburse'));
    else
        return view('musoni.dailyConfirm.index',compact('noupdate'));
}
    public function pull()
    {
        $branch = Auth::user()->office_id;
        $user_branch = Auth::user()->branch->name;


        $compulsory = Portfolio::query()->where('branch','=','Bago branch')->whereDate('created_at','=',Carbon::today())->first();
        $voluntary = Portfolio::query()->where('branch','=','Bago branch')->whereDate('created_at','=',Carbon::today())->first();
        $totout    = Portfolio::query()->where('branch','=','Bago branch')->whereDate('created_at','=',Carbon::today())->first();
//        $compulsory->compulsory;

        $arrear = Expect_Repayment::query()->where('branch','=','Insein branch')->where('ExpectedRepaymentDate','=',Carbon::today())->sum('Arrears');// Need Expected repayment
        $totalrepaid = Expect_Repayment::query()->whereDate('Created_at','=',Carbon::today())->sum('AmountRepaid'); // Total Repayment
        $data = Expect_Repayment::query()->where('ExpectedRepaymentDate','=',Carbon::today())->sum('AmountRepaid'); // Get Expected
        $data = Expect_Repayment::query()->where('ExpectedRepaymentDate','<',Carbon::today())->sum('AmountRepaid'); //Overdue
        $data = Expect_Repayment::query()->where('TotalDue','<',0)->sum('TotalDue'); // Prepaid
        $writeoff = Repayment::query()->where('principal','=',0)->where('interest','=',0)->sum('total_repaid');

        $overpaid = Expect_Repayment::query()->where('TotalDue','<',0)->sum("AmountRepaid");

        $noneed1 = Expect_Repayment::query()->whereDate('ExpectedRepaymentDate','=',Carbon::today())->where('TotalDue','<=',0)->where('Arrears','=',0)->where('LoanStatus','=','Closed')->sum('Expected_Repayment');
        $noneed2 = Expect_Repayment::query()->whereDate('ExpectedRepaymentDate','=',Carbon::today())->where('TotalDue','<=',0)->where('Arrears','=',0)->where('LoanStatus','=','Overpaid')->sum('Expected_Repayment');
        echo $noneed1 + $noneed2;

    }
}
