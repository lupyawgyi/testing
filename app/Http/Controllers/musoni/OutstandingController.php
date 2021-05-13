<?php

namespace App\Http\Controllers\musoni;

use App\Exports\Ninety1to180Export;
use App\Exports\Oneto30Export;
use App\Exports\OntimeExport;
use App\Exports\Over180Export;
use App\Exports\Sixty1to90Export;
use App\Exports\Thirty1to60Export;
use App\Http\Controllers\Controller;
use App\Http\Middleware\branch_delete;
use App\Outstanding;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
//use Excel;

class OutstandingController extends Controller
{
    public function ontimeshow($name){

        $outstandings = Outstanding::where('branch','=',$name)->where('days_in_arrears', '=', 0);
         $total_loan =  $outstandings->count();

         $total_principal =  $outstandings->sum('principal');
        $total_interest =  $outstandings->sum('interest');
            $total_out = $outstandings->sum('total');

         $total_male = Outstanding::where('branch','=',$name)->where('days_in_arrears', '=', 0)->where('gender','=','Male')->count();
         $total_female =  Outstanding::where('branch','=',$name)->where('days_in_arrears', '=', 0)->where('gender','=','Female')->count();

        $total_male_out = Outstanding::where('branch','=',$name)->where('days_in_arrears', '=', 0)->where('gender','=','Male')->sum('total');
        $total_female_out = Outstanding::where('branch','=',$name)->where('days_in_arrears', '=', 0)->where('gender','=','Female')->sum('total');

        $trp9 =  Outstanding::where('branch','=',$name)->where('days_in_arrears', '=', 0)->where('trp','>=',0.9)->count();
        $trp8to9 = Outstanding::where('branch','=',$name)->where('days_in_arrears', '=', 0)->whereBetween('trp',array(0.8,0.9))->count();
        $trp5to8 = Outstanding::where('branch','=',$name)->where('days_in_arrears', '=', 0)->whereBetween('trp',array(0.5,0.8))->count();
        $trp5 = Outstanding::where('branch','=',$name)->where('days_in_arrears', '=', 0)->where('trp','<=','0.5')->count();
    return view('musoni.portfolio.detail.ontimeshow',compact('total_loan','total_interest','total_principal',
    'total_out','total_male','total_female','total_male_out','total_female_out','trp9','trp8to9','trp5to8','trp5','name'));
    }
    public function OntimeExport($name){
//        echo $name;
        return Excel::download(new OntimeExport($name), 'OntimeLoans.xlsx');
    }



    public function oneshow($name){

        $outstandings = Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(1,30));
        $total_loan =  $outstandings->count();

        $total_principal =  $outstandings->sum('principal');
        $total_interest =  $outstandings->sum('interest');
        $total_out = $outstandings->sum('total');

