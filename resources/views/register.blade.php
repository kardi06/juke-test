<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JUKE TESTING</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('admin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{url('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('admin/dist/css/adminlte.min.css')}}">
</head>

<body class="hold-transition login-page">
    <div class="alert alert-danger mt-2" role="alert" style="display: none;" id="name-error-message">
        <ul class="mb-0">
          @foreach ($errors->get('name') as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Register</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body">
                <h3 class="login-box-msg">Register Your Account</h3>
                <p class="login-box-msg" style="margin-top:-10px;">Enter your username,email & password</p>
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">@</span>
                            </div>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                            @error('username')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                        @error('email')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                        @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        {{-- <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div> --}}
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mt-3">
                    <a href="{{url('/login')}}" class="text-center">Login</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{url('admin/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{url('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{url('admin/dist/js/adminlte.min.js')}}"></script>
    <script>
        // Get the error message alert and the input field
        const nameErrorMessage = document.getElementById('name-error-message');
        const nameInput = document.getElementById('name');
      
        // Check if there are error messages for the name input field
        if ({{ $errors->has('name') ? 'true' : 'false' }}) {
          // Show the error message alert
          nameErrorMessage.style.display = 'block';
      
          // Set the focus to the input field
          nameInput.focus();
        }
      </script>
</body>

</html>
