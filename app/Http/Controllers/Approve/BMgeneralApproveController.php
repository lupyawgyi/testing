<?php

namespace App\Http\Controllers\Approve;

use App\GeneralComment;
use App\GeneralRequest;
use App\Http\Controllers\Controller;
use App\Mail\ApprovedBranchManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BMgeneralApproveController extends Controller
{
    public function approve(Request $request, $id)
    {
        $userrequest = GeneralRequest::withTrashed()->find($id);
        $userrequest->state = $request->get('state');
        if ($userrequest->error_id == 1)
            $requestName = 'Client Account Reopen Request';
        elseif ($userrequest->error_id == 2)
            $requestName = 'Transaction Reverse Request';
        elseif ($userrequest->error_id == 3)
            $requestName = 'Undo Disburse Request';

        $comment = new GeneralComment();
        $comment->content = $request->get('content');
        $comment->commendable_type = $request->get('commendable_type');
        $comment->commendable_id = $request->get('commendable_id');
        $comment->user_id = $request->get('user_id');

        $data = [
            'link' => url()->current(),
            'Branch' => Auth::user()->branch->name,
            'Approved' => Auth::user()->full_name,
            'Request' => $requestName,
            'Request_id' => $userrequest->request_id,
        ];
        if ($userrequest->update() and $comment->save()) {
//            \Mail::to(['yeemonoo22@gmail.com'],"User-Request")->send(new ApprovedBranchManager($data ));
            return redirect('request/GeneralRequest/all/index')->with('success', 'Successfully Inserted Data!');

        }

    }
}
