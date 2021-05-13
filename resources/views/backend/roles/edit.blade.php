@extends('backend.layout.master')

@section('title','Edit Role')

@section('content')

{{--    @include('backend.layout.sub_menubar')--}}
<div class="container-fluid my-3 ">
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body"><h3>Edit Role</h3>
                <form method="post">
                    @include("helpers.error_loop")
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="userName">Role Name</label>
                        <input type="text" class="form-control" placeholder="Enter Role Name" name="name"
                               value="{{$role->name}}">
                    </div>
                    <div class="form-group">
                        <label for="department">Description</label>
                        <input type="text" class="form-control" placeholder="description" name="description"
                               value="{{$role->description}}">
                    </div>
                    <div class="form-group">
                        @foreach($permissions as $permission)
                            <input type="checkbox" multiple="multiple" name="permission[]" value="{{$permission->id}}"
                                   @if(in_array($permission->id,$selectedPermissions))
                                   checked="checked"
                                @endif
                            >&nbsp &nbsp{{$permission->name}}<br/>
                        @endforeach
                    </div>
                    <div class=" mt-3">
                        <a href="{{route('role')}}" class="btn btn-warning"><span class="fa fa-backward"></span> Cancel</a>

                        <button type="submit" class="btn btn-primary  mr-3"><span class="fa fa-wrench"></span> Update</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
