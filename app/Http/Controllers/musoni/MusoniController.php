<?php

namespace App\Http\Controllers\musoni;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver\ServiceValueResolver;

class MusoniController extends Controller
{
    function Collection( Request $request)
    {

        $loanID = $request->get('loanID');
        $data = Http::withBasicAuth('myomin.tun', 'B@rL@rKw@r')->get('https://demo.sing.musoniservices.com:8443/api/v1/loans/'.$loanID.'/?tenantIdentifier=haymancapital')->json();
//        dd($data);
        if ($data['status']['closedObligationsMet'] == "true"){
//            dd($data);
            $state = "Full Paid";
            $interval = 0;
            $clientID = $data['clientAccountNo'];
            $clientName = $data['clientName'];
            $overdue = "-";
            $clientOutstanding = "0";
            $totalOverdue = "0";
            $writeOffamount = "0";
            $interestWaived = "0";
            $penaltyChargesWaived = "0";
            $loanAccount = $data['accountNo'];
            return view('musoni.show', compact('totalOverdue','interval', 'clientID', 'clientName', 'clientOutstanding','writeOffamount','interestWaived','penaltyChargesWaived','loanAccount','overdue','state'));

        }
        elseif ($data['status']['closedWrittenOff'] == "ture"){
//            dd($data);
            $state = "Write Off Loan";
            $interval = 0;
            $clientID = $data['clientAccountNo'];
            $clientName = $data['clientName'];
            $overdue = "-";
            $clientOutstanding = $data['summary']['totalOutstanding'];
            $totalOverdue = $data['summary']['totalOverdue'];
            $writeOffamount = $data['summary']['principalWrittenOff'];
            $interestWaived = $data['summary']['interestWaived'];
            $penaltyChargesWaived = $data['summary']['penaltyChargesWaived'];
            $loanAccount = $data['accountNo'];
            return view('musoni.show', compact('totalOverdue','interval', 'clientID', 'clientName', 'clientOutstanding','writeOffamount','interestWaived','penaltyChargesWaived','loanAccount','overdue','state'));

        }
        elseif ($data['summary']['overdueSinceDate']) {
            $state = "Overdue Loan";
            $array = $data['summary']['overdueSinceDate'];
            $overdue = "$array[2]-$array[1]-$array[0]";
            $mdate = strtotime("$array[0]-$array[1]-$array[2]");
            $musonidate = date('Y-m-d', $mdate);
            $date = \Illuminate\Support\Carbon::now();
            $interval = $date->diffInDays($musonidate);
            $clientID = $data['clientAccountNo'];
            $clientName = $data['clientName'];
            $clientOutstanding = $data['summary']['totalOutstanding'];
            $totalOverdue = $data['summary']['totalOverdue'];
            $writeOffamount = $data['summary']['principalWrittenOff'];
            $interestWaived = $data['summary']['interestWaived'];
            $penaltyChargesWaived = $data['summary']['penaltyChargesWaived'];
            $loanAccount = $data['accountNo'];
            return view('musoni.show', compact('totalOverdue','interval', 'clientID', 'clientName', 'clientOutstanding','writeOffamount','interestWaived','penaltyChargesWaived','loanAccount','overdue','state'));

        }
        else
        {
            $state    = "Active Loan";
            $interval = "do no overdue";
            $clientID = $data['clientAccountNo'];
            $clientName = $data['clientName'];
            $clientOutstanding = $data['summary']['totalOutstanding'];
            $totalOverdue = $data['summary']['totalOverdue'];
            $writeOffamount = $data['summary']['principalWrittenOff'];
            $interestWaived = $data['summary']['interestWaived'];
            $penaltyChargesWaived = $data['summary']['penaltyChargesWaived'];
            $loanAccount = $data['accountNo'];
            return view('musoni.show', compact('totalOverdue','interval', 'clientID', 'clientName', 'clientOutstanding','writeOffamount','interestWaived','penaltyChargesWaived','loanAccount','state'));

        }


    }

    function Client(Request $request){
        $clientID = $request->get('clientID');

        $data = Http::withBasicAuth('myomin.tun', 'B@rL@rKw@r')->get('https://demo.sing.musoniservices.com:8443/api/v1/clients/'.$clientID.'/accounts?fields=loanAccounts&tenantIdentifier=haymancapital')->json();
//        dd($data);
        foreach ($data as $datum => $value) {
            foreach ($value as $val)

                if ($val['status']['active'] == 'true') {
                    $loanID = $val['accountNo'];
                }
        }
        $address = Http::withBasicAuth('myomin.tun', 'B@rL@rKw@r')->get('https://demo.sing.musoniservices.com:8443/api/v1/datatables/cct_CustomAddressDetails/'.$clientID.'?tenantIdentifier=haymancapital')->json();
        foreach ($address as $addr)
            return view('musoni.clientDetail.show',compact('value','addr'));

    }

    function link($ID){
        $getData = linkid::where('loanID',$ID)->first();
        return $getData;
    }

    function datatable( Request $request)
    {

//        $loanID = $request->get('loanID');
        $data = Http::withBasicAuth('myomin.tun', 'B@rL@rKw@r')->get('https://demo.sing.musoniservices.com:8443/api/v1/datatables/cct_CollectionOfficerPayment?tenantIdentifier=haymancapital')->json();
        dd($data);
    }
}
