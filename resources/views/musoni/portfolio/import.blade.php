@extends('backend.layout.master')
@section('title','Outstanding Import')

@section('content')
    @if(session('status'))
        @include("helpers.session")
    @endif
    <div class="container-fluid my-3 -center">

        <div class="col-md-6 ">
            <div class="main-card card text-black-50">
                <div class="card-body text-dark"><h3 class="text-center">Import Portfolio Report CSV</h3>
                    <small class="form-text text-muted">Need to change title, Delete the last row, Need to change General Format</small>
                    <br>
                    <form method="post" enctype="multipart/form-data" action="{{route('portfolio_input')}}">
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

@endsection

