@extends('frontend.layouts.master')

@section('main-content')


<div class="card">
    <h5 class="card-header">Edit Comment</h5>
    <div class="card-body">
      <form method="post" action="{{route('comment.update',$comment->id)}}">
        @csrf
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Comment <span class="text-danger">*</span></label>
          <input type="text" name="comment" placeholder="Enter comment"  value="{{$comment->comment}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>


        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
      </div>
    </div>
</div>

@endsection


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>


<!-- jQuery -->
<script src="/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/assets/dist/js/demo.js"></script>
<!-- Summernote -->
<script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>

