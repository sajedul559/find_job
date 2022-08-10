@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Category</h1>
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
                <h3 class="card-title">All categories list here</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead>
                    <tr>
                      <th>Category Name</th>
                      <th>Category Slug</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                   @foreach($categories as $key=>$row)
                    <tr>
                      <td>{{ $row->name }}</td>
                      <td>
                         @if($row->status==1)
                           <span class="badge badge-success">Active</span>
                         @else
                         <span class="badge badge-warning">DeActive</span>

                         @endif
                      </td>
                      <td>
                      	<a href="#" class="btn btn-info btn-sm edit" data-id="{{ $row->id }}" data-toggle="modal" data-target="#editModal" ><i class="fas fa-edit"></i></a>
                      	<a href="{{route('admin.categories.destroy',$row->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>
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
    {{-- category edit modal --}}
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="categoryModal">Add New Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('admin.categories.store')}}" method="Post" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
            <div class="form-group">
              <label for="category_name">Category Name</label>
              <input type="text" class="form-control" id="category_name" name="name" required="">
              <small id="emailHelp" class="form-text text-muted">This is your main category</small>
            </div>
            <div class="form-group">
              <label for="category_name">Status </label>
              <select class="form-select form-control"  name="status" aria-label="Default select example">
                <option class="form-control" selected>Open this select menu</option>
                <option class="form-control" value="1">Active</option>
                <option class="form-control" value="2">Inactive</option>
              </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="Submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
      </div>
    </div>
</div>
{{-- <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('admin.categories.store')}}" method="Post" enctype="multipart/form-data">
          @csrf
      <div class="modal-body" id="modal_data">
          <div class="form-group">
            <label for="category_name">Category Name</label>
            <input type="text" class="form-control" id="category_name" name="name" required="" >
            <small id="emailHelp" class="form-text text-muted">This is your main category</small>
          </div>
          <div class="form-group">
            <label for="category_name">Status </label>
            <select class="form-select form-control"  name="status" aria-label="Default select example">
              <option class="form-control" selected>Open this select menu</option>
              <option class="form-control" value="1">Active</option>
              <option class="form-control" value="2">Inactive</option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="Submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
  $('body').on('click','.edit',function(){
    let id = $(this).data('id');
    $.get('categories/+ +/edit/'+id,function(data){
      $('modal_data').html(data);
    })

  })
</script>
@endsection
