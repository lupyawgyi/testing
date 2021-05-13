@extends('backend.layout.master')

@section('title','Dashboard')

@section('content')


    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body"><h3>Create New Permission</h3>
                <form method="post">
                    @include("helpers.error_loop")
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="userName">Permission Name</label>
                        <input type="text" class="form-control" placeholder="Enter Role Name" name="name"
                               value="{{old('name')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="department">Description</label>
                        <input type="text" class="form-control" placeholder="description" name="description" required>
                    </div>
                    <div class="row justify-content-end no-gutters">
                        <button type="submit" class="btn btn-primary  mr-3">Create</button>
                        <a href="{{url('backend/permissions/index')}}" class="btn btn-warning">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
