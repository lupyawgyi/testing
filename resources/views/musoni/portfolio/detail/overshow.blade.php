@extends('backend.layout.master')
@section('title','report')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <div class="container-fluid my-3">
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade active show" id="tab-content-0" role="tabpanel">
                <div class="row col-md-12">
                    <div class="col-md-6">
                        <div class="card-header bg-sunny-morning container-fluid">
                            <h3 class="text-white">Ontime Loan Detail</h3>
                        </div>

                        <div class=" main-card mb-3 card">

                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead class="bg-secondary text-white">
                                <th>Name</th>
                                <th>Detail</th>

                                </thead>
                                <tbody >
                                <tr>
                                    <td>Branch Name</td>
                                    <td class="text-right">{{$name}}</td>
                                </tr>
                                <tr>
                                    <td>Total Number of Loan</td>
                                    <td class="text-right">{{number_format($total_loan)}}</td>
                                </tr>
                                <tr>
                                    <td>Total Principial</td>
                                    <td class="text-right">{{number_format($total_principal)}}</td>
                                </tr>
                                <tr>
                                    <td>Total Interest</td>
                                    <td class="text-right">{{number_format($total_interest)}}</td>
                                </tr>
                                <tr>
                                    <td>Total Outstanding</td>
                                    <td class="text-right">{{number_format($total_out)}}</td>
                                </tr>
                                <tr>
                                    <td>Number of Male</td>
                                    <td class="text-right">{{number_format($total_male)}}</td>
                                </tr>
                                <tr>
                                    <td>Number of Female</td>
                                    <td class="text-right">{{number_format($total_female)}} </td>
                                </tr>
                                <tr>
                                    <td>Male Total Outstanding</td>
                                    <td class="text-right">{{number_format($total_male_out)}}</td>
                                </tr>
                                <tr>
                                    <td>Female Total Outstanding</td>
                                    <td class="text-right">{{number_format($total_female_out)}}</td>
                                </tr>
                                <tr>
                                    <td>Over Timely Repayments 0.9</td>
                                    <td class="text-right">{{number_format($trp9)}}</td>
                                </tr>
                                <tr>
                                    <td>Between Timely Repayment 0.8 and 0.9</td>
                                    <td class="text-right">{{number_format($trp8to9)}}</td>
                                </tr>
                                <tr>
                                    <td>Between Timely Repayment 0.5 and 0.8</td>
                                    <td class="text-right">{{number_format($trp5to8)}}</td>
                                </tr>
                                <tr>
                                    <td>Timely Repayments 0.5 and below</td>
                                    <td class="text-right">{{number_format($trp5)}}</td>
                                </tr>

                            </table>
                            <form method="post">
                                {{csrf_field()}}
                                <div class=" mb-3 ml-3">
                                    <a href="{{ URL::previous() }}" class="btn btn-primary text-white" ><span class="fa fa-backward" style="font-size:15px"></span> Back</a>
                                    <button class="mt-1 btn btn-success"><span class="pe-7s-diskette" style="font-size:15px"></span>&nbsp; Download</button>

                                </div>
                            </form>
                        </div>


                    </div>




                </div>
            </div>
        </div>

    </div>
@endsection

