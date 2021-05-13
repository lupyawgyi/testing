@extends('backend.layout.master')

@section('title','Edit Branch')

@section('content')


    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body"><h3>Edit Branch</h3>
                <form method="post">
                    @include("helpers.error_loop")
                    {{csrf_field()}}

                    <div class="form-group row">
                        <label for="office_name" class="col-3 col-form-label">Region *</label>
                        <div class="col-12">
                            <select class="form-control" name="region_id" >
                                @foreach($regions as $region)
                                    <option value="{{$region->id}}"
                                        {{$branch->region_id == $region->id ? "selected" : ""}}
                                    >{{$region->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="branchName">Branch Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Branch Name" name="name"
                               value="{{$branch->name}}">
                    </div>
                    <div class="form-group">
                        <label for="opendingDate">Opening Date</label>
                        <input type="date" class="form-control " id="date" placeholder="Enter Branch Opending date"
                               name="openingDate" value="{{$branch->openingDate}}">
                    </div>
                    <div class="form-group">
                        <label for="officeAddress">Office Address</label>
                        <input type="text" class="form-control" id="address" placeholder="Enter Office Address"
                               name="address" value="{{$branch->address}}">
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" placeholder="Enter City Name" name="city"
                               value="{{$branch->city}}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" placeholder="Enter Phone Number" name="phone"
                               value="{{$branch->phone}}">
                    </div>
                    <div class="form-group">
                        <label for="manager">Branch Manager</label>
                        <input type="text" class="form-control" id="manager" placeholder="Enter Branch Manager Name"
                               name="manager" value="{{$branch->manager}}">
                    </div>
                    <div class="form-group">
                        <label for="manager">Branch Manager Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Branch Manager Email"
                               name="email" value="{{$branch->email}}" required>
                    </div>
                    <div class="form-group">
                        <label for="manager">Data Sim One</label>
                        <input type="text" class="form-control" id="dataSim1" placeholder="Enter Data Sim Number"
                               name="dataSimOne" value="{{$branch->dataSimOne}}">
                    </div>
                    <div class="form-group">
                        <label for="manager">Data Sim Two</label>
                        <input type="text" class="form-control" id="dataSim2" placeholder="Enter Data Sim Number"
                               name="dataSimTwo" value="{{$branch->dataSimTwo}}">
                    </div>
                    <div class="form-group">
                        <label for="manager">Branch Location URL</label>
                        <input type="text" class="form-control" id="url" placeholder="Enter Branch Location URL"
                               name="location" value="{{$branch->location}}">
                    </div>
                    <div class=" mt-3">
                        <a href="{{route('branches')}}" class="btn btn-warning"><span class="fa fa-backward"></span> Cancel</a>

                        <button type="submit" class="btn btn-primary  mr-3"><span class="fa fa-wrench"></span> Update</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
