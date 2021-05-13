@extends('backend.layout.master')
@section('title','report')

@section('content')

{{--    <div class="app-main__outer">--}}
<div class="container-fluid my-2 -center">
    <div class="container-fluid">
        <form method="post" enctype="multipart/form-data " action="{{route('search.client')}}">
            @include("helpers.error_loop")
            {{csrf_field()}}
            <div class="container-fluid ">
                <div class="form-group col-3">
                    <label for="ClientId">Client ID</label>
                    <input type="number" class="form-control" id="stateDate"  placeholder="Ender the last Client ID" name="clientID">
                </div>
                <div class="row justify-content no-gutters col-3">
                    <button type="submit" class="btn btn-primary  mr-3">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>
{{--    </div>--}}
@endsection
