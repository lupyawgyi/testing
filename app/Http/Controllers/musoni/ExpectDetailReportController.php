<?php

namespace App\Http\Controllers\musoni;

use App\Branch;
use App\Expect_Repayment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ExpectDetailReportController extends Controller
{
    public function index()
    {

//        return DataTables::of(Role::query())->make(true);
        return view('musoni.expect.index');
    }

    public function pull()
    {
//        $roles = Role::query()->orderBy('id', 'asc')->where('id','1');
        $expect = Expect_Repayment::query();
//        dd($expect);
        return DataTables::of($expect)
//            ->addColumn('ExpectedRepaymentAmount', function (){
//            return number_format('ExpectedRepaymentAmount');
//        })
            ->addColumn('action', function ($expect) {
                return '<a href= "' . $expect->id . '/show" class="btn btn-primary btn-sm text-white role">View</a>';
            })

            ->rawColumns(['action'])
            ->make(true);
    }

}
