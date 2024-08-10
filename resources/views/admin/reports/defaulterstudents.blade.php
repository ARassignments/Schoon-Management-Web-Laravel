@extends('admin.master')
@section('content')
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <style>
        /* Chrome, Safari, Edge, Opera */
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type="number"] {
            -moz-appearance: textfield;
        }

        #scanner-container {
            position: relative;
            width: 100%;
            max-width: 600px;
            margin: auto;
        }

        #interactive {
            width: 100%;
            height: auto;
            display: none;
        }

        #interactive video {
            border-radius: 20px;
        }

        #interactive canvas {
            display: none;
        }
    </style>


    <div class="content-page mt-4">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">

                <div id="scanner-container">
                    <div id="interactive" class="viewport"></div>
                </div>
                <p id="result"></p>

                <div class="row">
                    <div class="col-xl-12 ">
                        <!-- Todo-->
                        <div class="">
                            <div class="card-body p-0">
                                <div
                                    class="card-body-container p-3 d-flex align-items-center justify-content-end shadow rounded mt-4">

                                    <h5 class="header-title mb-0 me-auto text-white">Defaulters Students Reports</h5>

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
                                                            <td>{{ $addmission->students_add->student_name }}</td>
                                                            <td>{{ $addmission->students_add->father_name }}</td>
                                                            <td>{{ $addmission->students_add->student_age }}</td>
                                                            <td>{{ $addmission->students_add->mobile_number }}</td>
                                                            <td>{{ $addmission->students_add->class }}</td>
                                                            <td>{{ $addmission->students_add->current_class }}</td>
                                                            <td>{{ $addmission->students_add->section }}</td>
                                                            <td>{{ $addmission->students_add->last_institute }}</td>
                                                            <td>{{ $addmission->students_add->fees }}</td>
                                                            <td>{{ $addmission->students_add->date_of_addmission }}</td>
                                                            <td>{{ $addmission->students_add->date_of_birth }}</td>
                                                            <td>{{ $addmission->students_add->religion }}</td>
                                                            <td>{{ $addmission->students_add->address }}</td>
                                                        </tr>
                                                    @endforeach


                                                    <style>
                                                        /* Modal Styles */
                                                        .modal-header {
                                                            background-color: #0C2B4B;
                                                            border-bottom: none;
                                                        }

                                                        .modal-body {
                                                            background-color: #0C2B4B;
                                                            border-top: 3px solid #0097b2;
                                                        }

                                                        .modal-footer {
                                                            background-color: #0C2B4B;
                                                            border-top: none;
                                                        }

                                                        /* Dropdown Styles */
                                                        .form-select {
                                                            font-size: 1.1rem;
                                                            color: #092139;
                                                            transition: background-color 0.3s, color 0.3s;
                                                        }

                                                        .form-select:hover,
                                                        .form-select:focus {
                                                            background-color: #0097b2;
                                                            color: #ffffff;
                                                        }

                                                        .form-select option {
                                                            background-color: #ffffff;
                                                            color: #092139;
                                                        }

                                                        .form-select option:hover {
                                                            background-color: red;
                                                            color: #ffffff;
                                                        }
                                                    </style>



                                        </div>
                                    </div>
                                </div>
                            </div>
                            </td>
                            </tr>

                            </tbody>


                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end card-->
    </div> <!-- end col-->
    </div>
    <!-- end row -->

    </div>
    <!-- container -->

    </div>
@endsection
