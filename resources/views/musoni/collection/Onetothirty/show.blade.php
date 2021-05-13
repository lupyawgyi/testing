@extends('backend.layout.master')

@section('title','Collection Area')

@section('content')

    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" href="{!! asset('image/logo.ico') !!}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <link rel="stylesheet" href="{{ asset('datatable/dataTables.min.css') }}">
        <link rel="stylesheet" href="{{asset('datatable/buttons.dataTables.min.css')}}">
        <style>
            table {
                border-collapse: collapse;
                border-spacing: 0;
                width: 100%;
                border: 1px solid #ddd;
            }

            th, td {
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #f2f2f2
            }
        </style>
    </head>
    <body>

    @include("helpers.session")

    <div class="row container-fluid mt-3">
        <div class="col-lg-6">
            <div class="main-card mb-3 card">

                <div class="card-body"><h5 class="card-title">Assign table</h5>
                    @if (\Illuminate\Support\Facades\Auth::user()->hasAnyPermission('collection_createAssign_btn'))

                    <div class="float-right">
                        <a data-toggle="modal" data-target="#Assign">
                            <button class="btn btn-success"><i class="fa fa-pencil-square-o"
                                                               aria-hidden="true"></i>&nbsp;Assign
                            </button>

                        </a>
                    </div>
                    @endif
                    <table id="nn" class="display table-hover" style="width:100%">
                        <thead>
                        <tr>

                            <th>Loan ID</th>
                            <th>CO Name</th>
                            <th>Assigned Date</th>


                            {{--                    <th></th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($coname as $key => $value)
                            <tr>
                                <th>{{$value['loan_id']}}</th>
                                <th>{{$value['Collection_Offi1']}}</th>
                                <th>{{$value['Assigned_Date3'][2].'-'.$value['Assigned_Date3'][1].'-'.$value['Assigned_Date3'][0]}}</th>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Collection table</h5>
                    @if (\Illuminate\Support\Facades\Auth::user()->hasAnyPermission('collection_createCollection_btn'))

                    <div class="float-right">
                        <a data-toggle="modal" data-target="#collection">
                            <button class="btn btn-success"><i class="fa fa-pencil-square-o"
                                                               aria-hidden="true"></i>&nbsp;Collection
                            </button>

                        </a>
                    </div>
                    @endif
                    <table id="mm" class="display table-hover" style="width:100%">
                        <thead>
                        <tr>

                            <th>CO Name</th>
                            <th>Collect Amount</th>
                            <th>Loan State</th>
                            <th>Collect Date</th>


                            {{--                    <th></th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($cocollect as $key => $value)
                            <tr>
                                <th>{{$value['Collection_Offi1']}}</th>
                                <th>{{$value['Amount2']}}</th>
                                <th>{{$value['Loan_Type6']}}</th>
                                <th>{{$value['Collection_Date3'][2].'-'.$value['Collection_Date3'][1].'-'.$value['Collection_Date3'][0]}}</th>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Comment table</h5>
                    @if (\Illuminate\Support\Facades\Auth::user()->hasAnyPermission('collection_createComment_btn'))

                    <div class="float-right mb-3">
                        <a data-toggle="modal" data-target="#hello">
                            <button class="btn btn-success"><i class="fa fa-pencil-square-o"
                                                               aria-hidden="true"></i>&nbsp;Comment
                            </button>

                        </a>
                    </div>
                    @endif
                    <table id="mm" class="display table-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th>Comment Date</th>
                            <th>Comment User</th>
                            <th>Comment</th>


                            {{--                    <th></th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($comment as $key => $value)
                            <tr>
                                <th>{{$value['Comment_time3'][2].'-'.$value['Comment_time3'][1].'-'.$value['Comment_time3'][0]}}</th>
                                <th>{{$value['Comment_User1']}}</th>
                                <th>{{$value['Comment2']}}</th>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>

    {{--    <script src="{{asset("assets/scripts/main.js")}}"></script>--}}
    <script src="{{asset("datatable/jquery-3.3.1.js")}}"></script>
    <script src="{{asset("datatable/buttons.flash.min.js")}}"></script>
    <script src="{{asset("datatable/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("datatable/dataTables.buttons.min.js")}}"></script>
    <script src="{{asset("datatable/jszip.min.js")}}"></script>
    <script src="{{asset("datatable/pdfmaker.min.js")}}"></script>
    <script src="{{asset("datatable/vfs_fonts.js")}}"></script>
    <script src="{{asset("datatable/buttons.html5.min.js")}}"></script>
    <script src="{{asset("datatable/buttons.print.min.js")}}"></script>
    <script src="{{asset("js/bootstrap.min.js")}}"></script>
    <script src="{{asset("js/popup.js")}}"></script>
    </body>
    <script>
        $(document).ready(function () {
            $("#mm").DataTable({

                "processing": false,
                "serverSide": false,

                // dom: 'lBfrtip',
                dom: 'Bfrtip',
                "bFilter": false,
                buttons: [
                    'pageLength',
                    'excel',
                    'csv',
                    'pdf',
                    'copy'

                ],
                lengthMenu: [[5, 10, 50, -1], [10, 25, 50, "ALL"]],
            });


        });
    </script>
    <script>
        $(document).ready(function () {
            $("#nn").DataTable({

                "processing": false,
                "serverSide": false,

                // dom: 'lBfrtip',
                dom: 'Bfrtip',
                "bFilter": false,
                buttons: [
                    'pageLength',
                    'excel',
                    'csv',
                    'pdf',
                    'copy'

                ],
                lengthMenu: [[5, 10, 50, -1], [10, 25, 50, "ALL"]],
            });


        });
    </script>
    </html>
@endsection
@section('approve')
    <div class="modal fade center-block" id="Assign" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <form action="{{url("collection/officer/".$id."/assign")}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="assign_person"
                       value="{{\Illuminate\Support\Facades\Auth::user()->full_name}}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Assign Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="officeAddress">Assign Officer Name</label>
                        <input class="form-control" required rows="6" name="co">
                    </div>
                    <div class="modal-body">
                        <label for="officeAddress">Assign Date</label>
                        <input class="form-control" required rows="6" name="assign_date" type="date">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger">Assign</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade center-block" id="collection" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <form action="{{url("collection/officer/".$id."/collect")}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="collect_person"
                       value="{{\Illuminate\Support\Facades\Auth::user()->full_name}}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Assign Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="officeAddress">Collect Amount</label>
                        <input class="form-control" required rows="6" name="amount">
                        <br>
                        <input class="form-control" required rows="6" name="amount_confirmation">
                    </div>
                    <div class="modal-body">
                        <label for="officeAddress">Loan State</label>
                        <input class="form-control" required rows="6" name="loan_type">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger">Collect</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade center-block" id="hello" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <form action="{{url("collection/officer/".$id."/comment")}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="Comment_User1"
                       value="{{\Illuminate\Support\Facades\Auth::user()->full_name}}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Comment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="officeAddress">Comment</label>
                        <textarea class="form-control" required rows="6" name="Comment2"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger">Comment</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
