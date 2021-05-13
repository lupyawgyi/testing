<?php

namespace App\Http\Controllers\Request;

use App\GeneralComment;
use App\GeneralRequest;
use App\Http\Controllers\Controller;

use App\Reopen;
use App\Transaction;
use App\Undo;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class GeneralRequestController extends Controller
{
    public function index()
    {
        $branch = Auth::user()->office_id;
        if (Auth::user()->branch->name == 'Head Office')
//            $errors = GeneralRequest::whereDate('created_at', '=', Carbon::today())->count();
            $errors = GeneralRequest::whereMonth('created_at', date('m'))->count();

        else
            $errors = GeneralRequest::whereMonth('created_at', date('m'))->where('branch_id', '=', $branch)->count();

        if (Auth::user()->branch->name == 'Head Office')
            $perrors = GeneralRequest::whereMonth('created_at', date('m'))->where('state', '!=', 'Done')->count();
        else
            $perrors = GeneralRequest::whereMonth('created_at', date('m'))->where('state', '!=', 'Done')->where('branch_id', '=', $branch)->count();

        if (Auth::user()->branch->name == 'Head Office')
            $ferrors = GeneralRequest::whereMonth('created_at', date('m'))->where('state', '=', 'Done')->count();
        else
            $ferrors = GeneralRequest::whereMonth('created_at', date('m'))->where('state', '=', 'Done')->where('branch_id', '=', $branch)->count();

        return view('request.reverse.index', compact('errors', 'perrors', 'ferrors'));
    }

    public function pull()
    {
//        $roles = Role::query()->orderBy('id', 'asc')->where('id','1');
        $branch = Auth::user()->branch->id;
        if (Auth::user()->hasRole('Super User'))
            $userRequest = GeneralRequest::query()->get();
        elseif (Auth::user()->hasRole('IT'))
            $userRequest = GeneralRequest::query()->get();
        elseif (Auth::user()->hasRole('Accountant'))
            $userRequest = GeneralRequest::query()->get();
        else
            $userRequest = GeneralRequest::query()->where('branch_id', '=', $branch)->get();
//        dd($userRequest);
        return DataTables::of($userRequest)
            ->addColumn('branch_id', function ($userRequest) {
                return $userRequest->branch->name;
            })
            ->addColumn('request_id', function ($userRequest) {
                return 'Ticket-No.' . $userRequest->request_id;
            })
            ->addColumn('request', function ($userRequest) {

                if ($userRequest->error_id == 1)
                    return 'Client Account Reopen';
                elseif ($userRequest->error_id == 2)
                    return 'Transaction Reverse';
                elseif ($userRequest->error_id == 3)
                    return 'Undo Disburse Request';
            })
            ->addColumn('action', function ($userRequest) {
                if ($userRequest->error_id == 1)
                return '<a href= "' . $userRequest->id . '/reopen/show" class="btn btn-primary btn-sm text-white role">View</a>';
                elseif ($userRequest->error_id == 2)
                    return '<a href= "' . $userRequest->id . '/reverse/show" class="btn btn-primary btn-sm text-white role">View</a>';
                elseif ($userRequest->error_id == 3)
                    return '<a href= "' . $userRequest->id . '/undo/show" class="btn btn-primary btn-sm text-white role">View</a>';
            })
            ->rawColumns(['branch_id', 'action', 'request'])
            ->make(true);
    }

    public function reverseRequest()
    {

        $requests = DB::table('general_requests')->orderBy('id', 'desc')->first();
        if ($requests == null)
            $LastID = 1;
        else
            $LastID = $requests->id + 1;
        return view('request.reverse.create', compact('LastID'));
    }
    public function reverseStore(Request $request)
    {
//    $data = $request->all();
//    dd($data);

        $product = $request->get('product');
        $accountID = $request->get('accountID');
        $transactionID = $request->get('transactionID');
        $amount = $request->get('amount');
        $requestID = $request->get('requestID');
        for ($count = 0; $count < count($accountID); $count++) {
            $data = array(
                'product'  => $product[$count],
                'accountID' => $accountID[$count],
                'transactionID' => $transactionID[$count],
                'amount' => $amount[$count],
                'request_id' => $requestID,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            );
            $insert_data[] = $data;
        }

        Transaction::insert($insert_data);

        $reverseTransaction = new GeneralRequest();
        $reverseTransaction->error_id = $request->get('error_id');
        $reverseTransaction->request_id = $request->get('requestID');
        $reverseTransaction->user_id = $request->get('user_id');
        $reverseTransaction->state = $request->get('state');
        $reverseTransaction->branch_id = $request->get('branch_id');
        $reverseTransaction->reason = $request->get('reason');
//        if ($request->file('error_form')) {
//            $file = $request->file('error_form');
//            $file_name = date('YmdHis') . "_" . $file->getClientOriginalName();
//            $error_form_path = $_SERVER['DOCUMENT_ROOT'] . "/error_forms";
//            $file->move($error_form_path, $file_name);
//        }else $file_name = "noimage.gif";
//        $generalRequest->file = $file_name;

        $reverseTransaction->save();
        return redirect(route('allrequest'))->with('success', 'Successfully Inserted Data!');
    }
    public function reverseView($id)
    {

        $userrequest = GeneralRequest::withTrashed()->find($id);
//        echo $userrequest->state;
        $transactions = Transaction::all()->where('request_id', $id);
//        dd($transactions);
//        dd($userrequest);
        if ($userrequest->error_id == 2)
            $error = 'Transaction Reverse';
//
        $users = User::role('IT')->get();
//        $image = asset("/error_forms" . '/');
        $comments = $userrequest->comments;
        return view('request/reverse/show', compact('users','userrequest','comments','transactions','error'));
    }

    public function reopenRequest()
    {

        $requests = DB::table('general_requests')->orderBy('id', 'desc')->first();
        if ($requests == null)
            $LastID = 1;
        else
            $LastID = $requests->id + 1;
        return view('request.reopen.create', compact('LastID'));
    }
    public function reopenStore(Request $request)
    {
//    $data = $request->all();
//    dd($data);


        $clientID = $request->get('clientID');
        $requestID = $request->get('requestID');
        for ($count = 0; $count < count($clientID); $count++) {
            $data = array(
                'clientID' => $clientID[$count],
                'request_id' => $requestID,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            );
            $insert_data[] = $data;
        }

        Reopen::insert($insert_data);

        $reopenAccount = new GeneralRequest();
        $reopenAccount->error_id = $request->get('error_id');
        $reopenAccount->request_id = $request->get('requestID');
        $reopenAccount->user_id = $request->get('user_id');
        $reopenAccount->state = $request->get('state');
        $reopenAccount->branch_id = $request->get('branch_id');
        $reopenAccount->reason = $request->get('reason');
//        if ($request->file('error_form')) {
//            $file = $request->file('error_form');
//            $file_name = date('YmdHis') . "_" . $file->getClientOriginalName();
//            $error_form_path = $_SERVER['DOCUMENT_ROOT'] . "/error_forms";
//            $file->move($error_form_path, $file_name);
//        }else $file_name = "noimage.gif";
//        $generalRequest->file = $file_name;

        $reopenAccount->save();
        return redirect(route('allrequest'))->with('success', 'Successfully Inserted Data!');
    }
    public function reopenView($id)
    {

        $userrequest = GeneralRequest::withTrashed()->find($id);
//        echo $userrequest->state;
        $transactions = Reopen::all()->where('request_id', $id);
//        dd($transactions);
//        dd($userrequest);
        if ($userrequest->error_id == 1)
            $error = 'Client Reopen Request';
//
        $users = User::role('IT')->get();
//        $image = asset("/error_forms" . '/');
        $comments = $userrequest->comments;
        return view('request/reopen/show', compact('users','userrequest','comments','transactions','error'));
    }

    public function undoRequest()
    {

        $requests = DB::table('general_requests')->orderBy('id', 'desc')->first();
        if ($requests == null)
            $LastID = 1;
        else
            $LastID = $requests->id + 1;
        return view('request.undo.create', compact('LastID'));
    }
    public function undoStore(Request $request)
    {
//    $data = $request->all();
//    dd($data);


        $loanID = $request->get('loanID');
        $requestID = $request->get('requestID');
        for ($count = 0; $count < count($loanID); $count++) {
            $data = array(
                'loanID' => $loanID[$count],
                'request_id' => $requestID,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            );
            $insert_data[] = $data;
        }

        Undo::insert($insert_data);

        $undodisbursement = new GeneralRequest();
        $undodisbursement->error_id = $request->get('error_id');
        $undodisbursement->request_id = $request->get('requestID');
        $undodisbursement->user_id = $request->get('user_id');
        $undodisbursement->state = $request->get('state');
        $undodisbursement->branch_id = $request->get('branch_id');
        $undodisbursement->reason = $request->get('reason');
//        if ($request->file('error_form')) {
//            $file = $request->file('error_form');
//            $file_name = date('YmdHis') . "_" . $file->getClientOriginalName();
//            $error_form_path = $_SERVER['DOCUMENT_ROOT'] . "/error_forms";
//            $file->move($error_form_path, $file_name);
//        }else $file_name = "noimage.gif";
//        $generalRequest->file = $file_name;

        $undodisbursement->save();
        return redirect(route('allrequest'))->with('success', 'Successfully Inserted Data!');
    }
    public function undoView($id)
    {

        $userrequest = GeneralRequest::withTrashed()->find($id);
//        echo $userrequest->state;
        $transactions = Undo::all()->where('request_id', $id);

        if ($userrequest->error_id == 3)
            $error = 'Undo Disbursement Request';
//
        $users = User::role('IT')->get();
//        $image = asset("/error_forms" . '/');
        $comments = $userrequest->comments;
        return view('request/undo/show', compact('users','userrequest','comments','transactions','error'));
    }








    public function reject(Request $request, $id)
    {
        $userrequest = GeneralRequest::withTrashed()->find($id);
        $userrequest->state = $request->get('state');
        $comment = new GeneralComment();
        $comment->content = $request->get('content');
        $comment->commendable_type = $request->get('commendable_type');
        $comment->commendable_id = $request->get('commendable_id');
        $comment->user_id = $request->get('user_id');

        $data = [
            'link' => url()->current(),
            'Branch' => Auth::user()->branch->name,
            'Approved' => Auth::user()->full_name,
            'Request' => $userrequest->request->name,
            'Request_id' => $userrequest->request_id,
        ];
        if ($userrequest->update() and $comment->save()) {
//            \Mail::to(['yeemonoo22@gmail.com'],"User-Request")->send(new ApprovedBranchManager($data ));
            return redirect('request/GeneralRequest/all/index')->with('success', 'Successfully Inserted Data!');

        }

    }

}
