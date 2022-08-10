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

                    <form action="{{route('user.post.create')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h4 class="text-center">Update job post here</h4>
                         <div class="row col-md-12">
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ $post->title }}">
                                    @error('title')
                                    <div style="color:red"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1">Job Type</label>
                                    <select class="form-select form-control"  name="type">
                                        <option class="form-control" selected>Select Job Type</option>
                                        <option @if($post->type==='Internship') selected='selected' @endif class="form-control" value="Internship">Internship</option>
                                        <option @if($post->type==='Part Time') selected='selected' @endif class="form-control" value="Part Time">Part Time</option>
                                        <option @if($post->type==='Full Time') selected='selected' @endif class="form-control" value="Full Time">Full Time</option>
                                    </select>
                                    @error('type')
                                    <div style="color:red"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1">Job Category</label>
                                    <select class="form-select form-control"  name="cat_id" >
                                    @foreach ($categories as  $data)
                                        @if ($data->cat_id == $post->cat_id)
                                        <option selected class="form-control" value="{{$data->id}}">{{$data->name}}</option>
                                        @else
                                        @endif
                                    @endforeach
                                    </select>
                                </div>
                         </div>

                         <div class="row col-md-12">
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Vacancy</label>
                                <input type="text" class="form-control" name="vacancy" value="{{ $post->vacancy }}">
                                @error('vacancy')
                                <div style="color:red"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                              <label for="exampleInputEmail1">Company Name</label>
                              <input type="text" class="form-control" name="company" value="{{ $post->company_name }}">
                              @error('company')
                              <div style="color:red"> {{ $message }} </div>
                              @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Salary Range</label>
                                <select class="form-select form-control"  name="salary_range">
                                    <option  class="form-control"  selected>Select Salary Rage</option>
                                    <option @if($post->salary_range==='5k-10k') selected='selected' @endif class="form-control" value="5k-10k">5K-10K</option>
                                    <option @if($post->salary_range==='10k-15k') selected='selected' @endif class="form-control" value="10k-15k">10K-15K</option>
                                    <option @if($post->salary_range==='15k-25k') selected='selected' @endif class="form-control" value="15k-25k">15K-25K</option>
                                    <option @if($post->salary_range==='25k-35k') selected='selected' @endif class="form-control" value="15k-25k">25K-35K</option>
                                </select>
                            </div>
                         <div class="row col-md-12">
                          <div class="form-group col-md-4">
                              <label for="exampleInputEmail1">Location</label>
                              <input type="text" class="form-control" name="location" value="{{ $post->location }}">
                              @error('location')
                              <div style="color:red"> {{ $message }} </div>
                              @enderror
                          </div>
                          <div class="form-group col-md-4">
                            <label for="exampleInputEmail1">Company Email</label>
                            <input type="text" class="form-control" name="email" value="{{ $post->email }}">
                            @error('email')
                            <div style="color:red"> {{ $message }} </div>
                            @enderror
                          </div>
                          <div class="form-group col-md-4">
                            <label for="exampleInputEmail1">Website</label>
                            <input type="text" class="form-control" name="website" value="{{ $post->web }}">
                            @error('website')
                            <div style="color:red"> {{ $message }} </div>
                            @enderror
                          </div>
                       </div>
                         <div class="row col-md-12">
                             <div class="form-group col-md-6">
                                  <label for="exampleInputEmail1">Description</label>
                                  <input type="text" class="form-control" name="description" value="{{ $post->description }}">
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
