@extends('backend.layout.master')

@section('title','Branch Create')

@section('content')


    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body"><h3 class="text-dark -bold">Create New Branch</h3>
                <br>
                <form method="post" class="needs-validation" novalidate>
                    @include("helpers.error_loop")
                    {{csrf_field()}}
                    <div class="form-group row">
                        <label for="office_name" class="col-3 col-form-label">Region *</label>
                        <div class="col-12">
                            <select class="form-control" name="region_id">
                                @foreach($regions as $region)
                                    <option value="{{$region->id}}">{{$region->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="branchName">Branch Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Branch Name" name="name"
                               value="{{old('name')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="opendingDate">Opening Date</label>
                        <input type="date" class="form-control " id="opendingDate" placeholder="Enter Branch Opending date"
                               name="openingDate" value="{{old('openingDate')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="officeAddress">Office Address</label>
                        <input type="text" class="form-control" id="officeAddress" placeholder="Enter Office Address"
                               name="address" value="{{old('address')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" placeholder="Enter City Name" name="city"
                               value="{{old('city')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" placeholder="Enter Phone Number" name="phone"
                               value="{{old('phone')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="manager">Branch Manager</label>
                        <input type="text" class="form-control" id="manager" placeholder="Enter Branch Manager Name"
                               name="manager" value="{{old('manager')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="manager">Branch Manager Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Branch Manager Email"
                               name="email" value="{{old('email')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="manager">Data Sim One</label>
                        <input type="text" class="form-control" id="dataSimOne" placeholder="Enter Data Sim Number"
                               name="dataSimOne" value="{{old('dataSimOne')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="manager">Data Sim Two</label>
                        <input type="text" class="form-control" id="dataSimTwo" placeholder="Enter Data Sim Number"
                               name="dataSimTwo" value="{{old('dataSimTwo')}}">
                    </div>
                    <div class="form-group">
                        <label for="manager">Branch Location URL</label>
                        <input type="text" class="form-control" id="url" placeholder="Enter Branch Location URL"
                               name="location" value="{{old('location')}}">
                    </div>
                    <a class="btn btn-warning mt-1" href="{{ URL::previous() }}"
                       role="button"><span class="pe-7s-back-2" style="font-size:15px"></span>&nbsp;Back</a>
                    <button class="mt-1 btn btn-success"><span class="pe-7s-diskette" style="font-size:15px"></span>&nbsp; Submit</button>
                </form>
                <script>
                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                    (function() {
                        'use strict';
                        window.addEventListener('load', function() {
                            // Fetch all the forms we want to apply custom Bootstrap validation styles to
                            var forms = document.getElementsByClassName('needs-validation');
                            // Loop over them and prevent submission
                            var validation = Array.prototype.filter.call(forms, function(form) {
                                form.addEventListener('submit', function(event) {
                                    if (form.checkValidity() === false) {
                                        event.preventDefault();
                                        event.stopPropagation();
                                    }
                                    form.classList.add('was-validated');
                                }, false);
                            });
                        }, false);
                    })();
                </script>
            </div>
        </div>
    </div>

@endsection
