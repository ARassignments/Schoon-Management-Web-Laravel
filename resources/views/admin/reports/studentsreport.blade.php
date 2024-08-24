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

                                    <h5 class="header-title mb-0 me-auto text-white">Students Reports</h5>

                                </div>
                                <div class="feeallcard feeallshadow">
                                    <div id="yearly-sales-collapse" class="collapse show mt-4">
                                        <div class="d-flex flex-wrap pt-3 px-2">
                                            <div class="d-flex align-items-center col-md-6">
                                                <label for="classFilter" class="col-3">Class By:</label>
                                                <select id="classFilter" class="form-select col-9">
                                                    <option value="">All</option>
                                                    {{-- @foreach ($classes as $class)
                                                        <option value="{{ $class->class_name }}">{{ $class->class_name }}</option>
                                                    @endforeach --}}
                                                </select>
                                            </div>
                                            <div class="d-flex align-items-center col-md-6">
                                                <label for="sectionFilter" class="col-3">Section By:</label>
                                                <select id="sectionFilter" class="form-select col-9">
                                                    <option value="">All</option>
                                                    {{-- @foreach ($classes as $class)
                                                        <option value="{{ $class->section_name }}">{{ $class->section_name }}</option>
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
                                                        <th>Address</th>
                                                        <th>Class</th>
                                                        <th>Section</th>
                                                        <th>Created Date</th>
                                                        <th>Updated Date</th>
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
                                                            <td>{{ $addmission->student_name }}</td>
                                                            <td>{{ $addmission->father_name }}</td>
                                                            <td>{{ $addmission->address }}</td>
                                                            <td>{{ $addmission->current_class }}</td>
                                                            <td>{{ $addmission->section }}</td>
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
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.min.js"></script>
    <!-- Buttons extension JS -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = new DataTable('#myTable', {
    dom: 'Bfrtip', // This defines the placement of the buttons
    buttons: [
        {
            extend: 'pdfHtml5',
            orientation: 'portrait', // 'portrait' or 'landscape'
            pageSize: 'A4', // 'A3', 'A5', 'legal', 'letter'
            title: 'Students Reports',
            customize: function(doc) {
                doc.content[1].margin = [0, 0, 0, 0]; // left, top, right, bottom
            }
        },
        'copy', 
        'csv', 
        'excel',
        {
            extend: 'print',
            title: 'Students Reports',
            customize: function (win) {
                $(win.document.body)
                    .css('font-size', '10pt')
                    .prepend(
                        '<img src="https://yourlogo.com/logo.png" style="position:absolute; top:0; left:0;" />'
                    );

                $(win.document.body).find('table')
                    .addClass('compact')
                    .css('font-size', 'inherit');
            }
        }
    ]
});

            // Populate the Class filter dropdown
            var uniqueClasses = [...new Set(table.column(5).data().toArray())];
            uniqueClasses.forEach(function(className) {
                $('#classFilter').append(new Option(className, className));
            });

            // Filter function for class
            $('#classFilter').on('change', function() {
                table.column(5).search(this.value).draw();
            });

            // Populate the Section filter dropdown
            var uniqueSections = [...new Set(table.column(6).data().toArray())];
            uniqueSections.forEach(function(sectionName) {
                $('#sectionFilter').append(new Option(sectionName, sectionName));
            });

            // Filter function for section
            $('#sectionFilter').on('change', function() {
                table.column(6).search(this.value).draw();
            });
        });
    </script>
@endsection
