@extends('layouts.profile_master')
@section('title', 'All Apply')


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
                      <h4>{{auth()->user()->name}}</h4>
                      {{-- <p class="text-secondary mb-1">{{auth()->user()->name}}</p> --}}
                      <p class="text-muted font-size-sm"> {{auth()->user()->address}}</p>
                      <a href="{{route('user.post.all')}}"class="btn btn-sm btn-outline-primary">Ur Post</a>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <h1 class="text-center"><span class="badge badge-info">{{auth()->user()->name }} </span>  Your Job Apply List</h1>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Designation</th>
                            <th scope="col">Company</th>
                            <th scope="col">Co. Web</th>

                            <th scope="col">Type</th>
                            <th scope="col">Salary Range</th>
                            <th scope="col">Location</th>


                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($my_job_applys as $data )
                            <tr>
                                <td>{{$data->job->title}}</td>
                                <td>{{$data->job->company_name}}</td>
                                <td>{{$data->job->web}}</td>
                                <td>{{$data->job->type}}</td>
                                <td>{{$data->job->salary_range}}</td>
                                <td>{{$data->job->location}}</td>
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

