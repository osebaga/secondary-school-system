@extends('layouts.dashboard')

@section('title')
    Dashboard
@endsection
@section('content')
<head>
    <meta charset="utf-8" />
    <title>SAMIS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

 
    <!-- App css -->
    <link href="{{ asset('loginAssets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('loginAssets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-stylesheet" />

    <!-- icons -->
    <link href="{{ asset('loginAssets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Theme Config Js -->
    <script src="{{ asset('loginAssets/js/config.js') }}"></script>


</head>
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="boxpane" style="margin-bottom: 15px;">
                    <div class="boxpane-header">
                        <h2 class="blue">
                            Dashboard 
                        </h2>
                      
                    </div>
                    <div class="boxpane-content text-center">
                        <div class="content">

                            <!-- Start Content-->
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card" style="background-color: #1abc9c; color: white;">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="knob-chart" dir="ltr">
                                                        <input data-plugin="knob" data-width="70" data-height="70"
                                                            data-bgColor="#ffffff" value="{{$totalUsers}}"
                                                            data-skin="tron" data-angleOffset="0" data-readOnly=true
                                                            data-thickness=".15"/>
                                                    </div>
                                                    <div class="text-end">
                                                        <h3 class="mb-1 mt-0" style="color: white;"> <span data-plugin="counterup">{{$totalUsers}}</span> </h3>
                                                        <p class="text-light mb-0">Number of System Users</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card" style="background-color: #3bafda; color: white;">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="knob-chart" dir="ltr">
                                                        <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#804fd8" 
                                                            data-bgColor="#ffffff" value="{{$totalStaff}}"
                                                            data-skin="tron" data-angleOffset="0" data-readOnly=true
                                                            data-thickness=".15"/>
                                                    </div>
                                                    <div class="text-end">
                                                        <h3 class="mb-1 mt-0" style="color: white;"> <span data-plugin="counterup">{{$totalStaff}}</span> </h3>
                                                        <p class="text-light mb-0">Number of Staff</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card" style="background-color: #56c2e2; color: white;">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="knob-chart" dir="ltr">
                                                        <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#0a87ec" 
                                                            data-bgColor="#ffffff" value="{{$totalStudents}}"
                                                            data-skin="tron" data-angleOffset="0" data-readOnly=true
                                                            data-thickness=".15"/>
                                                    </div>
                                                    <div class="text-end">
                                                        <h3 class="mb-1 mt-0" style="color: white;"> <span data-plugin="counterup">{{$totalStudents}}</span> </h3>
                                                        <p class="text-light mb-0">Number of Students</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card" style="background-color: #5a59bb; color: white;">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="knob-chart" dir="ltr">
                                                        <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#FFD600" 
                                                            data-bgColor="#ffffff" value="{{$totalPrograms}}"
                                                            data-skin="tron" data-angleOffset="0" data-readOnly=true
                                                            data-thickness=".15"/>
                                                    </div>
                                                    <div class="text-end">
                                                        <h3 class="mb-1 mt-0" style="color: white;"> <span data-plugin="counterup">{{$totalPrograms}}</span> </h3>
                                                        <p class="text-light mb-1">Total Programs Offered</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                </div>
                                <!-- end row -->
        
                                <div class="row">
        
                                    <div class="col-xl-4 col-lg-6">
                                        <div class="card">
                                            <div class="card-body">
                                                            
                                                <h4 class="header-title">Semester Pass Rate Report</h4>
            
                                                <div class="mt-3 text-center">
        
                                                    <div class="row pt-2">
                                                        <div class="col-4">
                                                            <p class="text-muted font-15 mb-1 text-truncate">Total Male Pass</p>
                                                            <h4>{{ $totalMalePass }}</h4>
                                                        </div>
                                                        <div class="col-4">
                                                            <p class="text-muted font-15 mb-1 text-truncate">Total Male Fail</p>
                                                            <h4><i class="fe-arrow-down text-danger"></i> {{ $totalMaleFail }}</h4>
                                                        </div>
                                                        <div class="col-4">
                                                            <p class="text-muted font-15 mb-1 text-truncate">Total Female Pass</p>
                                                            <h4><i class="fe-arrow-up text-success"></i> {{ $totalFemalePass }}</h4>
                                                        </div>
                                                        <div class="col-4">
                                                            <p class="text-muted font-15 mb-1 text-truncate">Total Female Fail</p>
                                                            <h4><i class="fe-arrow-down text-danger"></i> {{ $totalFemaleFail }}</h4>
                                                        </div>
                                                    </div>
                                                    
                                                    <div dir="ltr">
                                                        <canvas id="resultsChart1" width="400" height="200"></canvas>
                                                    </div>

                                                </div>
                                            </div>
                                        </div> <!-- end card-box -->
                                    </div> <!-- end col -->
        
                                    <div class="col-xl-4 col-lg-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="header-title">Semester Grading pass Rate Report</h4>
            
                                                <div class="mt-3 text-center">
        
                                                    <div class="row pt-2">
                                                        <div class="col-4">
                                                            <p class="text-muted font-15 mb-1 text-truncate">Target</p>
                                                            <h4> $56,214</h4>
                                                        </div>
                                                        <div class="col-4">
                                                            <p class="text-muted font-15 mb-1 text-truncate">Last week</p>
                                                            <h4><i class="fe-arrow-up text-success"></i> $840</h4>
                                                        </div>
                                                        <div class="col-4">
                                                            <p class="text-muted font-15 mb-1 text-truncate">Last Month</p>
                                                            <h4><i class="fe-arrow-down text-danger"></i> $7,845</h4>
                                                        </div>
                                                    </div>
                                                    <div dir="ltr">
                                                        <canvas id="courseResultsChart" width="400" height="200"></canvas>
                                                    </div>
        
                                                </div>
                                            </div>
                                        </div> <!-- end card -->
                                    </div> <!-- end col -->
        
                                    <div class="col-xl-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="dropdown float-end">
                                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="mdi mdi-dots-horizontal"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item">Upload</a>
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                    </div>
                                                </div>
                                                <h4 class="header-title">Marketing Reports</h4>
                                                <p class="text-muted mb-0">1 Mar - 31 Mar Showing Data</p>
                                                
                                                <div dir="ltr">
                                                    <div id="marketing-reports" class="apex-charts" data-colors="#3bafda,#1abc9c,#f7b84b"></div>
                                                </div>
            
                                                <div class="row text-center">
                                                    <div class="col-6">
                                                        <p class="text-muted mb-1">This Month</p>
                                                        <h3 class="mt-0 font-20"><span class="align-middle">$120,254</span> <small class="badge badge-soft-success font-12">+15%</small></h3>
                                                    </div>
            
                                                    <div class="col-6">
                                                        <p class="text-muted mb-1">Last Month</p>
                                                        <h3 class="mt-0 font-20"><span class="align-middle">$98,741</span> <small class="badge badge-soft-danger font-12">-5%</small></h3>
                                                    </div>
                                                </div>
            
                                            </div>
                                        </div> <!-- end card -->
                                    </div> <!-- end col -->
        
                                </div>
                                <!-- end row -->
        
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-widgets">
                                                    <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                                    <a data-bs-toggle="collapse" href="#cardCollpase5" role="button" aria-expanded="false" aria-controls="cardCollpase"><i class="mdi mdi-minus"></i></a>
                                                    <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                                                </div>
                                                <h4 class="header-title mb-0">Basic Column Chart</h4>
        
                                                <div id="cardCollpase5" class="collapse pt-3 show" dir="ltr">
                                                    <div id="apex-column-1" class="apex-charts" data-colors="#3bafda,#1abc9c,#CED4DC"></div>
                                                </div> <!-- collapsed end -->
                                            </div> <!-- end card-body -->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->

                                    <div class="col-xl-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-widgets">
                                                    <a href="javascript:;" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                                    <a data-bs-toggle="collapse" href="#cardCollpase5" role="button" aria-expanded="false" aria-controls="cardCollpase5"><i class="mdi mdi-minus"></i></a>
                                                    <a href="javascript:;" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                                                </div>
                                                <h4 class="header-title mb-0">Top Selling Products</h4>
        
                                                <div id="cardCollpase5" class="collapse pt-3 show">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-centered mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>Product Name</th>
                                                                    <th>Price</th>
                                                                    <th>Quantity</th>
                                                                    <th>Amount</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>ASOS Ridley High Waist</td>
                                                                    <td>$79.49</td>
                                                                    <td>82</td>
                                                                    <td>$6,518.18</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Marco Lightweight Shirt</td>
                                                                    <td>$128.50</td>
                                                                    <td>37</td>
                                                                    <td>$4,754.50</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Half Sleeve Shirt</td>
                                                                    <td>$39.99</td>
                                                                    <td>64</td>
                                                                    <td>$2,559.36</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Lightweight Jacket</td>
                                                                    <td>$20.00</td>
                                                                    <td>184</td>
                                                                    <td>$3,680.00</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Marco Shoes</td>
                                                                    <td>$28.49</td>
                                                                    <td>69</td>
                                                                    <td>$1,965.81</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>ASOS Ridley High Waist</td>
                                                                    <td>$79.49</td>
                                                                    <td>82</td>
                                                                    <td>$6,518.18</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Half Sleeve Shirt</td>
                                                                    <td>$39.99</td>
                                                                    <td>64</td>
                                                                    <td>$2,559.36</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Lightweight Jacket</td>
                                                                    <td>$20.00</td>
                                                                    <td>184</td>
                                                                    <td>$3,680.00</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div> <!-- end table responsive-->
                                                </div> <!-- collapsed end -->
                                            </div> <!-- end card-body -->
                                        </div> <!-- end card-->
                                    </div> <!-- end col -->
                                </div>
                                <!-- end row -->
        
                                <div class="row">
                                    <div class="col-xl-8">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="dropdown float-end">
                                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="mdi mdi-dots-horizontal"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item">Upload</a>
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                    </div>
                                                </div>
                                                <h4 class="header-title mb-3">Revenue History</h4>
            
                                                <div class="table-responsive">
                                                    <table class="table table-borderless table-hover table-centered m-0">
            
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Marketplaces</th>
                                                                <th>Date</th>
                                                                <th>US Tax Hold</th>
                                                                <th>Payouts</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <h5 class="m-0 fw-normal">Themes Market</h5>
                                                                </td>
                
                                                                <td>
                                                                    Oct 15, 2025
                                                                </td>
                                                                
                                                                <td>
                                                                    $125.23
                                                                </td>
            
                                                                <td>
                                                                    $5848.68
                                                                </td>
                
                                                                <td>
                                                                    <span class="badge badge-soft-warning">Upcoming</span>
                                                                </td>
                
                                                                <td>
                                                                    <a href="javascript: void(0);" class="btn btn-xs btn-secondary"><i class="mdi mdi-pencil"></i></a>
                                                                </td>
                                                            </tr>
            
                                                            <tr>
                                                                <td>
                                                                    <h5 class="m-0 fw-normal">Freelance</h5>
                                                                </td>
                
                                                                <td>
                                                                    Oct 12, 2025
                                                                </td>
            
                                                                <td>
                                                                    $78.03
                                                                </td>
                
                                                                <td>
                                                                    $1247.25
                                                                </td>
                
                                                                <td>
                                                                    <span class="badge badge-soft-success">Paid</span>
                                                                </td>
                
                                                                <td>
                                                                    <a href="javascript: void(0);" class="btn btn-xs btn-secondary"><i class="mdi mdi-pencil"></i></a>
                                                                </td>
                                                            </tr>
            
                                                            <tr>
                                                                <td>
                                                                    <h5 class="m-0 fw-normal">Share Holding</h5>
                                                                </td>
                
                                                                <td>
                                                                    Oct 10, 2025
                                                                </td>
            
                                                                <td>
                                                                    $358.24
                                                                </td>
                
                                                                <td>
                                                                    $815.89
                                                                </td>
                
                                                                <td>
                                                                    <span class="badge badge-soft-success">Paid</span>
                                                                </td>
                
                                                                <td>
                                                                    <a href="javascript: void(0);" class="btn btn-xs btn-secondary"><i class="mdi mdi-pencil"></i></a>
                                                                </td>
                                                            </tr>
            
                                                            <tr>
                                                                <td>
                                                                    <h5 class="m-0 fw-normal">Wrap's Affiliates</h5>
                                                                </td>
                
                                                                <td>
                                                                    Oct 03, 2025
                                                                </td>
            
                                                                <td>
                                                                    $18.78
                                                                </td>
                
                                                                <td>
                                                                    $248.75
                                                                </td>
                
                                                                <td>
                                                                    <span class="badge badge-soft-danger">Overdue</span>
                                                                </td>
                
                                                                <td>
                                                                    <a href="javascript: void(0);" class="btn btn-xs btn-secondary"><i class="mdi mdi-pencil"></i></a>
                                                                </td>
                                                            </tr>
            
                                                            <tr>
                                                                <td>
                                                                    <h5 class="m-0 fw-normal">Marketing Revenue</h5>
                                                                </td>
                
                                                                <td>
                                                                    Sep 21, 2025
                                                                </td>
            
                                                                <td>
                                                                    $185.36
                                                                </td>
                
                                                                <td>
                                                                    $978.21
                                                                </td>
                
                                                                <td>
                                                                    <span class="badge badge-soft-warning">Upcoming</span>
                                                                </td>
                
                                                                <td>
                                                                    <a href="javascript: void(0);" class="btn btn-xs btn-secondary"><i class="mdi mdi-pencil"></i></a>
                                                                </td>
                                                            </tr>
            
                                                            <tr>
                                                                <td>
                                                                    <h5 class="m-0 fw-normal">Advertise Revenue</h5>
                                                                </td>
                
                                                                <td>
                                                                    Sep 15, 2025
                                                                </td>
            
                                                                <td>
                                                                    $29.56
                                                                </td>
                
                                                                <td>
                                                                    $358.10
                                                                </td>
                
                                                                <td>
                                                                    <span class="badge badge-soft-success">Paid</span>
                                                                </td>
                
                                                                <td>
                                                                    <a href="javascript: void(0);" class="btn btn-xs btn-secondary"><i class="mdi mdi-pencil"></i></a>
                                                                </td>
                                                            </tr>
            
                                                        </tbody>
                                                    </table>
                                                </div> <!-- end .table-responsive-->
                                            </div>
                                        </div> <!-- end card-->
                                    </div> <!-- end col -->
        
                                    <div class="col-xl-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="dropdown float-end">
                                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="mdi mdi-dots-horizontal"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item">Upload</a>
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                    </div>
                                                </div>
            
                                                <h4 class="header-title">Projections Vs Actuals</h4>
            
                                                <div class="mt-3 text-center" dir="ltr">
            
                                                    <div id="projections-actuals" class="apex-charts" data-colors="#3bafda,#1abc9c,#f7b84b,#f672a7"></div>
            
                                                    <div class="row mt-3">
                                                        <div class="col-4">
                                                            <p class="text-muted font-15 mb-1 text-truncate">Target</p>
                                                            <h4>$8712</h4>
                                                        </div>
                                                        <div class="col-4">
                                                            <p class="text-muted font-15 mb-1 text-truncate">Last week</p>
                                                            <h4><i class="fe-arrow-up text-success"></i> $523</h4>
                                                        </div>
                                                        <div class="col-4">
                                                            <p class="text-muted font-15 mb-1 text-truncate">Last Month</p>
                                                            <h4><i class="fe-arrow-down text-danger"></i> $965</h4>
                                                        </div>
                                                    </div>
            
                                                </div>
                                            </div>
                                        </div> <!-- end card-box -->
                                    </div> <!-- end col -->
                                </div>
                                <!-- end row -->
                                
                            </div> <!-- container -->
        
                        </div> <!-- content -->
        
                    </div>
                </div>
            </div>


        </div>

        {{-- @if (Auth::user()->roles()->first()->name == 'academic')
            <div class="row">
                <div class="col-md-6">
                    <div class="boxpane">
                        <div class="boxpane-content">
                            <div class="col-sm-6 mt-5">
                                <div id="mon-chart" style="height: 500px; width: 500px;"></div>
                            </div>

                        </div>
                    </div>


                </div>

                <div class="col-md-6">
                    <div class="boxpane">
                        <div class="boxpane-content">
                            <div class="col-sm-6 mt-5">
                                <div id="mon2-chart" style="height: 500px; width: 500px;"></div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        @endif

        @if (Auth::user()->roles()->first()->name == 'AdmissionOfficer')
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="boxpane-content">
                            <div class="col-sm-6 mt-5">
                                <div id="mon2-chart" style="height: 500px; width: 1000px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @endif

        @if (Auth::user()->roles()->first()->name == 'SuperAdmin')
            <div class="row">
                <div class="col-sm-6">
                    <a style="background-color: #5596CF; border-top: 4px solid #035B29; border-radius: 4px; margin-bottom: 10px;"
                        class="white quick-button medium" href="{{ route('roles.index') }}">
                        <i class="fa"><b>{{ count($roles) }}</b></i>
                        <p><strong>Roles</strong></p>
                    </a>
                </div>

                <div class="col-sm-6">
                    <div style="background-color: #5596CF; border-top: 4px solid #035B29; border-radius: 4px; margin-bottom: 10px;"
                        class="white quick-button medium">
                        <i class="fa"><b>{{ $academicYear ?? '' }}</b></i>
                        <p><strong>Active Academic Year</strong></p>
                    </div>
                </div>
            </div>
        @endif --}}

    </div>
    </div>

            

            <!-- Vendor js -->
            <script src="{{ asset('loginAssets/js/vendor.min.js') }}"></script>

            <!-- KNOB JS -->
            <script src="{{ asset('loginAssets/libs/jquery-knob/jquery.knob.min.js') }}"></script>
            <!-- Apex js-->
            <script src="{{ asset('loginAssets/libs/apexcharts/apexcharts.min.js') }}"></script>
    
            <!-- Dashboard init-->
            <script src="{{ asset('loginAssets/js/pages/dashboard-sales.init.js') }}"></script>
    
                    <!-- Third Party js-->

        <!-- init js -->
        <script src="{{ asset('loginAssets/js/pages/apexcharts.init.js') }}"></script>
            <!-- App js -->
            <script src="{{ asset('loginAssets/js/app.min.js') }}"></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>

        const semesterResults = @json($semesterResults);

        const totalMalePass = semesterResults.map(result => result.total_male_pass);
        const totalMaleFail = semesterResults.map(result => result.total_male_fail);
        const totalFemalePass = semesterResults.map(result => result.total_female_pass);
        const totalFemaleFail = semesterResults.map(result => result.total_female_fail);
        const labels1 = semesterResults.map(result => `Semester ${result.semester_id}`);

        const ctx1 = document.getElementById('resultsChart1').getContext('2d');
        const resultsChart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: labels1,
                datasets: [
                    {
                        label: 'Total Male Pass',
                        data: totalMalePass,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    },
                    {
                        label: 'Total Male Fail',
                        data: totalMaleFail,
                        backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    },
                    {
                        label: 'Total Female Pass',
                        data: totalFemalePass,
                        backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    },
                    {
                        label: 'Total Female Fail',
                        data: totalFemaleFail,
                        backgroundColor: 'rgba(153, 102, 255, 0.5)',
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const totalAMale = @json($total_A_male);
        const totalAFemale = @json($total_A_female);
        const totalBMale = @json($total_B_male);
        const totalBFemale = @json($total_B_female);
        const totalCMale = @json($total_C_male);
        const totalCFemale = @json($total_C_female);
        const totalDMale = @json($total_D_male);
        const totalDFemale = @json($total_D_female);
        const totalFMale = @json($total_F_male);
        const totalFFemale = @json($total_F_female);

        // Labels for each grade
        const labels = ['Grade A','Grade B',  'Grade C', 'Grade D','Grade F'];

        // Prepare data for each grade
        const gradeAMale = totalAMale.reduce((acc, val) => acc + val, 0);
        const gradeAFemale = totalAFemale.reduce((acc, val) => acc + val, 0);
        const gradeBMale = totalBMale.reduce((acc, val) => acc + val, 0);
        const gradeBFemale = totalBFemale.reduce((acc, val) => acc + val, 0);
        const gradeCMale = totalCMale.reduce((acc, val) => acc + val, 0);
        const gradeCFemale = totalCFemale.reduce((acc, val) => acc + val, 0);
        const gradeDMale = totalDMale.reduce((acc, val) => acc + val, 0);
        const gradeDFemale = totalDFemale.reduce((acc, val) => acc + val, 0);
        const gradeFMale = totalFMale.reduce((acc, val) => acc + val, 0);
        const gradeFFemale = totalFFemale.reduce((acc, val) => acc + val, 0);

        const ctx2 = document.getElementById('courseResultsChart').getContext('2d');
        const resultsChart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Total A Male',
                        data: [gradeAMale],
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    },
                    {
                        label: 'Total A Female',
                        data: [gradeAFemale],
                        backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    },
                    {
                        label: 'Total B Male',
                        data: [gradeBMale],
                        backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    },
                    {
                        label: 'Total B Female',
                        data: [gradeBFemale],
                        backgroundColor: 'rgba(153, 102, 255, 0.5)',
                    },
                    {
                        label: 'Total C Male',
                        data: [gradeCMale],
                        backgroundColor: 'rgba(255, 206, 86, 0.5)',
                    },
                    {
                        label: 'Total C Female',
                        data: [gradeCFemale],
                        backgroundColor: 'rgba(255, 159, 64, 0.5)',
                    },
                    {
                        label: 'Total D Male',
                        data: [gradeDMale],
                        backgroundColor: 'rgba(201, 203, 207, 0.5)',
                    },
                    {
                        label: 'Total D Female',
                        data: [gradeDFemale],
                        backgroundColor: 'rgba(0, 255, 0, 0.5)',
                    },
                    {
                        label: 'Total F Male',
                        data: [gradeFMale],
                        backgroundColor: 'rgba(0, 0, 255, 0.5)',
                    },
                    {
                        label: 'Total F Female',
                        data: [gradeFFemale],
                        backgroundColor: 'rgba(255, 0, 0, 0.5)',
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    },
                    x: {
                        stacked: true // Stack bars on the x-axis
                    }
                }
            }
        });
    </script>
@endsection
