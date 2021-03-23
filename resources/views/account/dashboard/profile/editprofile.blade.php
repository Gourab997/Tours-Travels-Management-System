@extends('account.layout.main')
@section('profile')

<div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Profile Edit</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Edit</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
<form action="{{ $LoggedUserInfo['id'] }}" method="POST" enctype="multipart/form-data">

  @csrf
    <div class="main-body">
    
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                  
                  
                    <img src="{{ asset('/uploads')}}/{{ $LoggedUserInfo['profile_img']}}" alt="{{ $LoggedUserInfo['type'] }}" class="rounded-circle" width="150">
                   
                   
           		    
					
                    <li class="list-group-item">
                      <div class="form-file">
                         
                          <label class="form-file-label" for="customFile">
                              <span class="form-file-text">Choose Profile Picture...</span>
                              <span class="form-file-button"></span>
                          </label>
                          <input name="myfile" type="file" class="form-file-input" id="customFile">
                      </div>
                  </li>
                    <div class="mt-3"> 
                      <h4> {{ session('username') }}</h4>
                
                     
                      
                   </div>
                  </div>
                </div>
              </div>
            </div>
            
                
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"> Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    
                      <input type="text" class="text-secondary" id="fullname" name="fullname" placeholder="fullname" value="{{ $LoggedUserInfo['fullname']}}" aria-describedby="inputGroupPrepend" >
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     
                   <input type="email" class="text-secondary" id="email" name="email" placeholder="email" value="{{ $LoggedUserInfo['email']}}" aria-describedby="inputGroupPrepend" > 
                    </div> 
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                   
                      <input type="text" class="text-secondary" id="phone" name="phone" placeholder="phone"  value="{{ $LoggedUserInfo['phone']}}" aria-describedby="inputGroupPrepend" required>
                    </div>
                  </div>
                  <hr>
                
                   <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    
                    <div class="col-sm-9 text-secondary">
                      <input type="text" class="text-secondary" id="address" name="address" placeholder="address" value="{{ $LoggedUserInfo['address']}}"  aria-describedby="inputGroupPrepend" required>
                    </div>
                  </div>
                  <hr>
                 
                 
                 
                </div>
              </div>
            
            </div>

            <input type="submit" name="update" value="update">
          </div>
        </div>

</form> 
        
@endsection