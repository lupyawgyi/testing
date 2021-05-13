@extends('backend.layout.master')

@section('title','Request Edit')

@section('content')
    <div class="container-fluid my-3">
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-body"><h3>Edit Error</h3>
                    <form method="post">
                        @include("helpers.error_loop")
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="regionName">Error Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Error Name" name="name"
                                   value="{{$error->name}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control " id="description"
                                   placeholder="Enter Error Description"
                                   name="description" value="{{$error->description}}">
                        </div>
                        <div class=" mt-3">
                            <a href="{{route('errors')}}" class="btn btn-warning"><span class="fa fa-backward"></span> Cancel</a>

                            <button type="submit" class="btn btn-primary  mr-3"><span class="fa fa-wrench"></span> Update</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
