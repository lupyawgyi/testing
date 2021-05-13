@extends('backend.layout.master')

@section('title','User Request')

@section('content')
    <div class="container-fluid my-3">
        <div class="row col-md-12">
            <div class="col-md-6">
                <div class="card-header bg-sunny-morning">
                    <h3 class="text-white">User Request</h3>
                </div>

                <div class="main-card mb-3 card">

                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead class="bg-secondary text-white">
                        <th>Name</th>
                        <th>Detail</th>

                        </thead>
                        <tbody>
                        <tr>
                            <td>Requested User</td>
                            <td>{{$userrequest->user->full_name}}</td>
                        </tr>
                        <tr>
                            <td>Ticket Number</td>
                            <td>{{$userrequest->request_id}}</td>
                        </tr>
                        {{--                <tr>--}}
                        {{--                    <td>Company</td>--}}
                        {{--                    <td><a href="{{url('page/companies/'.$billing->company->id.'/show')}}"><span--}}
                        {{--                                class="badge badge-primary">{{$billing->company->name}}</span></a></td>--}}
                        {{--                </tr>--}}
                        <tr>
                            <td>Branch</td>
                            <td>{{$userrequest->branch->name}}</td>
                        </tr>
                        <tr>
                            <td>Request Name</td>
                            <td>{{$error}}</td>
                        </tr>
                        <tr>
                            <td>Request Reason</td>
                            <td>{{$userrequest->reason}}</td>
                        </tr>
                        <tr>
                            <td>State</td>
                            <td class="bg-success">{{$userrequest->state}} </td>
                        </tr>
                        <tr>
                            <td>Request Date</td>
                            <td>{{$userrequest->created_at}}</td>
                        </tr>

                    </table>
                    <table class="table table-bordered table-striped" id="user_table" width="50%">
                        <thead>
                        <tr>
                            <th width="50%">Loan ID</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transactions as $transaction)
                            <tr>
                                <td>{{$transaction->loanID}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="ml-3 mt-3 mb-2">
                        <a href="{{ URL::previous() }}">
                            <button class="btn  btn-warning"><span class="fa fa-ban" style="font-size:15px"></span>&nbsp;Back
                            </button>
                        </a>
                        <a data-toggle="modal" data-target="#comment">
                            <button class="btn btn-primary"><i class="fa fa-user-circle"></i>&nbsp;Comment</button>
                        </a>
                        @if($userrequest->state == 'BM Pending' and \Illuminate\Support\Facades\Auth::user()->hasAnyPermission('Ticket_Approve_BM'))
                            <a data-toggle="modal" data-target="#branchManager">
                                <button class="btn  btn-success"><i class="fa fa-pencil-square-o"
                                                                    aria-hidden="true"></i>&nbsp;Approve
                                </button>

                            </a>
                            <a data-toggle="modal" data-target="#reject">
                                <button class="btn btn-danger"><i class="fa fa-user-circle"></i>&nbsp;Reject</button>
                            </a>
                        @elseif($userrequest->state == 'Accountant Pending'and \Illuminate\Support\Facades\Auth::user()->hasAnyPermission('Ticket_Approve_ACC'))
                            <a data-toggle="modal" data-target="#account">
                                <button class="btn btn-success"><i class="fa fa-pencil-square-o"
                                                                   aria-hidden="true"></i>&nbsp;Approve
                                </button>

                            </a>
                            <a data-toggle="modal" data-target="#reject">
                                <button class="btn btn-danger"><i class="fa fa-user-circle"></i>&nbsp;Reject
                                </button>
                            </a>
                        @elseif($userrequest->state == 'Waiting IT Support' and \Illuminate\Support\Facades\Auth::user()->hasAnyPermission('Ticket_Approve_SP') )
                            <a data-toggle="modal" data-target="#sp">
                                <button class="btn btn-success"><i class="fa fa-pencil-square-o"
                                                                   aria-hidden="true"></i>&nbsp;Approve
                                </button>
                            </a>
                            <a data-toggle="modal" data-target="#reject">
                                <button class="btn btn-danger"><i class="fa fa-user-circle"></i>&nbsp;Reject</button>
                            </a>
                        @elseif($userrequest->state == 'Processing' and (\Illuminate\Support\Facades\Auth::user()->id == $userrequest->assign_id or \Illuminate\Support\Facades\Auth::user()->hasAnyPermission('Ticket_Approve_SP')) )
                            <a data-toggle="modal" data-target="#IT">
                                <button class="btn btn-success"><i class="fa fa-pencil-square-o"
                                                                   aria-hidden="true"></i>&nbsp;Approve
                                </button>
                            </a>
                            <a data-toggle="modal" data-target="#reject">
                                <button class="btn btn-danger"><i class="fa fa-user-circle"></i>&nbsp;Reject</button>
                            </a>
                        @endif

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-header bg-primary">
                    <h3 class="text-white">All Comments</h3>
                </div>

                <div class="main-card mb-3 card">
                    @foreach($comments as $comment)

                        <p class="alert alert-info">{{$comment->user->full_name}} Says "{{$comment->content}}"
                            <br><small>{{$comment->created_at}}</small></p>

                    @endforeach

                </div>
            </div>
        </div>
    </div>


@endsection


@section('approve')
    <div class="modal fade center-block" id="comment" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <form action="{{url("request/GeneralRequest/$userrequest->id/comment")}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="commendable_type" value="App\GeneralRequest">
                <input type="hidden" name="commendable_id" value="{{$userrequest->id}}">
                {{--                <input type="hidden" name="state" value="Accountant Pending">--}}
                <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Command area</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <textarea class="form-control " required rows="6" name="content"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success">Comment</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade center-block" id="branchManager" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <form action="{{url("request/GeneralRequest/$userrequest->id/BM")}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="commendable_type" value="App\GeneralRequest">
                <input type="hidden" name="commendable_id" value="{{$userrequest->id}}">
                <input type="hidden" name="state" value="Accountant Pending">
                <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Branch Manager Approval</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <textarea class="form-control" required rows="6" name="content"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success">Approve</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade center-block" id="account" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <form action="{{url("request/GeneralRequest/$userrequest->id/ACC")}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="commendable_type" value="App\GeneralRequest">
                <input type="hidden" name="commendable_id" value="{{$userrequest->id}}">
                <input type="hidden" name="state" value="Waiting IT Support">
                <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Accountant Manager Approval</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <textarea class="form-control" required rows="6" name="content"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success">Approve</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade center-block" id="sp" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <form action="{{url("request/GeneralRequest/$userrequest->id/SP")}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="commendable_type" value="App\GeneralRequest">
                <input type="hidden" name="commendable_id" value="{{$userrequest->id}}">
                {{--                <input type="hidden" name="state" value="P">--}}
                <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">IT Processing</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <tr>
                            <td>Assign to User</td>
                            <td><select class="form-control loop" name="assign_id" required
                                        value="{{old('assign_id')}}">
                                    <option selected>Please select one option</option>
                                    <option value="">No Need</option>
                                    @foreach($users as $user)

                                        <option value="{{$user->id}}">{{$user->full_name}}</option>
                                    @endforeach
                                </select></td>
                        </tr>
                        <br>
                        <tr>
                            <td>Request Status</td>
                            <td><select class="form-control loop" name="state" required value="{{old('state')}}">
                                    <option selected disabled>Please select one option</option>
                                    <option value="Accountant Pending">Accountant Pending</option>
                                    <option value="Operation Pending">Operation Pending</option>
                                    <option value="Processing">Processing</option>
                                    <option value="Done">Done</option>
                                </select></td>
                        </tr>
                        <br>
                        <textarea class="form-control" required rows="6" name="content"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success">Done</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade center-block" id="IT" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <form action="{{url("request/GeneralRequest/$userrequest->id/IT")}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="commendable_type" value="App\GeneralRequest">
                <input type="hidden" name="commendable_id" value="{{$userrequest->id}}">
                <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">IT Processing</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <tr>
                            <td>Request Status</td>
                            <td><select class="form-control loop" name="state" required value="{{old('state')}}">
                                    <option selected disabled>Please select one option</option>
                                    <option value="Accountant Pending">Accountant Pending</option>
                                    <option value="Operation Pending">Operation Pending</option>
                                    <option value="Done">Done</option>
                                </select></td>
                        </tr>
                        <br>
                        <textarea class="form-control" required rows="6" name="content"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success">Done</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade center-block" id="reject" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <form action="{{url("request/GeneralRequest/all/$userrequest->id/reject")}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="commendable_type" value="App\GeneralRequest">
                <input type="hidden" name="commendable_id" value="{{$userrequest->id}}">
                <input type="hidden" name="state" value="Reject">
                <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Reject User Request</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <textarea class="form-control" required rows="6" name="content"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger">Reject</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

{{--@section('device')--}}
{{--    <div class="modal fade images" role="dialog" aria-labelledby="myLargeModalLabel"--}}
{{--         aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-lg  ">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-body">--}}
{{--                    <img src="{{$image}}/{{$userrequest->file}}" class="img-fluid">--}}
{{--                </div>--}}
{{--                <div class="mx-auto mb-4">--}}
{{--                    <div>--}}
{{--                        <a class="btn btn-danger text-white" data-dismiss="modal">Close</a>--}}
{{--                        <a class="btn btn-primary" href="{{$image}}/{{$userrequest->file}}" download="">Download</a>--}}

{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


{{--@endsection--}}

