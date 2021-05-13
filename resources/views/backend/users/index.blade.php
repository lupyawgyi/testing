@extends('backend.layout.master')

@section('title','Users')

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

{{--    @include('backend.layout.sub_menubar')--}}
    <div class="container-fluid">
        @if(session('status'))
            @include("helpers.session")
        @endif
        <div class="my-2">
            <div class="card-header">
                <h3>All Users</h3>
            </div>
            @if (\Illuminate\Support\Facades\Auth::user()->hasAnyPermission('user_create'))
            <div>

                <a href="{{url('backend/users/create')}}" class="btn btn-outline-primary mt-3 "><i class="fa fa-user"
                                                                                                   aria-hidden="true"></i>
                    &nbsp;Create New User</a>
            </div>
            @endif
            <div style="overflow-x:auto;" class="card-body">
                <table id="user" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>User Name</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Branch</th>
                        <th>Role</th>
                        <th>State</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>No</th>
                        <th>User Name</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Branch</th>
                        <th>Role</th>
                        <th>State</th>
                        <th>Action</th>
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
            $("#user").DataTable({
                "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                    $("td:first", nRow).html(iDisplayIndex + 1);
                    return nRow;
                },
                "processing": true,
                "serverSide": true,
                "orderable": true,
                "searchable": true,
                "visible": true,
                "columnDefs": [
                    {'targets': 1, 'checkboxes': {'selectRow': true}},
                    {'targets': 0, 'orderable': false},
                ],

                "ajax": {
                    url: "/backend/user/ssd"
                },
                columns: [


                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'full_name', name: 'full_name'},
                    {data: 'email', name: 'email'},
                    {data: 'branch', name: 'branch'},
                    {data: 'role', name: 'role'},
                    {data: 'state', name: 'state'},
                    {data: 'action', name: 'action'},

                ],
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

