@extends('account.layout.main')

@section('maincontent')
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Employee attendance Information</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="/account/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="">Employee</a></li>
            <li class="breadcrumb-item active">attendance List</li>
        </ol>
        </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>
    
    <section class="content">
    <div class="container-fluid">
    <div class="row">
    <div class="col-12">
      <div class="card">
      <div class="card-header py-3">
      <a href="{{route('account.employee.attendance.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Employee Attendance</a>
    </div>
    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
              <th>S.N.</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach($alldata as $key => $value)
                <tr class="{{$value -> id}}">
                    <td>{{$key+1}}</td>
                    
                    <td>{{date('d-m-Y',strtotime($value->date))}}</td>
                   
                    <td>
                        <a href="{{ route('account.employee.attendance.edit',[$value -> date])}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('account.employee.attendance.details',[$value -> date])}}" class="btn btn-success btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
                @endforeach
          </tbody>
        </table>
        </div>
</div>
<!-- /.card-body -->
</div>
      <!-- /.card -->
    </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection