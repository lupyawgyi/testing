@extends('backend.layout.master')
@section('title','Daily Repayment Import')

@section('content')
    @if(session('status'))
        @include("helpers.session")
    @endif
    <div class="container-fluid my-3 -center">

        <div class="col-md-6 ">
            <div class="main-card card text-black-50">
                <div class="card-body text-dark"><h3 class="text-center">Import Saving Transaction Report</h3>

                    <form method="post" enctype="multipart/form-data" action="{{route('savingImport')}}">
                        @include("helpers.error_loop")
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="expect">Excel format and Delete the last row</label>

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

