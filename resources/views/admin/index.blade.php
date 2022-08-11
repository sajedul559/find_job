@extends('admin.layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right">
        <div class="page-header">
            <div class="page-title">
                <h1>Hello, <span>Welcome Here</span></h1>
            </div>
        </div>
    </div>
    <!-- /# column -->
    <div class="col-lg-4 p-l-0 title-margin-left">
        <div class="page-header">
            <div class="page-title">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Home</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /# column -->
</div>
<!-- /# row -->
<section id="main-content">
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-money color-success border-success"></i>
                    </div>
                    <div class="stat-content dib">
                        <div class="stat-text">Total Apply</div>
                        <div class="stat-digit">{{$jobapply}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-user color-primary border-primary"></i>
                    </div>
                    <div class="stat-content dib">
                        <div class="stat-text"> <span class="badge badge-success">Total Users</span></div>
                        <div class="stat-digit"> <span class="badge badge-success">{{$totalusers}}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-user color-primary border-primary"></i>
                    </div>
                    <div class="stat-content dib">
                        <div class="stat-text"> <span class="badge badge-success">Active Users</span></div>
                        <div class="stat-digit"> <span class="badge badge-success">{{$activeusers}}</span></div>
                    </div>
                </div>
            </div>
        </div> <div class="col-lg-3">
            <div class="card">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-user color-primary border-primary"></i>
                    </div>
                    <div class="stat-content dib">
                        <div class="stat-text"> <span class="badge badge-warning">Dactive User</span></div>
                        <div class="stat-digit"> <span class="badge badge-warning">{{$deactiveusers}}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-layout-grid2 color-pink border-pink"></i>
                    </div>
                    <div class="stat-content dib">
                        <div class="stat-text"> <span class="badge badge-success">Total Jop</span></div>
                        <div class="stat-digit"> <span class="badge badge-success">{{$jobs}}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-layout-grid2 color-pink border-pink"></i>
                    </div>
                    <div class="stat-content dib">
                        <div class="stat-text"> <span class="badge badge-success">Active Jobs</span></div>
                        <div class="stat-digit"> <span class="badge badge-success">{{$activejobs}}</span></div>
                    </div>
                </div>
            </div>
        </div> <div class="col-lg-3">
            <div class="card">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-layout-grid2 color-pink border-pink"></i>
                    </div>
                    <div class="stat-content dib">
                        <div class="stat-text"> <span class="badge badge-success">Dactive Job </span></div>
                        <div class="stat-digit"> <span class="badge badge-success">{{$deactivejobs}}</span></div>
                    </div>
                </div>
            </div>
        </div> <div class="col-lg-3">
            <div class="card">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-layout-grid2 color-pink border-pink"></i>
                    </div>
                    <div class="stat-content dib">
                        <div class="stat-text"> <span class="badge badge-success">All Category</span></div>
                        <div class="stat-digit"> <span class="badge badge-success">{{$category}}</span></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- /# row -->

    {{-- <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-title">
                    <h4>Fee Collections and Expenses</h4>

                </div>
                <div class="card-body">
                    <div class="ct-bar-chart m-t-30"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">

                <div class="card-body">
                    <div class="ct-pie-chart"></div>
                </div>
            </div>
        </div>
    </div> --}}


    {{-- <div class="row">
        <div class="col-lg-12">
            <div class="footer">
                <p>2018 © Admin Board. - <a href="#">example.com</a></p>
            </div>
        </div>
    </div> --}}
</section>
@endsection
