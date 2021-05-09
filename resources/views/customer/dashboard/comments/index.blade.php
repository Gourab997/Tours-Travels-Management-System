@extends('frontend.layouts.master')

@section('main-content')

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="row">
         <div class="col-md-12">
         @if(session('success'))
            <div class="alert alert-success alert-dismissable fade show">
                <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                {{session('success')}}
            </div>
        @endif


        @if(session('error'))
            <div class="alert alert-danger alert-dismissable fade show">
                <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                {{session('error')}}
            </div>
        @endif
         </div>
     </div>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">All Comments : {{ $comments->count() }}</h6>
      <a href="" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Blog</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($comments)>0)
        <table class="table table-bordered" id="product-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>S.N.</th>
              <th>Comment</th>
              <th>Author</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>S.N.</th>
              <th>Comment</th>
              <th>Author</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>

            @foreach($comments as $comment)
              @php
              $author_info=DB::table('users')->select('username')->where('id',$comment->added_by)->get();
              // dd($sub_cat_info);
              // dd($author_info);

              @endphp
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->comment}}</td>
                    <td>{{$data->username}}</td>
                    <td>{{$comment->status}}</td>


                    <td>
                        <a href="{{route('comment.edit',$comment->id)}}" class="b float-left mr-1" style="color:green" data-toggle="tooltip" title="edit" data-placement="bottom">Edit</a>
                        <span class=" text-danger" title="Delete" onclick="deletePost({{ $comment->id }})" style="cursor: pointer;color:red;">Delete</span>

                        <form id="delete-form-{{ $comment->id }}" method="POST" action="{{ route('comment.destroy',$comment->id) }}"  style="display:none;">
                            @csrf
                        </form>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
       {{--  <span style="float:right">{{$blogs->links()}}</span> --}}
        @else
          <h6 class="text-center">No blogs found!!! Please create Post</h6>
        @endif
      </div>
    </div>
</div>
@endsection

@push('styles')
  <link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <style>
      div.dataTables_wrapper div.dataTables_paginate{
          display: none;
      }
      .zoom {
        transition: transform .2s; /* Animation */
      }

      .zoom:hover {
        transform: scale(5);
      }
  </style>
@endpush

@push('scripts')

  <!-- Page level plugins -->
  <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>

   <!-- sweet Alart CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
    <script>
        function deletePost(id) {
        const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
          },
          buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
          title: 'Are you sure?',
          text: "You will be able to revert this from trash!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'No, cancel!',
          reverseButtons: true
        }).then((result) => {
          if (result.isConfirmed) {
            event.preventDefault();
            document.getElementById('delete-form-'+id).submit();
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              'Cancelled',
              'Your post is safe :)',
              'error'
            )
          }
        })
      }
    </script>
@endpush
