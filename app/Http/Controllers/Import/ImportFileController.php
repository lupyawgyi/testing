<?php

namespace App\Http\Controllers\Import;

use App\Http\Controllers\Controller;
use App\Imports\DailyPortfolioImport;
use App\Imports\DataScheduleImport;
use App\Imports\DisbursedImport;
use App\Imports\Expected_Repayment_Import;
use App\Imports\OutstandingImport;
use App\Imports\PortfolioImport;
use App\Imports\RepaymentImport;
use App\Imports\SavingImport;
use App\Outstanding;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class ImportFileController extends Controller
{
    public function ImportForm(){
        return view('musoni.expect.import');
    }

    public function savingdaily(Request $request){
        Excel::import(new SavingImport,$request->data);
        return redirect(route('saving-daily'))->with('success', 'Successfully Inserted Data!');
    }

    public function disbursedaily(Request $request){
        Excel::import(new DisbursedImport,$request->data);
        return redirect(route('disburse-daily'))->with('success', 'Successfully Inserted Data!');
    }

    public function repaymentdaily(Request $request){
//        dd($request->data);
        Excel::import(new RepaymentImport,$request->data);
        return redirect(route('repayment-detail'))->with('success', 'Successfully Inserted Data!');
    }

    public function expectdetail(Request $request){
//        dd($request->data);

       Excel::import(new Expected_Repayment_Import,$request->data);
       return redirect(route('expect-detail'))->with('success', 'Successfully Inserted Data!');
    }

    public function portfolio(Request $request){
//        dd($request->data);
        Excel::import(new PortfolioImport(),$request->data);
        return redirect(route('portfolio'))->with('success', 'Successfully Inserted Data!');
    }

    Public function outstandingview(){
        $dailyimport = Outstanding::groupBy('branch')->get();
        dd($dailyimport);
    }
    public function outstanding(Request $request){
        Excel::import(new OutstandingImport(),$request->data);
        return redirect(route('outstanding'))->with('success', 'Successfully Inserted Data!');
    }

    public function dataschedule(Request $request){
//        dd($request->data);
        Excel::import(new DataScheduleImport(),$request->data);
        return redirect(route('exportschedule'))->with('success', 'Successfully Inserted Data!');
    }
}
