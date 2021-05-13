@extends('backend.layout.master')

@section('title','Create Role')

@section('content')

{{--    @include('backend.layout.sub_menubar')--}}
<div class="container-fluid my-3">
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body"><h3>Create New Role</h3>
                <form method="post" class="needs-validation" novalidate>
                    @include("helpers.error_loop")
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="userName">Role Name</label>
                        <input type="text" class="form-control" placeholder="Enter Role Name" name="name"
                               value="{{old('name')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="department">Description</label>
                        <input type="text" class="form-control" placeholder="description" name="description" value="{{old('name')}}" required>
                    </div>
                    <div class="row justify-content-end no-gutters">
                        <button type="submit" class="btn btn-primary  mr-3"><span class="fa fa-check"></span> Create</button>
                        <a href="{{url('backend/roles/index')}}" class="btn btn-warning"><span class="fa fa-backspace"></span> Cancel</a>
                    </div>
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
</div>
@endsection
