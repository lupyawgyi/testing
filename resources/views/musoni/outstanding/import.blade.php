@extends('backend.layout.master')
@section('title','Outstanding Import')

@section('content')
    @if(session('status'))
        @include("helpers.session")
    @endif
    <div class="container-fluid my-3 -center">

        <div class="col-md-6 ">
            <div class="main-card card text-black-50">
                <div class="card-body text-dark"><h3 class="text-center">Import Outstanding Report</h3>

                    <form method="post" enctype="multipart/form-data" action="{{route('outstanding')}}">
                        @include("helpers.error_loop")
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="file" class="form-control-file" name="data" required>
                        </div>
                        <div class="row justify-content-end no-gutters">
                            <button type="submit" class="btn btn-primary  mr-3">Add</button>
                            <a href="{{ URL::previous() }}" class="btn btn-warning">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
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
        <div class="container-fluid">
            <div class="my-2">
                <div class="card-header">
                    <h3>Outstinding List</h3>
                </div>
                <div class="card-body" style="overflow-x:auto;">
                    <table id="mm" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Branch</th>
                            <th>Upload Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Branch</th>
                            <th>Upload Date</th>
                            <th>Action</th>
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
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $("#mm").DataTable({--}}
{{--                "fnRowCallback": function (nRow, aData, iDisplayIndex) {--}}
{{--                    $("td:first", nRow).html(iDisplayIndex + 1);--}}
{{--                    return nRow;--}}
{{--                },--}}
{{--                "processing": true,--}}
{{--                "serverSide": true,--}}
{{--                "columnDefs": [--}}
{{--                    {'targets': 1, 'checkboxes': {'selectRow': true}},--}}
{{--                    {'targets': 0, 'orderable': false},--}}
{{--                ],--}}
{{--                "ajax": {--}}
{{--                    url: "/request/GeneralRequest/all/ssd"--}}
{{--                },--}}
{{--                --}}{{--            ajax: '{!! route('get.roles') !!}',--}}
{{--                columns: [--}}

{{--                    {data: 'id', name: 'id'},--}}
{{--                    {data: 'branch_id', name: 'branch_id'},--}}
{{--                    {data: 'request_id', name: 'request_id'},--}}
{{--                    {data: 'request', name: 'request'},--}}
{{--                    {data: 'state', name: 'state'},--}}
{{--                    {data: 'created_at', name: 'created_at'},--}}
{{--                    {data: 'action', name: 'action'},--}}


{{--                ],--}}
{{--                // dom: 'lBfrtip',--}}
{{--                dom: 'Bfrtip',--}}
{{--                buttons: [--}}
{{--                    'pageLength',--}}
{{--                    'excel',--}}
{{--                    'csv',--}}
{{--                    'pdf',--}}
{{--                    'copy'--}}

{{--                ],--}}
{{--                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "ALL"]],--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}

    </html>

@endsection

