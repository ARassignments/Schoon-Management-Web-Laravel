@extends('admin.master')
@section('content')
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <head>
        <link rel="stylesheet" href="//cdn.datatables.net/2.1.3/css/dataTables.dataTables.min.css">
        <!-- Buttons extension CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
        <style>
            .page-break {
                page-break-after: always;
            }

            .voucher-layout {
                page-break-after: always;
            }

            .voucher-text {
                margin: 0;
                font-weight: 100;
                font-size: 12px;
                color: black;
                font-family: sans-serif;
            }
        </style>
    </head>

    <div class="content-page mt-4">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                <div class="d-flex gap-3">
                    <button class="addbtn-container rounded row mb-3 "> <a href="{{ url('classfeesgenerate') }}"
                            class="add-btn2 "><span class="spn2">Generate Class Voucher</span></a>
                    </button>
                    <button class="addbtn-container rounded row mb-3 " id="generatePDF"> <a href="#"
                            class="add-btn2 "><span class="spn2">Generate PDF</span></a>
                    </button>
                </div>

                <div class="row">
                    <div class="col-xl-12 ">
                        <!-- Todo-->
                        <div class="">
                            <div class="card-body p-0">
                                <div
                                    class="card-body-container p-3 d-flex align-items-center justify-content-end shadow rounded mt-4">
                                    <h5 class="header-title mb-0 me-auto text-white">Class Fees Voucher</h5>
                                </div>
                                @if (session('success'))
                                    <div id="successMessage" class="alert alert-success fade show mt-3 text-center"
                                        role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (session('successdelete'))
                                    <div id="successMessage" class="alert alert-danger fade show mt-3 text-center"
                                        role="alert">
                                        {{ session('successdelete') }}
                                    </div>
                                @endif
                                {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        var successMessage = document.getElementById('successMessage');
                                        if (successMessage) {
                                            setTimeout(function() {
                                                var bsAlert = new bootstrap.Alert(successMessage);
                                                bsAlert.close(); // This will trigger the fade-out animation
                                            }, 3000); // Display duration
                                        }
                                    });
                                </script>
                                <div class="feeallcard feeallshadow">
                                    <div id="yearly-sales-collapse" class="collapse show mt-4">

                                        <div class="table-responsive extras">
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
                                                <div class="d-flex align-items-center col-md-12 mt-2">
                                                    <label for="filterSelector" class="col-2">Filter By:</label>
                                                    <select id="filterSelector" class="form-select col-10">
                                                        <option value="" selected disabled>--Select Filter--</option>
                                                        <option value="all">All Data</option>
                                                        <option value="today">Today</option>
                                                        <option value="monthly">This Month</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <table class="table table-nowrap table-hover mb-0" id="myTable">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>Id</th>
                                                        <th>GR Number</th>
                                                        <th>Month Year</th>
                                                        <th>Transaction Date</th>
                                                        <th>Issued Date</th>
                                                        <th>Due Date</th>
                                                        <th>Session</th>
                                                        <th>Admission</th>
                                                        <th>Tution</th>
                                                        <th>Annual</th>
                                                        <th>Exam Fee</th>
                                                        <th>Lab Charges</th>
                                                        <th>Late fee</th>
                                                        <th>Pre Dues</th>
                                                        <th>Id Card</th>
                                                        <th>Board Fee</th>
                                                        <th>Stationary</th>
                                                        <th>Total</th>
                                                        <th>Class</th>
                                                        <th>Section</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $i = 1;
                                                    @endphp
                                                    @foreach ($voucher as $vouc)
                                                        <tr class="text-center">
                                                            {{-- <td>{{ $i++ }}</td> --}}
                                                            <td>{{ $vouc->id }}</td>
                                                            <td>{{ $vouc->gr_number }}</td>
                                                            <td>{{ $vouc->month_year }}</td>
                                                            <td>{{ $vouc->transaction_date }}</td>
                                                            <td>{{ $vouc->issued_date }}</td>
                                                            <td>{{ $vouc->due_date }}</td>
                                                            <td>{{ $vouc->session }}</td>
                                                            <td>{{ $vouc->admission }}</td>
                                                            <td>{{ $vouc->tution }}</td>
                                                            <td>{{ $vouc->annual }}</td>
                                                            <td>{{ $vouc->exam_fee }}</td>
                                                            <td>{{ $vouc->lab_charges }}</td>
                                                            <td>{{ $vouc->late_fee }}</td>
                                                            <td>{{ $vouc->pre_dues }}</td>
                                                            <td>{{ $vouc->id_card }}</td>
                                                            <td>{{ $vouc->board_fee }}</td>
                                                            <td>{{ $vouc->stationary }}</td>
                                                            <td>{{ $vouc->total }}</td>
                                                            <td>{{ $vouc->class }}</td>
                                                            <td>{{ $vouc->section }}</td>
                                                            <td>
                                                                <a href="{{ url('voucherform', $vouc->id) }}"
                                                                    class="btn btn-sm our-color-1 rounded-2 shadow magicButton">View</a>
                                                                <a href="{{ url('voucherform', $vouc->id) }}"
                                                                    class="btn btn-sm our-color-1 rounded-2 shadow magicButton2">Edit</a>
                                                                <a href="#"
                                                                    class="btn btn-sm btn-danger rounded-2 shadow magicButton3"
                                                                    data-id="{{ $vouc->id }}">Delete</a>
                                                            </td>

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

                <div class="my-3 page pb-3 mb-5" size="A4" id="printableArea"
                    style="   width: 20cm;
                    overflow: hidden; background: white;
                    display: block;
                    position: relative;">
                    {{-- height: 29.7cm; --}}

                    <svg id="barcode" class="d-none"></svg>
                    <!-- ===============================================================Voucher-1-Start=============================================================== -->

                    <div class="p-2">
                        <div style="text-align: center;">
                            <img src="" id="barcodeImg1" height="60px" width="130px">
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="d-flex justify-content-start">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">GRNo.</p>
                                        <span
                                            style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;"
                                            data-voucher="gr_number"></span>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Student Name</p>
                                        <span
                                            style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;"
                                            data-voucher="student_name"></span>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Father Name</p>
                                        <span
                                            style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;"
                                            data-voucher="father_name"></span>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Class</p>
                                        <span
                                            style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;"
                                            data-voucher="class"></span>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Section</p>
                                        <span
                                            style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;"
                                            data-voucher="section"></span>
                                    </div>
                                </div>



                                <!-- <div class="row second"> -->


                                <div class="col-md-4">
                                    <div class="d-flex justify-content-between">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Transaction</p>
                                        <span
                                            style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;"
                                            class="me-2" data-voucher="transaction_date"></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Issued</p>
                                        <span
                                            style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;"
                                            class="me-2" data-voucher="issued_date"></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Due On</p>
                                        <span
                                            style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;"
                                            class="me-2" data-voucher="due_date"></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Session</p>
                                        <span
                                            style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;"
                                            class="me-2" data-voucher="session"></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Month</p>
                                        <span
                                            style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;"
                                            class="me-2" data-voucher="month_year"></span>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>


                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table border-dark" border="1">
                                    <thead>
                                        <tr style="font-size: 12px; text-align: center;">
                                            <th>Admission</th>
                                            <th>Tuition</th>
                                            <th>Annual</th>
                                            <th>Exam Fee</th>
                                            <th>Lab Charges</th>
                                            <th>Late Fee</th>
                                            <th>PRE DUES</th>
                                            <th>ID CARD</th>
                                            <th>BOARD FEE</th>
                                            <th>STATIONARY</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr style="text-align: center" class="fs-6">
                                            <td data-voucher="admission"></td>
                                            <td data-voucher="tution"></td>
                                            <td data-voucher="annual"></td>
                                            <td data-voucher="exam_fee"></td>
                                            <td data-voucher="lab_charges"></td>
                                            <td data-voucher="late_fee"></td>
                                            <td data-voucher="pre_dues"></td>
                                            <td data-voucher="id_card"></td>
                                            <td data-voucher="board_fee"></td>
                                            <td data-voucher="stationary"></td>
                                            <td data-voucher="total"></td>
                                        </tr>
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="due-date">
                                    <p
                                        style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: rgb(255, 0, 0);
                                        font-family: sans-serif;">
                                        100/-Rs will be charged after due date.</p>
                                </div>
                                <p style="margin: 0;
                                font-weight: 100;
                                font-size: 12px;
                                color: rgb(129, 129, 129);
                                font-family: sans-serif;"
                                    data-voucher="note_01"></p>
                                <p style="margin: 0;
                                font-weight: 100;
                                font-size: 12px;
                                color: rgb(129, 129, 129);
                                font-family: sans-serif;"
                                    data-voucher="note_02"></p>
                            </div>
                            <div class="col-md-6">

                                <div class="d-flex justify-content-between">
                                    <p style="margin: 0;
                                font-weight: 100;
                                font-size: 12px;
                                color: black;
                                font-family: sans-serif;"
                                        class="col-4">Previous Dues</p>
                                    <span
                                        style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                        class="me-2" data-voucher="previous_dues"></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p style="margin: 0;
                                font-weight: 100;
                                font-size: 12px;
                                color: black;
                                font-family: sans-serif;"
                                        class="col-8">Total Payable (Within due Date)</p>
                                    <span
                                        style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                        class="me-2" data-voucher="total_payable_within_due_date"></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p style="margin: 0;
                                font-weight: 100;
                                font-size: 12px;
                                color: black;
                                font-family: sans-serif;"
                                        class="col-8">Total Payable (After due Date)</p>
                                    <span
                                        style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                        class="me-2" data-voucher="total_payable_after_due_date"></span>
                                </div>

                            </div>


                        </div>
                    </div>

                    <!-- ===============================================================Voucher-1-End=============================================================== -->

                    <!-- ===============================================================Voucher-2-Start=============================================================== -->

                    <div class="p-2">
                        <div style="text-align: center;">
                            <img src="" id="barcodeImg2" height="60px" width="130px">
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="d-flex justify-content-start">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">GRNo.</p>
                                        <span
                                            style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;"
                                            data-voucher2="gr_number"></span>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Student Name</p>
                                        <span
                                            style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;"
                                            data-voucher2="student_name"></span>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Father Name</p>
                                        <span
                                            style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;"
                                            data-voucher2="father_name"></span>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Class</p>
                                        <span
                                            style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;"
                                            data-voucher2="class"></span>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Section</p>
                                        <span
                                            style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;"
                                            data-voucher2="section"></span>
                                    </div>
                                </div>



                                <!-- <div class="row second"> -->


                                <div class="col-md-4">
                                    <div class="d-flex justify-content-between">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Transaction</p>
                                        <span
                                            style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;"
                                            class="me-2" data-voucher2="transaction_date"></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Issued</p>
                                        <span
                                            style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;"
                                            class="me-2" data-voucher2="issued_date"></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Due On</p>
                                        <span
                                            style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;"
                                            class="me-2" data-voucher2="due_date"></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Session</p>
                                        <span
                                            style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;"
                                            class="me-2" data-voucher2="session"></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Month</p>
                                        <span
                                            style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;"
                                            class="me-2" data-voucher2="month_year"></span>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>


                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table border-dark" border="1">
                                    <thead>
                                        <tr style="font-size: 12px; text-align: center;">
                                            <th>Admission</th>
                                            <th>Tuition</th>
                                            <th>Annual</th>
                                            <th>Exam Fee</th>
                                            <th>Lab Charges</th>
                                            <th>Late Fee</th>
                                            <th>PRE DUES</th>
                                            <th>ID CARD</th>
                                            <th>BOARD FEE</th>
                                            <th>STATIONARY</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr style="text-align: center" class="fs-6">
                                            <td data-voucher2="admission"></td>
                                            <td data-voucher2="tution"></td>
                                            <td data-voucher2="annual"></td>
                                            <td data-voucher2="exam_fee"></td>
                                            <td data-voucher2="lab_charges"></td>
                                            <td data-voucher2="late_fee"></td>
                                            <td data-voucher2="pre_dues"></td>
                                            <td data-voucher2="id_card"></td>
                                            <td data-voucher2="board_fee"></td>
                                            <td data-voucher2="stationary"></td>
                                            <td data-voucher2="total"></td>
                                        </tr>
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="due-date">
                                    <p
                                        style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: rgb(255, 0, 0);
                                        font-family: sans-serif;">
                                        100/-Rs will be charged after due date.</p>
                                </div>
                                <p style="margin: 0;
                                font-weight: 100;
                                font-size: 12px;
                                color: rgb(129, 129, 129);
                                font-family: sans-serif;"
                                    data-voucher2="note_01"></p>
                                <p style="margin: 0;
                                font-weight: 100;
                                font-size: 12px;
                                color: rgb(129, 129, 129);
                                font-family: sans-serif;"
                                    data-voucher2="note_02"></p>
                            </div>
                            <div class="col-md-6">

                                <div class="d-flex justify-content-between">
                                    <p style="margin: 0;
                                font-weight: 100;
                                font-size: 12px;
                                color: black;
                                font-family: sans-serif;"
                                        class="col-4">Previous Dues</p>
                                    <span
                                        style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                        class="me-2" data-voucher2="previous_dues"></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p style="margin: 0;
                                font-weight: 100;
                                font-size: 12px;
                                color: black;
                                font-family: sans-serif;"
                                        class="col-8">Total Payable (Within due Date)</p>
                                    <span
                                        style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                        class="me-2" data-voucher2="total_payable_within_due_date"></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p style="margin: 0;
                                font-weight: 100;
                                font-size: 12px;
                                color: black;
                                font-family: sans-serif;"
                                        class="col-8">Total Payable (After due Date)</p>
                                    <span
                                        style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                        class="me-2" data-voucher2="total_payable_after_due_date"></span>
                                </div>

                            </div>


                        </div>
                    </div>

                    <!-- ===============================================================Voucher-2-End=============================================================== -->


                    <!-- ===============================================================Voucher-2-Start=============================================================== -->

                    <div class="p-2">
                        <div style="text-align: center;">
                            <img src="" id="barcodeImg3" height="60px" width="130px">
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="d-flex justify-content-start">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">GRNo.</p>
                                        <span
                                            style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;"
                                            data-voucher3="gr_number"></span>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Student Name</p>
                                        <span
                                            style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;"
                                            data-voucher3="student_name"></span>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Father Name</p>
                                        <span
                                            style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;"
                                            data-voucher3="father_name"></span>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Class</p>
                                        <span
                                            style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;"
                                            data-voucher3="class"></span>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Section</p>
                                        <span
                                            style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;"
                                            data-voucher3="section"></span>
                                    </div>
                                </div>



                                <!-- <div class="row second"> -->


                                <div class="col-md-4">
                                    <div class="d-flex justify-content-between">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Transaction</p>
                                        <span
                                            style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;"
                                            class="me-2" data-voucher3="transaction_date"></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Issued</p>
                                        <span
                                            style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;"
                                            class="me-2" data-voucher3="issued_date"></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Due On</p>
                                        <span
                                            style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;"
                                            class="me-2" data-voucher3="due_date"></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Session</p>
                                        <span
                                            style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;"
                                            class="me-2" data-voucher3="session"></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Month</p>
                                        <span
                                            style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;"
                                            class="me-2" data-voucher3="month_year"></span>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>


                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table border-dark" border="1">
                                    <thead>
                                        <tr style="font-size: 12px; text-align: center;">
                                            <th>Admission</th>
                                            <th>Tuition</th>
                                            <th>Annual</th>
                                            <th>Exam Fee</th>
                                            <th>Lab Charges</th>
                                            <th>Late Fee</th>
                                            <th>PRE DUES</th>
                                            <th>ID CARD</th>
                                            <th>BOARD FEE</th>
                                            <th>STATIONARY</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr style="text-align: center" class="fs-6">
                                            <td data-voucher3="admission"></td>
                                            <td data-voucher3="tution"></td>
                                            <td data-voucher3="annual"></td>
                                            <td data-voucher3="exam_fee"></td>
                                            <td data-voucher3="lab_charges"></td>
                                            <td data-voucher3="late_fee"></td>
                                            <td data-voucher3="pre_dues"></td>
                                            <td data-voucher3="id_card"></td>
                                            <td data-voucher3="board_fee"></td>
                                            <td data-voucher3="stationary"></td>
                                            <td data-voucher3="total"></td>
                                        </tr>
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="due-date">
                                    <p
                                        style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: rgb(255, 0, 0);
                                        font-family: sans-serif;">
                                        100/-Rs will be charged after due date.</p>
                                </div>
                                <p style="margin: 0;
                                font-weight: 100;
                                font-size: 12px;
                                color: rgb(129, 129, 129);
                                font-family: sans-serif;"
                                    data-voucher3="note_01"></p>
                                <p style="margin: 0;
                                font-weight: 100;
                                font-size: 12px;
                                color: rgb(129, 129, 129);
                                font-family: sans-serif;"
                                    data-voucher3="note_02"></p>
                            </div>
                            <div class="col-md-6">

                                <div class="d-flex justify-content-between">
                                    <p style="margin: 0;
                                font-weight: 100;
                                font-size: 12px;
                                color: black;
                                font-family: sans-serif;"
                                        class="col-4">Previous Dues</p>
                                    <span
                                        style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                        class="me-2" data-voucher3="previous_dues"></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p style="margin: 0;
                                font-weight: 100;
                                font-size: 12px;
                                color: black;
                                font-family: sans-serif;"
                                        class="col-8">Total Payable (Within due Date)</p>
                                    <span
                                        style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                        class="me-2" data-voucher3="total_payable_within_due_date"></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p style="margin: 0;
                                font-weight: 100;
                                font-size: 12px;
                                color: black;
                                font-family: sans-serif;"
                                        class="col-8">Total Payable (After due Date)</p>
                                    <span
                                        style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                        class="me-2" data-voucher3="total_payable_after_due_date"></span>
                                </div>

                            </div>


                        </div>
                    </div>

                    <!-- ===============================================================Voucher-3-End=============================================================== -->

                </div>

            </div>
            <!-- container -->

        </div>
        <!-- content -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/2.1.4/js/dataTables.min.js"></script>
        <!-- Buttons extension JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/3.1.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
            integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script> --}}

        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
        <!-- Include SweetAlert2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>


        <script>
            $(document).ready(function() {
                // Initialize DataTable
                var table = new DataTable('#myTable', {
                    lengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "All"]
                    ],
                    pageLength: 10,
                    buttons: [{
                            extend: 'pdfHtml5',
                            orientation: 'portrait', // 'portrait' or 'landscape'
                            pageSize: 'A4', // 'A3', 'A5', 'legal', 'letter'
                            title: 'Class Fees Voucher',
                            customize: function(doc) {
                                doc.content[1].margin = [0, 0, 0, 0]; // left, top, right, bottom
                            },
                            exportOptions: {
                                columns: ':not(:last-child)' // Exclude the last column
                            }
                        },
                        {
                            extend: 'copy',
                            exportOptions: {
                                columns: ':not(:last-child)' // Exclude the last column
                            }
                        },
                        {
                            extend: 'csv',
                            exportOptions: {
                                columns: ':not(:last-child)' // Exclude the last column
                            }
                        },
                        {
                            extend: 'excel',
                            exportOptions: {
                                columns: ':not(:last-child)' // Exclude the last column
                            }
                        },
                        {
                            extend: 'print',
                            title: 'Class Fees Voucher',
                            customize: function(win) {
                                $(win.document.body)
                                    .css('font-size', '10pt')
                                    .prepend(
                                        `<img src="{{ asset('assets/images/voucher-logo/voucherlogo.jpg') }}" style="position:absolute; top:0; left:0;" width="0px" />`
                                    );

                                $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                            },
                            exportOptions: {
                                columns: ':not(:last-child)' // Exclude the last column
                            }
                        },
                        {
                            text: 'Print All Vouchers',
                            action: function() {
                                printVouchers();
                            }
                        },
                        {
                            text: 'Export All Vouchers to PDF',
                            action: function() {
                                exportVouchersToPDF();
                            }
                        }
                    ],
                    initComplete: function() {
                        // Add custom buttons to layout
                        $('#myTable_wrapper .dt-layout-row:nth-child(1) .dt-layout-end').append(`
                        <div class="d-flex flex-wrap pt-2 gap-1 justify-content-center justify-content-lg-end justify-content-md-end buttonsContainer">
                            <button id="btnExportPdf" class="btn btn-sm our-color-1 rounded-2 shadow"><i class="fa-solid fa-file-pdf"></i></button>
                            <button id="btnExportExcel"
                                class="btn btn-sm our-color-1 rounded-2 shadow"><i class="fa-solid fa-file-excel"></i></button>
                            <button id="btnPrintTable" class="btn btn-sm our-color-1 rounded-2 shadow"><i class="fa-solid fa-print"></i></button>
                            <button id="btnPrintVouchers" class="btn btn-sm our-color-1 rounded-2 shadow"><i class="fa-solid fa-print"></i> Print Vouchers</button>
                            <button id="btnExportVouchersToPDF" class="btn btn-sm our-color-1 rounded-2 shadow"><i class="fa-solid fa-file-pdf"></i> Export Vouchers to PDF</button>
                        </div>
                    `);

                        // Listen for filter change
                        $('#filterSelector').on('change', function() {
                            fetchData(this.value);
                        });

                        $('#btnPrintVouchers').on('click', function() {
                            printVouchers();
                        });

                        $('#btnExportVouchersToPDF').on('click', function() {
                            exportVouchersToPDF();
                        });
                    }
                });

                function fetchVoucherData(voucherId) {
                    // Fetch the voucher data via an AJAX call (or use existing data in the table)
                    return $.ajax({
                        url: `getVoucherIndivisual/${voucherId}`, // Update the URL to match your API endpoint
                        method: 'GET',
                        dataType: 'json'
                    });
                }

                function generateVoucherLayout(data) {
                    // Generate the voucher HTML using the provided layout and the data
                    console.log(data);

                    return `
                                <div class="voucher-layout">
                                <div class="p-2">
                                    <div style="text-align: center;">
                                        <img src="" height="60px" width="130px">
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="d-flex justify-content-start">
                                                    <p class="col-4 voucher-text">GRNo.</p>
                                                    <span class="voucher-text">${data.gr_number}</span>
                                                </div>
                                                <div class="d-flex justify-content-start">
                                                    <p class="col-4 voucher-text">Student Name</p>
                                                    <span class="voucher-text">${data.students_add.student_name}</span>
                                                </div>
                                                <div class="d-flex justify-content-start">
                                                    <p class="col-4 voucher-text">Father Name</p>
                                                    <span class="voucher-text">${data.students_add.father_name}</span>
                                                </div>
                                                <div class="d-flex justify-content-start">
                                                    <p class="col-4 voucher-text">Class</p>
                                                    <span class="voucher-text">${data.class}</span>
                                                </div>
                                                <div class="d-flex justify-content-start">
                                                    <p class="col-4 voucher-text">Section</p>
                                                    <span class="voucher-text">${data.section}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="d-flex justify-content-between">
                                                    <p class="col-4 voucher-text">Transaction</p>
                                                    <span class="voucher-text">${data.transaction_date}</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="col-4 voucher-text">Issued</p>
                                                    <span class="voucher-text">${data.issued_date}</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="col-4 voucher-text">Due On</p>
                                                    <span class="voucher-text">${data.due_date}</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="col-4 voucher-text">Session</p>
                                                    <span class="voucher-text">${data.session}</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="col-4 voucher-text">Month</p>
                                                    <span class="voucher-text">${data.month_year}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container mt-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <table class="table border-dark" border="1">
                                                    <thead>
                                                        <tr style="font-size: 12px; text-align: center;">
                                                            <th>Admission</th>
                                                            <th>Tuition</th>
                                                            <th>Annual</th>
                                                            <th>Exam Fee</th>
                                                            <th>Lab Charges</th>
                                                            <th>Late Fee</th>
                                                            <th>PRE DUES</th>
                                                            <th>ID CARD</th>
                                                            <th>BOARD FEE</th>
                                                            <th>STATIONARY</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr style="text-align: center" class="fs-6">
                                                            <td>${data.admission}</td>
                                                            <td>${data.tution}</td>
                                                            <td>${data.annual}</td>
                                                            <td>${data.exam_fee}</td>
                                                            <td>${data.lab_charges}</td>
                                                            <td>${data.late_fee}</td>
                                                            <td>${data.pre_dues}</td>
                                                            <td>${data.id_card}</td>
                                                            <td>${data.board_fee}</td>
                                                            <td>${data.stationary}</td>
                                                            <td>${data.total}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="due-date">
                                                    <p style="color: rgb(255, 0, 0);" class="voucher-text">100/-Rs will be charged after due date.</p>
                                                    <p style="color: rgb(129, 129, 129);" class="voucher-text">${data.note_01}</p>
                                                    <p style="color: rgb(129, 129, 129);" class="voucher-text">${data.note_02}</p>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-flex justify-content-between">
                                                    <p class="col-4 voucher-text">Previous Dues</p>
                                                    <span class="voucher-text">${data.previous_dues}</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="col-8 voucher-text">Total Payable (Within due Date)</p>
                                                    <span class="voucher-text">${data.total_payable_within_due_date}</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="col-8 voucher-text">Total Payable (After due Date)</p>
                                                    <span class="voucher-text">${data.total_payable_after_due_date}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ===============================================================Voucher-1-End=============================================================== -->
                                <div class="p-2">
                                    <div style="text-align: center;">
                                        <img src="" height="60px" width="130px">
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="d-flex justify-content-start">
                                                    <p class="col-4 voucher-text">GRNo.</p>
                                                    <span class="voucher-text">${data.gr_number}</span>
                                                </div>
                                                <div class="d-flex justify-content-start">
                                                    <p class="col-4 voucher-text">Student Name</p>
                                                    <span class="voucher-text">${data.students_add.student_name}</span>
                                                </div>
                                                <div class="d-flex justify-content-start">
                                                    <p class="col-4 voucher-text">Father Name</p>
                                                    <span class="voucher-text">${data.students_add.father_name}</span>
                                                </div>
                                                <div class="d-flex justify-content-start">
                                                    <p class="col-4 voucher-text">Class</p>
                                                    <span class="voucher-text">${data.class}</span>
                                                </div>
                                                <div class="d-flex justify-content-start">
                                                    <p class="col-4 voucher-text">Section</p>
                                                    <span class="voucher-text">${data.section}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="d-flex justify-content-between">
                                                    <p class="col-4 voucher-text">Transaction</p>
                                                    <span class="voucher-text">${data.transaction_date}</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="col-4 voucher-text">Issued</p>
                                                    <span class="voucher-text">${data.issued_date}</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="col-4 voucher-text">Due On</p>
                                                    <span class="voucher-text">${data.due_date}</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="col-4 voucher-text">Session</p>
                                                    <span class="voucher-text">${data.session}</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="col-4 voucher-text">Month</p>
                                                    <span class="voucher-text">${data.month_year}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container mt-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <table class="table border-dark" border="1">
                                                    <thead>
                                                        <tr style="font-size: 12px; text-align: center;">
                                                            <th>Admission</th>
                                                            <th>Tuition</th>
                                                            <th>Annual</th>
                                                            <th>Exam Fee</th>
                                                            <th>Lab Charges</th>
                                                            <th>Late Fee</th>
                                                            <th>PRE DUES</th>
                                                            <th>ID CARD</th>
                                                            <th>BOARD FEE</th>
                                                            <th>STATIONARY</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr style="text-align: center" class="fs-6">
                                                            <td>${data.admission}</td>
                                                            <td>${data.tution}</td>
                                                            <td>${data.annual}</td>
                                                            <td>${data.exam_fee}</td>
                                                            <td>${data.lab_charges}</td>
                                                            <td>${data.late_fee}</td>
                                                            <td>${data.pre_dues}</td>
                                                            <td>${data.id_card}</td>
                                                            <td>${data.board_fee}</td>
                                                            <td>${data.stationary}</td>
                                                            <td>${data.total}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="due-date">
                                                    <p style="color: rgb(255, 0, 0);" class="voucher-text">100/-Rs will be charged after due date.</p>
                                                    <p style="color: rgb(129, 129, 129);" class="voucher-text">${data.note_01}</p>
                                                    <p style="color: rgb(129, 129, 129);" class="voucher-text">${data.note_02}</p>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-flex justify-content-between">
                                                    <p class="col-4 voucher-text">Previous Dues</p>
                                                    <span class="voucher-text">${data.previous_dues}</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="col-8 voucher-text">Total Payable (Within due Date)</p>
                                                    <span class="voucher-text">${data.total_payable_within_due_date}</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="col-8 voucher-text">Total Payable (After due Date)</p>
                                                    <span class="voucher-text">${data.total_payable_after_due_date}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ===============================================================Voucher-2-End=============================================================== -->
                                <div class="p-2">
                                    <div style="text-align: center;">
                                        <img src="" height="60px" width="130px">
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="d-flex justify-content-start">
                                                    <p class="col-4 voucher-text">GRNo.</p>
                                                    <span class="voucher-text">${data.gr_number}</span>
                                                </div>
                                                <div class="d-flex justify-content-start">
                                                    <p class="col-4 voucher-text">Student Name</p>
                                                    <span class="voucher-text">${data.students_add.student_name}</span>
                                                </div>
                                                <div class="d-flex justify-content-start">
                                                    <p class="col-4 voucher-text">Father Name</p>
                                                    <span class="voucher-text">${data.students_add.father_name}</span>
                                                </div>
                                                <div class="d-flex justify-content-start">
                                                    <p class="col-4 voucher-text">Class</p>
                                                    <span class="voucher-text">${data.class}</span>
                                                </div>
                                                <div class="d-flex justify-content-start">
                                                    <p class="col-4 voucher-text">Section</p>
                                                    <span class="voucher-text">${data.section}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="d-flex justify-content-between">
                                                    <p class="col-4 voucher-text">Transaction</p>
                                                    <span class="voucher-text">${data.transaction_date}</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="col-4 voucher-text">Issued</p>
                                                    <span class="voucher-text">${data.issued_date}</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="col-4 voucher-text">Due On</p>
                                                    <span class="voucher-text">${data.due_date}</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="col-4 voucher-text">Session</p>
                                                    <span class="voucher-text">${data.session}</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="col-4 voucher-text">Month</p>
                                                    <span class="voucher-text">${data.month_year}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container mt-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <table class="table border-dark" border="1">
                                                    <thead>
                                                        <tr style="font-size: 12px; text-align: center;">
                                                            <th>Admission</th>
                                                            <th>Tuition</th>
                                                            <th>Annual</th>
                                                            <th>Exam Fee</th>
                                                            <th>Lab Charges</th>
                                                            <th>Late Fee</th>
                                                            <th>PRE DUES</th>
                                                            <th>ID CARD</th>
                                                            <th>BOARD FEE</th>
                                                            <th>STATIONARY</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr style="text-align: center" class="fs-6">
                                                            <td>${data.admission}</td>
                                                            <td>${data.tution}</td>
                                                            <td>${data.annual}</td>
                                                            <td>${data.exam_fee}</td>
                                                            <td>${data.lab_charges}</td>
                                                            <td>${data.late_fee}</td>
                                                            <td>${data.pre_dues}</td>
                                                            <td>${data.id_card}</td>
                                                            <td>${data.board_fee}</td>
                                                            <td>${data.stationary}</td>
                                                            <td>${data.total}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="due-date">
                                                    <p style="color: rgb(255, 0, 0);" class="voucher-text">100/-Rs will be charged after due date.</p>
                                                    <p style="color: rgb(129, 129, 129);" class="voucher-text">${data.note_01}</p>
                                                    <p style="color: rgb(129, 129, 129);" class="voucher-text">${data.note_02}</p>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-flex justify-content-between">
                                                    <p class="col-4 voucher-text">Previous Dues</p>
                                                    <span class="voucher-text">${data.previous_dues}</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="col-8 voucher-text">Total Payable (Within due Date)</p>
                                                    <span class="voucher-text">${data.total_payable_within_due_date}</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="col-8 voucher-text">Total Payable (After due Date)</p>
                                                    <span class="voucher-text">${data.total_payable_after_due_date}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ===============================================================Voucher-3-End=============================================================== -->
                                </div>
                                <div class="page-break"></div>
                        `;
                }

                function printVouchers() {
                    // Get the URL of the CSS file using Laravel's asset helper
                    var cssFileUrl = "{{ asset('assets/css/adminlte.min2167.css') }}";

                    // Get all row data
                    var rows = table.rows({
                        filter: 'applied'
                    }).data().toArray();

                    // Clear the printable area and add all vouchers
                    // var printableArea = $('#printableArea');
                    // printableArea.empty();

                    if (rows.length === 0) {
                        alert("No data available to print.");
                        return;
                    }

                    // Open a new window for printing
                    var printWindow = window.open('', '_blank');
                    var printableContent = '';

                    // Create an array of promises for fetching voucher data
                    var fetchPromises = rows.map(function(row) {
                        var voucherId = row[0]; // Assuming the ID is in the first column
                        return fetchVoucherData(voucherId).then(function(data) {
                            // Append the generated layout to the printable content
                            printableContent += generateVoucherLayout(data) +
                                `<div style="page-break-after: always;"></div>`;
                        });
                    });

                    // Wait for all promises to resolve before proceeding with printing
                    Promise.all(fetchPromises).then(function() {
                        printWindow.document.write(`
                        <html>
                        <head>
                            <title>Print Vouchers</title>
                            
                            <style>
                                @media print {
                                    @page {
                                        size: A4;
                                        margin: 20mm;
                                    }
                                    :root{
                                        box-sizing: border-box;
                                    }
                                    body {
                                        font-family: Arial, sans-serif;
                                        font-size: 12px;
                                        -webkit-print-color-adjust: exact;
                                    }
                                    .voucher {
                                        page-break-inside: avoid;
                                    }
                                    .page-break {
                                        page-break-after: always;
                                    }
                                    .p-2 {
                                        padding: .5rem !important;
                                    }
                                    .me-2 {
                                        margin-right: 0.75rem !important;
                                    }
                                    .container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl {
                                        width: 100%;
                                        padding-right: 7.5px;
                                        padding-left: 7.5px;
                                        margin-right: auto;
                                        margin-left: auto;
                                    }
                                    .row {
                                        display: -ms-flexbox;
                                        display: flex;
                                        -ms-flex-wrap: wrap;
                                        flex-wrap: wrap;
                                        margin-right: -7.5px;
                                        margin-left: -7.5px;
                                    }
                                    .justify-content-start {
                                        -ms-flex-pack: start !important;
                                        justify-content: flex-start !important;
                                    }
                                    .justify-content-between {
                                        -ms-flex-pack: justify !important;
                                        justify-content: space-between !important;
                                    }
                                    .d-flex {
                                        display: -ms-flexbox !important;
                                        display: flex !important;
                                    }
                                    .col-4 {
                                        -ms-flex: 0 0 33.333333%;
                                        flex: 0 0 33.333333%;
                                        max-width: 33.333333%;
                                    }
                                    .col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto {
                                        position: relative;
                                        width: 100%;
                                        padding-right: 7.5px;
                                        padding-left: 7.5px;
                                    }
                                    .table:not(.table-dark) {
                                        color: inherit;
                                    }
                                    .border-dark {
                                        border-color: #343a40 !important;
                                    }
                                    .table {
                                        width: 100%;
                                        margin-bottom: 1rem;
                                        color: #212529;
                                        background-color: transparent;
                                    }
                                }
                            </style>
                        </head>
                        <body>
                            ${printableContent}
                        </body>
                        </html>
                    `);
                        printWindow.document.close(); // Close the document to finish loading
                        printWindow.focus(); // Focus the window before printing
                        printWindow.print(); // Trigger the print dialog
                        printWindow.close(); // Close the window after printing
                    }).catch(function(error) {
                        console.error("Error fetching voucher data:", error);
                        alert("An error occurred while fetching the voucher data. Please try again.");
                    });
                }

                function exportVouchersToPDF() {
                    // Get all row data
                    var rows = table.rows({
                        filter: 'applied'
                    }).data().toArray();

                    if (rows.length === 0) {
                        alert("No data available to print.");
                        return;
                    }

                    // Clear the printable area and add all vouchers
                    var printableArea = $('#printableArea');
                    printableArea.empty();

                    // Create an array of promises for fetching voucher data
                    var fetchPromises = rows.map(function(row) {
                        var voucherId = row[0]; // Assuming the ID is in the first column
                        return fetchVoucherData(voucherId).then(function(data) {
                            printableArea.append(generateVoucherLayout(data));
                        });
                    });

                    // Wait for all promises to resolve before proceeding with printing
                    Promise.all(fetchPromises).then(function() {
                        // Access the jsPDF library from the global window object
                        const {
                            jsPDF
                        } = window.jspdf;

                        // Create a new jsPDF instance with A4 page size and portrait orientation
                        var doc = new jsPDF({
                            orientation: 'portrait',
                            unit: 'mm',
                            format: 'a4'
                        });

                        // Set the dimensions for the A4 size and ensure proper layout fit
                        const pageWidth = doc.internal.pageSize.getWidth();
                        const pageHeight = doc.internal.pageSize.getHeight();

                        // Iterate through each voucher layout and add it to the PDF
                        printableArea.children('.voucher-layout').each(function(index, element) {
                            if (index > 0) {
                                doc.addPage();
                            }
                            doc.html(element, {
                                callback: function(doc) {
                                    if (index === printableArea.children('.voucher-layout')
                                        .length - 1) {
                                        doc.save('vouchers.pdf');
                                    }
                                },
                                x: 10,
                                y: 10,
                                width: pageWidth -
                                    20, // Adjust to ensure it fits within the page width
                                windowWidth: printableArea
                                    .width() // Use the actual width of the content
                            });
                        });
                    }).catch(function(error) {
                        console.error("Error fetching voucher data:", error);
                        alert("An error occurred while fetching the voucher data. Please try again.");
                    });
                }

                function fetchData(filterValue) {
                    let url = `showFilterClassFees?filter=${filterValue}`;
                    $.ajax({
                        type: 'get',
                        url: url,
                        success: function(response) {
                            table.clear(); // Clear the current data
                            if (response.length > 0) {
                                response.forEach((item, index) => {
                                    // Create the action buttons HTML
                                    let viewButton =
                                        `<a href="voucherform/${item.id}" class="btn btn-sm our-color-1 rounded-2 shadow magicButton">View</a>`;
                                    let editButton =
                                        `<a href="voucherform/${item.id}" class="btn btn-sm our-color-1 rounded-2 shadow magicButton2">Edit</a>`;
                                    let deleteButton =
                                        `<a href="#" class="btn btn-sm btn-danger rounded-2 shadow magicButton3" data-id="${item.id}">Delete</a>`;

                                    table.row.add([
                                        item.id,
                                        item.gr_number,
                                        item.month_year,
                                        item.transaction_date,
                                        item.issued_date,
                                        item.due_date,
                                        item.session,
                                        item.admission,
                                        item.tution,
                                        item.annual,
                                        item.exam_fee,
                                        item.lab_charges,
                                        item.late_fee,
                                        item.pre_dues,
                                        item.id_card,
                                        item.board_fee,
                                        item.stationary,
                                        item.total,
                                        item.class,
                                        item.section,
                                        `${viewButton} ${editButton} ${deleteButton}` // Action buttons
                                    ]).draw(false); // Add the new data and redraw the table
                                });
                            } else {
                                table.clear().draw();
                            }
                        }
                    });
                }

                // Disable buttons if no data is found after filtering
                table.on('draw', function() {
                    var dataCount = table.rows({
                        filter: 'applied'
                    }).data().length;
                    toggleButtons(dataCount);
                });

                // Check if initial data is present and disable buttons if not
                var initialDataCount = table.data().length;
                toggleButtons(initialDataCount);

                // Populate the Class filter dropdown
                var uniqueClasses = [...new Set(table.column(18).data().toArray())];
                uniqueClasses.forEach(function(className) {
                    $('#classFilter').append(new Option(className, className));
                });

                // Filter function for class
                $('#classFilter').on('change', function() {
                    table.column(18).search(this.value).draw();
                });

                // Populate the Section filter dropdown
                var uniqueSections = [...new Set(table.column(19).data().toArray())];
                uniqueSections.forEach(function(sectionName) {
                    $('#sectionFilter').append(new Option(sectionName, sectionName));
                });

                // Filter function for section
                $('#sectionFilter').on('change', function() {
                    table.column(19).search(this.value).draw();
                });

                // Custom button click events
                $('#btnExportPdf').on('click', function() {
                    table.button('.buttons-pdf').trigger();
                });

                $('#btnExportExcel').on('click', function() {
                    table.button('.buttons-excel').trigger();
                });

                $('#btnPrintTable').on('click', function() {
                    table.button('.buttons-print').trigger();
                });

                // Function to enable/disable buttons
                function toggleButtons(count) {
                    if (count === 0) {
                        $('#btnExportPdf').prop('disabled', true);
                        $('#btnExportExcel').prop('disabled', true);
                        $('#btnPrintTable').prop('disabled', true);
                        $('#btnPrintVouchers').prop('disabled', true);
                        $('#btnExportVouchersToPDF').prop('disabled', true);
                    } else {
                        $('#btnExportPdf').prop('disabled', false);
                        $('#btnExportExcel').prop('disabled', false);
                        $('#btnPrintTable').prop('disabled', false);
                        $('#btnPrintVouchers').prop('disabled', false);
                        $('#btnExportVouchersToPDF').prop('disabled', false);
                    }
                }

                function deleteFeeVoucher(id) {
                    Swal.fire({
                        title: "Are you sure?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: 'get',
                                url: 'deleteFeeVoucher/' + id,
                                success: function(response) {
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: "top-end",
                                        showConfirmButton: false,
                                        timer: 2000,
                                        timerProgressBar: true,
                                        didOpen: (toast) => {
                                            toast.onmouseenter = Swal.stopTimer;
                                            toast.onmouseleave = Swal.resumeTimer;
                                        }
                                    });
                                    let data = response.message;
                                    if (data) {
                                        Toast.fire({
                                            icon: "error",
                                            title: data
                                        });
                                    } else {
                                        Toast.fire({
                                            icon: "success",
                                            title: "Fee Receipts Delete Successfully"
                                        });
                                        fetchData("all");
                                    }
                                },
                                error: function(error) {
                                    console.log(error);
                                }
                            });
                        }
                    });
                }

                // Attach click event to delete buttons
                $(document).on('click', '.magicButton3', function() {
                    var id = $(this).data('id');
                    deleteFeeVoucher(id);
                });
            });
        </script>


        <script>
            $(document).ready(function() {
                $('.save-status').click(function() {
                    var studentId = $(this).data('id');
                    var studentName = $(this).data('student-name');
                    var fatherName = $(this).data('father-name');
                    var form = $('#statusForm' + studentId);
                    var formData = form.serialize();

                    $.ajax({
                        url: '/update-status', // Adjust to your actual route
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            // Handle success
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: 'Status for ' + studentName + ' ' + fatherName +
                                    ' updated successfully!',
                                confirmButtonText: 'OK',
                                background: '#092139',
                                color: '#ffffff',
                                customClass: {
                                    confirmButton: 'btn btn-success'
                                },
                                buttonsStyling: false
                            }).then(() => {
                                $('#statusModal' + studentId).modal('hide');
                                // Optionally refresh the data on the page
                                location.reload();
                            });
                        },
                        error: function(response) {
                            // Handle error
                            Swal.fire({
                                icon: 'warning',
                                title: 'No Status Selected',
                                text: 'Please select a status before submitting.',
                                confirmButtonText: 'OK',
                                background: '#092139',
                                color: '#ffffff',
                                customClass: {
                                    confirmButton: 'btn btn-warning'
                                },
                                buttonsStyling: false
                            });
                        }
                    });
                });
            });
        </script>


        <script>
            const voucher = @json($voucher);
            console.log(voucher);

            async function generatePDF(vouchers) {
                try {
                    const options = {
                        filename: 'vouchers.pdf',
                        image: {
                            type: 'jpeg',
                            quality: 1
                        },
                        html2canvas: {
                            scale: 5
                        },
                        jsPDF: {
                            unit: 'in',
                            format: 'a4',
                            orientation: 'portrait'
                        }
                    };

                    const pdf = html2pdf().set(options);

                    for (let i = 0; i < vouchers.length; i++) {
                        const voucher = vouchers[i];

                        // Update the HTML with the current voucher data
                        document.getElementById('barcodeImg1').src = generateBarcodeImage(voucher.gr_number);
                        document.getElementById('barcodeImg2').src = generateBarcodeImage(voucher.gr_number);
                        document.getElementById('barcodeImg3').src = generateBarcodeImage(voucher.gr_number);

                        // Ensure the barcode image is fully loaded
                        await new Promise((resolve) => {
                            document.getElementById('barcodeImg1').onload = resolve;
                            document.getElementById('barcodeImg2').onload = resolve;
                            document.getElementById('barcodeImg3').onload = resolve;
                        });

                        // Function to update the HTML content
                        updateVoucherDetails(voucher);

                        // Convert the HTML content to PDF and add it to the PDF document
                        const element = document.getElementById('printableArea');
                        await pdf.from(element).toPdf().get('pdf').then((pdfDoc) => {
                            if (i < vouchers.length - 1) {
                                pdfDoc.addPage();
                            }
                        });

                    }

                    // Save the final PDF
                    pdf.save();
                } catch (error) {
                    console.error('Error generating PDF:', error);
                }
            }

            function updateVoucherDetails(voucher) {

                //--------------- Voucher 1 ------------------
                document.querySelector('[data-voucher="gr_number"]').textContent = voucher.gr_number;
                document.querySelector('[data-voucher="student_name"]').textContent = voucher.students_add.student_name;
                document.querySelector('[data-voucher="father_name"]').textContent = voucher.students_add.father_name;
                document.querySelector('[data-voucher="class"]').textContent = voucher.class;
                document.querySelector('[data-voucher="section"]').textContent = voucher.section;
                document.querySelector('[data-voucher="transaction_date"]').textContent = voucher.transaction_date;
                document.querySelector('[data-voucher="issued_date"]').textContent = voucher.issued_date;
                document.querySelector('[data-voucher="due_date"]').textContent = voucher.due_date;
                document.querySelector('[data-voucher="session"]').textContent = voucher.session;
                document.querySelector('[data-voucher="month_year"]').textContent = voucher.month_year;

                // Additional fields for the fees
                document.querySelector('[data-voucher="admission"]').textContent = voucher.admission;
                document.querySelector('[data-voucher="tution"]').textContent = voucher.tution;
                document.querySelector('[data-voucher="annual"]').textContent = voucher.annual;
                document.querySelector('[data-voucher="exam_fee"]').textContent = voucher.exam_fee;
                document.querySelector('[data-voucher="lab_charges"]').textContent = voucher.lab_charges;
                document.querySelector('[data-voucher="late_fee"]').textContent = voucher.late_fee;
                document.querySelector('[data-voucher="pre_dues"]').textContent = voucher.pre_dues;
                document.querySelector('[data-voucher="id_card"]').textContent = voucher.id_card;
                document.querySelector('[data-voucher="board_fee"]').textContent = voucher.board_fee;
                document.querySelector('[data-voucher="stationary"]').textContent = voucher.stationary;
                document.querySelector('[data-voucher="total"]').textContent = voucher.total;

                // Note 01 and Note 02
                document.querySelector('[data-voucher="note_01"]').textContent = voucher.note_01;
                document.querySelector('[data-voucher="note_02"]').textContent = voucher.note_02;

                // Previous Dues and Total Payable
                document.querySelector('[data-voucher="previous_dues"]').textContent = voucher.previous_dues;
                document.querySelector('[data-voucher="total_payable_within_due_date"]').textContent = voucher
                    .total_payable_within_due_date;
                document.querySelector('[data-voucher="total_payable_after_due_date"]').textContent = voucher
                    .total_payable_after_due_date;

                //--------------- Voucher 2 ------------------
                document.querySelector('[data-voucher2="gr_number"]').textContent = voucher.gr_number;
                document.querySelector('[data-voucher2="student_name"]').textContent = voucher.students_add.student_name;
                document.querySelector('[data-voucher2="father_name"]').textContent = voucher.students_add.father_name;
                document.querySelector('[data-voucher2="class"]').textContent = voucher.class;
                document.querySelector('[data-voucher2="section"]').textContent = voucher.section;
                document.querySelector('[data-voucher2="transaction_date"]').textContent = voucher.transaction_date;
                document.querySelector('[data-voucher2="issued_date"]').textContent = voucher.issued_date;
                document.querySelector('[data-voucher2="due_date"]').textContent = voucher.due_date;
                document.querySelector('[data-voucher2="session"]').textContent = voucher.session;
                document.querySelector('[data-voucher2="month_year"]').textContent = voucher.month_year;

                // Additional fields for the fees
                document.querySelector('[data-voucher2="admission"]').textContent = voucher.admission;
                document.querySelector('[data-voucher2="tution"]').textContent = voucher.tution;
                document.querySelector('[data-voucher2="annual"]').textContent = voucher.annual;
                document.querySelector('[data-voucher2="exam_fee"]').textContent = voucher.exam_fee;
                document.querySelector('[data-voucher2="lab_charges"]').textContent = voucher.lab_charges;
                document.querySelector('[data-voucher2="late_fee"]').textContent = voucher.late_fee;
                document.querySelector('[data-voucher2="pre_dues"]').textContent = voucher.pre_dues;
                document.querySelector('[data-voucher2="id_card"]').textContent = voucher.id_card;
                document.querySelector('[data-voucher2="board_fee"]').textContent = voucher.board_fee;
                document.querySelector('[data-voucher2="stationary"]').textContent = voucher.stationary;
                document.querySelector('[data-voucher2="total"]').textContent = voucher.total;

                // Note 01 and Note 02
                document.querySelector('[data-voucher2="note_01"]').textContent = voucher.note_01;
                document.querySelector('[data-voucher2="note_02"]').textContent = voucher.note_02;

                // Previous Dues and Total Payable
                document.querySelector('[data-voucher2="previous_dues"]').textContent = voucher.previous_dues;
                document.querySelector('[data-voucher2="total_payable_within_due_date"]').textContent = voucher
                    .total_payable_within_due_date;
                document.querySelector('[data-voucher2="total_payable_after_due_date"]').textContent = voucher
                    .total_payable_after_due_date;

                //--------------- Voucher 3 ------------------
                document.querySelector('[data-voucher3="gr_number"]').textContent = voucher.gr_number;
                document.querySelector('[data-voucher3="student_name"]').textContent = voucher.students_add.student_name;
                document.querySelector('[data-voucher3="father_name"]').textContent = voucher.students_add.father_name;
                document.querySelector('[data-voucher3="class"]').textContent = voucher.class;
                document.querySelector('[data-voucher3="section"]').textContent = voucher.section;
                document.querySelector('[data-voucher3="transaction_date"]').textContent = voucher.transaction_date;
                document.querySelector('[data-voucher3="issued_date"]').textContent = voucher.issued_date;
                document.querySelector('[data-voucher3="due_date"]').textContent = voucher.due_date;
                document.querySelector('[data-voucher3="session"]').textContent = voucher.session;
                document.querySelector('[data-voucher3="month_year"]').textContent = voucher.month_year;

                // Additional fields for the fees
                document.querySelector('[data-voucher3="admission"]').textContent = voucher.admission;
                document.querySelector('[data-voucher3="tution"]').textContent = voucher.tution;
                document.querySelector('[data-voucher3="annual"]').textContent = voucher.annual;
                document.querySelector('[data-voucher3="exam_fee"]').textContent = voucher.exam_fee;
                document.querySelector('[data-voucher3="lab_charges"]').textContent = voucher.lab_charges;
                document.querySelector('[data-voucher3="late_fee"]').textContent = voucher.late_fee;
                document.querySelector('[data-voucher3="pre_dues"]').textContent = voucher.pre_dues;
                document.querySelector('[data-voucher3="id_card"]').textContent = voucher.id_card;
                document.querySelector('[data-voucher3="board_fee"]').textContent = voucher.board_fee;
                document.querySelector('[data-voucher3="stationary"]').textContent = voucher.stationary;
                document.querySelector('[data-voucher3="total"]').textContent = voucher.total;

                // Note 01 and Note 02
                document.querySelector('[data-voucher3="note_01"]').textContent = voucher.note_01;
                document.querySelector('[data-voucher3="note_02"]').textContent = voucher.note_02;

                // Previous Dues and Total Payable
                document.querySelector('[data-voucher3="previous_dues"]').textContent = voucher.previous_dues;
                document.querySelector('[data-voucher3="total_payable_within_due_date"]').textContent = voucher
                    .total_payable_within_due_date;
                document.querySelector('[data-voucher3="total_payable_after_due_date"]').textContent = voucher
                    .total_payable_after_due_date;
            }

            function generateBarcodeImage(grNumber) {
                const canvas = document.createElement('canvas');
                JsBarcode(canvas, grNumber, {
                    format: 'CODE128', // Choose the barcode format
                    displayValue: true,
                    width: 2,
                    height: 50
                });

                // Check if toDataURL method exists
                if (typeof canvas.toDataURL === 'function') {
                    // Convert the canvas to an image URL
                    return canvas.toDataURL('image/png');
                } else {
                    console.error('canvas.toDataURL is not a function');
                    return '';
                }
            }

            document.getElementById('generatePDF').addEventListener('click', () => {
                generatePDF(voucher);
            });
        </script>
    @endsection
