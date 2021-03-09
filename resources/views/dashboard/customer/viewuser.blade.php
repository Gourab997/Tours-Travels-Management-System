@extends('layouts.main')

@section('viewuser')
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Fullname</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Address</th>
        <th scope="col">Phone</th>
        <th scope="col">Password</th>
        <th scope="col">Gender</th>
        <th scope="col">Action</th
      </tr>
    </thead>
    <tbody>
       @for($i=0; $i< count($customerlist); $i++) 
      <tr scope="row">
        <td>{{ $customerlist[$i]['id'] }}</td>
        <td>{{ $customerlist[$i]['fullname'] }}</td>
        <td>{{ $customerlist[$i]['username'] }}</td>
        <td>{{ $customerlist[$i]['email'] }}</td>
        <td>{{ $customerlist[$i]['address'] }}</td>
        <td>{{ $customerlist[$i]['phone'] }}</td>
        <td>{{ $customerlist[$i]['password'] }}</td>
        <td>{{ $customerlist[$i]['gender'] }}</td>
        <td>
            <a href=""name="btn btn-success"> Edit</a>
            <a href="/home/delete/{{ $customerlist[$i]['id'] }}"name="btn btn-danger"> Delete</a>
            <a href="/home/details/{{ $customerlist[$i]['id'] }}" name="btn btn-info"> Details</a>
        </td>
      </tr>
      @endfor
    </tbody>
  </table>
  
  
@endsection