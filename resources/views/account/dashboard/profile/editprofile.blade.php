@extends('account.layout.main')
@section('profile')

<div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Profile</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="/account/dashboard">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="/account/dashboard/profile">Profile</a></li>
                  <li class="breadcrumb-item active">Profile Edit</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
<form action="{{ $LoggedUserInfo['id'] }}" method="POST" enctype="multipart/form-data">

  @csrf
  <section class="content">
    
        <div class="container-fluid">
          <div class="row">
              <!-- left column -->
              <div class="col-md-5">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Profile Picture</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">
                        <div class="image">
                          <img src="{{ asset('/upload')}}/{{ $LoggedUserInfo->profile_img}}" class="img-circle elevation-2" alt="{{ $LoggedUserInfo['type'] }}" width="150">
                        </div>
                        <div class="mt-3"> 
                          <h4> {{ $LoggedUserInfo['username'] }}</h4>                      
                      </div>

                          <div class="form-group">
                          <div class="input-group">
                          <label class="form-file-label" for="customFile">
                              <span class="form-file-text">Choose Profile Picture...</span>
                              <span class="form-file-button"></span>
                          </label>
                          <input name="myfile" type="file" class="form-file-input" id="customFile">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-7">
            <!-- general form elements disabled -->
            <div class="card mb-3 card-primary">
              <div class="card-header">
                      <h3 class="card-title">Profile Information</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form">
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Full Name</label>
                          <input type="text" class="form-control" id="fullname" name="fullname" placeholder="fullname" value="{{ $LoggedUserInfo['fullname']}}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email</label>
                          <input type="email" class="form-control" id="email" name="email" placeholder="email" value="{{ $LoggedUserInfo['email']}}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Phone</label>
                          <input type="text" class="form-control" id="phone" name="phone" placeholder="phone"  value="{{ $LoggedUserInfo['phone']}}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Address</label>
                          <input type="text" class="form-control" id="address" name="address" placeholder="address" value="{{ $LoggedUserInfo['address']}}">
                        </div>
                  </div>
                </div>            
          </div>
          </div> 
           

          <div class="card-footer">
                  <button type="submit" name="update" class="btn btn-primary">Submit</button>
                  
                </div>
              </form>
          </div>
    </div>  
    </section>
  </form> 
        
@endsection