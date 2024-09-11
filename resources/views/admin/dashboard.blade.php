@extends('admin.master')
@section('content')

    <head>
        <link rel="stylesheet" href="//cdn.datatables.net/2.1.3/css/dataTables.dataTables.min.css">
    </head>
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
                                <h2 class="my-2 our-color">{{ $addC }}</h2>
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
                                <h2 class="my-2 our-color">{{ $class }}</h2>
                                <p class="mb-0">
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card widget-flat text-bg-white shadow">
                            <div class="card-body dashboard-card">
                                <h6 class="text-uppercase mt-0 our-color-2" title="Customers"><b>Today Fee Receipt</b></h6>
                                <hr>
                                <h2 class="my-2 our-color">{{ $feeReceiptsCount }}</h2>
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
                                <h6 class="text-uppercase mt-0 our-color-2" title="Customers"><b>Monthly Fee Receipt</b>
                                </h6>
                                <hr>
                                <h2 class="my-2 our-color">{{ $feeReceiptsCountMonthly }}</h2>
                                <p class="mb-0">
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
                                <div
                                    class="card-body-container p-3 d-flex align-items-center justify-content-end shadow rounded mt-4">
                                    <div class="card-widgets me-3">
                                        <a data-bs-toggle="collapse" href="#yearly-sales-collapse" role="button"
                                            aria-expanded="false" aria-controls="yearly-sales-collapse"><i
                                                class="ri-subtract-line text-white"></i></a>
                                    </div>
                                    <h5 class="header-title mb-0 me-auto text-white">Admission Form</h5>

                                    <!-- Searchbar End -->
                                </div>



                                <div class="feeallcard feeallshadow">
                                    <div id="yearly-sales-collapse" class="collapse show mt-4">
                                        <div class="d-flex flex-wrap pt-3 px-2">
                                            <div class="d-flex align-items-center col-md-6">
                                                <label for="classFilter" class="col-3">Class By:</label>
                                                <select id="classFilter" class="form-select col-9">
                                                    <option value="">All</option>
                                                    {{-- @foreach ($classes as $class)
                                                        <option value="{{ $class->class_name }}">{{ $class->class_name }}
                                                        </option>
                                                    @endforeach --}}
                                                </select>
                                            </div>
                                            <div class="d-flex align-items-center col-md-6">
                                                <label for="sectionFilter" class="col-3">Section By:</label>
                                                <select id="sectionFilter" class="form-select col-9">
                                                    <option value="">All</option>
                                                    {{-- @foreach ($classes as $class)
                                                        <option value="{{ $class->section_name }}">
                                                            {{ $class->section_name }}</option>
                                                    @endforeach --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-nowrap table-hover mb-0 text-center" id="myTable">
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
                                                   @if ($addmission->Status == 'Current') status-current 
                                                   @elseif($addmission->Status == 'Left Out') status-left-out 
                                                   @elseif($addmission->Status == 'Pass Out') status-pass-out @endif"
                                                            data-id="{{ $addmission->id }}"
                                                            data-status="{{ $addmission->status }}">
                                                            <td>{{ $addmission->gr_number }}</td>
                                                            <td>{{ $addmission->student_name }}</td>
                                                            <td>{{ $addmission->father_name }}</td>
                                                            <td>{{ $addmission->mobile_number }}</td>
                                                            <td>{{ $addmission->current_class }}</td>
                                                            <td>{{ $addmission->section }}</td>
                                                            <td>{{ $addmission->fees }}</td>
                                                            <td>{{ $addmission->date_of_addmission }}</td>
                                                            <td>{{ $addmission->address }}</td>
                                                            <td class="fw-bold fs-4">{{ ucfirst($addmission->Status) }}
                                                            </td>
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
            </div>
        </div>
        <!-- content -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="//cdn.datatables.net/2.1.3/js/dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                var table = new DataTable('#myTable', {
                    lengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "All"]
                    ],
                    pageLength: 10,
                    order: [
                        [0, 'desc']
                    ]
                });

                // Populate the Class filter dropdown
                var uniqueClasses = [...new Set(table.column(4).data().toArray())];
                uniqueClasses.forEach(function(className) {
                    $('#classFilter').append(new Option(className, className));
                });

                // Filter function for class
                $('#classFilter').on('change', function() {
                    table.column(4).search(this.value).draw();
                });

                // Populate the Section filter dropdown
                var uniqueSections = [...new Set(table.column(5).data().toArray())];
                uniqueSections.forEach(function(sectionName) {
                    $('#sectionFilter').append(new Option(sectionName, sectionName));
                });

                // Filter function for section
                $('#sectionFilter').on('change', function() {
                    table.column(5).search(this.value).draw();
                });

            });
        </script>
    @endsection
