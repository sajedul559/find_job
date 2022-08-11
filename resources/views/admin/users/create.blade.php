@extends('admin.layouts.master')
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
              <button class="btn btn-primary" data-toggle="modal" data-target="#addUser"> + Add New</button>
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
                <h3 class="card-title">Admin User Create Form</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{route('admin.user.store')}}" method="Post" enctype="multipart/form-data" id="user_form">
                        @csrf
                        <div class="modal-body" id="modal_body">
                           <div class="row ">
                                <div class="form-group col-md-6">
                                    <label for="category_name"> Name</label>
                                    <input type="text" class="form-control "  name="name"  >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="category_name">Email</label>
                                    <input type="email" class="form-control "  name="email"  >
                                </div>
                           </div>
                           <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="category_name">Phone</label>
                                    <input type="text" class="form-control "  name="phone"  >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="category_name">Address</label>
                                    <input type="text" class="form-control "  name="address"  >
                                </div>
                           </div>

                           <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="category_name">Password</label>
                                    <input type="password" class="form-control "  name="password"  >
                               </div>
                                {{-- <div class="form-group col-md-6">
                                    <label for="category_name">Password</label>
                                    <input type="password" class="form-control "  name="password"  >
                                </div> --}}
                          </div>
                          <button type="Submit" class="btn btn-primary">Submit</button>
                    </form>
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
        $('#user_form').submit( function (e) {
        e.preventDefault();
        let url = $(this).attr('action');
        let request = $(this).serialize();
        $.ajax({
            url : url,
            type: "POST",
            data: request,
            success:function(data){
                $('#user_form').trigger("reset");
                if(data.redirect_url){
                 window.location=data.redirect_url; // or {{url('login')}}
    }
            }
        });
    });
   });

</script>
@endsection
