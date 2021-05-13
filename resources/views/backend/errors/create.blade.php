@extends('backend.layout.master')

@section('title','Request Create')

@section('content')

    <div class="container-fluid my-3">
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-body"><h3>Create Request Name</h3>
                    <form method="post">
                        @include("helpers.error_loop")
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="branchName">Position Name*</label>
                            <input type="text" class="form-control " id="name" placeholder="Enter Error Name"
                                   name="name"
                                   value="{{old('name')}}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control " id="description" placeholder="Enter description"
                                   name="description" value="{{old('description')}}">
                        </div>
                        <div class="row justify-content-end no-gutters">
                            <button type="submit" class="btn btn-primary  mr-3">Create</button>
                            <button type="reset" class="btn btn-warning ">Cancle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

