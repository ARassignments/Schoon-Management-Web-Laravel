@extends('admin.master')
@section('content')
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

                                    <h5 class="header-title mb-0 me-auto text-white">Receipt Reports</h5>

                                </div>
                                <div class="feeallcard feeallshadow">
                                    <div id="yearly-sales-collapse" class="collapse show mt-4">

                                        <div class="table-responsive">
                                            <table class="table table-nowrap table-hover mb-0">
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
@endsection