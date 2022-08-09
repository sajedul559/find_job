@extends('layouts.profile_master')
@section('content')
<div class="container">
    <div class="main-body">


          <!-- Breadcrumb -->
          {{-- <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav> --}}
          <!-- /Breadcrumb -->

          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>John Doe</h4>
                      <p class="text-secondary mb-1">Full Stack Developer</p>
                      <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                      <button class="btn btn-primary">Follow</button>
                      <button class="btn btn-outline-primary">Message</button>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">

                    <form action="{{route('user.post.create')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h4 class="text-center">Post your job here</h4>
                         <div class="row col-md-12">
                              <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" name="title" aria-describedby="emailHelp">
                                @error('title')
                                <div style="color:red"> {{ $message }} </div>
                                @enderror
                              </div>
                              <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Job Type</label>
                                <input type="text" class="form-control" name="type" aria-describedby="emailHelp">
                                @error('type')
                                <div style="color:red"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                              <label for="exampleInputEmail1">Job Category</label>
                              <select class="form-select form-control"  name="status" aria-label="Default select example">
                                <option class="form-control" selected>Open this select menu</option>
                                @foreach ($categories as  $data)
                                <option class="form-control" value="1">{{$data->name}}</option>

                                @endforeach
                                
                              </select> 
                             
                          </div>
                         </div>
                         <div class="row col-md-12">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Vacancy</label>
                                <input type="text" class="form-control" name="vacancy" aria-describedby="emailHelp">
                                @error('vacancy')
                                <div style="color:red"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Company Name</label>
                              <input type="text" class="form-control" name="company" aria-describedby="emailHelp">
                              @error('company')
                              <div style="color:red"> {{ $message }} </div>
                              @enderror
                            </div>
                         </div>
                         <div class="row col-md-12">
                          <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Location</label>
                              <input type="text" class="form-control" name="location" aria-describedby="emailHelp">
                              @error('location')
                              <div style="color:red"> {{ $message }} </div>
                              @enderror
                          </div>
                          <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Company Email</label>
                            <input type="text" class="form-control" name="email" aria-describedby="emailHelp">
                            @error('email')
                            <div style="color:red"> {{ $message }} </div>
                            @enderror
                          </div>
                       </div>
                         <div class="row col-md-12">
                             <div class="form-group col-md-6">
                                  <label for="exampleInputEmail1">Description</label>
                                  <input type="text" class="form-control" name="description" aria-describedby="emailHelp">
                                  @error('description')
                                  <div style="color:red"> {{ $message }} </div>
                                  @enderror
                            </div>
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Image</label>
                              <input type="file" class="form-control" name="image" aria-describedby="emailHelp">
                            </div>
                         </div>
                      
                       
                       
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>

                </div>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection
