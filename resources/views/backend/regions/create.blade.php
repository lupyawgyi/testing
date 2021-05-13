@extends('backend.layout.master')

@section('title','Create Region')

@section('content')
    <div class="container-fluid my-3">
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-body"><h3 class="text-dark">Create New Region</h3>
                    <form method="post">
                        @include("helpers.error_loop")
                        {{csrf_field()}}
                        <div class="position-relative form-group">
                            <label for="exampleEmail" class="">Region*</label>
                            <input name="name" id="name" placeholder="Enter Region Name"
                                   type="text" class="form-control" value="{{old('name')}}" required></div>
                        <div class="position-relative form-group">
                            <label for="examplePassword" class="">Description*</label>
                            <input name="description" id="description" placeholder="Enter description"
                                   type="text" class="form-control" value="{{old('description')}}" required></div>
                        <a class="btn btn-warning mt-1" href="{{ URL::previous() }}"
                           role="button"><span class="fa fa-backward" style="font-size:15px"></span>&nbsp;Back</a>
                        <button class="mt-1 btn btn-success"><span class="pe-7s-diskette" style="font-size:15px"></span>&nbsp;
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
