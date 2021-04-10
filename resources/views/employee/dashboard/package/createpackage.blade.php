@extends('employee.layouts.main')


@section('createpackage')
    

<form action="createpackage" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
  
   @csrf
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Package Name</label>
      <input type="text" class="form-control" id="validationCustom02" name="package_name" placeholder="Create package name" value="" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  

    <div class="col-md-6 mb-3">
      <label for="validationCustom03">Package Location</label>
      <input type="text" class="form-control" id="validationCustom03" name="package_location" placeholder="Package location" required>
      <div class="invalid-feedback">
        Please provide a valid city.
      </div>
    </div>
  
    
    <div class="col-md-3 mb-3">
      <label for="validationCustom04">Total Package Price</label>
      <input type="text" class="form-control" id="validationCustom04" name="package_price" placeholder="Package Price" required>
      <div class="invalid-feedback">
        Please provide a valid state.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom05">Package Feature</label>
      <input type="text" class="form-control" id="validationCustom05" name="package_feature" placeholder="package_feature" required>
      <div class="invalid-feedback">
        Please provide a valid zip.
      </div>
    </div>
    
    <div class="col-md-3 mb-3">


      <span class="label-input100">Choose Category</span>
      <div>
        <select class="custom-select" name="package_type">
          @foreach($packagecatagorys as $pc)
              <option class="form-control" value="{{ $pc->pc_id }}"> {{ $pc->packagecatagory }} </option>
          @endforeach
        
        </select>

        <div class="float-right">

          <label for="status" class="col-form-label">Status</label>
          <select name="status" class="form-control">
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
       
        <div class="invalid-feedback">Example invalid custom select feedback</div>
      </div>
      <div class="float-left">
        <label for="validationCustom05">Last Booking Date</label>
        <input type="Date" class="form-control" id="validationCustom05" name="package_time_duration" placeholder="package_Date" required>
        <div class="invalid-feedback">
          Please provide a valid zip.
        </div>
      </div>
  <div class="form-col-md-3 mb-3">
    <label for="validationCustom05">Package Details</label>
    <textarea class="form-control" id="validationCustom05" name="package_details" rows="5"></textarea>
    <div class="invalid-feedback">
        Please provide a valid zip.
      </div>  
</div>
  
 




  <div class="float-left">
    
  <div class="custom-file">
    <input name="package_image" type="file" class="form-file-input" id="validatedCustomFile">
    
    <label class="custom-file-label" name="package_image" for="validatedCustomFile">Package Image</label>
    <div class="invalid-feedback">Example invalid custom file feedback</div>
  </div>
</div>

<div class="float-right">
  
</div>

<div class="col-md-3 mb-3">
  <button class="btn btn-primary" name="submit" type="submit">Submit form</button>
</div>
</form>

@endsection

<!-- Summernote -->
<script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>
<script>


    $(document).ready(function() {
      $('#validationCustom05').summernote({
        placeholder: "Write detail description.....",
          tabsize: 2,
          height: 150
      });
    });

 

    $(document).ready(function() {

        $('select').selectpicker();

    });


    //$('#lfm').filemanager('image');
</script>

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