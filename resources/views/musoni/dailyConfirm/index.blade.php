@extends('backend.layout.master')

@section('title','Confirm')

@section('content')


    <div class="col-md-6">
        <div class="card-header bg-amy-crisp">
            <h3 class="text-white center-elem">Daily Confirm</h3>
        </div>
        @if($noupdate)
            <div class=" card">
            <h3>No New Update</h3>
            </div>
        @else
        <div class="main-card mb-3 card">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead class="bg-secondary text-white">
                <th>Name</th>
                <th>Amount</th>
                </thead>
                <tbody>
                <tr>
                    <td>Date</td>
                    <td align='right'>{{$date}}</td>
                </tr>
                <tr>
                    <td>Branch</td>
                    <td align='right'>{{$user_branch}}</td>
                </tr>
                <tr>
                    <td>Total Outstanding</td>
                    <td align='right'>{{number_format($totalout)}}</td>
                </tr>
                <tr>
                    <td>Total Overdue Amount</td>
                    <td align='right'>{{number_format($totaloverout)}}</td>
                </tr>
                <tr>
                    <td>Daily Expected Repayment</td>
                    <td align='right'>{{number_format($expectrepayment)}}</td>
                </tr>
                <tr>
                    <td>Today's Payment</td>
                    <td align='right'>{{number_format($totalrepayment)}}</td>
                </tr>
                <tr>
                    <td>Today's Disbursed</td>
                    <td align='right'>{{number_format($dailydisburse)}}</td>
                </tr>
                <tr>
                    <td>Today's Saving Deposite</td>
                    <td align='right'>{{number_format($dailysavingdeposit)}}</td>
                </tr>
                <tr>
                    <td>Today's Saving Withdraw</td>
                    <td align='right'>{{number_format($dailysavingwithdraw)}}</td>
                </tr>
                <tr>
                    <td>Total Compulsory</td>
                    <td align='right'>{{number_format($totalcompulsory)}}</td>
                </tr>
                <tr>
                    <td>Total Voluntary</td>
                    <td align='right'>{{number_format($totalvoluntary)}}</td>
                </tr>

                </tbody>

            </table>

            <div class=" mb-3 ml-3">
                <a href="{{ URL::previous() }}" class="btn btn-primary text-white" ><span class="fa fa-backward" style="font-size:15px"></span> Back</a>
                <a data-toggle="modal" data-target="#confirm" class="btn btn-success text-white"><i class="fa fa-sun" aria-hidden="true"></i> Confirm</a>
            </div>
        </div>


        @endsection

@section('approve')
            <div class="modal fade center-block" id="confirm" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Do you want to Delete?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure Confirm?
                        </div>
                        <form action="{{route('confirm_daily')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="branch" value="{{$user_branch}}">
                            <input type="hidden" name="totalOut" value="{{$totalout}}">
                            <input type="hidden" name="totalOverOut" value="{{$totaloverout}}">
                            <input type="hidden" name="dailyExpect" value="{{$expectrepayment}}">
                            <input type="hidden" name="totalrepayment" value="{{$totalrepayment}}">
                            <input type="hidden" name="compulsory" value="{{$totalcompulsory}}">
                            <input type="hidden" name="voluntary" value="{{$totalvoluntary}}">
                            <input type="hidden" name="dailysavingdeposit" value="{{$dailysavingdeposit}}">
                            <input type="hidden" name="dailysavingwithdraw" value="{{$dailysavingwithdraw}}">
                            <input type="hidden" name="dailydisburse" value="{{$dailydisburse}}">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit"  class="btn btn-danger">Confirm</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif
@endsection
