@extends('backend.layout.master')

@section('title','Change Password')

@section('content')
    {{--body--}}
    <div class="container-fluid my-3 -center">
        @include("helpers.error_loop")
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form method="post">
                        @include("helpers.error_loop")
                        {{csrf_field()}}
                        <legend class="text-center text-info mb-2">Update Password</legend>
                        <div class="form-group row">
                            <label for="password" class="col-4 col-form-label">Password *</label>

                            <div class="col-8">
                                <input type="password" class="form-control" name="password" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-4 col-form-label">Repeat Password*</label>
                            <div class="col-8">
                                <input type="password" class="form-control" name="password_confirmation" value="">
                            </div>
                        </div>
                        <div class="justify-content-end no-gutters float-left">
                            <button type="submit" class="btn btn-primary  mr-3">Update</button>
                            <a href="{{ URL::previous() }}" class="btn btn-warning">Cancel</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
