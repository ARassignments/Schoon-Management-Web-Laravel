@extends('admin.master')
@section('content')

    <head>
        <link rel="stylesheet" href="//cdn.datatables.net/2.1.3/css/dataTables.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    </head>
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page mt-4">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                <button class="addbtn-container rounded row mb-3 "> <a href="{{ url('addadmissionform') }}"
                        class="add-btn2 "><span class="spn2">Add Addmission Form</span></a>
                </button>
                <div class="row">
                    <div class="col-xl-12 ">
                        <!-- Todo-->
                        <div class="">
                            <div class="card-body p-0">
                                <div class="card-body-container p-3 d-flex align-items-center justify-content-end shadow rounded mt-4">
                                    <h5 class="header-title mb-0 me-auto text-white">Admission Form</h5>
                                   
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
                                                            <th>Created Date</th>
                                                            <th>Updated Date</th>
                                                            <th>Status</th>
                                                            <th>Edit/Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @foreach ($add as $addmission)
                                                            <tr class="text-center">
                                                                <td>{{ $addmission->id }}</td>
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
                                                                <td>{{ $addmission->created_at }}</td>
                                                                <td>{{ $addmission->updated_at }}</td>
                                                                <td>
                                                                    <button type="button"
                                                                        class="btn btn-sm our-color-1 rounded-2 shadow"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#statusModal{{ $addmission->id }}">
                                                                        Change Status
                                                                    </button>

                                                                </td>
                                                                <td>
                                                                    <a href="{{ url('edit-admissionform', $addmission->id) }}"
                                                                        class="btn btn-sm our-color-1 rounded-2 shadow">Edit</a>
                                                                    <!-- Delete Button -->
                                                                    <button type="button" class="btn btn-sm btn-danger mx-2"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#deleteConfirmationModal{{ $addmission->id }}">Delete</button>

                                                                    <!-- Delete Confirmation Modal -->
                                                                    <div class="modal fade"
                                                                        id="deleteConfirmationModal{{ $addmission->id }}"
                                                                        tabindex="-1"
                                                                        aria-labelledby="deleteConfirmationLabel{{ $addmission->id }}"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header bg-danger text-white">
                                                                                    <h5 class="modal-title"
                                                                                        id="deleteConfirmationLabel{{ $addmission->id }}">
                                                                                        Confirm Delete</h5>
                                                                                    <button type="button"
                                                                                        class="btn-close btn-close-white"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body ">
                                                                                    <p class="fs-5">"Are you sure you want to
                                                                                        delete the record for
                                                                                        {{ $addmission->student_name }}
                                                                                        {{ $addmission->father_name }}?"</p>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-bs-dismiss="modal">Cancel</button>
                                                                                    <form method="get"
                                                                                        action="{{ url('delete-addmissionform', $addmission->id) }}">
                                                                                        @csrf
                                                                                        <button type="submit"
                                                                                            class="btn btn-danger">Delete</button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

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

                                                        @foreach ($add as $addmission)
                                                            <div class="modal fade" id="statusModal{{ $addmission->id }}"
                                                                tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div
                                                                    class="modal-dialog modal-dialog-centered d-flex justify-content-center">
                                                                    <div class="modal-content rounded-4 shadow-lg">
                                                                        <div class="modal-header align-items-center text-white">
                                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                                <b>Change Status</b>
                                                                            </h5>
                                                                            <button type="button"
                                                                                class="btn-close btn-close-white"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body py-3 px-3 text-center">
                                                                            <form id="statusForm{{ $addmission->id }}"
                                                                                data-id="{{ $addmission->id }}">
                                                                                @csrf
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        for="statusSelect{{ $addmission->id }}"
                                                                                        class="text-white fw-bold mb-2"
                                                                                        style="font-size: 1.1rem;">Select
                                                                                        Status</label>
                                                                                    <select
                                                                                        id="statusSelect{{ $addmission->id }}"
                                                                                        name="status"
                                                                                        class="form-select text-center fw-bold border-0">
                                                                                        <option value="" disabled
                                                                                            selected>Select status</option>
                                                                                        <option value="Current">Current
                                                                                        </option>
                                                                                        <option value="Left Out">Left Out
                                                                                        </option>
                                                                                        <option value="Pass Out">Pass Out
                                                                                        </option>
                                                                                    </select>
                                                                                    <input type="hidden" name="id"
                                                                                        value="{{ $addmission->id }}">
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-danger rounded-pill"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                            <button type="button"
                                                                                class="btn btn-success rounded-pill save-status"
                                                                                data-id="{{ $addmission->id }}"
                                                                                data-student-name="{{ $addmission->student_name }}"
                                                                                data-father-name="{{ $addmission->father_name }}">Update
                                                                                Status</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
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
    @endsection
