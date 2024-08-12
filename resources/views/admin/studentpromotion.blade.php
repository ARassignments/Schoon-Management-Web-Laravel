@extends('admin.master')
@section('content')

    <head>
        <link rel="stylesheet" href="//cdn.datatables.net/2.1.3/css/dataTables.dataTables.min.css">
    </head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

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
                                    class="card-body-container p-3 d-flex align-items-center justify-content-end rounded mt-4">
                                    <!-- <div class="card-widgets me-3">
                                                    <a href="javascript:;" data-bs-toggle="reload"><i class="ri-refresh-line text-white"></i></a>
                                                    <a data-bs-toggle="collapse" href="#yearly-sales-collapse" role="button" aria-expanded="false" aria-controls="yearly-sales-collapse"><i class="ri-subtract-line text-white"></i></a>
                                                </div> -->
                                    <h5 class="header-title mb-0 me-auto text-white px-4">Student Promotion</h5>

                                </div>
                                <form id="promoteForm">
                                    @csrf
                                    <div class="card-body mt-3">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h4 class="text-center mt-2"><b>From</b></h4>
                                                <hr>

                                                <div class="container mt-5">
                                                    <div class="row">
                                                        <div class="col-12 d-flex flex-column align-items-center">
                                                            <!-- Class Dropdown -->
                                                            <div class=" w-100" style="max-width: 400px;">
                                                                <div
                                                                    class="d-flex flex-column flex-md-row align-items-center">
                                                                    <label class="form-label mb-3 mb-md-0 me-md-3"
                                                                        style="font-weight: bold; color: #333;">
                                                                        <h5 class="mb-0"><b>Class</b></h5>
                                                                    </label>
                                                                    <div class="form-group" style="width: 100%;">
                                                                        <select name="from_class" class="form-control"
                                                                            style="
                                                                        border-radius: 12px; 
                                                                        border: 2px solid #0097B2; 
                                                                        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); 
                                                                        font-size: 16px;">
                                                                            <option disabled selected>Select Class</option>
                                                                            @foreach ($class as $classes)
                                                                                <option value="{{ $classes }}">
                                                                                    {{ $classes }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Section Dropdown -->
                                                            <div class="w-100" style="max-width: 400px;">
                                                                <div
                                                                    class="d-flex flex-column flex-md-row align-items-center">
                                                                    <label class="form-label mb-3 mb-md-0 me-md-3"
                                                                        style="font-weight: bold; color: #333;">
                                                                        <h5 class="mb-0"><b>Section</b></h5>
                                                                    </label>
                                                                    <div class="form-group" style="width: 100%;">
                                                                        <select name="from_section" class="form-control"
                                                                            style="
                                                                         border-radius: 12px; 
                                                                         border: 2px solid #0097B2; 
                                                                         box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); 
                                                                         font-size: 16px;">
                                                                            <option disabled selected>Select Section
                                                                            </option>
                                                                            @foreach ($sections as $section)
                                                                                <option value="{{ $section }}">
                                                                                    {{ $section }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>






                                            </div>

                                            <div class="col-lg-6 mt-3 mt-lg-0">
                                                <h4 class="text-center mt-2"><b>To</b></h4>
                                                <hr>
                                                <!-- <div class="text-center">
                                                    <div class="d-flex justify-content-center">
                                                        <select name="to_class" class="form-control mb-3" style="width: 80%;">
                                                            <option disabled selected>Select Class</option>
                                                            @foreach ($class as $classes)
    <option value="{{ $classes }}">{{ $classes }}
                                                            </option>
    @endforeach
                                                        </select>
                                                    </div>
                                                </div> -->



                                                <div class="text-center mt-5">

                                                    <div class="d-flex justify-content-center">
                                                        <div class="form-group" style="width: 100%; max-width: 350px;">
                                                            <select name="to_class" class="form-control"
                                                                style="
                                                          border-radius: 12px; 
                                                          border: 2px solid #0097B2; 
                                                          box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); 
                                                          font-size: 16px;">
                                                                <option disabled selected>Select Class</option>
                                                                @foreach ($class as $classes)
                                                                    <option value="{{ $classes }}">{{ $classes }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- <div class="text-center">
                                                    <div class="d-flex justify-content-center">
                                                        <select name="to_section" class="form-control mb-3" style="width: 80%;">
                                                            <option disabled selected>Select Section</option>
                                                            @foreach ($sections as $section)
    <option value="{{ $section }}">{{ $section }}
                                                            </option>
    @endforeach
                                                        </select>
                                                    </div>
                                                </div> -->

                                                <div class="text-center ">
                                                    <div class="d-flex justify-content-center">
                                                        <div class="form-group" style="width: 100%; max-width: 350px;">
                                                            <select name="to_section" class="form-control"
                                                                style="
                                                                border-radius: 12px; 
                                                                border: 2px solid #0097B2; 
                                                                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); 
                                                                font-size: 16px;">
                                                                <option disabled selected>Select Section</option>
                                                                @foreach ($sections as $section)
                                                                    <option value="{{ $section }}">
                                                                        {{ $section }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="button" class="btn btn-primary our-color-1"
                                            id="promoteButton">Promote
                                            Students</button>
                                    </div>
                                </form>

                                <div class="feeallcard feeallshadow">
                                    <div id="yearly-sales-collapse" class="collapse show mt-5">
                                        <div class="table-responsive">
                                            <table class="table table-nowrap table-hover mb-0 text-center" id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th>GR Number</th>
                                                        <th>Student Name</th>
                                                        <th>Father Name</th>
                                                        <th>
                                                            <label for="selectAllCheckbox" style="margin-bottom:0px;">Select All</label>
                                                            <div class="form-check d-inline-block mx-2 mb-0">
                                                                <input class="form-check-input mb-0" type="checkbox"
                                                                    id="selectAllCheckbox">
                                                            </div>
                                                        </th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    @foreach ($add as $admission)
                                                        <tr>
                                                            <td>{{ $admission->gr_number }}</td>
                                                            <td>{{ $admission->student_name }}</td>
                                                            <td>{{ $admission->father_name }}</td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input studentCheckbox"
                                                                        type="checkbox"
                                                                        value="{{ $admission->gr_number }}"
                                                                        id="studentCheckbox{{ $admission->gr_number }}">
                                                                </div>
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
                <!-- end row -->

            </div>
            <!-- container -->

        </div>
        <!-- content -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="//cdn.datatables.net/2.1.3/js/dataTables.min.js"></script>
        <script>
            let table = new DataTable('#myTable');
        </script>
        <!-- Include SweetAlert2 CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

        <!-- Include SweetAlert2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

        <script>
            $(document).ready(function() {
                // Define the URL from the Blade template
                var promoteStudentsUrl = "{{ route('promote.students') }}";

                // Fetch students when class or section changes
                $('select[name="from_class"], select[name="from_section"]').change(function() {
                    fetchStudents();
                });

                // Promote students when promoteButton is clicked
                $('#promoteButton').click(function() {
                    var selectedClass = $('select[name="from_class"]').val();
                    if (!selectedClass) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Warning!',
                            text: 'Please select a class before promoting students.',
                            confirmButtonText: 'OK',
                            background: '#092139',
                            color: '#ffffff', // Set text color to white for better contrast
                            customClass: {
                                confirmButton: 'btn btn-warning'
                            },
                            buttonsStyling: false // Use custom button class
                        });
                        return;
                    }

                    var selectedStudents = [];
                    var excludedStudents = [];

                    // Collect IDs of selected and excluded students
                    $('.studentCheckbox').each(function() {
                        var studentId = $(this).val();
                        var isChecked = $(this).is(':checked');
                        if (isChecked) {
                            selectedStudents.push(studentId);
                        } else {
                            excludedStudents.push(studentId);
                        }
                    });

                    if (selectedStudents.length === 0) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Warning!',
                            text: 'Please select at least one student to promote.',
                            confirmButtonText: 'OK',
                            background: '#092139',
                            color: '#ffffff', // Set text color to white for better contrast
                            customClass: {
                                confirmButton: 'btn btn-warning'
                            },
                            buttonsStyling: false // Use custom button class
                        });
                        return;
                    }

                    promoteStudents(selectedStudents, excludedStudents);
                });

                // Handle "Select All" checkbox change event
                $('#selectAllCheckbox').change(function() {
                    var isChecked = $(this).is(':checked');
                    $('.studentCheckbox').prop('checked', isChecked);
                });

                function fetchStudents() {
                    var classId = $('select[name="from_class"]').val();
                    var sectionId = $('select[name="from_section"]').val();

                    $.ajax({
                        url: "{{ route('get.students') }}",
                        type: 'GET',
                        data: {
                            from_class: classId,
                            from_section: sectionId
                        },
                        success: function(response) {
                            var students = response;
                            var html = '';

                            if (students.length > 0) {
                                students.forEach(function(student) {
                                    if (student.Status !== 'Pass Out' && student.Status !==
                                        'Left Out') {
                                        html += '<tr>' +
                                            '<td>' + student.gr_number + '</td>' +
                                            '<td>' + student.student_name + '</td>' +
                                            '<td>' + student.father_name + '</td>' +
                                            '<td>' +
                                            '<div class="form-check">' +
                                            '<input class="form-check-input studentCheckbox" type="checkbox" value="' +
                                            student.id + '" id="flexCheckDefault">' +
                                            '</div>' +
                                            '</td>' +
                                            '</tr>';
                                    }
                                });
                            } else {
                                html =
                                '<tr><td colspan="4" class="text-center">No students found</td></tr>';
                            }

                            $('table tbody').html(html);
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }

                function promoteStudents(selectedStudents, excludedStudents) {
                    $.ajax({
                        url: promoteStudentsUrl,
                        method: 'POST',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token for security
                            from_class: $('select[name="from_class"]').val(),
                            from_section: $('select[name="from_section"]').val(),
                            to_class: $('select[name="to_class"]').val(),
                            to_section: $('select[name="to_section"]').val(),
                            selected_students: selectedStudents,
                            excluded_students: excludedStudents
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: response.success,
                                    confirmButtonText: 'OK',
                                    timer: 3000,
                                    background: '#092139',
                                    color: '#ffffff', // Set text color to white for better contrast
                                    customClass: {
                                        confirmButton: 'btn btn-success'
                                    },
                                    buttonsStyling: false // Use custom button class
                                }).then(() => {
                                    location.reload(); // Page reload after success
                                });
                            } else if (response.error) {
                                var errorMessages = response.error.join('\n');
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: errorMessages,
                                    confirmButtonText: 'OK',
                                    background: '#092139',
                                    color: '#ffffff', // Set text color to white for better contrast
                                    customClass: {
                                        confirmButton: 'btn btn-danger'
                                    },
                                    buttonsStyling: false // Use custom button class
                                }).then(() => {
                                    location.reload(); // Page reload after error
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'An error occurred while promoting students.',
                                confirmButtonText: 'OK',
                                background: '#092139',
                                color: '#ffffff', // Set text color to white for better contrast
                                customClass: {
                                    confirmButton: 'btn btn-danger',
                                    icon: 'custom-icon-error' // Custom class for the icon
                                },
                                buttonsStyling: false // Use custom button class
                            }).then(() => {
                                location.reload(); // Page reload after error
                            });
                        }
                    });
                }
            });
        </script>
    @endsection
