@extends('backend.layout.master')
@section('title','BranchCreate')
@section('content')


    <div class="container-fluid my-2 -center" xmlns="http://www.w3.org/1999/html">
        <div class="container-fluid">
            <form method="post" enctype="multipart/form-data ">
                @include("helpers.error_loop")
                {{csrf_field()}}
                <div class="container-fluid ">
                    <div class="form-group col-3">
                        <label for="loanID">Client ID</label>
                        <input type="number" class="form-control" id="stateDate" placeholder="Ender the last Client ID"
                               name="clientID">
                    </div>
                    <div class="row justify-content no-gutters col-3">
                        <button type="submit" class="btn btn-primary  mr-3">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="app-main__inner">
        <div class="col-lg-6 col-xl-4 card mb-2">
            {{$addr['Address7']}}
        </div>
        <div class="row">
            @foreach($value as $val)
                <div class="col-lg-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">
                                        <form method="post" enctype="multipart/form-data " action="{{route('loan')}}">
                                            @include("helpers.error_loop")
                                            {{csrf_field()}}
                                            <input type="hidden" name="loanID" value="{{$val['accountNo']}}" />
                                            <button class="btn btn-block" type="submit">{{$val['accountNo']}}</button>
                                        </form>
                                    </div>
                                    <div class="widget-subheading">{{$val['status']['value']}}</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-subheading">Disbursed</div>
                                    <div class="widget-heading text-success">
                                        @if($val['status']['value'] == 'Rejected')
                                            0
                                        @else
                                            {{number_format($val['originalLoan'])}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="widget-progress-wrapper">
                                <div class="progress-bar-xs progress">
                                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="100"
                                         aria-valuemin="0" aria-valuemax="100"
                                         @if($val['status']['value'] == 'Closed (obligations met)')
                                         style="width:100%;"

                                         @elseif($val['status']['value'] == 'Rejected')
                                         style="width:0%;"

                                         @elseif($val['status']['value'] == 'Active')

                                         {{--                                     {{$new_width = ($val['loanBalance'] / 100) * $val['amountPaid']}}--}}
                                         {{$new_width = ($val['amountPaid'] / $val['loanBalance'] ) * 100}}
                                         style="width:{{$new_width}}%;"
                                        @endif

                                    ></div>
                                </div>
                                <div class="progress-sub-label">
                                    <div class="sub-label-left">We Got</div>
                                    @if($val['status']['value'] == 'Active')
                                        <div class="sub-label-right">
                                            {{$new_width = ($val['amountPaid'] / $val['loanBalance'] ) * 100}}%
                                        </div>
                                    @elseif($val['status']['value'] == 'Rejected')
                                        <div class="sub-label-right">
                                            0%
                                        </div>
                                    @elseif($val['status']['value'] == 'Closed (obligations met)')
                                        <div class="sub-label-right">
                                            100%
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{--            <div class="col-lg-6 col-xl-4">--}}
            {{--                <div class="card mb-3 widget-content">--}}
            {{--                    <div class="widget-content-outer">--}}
            {{--                        <div class="widget-content-wrapper">--}}
            {{--                            <div class="widget-content-left">--}}
            {{--                                <div class="widget-heading">Clients</div>--}}
            {{--                                <div class="widget-subheading">Total Clients Profit</div>--}}
            {{--                            </div>--}}
            {{--                            <div class="widget-content-right">--}}
            {{--                                <div class="widget-numbers text-primary">$12.6k</div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="widget-progress-wrapper">--}}
            {{--                            <div class="progress-bar-lg progress-bar-animated progress">--}}
            {{--                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="47"--}}
            {{--                                     aria-valuemin="0" aria-valuemax="100" style="width: 47%;"></div>--}}
            {{--                            </div>--}}
            {{--                            <div class="progress-sub-label">--}}
            {{--                                <div class="sub-label-left">Retention</div>--}}
            {{--                                <div class="sub-label-right">100%</div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <div class="col-lg-6 col-xl-4">--}}
            {{--                <div class="card mb-3 widget-content">--}}
            {{--                    <div class="widget-content-outer">--}}
            {{--                        <div class="widget-content-wrapper">--}}
            {{--                            <div class="widget-content-left">--}}
            {{--                                <div class="widget-heading">Products Sold</div>--}}
            {{--                                <div class="widget-subheading">Total revenue streams</div>--}}
            {{--                            </div>--}}
            {{--                            <div class="widget-content-right">--}}
            {{--                                <div class="widget-numbers text-warning">$3M</div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="widget-progress-wrapper">--}}
            {{--                            <div class="progress-bar-xs progress-bar-animated-alt progress">--}}
            {{--                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="85"--}}
            {{--                                     aria-valuemin="0" aria-valuemax="100" style="width: 85%;"></div>--}}
            {{--                            </div>--}}
            {{--                            <div class="progress-sub-label">--}}
            {{--                                <div class="sub-label-left">Sales</div>--}}
            {{--                                <div class="sub-label-right">100%</div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <div class="col-lg-6 col-xl-4">--}}
            {{--                <div class="card mb-3 widget-content">--}}
            {{--                    <div class="widget-content-outer">--}}
            {{--                        <div class="widget-content-wrapper">--}}
            {{--                            <div class="widget-content-left">--}}
            {{--                                <div class="widget-heading">Followers</div>--}}
            {{--                                <div class="widget-subheading">People Interested</div>--}}
            {{--                            </div>--}}
            {{--                            <div class="widget-content-right">--}}
            {{--                                <div class="widget-numbers text-danger">45,9%</div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="widget-progress-wrapper">--}}
            {{--                            <div class="progress-bar-sm progress-bar-animated-alt progress">--}}
            {{--                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="65"--}}
            {{--                                     aria-valuemin="0" aria-valuemax="100" style="width: 65%;"></div>--}}
            {{--                            </div>--}}
            {{--                            <div class="progress-sub-label">--}}
            {{--                                <div class="sub-label-left">Twitter Progress</div>--}}
            {{--                                <div class="sub-label-right">100%</div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>
    </div>
@endsection
