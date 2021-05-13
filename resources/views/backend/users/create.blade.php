@extends('backend.layout.master')

@section('title','Create User')

@section('content')

    {{--    @include('backend.layout.sub_menubar')--}}
    <div class="container-fluid my-3 -center">

        <div class="col-md-6 ">
            <div class="main-card card text-black-50">
                <div class="card-body text-dark"><h3 class="text-center">Create New User</h3>
                    <form method="post" class="needs-validation" novalidate>
                        @include("helpers.error_loop")
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name">Username *</label>

                            <input type="text" class="form-control" name="name" value="{{old('name')}}"
                                   id="validationCustom01" required>
                            <div class="invalid-feedback">
                                Please choose a username.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="full_name">Full Name *</label>
                            <input type="text" class="form-control" id="full_name" name="real_name"
                                   value="{{old('full_name')}}" required>
                            <div class="invalid-feedback">
                                Please choose a username.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" c>Email *</label>
                            <input type="email" class="form-control" id="email" name="email"
                                   value="{{old('email')}}" required>
                            <div class="invalid-feedback">
                                Please choose a username.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password *</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Repeat Password*</label>
                            <input type="password" class="form-control" name="password_confirmation" required>
                        </div>
                        <div class="form-group">
                            <label for="office_name">Office Name *</label>
                            <select class="form-control" name="office_id">
                                @foreach($branches as $branch)
                                    <option value="{{$branch->id}}">{{$branch->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class=" mt-3">
                            <button type="submit" class="btn btn-primary  mr-3"><span class="fa fa-user-plus"></span>
                                Create
                            </button>
                            <a href="{{ URL::previous() }}" class="btn btn-warning"><span
                                    class="fa fa-user-times"></span> Cancel</a></div>
                    </form>
                    {{--                for required validation--}}
                    <script>
                        // Example starter JavaScript for disabling form submissions if there are invalid fields
                        (function () {
                            'use strict';
                            window.addEventListener('load', function () {
                                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                var forms = document.getElementsByClassName('needs-validation');
                                // Loop over them and prevent submission
                                var validation = Array.prototype.filter.call(forms, function (form) {
                                    form.addEventListener('submit', function (event) {
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
    </div>

@endsection
