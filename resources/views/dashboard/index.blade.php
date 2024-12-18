@extends('layouts.car-app')
@section('title', 'Admin Dashboard')

@section('content')
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="float-right">
                            <div class="dropdown"><button class="btn btn-secondary btn-round dropdown-toggle px-3"
                                    type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"><i class="mdi mdi-settings mr-1"></i>Settings</button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton"><a
                                        class="dropdown-item" href="#">Action</a> <a class="dropdown-item"
                                        href="#">Another
                                        action</a> <a class="dropdown-item" href="#">Something else
                                        here</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div><!-- end page title end breadcrumb -->
            <div class="row">
                <div class="col-md-12 col-xl-3">
                    <div class="card mini-stat">
                        <div class="mini-stat-icon text-right"><i class="mdi mdi-cube-outline"></i></div>
                        <div class="p-4">
                            <h6 class="text-uppercase mb-3">Statistics</h6>
                            <div class="float-right">
                                <p class="mb-0"><b>Last:</b> 30.4k</p>
                            </div>
                            <h4 class="mb-0">34578<small class="ml-2"><i
                                        class="mdi mdi-arrow-up text-primary"></i></small></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-3">
                    <div class="card mini-stat">
                        <div class="mini-stat-icon text-right"><i class="mdi mdi-buffer"></i></div>
                        <div class="p-4">
                            <h6 class="text-uppercase mb-3">User Today</h6>
                            <div class="float-right">
                                <p class="mb-0"><b>Last:</b> 1250</p>
                            </div>
                            <h4 class="mb-0">895<small class="ml-2"><i
                                        class="mdi mdi-arrow-down text-danger"></i></small></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-3">
                    <div class="card mini-stat">
                        <div class="mini-stat-icon text-right"><i class="mdi mdi-tag-text-outline"></i>
                        </div>
                        <div class="p-4">
                            <h6 class="text-uppercase mb-3">User This Month</h6>
                            <div class="float-right">
                                <p class="mb-0"><b>Last:</b> 40.33k</p>
                            </div>
                            <h4 class="mb-0">52410<small class="ml-2"><i
                                        class="mdi mdi-arrow-up text-primary"></i></small></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-3">
                    <div class="card mini-stat">
                        <div class="mini-stat-icon text-right"><i class="mdi mdi-briefcase-check"></i></div>
                        <div class="p-4">
                            <h6 class="text-uppercase mb-3">Request Per Minute</h6>
                            <div class="float-right">
                                <p class="mb-0"><b>Last:</b> 956</p>
                            </div>
                            <h4 class="mb-0">652<small class="ml-2"><i
                                        class="mdi mdi-arrow-down text-danger"></i></small></h4>
                        </div>
                    </div>
                </div>
            </div><!-- end row -->
            <div class="row">
                <div class="col-md-12 col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 mb-3 header-title">Website Overview</h4>
                            <div id="morris-area-chart" style="height: 340px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 mb-3 header-title">Monthly Revenue</h4>
                            <div id="morris-donut-example" style="height: 340px;"></div>
                        </div>
                    </div>
                </div>
            </div><!-- end row-->
            <div class="row">
                <div class="col-md-12 col-xl-4">
                    <div class="card">
                        <div class="card-body"><a href="#" class="btn btn-light btn-sm float-right">More
                                Info</a>
                            <h6 class="">Product Status</h6>
                            <div id="multi-line-chart" style="height: 350px;"></div>
                            <ul class="list-unstyled list-inline text-center mb-0 mt-3">
                                <li class="list-inline-item">
                                    <p class="mb-0"><i class="mdi mdi-checkbox-blank-circle mr-2 text-success"></i>Profit
                                    </p>
                                </li>
                                <li class="list-inline-item">
                                    <p class="mb-0"><i class="mdi mdi-checkbox-blank-circle mr-2 text-danger"></i>Lost
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <h6 class="mb-0">Website Visitors</h6>
                                    <div class="mt-3">
                                        <h3 class="mb-1">528,580<small class="font-12 text-muted ml-1">last
                                                3 weeks</small></h3>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body text-center"><img src="assets/images/flags/us_flag.jpg"
                                                alt="" class="w-30">
                                            <span class="ml-2">35%<i class="mdi mdi-arrow-down text-danger"></i></span>
                                            <p class="mb-0 mt-2">Domestic Visits</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body text-center"><img src="assets/images/flags/russia_flag.jpg"
                                                alt="" class="w-30"> <span class="ml-2">65%<i
                                                    class="mdi mdi-arrow-up text-primary"></i></span>
                                            <p class="mb-0 mt-2">International Visits</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div id="world-map-markers" style="height: 291px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end row -->
        </div><!-- container -->
    </div><!-- Page content Wrapper -->
@endsection
