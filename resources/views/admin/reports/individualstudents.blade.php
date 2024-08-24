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

                                    <h5 class="header-title mb-0 me-auto text-white">Indivial Students Reports</h5>

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
                                                        <th>Student Age</th>
                                                        <th>Mobile Number</th>
                                                        <th>Class</th>
                                                        <th>Current Class</th>
                                                        <th>Section</th>
                                                        <th>Last Institute</th>
                                                        <th>Fees</th>
                                                        <th>Date Of Addmission</th>
                                                        <th>Date Of Birth</th>
                                                        <th>Religion</th>
                                                        <th>Address</th>
                                                        <th>Status</th>
                                                        <th>Created Date</th>
                                                        <th>Updated Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @php
                                                     $i=1;   
                                                    @endphp
                                                    @foreach ($add as $addmission)
                                                        <tr class="text-center">
                                                            <td>{{ $i++}}</td>
                                                            <td>{{ $addmission->gr_number }}</td>
                                                            <td>{{ $addmission->student_name }}</td>
                                                            <td>{{ $addmission->father_name }}</td>
                                                            <td>{{ $addmission->student_age }}</td>
                                                            <td>{{ $addmission->mobile_number }}</td>
                                                            <td>{{ $addmission->class }}</td>
                                                            <td>{{ $addmission->current_class }}</td>
                                                            <td>{{ $addmission->section }}</td>
                                                            <td>{{ $addmission->last_institute }}</td>
                                                            <td>{{ $addmission->fees }}</td>
                                                            <td>{{ $addmission->date_of_addmission }}</td>
                                                            <td>{{ $addmission->date_of_birth }}</td>
                                                            <td>{{ $addmission->religion }}</td>
                                                            <td>{{ $addmission->address }}</td>
                                                            <td>{{ $addmission->Status }}</td>
                                                            <td>{{ $addmission->created_at }}</td>
                                                            <td>{{ $addmission->updated_at }}</td>
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
            var uniqueClasses = [...new Set(table.column(7).data().toArray())];
            uniqueClasses.forEach(function(className) {
                $('#classFilter').append(new Option(className, className));
            });

            // Filter function for class
            $('#classFilter').on('change', function() {
                table.column(7).search(this.value).draw();
            });
            
            // Populate the Section filter dropdown
            var uniqueSections = [...new Set(table.column(8).data().toArray())];
            uniqueSections.forEach(function(sectionName) {
                $('#sectionFilter').append(new Option(sectionName, sectionName));
            });

            // Filter function for section
            $('#sectionFilter').on('change', function() {
                table.column(8).search(this.value).draw();
            });

        });
    </script>
@endsection