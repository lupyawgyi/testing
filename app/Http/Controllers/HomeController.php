<?php

namespace App\Http\Controllers;

use App\Charts\DashboardChart;
use App\Dashboard;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        $chart = Dashboard::query();
//        $dashboardChart = new DashboardChart();
//        $dashboardChart->labels(["January",'Febuary','march']);
//        $dashboardChart->dataset('Total Outstanding','line',[$chart->sum('totalOut'),
//            $chart->sum('totalOverOut'),$chart->sum('dailyExpect')])
//            ->backgroundColor(collect(['#00FF29','#B2FC2E','#F4FF00']));
//        $dashboardChart->dataset('Total Repaid','line',[
//            $chart->sum('totalrepayment'),$chart->sum('compulsory'),
//            $chart->sum('voluntary')])
//            ->backgroundColor(collect(['#F5B041','#FF3E00  ','#C0392B']));
//        return view('home',compact('dashboardChart'));

        $Saving = DB::table('dashboards')
            ->select(
                DB::raw('YEAR(created_at) as year'),
                DB::raw('MONTH(created_at) as month'),
                DB::raw('WEEK(created_at) as week'),
                DB::raw('DAY(created_at) as day'),
                DB::raw('SUM(compulsory) as compulsory'),
                DB::raw('SUM(voluntary) as voluntary'),
                DB::raw('SUM(dailysavingdeposit) as dailydepo'),
                DB::raw('SUM(dailysavingwithdraw) as dailywith')


            )
            ->whereYear('created_at', '=', Carbon::now()->year)
            ->groupBy('year','month')
            ->get();
//        dd($month);
        foreach ($Saving as $value) {
//            dd($Saving);
            $monthNum = $value->month;
            $monthObj = DateTime::createFromFormat('!m', $monthNum);
            $monthName = $monthObj->format('F');
            $year[] = $value->year;
            $month[] = $monthName;
            $dayNum = $value->day;
            $dayObj = DateTime::createFromFormat('!d',$dayNum);
            $dayName = $dayObj->format('D');
            $day[] = $dayName;
            $week[] = $value->week;
            $compulsorys[] = $value->compulsory;
            $voluntarys[] = $value->voluntary;
            $dailydepo[] = $value->dailydepo;
            $dailywith[] = $value->dailywith;
//            dd($amount);
        }
        $savingChart = new DashboardChart();
        $savingChart->labels($month);

        $savingChart->dataset('Compusory', 'bar', $compulsorys)
            ->backgroundColor(collect(['#F5B041','#F5B041','#F5B041','#F5B041','#F5B041','#F5B041','#F5B041','#F5B041','#F5B041','#F5B041','#F5B041','#F5B041']));
        $savingChart->dataset('Voluntary', 'bar', $voluntarys)
            ->backgroundColor(collect([ 'blue','blue','blue','blue','blue','blue','blue','blue','blue','blue','blue','blue',]));
        $savingChart->dataset('Daily Saving Deposit', 'bar', $dailydepo)
            ->backgroundColor(collect([ 'green','green','green','green','green','green','green','green','green','green','green','green']));
        $savingChart->dataset('Daily Saving Withdraw', 'bar', $dailywith)
            ->backgroundColor(collect([ 'red','red','red','red','red','red','red','red','red','red','red','red']));



        return view('home', compact('savingChart'));

    }


}
