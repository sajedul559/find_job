@extends('layouts.master_all_post')
@section('title', 'All Category Job')


@section('content')
<div class="container">
    <main>

        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Get your job</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->
        <!-- Job List Area Start -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center">
                    <span>FEATURED TOURS Packages</span>
                    <h2>Browse Top Categories </h2>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-contnet-center">
        
                    @foreach ($categoryJobs as $data )
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
    
    </main>
</div>

@endsection
