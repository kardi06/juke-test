@extends('admin.app')

@section('breadcrumb')
    <div class="col-sm-6">
        <h1 class="m-0">Form Profile</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Form</a></li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
    </div><!-- /.col -->
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Profile</h5>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('dashboard-profile.store') }}" method="POST"
                            class="row g-3 needs-validation" novalidate>
                            @csrf
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">First name</label>
                                <input type="text" class="form-control" name="first_name" id="validationCustom01"
                                    required>
                                <div class="valid-feedback">
                                    <span class="right badge badge-success">Looks good!</span>
                                </div>
                                <div class="invalid-feedback">
                                    <span class="right badge badge-danger">Please provide First Name</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom02" class="form-label">Last name</label>
                                <input type="text" class="form-control" name="last_name" id="validationCustom02"
                                    required>
                                <div class="valid-feedback">
                                    <span class="right badge badge-success">Looks good!</span>
                                </div>
                                <div class="invalid-feedback">
                                    <span class="right badge badge-danger">Please provide Last Name</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustomUsername" class="form-label">Username</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="text" name="username" class="form-control" id="validationCustomUsername"
                                        aria-describedby="inputGroupPrepend" required>
                                    <div class="valid-feedback">
                                        <span class="right badge badge-success">Looks good!</span>
                                    </div>
                                    <div class="invalid-feedback">
                                        <span class="right badge badge-danger">Please choose a unique and valid
                                            username.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom03" class="form-label">City</label>
                                <input type="text" name="city" class="form-control" id="validationCustom03" required>
                                <div class="valid-feedback">
                                    <span class="right badge badge-success">Looks good!</span>
                                </div>
                                <div class="invalid-feedback">
                                    <span class="right badge badge-danger">Please provide a valid city.</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom04" class="form-label">State</label>
                                <input type="text" name="state" class="form-control" id="validationCustom04" required>
                                <div class="valid-feedback">
                                    <span class="right badge badge-success">Looks good!</span>
                                </div>
                                <div class="invalid-feedback">
                                    <span class="right badge badge-danger">Please provide a valid state.</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom05" class="form-label">Zip</label>
                                <input type="number" name="zip_code" class="form-control" id="validationCustom05" required>
                                <div class="valid-feedback">
                                    <span class="right badge badge-success">Looks good!</span>
                                </div>
                                <div class="invalid-feedback">
                                    <span class="right badge badge-danger">Please provide a valid zip.</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="validationCustom06" class="form-label">Address</label>
                                <textarea class="form-control" name="address" id="validationCustom06" cols="30" rows="5" required></textarea>
                                <div class="valid-feedback">
                                    <span class="right badge badge-success">Looks good!</span>
                                </div>
                                <div class="invalid-feedback">
                                    <span class="right badge badge-danger">Please provide a valid Address.</span>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection


@section('tambah_script')
    <script>
        $(function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        });
    </script>
@endsection
