@extends('backend.layout.master')

@section('title','View Request')

@section('content')

    <div class="container-fluid my-3">
        <div class="col-md-6">
            <div class="card-header bg-sunny-morning">
                <h3 class="text-white">Error</h3>
            </div>

            <div class="main-card card">

                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead class="bg-secondary text-white">
                    <th>Name</th>
                    <th>Description</th>

                    </thead>
                    <tbody>
                    <tr>
                        <td>Name</td>
                        <td>{{$error->name}}</td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>{{$error->description}}</td>
                    </tr>

                    </tbody>

                </table>

                <div class=" mb-3 ml-3">
                    <a href="{{ URL::previous() }}" class="btn btn-primary text-white" ><span class="fa fa-backward" style="font-size:15px"></span> Back</a>
                    <a href="{{url('backend/errors/'.$error->id.'/edit')}}" class="btn btn-warning text-white"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                    <a data-toggle="modal" data-target="#error" class="btn btn-danger text-white"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                </div>
            </div>
        </div>
    </div>


@endsection

<div class="modal fade center-block" id="error" tabindex="-1" role="dialog"
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
                <a href="{{url('backend/errors/'.$error->id.'/delete')}}">
                    <button type="button" class="btn btn-danger">Delete</button>
                </a>
            </div>
        </div>
    </div>
</div>
