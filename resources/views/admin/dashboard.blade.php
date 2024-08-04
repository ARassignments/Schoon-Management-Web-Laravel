@extends('admin.master')
@section('content')
<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row navy-blue-background rounded mt-4">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title text-white">Welcome!</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row mb-5 main-dashboard-card">
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card widget-flat text-bg-white shadow">
                        <div class="card-body dashboard-card">
                            <!-- <div class="float-end">
                        <i class="ri-eye-line widget-icon"></i>
                    </div> -->
                            <h6 class="text-uppercase mt-0 our-color-2" title="Customers"><b>Total Students</b></h6>
                            <hr>
                            <h2 class="my-2 our-color">{{$addC}}</h2>
                            <p class="mb-0">
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card widget-flat text-bg-white shadow">
                        <div class="card-body dashboard-card">
                            <!-- <div class="float-end">
                        <i class="ri-wallet-2-line widget-icon"></i>
                    </div> -->
                            <h6 class="text-uppercase mt-0 our-color-2" title="Customers"><b> Total Classes</b></h6>
                            <hr>
                            <h2 class="my-2 our-color">{{$class}}</h2>
                            <p class="mb-0">
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card widget-flat text-bg-white shadow">
                        <div class="card-body dashboard-card">
                            <!-- <div class="float-end">
                        <i class="ri-shopping-basket-line widget-icon"></i>
                    </div> -->
                            <h2 class="my-2 our-color">753</h2>
                            <hr>
                            <p class="mb-0">
                                <span class="text-nowrap">Monthly Recieved Fess</span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card widget-flat text-bg-white shadow">
                        <div class="card-body dashboard-card">
                            <!-- <div class="float-end">
                        <i class="ri-group-2-line widget-icon"></i>
                    </div> -->
                            <h2 class="my-2 our-color">63,154</h2>
                            <hr>
                            <p class="mb-0">
                                <span class="text-nowrap">Today Recieved Fees</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>












            <div class="row">
                <div class="col-xl-12 ">
                    <!-- Todo-->
                    <div class="">
                        <div class="card-body p-0">
                            <div class="card-body-container p-3 d-flex align-items-center justify-content-end shadow rounded mt-4">
                                <div class="card-widgets me-3">
                                    <a data-bs-toggle="collapse" href="#yearly-sales-collapse" role="button" aria-expanded="false" aria-controls="yearly-sales-collapse"><i class="ri-subtract-line text-white"></i></a>
                                </div>
                                <h5 class="header-title mb-0 me-auto text-white">Admission Form</h5>

                                <!-- Searchbar Start -->
                                <!-- <div class="app-search ms-3">
                                        <form>
                                            <div class="input-group">
                                                <input type="search" class="form-control" placeholder="Search...">
                                                <span class="ri-search-line search-icon text-muted"></span>
                                            </div>
                                        </form>
                                    </div> -->
                                <form class="app-search" action="" method="GET">
                                    <input class="search-input" name="search" placeholder="Search..." type="search" value="{{ $search }}">

                                </form>
                                <!-- Searchbar End -->
                            </div>
                            <div class="feeallcard feeallshadow">
                                <div id="yearly-sales-collapse" class="collapse show mt-4">
                                    <div class="table-responsive">
                                        <table class="table table-nowrap table-hover mb-0 text-center" id="studentTable">
                                            <thead>
                                                <tr class="text-center"> 
                                                    <th>GR Number</th>
                                                    <th>Student Name</th>
                                                    <th>Father Name</th>
                                                    <th>Mobile Number</th>
                                                    <th>Current Class</th>
                                                    <th>Section</th>
                                                    <th>Fees</th>
                                                    <th>Date Of Admission</th>
                                                    <th>Address</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($add as $addmission)
                                                <tr class="student-row 
                                                   @if($addmission->Status == 'Current') status-current 
                                                   @elseif($addmission->Status == 'Left Out') status-left-out 
                                                   @elseif($addmission->Status == 'Pass Out') status-pass-out 
                                                   @endif" data-id="{{ $addmission->id }}" data-status="{{ $addmission->status }}">
                                                    <td>{{ $addmission->gr_number }}</td>
                                                    <td>{{ $addmission->student_name }}</td>
                                                    <td>{{ $addmission->father_name }}</td>
                                                    <td>{{ $addmission->mobile_number }}</td>
                                                    <td>{{ $addmission->current_class }}</td>
                                                    <td>{{ $addmission->section }}</td>
                                                    <td>{{ $addmission->fees }}</td>
                                                    <td>{{ $addmission->date_of_addmission }}</td>
                                                    <td>{{ $addmission->address }}</td>
                                                    <td class="fw-bold fs-4">{{ ucfirst($addmission->Status) }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <style>
                                       

                                        .table {
                                            width: 100%;
                                        }

                                        .table th,
                                        .table td {
                                            padding: 0.75rem;
                                            /* Adjust padding as needed */
                                            text-align: left;
                                            overflow: hidden;
                                            /* Prevent content from overflowing */
                                        }

                                        .status-current {
                                            background-color: #d4edda;
                                        }

                                        .status-left-out {
                                            background-color: #f8d7da;
                                        }

                                        .status-pass-out {
                                            background-color: #d1ecf1;
                                        }

                                        .fw-bold {
                                            font-weight: bold;
                                        }

                                        .fs-4 {
                                            font-size: 1.5rem;
                                            /* Adjust font size as needed */
                                        }
                                    </style>

                                </div>
                            </div>

                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div>










            {{-- <div class="row">
                    <div class="col-xl-12">
                        <!-- Todo-->
                        <div class="">
                            <div class="card-body p-0">
                                <div
                                    class="card-body-container p-3 d-flex align-items-center justify-content-end shadow rounded">
                                    <div class="card-widgets me-3">
                                        <a href="javascript:;" data-bs-toggle="reload"><i
                                                class="ri-refresh-line text-white"></i></a>
                                        <a data-bs-toggle="collapse" href="#yearly-sales-collapse" role="button"
                                            aria-expanded="false" aria-controls="yearly-sales-collapse"><i
                                                class="ri-subtract-line text-white"></i></a>
                                    </div>
                                    <h5 class="header-title mb-0 me-auto text-white">Projects</h5>

                                    <!-- Searchbar Start -->
                                    <!-- <div class="app-search ms-3">
                                        <form>
                                            <div class="input-group">
                                                <input type="search" class="form-control" placeholder="Search...">
                                                <span class="ri-search-line search-icon text-muted"></span>
                                            </div>
                                        </form>
                                    </div> -->
                                    <input class="search-input" name="text" placeholder="Search..." type="search">
                                    <!-- Searchbar End -->
                                </div>
                                <div id="yearly-sales-collapse" class="collapse show mt-5">
                                 
                                    <div class="table-responsive">
                                        <table class="table table-nowrap table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Project Name</th>
                                                    <th>Start Date</th>
                                                    <th>Due Date</th>
                                                    <th>Status</th>
                                                    <th>Assign</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                <tr>

                                                    <td>7</td>
                                                    <td>Velonic Admin v1.3</td>
                                                    <td>01/01/2015</td>
                                                    <td>31/05/2015</td>
                                                    <td><span class="badge bg-danger-subtle text-danger">Cool</span></td>
                                                    <td>Techzaa Studio</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div> --}}
            <!-- end row -->

        </div>
        <!-- container -->

    </div>
    <!-- content -->


    @endsection