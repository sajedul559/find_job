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
                      <a href="{{route('user.apply.all')}}"class="btn btn-sm btn-outline-primary">Ur Apply</a>
                      <a href="{{route('user.post.all')}}"class="btn btn-sm btn-outline-primary">Ur Post</a>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">

                    <form action="{{route('user.profile.update')}}" method="post" enctype="multipart/form">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">name</label>
                          <input type="text" class="form-control" name="name" aria-describedby="emailHelp" value="{{Auth::user()->name}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Address</label>
                            <input type="text" class="form-control" name="address" aria-describedby="emailHelp" value="{{Auth::user()->address}}">
                          </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Phone</label>
                            <input type="text" class="form-control" name="phone" aria-describedby="emailHelp" value="{{Auth::user()->phone}}">
                       </div>


                        <button type="submit" class="btn btn-primary">Update Profile</button>
                      </form>

                </div>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection
