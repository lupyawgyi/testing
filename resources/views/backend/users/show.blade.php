@extends('backend.layout.master')

@section('title','Show User')

@section('content')

    {{--    @include('backend.layout.sub_menubar')--}}
    <div class="container-fluid my-3 -center">
        <div class="col-md-6">
            <div class="card-header bg-sunny-morning">
                <h3 class="text-white">User Detail</h3>
            </div>

            <div class="main-card mb-3 card">

                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead class="bg-secondary text-white">
                    <th>Name</th>
                    <th>Detail</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>User id</td>
                        <td>{{$user->id}}</td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>{{$user->name}}</td>
                    </tr>
                    <tr>
                        <td>Full Name</td>
                        <td>{{$user->full_name}}</td>
                    </tr>
                    <tr>
                        <td>Branch Name</td>
                        <td>{{$user->branch->name}}</td>
                    </tr>
                    <tr>
                        <td>Email Address</td>
                        <td>{{$user->email}}</td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>*********************</td>
                    </tr>
                    <tr>
                        <td>Active (or) Not</td>
                        @if($user->deleted_at == null)
                            <td class="text-success">Active</td>
                        @else
                            <td class="text-danger">Ban</td>
                        @endif

                    </tr>

                    </tbody>

                </table>
                <div class=" mb-3 ml-3">
                    <a href="{{ URL::previous() }}" class="btn btn-primary"><span class="fa fa-backward"
                                                                                  style="font-size:15px"></span>
                        Back</a>
                    @if (\Illuminate\Support\Facades\Auth::user()->hasAnyPermission('user_edit'))
                        <a href="{{url('backend/users/'.$user->id.'/edit')}}" class="btn btn-warning"><i
                                class="fa fa-edit"></i>&nbsp;Edit</a>
                    @endif
                    @if (\Illuminate\Support\Facades\Auth::user()->hasAnyPermission('user_delete'))
                        <a href="{{url('backend/users/'.$user->id.'/delete')}}" class="btn btn-danger"><i
                                class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                    @endif
                    @if (\Illuminate\Support\Facades\Auth::user()->hasAnyPermission('user_ban'))
                        @if($user->deleted_at != null)
                            <a href="{{url('backend/users/'.$user->id.'/restore')}}" class="btn btn-success"><i
                                    class="fa fa-baseball-ball" aria-hidden="true"></i> Active</a>
                        @else
                            <a href="{{url('backend/users/'.$user->id.'/soft')}}" class="btn btn-dark"><i
                                    class="fa fa-ban" aria-hidden="true"></i> Ban</a>
                        @endif
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection

