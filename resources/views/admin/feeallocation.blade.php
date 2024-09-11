@extends('admin.master')
@section('content')
<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page mt-4">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- <div class="container">
                                        <div class="row mb-3">
                                            <div class="col order-5 d-flex flex-row-reverse">
                                                <a style="text-decoration: none;" href="{{ url('addadmissionform') }}">
                                                    <button class="addbutton">
                                                        Add Addmission Form
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div> -->
            <button class="addbtn-container rounded row mb-3 "> <a href="{{ url('addfeeallocation') }}" class="add-btn2 "><span class="spn2">Add Fees Allocation</span></a>
            </button>
            <div class="row">
                <div class="col-xl-12 ">
                    <!-- Todo-->
                    <div class="">
                        <div class="card-body p-0">
                            <div class="card-body-container p-3 d-flex align-items-center justify-content-end shadow rounded mt-4">
                                <!-- <div class="card-widgets me-3">
                                    <a href="javascript:;" data-bs-toggle="reload"><i class="ri-refresh-line text-white"></i></a>
                                    <a data-bs-toggle="collapse" href="#yearly-sales-collapse" role="button" aria-expanded="false" aria-controls="yearly-sales-collapse"><i class="ri-subtract-line text-white"></i></a>
                                </div> -->
                                <h5 class="header-title mb-0 me-auto text-white px-4">Fees Name</h5>

                                <!-- Searchbar Start -->
                                <!-- <div class="app-search ms-3">
                                                            <form>
                                                                <div class="input-group">
                                                                    <input type="search" class="form-control" placeholder="Search...">
                                                                    <span class="ri-search-line search-icon text-muted"></span>
                                                                </div>
                                                            </form>
                                                        </div> -->
                                {{-- <input class="search-input" name="text" placeholder="Search..." type="search"> --}}
                                <!-- Searchbar End -->
                            </div>
                            <div class="feeallcard feeallshadow">











                                <div class="card-body mt-3">
                                    <div class="row">




                                        <!-- <div class="mb-3 text-center">
                                                    <label class="form-label text-center">
                                                        <h3><b>Class</b></h3>
                                                    </label>
                                                    <div class="d-flex justify-content-center">
                                                        <select name="class" id="artistDropdown" class="form-control mb-3" style="width: 50%;">
                                                            <option>Select Class</option>
                                                            <option>Nursery Class</option>
                                                            <option>KG-1 Class</option>
                                                            <option>KG-2 Class</option>
                                                            <option>One Class</option>
                                                            <option>Two Class</option>
                                                            <option>Three Class</option>
                                                            <option>Four Class</option>
                                                            <option>Five Class</option>
                                                            <option>Six Class</option>
                                                            <option>Seven Class</option>
                                                            <option>Eight Class</option>
                                                            <option>Nine Class</option>
                                                            <option>Matric Class</option>
                                                            <hr>
                                                            <option>Tahfees Class</option>
                                                        </select>
                                                    </div>

                                                </div> -->



                                        <!-- <form action="{{ route('promote.students') }}" method="post">
                                                    @csrf
                                                    <div class="mb-3 text-center">


                                                        <h4 class="text-center mt-2"><b>Class</b></h4>
                                                        <div class="text-center">
                                                            <div class="d-flex justify-content-center">
                                                                <select name="from_class" class="form-control mb-3" style="width: 70%;">
                                                                    <option>Select Class</option>
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>



                                                    </div>
                                                </form> -->


                                        @if(session('success'))
                                        <div id="successMessage" class="alert alert-success fade show mt-4 text-center" role="alert">
                                            {{ session('success') }}
                                        </div>
                                        @endif
                                        @if(session('successdelete'))
                                        <div id="successMessage" class="alert alert-success fade show mt-4 text-center" role="alert">
                                            {{ session('successdelete') }}
                                        </div>
                                        @endif
                                        @if(session('successupdate'))
                                        <div id="successMessage" class="alert alert-success fade show mt-4 text-center" role="alert">
                                            {{ session('successupdate') }}
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

                                        <div class="container mt-5">
                                            <div class="row">
                                                <div class="col-12 d-flex justify-content-center align-items-center">
                                                    <div class="d-flex flex-column align-items-center">
                                                        <h4 class="text-center mb-3"><b>Class</b></h4>
                                                        <div class="form-group" style="width: 350px;">
                                                            <select name="from_class" class="form-control" style="
                                                                  border-radius: 12px; 
                                                                  border: 2px solid #0097B2; 
                                                                  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); 
                                                                  font-size: 16px; 
                                                                  width: 100%;">
                                                                <option disabled selected>Select Class</option>
                                                                @foreach ($class as $classes)
                                                                <option value="{{ $classes }}">{{ $classes }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <hr>

                                        <div id="dynamic-form-container">
                                            <!-- Dynamic form fields will be filled here -->
                                        </div>

                                   

                                        <div class="modal fade " id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger text-white">
                                                        <h5 class="modal-title" id="confirmationModalLabel">Confirm Delete</h5>
                                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <p class="fs-5">Are you sure you want to delete this class Fees?</p>
                                                    </div>
                                                    

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>













                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
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





    <script>
        $(document).ready(function() {
            var classIdToDelete; // Variable to store class ID to delete

            // Function to handle deletion confirmation and AJAX request for classes
            $(document).on('click', '.btn-delete-class', function(e) {
                e.preventDefault();
                var deleteUrl = $(this).attr('href'); // Get the delete URL from the button's href attribute
                classIdToDelete = $(this).data('class-id'); // Get the class ID from data attribute
                $('#confirmationModal').data('deleteUrl', deleteUrl); // Store the delete URL in the modal data

                // Show confirmation modal
                $('#confirmationModal').modal('show');
            });

            // Handle delete confirmation
            $('#confirmDeleteBtn').off().click(function() {
                var deleteUrl = $('#confirmationModal').data('deleteUrl');

                $.ajax({
                    url: deleteUrl,
                    type: 'GET',
                    success: function(response) {
                        console.log('Class deleted successfully.');

                        // Close the modal after successful deletion
                        $('#confirmationModal').modal('hide');

                        // Remove the deleted class from the dropdown
                        $('select[name="from_class"] option').each(function() {
                            if ($(this).val() === classIdToDelete.toString()) {
                                $(this).remove();
                                return false; // Exit loop once the option is found and removed
                            }
                            // Optionally refresh the data on the page
                            location.reload();
                        });

                        // Reset the class dropdown to "Select Class" if needed
                        if ($('select[name="from_class"] option:selected').val() === classIdToDelete.toString()) {
                            $('select[name="from_class"]').val('Select Class');
                        }

                        // Clear the dynamic form container
                        $('#dynamic-form-container').html('');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error deleting class:', error);
                        alert('Error deleting class. Please try again.');
                    }
                });
            });

            // Your existing AJAX code for fetching and displaying student details
            $('select[name="from_class"]').change(function() {
                var classId = $(this).val(); // Get the value from the select element

                if (classId === 'Select Class') {
                    $('#dynamic-form-container').html(''); // Clear the container if "Select Class" is chosen
                    return;
                }

                $.ajax({
                    url: "{{ url('get-stds') }}/" + classId, // Append classId to the URL
                    type: 'GET',
                    success: function(response) {
                        console.log(response); // Log the response to the console

                        var students = response;
                        var html = '';

                        students.forEach(function(student, index) {
                            html += '<div class="form-group row m-4">';
                            html += '<div class="col-lg-2">';
                            html += '<label for="admission_' + index + '">Admission</label>';
                            html += '<input type="text" name="admission_' + index + '" id="admission_' + index + '" class="form-control" placeholder="Admission" value="' + student.admission + '">';
                            html += '</div>';

                            html += '<div class="col-lg-2">';
                            html += '<label for="tution_' + index + '">Tution</label>';
                            html += '<input type="text" name="tution_' + index + '" id="tution_' + index + '" class="form-control" placeholder="Tution" value="' + student.tution + '">';
                            html += '</div>';

                            html += '<div class="col-lg-2">';
                            html += '<label for="annual_' + index + '">Annual</label>';
                            html += '<input type="text" name="annual_' + index + '" id="annual_' + index + '" class="form-control" placeholder="Annual" value="' + student.annual + '">';
                            html += '</div>';

                            html += '<div class="col-lg-2">';
                            html += '<label for="exam_fee_' + index + '">Exam Fee</label>';
                            html += '<input type="text" name="exam_fee_' + index + '" id="exam_fee_' + index + '" class="form-control" placeholder="Exam Fee" value="' + student.exam_fee + '">';
                            html += '</div>';

                            html += '<div class="col-lg-2">';
                            html += '<label for="lab_charges_' + index + '">Lab Charges</label>';
                            html += '<input type="text" name="lab_charges_' + index + '" id="lab_charges_' + index + '" class="form-control" placeholder="Lab Charges" value="' + student.lab_charges + '">';
                            html += '</div>';

                            html += '<div class="col-lg-2">';
                            html += '<label for="late_fee_' + index + '">Late Fee</label>';
                            html += '<input type="text" name="late_fee_' + index + '" id="late_fee_' + index + '" class="form-control" placeholder="Late Fee" value="' + student.late_fee + '">';
                            html += '</div>';

                            html += '<div class="col-lg-2 mt-5 mx-4">';
                            html += '<label for="pre_dues_' + index + '">PRE DUES</label>';
                            html += '<input type="text" name="pre_dues_' + index + '" id="pre_dues_' + index + '" class="form-control" placeholder="PRE DUES" value="' + student.pre_dues + '">';
                            html += '</div>';

                            html += '<div class="col-lg-2 mt-5 mx-4">';
                            html += '<label for="id_card_' + index + '">ID CARD</label>';
                            html += '<input type="text" name="id_card_' + index + '" id="id_card_' + index + '" class="form-control" placeholder="ID CARD" value="' + student.id_card + '">';
                            html += '</div>';

                            html += '<div class="col-lg-2 mt-5 mx-4">';
                            html += '<label for="board_fee_' + index + '">BOARD FEE</label>';
                            html += '<input type="text" name="board_fee_' + index + '" id="board_fee_' + index + '" class="form-control" placeholder="BOARD FEE" value="' + student.board_fee + '">';
                            html += '</div>';

                            html += '<div class="col-lg-2 mt-5 mx-4">';
                            html += '<label for="stationary_' + index + '">STATIONARY</label>';
                            html += '<input type="text" name="stationary_' + index + '" id="stationary_' + index + '" class="form-control" placeholder="STATIONARY" value="' + student.stationary + '">';
                            html += '</div>';

                            // Edit and Delete buttons in the same line
                            html += '<div class="mt-5 text-center">';
                            html += '<a href="/edit-feeallocation/' + student.id + '" class="btn our-color-1">Edit</a>';
                            html += '<a href="/delete-feeallocation/' + student.id + '" class="btn btn-danger btn-delete-class ml-2" data-class-id="' + student.id + '">Delete</a>';
                            html += '</div>';

                            html += '</div>'; // Closing form-group row
                        });

                        $('#dynamic-form-container').html(html);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('Error fetching students. Please try again.');
                    }
                });
            });
        });
    </script>








    @endsection