@extends('backend.layout.master')
@section('title','BranchCreate')
@section('content')

    <div class="container-fluid my-2">
        <div class="container-fluid ">
            <form method="post" enctype="multipart/form-data ">
                @include("helpers.error_loop")
                {{csrf_field()}}
                <div class="container-fluid ">
                    <div class="form-group col-3">
                        <label for="loanID">Loan ID</label>
                        <input type="number" class="form-control" id="stateDate" placeholder="Ender Loan ID"
                               name="loanID">
                    </div>
                    <div class="row justify-content no-gutters col-3">
                        <button type="submit" class="btn btn-primary  mr-3">Search</button>
                    </div>
                </div>
            </form>
        </div>
        {{--start--}}

        <div class="row container-fluid mt-3">
            <div class="col-lg-6">
                <div class="main-card mb-3 card">

                    <table id="example" class="table table-striped table-bordered" style="width:100%">

                        <tbody>
                        <h1 class="bg-success">{{$state}}</h1>
                        <tr>
                            <td>Loan ID</td>
                            <td>{{$loanAccount}}</td>
                        </tr>
                        <tr>
                            <td>Over Due Days</td>
                            <td>{{$interval}} Days</td>
                        </tr>
                        <tr>
                            <td>Client ID</td>
                            <td>{{$clientID}}</td>
                        </tr>
                        <tr>
                            <td>Client Name</td>
                            <td>{{$clientName}}</td>
                        </tr>
                        @if($overdue)
                            <tr>
                                <td>Overdue Start Date</td>
                                <td>{{$overdue}}</td>

                            </tr>
                        @endif
                        <tr>
                            <td>Overdue Amount</td>
                            <td>{{number_format($totalOverdue)}} MMK</td>
                        </tr>
                        <tr>
                            <td>Total Outstanding</td>
                            <td>{{number_format($clientOutstanding)}} MMK</td>
                        </tr>
                        <tr>
                            <td>Writeoff Amount</td>
                            <td>{{number_format($writeOffamount) }} MMK</td>
                        </tr>
                        <tr>
                            <td>Waived Interest</td>
                            <td>{{number_format($interestWaived) }} MMK</td>
                        </tr>
                        <tr>
                            <td>Waived Charge</td>
                            <td>{{number_format($penaltyChargesWaived)}} MMk</td>
                        </tr>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    {{--end--}}

    <hr>
@endsection
