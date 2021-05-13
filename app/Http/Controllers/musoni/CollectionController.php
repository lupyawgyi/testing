<?php

namespace App\Http\Controllers\musoni;

use App\Branch;
use App\DataSchedule;
use App\GeneralRequest;
use App\Http\Controllers\Controller;
use App\Outstanding;
use App\Portfolio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\DataTables;

class CollectionController extends Controller
{
    public function index()
    {
        return view('musoni.collection.ontime.index');
    }

    public function pull()
    {
        if (Auth::user()->hasRole('Super User'))
            $data = Outstanding::query()->where('days_in_arrears','=',0);
//        dd($data);
        return DataTables::of($data)

            ->editColumn('dob',function ($data){
                return \Carbon\Carbon::parse($data->dob)->diff(\Carbon\Carbon::now())->format('%y years, %m months and %d days');
            })
            ->addColumn('phone', function ($data) {
                return $data->schedule['phone'];
            })
            ->addColumn('next', function ($data){
                return $data->schedule['due_date'];
            })
            ->addColumn('tout', function ($data){
                return $data->schedule['tot_out'];
            })
            ->addColumn('action', function ($data) {
                return '<a href= "' . $data->account . '/show" class="btn btn-primary btn-sm text-white role">View</a>';
            })
            ->rawColumns(['phone','next','tout','action'])
            ->make(true);
    }
    public function ontimeview($id){

        $coname = Http::withBasicAuth('myomin.tun', 'B@rL@rKw@r')->get('https://demo.sing.musoniservices.com:8443/api/v1/datatables/cct_CollectionOfficer/'.$id.'?tenantIdentifier=haymancapital')->json();

        $cocollect = Http::withBasicAuth('myomin.tun', 'B@rL@rKw@r')->get('https://demo.sing.musoniservices.com:8443/api/v1/datatables/cct_CollectionOfficerPayment/'.$id.'?tenantIdentifier=haymancapital')->json();

        $comment = Http::withBasicAuth('myomin.tun', 'B@rL@rKw@r')->get('https://demo.sing.musoniservices.com:8443/api/v1/datatables/cct_CollectionComment/'.$id.'?tenantIdentifier=haymancapital')->json();

        return view('musoni.collection.ontime.show',compact('coname','cocollect','comment','id'));

    }


    public function oneThirty(){
        return view('musoni.collection.Onetothirty.index');

    }
    public function onethirtypull()
    {

//        if (Auth::user()->hasRole('Super User'))
            $data = Outstanding::query(); //->whereBetween('days_in_arrears', array(1,30))
        return DataTables::of($data)

            ->editColumn('dob',function ($data){
               return \Carbon\Carbon::parse($data->dob)->diff(\Carbon\Carbon::now())->format('%y years, %m months and %d days');
//                return \Carbon\Carbon::parse($data->dob)->diff(\Carbon\Carbon::now())->format('%y');

            })
            ->addColumn('phone', function ($data) {
                return $data->schedule['phone'];
            })
            ->addColumn('action', function ($data) {
                return '<a href= "' . $data->account . '/show" class="btn btn-primary btn-sm text-white role">View</a>';
            })
            ->rawColumns(['phone','action'])
            ->make(true);
    }

    public function onethirtyview($id){

        $coname = Http::withBasicAuth('myomin.tun', 'B@rL@rKw@r')->get('https://demo.sing.musoniservices.com:8443/api/v1/datatables/cct_CollectionOfficer/'.$id.'?tenantIdentifier=haymancapital')->json();

        $cocollect = Http::withBasicAuth('myomin.tun', 'B@rL@rKw@r')->get('https://demo.sing.musoniservices.com:8443/api/v1/datatables/cct_CollectionOfficerPayment/'.$id.'?tenantIdentifier=haymancapital')->json();

        $comment = Http::withBasicAuth('myomin.tun', 'B@rL@rKw@r')->get('https://demo.sing.musoniservices.com:8443/api/v1/datatables/cct_CollectionComment/'.$id.'?tenantIdentifier=haymancapital')->json();

        return view('musoni.collection.Onetothirty.show',compact('coname','cocollect','comment','id'));

    }

    public function CreateAssign(Request $request,$id){
        Http::withBasicAuth('myomin.tun', 'B@rL@rKw@r')->post('https://demo.sing.musoniservices.com:8443/api/v1/datatables/cct_CollectionOfficer/'.$id.'?tenantIdentifier=haymancapital',
            [
                "dateFormat" => "yyyy-MM-dd",
                "Collection_Offi1" => $request->get('co'),
                "Assigned_Manager2"=> $request->get('assign_person'),
                "Assigned_Date3" => $request->get('assign_date'),
                "locale" => "en_GB",
                "submittedon_date" => Carbon::today()->toDateString(),
                "submittedon_userid" => "691"
            ]

        )->json();
        return redirect()->back();
    }

    public function collection(Request $request,$id){
        Http::withBasicAuth('myomin.tun', 'B@rL@rKw@r')->post('https://demo.sing.musoniservices.com:8443/api/v1/datatables/cct_CollectionOfficerPayment/'.$id.'?tenantIdentifier=haymancapital',
            [
                "dateFormat" => "yyyy-MM-dd",
                "Collection_Offi1" => $request->get('collect_person'),
                "Amount2"=> $request->get('amount'),
                "Loan_Type6" => $request->get('loan_type'),
                "Collection_Date3" => Carbon::today()->toDateString(),
                "locale" => "en_GB",
                "submittedon_date" => Carbon::today()->toDateString(),
                "submittedon_userid" => "691"
            ]

        )->json();
        return redirect()->back();
    }

    public function comment(Request $request,$id){
        Http::withBasicAuth('myomin.tun', 'B@rL@rKw@r')->post('https://demo.sing.musoniservices.com:8443/api/v1/datatables/cct_CollectionComment/'.$id.'?tenantIdentifier=haymancapital',
            [
                "dateFormat" => "yyyy-MM-dd",
                "Comment_User1" => $request->get('Comment_User1'),
                "Comment2" => $request->get('Comment2'),
                "Comment_time3" => Carbon::today()->toDateString(),
                "locale" => "en_GB",
                "submittedon_date" => Carbon::today()->toDateString(),
                "submittedon_userid" => "691"
            ]

        )->json();
        return redirect()->back();
    }

}
