@extends('layouts.master')
@section('content')
<div class="our-services section-pad-t30">
            <div class="container">
                <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle text-center">
                                <span>FEATURED TOURS Packages</span>
                                <h2>Browse Top Categories </h2>
                            </div>
                        </div>
                </div>
                <div class="row d-flex justify-contnet-center">
                
                            @foreach ($categoryAll as $data )
                                <div class="card" style="width: 18rem; margin-right:3px;" >
                                    <div class="card-body" >
                                        <h5 class="card-title">{{$data->name}}</h5>
                                        <p class="card-text">{{substr($data->description,0,102)}}.........</p>
                                        <div class="apply-btn2">
                                            <a href="{{route('user.category.all',$data->id)}}" class="btn">Show Job Details</a>
                                    </div>
                                    </div>
                                </div>
                            @endforeach

                </div>
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                            <span>FEATURED TOURS Packages</span>
                            <h2>Browse Top Categories </h2>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-contnet-center">
                
                            @foreach ($posts as $data )
                                <div class="card" style="width: 18rem; margin-right:3px;" >
                                    <img class="card-img-top" src="{{ asset('images/job/' . $data->image) }}"height="185" widht="285" alt="Card image cap">
                                    <div class="card-body" >
                                        <h5 class="card-title">{{$data->title}}</h5>
                                        <p class="card-text">{{substr($data->description,0,102)}}.........</p>
                                        <div class="apply-btn2">
                                            <a href="{{route('user.single.post',$data->id)}}" class="btn">Show Job Details</a>
                                    </div>
                                    </div>
                                </div>
                            @endforeach

                </div>
                <!-- More Btn -->
                <!-- Section Button -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="browse-btn2 text-center mt-50">
                            <a href="job_listing.html" class="border-btn2">Browse All Sectors</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Our Services End -->
        <!-- Online CV Area Start -->
        <div class="online-cv cv-bg section-overly pt-90 pb-120"  data-background="assets/img/gallery/cv_bg.jpg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="cv-caption text-center">
                            <p class="pera1">FEATURED TOURS Packages</p>
                            <p class="pera2"> Make a Difference with Your Online Resume!</p>
                            <a href="#" class="border-btn2 border-btn4">Upload your cv</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Online CV Area End-->
        <!-- Featured_job_start -->
        <section class="featured-job-area feature-padding">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                            <span>Recent Job</span>
                            <h2>Featured Jobs</h2>
                        </div>
                    </div>
                </div>
                @forelse ($recentJob as $data )
                <div class="row justify-content-center" >
                    <div class="col-xl-10">
                        <!-- single-job-content -->
                        <div class="single-job-items mb-30 ">
                            <div class="job-items">
                                <div class="company-img">
                                    <a href="{{route('user.single.post',$data->id)}}"><img src="{{ asset('images/job/' . $data->image) }}  "alt="" width="30px;" height="30px"></a>
                                </div>
                                <div class="job-tittle">
                                    <a href="{{route('user.single.post',$data->id)}}"><h4>{{$data->title}}</h4></a>
                                    <ul>
                                        <li>{{$data->company_name}}</li>
                                        <li><i class="fas fa-map-marker-alt"></i>{{$data->location}}</li>
                                        <li>{{$data->salary_range}}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="items-link f-right">
                                <a href="{{route('user.single.post',$data->id)}}">{{$data->type}}</a>
                                <span>{{ $data->created_at->diffForHumans()}}</span>
                            </div>
                        </div>
                        <!-- single-job-content -->

                         <!-- single-job-content -->

                    </div>
                </div>
                {{-- {{ $recentJob->links() }} --}}


                @empty

                @endforelse

            </div>
        </section>
        <!-- Featured_job_end -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script type="text/javascript">
   $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
   });
      $(document).ready(function() {

        $('#search').on('keyup', function() {
            let search_string = $('#search').val();
            $.ajax({
                url:"{{route('user.search.post')}}",
                method:"GET",
                data:{search_string:search_string},
                success:function(data){
                    $('#product').html(data);
                }
            })
        })
      });
  </script>
@endsection
