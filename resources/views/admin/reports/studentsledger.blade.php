@extends('admin.master')
@section('content')
<head>
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.3/css/dataTables.dataTables.min.css">
</head>
    <div class="content-page mt-4">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 ">
                        <!-- Todo-->
                        <div class="">
                            <div class="card-body p-0">
                                <div
                                    class="card-body-container p-3 d-flex align-items-center justify-content-end shadow rounded mt-4">
                                    <h5 class="header-title mb-0 me-auto text-white">Students Ledger Reports</h5>
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
                                            <table class="table table-nowrap table-hover mb-0" id="myTable">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>Id</th>
                                                        <th>GR Number</th>
                                                        <th>Student Name</th>
                                                        <th>Father Name</th>
                                                        <th>Class</th>
                                                        <th>Section</th>
                                                        <th>Fees</th>
                                                        <th>Previous Dues</th>
                                                        <th>Actions</th>
                                                      
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @php
                                                        $i = 1;
                                                    @endphp
                                                    @foreach ($add as $addmission)
                                                        <tr class="text-center">
                                                            <td>{{ $i++ }}</td>
                                                            <td>{{ $addmission->gr_number }}</td>
                                                            <td>{{ $addmission->students_add->student_name }}</td>
                                                            <td>{{ $addmission->students_add->father_name }}</td>
                                                            <td>{{ $addmission->students_add->class }}</td>
                                                            <td>{{ $addmission->students_add->section }}</td>
                                                            <td>{{ $addmission->students_add->fees }}</td>
                                                            <td>{{ $addmission->previous_dues }}</td>
                                                            <td>
                                                                <a href="{{url('studentsLedgerReportView',1)}}" class="btn btn-primary btn-sm">View</a>
                                                            </td>
                                                           
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="//cdn.datatables.net/2.1.3/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = new DataTable('#myTable');

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
