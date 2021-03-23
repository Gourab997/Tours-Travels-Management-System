<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.ico') }}"/>
    <link rel="stylesheet" href="{{asset('bootstrap-3.1.1\css\bootstrap.min.css')}}">
<body>
</head>
<body>
    
<div class="container">
   <div class="row" style="margin-top:45px">
      <div class="col-md-4 col-md-offset-4">
           <h4>| Register |</h4><hr>
           <form action="{{route('auth.save')}}" method="post">
           @if(Session::get('success'))
             <div class="alert alert-success">
                {{ Session::get('success') }}
             </div>
           @endif

           @if(Session::get('fail'))
             <div class="alert alert-danger">
                {{ Session::get('fail') }}
             </div>
           @endif
           @csrf
           {{-- <div class="form-group">
                 <label>Full Name</label>
                 <input type="text" class="form-control" name="fullname" placeholder="Enter full name" value="{{ old('fullname') }}">
                 <span class="text-danger">@error('fullname'){{ $message }} @enderror</span>
              </div> --}}
              {{-- <div class="form-group">
                 <label>User Name</label>
                 <input type="text" class="form-control" name="username" placeholder="Enter User name" value="{{ old('username') }}">
                 <span class="text-danger">@error('username'){{ $message }} @enderror</span>
              </div> --}}
              <div class="form-group">
                 <label>Email</label>
                 <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{ old('email') }}">
                 <span class="text-danger">@error('email'){{ $message }} @enderror</span>
              </div>
              <div class="form-group">
                 <label>Password</label>
                 <input type="password" class="form-control" name="password" placeholder="Enter password">
                 <span class="text-danger">@error('password'){{ $message }} @enderror</span>
              </div>
              <div class="form-group">
                 <label>Confirm Password</label>
                 <input type="password" class="form-control" name="cpassword" placeholder="Re-Enter password">
                 <span class="text-danger">@error('password'){{ $message }} @enderror</span>
              </div> -->
              <!--<div class="form-group">
                 <label>Address</label>
                 <input type="text" class="form-control" name="address" placeholder="Enter Address" value="{{ old('address') }}">
                 <span class="text-danger">@error('address'){{ $message }} @enderror</span>
              </div> 
              <div class="form-group">
                 <label>Company Name</label>
                 <input type="text" class="form-control" name="company" placeholder="Enter User name" value="{{ old('company') }}">
                 <span class="text-danger">@error('company'){{ $message }} @enderror</span>
              </div> -->
            <!--   <div class="form-group">
                 <label>Phone Number</label>
                 <input type="text" class="form-control" name="number" placeholder="Enter Phone Number" value="{{ old('number') }}">
                 <span class="text-danger">@error('number'){{ $message }} @enderror</span>
              </div> -->
               <!-- <div class="form-group">
                 <label>City</label>
                 <input type="text" class="form-control" name="city" placeholder="Enter City name" value="{{ old('city') }}">
                 <span class="text-danger">@error('city'){{ $message }} @enderror</span>
              </div> --}}
             {{--  <div class="form-group">
                 <label>Country</label>
                 <input type="text" class="form-control" name="country" placeholder="Enter Country name" value="{{ old('country') }}">
                 <span class="text-danger">@error('country'){{ $message }} @enderror</span>
              </div> --> --}}
             <!-- <button type="submit" class="btn btn-block btn-primary">Sign Up</button>
              <br>
              <a href="{{ route('login.index') }}">I already have an account, sign in</a>
           </form>
      </div>
   </div>
</div>
</body>
</html> -->


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> | Registration |</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{URL::to('assets/plugins/fontawesome-free/css/all.min.css')}}"> 
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{URL::to('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{URL::to('assets/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a><b>Register </b><br>a new membership</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">

      <form action="{{route('auth.save')}}" method="post">
           @if(Session::get('success'))
             <div class="alert alert-success">
                {{ Session::get('success') }}
             </div>
           @endif

           @if(Session::get('fail'))
             <div class="alert alert-danger">
                {{ Session::get('fail') }}
             </div>
           @endif
           @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" name= "fullname" placeholder="Full name"> <!-- Full Name-->
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" name= "username" placeholder="User name"> <!-- user Name-->
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="email" class="form-control" name= "email" placeholder="Email"> <!-- email-->
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" name= "password" placeholder="Password"> <!-- password-->
          <div class="input-group-append"> 
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" name= "cpassword" placeholder="Retype password"> <!-- confirm password-->
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="{{ route('login.index') }}" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
