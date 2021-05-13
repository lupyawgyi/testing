@extends('backend.layout.master')

@section('title','Edit Region')

@section('content')
    <div class="container-fluid my-3 ">
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-body"><h3>Edit New Region</h3>
                    <form method="post">
                        @include("helpers.error_loop")
                        {{csrf_field()}}
                        <div class="position-relative form-group">
                            <label for="exampleEmail" class="">Region*</label>
                            <input name="name" id="name" placeholder="Enter Region Name"
                                   type="text" class="form-control" value="{{$region->name}}" required></div>
                        <div class="position-relative form-group">
                            <label for="examplePassword" class="">Description*</label>
                            <input name="description" id="description" placeholder="Enter description"
                                   type="text" class="form-control" value="{{$region->description}}" required></div>
                        {{--                    <button class="mt-1 btn btn-warning"><span class="pe-7s-back-2" style="font-size:15px"></span>&nbsp; Back</button>--}}
                        <div class=" mt-3">
                            <a href="{{URL::previous()}}" class="btn btn-warning"><span class="fa fa-backward"></span>
                                Cancel</a>

                            <button type="submit" class="btn btn-primary  mr-3"><span class="fa fa-wrench"></span>
                                Update
                            </button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
