@extends('backend.layout.master')

@section('title','User Request')

@section('content')

    <script src="{{asset("multi_data/bootstrap.min.js")}}"></script>
    <script src="{{asset("multi_data/jquery.min.js")}}"></script>
    <link rel="stylesheet" href="{{asset('select2/select2.css')}}">

    <div class="container-fluid my-3">
        <div class="billing box">
            <form method="post" enctype="multipart/form-data" id="dynamic_form">
                <div class="row col-md-12">
                    <div class="col-md-6">
                        <div class="main-card mb-3 card">
                            <div class="card-body"><h3>Reopen Client Account Request</h3>
                                @include("helpers.error_loop")
                                {{csrf_field()}}
{{--                                <input type="hidden" name="request_id" value="1" readonly>--}}
                                <input type="hidden" name="state" value="BM Pending">
                                <input type="hidden" name="user_id"
                                       value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                                <input type="hidden" name="branch_id"
                                       value="{{\Illuminate\Support\Facades\Auth::user()->branch->id}}">

                                <label for="local_id">Ticket ID</label>

                                {{--                                <h5 class="border border-primary line-height-10 p-2">{{$LastID}}</h5>--}}
                                <input type="text" class="form-control" id="request_id" name="requestID"
                                       value="{{$LastID}}" readonly>

                                <div class="form-group row">
                                    <label for="office_name" class="col-3 col-form-label">Error Name *</label>
                                    <div class="col-12 ">
                                        <select class="form-control loop" name="error_id" required
                                                value="{{old('error_id')}}">
                                                <option value="1">Client Account Reopen</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="table-responsive">

                                    <span id="result"></span>
                                    <table class="table table-bordered table-striped" id="user_table">
                                        <thead>
                                        <tr>
                                            <th width="70%">Client ID</th>
                                            <th width="30%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                                </div>

                                <div class="form-group  mb-3">
                                    <label for="exampleText" class="">Request Reason</label>
                                    <textarea name="reason" id="exampleText" class="form-control"></textarea>

                                </div>

                                <div class="row justify-content-end no-gutters">
                                    <button type="submit" class="btn btn-primary  mr-3">Add</button>
                                    <a href="{{ URL::previous() }}" class="btn btn-warning">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </form>
        </div>
    </div>
        <script>
            $(document).ready(function () {

                var count = 1;

                dynamic_field(count);

                function dynamic_field(number) {
                    html = '<tr>';
                    html += '<td><input type="text" name="clientID[]" class="form-control" required></td>';
                    if (number > 1) {
                        html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
                        $('tbody').append(html);
                    } else {
                        html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
                        $('tbody').html(html);
                    }
                }

                $(document).on('click', '#add', function () {
                    count++;
                    dynamic_field(count);
                });

                $(document).on('click', '.remove', function () {
                    count--;
                    $(this).closest("tr").remove();
                });

            });
        </script>

@endsection


{{--<script src="{{asset('select2/select2.js/select2.js')}}"></script>--}}
{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--        $(".loop").select2();--}}
{{--        // $(".js-example-basic-multiple").select2();--}}
{{--    });--}}
{{--</script>--}}

