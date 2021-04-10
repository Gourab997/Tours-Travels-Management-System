@extends('employee.layouts.main')

@section('booking')
<div class="card">
    <h5 class="card-header">Add Post Category</h5>
    <div class="card-body">
      <form method="post" action="/employee/dashboard/createfeedbackcatagory">
        {{csrf_field()}}
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Add Feedback Catagory</label>
          <input id="inputTitle" type="text" name="fCatagory" placeholder="Enter catagory"  value="{{old('fCatagory')}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>


        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Reset</button>
           <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
    </div>
</div>
@endsection