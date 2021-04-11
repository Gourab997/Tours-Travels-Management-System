@extends('admin.layout.main')


@section('createpackage')
<a href="/dashboard/viewpackage/download-pdf">Download PDF</a>
<a href="{{route('createpackage')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Pacakage</a>
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Package Id</th>
        <th scope="col">Package Name</th>
        <th scope="col">Package Type</th>
        <th scope="col">Package Location</th>
        <th scope="col">Package Price</th>
        <th scope="col">Details</th>
      </tr>
    </thead>
    <tbody>
       @for($i=0; $i< count($packagelist); $i++) 
      <tr scope="row">
        <td style="color: blue">{{ $packagelist[$i]['p_id'] }}</td>
        <td  >{{ $packagelist[$i]['package_name'] }}</td>
        <td>{{ $packagelist[$i]['package_type'] }}</td>
        <td>{{ $packagelist[$i]['package_location'] }}</td>
        <td>{{ $packagelist[$i]['package_price'] }}</td>
 
        <td>
            <a href="/admin/dashboard/editpackage/{{ $packagelist[$i]['p_id'] }}"name="btn btn-success"> Edit</a>
            
            <a href="/admin/dashboard/viewpackage/details/{{ $packagelist[$i]['p_id'] }}" name="btn btn-info"> Details</a>
            <form action="/admin/dashboard/deletepackage/{{ $packagelist[$i]['p_id']}}" method="post">
              @csrf
              <button type="submit" name="submit" class="btn btn-danger"> Delete </button> 
          </form>
            
        </td>
      </tr>
      @endfor
    </tbody>
  </table>
@endsection