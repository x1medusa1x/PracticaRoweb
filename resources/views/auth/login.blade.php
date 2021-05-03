@extends('base')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>AdminLTE 3 | Log in (v2)</title>

      <link rel="stylesheet" href=" {{mix ('css/app.css')}}">
    </head>
    <body class="hold-transition login-page">
    <div class="login-box">
      <!-- /.login-logo -->
      <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <a href="{{route('dashboard')}}" class="h1"><b>Admin</b>LTE</a>
        </div>
        <div class="card-body">
          <p class="login-box-msg">Sign in to start your session</p>
          @if ($errors->has('login'))
              <div class="alert alert-danger">{{$errors->first('login')}}</div> @endif

          <form action="{{route('login')}}" method="post">
            @csrf
            @if ($errors->has('email'))
                <div class="alert alert-danger">{{$errors->first('email')}}</div> @endif
            <div class="input-group mb-3">
              <input name="email" type="email" class="form-control @if ($errors->has('email')) is-invalid @endif" placeholder="Email" value="{{old('email')}}">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            @if ($errors->has('password'))
                <div class="alert alert-danger">{{$errors->first('password')}}</div> @endif
            <div class="input-group mb-3">
              <input name="password" type="password" class="form-control @if ($errors->has('password')) is-invalid @endif" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
                <div class="icheck-primary">
                  <input type="checkbox" id="remember">
                  <label for="remember">
                    Remember Me
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>

          <div class="social-auth-links text-center mt-2 mb-3">
            <a href="#" class="btn btn-block btn-primary">
              <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
            </a>
            <a href="#" class="btn btn-block btn-danger">
              <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
            </a>
          </div>
          <!-- /.social-auth-links -->

          <p class="mb-1">
            <a href="#">I forgot my password</a>
          </p>
          <p class="mb-0">
            <a href="{{route('register')}}" class="text-center">Register a new membership</a>
          </p>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.login-box -->
    </body>
    </html>




@endsection
