@extends('admin.layouts.master')
@section('title', 'All Category')
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
                      	<a href="{{route('admin.category.edit',$row->id)}}" class="btn btn-info btn-sm update_std" data-id="{{ $row->id }}" data-toggle="modal" data-target="#editModal" ><i class="fas fa-edit"></i></a>
                      	<a href="{{route('admin.category.delete',$row->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>
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
    {{-- category store modal --}}
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="categoryModal">Add New Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('admin.category.store')}}" method="Post" enctype="multipart/form-data" >
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
          <button type="Submit" class="btn btn-primary" id="#category_form">Submit</button>
        </div>
        </form>
      </div>
    </div>
</div>
    {{-- category edit modal --}}

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('admin.category.update')}}" method="Post" enctype="multipart/form-data">
          @csrf
      <div class="modal-body" id="modal_body">
          <div class="form-group">
            <label for="category_name">Category Name</label>
            <input type="text" class="form-control update_name" id="category_name"  name="name"  >
            <small id="emailHelp" class="form-text text-muted">This is your main category</small>
          </div>
          <div class="form-group">
            <label for="category_name">Status </label>
            <select class="form-select form-control"  name="status" aria-label="Default select example" id="breeds">
              <option class="form-control" selected value="1">Active</option>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
  $(document).ready(function() {
     $(document).on('click', '#category_form', function (e) {
      e.preventDefault();
      let url = $(this).attr('action');
       let request = $(this).serialize();
       $.ajax({
          type:'POST',
          url:url,
          data: request,
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success:function(data){
            alert('done');
          }
       });
     });
 });
 $(".update_std").click(function(){
    let url = $(this).attr('href');

    $.ajax({
      url: url,
      tyep :"GET",
      success:function(data){
        alert(data.status);
        $(".update_name").val(data.name);
        $(".update_status").val(data.status);

       
        
      }
    })

     
  });
 </script>

{{-- <script>
   $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
   });

  
    $('body').on('click', '#category_form', function (e) {
    e.preventDefault();
    let url = $(this).attr('action');
    let request = $(this).serialize();
    $(".modal").hide();
    $.ajax({
        url : url,
        type: "POST",
        data: request,
        success:function(){
          
        }
    });
  });
  //Get Student for update
  $(".update_std").click(function(){
    let url = $(this).attr('href');

    $.ajax({
      url: url,
      tyep :"GET",
      success:function(data){
        $(".update_name").val(data.name);
        $(".update_email").val(data.email);
        $(".update_phone").val(data.phone);
        $("#imageResult").val(data.phone);
        
      }
    })

     
  });

  $(".student_update").submit(function(e){
    e.preventDefault();
    let url = $(this).attr('action');
    alert(url);
    $.ajax({
      url: url,
      type:"POST",
      async:false,
      success:function(){
        location.reload();
        console.log('data updated');
      }
    })
  })

</script> --}}
@endsection
