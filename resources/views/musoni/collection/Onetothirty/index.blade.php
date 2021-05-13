@extends('backend.layout.master')

@section('title','Branches')

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

            tr:nth-child(even){background-color: #f2f2f2}
        </style>
    </head>
    <body >

    @include("helpers.session")


    <div class="container-fluid" >
        <div class="my-2">
            <div class="card-body" style="overflow-x:auto;">
                <table id="mm" class="display table-hover" style="width:100%">
                    <thead>
                    <tr>
                        <th>Branch Name</th>
                        <th>Client Name</th>
                        <th>Age</th>
                        <th>Trp</th>
                        <th>Group Name</th>
{{--                        <th>Phone No.</th>--}}
                        <th>Overdue Day</th>
                        <th>Total Overdue Amount</th>
                        <th>Total Outstanding Amount</th>
                        <th>View</th>

                        {{--                    <th></th>--}}
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Branch Name</th>
                        <th>Client Name</th>
                        <th>Age</th>
                        <th>Trp</th>
                        <th>Group Name</th>
{{--                        <th>Phone No.</th>--}}
                        <th>Overdue Day</th>
                        <th>Total Overdue Amount</th>
                        <th>Total Outstanding Amount</th>
                        <th>View</th>




                        {{--                    <th></th>--}}
                    </tr>
                    </tfoot>
                </table>
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
    <script>
        $(document).ready(function () {
            $("#mm").DataTable({

                "processing": true,
                "serverSide": true,

                "ajax": {

                    url: "/oneThirty/ssd"
                },


                {{--            ajax: '{!! route('get.roles') !!}',--}}
                columns: [
                    {data: 'branch', name: 'branch'},
                    {data: 'client_name', name: 'client_name'},
                    {data: 'dob', name: 'dob'},
                    {data: 'trp', name: 'trp'},
                    {data: 'group', name: 'group'},
                    // {data: 'phone', name: 'phone'},
                    {data:'days_in_arrears', name:'days_in_arrears'},
                    {data: 'arrear_amount', name: 'arrear_amount'},
                    {data: 'total', name: 'total'},
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

    </body>
    </html>



@endsection

