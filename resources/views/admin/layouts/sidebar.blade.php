<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <div class="logo"><a href="{{route('admin.index')}}">
                        <!-- <img src="assets/images/logo.png" alt="" /> --><span>Focus</span></a></div>
                <li class="label">Main</li>
                <li><a href="{{route('admin.index')}}" class="sidebar-sub-toggle"><i class="ti-home"></i> Dashboard </a>

                </li>

                <li class="label">Apps</li>
                <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i> Users <span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{route('admin.user.create')}}">Create User</a></li>
                        <li><a href="{{route('admin.user.allUsers')}}">All Users</a></li>
                        <li><a href="{{route('admin.user.activeUsers')}}">Active Users</a></li>
                        <li><a href="{{route('admin.user.deactiveUsers')}}">Deactive Users</a></li>
                    </ul>
                </li>
                <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i> Job Post <span
                    class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{route('admin.job.allJobs')}}">All Jop</a></li>
                        <li><a href="{{route('admin.job.activeJobs')}}">Active Post</a></li>

                        <li><a href="{{route('admin.job.deactiveJobs')}}">Deactive Post</a></li>


                    </ul>
                </li>
               <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i> Job Apply <span
                    class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{route('admin.job.apply')}}">All Apply</a></li>

                    </ul>
                </li>
                <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i> Categories <span
                    class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{route('admin.category.create')}}">Create</a></li>
                        <li><a href="{{route('admin.category.index')}}">All</a></li>


                    </ul>
                </li>


                <li><a><i class="ti-close"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</div>
