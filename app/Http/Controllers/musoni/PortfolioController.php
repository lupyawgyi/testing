<?php

namespace App\Http\Controllers\musoni;


use App\Charts\PortfolioChart;
use App\Http\Controllers\Controller;
use App\Portfolio;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PortfolioController extends Controller
{
    public function index()
    {

//        return DataTables::of(Role::query())->make(true);
        return view('musoni.portfolio.index');
    }

    public function pull()
    {
//        $roles = Role::query()->orderBy('id', 'asc')->where('id','1');
        $portfolio = Portfolio::query();
//        dd($portfolio);
        return DataTables::of($portfolio)
//            ->addColumn('ExpectedRepaymentAmount', function (){
//            return number_format('ExpectedRepaymentAmount');
//        })
            ->editColumn('nol', function ($portfolio) {
                return number_format($portfolio->nol);
            })
            ->editColumn('tprincipal', function ($portfolio) {
                return number_format($portfolio->tprincipal);
            })
            ->editColumn('tinterest', function ($portfolio) {
                return number_format($portfolio->tinterest);
            })
            ->editColumn('totalout', function ($portfolio) {
                return number_format($portfolio->totalout);
            })
            ->editColumn('ontime', function ($portfolio) {
                return number_format($portfolio->ontime);
            })
            ->editColumn('ontimeamount', function ($portfolio) {
                return number_format($portfolio->ontimeamount);
            })
            ->editColumn('totalNOL', function ($portfolio) {
                return number_format($portfolio->totalNOL);
            })
            ->editColumn('totaloverout', function ($portfolio) {
                return number_format($portfolio->totaloverout);
            })
            ->addColumn('action', function ($portfolio) {
                return '<a href= "' . $portfolio->id . '/show" class="btn btn-primary btn-sm text-white role">View</a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function show($id)
    {
        $portfolio = Portfolio::find($id);


        $portfoliochart = new PortfolioChart();
        $portfoliochart->labels(['Ontime', '1 to 30', '31 to 60','61 to 90','91 to 180','Over 180']);
        $portfoliochart->dataset('type', 'pie', [$portfolio->ontime, $portfolio->oneto30,
            $portfolio->thirty1to60, $portfolio->sixty1to90, $portfolio->ninety1to180, $portfolio->morethan180])
            ->backgroundColor(collect(['#00FF29','#B2FC2E','#F4FF00','#F5B041','#FF3E00  ','#C0392B']));
        return view('musoni.portfolio.show', compact('portfolio', 'portfoliochart'));
    }
}

