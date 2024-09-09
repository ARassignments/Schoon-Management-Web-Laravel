@extends('admin.master')
@section('content')

    <head>
        <link rel="stylesheet" href="//cdn.datatables.net/2.1.3/css/dataTables.dataTables.min.css">
        <!-- Buttons extension CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
        <style>
            .page-break {
                page-break-before: always;
                page-break-inside: avoid;
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
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page mt-4">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                <button class="addbtn-container rounded row mb-3 "> <a href="{{ url('specialfeesgenerate') }}"
                        class="add-btn2 "><span class="spn2">Generate Special Fee Voucher</span></a>
                </button>
                <div class="row">
                    <div class="col-xl-12 ">
                        <!-- Todo-->
                        <div class="">
                            <div class="card-body p-0">
                                <div
                                    class="card-body-container p-3 d-flex align-items-center justify-content-end shadow rounded mt-4">

                                    <h5 class="header-title mb-0 me-auto text-white">Special Fees Voucher</h5>

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
                                                <div class="d-flex align-items-center col-md-4 mt-2">
                                                    <label for="filterSelector" class="col-3">Filter By:</label>
                                                    <select id="filterSelector" class="form-select col-9">
                                                        <option value="" selected disabled>--Select Filter--</option>
                                                        <option value="all">All Data</option>
                                                        <option value="today">Today</option>
                                                        <option value="monthly">This Month</option>
                                                    </select>
                                                </div>
                                                <div class="d-flex align-items-center col-md-4 mt-2">
                                                    <label for="monthFilter" class="col-4">Month By:</label>
                                                    <select id="monthFilter" class="form-select col-8">
                                                        <option value="" selected disabled>--Select Month--</option>
                                                        <option value="01">January</option>
                                                        <option value="02">February</option>
                                                        <option value="03">March</option>
                                                        <option value="04">April</option>
                                                        <option value="05">May</option>
                                                        <option value="06">June</option>
                                                        <option value="07">July</option>
                                                        <option value="08">August</option>
                                                        <option value="09">September</option>
                                                        <option value="10">October</option>
                                                        <option value="11">November</option>
                                                        <option value="12">December</option>
                                                    </select>
                                                </div>
                                                <div class="d-flex align-items-center col-md-4 mt-2">
                                                    <label for="yearFilter" class="col-3">Year By:</label>
                                                    <select id="yearFilter" class="form-select col-9">
                                                        <option value="" selected disabled>--Select Year--</option>
                                                        <option value="2024">2024</option>
                                                        <option value="2023">2023</option>
                                                        <option value="2022">2022</option>
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
                                                            <td>{{ $vouc->students_add->current_class }}</td>
                                                            <td>{{ $vouc->students_add->section }}</td>
                                                            <td>
                                                                <a href="{{ url('viewSpecialFeesVoucher', $vouc->id) }}"
                                                                    class="btn btn-sm our-color-1 rounded-2 shadow magicButton">View</a>
                                                                <a href="{{ url('editSpecialFeeVoucher', $vouc->id) }}"
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
    <!-- content -->
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
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script> --}}

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
                order: [
                    [0, 'desc']
                ], // Set default sort on the first column (0-indexed) in descending order
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
                        <button id="btnPrintVouchers" class="btn btn-sm our-color-1 rounded-2 shadow"><i class="fa-solid fa-print"></i></button>
                        <button id="btnExportVouchersToPDF" class="btn btn-sm our-color-1 rounded-2 shadow"><i class="fa-solid fa-file-pdf"></i></button>
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
                        // exportVouchersToPDF();
                    });

                    // Listen to both month and year filter changes
                    $('#monthFilter, #yearFilter').on('change', function() {
                        applyFilters();
                    });
                }
            });

            function fetchVoucherData(voucherId) {
                // Fetch the voucher data via an AJAX call (or use existing data in the table)
                return $.ajax({
                    url: `getSpecialVoucherIndivisual/${voucherId}`, // Update the URL to match your API endpoint
                    method: 'GET',
                    dataType: 'json'
                });
            }

            function generateVoucherLayout(data) {
                // Generate the barcode image and insert it as an image tag
                var barcodeImage = generateBarcodeImage(data.gr_number);

                return `
                            <div class="voucher-layout">
                            <div class="p-2">
                                <div style="text-align: center;">
                                    <img src="${barcodeImage}" height="60px" width="130px">
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
                                                <span class="voucher-text">${data.students_add.current_class}</span>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <p class="col-4 voucher-text">Section</p>
                                                <span class="voucher-text">${data.students_add.section}</span>
                                            </div>
                                        </div>
                                        <div class="col-4">
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
                                    <img src="${barcodeImage}" height="60px" width="130px">
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
                                                <span class="voucher-text">${data.students_add.current_class}</span>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <p class="col-4 voucher-text">Section</p>
                                                <span class="voucher-text">${data.students_add.section}</span>
                                            </div>
                                        </div>
                                        <div class="col-4">
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
                                    <img src="${barcodeImage}" height="60px" width="130px">
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
                                                <span class="voucher-text">${data.students_add.current_class}</span>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <p class="col-4 voucher-text">Section</p>
                                                <span class="voucher-text">${data.students_add.section}</span>
                                            </div>
                                        </div>
                                        <div class="col-4">
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
                            
                            :root {
                                --blue: #007bff;
                                --indigo: #6610f2;
                                --purple: #6f42c1;
                                --pink: #e83e8c;
                                --red: #dc3545;
                                --orange: #fd7e14;
                                --yellow: #ffc107;
                                --green: #28a745;
                                --teal: #20c997;
                                --cyan: #17a2b8;
                                --white: #fff;
                                --gray: #6c757d;
                                --gray-dark: #343a40;
                                --primary: #007bff;
                                --secondary: #6c757d;
                                --success: #28a745;
                                --info: #17a2b8;
                                --warning: #ffc107;
                                --danger: #dc3545;
                                --light: #f8f9fa;
                                --dark: #343a40;
                                --breakpoint-xs: 0;
                                --breakpoint-sm: 576px;
                                --breakpoint-md: 768px;
                                --breakpoint-lg: 992px;
                                --breakpoint-xl: 1200px;
                                --font-family-sans-serif: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
                                --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace
                            }

                            *,
                            ::after,
                            ::before {
                                box-sizing: border-box
                            }

                            html {
                                font-family: sans-serif;
                                line-height: 1.15;
                                -webkit-text-size-adjust: 100%;
                                -webkit-tap-highlight-color: transparent
                            }

                            article,
                            aside,
                            figcaption,
                            figure,
                            footer,
                            header,
                            hgroup,
                            main,
                            nav,
                            section {
                                display: block
                            }

                            body {
                                margin: 0;
                                font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
                                font-size: 1rem;
                                font-weight: 400;
                                line-height: 1.5;
                                color: #212529;
                                text-align: left;
                                background-color: #fff
                            }

                            [tabindex="-1"]:focus:not(:focus-visible) {
                                outline: 0 !important
                            }

                            hr {
                                box-sizing: content-box;
                                height: 0;
                                overflow: visible
                            }

                            h1,
                            h2,
                            h3,
                            h4,
                            h5,
                            h6 {
                                margin-top: 0;
                                margin-bottom: .5rem
                            }

                            p {
                                margin-top: 0;
                                margin-bottom: 1rem
                            }

                            abbr[data-original-title],
                            abbr[title] {
                                text-decoration: underline;
                                -webkit-text-decoration: underline dotted;
                                text-decoration: underline dotted;
                                cursor: help;
                                border-bottom: 0;
                                -webkit-text-decoration-skip-ink: none;
                                text-decoration-skip-ink: none
                            }

                            address {
                                margin-bottom: 1rem;
                                font-style: normal;
                                line-height: inherit
                            }

                            dl,
                            ol,
                            ul {
                                margin-top: 0;
                                margin-bottom: 1rem
                            }

                            ol ol,
                            ol ul,
                            ul ol,
                            ul ul {
                                margin-bottom: 0
                            }

                            dt {
                                font-weight: 700
                            }

                            dd {
                                margin-bottom: .5rem;
                                margin-left: 0
                            }

                            blockquote {
                                margin: 0 0 1rem
                            }

                            b,
                            strong {
                                font-weight: bolder
                            }

                            small {
                                font-size: 80%
                            }

                            sub,
                            sup {
                                position: relative;
                                font-size: 75%;
                                line-height: 0;
                                vertical-align: baseline
                            }

                            sub {
                                bottom: -.25em
                            }

                            sup {
                                top: -.5em
                            }

                            a {
                                color: #007bff;
                                text-decoration: none;
                                background-color: transparent
                            }

                            a:hover {
                                color: #0056b3;
                                text-decoration: none
                            }

                            a:not([href]):not([class]) {
                                color: inherit;
                                text-decoration: none
                            }

                            a:not([href]):not([class]):hover {
                                color: inherit;
                                text-decoration: none
                            }

                            code,
                            kbd,
                            pre,
                            samp {
                                font-family: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
                                font-size: 1em
                            }

                            pre {
                                margin-top: 0;
                                margin-bottom: 1rem;
                                overflow: auto;
                                -ms-overflow-style: scrollbar
                            }

                            figure {
                                margin: 0 0 1rem
                            }

                            img {
                                vertical-align: middle;
                                border-style: none
                            }

                            svg {
                                overflow: hidden;
                                vertical-align: middle
                            }

                            table {
                                border-collapse: collapse
                            }

                            caption {
                                padding-top: .75rem;
                                padding-bottom: .75rem;
                                color: #6c757d;
                                text-align: left;
                                caption-side: bottom
                            }

                            th {
                                text-align: inherit;
                                text-align: -webkit-match-parent
                            }

                            label {
                                display: inline-block;
                                margin-bottom: .5rem
                            }

                            button {
                                border-radius: 0
                            }

                            button:focus:not(:focus-visible) {
                                outline: 0
                            }

                            button,
                            input,
                            optgroup,
                            select,
                            textarea {
                                margin: 0;
                                font-family: inherit;
                                font-size: inherit;
                                line-height: inherit
                            }

                            button,
                            input {
                                overflow: visible
                            }

                            button,
                            select {
                                text-transform: none
                            }

                            [role=button] {
                                cursor: pointer
                            }

                            select {
                                word-wrap: normal
                            }

                            [type=button],
                            [type=reset],
                            [type=submit],
                            button {
                                -webkit-appearance: button
                            }

                            [type=button]:not(:disabled),
                            [type=reset]:not(:disabled),
                            [type=submit]:not(:disabled),
                            button:not(:disabled) {
                                cursor: pointer
                            }

                            [type=button]::-moz-focus-inner,
                            [type=reset]::-moz-focus-inner,
                            [type=submit]::-moz-focus-inner,
                            button::-moz-focus-inner {
                                padding: 0;
                                border-style: none
                            }

                            input[type=checkbox],
                            input[type=radio] {
                                box-sizing: border-box;
                                padding: 0
                            }

                            textarea {
                                overflow: auto;
                                resize: vertical
                            }

                            fieldset {
                                min-width: 0;
                                padding: 0;
                                margin: 0;
                                border: 0
                            }

                            legend {
                                display: block;
                                width: 100%;
                                max-width: 100%;
                                padding: 0;
                                margin-bottom: .5rem;
                                font-size: 1.5rem;
                                line-height: inherit;
                                color: inherit;
                                white-space: normal
                            }

                            progress {
                                vertical-align: baseline
                            }

                            [type=number]::-webkit-inner-spin-button,
                            [type=number]::-webkit-outer-spin-button {
                                height: auto
                            }

                            [type=search] {
                                outline-offset: -2px;
                                -webkit-appearance: none
                            }

                            [type=search]::-webkit-search-decoration {
                                -webkit-appearance: none
                            }

                            ::-webkit-file-upload-button {
                                font: inherit;
                                -webkit-appearance: button
                            }

                            output {
                                display: inline-block
                            }

                            summary {
                                display: list-item;
                                cursor: pointer
                            }

                            template {
                                display: none
                            }

                            [hidden] {
                                display: none !important
                            }

                            .h1,
                            .h2,
                            .h3,
                            .h4,
                            .h5,
                            .h6,
                            h1,
                            h2,
                            h3,
                            h4,
                            h5,
                            h6 {
                                margin-bottom: .5rem;
                                font-family: inherit;
                                font-weight: 500;
                                line-height: 1.2;
                                color: inherit
                            }

                            .h1,
                            h1 {
                                font-size: 2.5rem
                            }

                            .h2,
                            h2 {
                                font-size: 2rem
                            }

                            .h3,
                            h3 {
                                font-size: 1.75rem
                            }

                            .h4,
                            h4 {
                                font-size: 1.5rem
                            }

                            .h5,
                            h5 {
                                font-size: 1.25rem
                            }

                            .h6,
                            h6 {
                                font-size: 1rem
                            }

                            .lead {
                                font-size: 1.25rem;
                                font-weight: 300
                            }

                            .display-1 {
                                font-size: 6rem;
                                font-weight: 300;
                                line-height: 1.2
                            }

                            .display-2 {
                                font-size: 5.5rem;
                                font-weight: 300;
                                line-height: 1.2
                            }

                            .display-3 {
                                font-size: 4.5rem;
                                font-weight: 300;
                                line-height: 1.2
                            }

                            .display-4 {
                                font-size: 3.5rem;
                                font-weight: 300;
                                line-height: 1.2
                            }

                            hr {
                                margin-top: 1rem;
                                margin-bottom: 1rem;
                                border: 0;
                                border-top: 1px solid rgba(0, 0, 0, .1)
                            }

                            .small,
                            small {
                                font-size: 80%;
                                font-weight: 400
                            }

                            .mark,
                            mark {
                                padding: .2em;
                                background-color: #fcf8e3
                            }

                            .list-unstyled {
                                padding-left: 0;
                                list-style: none
                            }

                            .list-inline {
                                padding-left: 0;
                                list-style: none
                            }

                            .list-inline-item {
                                display: inline-block
                            }

                            .list-inline-item:not(:last-child) {
                                margin-right: .5rem
                            }

                            .initialism {
                                font-size: 90%;
                                text-transform: uppercase
                            }

                            .img-fluid {
                                max-width: 100%;
                                height: auto
                            }

                            .img-thumbnail {
                                padding: .25rem;
                                background-color: #fff;
                                border: 1px solid #dee2e6;
                                border-radius: .25rem;
                                box-shadow: 0 1px 2px rgba(0, 0, 0, .075);
                                max-width: 100%;
                                height: auto
                            }

                            .figure {
                                display: inline-block
                            }

                            .figure-img {
                                margin-bottom: .5rem;
                                line-height: 1
                            }

                            .figure-caption {
                                font-size: 90%;
                                color: #6c757d
                            }

                            code {
                                font-size: 87.5%;
                                color: #e83e8c;
                                word-wrap: break-word
                            }

                            a>code {
                                color: inherit
                            }

                            kbd {
                                padding: .2rem .4rem;
                                font-size: 87.5%;
                                color: #fff;
                                background-color: #212529;
                                border-radius: .2rem;
                                box-shadow: inset 0 -.1rem 0 rgba(0, 0, 0, .25)
                            }

                            kbd kbd {
                                padding: 0;
                                font-size: 100%;
                                font-weight: 700;
                                box-shadow: none
                            }

                            pre {
                                display: block;
                                font-size: 87.5%;
                                color: #212529
                            }

                            pre code {
                                font-size: inherit;
                                color: inherit;
                                word-break: normal
                            }

                            .pre-scrollable {
                                max-height: 340px;
                                overflow-y: scroll
                            }

                            .container,
                            .container-fluid,
                            .container-lg,
                            .container-md,
                            .container-sm,
                            .container-xl {
                                width: 100%;
                                padding-right: 7.5px;
                                padding-left: 7.5px;
                                margin-right: auto;
                                margin-left: auto
                            }

                            @media (min-width:576px) {

                                .container,
                                .container-sm {
                                    max-width: 540px
                                }
                            }

                            @media (min-width:768px) {

                                .container,
                                .container-md,
                                .container-sm {
                                    max-width: 720px
                                }
                            }

                            @media (min-width:992px) {

                                .container,
                                .container-lg,
                                .container-md,
                                .container-sm {
                                    max-width: 960px
                                }
                            }

                            @media (min-width:1200px) {

                                .container,
                                .container-lg,
                                .container-md,
                                .container-sm,
                                .container-xl {
                                    max-width: 1140px
                                }
                            }

                            .row {
                                display: -ms-flexbox;
                                display: flex;
                                -ms-flex-wrap: wrap;
                                flex-wrap: wrap;
                                margin-right: -7.5px;
                                margin-left: -7.5px
                            }

                            .no-gutters {
                                margin-right: 0;
                                margin-left: 0
                            }

                            .no-gutters>.col,
                            .no-gutters>[class*=col-] {
                                padding-right: 0;
                                padding-left: 0
                            }

                            .col,
                            .col-1,
                            .col-10,
                            .col-11,
                            .col-12,
                            .col-2,
                            .col-3,
                            .col-4,
                            .col-5,
                            .col-6,
                            .col-7,
                            .col-8,
                            .col-9,
                            .col-auto,
                            .col-lg,
                            .col-lg-1,
                            .col-lg-10,
                            .col-lg-11,
                            .col-lg-12,
                            .col-lg-2,
                            .col-lg-3,
                            .col-lg-4,
                            .col-lg-5,
                            .col-lg-6,
                            .col-lg-7,
                            .col-lg-8,
                            .col-lg-9,
                            .col-lg-auto,
                            .col-md,
                            .col-md-1,
                            .col-md-10,
                            .col-md-11,
                            .col-md-12,
                            .col-md-2,
                            .col-md-3,
                            .col-md-4,
                            .col-md-5,
                            .col-md-6,
                            .col-md-7,
                            .col-md-8,
                            .col-md-9,
                            .col-md-auto,
                            .col-sm,
                            .col-sm-1,
                            .col-sm-10,
                            .col-sm-11,
                            .col-sm-12,
                            .col-sm-2,
                            .col-sm-3,
                            .col-sm-4,
                            .col-sm-5,
                            .col-sm-6,
                            .col-sm-7,
                            .col-sm-8,
                            .col-sm-9,
                            .col-sm-auto,
                            .col-xl,
                            .col-xl-1,
                            .col-xl-10,
                            .col-xl-11,
                            .col-xl-12,
                            .col-xl-2,
                            .col-xl-3,
                            .col-xl-4,
                            .col-xl-5,
                            .col-xl-6,
                            .col-xl-7,
                            .col-xl-8,
                            .col-xl-9,
                            .col-xl-auto {
                                position: relative;
                                width: 100%;
                                padding-right: 7.5px;
                                padding-left: 7.5px
                            }

                            .col {
                                -ms-flex-preferred-size: 0;
                                flex-basis: 0;
                                -ms-flex-positive: 1;
                                flex-grow: 1;
                                max-width: 100%
                            }

                            .row-cols-1>* {
                                -ms-flex: 0 0 100%;
                                flex: 0 0 100%;
                                max-width: 100%
                            }

                            .row-cols-2>* {
                                -ms-flex: 0 0 50%;
                                flex: 0 0 50%;
                                max-width: 50%
                            }

                            .row-cols-3>* {
                                -ms-flex: 0 0 33.333333%;
                                flex: 0 0 33.333333%;
                                max-width: 33.333333%
                            }

                            .row-cols-4>* {
                                -ms-flex: 0 0 25%;
                                flex: 0 0 25%;
                                max-width: 25%
                            }

                            .row-cols-5>* {
                                -ms-flex: 0 0 20%;
                                flex: 0 0 20%;
                                max-width: 20%
                            }

                            .row-cols-6>* {
                                -ms-flex: 0 0 16.666667%;
                                flex: 0 0 16.666667%;
                                max-width: 16.666667%
                            }

                            .col-auto {
                                -ms-flex: 0 0 auto;
                                flex: 0 0 auto;
                                width: auto;
                                max-width: 100%
                            }

                            .col-1 {
                                -ms-flex: 0 0 8.333333%;
                                flex: 0 0 8.333333%;
                                max-width: 8.333333%
                            }

                            .col-2 {
                                -ms-flex: 0 0 16.666667%;
                                flex: 0 0 16.666667%;
                                max-width: 16.666667%
                            }

                            .col-3 {
                                -ms-flex: 0 0 25%;
                                flex: 0 0 25%;
                                max-width: 25%
                            }

                            .col-4 {
                                -ms-flex: 0 0 33.333333%;
                                flex: 0 0 33.333333%;
                                max-width: 33.333333%
                            }

                            .col-5 {
                                -ms-flex: 0 0 41.666667%;
                                flex: 0 0 41.666667%;
                                max-width: 41.666667%
                            }

                            .col-6 {
                                -ms-flex: 0 0 50%;
                                flex: 0 0 50%;
                                max-width: 50%
                            }

                            .col-7 {
                                -ms-flex: 0 0 58.333333%;
                                flex: 0 0 58.333333%;
                                max-width: 58.333333%
                            }

                            .col-8 {
                                -ms-flex: 0 0 66.666667%;
                                flex: 0 0 66.666667%;
                                max-width: 66.666667%
                            }

                            .col-9 {
                                -ms-flex: 0 0 75%;
                                flex: 0 0 75%;
                                max-width: 75%
                            }

                            .col-10 {
                                -ms-flex: 0 0 83.333333%;
                                flex: 0 0 83.333333%;
                                max-width: 83.333333%
                            }

                            .col-11 {
                                -ms-flex: 0 0 91.666667%;
                                flex: 0 0 91.666667%;
                                max-width: 91.666667%
                            }

                            .col-12 {
                                -ms-flex: 0 0 100%;
                                flex: 0 0 100%;
                                max-width: 100%
                            }

                            .order-first {
                                -ms-flex-order: -1;
                                order: -1
                            }

                            .order-last {
                                -ms-flex-order: 13;
                                order: 13
                            }

                            .order-0 {
                                -ms-flex-order: 0;
                                order: 0
                            }

                            .order-1 {
                                -ms-flex-order: 1;
                                order: 1
                            }

                            .order-2 {
                                -ms-flex-order: 2;
                                order: 2
                            }

                            .order-3 {
                                -ms-flex-order: 3;
                                order: 3
                            }

                            .order-4 {
                                -ms-flex-order: 4;
                                order: 4
                            }

                            .order-5 {
                                -ms-flex-order: 5;
                                order: 5
                            }

                            .order-6 {
                                -ms-flex-order: 6;
                                order: 6
                            }

                            .order-7 {
                                -ms-flex-order: 7;
                                order: 7
                            }

                            .order-8 {
                                -ms-flex-order: 8;
                                order: 8
                            }

                            .order-9 {
                                -ms-flex-order: 9;
                                order: 9
                            }

                            .order-10 {
                                -ms-flex-order: 10;
                                order: 10
                            }

                            .order-11 {
                                -ms-flex-order: 11;
                                order: 11
                            }

                            .order-12 {
                                -ms-flex-order: 12;
                                order: 12
                            }

                            .offset-1 {
                                margin-left: 8.333333%
                            }

                            .offset-2 {
                                margin-left: 16.666667%
                            }

                            .offset-3 {
                                margin-left: 25%
                            }

                            .offset-4 {
                                margin-left: 33.333333%
                            }

                            .offset-5 {
                                margin-left: 41.666667%
                            }

                            .offset-6 {
                                margin-left: 50%
                            }

                            .offset-7 {
                                margin-left: 58.333333%
                            }

                            .offset-8 {
                                margin-left: 66.666667%
                            }

                            .offset-9 {
                                margin-left: 75%
                            }

                            .offset-10 {
                                margin-left: 83.333333%
                            }

                            .offset-11 {
                                margin-left: 91.666667%
                            }

                            @media (min-width:576px) {
                                .col-sm {
                                    -ms-flex-preferred-size: 0;
                                    flex-basis: 0;
                                    -ms-flex-positive: 1;
                                    flex-grow: 1;
                                    max-width: 100%
                                }

                                .row-cols-sm-1>* {
                                    -ms-flex: 0 0 100%;
                                    flex: 0 0 100%;
                                    max-width: 100%
                                }

                                .row-cols-sm-2>* {
                                    -ms-flex: 0 0 50%;
                                    flex: 0 0 50%;
                                    max-width: 50%
                                }

                                .row-cols-sm-3>* {
                                    -ms-flex: 0 0 33.333333%;
                                    flex: 0 0 33.333333%;
                                    max-width: 33.333333%
                                }

                                .row-cols-sm-4>* {
                                    -ms-flex: 0 0 25%;
                                    flex: 0 0 25%;
                                    max-width: 25%
                                }

                                .row-cols-sm-5>* {
                                    -ms-flex: 0 0 20%;
                                    flex: 0 0 20%;
                                    max-width: 20%
                                }

                                .row-cols-sm-6>* {
                                    -ms-flex: 0 0 16.666667%;
                                    flex: 0 0 16.666667%;
                                    max-width: 16.666667%
                                }

                                .col-sm-auto {
                                    -ms-flex: 0 0 auto;
                                    flex: 0 0 auto;
                                    width: auto;
                                    max-width: 100%
                                }

                                .col-sm-1 {
                                    -ms-flex: 0 0 8.333333%;
                                    flex: 0 0 8.333333%;
                                    max-width: 8.333333%
                                }

                                .col-sm-2 {
                                    -ms-flex: 0 0 16.666667%;
                                    flex: 0 0 16.666667%;
                                    max-width: 16.666667%
                                }

                                .col-sm-3 {
                                    -ms-flex: 0 0 25%;
                                    flex: 0 0 25%;
                                    max-width: 25%
                                }

                                .col-sm-4 {
                                    -ms-flex: 0 0 33.333333%;
                                    flex: 0 0 33.333333%;
                                    max-width: 33.333333%
                                }

                                .col-sm-5 {
                                    -ms-flex: 0 0 41.666667%;
                                    flex: 0 0 41.666667%;
                                    max-width: 41.666667%
                                }

                                .col-sm-6 {
                                    -ms-flex: 0 0 50%;
                                    flex: 0 0 50%;
                                    max-width: 50%
                                }

                                .col-sm-7 {
                                    -ms-flex: 0 0 58.333333%;
                                    flex: 0 0 58.333333%;
                                    max-width: 58.333333%
                                }

                                .col-sm-8 {
                                    -ms-flex: 0 0 66.666667%;
                                    flex: 0 0 66.666667%;
                                    max-width: 66.666667%
                                }

                                .col-sm-9 {
                                    -ms-flex: 0 0 75%;
                                    flex: 0 0 75%;
                                    max-width: 75%
                                }

                                .col-sm-10 {
                                    -ms-flex: 0 0 83.333333%;
                                    flex: 0 0 83.333333%;
                                    max-width: 83.333333%
                                }

                                .col-sm-11 {
                                    -ms-flex: 0 0 91.666667%;
                                    flex: 0 0 91.666667%;
                                    max-width: 91.666667%
                                }

                                .col-sm-12 {
                                    -ms-flex: 0 0 100%;
                                    flex: 0 0 100%;
                                    max-width: 100%
                                }

                                .order-sm-first {
                                    -ms-flex-order: -1;
                                    order: -1
                                }

                                .order-sm-last {
                                    -ms-flex-order: 13;
                                    order: 13
                                }

                                .order-sm-0 {
                                    -ms-flex-order: 0;
                                    order: 0
                                }

                                .order-sm-1 {
                                    -ms-flex-order: 1;
                                    order: 1
                                }

                                .order-sm-2 {
                                    -ms-flex-order: 2;
                                    order: 2
                                }

                                .order-sm-3 {
                                    -ms-flex-order: 3;
                                    order: 3
                                }

                                .order-sm-4 {
                                    -ms-flex-order: 4;
                                    order: 4
                                }

                                .order-sm-5 {
                                    -ms-flex-order: 5;
                                    order: 5
                                }

                                .order-sm-6 {
                                    -ms-flex-order: 6;
                                    order: 6
                                }

                                .order-sm-7 {
                                    -ms-flex-order: 7;
                                    order: 7
                                }

                                .order-sm-8 {
                                    -ms-flex-order: 8;
                                    order: 8
                                }

                                .order-sm-9 {
                                    -ms-flex-order: 9;
                                    order: 9
                                }

                                .order-sm-10 {
                                    -ms-flex-order: 10;
                                    order: 10
                                }

                                .order-sm-11 {
                                    -ms-flex-order: 11;
                                    order: 11
                                }

                                .order-sm-12 {
                                    -ms-flex-order: 12;
                                    order: 12
                                }

                                .offset-sm-0 {
                                    margin-left: 0
                                }

                                .offset-sm-1 {
                                    margin-left: 8.333333%
                                }

                                .offset-sm-2 {
                                    margin-left: 16.666667%
                                }

                                .offset-sm-3 {
                                    margin-left: 25%
                                }

                                .offset-sm-4 {
                                    margin-left: 33.333333%
                                }

                                .offset-sm-5 {
                                    margin-left: 41.666667%
                                }

                                .offset-sm-6 {
                                    margin-left: 50%
                                }

                                .offset-sm-7 {
                                    margin-left: 58.333333%
                                }

                                .offset-sm-8 {
                                    margin-left: 66.666667%
                                }

                                .offset-sm-9 {
                                    margin-left: 75%
                                }

                                .offset-sm-10 {
                                    margin-left: 83.333333%
                                }

                                .offset-sm-11 {
                                    margin-left: 91.666667%
                                }
                            }

                            @media (min-width:768px) {
                                .col-md {
                                    -ms-flex-preferred-size: 0;
                                    flex-basis: 0;
                                    -ms-flex-positive: 1;
                                    flex-grow: 1;
                                    max-width: 100%
                                }

                                .row-cols-md-1>* {
                                    -ms-flex: 0 0 100%;
                                    flex: 0 0 100%;
                                    max-width: 100%
                                }

                                .row-cols-md-2>* {
                                    -ms-flex: 0 0 50%;
                                    flex: 0 0 50%;
                                    max-width: 50%
                                }

                                .row-cols-md-3>* {
                                    -ms-flex: 0 0 33.333333%;
                                    flex: 0 0 33.333333%;
                                    max-width: 33.333333%
                                }

                                .row-cols-md-4>* {
                                    -ms-flex: 0 0 25%;
                                    flex: 0 0 25%;
                                    max-width: 25%
                                }

                                .row-cols-md-5>* {
                                    -ms-flex: 0 0 20%;
                                    flex: 0 0 20%;
                                    max-width: 20%
                                }

                                .row-cols-md-6>* {
                                    -ms-flex: 0 0 16.666667%;
                                    flex: 0 0 16.666667%;
                                    max-width: 16.666667%
                                }

                                .col-md-auto {
                                    -ms-flex: 0 0 auto;
                                    flex: 0 0 auto;
                                    width: auto;
                                    max-width: 100%
                                }

                                .col-md-1 {
                                    -ms-flex: 0 0 8.333333%;
                                    flex: 0 0 8.333333%;
                                    max-width: 8.333333%
                                }

                                .col-md-2 {
                                    -ms-flex: 0 0 16.666667%;
                                    flex: 0 0 16.666667%;
                                    max-width: 16.666667%
                                }

                                .col-md-3 {
                                    -ms-flex: 0 0 25%;
                                    flex: 0 0 25%;
                                    max-width: 25%
                                }

                                .col-md-4 {
                                    -ms-flex: 0 0 33.333333%;
                                    flex: 0 0 33.333333%;
                                    max-width: 33.333333%
                                }

                                .col-md-5 {
                                    -ms-flex: 0 0 41.666667%;
                                    flex: 0 0 41.666667%;
                                    max-width: 41.666667%
                                }

                                .col-md-6 {
                                    -ms-flex: 0 0 50%;
                                    flex: 0 0 50%;
                                    max-width: 50%
                                }

                                .col-md-7 {
                                    -ms-flex: 0 0 58.333333%;
                                    flex: 0 0 58.333333%;
                                    max-width: 58.333333%
                                }

                                .col-md-8 {
                                    -ms-flex: 0 0 66.666667%;
                                    flex: 0 0 66.666667%;
                                    max-width: 66.666667%
                                }

                                .col-md-9 {
                                    -ms-flex: 0 0 75%;
                                    flex: 0 0 75%;
                                    max-width: 75%
                                }

                                .col-md-10 {
                                    -ms-flex: 0 0 83.333333%;
                                    flex: 0 0 83.333333%;
                                    max-width: 83.333333%
                                }

                                .col-md-11 {
                                    -ms-flex: 0 0 91.666667%;
                                    flex: 0 0 91.666667%;
                                    max-width: 91.666667%
                                }

                                .col-md-12 {
                                    -ms-flex: 0 0 100%;
                                    flex: 0 0 100%;
                                    max-width: 100%
                                }

                                .order-md-first {
                                    -ms-flex-order: -1;
                                    order: -1
                                }

                                .order-md-last {
                                    -ms-flex-order: 13;
                                    order: 13
                                }

                                .order-md-0 {
                                    -ms-flex-order: 0;
                                    order: 0
                                }

                                .order-md-1 {
                                    -ms-flex-order: 1;
                                    order: 1
                                }

                                .order-md-2 {
                                    -ms-flex-order: 2;
                                    order: 2
                                }

                                .order-md-3 {
                                    -ms-flex-order: 3;
                                    order: 3
                                }

                                .order-md-4 {
                                    -ms-flex-order: 4;
                                    order: 4
                                }

                                .order-md-5 {
                                    -ms-flex-order: 5;
                                    order: 5
                                }

                                .order-md-6 {
                                    -ms-flex-order: 6;
                                    order: 6
                                }

                                .order-md-7 {
                                    -ms-flex-order: 7;
                                    order: 7
                                }

                                .order-md-8 {
                                    -ms-flex-order: 8;
                                    order: 8
                                }

                                .order-md-9 {
                                    -ms-flex-order: 9;
                                    order: 9
                                }

                                .order-md-10 {
                                    -ms-flex-order: 10;
                                    order: 10
                                }

                                .order-md-11 {
                                    -ms-flex-order: 11;
                                    order: 11
                                }

                                .order-md-12 {
                                    -ms-flex-order: 12;
                                    order: 12
                                }

                                .offset-md-0 {
                                    margin-left: 0
                                }

                                .offset-md-1 {
                                    margin-left: 8.333333%
                                }

                                .offset-md-2 {
                                    margin-left: 16.666667%
                                }

                                .offset-md-3 {
                                    margin-left: 25%
                                }

                                .offset-md-4 {
                                    margin-left: 33.333333%
                                }

                                .offset-md-5 {
                                    margin-left: 41.666667%
                                }

                                .offset-md-6 {
                                    margin-left: 50%
                                }

                                .offset-md-7 {
                                    margin-left: 58.333333%
                                }

                                .offset-md-8 {
                                    margin-left: 66.666667%
                                }

                                .offset-md-9 {
                                    margin-left: 75%
                                }

                                .offset-md-10 {
                                    margin-left: 83.333333%
                                }

                                .offset-md-11 {
                                    margin-left: 91.666667%
                                }
                            }

                            @media (min-width:992px) {
                                .col-lg {
                                    -ms-flex-preferred-size: 0;
                                    flex-basis: 0;
                                    -ms-flex-positive: 1;
                                    flex-grow: 1;
                                    max-width: 100%
                                }

                                .row-cols-lg-1>* {
                                    -ms-flex: 0 0 100%;
                                    flex: 0 0 100%;
                                    max-width: 100%
                                }

                                .row-cols-lg-2>* {
                                    -ms-flex: 0 0 50%;
                                    flex: 0 0 50%;
                                    max-width: 50%
                                }

                                .row-cols-lg-3>* {
                                    -ms-flex: 0 0 33.333333%;
                                    flex: 0 0 33.333333%;
                                    max-width: 33.333333%
                                }

                                .row-cols-lg-4>* {
                                    -ms-flex: 0 0 25%;
                                    flex: 0 0 25%;
                                    max-width: 25%
                                }

                                .row-cols-lg-5>* {
                                    -ms-flex: 0 0 20%;
                                    flex: 0 0 20%;
                                    max-width: 20%
                                }

                                .row-cols-lg-6>* {
                                    -ms-flex: 0 0 16.666667%;
                                    flex: 0 0 16.666667%;
                                    max-width: 16.666667%
                                }

                                .col-lg-auto {
                                    -ms-flex: 0 0 auto;
                                    flex: 0 0 auto;
                                    width: auto;
                                    max-width: 100%
                                }

                                .col-lg-1 {
                                    -ms-flex: 0 0 8.333333%;
                                    flex: 0 0 8.333333%;
                                    max-width: 8.333333%
                                }

                                .col-lg-2 {
                                    -ms-flex: 0 0 16.666667%;
                                    flex: 0 0 16.666667%;
                                    max-width: 16.666667%
                                }

                                .col-lg-3 {
                                    -ms-flex: 0 0 25%;
                                    flex: 0 0 25%;
                                    max-width: 25%
                                }

                                .col-lg-4 {
                                    -ms-flex: 0 0 33.333333%;
                                    flex: 0 0 33.333333%;
                                    max-width: 33.333333%
                                }

                                .col-lg-5 {
                                    -ms-flex: 0 0 41.666667%;
                                    flex: 0 0 41.666667%;
                                    max-width: 41.666667%
                                }

                                .col-lg-6 {
                                    -ms-flex: 0 0 50%;
                                    flex: 0 0 50%;
                                    max-width: 50%
                                }

                                .col-lg-7 {
                                    -ms-flex: 0 0 58.333333%;
                                    flex: 0 0 58.333333%;
                                    max-width: 58.333333%
                                }

                                .col-lg-8 {
                                    -ms-flex: 0 0 66.666667%;
                                    flex: 0 0 66.666667%;
                                    max-width: 66.666667%
                                }

                                .col-lg-9 {
                                    -ms-flex: 0 0 75%;
                                    flex: 0 0 75%;
                                    max-width: 75%
                                }

                                .col-lg-10 {
                                    -ms-flex: 0 0 83.333333%;
                                    flex: 0 0 83.333333%;
                                    max-width: 83.333333%
                                }

                                .col-lg-11 {
                                    -ms-flex: 0 0 91.666667%;
                                    flex: 0 0 91.666667%;
                                    max-width: 91.666667%
                                }

                                .col-lg-12 {
                                    -ms-flex: 0 0 100%;
                                    flex: 0 0 100%;
                                    max-width: 100%
                                }

                                .order-lg-first {
                                    -ms-flex-order: -1;
                                    order: -1
                                }

                                .order-lg-last {
                                    -ms-flex-order: 13;
                                    order: 13
                                }

                                .order-lg-0 {
                                    -ms-flex-order: 0;
                                    order: 0
                                }

                                .order-lg-1 {
                                    -ms-flex-order: 1;
                                    order: 1
                                }

                                .order-lg-2 {
                                    -ms-flex-order: 2;
                                    order: 2
                                }

                                .order-lg-3 {
                                    -ms-flex-order: 3;
                                    order: 3
                                }

                                .order-lg-4 {
                                    -ms-flex-order: 4;
                                    order: 4
                                }

                                .order-lg-5 {
                                    -ms-flex-order: 5;
                                    order: 5
                                }

                                .order-lg-6 {
                                    -ms-flex-order: 6;
                                    order: 6
                                }

                                .order-lg-7 {
                                    -ms-flex-order: 7;
                                    order: 7
                                }

                                .order-lg-8 {
                                    -ms-flex-order: 8;
                                    order: 8
                                }

                                .order-lg-9 {
                                    -ms-flex-order: 9;
                                    order: 9
                                }

                                .order-lg-10 {
                                    -ms-flex-order: 10;
                                    order: 10
                                }

                                .order-lg-11 {
                                    -ms-flex-order: 11;
                                    order: 11
                                }

                                .order-lg-12 {
                                    -ms-flex-order: 12;
                                    order: 12
                                }

                                .offset-lg-0 {
                                    margin-left: 0
                                }

                                .offset-lg-1 {
                                    margin-left: 8.333333%
                                }

                                .offset-lg-2 {
                                    margin-left: 16.666667%
                                }

                                .offset-lg-3 {
                                    margin-left: 25%
                                }

                                .offset-lg-4 {
                                    margin-left: 33.333333%
                                }

                                .offset-lg-5 {
                                    margin-left: 41.666667%
                                }

                                .offset-lg-6 {
                                    margin-left: 50%
                                }

                                .offset-lg-7 {
                                    margin-left: 58.333333%
                                }

                                .offset-lg-8 {
                                    margin-left: 66.666667%
                                }

                                .offset-lg-9 {
                                    margin-left: 75%
                                }

                                .offset-lg-10 {
                                    margin-left: 83.333333%
                                }

                                .offset-lg-11 {
                                    margin-left: 91.666667%
                                }
                            }

                            @media (min-width:1200px) {
                                .col-xl {
                                    -ms-flex-preferred-size: 0;
                                    flex-basis: 0;
                                    -ms-flex-positive: 1;
                                    flex-grow: 1;
                                    max-width: 100%
                                }

                                .row-cols-xl-1>* {
                                    -ms-flex: 0 0 100%;
                                    flex: 0 0 100%;
                                    max-width: 100%
                                }

                                .row-cols-xl-2>* {
                                    -ms-flex: 0 0 50%;
                                    flex: 0 0 50%;
                                    max-width: 50%
                                }

                                .row-cols-xl-3>* {
                                    -ms-flex: 0 0 33.333333%;
                                    flex: 0 0 33.333333%;
                                    max-width: 33.333333%
                                }

                                .row-cols-xl-4>* {
                                    -ms-flex: 0 0 25%;
                                    flex: 0 0 25%;
                                    max-width: 25%
                                }

                                .row-cols-xl-5>* {
                                    -ms-flex: 0 0 20%;
                                    flex: 0 0 20%;
                                    max-width: 20%
                                }

                                .row-cols-xl-6>* {
                                    -ms-flex: 0 0 16.666667%;
                                    flex: 0 0 16.666667%;
                                    max-width: 16.666667%
                                }

                                .col-xl-auto {
                                    -ms-flex: 0 0 auto;
                                    flex: 0 0 auto;
                                    width: auto;
                                    max-width: 100%
                                }

                                .col-xl-1 {
                                    -ms-flex: 0 0 8.333333%;
                                    flex: 0 0 8.333333%;
                                    max-width: 8.333333%
                                }

                                .col-xl-2 {
                                    -ms-flex: 0 0 16.666667%;
                                    flex: 0 0 16.666667%;
                                    max-width: 16.666667%
                                }

                                .col-xl-3 {
                                    -ms-flex: 0 0 25%;
                                    flex: 0 0 25%;
                                    max-width: 25%
                                }

                                .col-xl-4 {
                                    -ms-flex: 0 0 33.333333%;
                                    flex: 0 0 33.333333%;
                                    max-width: 33.333333%
                                }

                                .col-xl-5 {
                                    -ms-flex: 0 0 41.666667%;
                                    flex: 0 0 41.666667%;
                                    max-width: 41.666667%
                                }

                                .col-xl-6 {
                                    -ms-flex: 0 0 50%;
                                    flex: 0 0 50%;
                                    max-width: 50%
                                }

                                .col-xl-7 {
                                    -ms-flex: 0 0 58.333333%;
                                    flex: 0 0 58.333333%;
                                    max-width: 58.333333%
                                }

                                .col-xl-8 {
                                    -ms-flex: 0 0 66.666667%;
                                    flex: 0 0 66.666667%;
                                    max-width: 66.666667%
                                }

                                .col-xl-9 {
                                    -ms-flex: 0 0 75%;
                                    flex: 0 0 75%;
                                    max-width: 75%
                                }

                                .col-xl-10 {
                                    -ms-flex: 0 0 83.333333%;
                                    flex: 0 0 83.333333%;
                                    max-width: 83.333333%
                                }

                                .col-xl-11 {
                                    -ms-flex: 0 0 91.666667%;
                                    flex: 0 0 91.666667%;
                                    max-width: 91.666667%
                                }

                                .col-xl-12 {
                                    -ms-flex: 0 0 100%;
                                    flex: 0 0 100%;
                                    max-width: 100%
                                }

                                .order-xl-first {
                                    -ms-flex-order: -1;
                                    order: -1
                                }

                                .order-xl-last {
                                    -ms-flex-order: 13;
                                    order: 13
                                }

                                .order-xl-0 {
                                    -ms-flex-order: 0;
                                    order: 0
                                }

                                .order-xl-1 {
                                    -ms-flex-order: 1;
                                    order: 1
                                }

                                .order-xl-2 {
                                    -ms-flex-order: 2;
                                    order: 2
                                }

                                .order-xl-3 {
                                    -ms-flex-order: 3;
                                    order: 3
                                }

                                .order-xl-4 {
                                    -ms-flex-order: 4;
                                    order: 4
                                }

                                .order-xl-5 {
                                    -ms-flex-order: 5;
                                    order: 5
                                }

                                .order-xl-6 {
                                    -ms-flex-order: 6;
                                    order: 6
                                }

                                .order-xl-7 {
                                    -ms-flex-order: 7;
                                    order: 7
                                }

                                .order-xl-8 {
                                    -ms-flex-order: 8;
                                    order: 8
                                }

                                .order-xl-9 {
                                    -ms-flex-order: 9;
                                    order: 9
                                }

                                .order-xl-10 {
                                    -ms-flex-order: 10;
                                    order: 10
                                }

                                .order-xl-11 {
                                    -ms-flex-order: 11;
                                    order: 11
                                }

                                .order-xl-12 {
                                    -ms-flex-order: 12;
                                    order: 12
                                }

                                .offset-xl-0 {
                                    margin-left: 0
                                }

                                .offset-xl-1 {
                                    margin-left: 8.333333%
                                }

                                .offset-xl-2 {
                                    margin-left: 16.666667%
                                }

                                .offset-xl-3 {
                                    margin-left: 25%
                                }

                                .offset-xl-4 {
                                    margin-left: 33.333333%
                                }

                                .offset-xl-5 {
                                    margin-left: 41.666667%
                                }

                                .offset-xl-6 {
                                    margin-left: 50%
                                }

                                .offset-xl-7 {
                                    margin-left: 58.333333%
                                }

                                .offset-xl-8 {
                                    margin-left: 66.666667%
                                }

                                .offset-xl-9 {
                                    margin-left: 75%
                                }

                                .offset-xl-10 {
                                    margin-left: 83.333333%
                                }

                                .offset-xl-11 {
                                    margin-left: 91.666667%
                                }
                            }

                            .table {
                                width: 100%;
                                margin-bottom: 1rem;
                                color: #212529;
                                background-color: transparent
                            }

                            .table td,
                            .table th {
                                padding: .75rem;
                                vertical-align: top;
                                border-top: 1px solid #dee2e6
                            }

                            .table thead th {
                                vertical-align: bottom;
                                border-bottom: 2px solid #dee2e6
                            }

                            .table tbody+tbody {
                                border-top: 2px solid #dee2e6
                            }

                            .table-sm td,
                            .table-sm th {
                                padding: .3rem
                            }

                            .table-bordered {
                                border: 1px solid #dee2e6
                            }

                            .table-bordered td,
                            .table-bordered th {
                                border: 1px solid #dee2e6
                            }

                            .table-bordered thead td,
                            .table-bordered thead th {
                                border-bottom-width: 2px
                            }

                            .table-borderless tbody+tbody,
                            .table-borderless td,
                            .table-borderless th,
                            .table-borderless thead th {
                                border: 0
                            }

                            .table-striped tbody tr:nth-of-type(odd) {
                                background-color: rgba(0, 0, 0, .05)
                            }

                            .table-hover tbody tr:hover {
                                color: #212529;
                                background-color: rgba(0, 0, 0, .075)
                            }

                            .table-primary,
                            .table-primary>td,
                            .table-primary>th {
                                background-color: #b8daff
                            }

                            .table-primary tbody+tbody,
                            .table-primary td,
                            .table-primary th,
                            .table-primary thead th {
                                border-color: #7abaff
                            }

                            .table-hover .table-primary:hover {
                                background-color: #9fcdff
                            }

                            .table-hover .table-primary:hover>td,
                            .table-hover .table-primary:hover>th {
                                background-color: #9fcdff
                            }

                            .table-secondary,
                            .table-secondary>td,
                            .table-secondary>th {
                                background-color: #d6d8db
                            }

                            .table-secondary tbody+tbody,
                            .table-secondary td,
                            .table-secondary th,
                            .table-secondary thead th {
                                border-color: #b3b7bb
                            }

                            .table-hover .table-secondary:hover {
                                background-color: #c8cbcf
                            }

                            .table-hover .table-secondary:hover>td,
                            .table-hover .table-secondary:hover>th {
                                background-color: #c8cbcf
                            }

                            .table-success,
                            .table-success>td,
                            .table-success>th {
                                background-color: #c3e6cb
                            }

                            .table-success tbody+tbody,
                            .table-success td,
                            .table-success th,
                            .table-success thead th {
                                border-color: #8fd19e
                            }

                            .table-hover .table-success:hover {
                                background-color: #b1dfbb
                            }

                            .table-hover .table-success:hover>td,
                            .table-hover .table-success:hover>th {
                                background-color: #b1dfbb
                            }

                            .table-info,
                            .table-info>td,
                            .table-info>th {
                                background-color: #bee5eb
                            }

                            .table-info tbody+tbody,
                            .table-info td,
                            .table-info th,
                            .table-info thead th {
                                border-color: #86cfda
                            }

                            .table-hover .table-info:hover {
                                background-color: #abdde5
                            }

                            .table-hover .table-info:hover>td,
                            .table-hover .table-info:hover>th {
                                background-color: #abdde5
                            }

                            .table-warning,
                            .table-warning>td,
                            .table-warning>th {
                                background-color: #ffeeba
                            }

                            .table-warning tbody+tbody,
                            .table-warning td,
                            .table-warning th,
                            .table-warning thead th {
                                border-color: #ffdf7e
                            }

                            .table-hover .table-warning:hover {
                                background-color: #ffe8a1
                            }

                            .table-hover .table-warning:hover>td,
                            .table-hover .table-warning:hover>th {
                                background-color: #ffe8a1
                            }

                            .table-danger,
                            .table-danger>td,
                            .table-danger>th {
                                background-color: #f5c6cb
                            }

                            .table-danger tbody+tbody,
                            .table-danger td,
                            .table-danger th,
                            .table-danger thead th {
                                border-color: #ed969e
                            }

                            .table-hover .table-danger:hover {
                                background-color: #f1b0b7
                            }

                            .table-hover .table-danger:hover>td,
                            .table-hover .table-danger:hover>th {
                                background-color: #f1b0b7
                            }

                            .table-light,
                            .table-light>td,
                            .table-light>th {
                                background-color: #fdfdfe
                            }

                            .table-light tbody+tbody,
                            .table-light td,
                            .table-light th,
                            .table-light thead th {
                                border-color: #fbfcfc
                            }

                            .table-hover .table-light:hover {
                                background-color: #ececf6
                            }

                            .table-hover .table-light:hover>td,
                            .table-hover .table-light:hover>th {
                                background-color: #ececf6
                            }

                            .table-dark,
                            .table-dark>td,
                            .table-dark>th {
                                background-color: #c6c8ca
                            }

                            .table-dark tbody+tbody,
                            .table-dark td,
                            .table-dark th,
                            .table-dark thead th {
                                border-color: #95999c
                            }

                            .table-hover .table-dark:hover {
                                background-color: #b9bbbe
                            }

                            .table-hover .table-dark:hover>td,
                            .table-hover .table-dark:hover>th {
                                background-color: #b9bbbe
                            }

                            .table-active,
                            .table-active>td,
                            .table-active>th {
                                background-color: rgba(0, 0, 0, .075)
                            }

                            .table-hover .table-active:hover {
                                background-color: rgba(0, 0, 0, .075)
                            }

                            .table-hover .table-active:hover>td,
                            .table-hover .table-active:hover>th {
                                background-color: rgba(0, 0, 0, .075)
                            }

                            .table .thead-dark th {
                                color: #fff;
                                background-color: #212529;
                                border-color: #383f45
                            }

                            .table .thead-light th {
                                color: #495057;
                                background-color: #e9ecef;
                                border-color: #dee2e6
                            }

                            .table-dark {
                                color: #fff;
                                background-color: #212529
                            }

                            .table-dark td,
                            .table-dark th,
                            .table-dark thead th {
                                border-color: #383f45
                            }

                            .table-dark.table-bordered {
                                border: 0
                            }

                            .table-dark.table-striped tbody tr:nth-of-type(odd) {
                                background-color: rgba(255, 255, 255, .05)
                            }

                            .table-dark.table-hover tbody tr:hover {
                                color: #fff;
                                background-color: rgba(255, 255, 255, .075)
                            }

                            @media (max-width:575.98px) {
                                .table-responsive-sm {
                                    display: block;
                                    width: 100%;
                                    overflow-x: auto;
                                    -webkit-overflow-scrolling: touch
                                }

                                .table-responsive-sm>.table-bordered {
                                    border: 0
                                }
                            }

                            @media (max-width:767.98px) {
                                .table-responsive-md {
                                    display: block;
                                    width: 100%;
                                    overflow-x: auto;
                                    -webkit-overflow-scrolling: touch
                                }

                                .table-responsive-md>.table-bordered {
                                    border: 0
                                }
                            }

                            @media (max-width:991.98px) {
                                .table-responsive-lg {
                                    display: block;
                                    width: 100%;
                                    overflow-x: auto;
                                    -webkit-overflow-scrolling: touch
                                }

                                .table-responsive-lg>.table-bordered {
                                    border: 0
                                }
                            }

                            @media (max-width:1199.98px) {
                                .table-responsive-xl {
                                    display: block;
                                    width: 100%;
                                    overflow-x: auto;
                                    -webkit-overflow-scrolling: touch
                                }

                                .table-responsive-xl>.table-bordered {
                                    border: 0
                                }
                            }

                            .table-responsive {
                                display: block;
                                width: 100%;
                                overflow-x: auto;
                                -webkit-overflow-scrolling: touch
                            }

                            .table-responsive>.table-bordered {
                                border: 0
                            }

                            @media print {

                                *,
                                ::after,
                                ::before {
                                    text-shadow: none !important;
                                    box-shadow: none !important
                                }

                                a:not(.btn) {
                                    text-decoration: underline
                                }

                                abbr[title]::after {
                                    content: " (" attr(title) ")"
                                }

                                pre {
                                    white-space: pre-wrap !important
                                }

                                blockquote,
                                pre {
                                    border: 1px solid #adb5bd;
                                    page-break-inside: avoid
                                }

                                img,
                                tr {
                                    page-break-inside: avoid
                                }

                                h2,
                                h3,
                                p {
                                    orphans: 3;
                                    widows: 3
                                }

                                h2,
                                h3 {
                                    page-break-after: avoid
                                }

                                @page {
                                    size: a3
                                }

                                body {
                                    min-width: 992px !important
                                }

                                .container {
                                    min-width: 992px !important
                                }

                                .navbar {
                                    display: none
                                }

                                .badge {
                                    border: 1px solid #000
                                }

                                .table {
                                    border-collapse: collapse !important
                                }

                                .table td,
                                .table th {
                                    background-color: #fff !important
                                }

                                .table-bordered td,
                                .table-bordered th {
                                    border: 1px solid #dee2e6 !important
                                }

                                .table-dark {
                                    color: inherit
                                }

                                .table-dark tbody+tbody,
                                .table-dark td,
                                .table-dark th,
                                .table-dark thead th {
                                    border-color: #dee2e6
                                }

                                .table .thead-dark th {
                                    color: inherit;
                                    border-color: #dee2e6
                                }
                            }


                            @media print {

                                .table td.bg-primary,
                                .table th.bg-primary {
                                    background-color: #007bff !important
                                }

                                .table td.bg-primary,
                                .table td.bg-primary>a,
                                .table th.bg-primary,
                                .table th.bg-primary>a {
                                    color: #fff !important
                                }

                                .table td.bg-primary.btn:hover,
                                .table th.bg-primary.btn:hover {
                                    border-color: #0062cc;
                                    color: #ececec
                                }

                                .table td.bg-primary.btn.active,
                                .table td.bg-primary.btn:active,
                                .table td.bg-primary.btn:not(:disabled):not(.disabled).active,
                                .table td.bg-primary.btn:not(:disabled):not(.disabled):active,
                                .table th.bg-primary.btn.active,
                                .table th.bg-primary.btn:active,
                                .table th.bg-primary.btn:not(:disabled):not(.disabled).active,
                                .table th.bg-primary.btn:not(:disabled):not(.disabled):active {
                                    background-color: #0062cc !important;
                                    border-color: #005cbf;
                                    color: #fff
                                }

                                .table td.bg-secondary,
                                .table th.bg-secondary {
                                    background-color: #6c757d !important
                                }

                                .table td.bg-secondary,
                                .table td.bg-secondary>a,
                                .table th.bg-secondary,
                                .table th.bg-secondary>a {
                                    color: #fff !important
                                }

                                .table td.bg-secondary.btn:hover,
                                .table th.bg-secondary.btn:hover {
                                    border-color: #545b62;
                                    color: #ececec
                                }

                                .table td.bg-secondary.btn.active,
                                .table td.bg-secondary.btn:active,
                                .table td.bg-secondary.btn:not(:disabled):not(.disabled).active,
                                .table td.bg-secondary.btn:not(:disabled):not(.disabled):active,
                                .table th.bg-secondary.btn.active,
                                .table th.bg-secondary.btn:active,
                                .table th.bg-secondary.btn:not(:disabled):not(.disabled).active,
                                .table th.bg-secondary.btn:not(:disabled):not(.disabled):active {
                                    background-color: #545b62 !important;
                                    border-color: #4e555b;
                                    color: #fff
                                }

                                .table td.bg-success,
                                .table th.bg-success {
                                    background-color: #28a745 !important
                                }

                                .table td.bg-success,
                                .table td.bg-success>a,
                                .table th.bg-success,
                                .table th.bg-success>a {
                                    color: #fff !important
                                }

                                .table td.bg-success.btn:hover,
                                .table th.bg-success.btn:hover {
                                    border-color: #1e7e34;
                                    color: #ececec
                                }

                                .table td.bg-success.btn.active,
                                .table td.bg-success.btn:active,
                                .table td.bg-success.btn:not(:disabled):not(.disabled).active,
                                .table td.bg-success.btn:not(:disabled):not(.disabled):active,
                                .table th.bg-success.btn.active,
                                .table th.bg-success.btn:active,
                                .table th.bg-success.btn:not(:disabled):not(.disabled).active,
                                .table th.bg-success.btn:not(:disabled):not(.disabled):active {
                                    background-color: #1e7e34 !important;
                                    border-color: #1c7430;
                                    color: #fff
                                }

                                .table td.bg-info,
                                .table th.bg-info {
                                    background-color: #17a2b8 !important
                                }

                                .table td.bg-info,
                                .table td.bg-info>a,
                                .table th.bg-info,
                                .table th.bg-info>a {
                                    color: #fff !important
                                }

                                .table td.bg-info.btn:hover,
                                .table th.bg-info.btn:hover {
                                    border-color: #117a8b;
                                    color: #ececec
                                }

                                .table td.bg-info.btn.active,
                                .table td.bg-info.btn:active,
                                .table td.bg-info.btn:not(:disabled):not(.disabled).active,
                                .table td.bg-info.btn:not(:disabled):not(.disabled):active,
                                .table th.bg-info.btn.active,
                                .table th.bg-info.btn:active,
                                .table th.bg-info.btn:not(:disabled):not(.disabled).active,
                                .table th.bg-info.btn:not(:disabled):not(.disabled):active {
                                    background-color: #117a8b !important;
                                    border-color: #10707f;
                                    color: #fff
                                }

                                .table td.bg-warning,
                                .table th.bg-warning {
                                    background-color: #ffc107 !important
                                }

                                .table td.bg-warning,
                                .table td.bg-warning>a,
                                .table th.bg-warning,
                                .table th.bg-warning>a {
                                    color: #1f2d3d !important
                                }

                                .table td.bg-warning.btn:hover,
                                .table th.bg-warning.btn:hover {
                                    border-color: #d39e00;
                                    color: #121a24
                                }

                                .table td.bg-warning.btn.active,
                                .table td.bg-warning.btn:active,
                                .table td.bg-warning.btn:not(:disabled):not(.disabled).active,
                                .table td.bg-warning.btn:not(:disabled):not(.disabled):active,
                                .table th.bg-warning.btn.active,
                                .table th.bg-warning.btn:active,
                                .table th.bg-warning.btn:not(:disabled):not(.disabled).active,
                                .table th.bg-warning.btn:not(:disabled):not(.disabled):active {
                                    background-color: #d39e00 !important;
                                    border-color: #c69500;
                                    color: #1f2d3d
                                }

                                .table td.bg-danger,
                                .table th.bg-danger {
                                    background-color: #dc3545 !important
                                }

                                .table td.bg-danger,
                                .table td.bg-danger>a,
                                .table th.bg-danger,
                                .table th.bg-danger>a {
                                    color: #fff !important
                                }

                                .table td.bg-danger.btn:hover,
                                .table th.bg-danger.btn:hover {
                                    border-color: #bd2130;
                                    color: #ececec
                                }

                                .table td.bg-danger.btn.active,
                                .table td.bg-danger.btn:active,
                                .table td.bg-danger.btn:not(:disabled):not(.disabled).active,
                                .table td.bg-danger.btn:not(:disabled):not(.disabled):active,
                                .table th.bg-danger.btn.active,
                                .table th.bg-danger.btn:active,
                                .table th.bg-danger.btn:not(:disabled):not(.disabled).active,
                                .table th.bg-danger.btn:not(:disabled):not(.disabled):active {
                                    background-color: #bd2130 !important;
                                    border-color: #b21f2d;
                                    color: #fff
                                }

                                .table td.bg-light,
                                .table th.bg-light {
                                    background-color: #f8f9fa !important
                                }

                                .table td.bg-light,
                                .table td.bg-light>a,
                                .table th.bg-light,
                                .table th.bg-light>a {
                                    color: #1f2d3d !important
                                }

                                .table td.bg-light.btn:hover,
                                .table th.bg-light.btn:hover {
                                    border-color: #dae0e5;
                                    color: #121a24
                                }

                                .table td.bg-light.btn.active,
                                .table td.bg-light.btn:active,
                                .table td.bg-light.btn:not(:disabled):not(.disabled).active,
                                .table td.bg-light.btn:not(:disabled):not(.disabled):active,
                                .table th.bg-light.btn.active,
                                .table th.bg-light.btn:active,
                                .table th.bg-light.btn:not(:disabled):not(.disabled).active,
                                .table th.bg-light.btn:not(:disabled):not(.disabled):active {
                                    background-color: #dae0e5 !important;
                                    border-color: #d3d9df;
                                    color: #1f2d3d
                                }

                                .table td.bg-dark,
                                .table th.bg-dark {
                                    background-color: #343a40 !important
                                }

                                .table td.bg-dark,
                                .table td.bg-dark>a,
                                .table th.bg-dark,
                                .table th.bg-dark>a {
                                    color: #fff !important
                                }

                                .table td.bg-dark.btn:hover,
                                .table th.bg-dark.btn:hover {
                                    border-color: #1d2124;
                                    color: #ececec
                                }

                                .table td.bg-dark.btn.active,
                                .table td.bg-dark.btn:active,
                                .table td.bg-dark.btn:not(:disabled):not(.disabled).active,
                                .table td.bg-dark.btn:not(:disabled):not(.disabled):active,
                                .table th.bg-dark.btn.active,
                                .table th.bg-dark.btn:active,
                                .table th.bg-dark.btn:not(:disabled):not(.disabled).active,
                                .table th.bg-dark.btn:not(:disabled):not(.disabled):active {
                                    background-color: #1d2124 !important;
                                    border-color: #171a1d;
                                    color: #fff
                                }

                                .table td.bg-lightblue,
                                .table th.bg-lightblue {
                                    background-color: #3c8dbc !important
                                }

                                .table td.bg-lightblue,
                                .table td.bg-lightblue>a,
                                .table th.bg-lightblue,
                                .table th.bg-lightblue>a {
                                    color: #fff !important
                                }

                                .table td.bg-lightblue.btn:hover,
                                .table th.bg-lightblue.btn:hover {
                                    border-color: #307095;
                                    color: #ececec
                                }

                                .table td.bg-lightblue.btn.active,
                                .table td.bg-lightblue.btn:active,
                                .table td.bg-lightblue.btn:not(:disabled):not(.disabled).active,
                                .table td.bg-lightblue.btn:not(:disabled):not(.disabled):active,
                                .table th.bg-lightblue.btn.active,
                                .table th.bg-lightblue.btn:active,
                                .table th.bg-lightblue.btn:not(:disabled):not(.disabled).active,
                                .table th.bg-lightblue.btn:not(:disabled):not(.disabled):active {
                                    background-color: #307095 !important;
                                    border-color: #2d698c;
                                    color: #fff
                                }

                                .table td.bg-navy,
                                .table th.bg-navy {
                                    background-color: #001f3f !important
                                }

                                .table td.bg-navy,
                                .table td.bg-navy>a,
                                .table th.bg-navy,
                                .table th.bg-navy>a {
                                    color: #fff !important
                                }

                                .table td.bg-navy.btn:hover,
                                .table th.bg-navy.btn:hover {
                                    border-color: #00060c;
                                    color: #ececec
                                }

                                .table td.bg-navy.btn.active,
                                .table td.bg-navy.btn:active,
                                .table td.bg-navy.btn:not(:disabled):not(.disabled).active,
                                .table td.bg-navy.btn:not(:disabled):not(.disabled):active,
                                .table th.bg-navy.btn.active,
                                .table th.bg-navy.btn:active,
                                .table th.bg-navy.btn:not(:disabled):not(.disabled).active,
                                .table th.bg-navy.btn:not(:disabled):not(.disabled):active {
                                    background-color: #00060c !important;
                                    border-color: #000;
                                    color: #fff
                                }

                                .table td.bg-olive,
                                .table th.bg-olive {
                                    background-color: #3d9970 !important
                                }

                                .table td.bg-olive,
                                .table td.bg-olive>a,
                                .table th.bg-olive,
                                .table th.bg-olive>a {
                                    color: #fff !important
                                }

                                .table td.bg-olive.btn:hover,
                                .table th.bg-olive.btn:hover {
                                    border-color: #2e7555;
                                    color: #ececec
                                }

                                .table td.bg-olive.btn.active,
                                .table td.bg-olive.btn:active,
                                .table td.bg-olive.btn:not(:disabled):not(.disabled).active,
                                .table td.bg-olive.btn:not(:disabled):not(.disabled):active,
                                .table th.bg-olive.btn.active,
                                .table th.bg-olive.btn:active,
                                .table th.bg-olive.btn:not(:disabled):not(.disabled).active,
                                .table th.bg-olive.btn:not(:disabled):not(.disabled):active {
                                    background-color: #2e7555 !important;
                                    border-color: #2b6b4f;
                                    color: #fff
                                }

                                .table td.bg-lime,
                                .table th.bg-lime {
                                    background-color: #01ff70 !important
                                }

                                .table td.bg-lime,
                                .table td.bg-lime>a,
                                .table th.bg-lime,
                                .table th.bg-lime>a {
                                    color: #1f2d3d !important
                                }

                                .table td.bg-lime.btn:hover,
                                .table th.bg-lime.btn:hover {
                                    border-color: #00cd5a;
                                    color: #121a24
                                }

                                .table td.bg-lime.btn.active,
                                .table td.bg-lime.btn:active,
                                .table td.bg-lime.btn:not(:disabled):not(.disabled).active,
                                .table td.bg-lime.btn:not(:disabled):not(.disabled):active,
                                .table th.bg-lime.btn.active,
                                .table th.bg-lime.btn:active,
                                .table th.bg-lime.btn:not(:disabled):not(.disabled).active,
                                .table th.bg-lime.btn:not(:disabled):not(.disabled):active {
                                    background-color: #00cd5a !important;
                                    border-color: #00c054;
                                    color: #fff
                                }

                                .table td.bg-fuchsia,
                                .table th.bg-fuchsia {
                                    background-color: #f012be !important
                                }

                                .table td.bg-fuchsia,
                                .table td.bg-fuchsia>a,
                                .table th.bg-fuchsia,
                                .table th.bg-fuchsia>a {
                                    color: #fff !important
                                }

                                .table td.bg-fuchsia.btn:hover,
                                .table th.bg-fuchsia.btn:hover {
                                    border-color: #c30c9a;
                                    color: #ececec
                                }

                                .table td.bg-fuchsia.btn.active,
                                .table td.bg-fuchsia.btn:active,
                                .table td.bg-fuchsia.btn:not(:disabled):not(.disabled).active,
                                .table td.bg-fuchsia.btn:not(:disabled):not(.disabled):active,
                                .table th.bg-fuchsia.btn.active,
                                .table th.bg-fuchsia.btn:active,
                                .table th.bg-fuchsia.btn:not(:disabled):not(.disabled).active,
                                .table th.bg-fuchsia.btn:not(:disabled):not(.disabled):active {
                                    background-color: #c30c9a !important;
                                    border-color: #b70c90;
                                    color: #fff
                                }

                                .table td.bg-maroon,
                                .table th.bg-maroon {
                                    background-color: #d81b60 !important
                                }

                                .table td.bg-maroon,
                                .table td.bg-maroon>a,
                                .table th.bg-maroon,
                                .table th.bg-maroon>a {
                                    color: #fff !important
                                }

                                .table td.bg-maroon.btn:hover,
                                .table th.bg-maroon.btn:hover {
                                    border-color: #ab154c;
                                    color: #ececec
                                }

                                .table td.bg-maroon.btn.active,
                                .table td.bg-maroon.btn:active,
                                .table td.bg-maroon.btn:not(:disabled):not(.disabled).active,
                                .table td.bg-maroon.btn:not(:disabled):not(.disabled):active,
                                .table th.bg-maroon.btn.active,
                                .table th.bg-maroon.btn:active,
                                .table th.bg-maroon.btn:not(:disabled):not(.disabled).active,
                                .table th.bg-maroon.btn:not(:disabled):not(.disabled):active {
                                    background-color: #ab154c !important;
                                    border-color: #9f1447;
                                    color: #fff
                                }

                                .table td.bg-blue,
                                .table th.bg-blue {
                                    background-color: #007bff !important
                                }

                                .table td.bg-blue,
                                .table td.bg-blue>a,
                                .table th.bg-blue,
                                .table th.bg-blue>a {
                                    color: #fff !important
                                }

                                .table td.bg-blue.btn:hover,
                                .table th.bg-blue.btn:hover {
                                    border-color: #0062cc;
                                    color: #ececec
                                }

                                .table td.bg-blue.btn.active,
                                .table td.bg-blue.btn:active,
                                .table td.bg-blue.btn:not(:disabled):not(.disabled).active,
                                .table td.bg-blue.btn:not(:disabled):not(.disabled):active,
                                .table th.bg-blue.btn.active,
                                .table th.bg-blue.btn:active,
                                .table th.bg-blue.btn:not(:disabled):not(.disabled).active,
                                .table th.bg-blue.btn:not(:disabled):not(.disabled):active {
                                    background-color: #0062cc !important;
                                    border-color: #005cbf;
                                    color: #fff
                                }

                                .table td.bg-indigo,
                                .table th.bg-indigo {
                                    background-color: #6610f2 !important
                                }

                                .table td.bg-indigo,
                                .table td.bg-indigo>a,
                                .table th.bg-indigo,
                                .table th.bg-indigo>a {
                                    color: #fff !important
                                }

                                .table td.bg-indigo.btn:hover,
                                .table th.bg-indigo.btn:hover {
                                    border-color: #510bc4;
                                    color: #ececec
                                }

                                .table td.bg-indigo.btn.active,
                                .table td.bg-indigo.btn:active,
                                .table td.bg-indigo.btn:not(:disabled):not(.disabled).active,
                                .table td.bg-indigo.btn:not(:disabled):not(.disabled):active,
                                .table th.bg-indigo.btn.active,
                                .table th.bg-indigo.btn:active,
                                .table th.bg-indigo.btn:not(:disabled):not(.disabled).active,
                                .table th.bg-indigo.btn:not(:disabled):not(.disabled):active {
                                    background-color: #510bc4 !important;
                                    border-color: #4c0ab8;
                                    color: #fff
                                }

                                .table td.bg-purple,
                                .table th.bg-purple {
                                    background-color: #6f42c1 !important
                                }

                                .table td.bg-purple,
                                .table td.bg-purple>a,
                                .table th.bg-purple,
                                .table th.bg-purple>a {
                                    color: #fff !important
                                }

                                .table td.bg-purple.btn:hover,
                                .table th.bg-purple.btn:hover {
                                    border-color: #59339d;
                                    color: #ececec
                                }

                                .table td.bg-purple.btn.active,
                                .table td.bg-purple.btn:active,
                                .table td.bg-purple.btn:not(:disabled):not(.disabled).active,
                                .table td.bg-purple.btn:not(:disabled):not(.disabled):active,
                                .table th.bg-purple.btn.active,
                                .table th.bg-purple.btn:active,
                                .table th.bg-purple.btn:not(:disabled):not(.disabled).active,
                                .table th.bg-purple.btn:not(:disabled):not(.disabled):active {
                                    background-color: #59339d !important;
                                    border-color: #533093;
                                    color: #fff
                                }

                                .table td.bg-pink,
                                .table th.bg-pink {
                                    background-color: #e83e8c !important
                                }

                                .table td.bg-pink,
                                .table td.bg-pink>a,
                                .table th.bg-pink,
                                .table th.bg-pink>a {
                                    color: #fff !important
                                }

                                .table td.bg-pink.btn:hover,
                                .table th.bg-pink.btn:hover {
                                    border-color: #d91a72;
                                    color: #ececec
                                }

                                .table td.bg-pink.btn.active,
                                .table td.bg-pink.btn:active,
                                .table td.bg-pink.btn:not(:disabled):not(.disabled).active,
                                .table td.bg-pink.btn:not(:disabled):not(.disabled):active,
                                .table th.bg-pink.btn.active,
                                .table th.bg-pink.btn:active,
                                .table th.bg-pink.btn:not(:disabled):not(.disabled).active,
                                .table th.bg-pink.btn:not(:disabled):not(.disabled):active {
                                    background-color: #d91a72 !important;
                                    border-color: #ce196c;
                                    color: #fff
                                }

                                .table td.bg-red,
                                .table th.bg-red {
                                    background-color: #dc3545 !important
                                }

                                .table td.bg-red,
                                .table td.bg-red>a,
                                .table th.bg-red,
                                .table th.bg-red>a {
                                    color: #fff !important
                                }

                                .table td.bg-red.btn:hover,
                                .table th.bg-red.btn:hover {
                                    border-color: #bd2130;
                                    color: #ececec
                                }

                                .table td.bg-red.btn.active,
                                .table td.bg-red.btn:active,
                                .table td.bg-red.btn:not(:disabled):not(.disabled).active,
                                .table td.bg-red.btn:not(:disabled):not(.disabled):active,
                                .table th.bg-red.btn.active,
                                .table th.bg-red.btn:active,
                                .table th.bg-red.btn:not(:disabled):not(.disabled).active,
                                .table th.bg-red.btn:not(:disabled):not(.disabled):active {
                                    background-color: #bd2130 !important;
                                    border-color: #b21f2d;
                                    color: #fff
                                }

                                .table td.bg-orange,
                                .table th.bg-orange {
                                    background-color: #fd7e14 !important
                                }

                                .table td.bg-orange,
                                .table td.bg-orange>a,
                                .table th.bg-orange,
                                .table th.bg-orange>a {
                                    color: #1f2d3d !important
                                }

                                .table td.bg-orange.btn:hover,
                                .table th.bg-orange.btn:hover {
                                    border-color: #dc6502;
                                    color: #121a24
                                }

                                .table td.bg-orange.btn.active,
                                .table td.bg-orange.btn:active,
                                .table td.bg-orange.btn:not(:disabled):not(.disabled).active,
                                .table td.bg-orange.btn:not(:disabled):not(.disabled):active,
                                .table th.bg-orange.btn.active,
                                .table th.bg-orange.btn:active,
                                .table th.bg-orange.btn:not(:disabled):not(.disabled).active,
                                .table th.bg-orange.btn:not(:disabled):not(.disabled):active {
                                    background-color: #dc6502 !important;
                                    border-color: #cf5f02;
                                    color: #fff
                                }

                                .table td.bg-yellow,
                                .table th.bg-yellow {
                                    background-color: #ffc107 !important
                                }

                                .table td.bg-yellow,
                                .table td.bg-yellow>a,
                                .table th.bg-yellow,
                                .table th.bg-yellow>a {
                                    color: #1f2d3d !important
                                }

                                .table td.bg-yellow.btn:hover,
                                .table th.bg-yellow.btn:hover {
                                    border-color: #d39e00;
                                    color: #121a24
                                }

                                .table td.bg-yellow.btn.active,
                                .table td.bg-yellow.btn:active,
                                .table td.bg-yellow.btn:not(:disabled):not(.disabled).active,
                                .table td.bg-yellow.btn:not(:disabled):not(.disabled):active,
                                .table th.bg-yellow.btn.active,
                                .table th.bg-yellow.btn:active,
                                .table th.bg-yellow.btn:not(:disabled):not(.disabled).active,
                                .table th.bg-yellow.btn:not(:disabled):not(.disabled):active {
                                    background-color: #d39e00 !important;
                                    border-color: #c69500;
                                    color: #1f2d3d
                                }

                                .table td.bg-green,
                                .table th.bg-green {
                                    background-color: #28a745 !important
                                }

                                .table td.bg-green,
                                .table td.bg-green>a,
                                .table th.bg-green,
                                .table th.bg-green>a {
                                    color: #fff !important
                                }

                                .table td.bg-green.btn:hover,
                                .table th.bg-green.btn:hover {
                                    border-color: #1e7e34;
                                    color: #ececec
                                }

                                .table td.bg-green.btn.active,
                                .table td.bg-green.btn:active,
                                .table td.bg-green.btn:not(:disabled):not(.disabled).active,
                                .table td.bg-green.btn:not(:disabled):not(.disabled):active,
                                .table th.bg-green.btn.active,
                                .table th.bg-green.btn:active,
                                .table th.bg-green.btn:not(:disabled):not(.disabled).active,
                                .table th.bg-green.btn:not(:disabled):not(.disabled):active {
                                    background-color: #1e7e34 !important;
                                    border-color: #1c7430;
                                    color: #fff
                                }

                                .table td.bg-teal,
                                .table th.bg-teal {
                                    background-color: #20c997 !important
                                }

                                .table td.bg-teal,
                                .table td.bg-teal>a,
                                .table th.bg-teal,
                                .table th.bg-teal>a {
                                    color: #fff !important
                                }

                                .table td.bg-teal.btn:hover,
                                .table th.bg-teal.btn:hover {
                                    border-color: #199d76;
                                    color: #ececec
                                }

                                .table td.bg-teal.btn.active,
                                .table td.bg-teal.btn:active,
                                .table td.bg-teal.btn:not(:disabled):not(.disabled).active,
                                .table td.bg-teal.btn:not(:disabled):not(.disabled):active,
                                .table th.bg-teal.btn.active,
                                .table th.bg-teal.btn:active,
                                .table th.bg-teal.btn:not(:disabled):not(.disabled).active,
                                .table th.bg-teal.btn:not(:disabled):not(.disabled):active {
                                    background-color: #199d76 !important;
                                    border-color: #17926e;
                                    color: #fff
                                }

                                .table td.bg-cyan,
                                .table th.bg-cyan {
                                    background-color: #17a2b8 !important
                                }

                                .table td.bg-cyan,
                                .table td.bg-cyan>a,
                                .table th.bg-cyan,
                                .table th.bg-cyan>a {
                                    color: #fff !important
                                }

                                .table td.bg-cyan.btn:hover,
                                .table th.bg-cyan.btn:hover {
                                    border-color: #117a8b;
                                    color: #ececec
                                }

                                .table td.bg-cyan.btn.active,
                                .table td.bg-cyan.btn:active,
                                .table td.bg-cyan.btn:not(:disabled):not(.disabled).active,
                                .table td.bg-cyan.btn:not(:disabled):not(.disabled):active,
                                .table th.bg-cyan.btn.active,
                                .table th.bg-cyan.btn:active,
                                .table th.bg-cyan.btn:not(:disabled):not(.disabled).active,
                                .table th.bg-cyan.btn:not(:disabled):not(.disabled):active {
                                    background-color: #117a8b !important;
                                    border-color: #10707f;
                                    color: #fff
                                }

                                .table td.bg-white,
                                .table th.bg-white {
                                    background-color: #fff !important
                                }

                                .table td.bg-white,
                                .table td.bg-white>a,
                                .table th.bg-white,
                                .table th.bg-white>a {
                                    color: #1f2d3d !important
                                }

                                .table td.bg-white.btn:hover,
                                .table th.bg-white.btn:hover {
                                    border-color: #e6e6e6;
                                    color: #121a24
                                }

                                .table td.bg-white.btn.active,
                                .table td.bg-white.btn:active,
                                .table td.bg-white.btn:not(:disabled):not(.disabled).active,
                                .table td.bg-white.btn:not(:disabled):not(.disabled):active,
                                .table th.bg-white.btn.active,
                                .table th.bg-white.btn:active,
                                .table th.bg-white.btn:not(:disabled):not(.disabled).active,
                                .table th.bg-white.btn:not(:disabled):not(.disabled):active {
                                    background-color: #e6e6e6 !important;
                                    border-color: #dfdfdf;
                                    color: #1f2d3d
                                }

                                .table td.bg-gray,
                                .table th.bg-gray {
                                    background-color: #6c757d !important
                                }

                                .table td.bg-gray,
                                .table td.bg-gray>a,
                                .table th.bg-gray,
                                .table th.bg-gray>a {
                                    color: #fff !important
                                }

                                .table td.bg-gray.btn:hover,
                                .table th.bg-gray.btn:hover {
                                    border-color: #545b62;
                                    color: #ececec
                                }

                                .table td.bg-gray.btn.active,
                                .table td.bg-gray.btn:active,
                                .table td.bg-gray.btn:not(:disabled):not(.disabled).active,
                                .table td.bg-gray.btn:not(:disabled):not(.disabled):active,
                                .table th.bg-gray.btn.active,
                                .table th.bg-gray.btn:active,
                                .table th.bg-gray.btn:not(:disabled):not(.disabled).active,
                                .table th.bg-gray.btn:not(:disabled):not(.disabled):active {
                                    background-color: #545b62 !important;
                                    border-color: #4e555b;
                                    color: #fff
                                }

                                .table td.bg-gray-dark,
                                .table th.bg-gray-dark {
                                    background-color: #343a40 !important
                                }

                                .table td.bg-gray-dark,
                                .table td.bg-gray-dark>a,
                                .table th.bg-gray-dark,
                                .table th.bg-gray-dark>a {
                                    color: #fff !important
                                }

                                .table td.bg-gray-dark.btn:hover,
                                .table th.bg-gray-dark.btn:hover {
                                    border-color: #1d2124;
                                    color: #ececec
                                }

                                .table td.bg-gray-dark.btn.active,
                                .table td.bg-gray-dark.btn:active,
                                .table td.bg-gray-dark.btn:not(:disabled):not(.disabled).active,
                                .table td.bg-gray-dark.btn:not(:disabled):not(.disabled):active,
                                .table th.bg-gray-dark.btn.active,
                                .table th.bg-gray-dark.btn:active,
                                .table th.bg-gray-dark.btn:not(:disabled):not(.disabled).active,
                                .table th.bg-gray-dark.btn:not(:disabled):not(.disabled):active {
                                    background-color: #1d2124 !important;
                                    border-color: #171a1d;
                                    color: #fff
                                }
                            }

                            @media print {
                                @page {
                                    size: A4;
                                }
                                body {
                                    -webkit-print-color-adjust: exact; /* Enable color printing in WebKit browsers */
                                    color-adjust: exact; /* Enable color printing for other browsers */
                                }
                                :root{
                                    box-sizing: border-box;
                                }
                                .voucher-layout {
                                    padding: 10mm 5mm;
                                    margin-right:5mm;
                                    width: 100%;
                                    margin: 0 auto;
                                    padding: 20px;
                                    box-sizing: border-box;
                                }
                                .voucher-layout img{
                                    margin-top:1.0rem;
                                    margin-bottom:1.0rem;
                                }
                                .voucher-layout table{
                                    margin-top:1.0rem;
                                }
                                .voucher-layout .container{
                                    padding-right:10mm;
                                }
                                .voucher-text {
                                    margin: 0;
                                    font-weight: 100;
                                    font-size: 15px;
                                    color: black;
                                    font-family: sans-serif;
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
                                .col-8 {
                                    -ms-flex: 0 0 66.666667%;
                                    flex: 0 0 66.666667%;
                                    max-width: 66.666667%;
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
                    printWindow.onload = function() {
                        printWindow.print();
                        printWindow.close();
                    };
                }).catch(function(error) {
                    console.error("Error fetching voucher data:", error);
                    alert("An error occurred while fetching the voucher data. Please try again.");
                });
            }

            function fetchData(filterValue) {
                let url = `showFilterSpecialFees?filter=${filterValue}`;
                $.ajax({
                    type: 'get',
                    url: url,
                    success: function(response) {
                        table.clear(); // Clear the current data
                        if (response.length > 0) {
                            response.forEach((item, index) => {
                                // Create the action buttons HTML
                                let viewButton =
                                    `<a href="viewSpecialFeesVoucher/${item.id}" class="btn btn-sm our-color-1 rounded-2 shadow magicButton">View</a>`;
                                let editButton =
                                    `<a href="editSpecialFeeVoucher/${item.id}" class="btn btn-sm our-color-1 rounded-2 shadow magicButton2">Edit</a>`;
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
                                    item.students_add.class,
                                    item.students_add.section,
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

            // Function to apply the filters
            function applyFilters() {
                var selectedMonth = $('#monthFilter').val();
                var selectedYear = $('#yearFilter').val();
                var combinedValue = '';

                // If both month and year are selected, combine them in 'YYYY-MM' format
                if (selectedMonth && selectedYear) {
                    combinedValue = selectedYear + '-' + selectedMonth;
                }

                // Apply the filter to the 'month_year' column (assuming it's the 3rd column, index 2)
                table.column(2).search(combinedValue).draw();
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
                            url: 'deleteSpecialFeeVoucher/' + id,
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
                                        title: "Special Fee Voucher Deleted Successfully"
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
        function generateBarcodeImage(grNumber) {
            const canvas = document.createElement('canvas');
            JsBarcode(canvas, grNumber, {
                format: 'CODE128', // Choose the barcode format
                displayValue: true,
                width: 2,
                height: 50
            });
            return canvas.toDataURL('image/png');
        }
    </script>
@endsection
