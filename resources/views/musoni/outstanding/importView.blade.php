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

@endsection

