@extends('layouts.main')

@section('viewuser')
<div class="col-md-4">
  <form action="/searchcustomer" method="GET">
  <div class="input-group">
    <input type="search" name="search" class="form-control" placeholder="Type Customer Username">
    <span class="input-group-prepend">
      <button type="submit" class="btn btn-primary"> Search</button>
    </span>
  </div>
  </form>
</div>
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
        @foreach($customerlist as $customerlists)
      <tr scope="row">
        <td scope="col">{{ $customerlists->id }}</td>
        <td scope="col">{{ $customerlists->fullname }}</td>
        <td scope="col">{{ $customerlists->username }}</td>
        <td scope="col">{{ $customerlists->email }}</td>
        <td scope="col">{{ $customerlists->address }}</td>
        <td scope="col">{{ $customerlists->phone }}</td>
        <td scope="col">{{ $customerlists->password }}</td>
        <td scope="col">{{ $customerlists->gender }}</td>
        <td>
            <a href=""name="btn btn-success"> Edit</a>
            <a href="/home/delete/{{ $customerlists->id }}"name="btn btn-danger"> Delete</a>
            <a href="/home/details/{{ $customerlists->id }}" name="btn btn-info"> Details</a>
        </td>
      </tr>
      @endforeach
     </tbody>
 </table>
 


  <span style="padding: 30px; "> {{ $customerlist->links() }}</span>
  <style>
    .w-5{
      display:none ;
      
    }
  </style>

@endsection