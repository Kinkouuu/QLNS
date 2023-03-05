
<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.head')
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
        <div class="h1"><b>Admin</b></div>
        </div>
        <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        @if ($errors->any())
        <div class="alert alert-danger text-center">
            <small>
                Please enter your account and try again.
            </small>
        </div>
    @endif
    @if (Session::has('error'))
    <div class="alert alert-danger text-center">
        <small>
            {{Session::get('error')}}
        </small>
    </div>
    @endif
        <form action="{{URL::to('store')}}" method="post">
            @error('email')
                <span style="color:red">{{$message}}</span>
            @enderror
            <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            @error('password')
                <span style="color:red">{{$message}}</span>
            @enderror
            <div class="input-group mb-3">
            <input type="password" name = "password" class="form-control" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
            @csrf
        </form>
        <!-- /.social-auth-links -->
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->
    @include('admin.end')
<!-- jQuery -->

</body>
</html>
