@extends('backend.layout.master')

@section('title','Create Role')

@section('content')

    <script src="{{asset("multi_data/bootstrap.min.js")}}"></script>
    <script src="{{asset("multi_data/jquery.min.js")}}"></script>

<div class="container">
    <br />
    <div class="main-card mb-3 card">
        <div class="card-body"><h3>Client Reopen Request</h3>
            @include("helpers.error_loop")
            {{csrf_field()}}
            <input type="hidden" name="request_id" value="1">
            <input type="hidden" name="state" value="BM Pending">
            <input type="hidden" name="user_id"
                   value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
            <input type="hidden" name="branch_id"
                   value="{{\Illuminate\Support\Facades\Auth::user()->branch->id}}">

            <label for="local_id">Request ID</label>

            {{--                                <h5 class="border border-primary line-height-10 p-2">{{$LastID}}</h5>--}}
            <input type="text" class="form-control" id="request_id" name="requestID" value="{{$LastID}}">

            <div class="form-group row">
                <label for="office_name" class="col-3 col-form-label">Error Name *</label>
                <div class="col-12 ">
                    <select class="form-control loop" name="error_id" required value="{{old('error_id')}}">
                        <option selected disabled>Please select one option</option>
                        @foreach($issues as $issue)
                            <option value="{{$issue->id}}">{{$issue->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="bought_date">Reason*</label>
                <br>
                <input  name="reason[]" cols="30" rows="10" class="form-group col-12"
                        value="{{old('reason')}}"></input>
                <input  name="reason[]" cols="30" rows="10" class="form-group col-12"
                        value="{{old('reason')}}"></input>
                <input  name="reason[]" cols="30" rows="10" class="form-group col-12"
                        value="{{old('reason')}}"></input>
            </div>
            <div class="form-group">
                <label for="image">Error Form</label>
                <input type="file" class="form-control-file" name="error_form" required>
            </div>
            <div class="row justify-content-end no-gutters">
                <button type="submit" class="btn btn-primary  mr-3">Add</button>
                <a href="{{ URL::previous() }}" class="btn btn-warning">Cancel</a>
            </div>


        </div>
    </div>
    <br />
    <div class="table-responsive">
        <form method="post" id="dynamic_form">
            <span id="result"></span>
            <table class="table table-bordered table-striped" id="user_table">
                <thead>
                <tr>
                    <th width="35%">First Name</th>
                    <th width="35%">Last Name</th>
                    <th width="30%">Action</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                <tr>
                    <td colspan="2" align="right">&nbsp;</td>
                    <td>
                        @csrf
                        <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
                    </td>
                </tr>
                </tfoot>
            </table>
        </form>
    </div>
</div>

<script>
    $(document).ready(function(){

        var count = 1;

        dynamic_field(count);

        function dynamic_field(number)
        {
            html = '<tr>';
            html += '<td><input type="text" name="first_name[]" class="form-control" /></td>';
            html += '<td><input type="text" name="last_name[]" class="form-control" /></td>';
            if(number > 1)
            {
                html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
                $('tbody').append(html);
            }
            else
            {
                html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
                $('tbody').html(html);
            }
        }

        $(document).on('click', '#add', function(){
            count++;
            dynamic_field(count);
        });

        $(document).on('click', '.remove', function(){
            count--;
            $(this).closest("tr").remove();
        });

        $('#dynamic_form').on('submit', function(event){
            event.preventDefault();
            $.ajax({
{{--                url:'{{ route("dynamic-field.insert") }}',--}}
                method:'post',
                data:$(this).serialize(),
                dataType:'json',
                beforeSend:function(){
                    $('#save').attr('disabled','disabled');
                },
                success:function(data)
                {
                    if(data.error)
                    {
                        var error_html = '';
                        for(var count = 0; count < data.error.length; count++)
                        {
                            error_html += '<p>'+data.error[count]+'</p>';
                        }
                        $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                    }
                    else
                    {
                        dynamic_field(1);
                        $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                    }
                    $('#save').attr('disabled', false);
                }
            })
        });

    });
</script>
@endsection
