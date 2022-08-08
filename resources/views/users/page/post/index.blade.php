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

            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">

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

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($post as $data )
                            <tr>
                                <td>{{$data->title}}</td>
                                <td>{{$data->description}}</td>
                                <td>
                                    <a href="{{route('user.post.edit',$data->id)}}" class="btn btn-info btn-sm edit"  ><i class="fas fa-edit"></i></a>
                                    <a href="{{route('user.post.delete',$data->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                </td>
                              </tr>
                            @empty
                            <h2 class="text-center">{{$message}}</h2>

                            @endforelse


                        </tbody>
                      </table>

                </div>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection


                </div>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection
