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
                <button class="addbtn-container rounded row mb-3 "> <a href="{{ url('classfeesgenerate') }}"
                        class="add-btn2 "><span class="spn2">Generate Class Voucher</span></a>
                </button>
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
                                                                    class="btn btn-sm our-color-1 rounded-2 shadow">View</a>
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
    @endsection
