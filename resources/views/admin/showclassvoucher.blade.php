@extends('admin.master')
@section('content')
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.3/css/dataTables.dataTables.min.css">

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
                                        {{-- <input class="search-input" name="search" placeholder="Search..." type="search" value="{{ $search }}"> --}}

                                    </form>
                                    <!-- Searchbar End -->
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

                                        <div class="table-responsive">
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

                                                    @foreach ($voucher as $vouc)
                                                        <tr class="text-center">
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
                                        <span style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;" data-voucher="gr_number"></span>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Student Name</p>
                                        <span style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;" data-voucher="student_name"></span>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Father Name</p>
                                        <span style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;" data-voucher="father_name"></span>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Class</p>
                                        <span style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;" data-voucher="class"></span>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Section</p>
                                        <span style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;" data-voucher="section"></span>
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
                                        <span style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;" class="me-2" data-voucher="transaction_date"></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Issued</p>
                                        <span style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;" class="me-2" data-voucher="issued_date"></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Due On</p>
                                        <span style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;" class="me-2" data-voucher="due_date"></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Session</p>
                                        <span style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;" class="me-2" data-voucher="session"></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Month</p>
                                        <span style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;" class="me-2" data-voucher="month_year"></span>
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
                                    <span style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;" class="me-2" data-voucher="previous_dues"></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p style="margin: 0;
                                font-weight: 100;
                                font-size: 12px;
                                color: black;
                                font-family: sans-serif;"
                                        class="col-8">Total Payable (Within due Date)</p>
                                    <span style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;" class="me-2" data-voucher="total_payable_within_due_date"></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p style="margin: 0;
                                font-weight: 100;
                                font-size: 12px;
                                color: black;
                                font-family: sans-serif;"
                                        class="col-8">Total Payable (After due Date)</p>
                                    <span style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;" class="me-2" data-voucher="total_payable_after_due_date"></span>
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
                                        <span style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;" data-voucher2="gr_number"></span>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Student Name</p>
                                        <span style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;" data-voucher2="student_name"></span>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Father Name</p>
                                        <span style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;" data-voucher2="father_name"></span>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Class</p>
                                        <span style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;" data-voucher2="class"></span>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Section</p>
                                        <span style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;" data-voucher2="section"></span>
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
                                        <span style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;" class="me-2" data-voucher2="transaction_date"></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Issued</p>
                                        <span style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;" class="me-2" data-voucher2="issued_date"></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Due On</p>
                                        <span style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;" class="me-2" data-voucher2="due_date"></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Session</p>
                                        <span style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;" class="me-2" data-voucher2="session"></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Month</p>
                                        <span style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;" class="me-2" data-voucher2="month_year"></span>
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
                                    <span style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;" class="me-2" data-voucher2="previous_dues"></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p style="margin: 0;
                                font-weight: 100;
                                font-size: 12px;
                                color: black;
                                font-family: sans-serif;"
                                        class="col-8">Total Payable (Within due Date)</p>
                                    <span style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;" class="me-2" data-voucher2="total_payable_within_due_date"></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p style="margin: 0;
                                font-weight: 100;
                                font-size: 12px;
                                color: black;
                                font-family: sans-serif;"
                                        class="col-8">Total Payable (After due Date)</p>
                                    <span style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;" class="me-2" data-voucher2="total_payable_after_due_date"></span>
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
                                        <span style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;" data-voucher3="gr_number"></span>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Student Name</p>
                                        <span style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;" data-voucher3="student_name"></span>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Father Name</p>
                                        <span style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;" data-voucher3="father_name"></span>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Class</p>
                                        <span style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;" data-voucher3="class"></span>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Section</p>
                                        <span style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;" data-voucher3="section"></span>
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
                                        <span style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;" class="me-2" data-voucher3="transaction_date"></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Issued</p>
                                        <span style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;" class="me-2" data-voucher3="issued_date"></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Due On</p>
                                        <span style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;" class="me-2" data-voucher3="due_date"></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Session</p>
                                        <span style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;" class="me-2" data-voucher3="session"></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;"
                                            class="col-4">Month</p>
                                        <span style="margin: 0;
                                        font-weight: 100;
                                        font-size: 12px;
                                        color: black;
                                        font-family: sans-serif;" class="me-2" data-voucher3="month_year"></span>
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
                                    <span style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;" class="me-2" data-voucher3="previous_dues"></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p style="margin: 0;
                                font-weight: 100;
                                font-size: 12px;
                                color: black;
                                font-family: sans-serif;"
                                        class="col-8">Total Payable (Within due Date)</p>
                                    <span style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;" class="me-2" data-voucher3="total_payable_within_due_date"></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p style="margin: 0;
                                font-weight: 100;
                                font-size: 12px;
                                color: black;
                                font-family: sans-serif;"
                                        class="col-8">Total Payable (After due Date)</p>
                                    <span style="margin: 0;
                                    font-weight: 100;
                                    font-size: 12px;
                                    color: black;
                                    font-family: sans-serif;" class="me-2" data-voucher3="total_payable_after_due_date"></span>
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="//cdn.datatables.net/2.1.3/js/dataTables.min.js"></script>
        <script>
            let table = new DataTable('#myTable');
        </script>

        <!-- Include SweetAlert2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
            integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

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
