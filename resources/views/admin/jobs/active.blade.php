@extends('admin.layouts.master')
@section('title', 'Active Jobs')

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
              <button class="btn btn-primary" data-toggle="modal" data-target="#categoryModal"> + Add New</button>
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
                  <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead>
                    <tr>
                      <th>User Name</th>
                      <th>User Phone</th>
                      <th>Co. Email</th>
                      <th>Location</th>
                      <th>Vacancy</th>
                      <th>Type</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                   @foreach($activejobs as $data)
                    <tr>
                      <td>{{ $data->user->name }}</td>
                      <td>{{ $data->user->phone }}</td>
                      <td>{{ $data->email }}</td>
                      <td>{{ $data->location }}</td>
                      <td>{{ $data->vacancy }}</td>
                      <td>{{ $data->type }}</td>
                      <td>
                        @if($data->status==1)
                        <a href="{{route('admin.job.statusdeactive',$data->id)}}"   id="active" data-id="{{$data->id}}"><span class="badge badge-success" >Active</span></a>
                        @else
                        <a href="{{route('admin.job.statusactive',$data->id)}}" id="deactive"><span class="badge badge-warning" >DeActive</span></a>
                        @endif
                    </td>
                      <td>
                      	<a href="#" class="btn btn-info btn-sm update_std" data-id="{{ $data->id }}" data-toggle="modal" data-target="#editModal" ><i class="fas fa-edit"></i></a>
                      	<a href="#" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>
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

@endsection
