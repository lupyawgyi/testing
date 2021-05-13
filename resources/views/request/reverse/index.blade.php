@extends('backend.layout.master')

@section('title','User Request')

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

    @include("helpers.session")
    <body>
    <div class="app-main__inner">
        <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-midnight-bloom">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Current Month Total Issue </div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>{{$errors}}</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-warning">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Current Month Pending Numbers</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>{{$perrors}}</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-grow-early">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Current Month Completed Issue</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>{{$ferrors}}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="my-2">
                <div class="card-header">
                    <h3>All Requests</h3>
                </div>
                @if (\Illuminate\Support\Facades\Auth::user()->hasAnyPermission('ticket_create'))
                <div class="row">
                    <div class="mr-2">
                        <a href="{{route('reopen_request')}}"
                           class="btn btn-outline-primary mt-3 text-center"><i
                                class="pe-7s-world" aria-hidden="true"></i> Account Reopen Request</a>
                    </div>
                    <div class="mr-2">
                        <a href="{{route('reverse_request')}}"
                           class="btn btn-outline-primary mt-3 text-center"><i
                                class="pe-7s-world" aria-hidden="true"></i> Reverse Transaction Request</a>
                    </div>
                    <div class="mr-2">
                        <a href="{{route('undo_request')}}"
                           class="btn btn-outline-primary mt-3 text-center"><i
                                class="pe-7s-world" aria-hidden="true"></i> Undo Disbursement Request</a>
                    </div>

{{--                    <div class="mr-2">--}}
{{--                        <a href="{{route('request_create')}}"--}}
{{--                           class="btn btn-outline-primary mt-3 text-center"><i--}}
{{--                                class="pe-7s-world" aria-hidden="true"></i> test Request</a>--}}
{{--                    </div>--}}
                </div>
                @endif
                <div class="card-body" style="overflow-x:auto;">
                    <table id="mm" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Branch</th>
                            <th>Ticket Number</th>
                            <th>Request Name</th>

                            <th>state</th>
                            <th>Request Date</th>
                            <th width="60px">View</th>
                            {{--                    <th></th>--}}
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Branch</th>
                            <th>Ticket Number</th>
                            <th>Request Name</th>
                            <th>state</th>
                            <th>Request Date</th>
                            <th width="60px">View</th>
                            {{--                    <th></th>--}}
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </body>

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
    <script>
        $(document).ready(function () {
            $("#mm").DataTable({
                "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                    $("td:first", nRow).html(iDisplayIndex + 1);
                    return nRow;
                },
                "processing": true,
                "serverSide": true,
                "columnDefs": [
                    {'targets': 1, 'checkboxes': {'selectRow': true}},
                    {'targets': 0, 'orderable': false},
                ],
                "ajax": {
                    url: "/request/GeneralRequest/all/ssd"
                },
                {{--            ajax: '{!! route('get.roles') !!}',--}}
                columns: [

                    {data: 'id', name: 'id'},
                    {data: 'branch_id', name: 'branch_id'},
                    {data: 'request_id', name: 'request_id'},
                    {data: 'request', name: 'request'},
                    {data: 'state', name: 'state'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action'},


                ],
                // dom: 'lBfrtip',
                dom: 'Bfrtip',
                buttons: [
                    'pageLength',
                    'excel',
                    'csv',
                    'pdf',
                    'copy'

                ],
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "ALL"]],
            });
        });
    </script>

    </html>



@endsection

