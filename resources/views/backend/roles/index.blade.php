@extends('backend.layout.master')

@section('title','Roles')

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

{{--    @include('backend.layout.sub_menubar')--}}
    <div class="container-fluid" >
        <div class="my-2">
            <div class="card-header">
                <h3>All Roles</h3>
            </div>
            @if (\Illuminate\Support\Facades\Auth::user()->hasAnyPermission('role_create'))
            <div>
                <a href="{{url('backend/roles/create')}}" class="btn btn-outline-primary mt-3 text-center"><i
                        class="fa fa-tasks" aria-hidden="true"></i> &nbsp;Create New Role</a>
            </div>
            @endif
            <div class="card-body" style="overflow-x:auto;">
                <table id="mm" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>State</th>
                        <th width="60px">Action</th>
                        {{--                    <th></th>--}}
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>State</th>
                        <th width="60px">Action</th>
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

                    url: "/backend/role/ssd"
                },
                {{--            ajax: '{!! route('get.roles') !!}',--}}
                columns: [

                    {data: 'name', name: 'name'},
                    {data: 'description', name: 'description'},
                    {data: 'state', name: 'state'},
                    {data: 'action', name: 'action'}
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

            // $(document).on('click','.role' , function () {
            //     var id = $(this).data('id');
            //     // alert(id);
            //     $.ajax({
            //         // url : '/backend/roles/{id}/show',
            //         url: '/backend/roles/2/show',
            //         type : 'GET',
            //
            //     });
            // });

        });
    </script>

    </body>
    </html>



@endsection

