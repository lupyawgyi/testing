@extends('backend.layout.master')

@section('title','Dashboard')

@section('content')


    <div class="col-md-6">
        <div class="card-header bg-sunny-morning">
            <h3 class="text-white">Permission</h3>
        </div>

        <div class="main-card mb-3 card">

            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead class="bg-secondary text-white">
                <th>Name</th>
                <th>Detail</th>
                </thead>
                <tbody>
                <tr>
                    <td>Permission id</td>
                    <td>{{$permission->id}}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{$permission->name}}</td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>{{$permission->description}}</td>
                </tr>
                </tbody>
            </table>


            <div class=" mb-3 ml-3">
                <a href="{{ URL::previous() }}" class="btn btn-primary"><span class="fa fa-backward"
                                                                              style="font-size:15px"></span> Back</a>
                @if (\Illuminate\Support\Facades\Auth::user()->hasAnyPermission('permission_edit'))
                    <a href="{{url('backend/permissions/'.$permission->id.'/edit')}}"
                       class="btn btn-warning text-white"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                @endif
                @if (\Illuminate\Support\Facades\Auth::user()->hasAnyPermission('permission_delete'))
                    <a data-toggle="modal" data-target="#permission" class="btn btn-danger text-white"><i
                            class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                @endif
            </div>
        </div>
    </div>

@endsection

<div class="modal fade center-block" id="permission" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Do you want to Delete?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure Delete?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a href="{{url('backend/permissions/'.$permission->id.'/delete')}}">
                    <button type="button" class="btn btn-danger">Delete</button>
                </a>
            </div>
        </div>
    </div>
</div>
