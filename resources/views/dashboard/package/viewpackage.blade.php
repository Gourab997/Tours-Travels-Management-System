@extends('layouts.main')


@section('createpackage')

<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Package Id</th>
        <th scope="col">Package Name</th>
        <th scope="col">Package Type</th>
        <th scope="col">Package Location</th>
        <th scope="col">Package Price</th>
        <th scope="col">Details</th
      </tr>
    </thead>
    <tbody>
       @for($i=0; $i< count($packagelist); $i++) 
      <tr scope="row">
        <td style="color: blue">{{ $packagelist[$i]['p_id'] }}</td>
        <td  class="label label-success">{{ $packagelist[$i]['package_name'] }}</td>
        <td>{{ $packagelist[$i]['package_type'] }}</td>
        <td>{{ $packagelist[$i]['package_location'] }}</td>
        <td>{{ $packagelist[$i]['package_price'] }}</td>
 
        <td>
            <a href=""name="btn btn-success"> Edit</a>
            
            <a href="/dashboard/viewpackage/details/{{ $packagelist[$i]['p_id'] }}" name="btn btn-info"> Details</a>
        </td>
      </tr>
      @endfor
    </tbody>
  </table>
@endsection