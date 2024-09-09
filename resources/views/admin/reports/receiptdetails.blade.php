@extends('admin.master')
@section('content')

    <head>
        <link rel="stylesheet" href="//cdn.datatables.net/2.1.3/css/dataTables.dataTables.min.css">
        <!-- Buttons extension CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
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

                                    <h5 class="header-title mb-0 me-auto text-white">Receipt Details</h5>

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
                                                        <th>Date</th>
                                                        <th>Paytype</th>
                                                        <th>Discount</th>
                                                        <th>Receipt</th>
                                                        <th>Balance</th>
                                                        <th>Total</th>
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
                                                            <td>{{ $addmission->students_add->current_class }}</td>
                                                            <td>{{ $addmission->students_add->section }}</td>
                                                            <td>{{ $addmission->date }}</td>
                                                            <td>{{ $addmission->paytype == '' ? '-' : $addmission->paytype }}
                                                            </td>
                                                            <td>{{ $addmission->discount }}</td>
                                                            <td>{{ $addmission->receipts }}</td>
                                                            <td>{{ $addmission->balance }}</td>
                                                            <td>{{ $addmission->total }}</td>
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
                        title: 'Receipt Details',
                        customize: function(doc) {
                            doc.content[1].margin = [0, 0, 0, 0]; // left, top, right, bottom
                        }
                    },
                    'copy',
                    'csv',
                    'excel',
                    {
                        extend: 'print',
                        title: 'Receipt Details',
                        customize: function(win) {
                            $(win.document.body)
                                .css('font-size', '10pt')
                                .prepend(
                                    `<img src="{{ asset('assets/images/voucher-logo/voucherlogo.jpg') }}" style="position:absolute; top:0; left:0;" width="0px" />`
                                );

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
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
                        </div>
                    `);

                    // Listen for filter change
                    $('#filterSelector').on('change', function() {
                        fetchData(this.value);
                    });
                }
            });

            function fetchData(filterValue) {
                let url = `showFilterReceiptDetailsReports?filter=${filterValue}`;
                $.ajax({
                    type: 'get',
                    url: url,
                    success: function(response) {
                        table.clear(); // Clear the current data
                        if (response.length > 0) {
                            response.forEach((item, index) => {
                                table.row.add([
                                    index + 1,
                                    item.gr_number,
                                    item.students_add.student_name,
                                    item.students_add.father_name,
                                    item.students_add.current_class,
                                    item.students_add.section,
                                    item.date,
                                    item.paytype === "" ? "-" : item.paytype, // Paytype with default value
                                    item.discount,
                                    item.receipts,
                                    item.balance,
                                    item.total
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
                } else {
                    $('#btnExportPdf').prop('disabled', false);
                    $('#btnExportExcel').prop('disabled', false);
                    $('#btnPrintTable').prop('disabled', false);
                }
            }
        });
    </script>
@endsection
