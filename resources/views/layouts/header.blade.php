<header>
    <!-- Header Start -->
   <div class="header-area header-transparrent">
       <div class="headder-top header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-2">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.html"><img src="{{asset('frontend/assets/img/logo/logo.png')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="menu-wrapper">
                            <!-- Main-menu -->
                            <div class="main-menu">
                                <nav class="d-none d-lg-block">
                                    <ul id="navigation">
                                        <li><a href="{{route('home')}}">Home</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                        <li><a href="{{route('user.job.all')}}">All Job</a></li>

                                    </ul>
                                </nav>
                            </div>
                            <!-- Header-btn -->
                            @guest
                            <div class="header-btn d-none f-right d-lg-block">
                                <a href="{{route('register')}}" class="btn head-btn1">Register</a>
                                <a href="{{route('login')}}" class="btn head-btn2">Login</a>


                            </div>
                            @else
                            <a href="{{route('user.post.form')}}" class="btn head-btn2">Post Job</a>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="{{route('user.profile')}}">Profile</a>
                                  <a class="dropdown-item" href="{{route('user.apply.all')}}">All Job Apply</a>
                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                </div>
                              </div>
                            @endguest

                        </div>
                    </div>
                    
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
       </div>
   </div>
    <!-- Header End -->
</header>
