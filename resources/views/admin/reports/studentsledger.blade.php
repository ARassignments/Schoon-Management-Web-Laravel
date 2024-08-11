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
                                    <h5 class="header-title mb-0 me-auto text-white">Students Ledger Reports</h5>
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
@endsection
