@extends('backend.layout.master')

@section('title','Edit User')

@section('content')

    {{--    @include('backend.layout.sub_menubar')--}}
    <div class="container-fluid my-3 ">
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-body"><h3>Edit User Detail</h3>
                    <form method="post">
                        @include("helpers.error_loop")
                        {{csrf_field()}}
                        <div class="form-group row mt-4">
                            <label for="name" class="col-3 col-form-label">Username *</label>
                            <div class="col-8 ">
                                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="full_name" class="col-3 col-form-label">Full Name *</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="full_name" name="full_name"
                                       value="{{$user->full_name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-3 col-form-label">Email *</label>
                            <div class="col-8">
                                <input type="email" class="form-control" id="email" name="email"
                                       value="{{$user->email}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-3 col-form-label">Password *</label>

                            <div class="col-8">
                                <input type="password" class="form-control" name="password" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-3 col-form-label">Repeat Password*</label>
                            <div class="col-8">
                                <input type="password" class="form-control" name="password_confirmation" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="office_name" class="col-3 col-form-label">Office Name *</label>
                            <div class="col-8">
                                <select class="form-control" name="office_id">
                                    @foreach($branches as $branch)
                                        <option value="{{$branch->id}}"
                                            {{$user->office_id == $branch->id ? "selected" :""}} >{{$branch->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>User's Roles</h5>
                                @foreach($roles as $role)
                                    <input type="checkbox" multiple="multiple" name="role[]" value="{{$role->id}}"
                                           @if(in_array($role->id,$selectedRoles))
                                           checked="checked"
                                        @endif
                                    >&nbsp &nbsp{{$role->name}}<br/>
                                @endforeach

                            </div>
                        </div>

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
