@extends('backend.layout.master')
@section('title','report')

@section('content')
    <script src="{{asset("charts/Chart.min.js")}}"></script>
    <div class="container-fluid my-3">
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade active show" id="tab-content-0" role="tabpanel">
                <div class="row col-md-12">
                    <div class="col-md-6">
                        <div class="card-header bg-sunny-morning container-fluid">
                            <h3 class="text-white">Portfolio Detail</h3>
                        </div>

                        <div class=" main-card mb-3 card">

                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead class="bg-secondary text-white">
                                <th>Name</th>
                                <th>Detail</th>

                                </thead>
                                <tbody>
                                <tr>
                                    <td>Branch Name</td>
                                    <td>{{$portfolio->branch}}</td>
                                </tr>
                                <tr>
                                    <td>Total Number of Loan</td>
                                    <td>{{number_format($portfolio->nol)}}</td>
                                </tr>
                                <tr>
                                    <td>Total Principial</td>
                                    <td>{{number_format($portfolio->tprincipal)}}</td>
                                </tr>
                                <tr>
                                    <td>Total Interest</td>
                                    <td>{{number_format($portfolio->tinterest)}}</td>
                                </tr>
                                <tr>
                                    <td>Total Outstanding</td>
                                    <td>{{number_format($portfolio->totalout)}}</td>
                                </tr>
                                <tr>
                                    <td>Number of Ontime Client Number</td>
                                    <td>{{number_format($portfolio->ontime)}}</td>
                                </tr>
                                <tr>
                                    <td>Ontime Client Principal Outstanding</td>
                                    <td>{{number_format($portfolio->ontimeamount)}} </td>
                                </tr>
                                <tr>
                                    <td>Number of 1 to 30 Clients Number</td>
                                    <td>{{number_format($portfolio-> oneto30)}}</td>
                                </tr>
                                <tr>
                                    <td>1 to 30 Client's Principal Outstanding</td>
                                    <td>{{number_format($portfolio->oneto30out)}}</td>
                                </tr>
                                <tr>
                                    <td>Number of 31 to 60 Clients Number</td>
                                    <td>{{number_format($portfolio->thirty1to60)}}</td>
                                </tr>
                                <tr>
                                    <td>31 to 60 Client's Principal Outstanding</td>
                                    <td>{{number_format($portfolio->thirty1to60out)}}</td>
                                </tr>
                                <tr>
                                    <td>Number of 61 to 90 Clients Number</td>
                                    <td>{{number_format($portfolio->sixty1to90)}}</td>
                                </tr>
                                <tr>
                                    <td>61 to 90 Client's Principal Outstanding</td>
                                    <td>{{number_format($portfolio->sixty1t090out)}}</td>
                                </tr>
                                <tr>
                                    <td>Number of 91 to 180 Clients Number</td>
                                    <td>{{number_format($portfolio->ninety1to180)}} </td>
                                </tr>
                                <tr>
                                    <td>91 to 100 Client's Principal Outstanding</td>
                                    <td>{{number_format($portfolio-> ninety1to180out)}}</td>
                                </tr>
                                <tr>
                                    <td>Morethan 180 Client Number</td>
                                    <td>{{number_format($portfolio->morethan180)}}</td>
                                </tr>
                                <tr>
                                    <td>Over 180 Client's Principal Outstanding</td>
                                    <td>{{number_format($portfolio->one80out)}}</td>
                                </tr>
                                <tr>
                                    <td>Total Over Due Loan Number</td>
                                    <td>{{number_format($portfolio->totalNOL)}} </td>
                                </tr>
                                <tr>
                                    <td>Total Overdue Principal Outstanding</td>
                                    <td class="bg-danger text-dark">
                                        <h5>{{number_format($portfolio-> totaloverout)}}</h5>
                                    </td>
                                </tr>

                            </table>
                        </div>


                    </div>
                    <div class="col-md-6 pl-1 ">
                        <div class="row main-card mb-5 card">
                            {!! $portfoliochart->container() !!}
                        </div>
                        <div class="row main-card mb-4 card">
                            <a href="{{url('musoni/portfolio/detail/'.$portfolio->branch.'/ontime')}}" class=" btn btn-lg btn-outline-primary font-weight-bold">On Time {{number_format($portfolio->ontime)}} Loans</a>
                        </div>
                        <div class="row main-card mb-4 card">
                            <a href="{{url('musoni/portfolio/detail/'.$portfolio->branch.'/one')}}" class=" btn btn-outline-secondary btn-lg font-weight-bold">1 to 30  {{number_format($portfolio-> oneto30)}} Loans</a>
                        </div>
                        <div class="row main-card mb-4 card">
                            <a href="{{url('musoni/portfolio/detail/'.$portfolio->branch.'/three')}}" class=" mr-2 btn btn-outline-success  btn-lg btn-block font-weight-bold">31 to 60 {{number_format($portfolio->thirty1to60)}} Loans</a>
                        </div>
                        <div class="row main-card mb-4 card">
                            <a href="{{url('musoni/portfolio/detail/'.$portfolio->branch.'/six')}}" class=" mr-2 btn btn-outline-info  btn-lg btn-block font-weight-bold">61 to 90 {{number_format($portfolio->sixty1to90)}} Loans</a>
                        </div>
                        <div class="row main-card mb-4 card">
                            <a href="{{url('musoni/portfolio/detail/'.$portfolio->branch.'/nine')}}" class=" mr-2 btn btn-outline-warning  btn-lg btn-block font-weight-bold">91 to 180 {{number_format($portfolio->ninety1to180)}} Loans</a>
                        </div>
                        <div class="row main-card mb-4 card">
                            <a href="{{url('musoni/portfolio/detail/'.$portfolio->branch.'/over')}}" class=" mr-2 btn btn-outline-danger  btn-lg btn-block font-weight-bold">Over 180 {{number_format($portfolio->morethan180)}} Loans</a>
                        </div>
                    </div>



                </div>
            </div>
        </div>
        {!! $portfoliochart->script() !!}
    </div>
@endsection
