@extends('layouts.profile_master')
@section('title', 'Single Post')

@section('content')
<style>
body{
    background-color: white;
}
</style>
<main>


    <!-- Hero Area Start-->
    <div class="slider-area ">
    <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="{{asset('frontend/assets/img/hero/about.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>{{$post->title}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Hero Area End -->
    <!-- job post company Start -->
    <div class="job-post-company pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Left Content -->
                <div class="col-xl-7 col-lg-8">
                    <!-- job single -->
                    <div class="single-job-items mb-50">
                        <div class="job-items">
                            <div class="company-img company-img-details">
                                <a href="#"><img src="{{asset('images/job/'.$post->image)}}" height="200px;" width="400px;" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="#">
                                    <h4>{{$post->title}}</h4>
                                </a>
                                <ul>
                                    <li>{{$post->company_name}}</li>
                                    <li><i class="fas fa-map-marker-alt"></i>{{$post->location}}</li>
                                    <li>{{$post->salary_range}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                      <!-- job single End -->

                    <div class="job-post-details">
                        <div class="post-details1 mb-50 ">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Job Description</h4>
                            </div>
                            <p>{{$post->description}}</p>
                        </div> 
                        <div class="post-details2  mb-50 card">
                             <!-- Small Section Tittle -->
                            <div class="small-section-tittle pt-2 ml-3">
                                <h4 >Previous and Next Post Of This Post</h4>

                            </div>
                           <ul>
                            @if ($previous)
                            <li><a href="{{route('user.single.post',$previous)}}"><span class="badge badge-success">Previous Post</span> </a></li>
                                
                            @endif
                            @if ($next)
                            <li><a href="{{route('user.single.post',$next)}}"><span class="badge badge-success">Next Post</span> </a></li>

                            @endif
                              
                               
                           </ul>
                        </div>

                    </div>

                </div>
                <!-- Right Content -->
                <div class="col-xl-4 col-lg-4">
                    <div class="post-details3  mb-50">
                        <!-- Small Section Tittle -->
                       <div class="small-section-tittle">
                           <h4>Job Overview</h4>
                       </div>
                      <ul>
                          <li>Posted date : <span>{{$post->created_at}}</span></li>
                          <li>Location : <span>{{$post->location}}</span></li>
                          <li>Vacancy : <span>{{$post->vacancy}}</span></li>
                          <li>Job nature : <span>{{$post->type}}</span></li>
                          <li>Salary :  <span>{{$post->salary_range}}</span></li>
                          <li>Application date : <span>{{Carbon::now()}}</span></li>
                      </ul>
                     <div class="apply-btn2">
                        @auth
                        @if ($post->applyJobs()->where('user_id', auth()->user()->id)->exists())
                        <h2 class="btn"><span class="badge badge-success">{{auth()->user()->name}}</span> alreadly applied &#9989;</h2>
                            
                        @else
                        <a href="{{route('user.apply',$post->id)}}" class="btn">Apply Now</a>

                        @endif

                        @endauth
                        @guest
                         <a href="{{route('login')}}" class="btn">please Login for apply job</a>
                        @endguest

                     </div>
                   </div>
                    <div class="post-details4  mb-50">
                        <!-- Small Section Tittle -->
                       <div class="small-section-tittle">
                           <h4>Company Information</h4>
                       </div>
                          <span>{{$post->company_name}}</span>
                          <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                        <ul>
                            <li>Name: <span>{{$post->company_name}} </span></li>
                            <li>Web : <span> {{$post->web}}</span></li>
                            <li>Email: <span>{{$post->email}}</span></li>
                        </ul>
                   </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job post company End -->

</main>
@endsection
