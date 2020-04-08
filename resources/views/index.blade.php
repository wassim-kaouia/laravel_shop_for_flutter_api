@extends('layouts.master')

@section('title')
Light Sidebar
@endsection

@section('body')
<body data-topbar="dark" data-sidebar="light">
@endsection

@section('content')
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Dashboard</h4>
                                    
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card overflow-hidden">
                                    <div class="bg-soft-primary">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="text-primary p-3">
                                                    <h5 class="text-primary">Welcome Back !</h5>
                                                    <p>In Your Dashboard</p>
                                                </div>
                                            </div>
                                            <div class="col-5 align-self-end">
                                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="avatar-md profile-user-wid mb-4">
                                                    <img src="assets/images/users/avatar-1.jpg" alt="" class="img-thumbnail rounded-circle">
                                                </div>
                                                <h5 class="font-size-15 text-truncate">{{ Auth::user()->first_name }}</h5>
                                                <p class="text-muted mb-0 text-truncate">Role: Admin</p>
                                            </div>

                                            <div class="col-sm-8">
                                                <div class="pt-4">

                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h5 class="font-size-15">125</h5>
                                                            <p class="text-muted mb-0">Projects</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <h5 class="font-size-15">$1245</h5>
                                                            <p class="text-muted mb-0">Revenue</p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-4">
                                                        <a href="" class="btn btn-primary waves-effect waves-light btn-sm">View Profile <i class="mdi mdi-arrow-right ml-1"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Monthly Earning</h4>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="text-muted">This month</p>
                                                <h3>$34,252</h3>
                                                <p class="text-muted"><span class="text-success mr-2"> 12% <i class="mdi mdi-arrow-up"></i> </span> From previous period</p>

                                                <div class="mt-4">
                                                    <a href="" class="btn btn-primary waves-effect waves-light btn-sm">View More <i class="mdi mdi-arrow-right ml-1"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div id="radialBar-chart" class="apex-charts"></div>
                                            </div>
                                        </div>
                                        <p class="text-muted mb-0">We craft digital, graphic and dimensional thinking.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="text-muted font-weight-medium">Orders</p>
                                                        <h4 class="mb-0">1,235</h4>
                                                    </div>

                                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                        <span class="avatar-title">
                                                                <i class="bx bx-copy-alt font-size-24"></i>
                                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="text-muted font-weight-medium">Revenue</p>
                                                        <h4 class="mb-0">$35, 723</h4>
                                                    </div>

                                                    <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                        <span class="avatar-title rounded-circle bg-primary">
                                                                <i class="bx bx-archive-in font-size-24"></i>
                                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="text-muted font-weight-medium">Average Price</p>
                                                        <h4 class="mb-0">$16.2</h4>
                                                    </div>

                                                    <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                        <span class="avatar-title rounded-circle bg-primary">
                                                                <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                      

                        <div class="row">
                        

                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Top Cities Selling Product</h4>

                                        <div class="text-center">
                                            <div class="mb-4">
                                                <i class="bx bx-map-pin text-primary display-4"></i>
                                            </div>
                                            <h3>1,456</h3>
                                            <p>San Francisco</p>
                                        </div>

                                        <div class="table-responsive mt-4">
                                            <table class="table table-centered">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 140px">
                                                            <p class="mb-0">San Francisco</p>
                                                        </td>
                                                        <td style="width: 120px">
                                                            <h5 class="mb-0">1,456</h5></td>
                                                        <td>
                                                            <div class="progress bg-transparent progress-sm">
                                                                <div class="progress-bar bg-primary rounded" role="progressbar" style="width: 94%" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p class="mb-0">Los Angeles</p>
                                                        </td>
                                                        <td>
                                                            <h5 class="mb-0">1,123</h5>
                                                        </td>
                                                        <td>
                                                            <div class="progress bg-transparent progress-sm">
                                                                <div class="progress-bar bg-success rounded" role="progressbar" style="width: 82%" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p class="mb-0">San Diego</p>
                                                        </td>
                                                        <td>
                                                            <h5 class="mb-0">1,026</h5>
                                                        </td>
                                                        <td>
                                                            <div class="progress bg-transparent progress-sm">
                                                                <div class="progress-bar bg-warning rounded" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="col-lg-6">
                                
                            </div>  --}}
                        </div>
                        <!-- end row -->


                @endsection

                @section('script')
                        <!-- Plugin Js-->
                        <script src="{{ URL::asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

                        <script src="{{ URL::asset('assets/js/pages/dashboard.init.js')}}"></script>
                @endsection