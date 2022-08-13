@extends('admin.layouts.master')
@section('title', 'All Users')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="{{route('admin.user.create')}}" class="btn btn-primary"> + Add New</a>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Active Users</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped table-sm status">
                    <thead>
                    <tr>
                      <th>User Name</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                   @foreach($users as $data)
                    <tr>
                      <td>{{ $data->name }}</td>
                      <td>{{ $data->phone }}</td>
                      <td>{{ $data->email }}</td>
                      <td>{{ $data->address }}</td>

                      <td>
                        @if($data->status==1)
                        <a href="{{route('admin.user.statusdeactive',$data->id)}}"   id="active" data-id="{{$data->id}}"><span class="badge badge-success" >Active</span></a>
                        @else
                        <a href="{{route('admin.user.statusactive',$data->id)}}" id="deactive"><span class="badge badge-warning" >DeActive</span></a>
                        @endif
                    </td>
                      <td>
                      	<a href="#" class="btn btn-info btn-sm update_std" data-id="{{ $data->id }}" data-toggle="modal" data-target="#editModal" ><i class="fas fa-edit"></i></a>
                      	<a href="#" class="btn btn-danger btn-sm" id="deleteuser"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                   @endforeach
                    </tbody>
                  </table>
                </div>
	          </div>
	      </div>
	  </div>
	</div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  
  <script>
       $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
     });
  
     $(document).ready(function() {
  
      function showalluser(){
        
      }
  
      //     $('#addUser').click( function (e) {
      //     e.preventDefault();
      //     let url = $(this).attr('href');
      //     $.ajax({
      //         url :{{ url('ajax-posts')}}",
      //         type: "GET",
      //         success:function(data){
      //            console.log(data);
      //                       }
      //     });
      // });
      $('#active').click(function(e){
        let url = $(this).attr('href');
          e.preventDefault();
          var id = $(this).data('id'); 
          $.ajax({
              url: url,
              type: "GET",
              success:function(data){

                // $('#active').append('<tr> 
                //   <td>' + value.EmployeeId + '</td> 
                //    <td>' + value.Name + '</td> 
                //    <td>' + value.Gender + '</td>
                //     <td>' + value.StateId + '</td> 
                //     <td>' + value.CityId + '</td> 
                //     <td>' + value.PhoneNumber + '</td> 
                //     <td>' + value.Salary + '</td></tr>');

                            }
          });
  
      });
      $('#deactive').click(function(e){
        let url = $(this).attr('href');
          e.preventDefault();
          var id = $(this).data('id'); 
          $.ajax({
              url: url,
              type: "GET",
              success:function(data){
                window.location.reload();

                 console.log(data);
                            }
          });
  
      });
  
      $('#deleteuser').click( function (e) {
          e.preventDefault();
          let url = $(this).attr('href');
          $.ajax({
              url : url,
              type: "POST",
              success:function(data){

                            }
          });
      });
     });
  
  </script>
  
  @endsection
  