        $total_male = Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(1,30))->where('gender','=','Male')->count();
        $total_female =  Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(1,30))->where('gender','=','Female')->count();

        $total_male_out = Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(1,30))->where('gender','=','Male')->sum('total');
        $total_female_out = Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(1,30))->where('gender','=','Female')->sum('total');

        $trp9 =  Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(1,30))->where('trp','>=',0.9)->count();
        $trp8to9 = Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(1,30))->whereBetween('trp',array(0.8,0.9))->count();
        $trp5to8 = Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(1,30))->whereBetween('trp',array(0.5,0.8))->count();
        $trp5 = Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(1,30))->where('trp','<=','0.5')->count();
        return view('musoni.portfolio.detail.oneshow',compact('total_loan','total_interest','total_principal',
            'total_out','total_male','total_female','total_male_out','total_female_out','trp9','trp8to9','trp5to8','trp5','name'));
    }
    public function OneExport($name){
//        echo $name;
        return Excel::download(new Oneto30Export($name), '1to30Loans.xlsx');
    }

    public function threeshow($name){

        $outstandings = Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(31,60));
        $total_loan =  $outstandings->count();

        $total_principal =  $outstandings->sum('principal');
        $total_interest =  $outstandings->sum('interest');
        $total_out = $outstandings->sum('total');

        $total_male = Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(31,60))->where('gender','=','Male')->count();
        $total_female =  Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(31,60))->where('gender','=','Female')->count();

        $total_male_out = Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(31,60))->where('gender','=','Male')->sum('total');
        $total_female_out = Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(31,60))->where('gender','=','Female')->sum('total');

        $trp9 =  Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(31,60))->where('trp','>=',0.9)->count();
        $trp8to9 = Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(31,60))->whereBetween('trp',array(0.8,0.9))->count();
        $trp5to8 = Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(31,60))->whereBetween('trp',array(0.5,0.8))->count();
        $trp5 = Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(31,60))->where('trp','<=','0.5')->count();
        return view('musoni.portfolio.detail.threeshow',compact('total_loan','total_interest','total_principal',
            'total_out','total_male','total_female','total_male_out','total_female_out','trp9','trp8to9','trp5to8','trp5','name'));
    }
    public function ThreeExport($name){
//        echo $name;
        return Excel::download(new Thirty1to60Export($name), '31to60Loans.xlsx');
    }

    public function sixshow($name){

        $outstandings = Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(61,90));
        $total_loan =  $outstandings->count();

        $total_principal =  $outstandings->sum('principal');
        $total_interest =  $outstandings->sum('interest');
        $total_out = $outstandings->sum('total');

        $total_male = Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(61,90))->where('gender','=','Male')->count();
        $total_female =  Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(61,90))->where('gender','=','Female')->count();

        $total_male_out = Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(61,90))->where('gender','=','Male')->sum('total');
        $total_female_out = Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(61,90))->where('gender','=','Female')->sum('total');

        $trp9 =  Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(61,90))->where('trp','>=',0.9)->count();
        $trp8to9 = Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(61,90))->whereBetween('trp',array(0.8,0.9))->count();
        $trp5to8 = Outstanding::where('branch','=',$name)->where('days_in_arrears', '=', '0')->whereBetween('trp',array(0.5,0.8))->count();
        $trp5 = Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(61,90))->where('trp','<=','0.5')->count();
        return view('musoni.portfolio.detail.sixshow',compact('total_loan','total_interest','total_principal',
            'total_out','total_male','total_female','total_male_out','total_female_out','trp9','trp8to9','trp5to8','trp5','name'));
    }
    public function SixExport($name){
//        echo $name;
        return Excel::download(new Sixty1to90Export($name), '61to90Loans.xlsx');
    }

    public function nineshow($name){

        $outstandings = Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(91,180));
        $total_loan =  $outstandings->count();

        $total_principal =  $outstandings->sum('principal');
        $total_interest =  $outstandings->sum('interest');
        $total_out = $outstandings->sum('total');

        $total_male = Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(91,180))->where('gender','=','Male')->count();
        $total_female =  Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(91,180))->where('gender','=','Female')->count();

        $total_male_out = Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(91,180))->where('gender','=','Male')->sum('total');
        $total_female_out = Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(91,180))->where('gender','=','Female')->sum('total');

        $trp9 =  Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(91,180))->where('trp','>=',0.9)->count();
        $trp8to9 = Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(91,180))->whereBetween('trp',array(0.8,0.9))->count();
        $trp5to8 = Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(91,180))->whereBetween('trp',array(0.5,0.8))->count();
        $trp5 = Outstanding::where('branch','=',$name)->whereBetween('days_in_arrears', array(91,180))->where('trp','<=','0.5')->count();
        return view('musoni.portfolio.detail.nineshow',compact('total_loan','total_interest','total_principal',
            'total_out','total_male','total_female','total_male_out','total_female_out','trp9','trp8to9','trp5to8','trp5','name'));
    }
    public function NineExport($name){
//        echo $name;
        return Excel::download(new Ninety1to180Export($name), '91to180Loans.xlsx');
    }

    public function overshow($name){

        $outstandings = Outstanding::where('branch','=',$name)->where('days_in_arrears', '>',180);
        $total_loan =  $outstandings->count();

        $total_principal =  $outstandings->sum('principal');
        $total_interest =  $outstandings->sum('interest');
        $total_out = $outstandings->sum('total');

        $total_male = Outstanding::where('branch','=',$name)->where('days_in_arrears', '>',180)->where('gender','=','Male')->count();
        $total_female =  Outstanding::where('branch','=',$name)->where('days_in_arrears', '>',180)->where('gender','=','Female')->count();

        $total_male_out = Outstanding::where('branch','=',$name)->where('days_in_arrears', '>',180)->where('gender','=','Male')->sum('total');
        $total_female_out = Outstanding::where('branch','=',$name)->where('days_in_arrears', '>',180)->where('gender','=','Female')->sum('total');

        $trp9 =  Outstanding::where('branch','=',$name)->where('days_in_arrears', '>',180)->where('trp','>=',0.9)->count();
        $trp8to9 = Outstanding::where('branch','=',$name)->where('days_in_arrears', '>',180)->whereBetween('trp',array(0.8,0.9))->count();
        $trp5to8 = Outstanding::where('branch','=',$name)->where('days_in_arrears', '>',180)->whereBetween('trp',array(0.5,0.8))->count();
        $trp5 = Outstanding::where('branch','=',$name)->where('days_in_arrears', '>',180)->where('trp','<=','0.5')->count();
        return view('musoni.portfolio.detail.overshow',compact('total_loan','total_interest','total_principal',
            'total_out','total_male','total_female','total_male_out','total_female_out','trp9','trp8to9','trp5to8','trp5','name'));
    }
    public function OverExport($name){
//        echo $name;
        return Excel::download(new Over180Export($name), 'Over180Loans.xlsx');
    }
}
