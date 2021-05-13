@extends('backend.layout.master')

@section('title','Show Branch')

@section('content')


    <div class="col-md-6">
        <div class="card-header bg-amy-crisp">
            <h3 class="text-white center-elem">Branches</h3>
        </div>
        <div class="main-card mb-3 card">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead class="bg-secondary text-white">
                <th>Name</th>
                <th>Detail</th>
                </thead>
                <tbody>
                <tr>
                    <td>Region</td>
                    <td>{{$branch->region->name}}</td>
                </tr>
                <tr>
                    <td>Branch id</td>
                    <td>{{$branch->id}}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{$branch->name}}</td>
                </tr>
                <tr>
                    <td>Opening Date</td>
                    <td>{{$branch->openingDate}}</td>
                </tr>
                <tr>
                    <td>Office Address</td>
                    <td>{{$branch->address}}</td>
                </tr>
                <tr>
                    <td>City</td>
                    <td>{{$branch->city}}</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>{{$branch->phone}}</td>
                </tr>
                <tr>
                    <td>Branch Manager Name</td>
                    <td>{{$branch->manager}}</td>
                </tr>
                <tr>
                    <td>Branch Manager Email</td>
                    <td>{{$branch->email}}</td>
                </tr>
                <tr>
                    <td>Branch Data Sim One</td>
                    <td>{{$branch->dataSimOne}}</td>
                </tr>
                <tr>
                    <td>Branch Data Sim Two</td>
                    <td>{{$branch->dataSimTwo}}</td>
                </tr>
                <tr>
                    <td>Branch location</td>
                    <td>{{$branch->location}}</td>
                </tr>

                </tbody>

            </table>
            <div class=" mb-3 ml-3">
                <a href="{{ URL::previous() }}" class="btn btn-primary text-white" ><span class="fa fa-backward" style="font-size:15px"></span> Back</a>
                <a href="{{url('backend/branches/'.$branch->id.'/edit')}}" class="btn btn-warning text-white"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                <a data-toggle="modal" data-target="#branch" class="btn btn-danger text-white"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
            </div>
        </div>


@endsection

        <div class="modal fade center-block" id="branch" tabindex="-1" role="dialog"
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
                        <a href="{{url('backend/branches/'.$branch->id.'/delete')}}">
                            <button type="button" class="btn btn-danger">Delete</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
