@extends('layouts.profile_master')
@section('content')
<main>

    <!-- Hero Area Start-->
    <div class="slider-area ">
    <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
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
                                <a href="#"><img src="assets/img/icon/job-list1.png" alt=""></a>
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
                        <div class="post-details1 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Job Description</h4>
                            </div>
                            <p>{{$post->description}}</p>
                        </div>
                        <div class="post-details2  mb-50">
                             <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Required Knowledge, Skills, and Abilities</h4>
                            </div>
                           <ul>
                               <li>System Software Development</li>
                               <li>Mobile Applicationin iOS/Android/Tizen or other platform</li>
                               <li>Research and code , libraries, APIs and frameworks</li>
                               <li>Strong knowledge on software development life cycle</li>
                               <li>Strong problem solving and debugging skills</li>
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
                        <a href="{{route('user.apply',$post->id)}}" class="btn">Apply Now</a>

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
