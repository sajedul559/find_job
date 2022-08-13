@extends('layouts.profile_master')
@section('title', 'User All Post')


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
          
          
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title text-center">Dear <strong>{{auth()->user()->name}}</strong>  Your All Job Post</h3>
                      </div>
                      <!-- /.card-header -->
                          <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped table-sm">
                                  <thead>
                                  <tr>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Co.Email</th>
                                    <th>Co.Web</th>
                                    <th>Vacancy</th>
                                    <th>Type</th>
                                    <th>Location</th>

                                    <th>Status</th>
                                    <th>Action</th>
                                  </tr>
                                  </thead>
                                  <tbody>

                                @foreach($posts as $data)
                                  <tr>
                                    <td>{{ $data->title}}</td>
                                    <td>{{ $data->category->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->web }}</td>
                                    <td>{{ $data->vacancy }}</td>
                                    <td>{{ $data->type }}</td>
                                    <td>{{ $data->location }}</td>




                                    <td>
                                      @if($data->status==1)
                                        <span class="badge badge-success">Active</span>
                                      @else
                                      <span class="badge badge-warning">DeActive</span>

                                      @endif
                                    </td>
                                    <td>
                                        <a href="{{route('user.post.edit',$data->id)}}" class="" ><i class="fas fa-edit " style="color:aqua"></i></a>
                                        <a href="{{route('user.post.delete',$data->id) }}" class="" id="delete"><i class="fas fa-trash " style="color: red"></i></a>
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
    </section>

    </div>
</div>
@endsection

