@extends('layouts.main')


@section('viewbooking')
<a href="/dashboard/viewpackage/download-pdf">Download PDF</a>
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Booking Id</th>
        <th scope="col">Customer Name</th>
        <th scope="col">Package Id</th>
        <th scope="col">Package Name</th>
        <th scope="col">Package Type</th>
        <th scope="col">Package Location</th>
        <th scope="col">Travel Start</th>
        <th scope="col">Travel End</th>
        <th scope="col">Total Person</th>
        <th scope="col">Booking Status</th>
      
        <th scope="col">Add Tour Guide</th>
        
      </tr>
    </thead>
    <tbody>
     @foreach($data['bookinglist'] as $Bookinglist)
      <tr scope="row">
        <td style="color: blue">{{ $Bookinglist->b_id }}</td>
       <td>{{ $Bookinglist->username }}</td>
        <td>{{ $Bookinglist->pro_id }}</td>
        <td  >{{ $Bookinglist->package_name }}</td>
        <td>{{ $Bookinglist->package_type }}</td>
        <td>{{ $Bookinglist->package_location }}</td>
        <td>{{ $Bookinglist->travel_date_start }}</td>
        <td>{{ $Bookinglist->travel_date_end }}</td>
        <td>{{ $Bookinglist->person}}</td>


        <td>     @if ( $Bookinglist->status == 0)
          <div class="badge bg-danger">Not confirm</div>
          <button data-toggle="modal" data-target="#resolveComplain{{$Bookinglist->b_id }}"
              class="btn btn-warning btn-sm">
             Confirm
          </button>

          <div class="modal fade" id="resolveComplain{{$Bookinglist->b_id }}"
              aria-labelledby="ActiveComplain" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header bg-success">
                          <h5 class="modal-title">
                              Are you sure confirm booking?
                          </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      
                      <div class="modal-footer">
                          <form action="/dashboard/viewbooking/{{ $Bookinglist->b_id }}" method="post">
                              @csrf
                              <input type="text" class="d-none" name="status" value="{{$Bookinglist->b_id }}" >
                              <button type="submit" name="submit" class="btn btn-success">
                                  Confirm
                              </button>
                            
                          </form>
                      </div>
                  </div>
              </div>
          </div>
          @else

          <div class="badge bg-success" >Confirm</div>
          @endif
</td>
        {{-- <td>{{ $Bookinglist->status }}</td> --}}
        {{-- <td>{{ $Bookinglist->t_id }}</td> --}}
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection
