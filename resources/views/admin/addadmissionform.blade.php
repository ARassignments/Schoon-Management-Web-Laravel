@extends('admin.master')
@section('content')
<div class="content-page mt-4">
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="">
                    <div class="card-header  our-color-1 text-center add-addmission shadow">
                        <h4 class="header-title ">Add Addmission Form</h4>
                    </div>
                    <form action="{{url('storeaddmissionform')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body mt-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">GR Number</label>
                                        <input type="text" name="gr_number" class="form-control" placeholder="GR Number" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Student Name</label>
                                        <input type="text" name="student_name" class="form-control" placeholder="Student Name" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Father Name</label>
                                        <input type="text" name="father_name" class="form-control" placeholder="Father Name" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Student Age</label>
                                        <input type="number" id="student_age" name="student_age" class="form-control" placeholder="Student Age" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Mobile Number</label>
                                        <input type="text" name="mobile_number" class="form-control" placeholder="Mobile Number" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Class</label>
                                        <select name="class" class="form-control mb-3" required>
                                            <option value="" disabled selected>Select Class</option>
                                            <option>Nursery </option>
                                            <option>KG-1 </option>
                                            <option>KG-2 </option>
                                            <option>One </option>
                                            <option>Two </option>
                                            <option>Three </option>
                                            <option>Four </option>
                                            <option>Five </option>
                                            <option>Six </option>
                                            <option>Seven </option>
                                            <option>Eight </option>
                                            <option>Nine </option>
                                            <option>Matric </option>
                                            <option>Tahfees </option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Current Class</label>
                                        <select name="current_class" class="form-control mb-3" required>
                                            <option value="" disabled selected>Select Class</option>
                                            @foreach($adclass as $admissionclass)
                                            <option>{{$admissionclass->class_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6 mt-3 mt-lg-0">
                                    <div class="mb-3">
                                        <label class="form-label">Fees</label>
                                        <input type="text" name="fees" class="form-control" placeholder="Fees" required pattern="^\d+(\.\d{1,2})?$" title="Please enter a valid fee amount">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Date Of Addmission</label>
                                        <input type="date" name="date_of_addmission" class="form-control" placeholder="Date Of Addmission" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Date Of Birth</label>
                                        <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" placeholder="Date Of Birth" required onchange="calculateAge()">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Religion</label>
                                        <input type="text" name="religion" class="form-control" placeholder="Religion" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <input type="text" name="address" class="form-control" placeholder="Address" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Last Institute</label>
                                        <input type="text" name="last_institute" class="form-control" placeholder="Last Institute">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Section</label>
                                        <select name="section" class="form-control mb-3" required>
                                            <option value="" disabled selected>Select Section</option>
                                            @foreach($adsection as $admissionsection)
                                            <option>{{$admissionsection->section_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn our-color-1 w-25 justify-content-center d-flex mb-4 container">
                    </form>


                    <!-- end card-body -->
                </div>
                <!-- end card-->
            </div>
            <!-- end col -->
        </div>
    </div>
</div>
<!-- end row -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dobInput = document.getElementById('date_of_birth');
        const ageInput = document.getElementById('student_age');

        // Set max date to 4 years ago from today
        const today = new Date();
        const fourYearsAgo = new Date(today.getFullYear() - 4, today.getMonth(), today.getDate());
        const maxDate = fourYearsAgo.toISOString().split('T')[0]; // Format as YYYY-MM-DD
        dobInput.setAttribute('max', maxDate);

        // Automatically calculate age when date of birth changes
        dobInput.addEventListener('change', function() {
            const dob = new Date(this.value);
            const today = new Date();
            let age = today.getFullYear() - dob.getFullYear();
            const monthDifference = today.getMonth() - dob.getMonth();

            // Adjust age if the birth date has not yet occurred this year
            if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < dob.getDate())) {
                age--;
            }

            ageInput.value = age;
        });
    });
</script>
@endsection