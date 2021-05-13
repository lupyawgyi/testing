<?php

namespace App\Http\Controllers\musoni;

use App\Charts\DashboardChart;
use App\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    public function store(Request $request){
        $dailyConfirm = new Dashboard();
        $dailyConfirm->branch = $request->get('branch');
        $dailyConfirm->totalOut = $request->get('totalOut');
        $dailyConfirm->totalOverOut = $request->get('totalOverOut');
        $dailyConfirm->dailyExpect = $request->get('dailyExpect');
        $dailyConfirm->totalrepayment = $request->get('totalrepayment');
        $dailyConfirm->compulsory = $request->get('compulsory');
        $dailyConfirm->voluntary = $request->get('voluntary');
        $dailyConfirm->dailysavingdeposit = $request->get('dailysavingdeposit');
        $dailyConfirm->dailysavingwithdraw = $request->get('dailysavingwithdraw');
        $dailyConfirm->dailydisburse = $request->get('dailydisburse');
        $dailyConfirm->save();
        return redirect(route('daily_confirm_index'))->with('success', 'Successfully Inserted Data!');


    }
    public function index(){
        if (Auth::check()){
            return redirect('/home');
        }
        $chart = Dashboard::query();
        $dashboardChart = new DashboardChart();
        $dashboardChart->dataset('daily','bar',[$chart->totalOut,$chart->totalOverOut,
            $chart->dailyExpect,$chart->totalrepayment,$chart->compulsory,$chart->voluntary]);
        return view('home',compact('dashboardChart'));
        }


    public function pull(){
        $dailyreport = Dashboard::query();
        return DataTables::of($dailyreport)
            ->editColumn('totalOut', function ($dailyreport) {
                return number_format($dailyreport->totalOut);
            })
            ->editColumn('totalOverOut', function ($dailyreport) {
                return number_format($dailyreport->totalOverOut);
            })
            ->editColumn('dailyExpect', function ($dailyreport) {
                return number_format($dailyreport->dailyExpect);
            })
            ->editColumn('totalrepayment', function ($dailyreport) {
                return number_format($dailyreport->totalrepayment);
            })
            ->editColumn('compulsory', function ($dailyreport) {
                return number_format($dailyreport->compulsory);
            })
            ->editColumn('voluntary', function ($dailyreport) {
                return number_format($dailyreport->voluntary);
            })
            ->editColumn('created_at', function ($dailyreport) {
                return $dailyreport->created_at->format('Y-m-d');
            })

            ->rawColumns([])
            ->make(true);
    }
}
