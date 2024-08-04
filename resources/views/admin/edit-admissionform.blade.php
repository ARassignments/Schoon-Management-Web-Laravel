@extends('admin.master')
@section('content')
<div class="content-page mt-3">
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="">
                    <div class="card-header our-color-1 shadow">
                        <h4 class="header-title ">Edit Addmission Form</h4>
                    </div>
                    <form action="{{ url('update-addmissionform', $addmission->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body mt-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">GR Number</label>
                                        <input type="text" name="gr_number" value="{{ $addmission->gr_number }}" class="form-control" placeholder="GR Number" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Student Name</label>
                                        <input type="text" name="student_name" class="form-control" value="{{ $addmission->student_name }}" placeholder="Student Name" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Father Name</label>
                                        <input type="text" name="father_name" class="form-control" value="{{ $addmission->father_name }}" placeholder="Father Name" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Student Age</label>
                                        <input type="number" name="student_age" class="form-control" value="{{ $addmission->student_age }}" placeholder="Student Age" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Mobile Number</label>
                                        <input type="text" name="mobile_number" class="form-control" value="{{ $addmission->mobile_number }}" placeholder="Mobile Number" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Class</label>
                                        <select name="class" id="artistDropdown" class="form-control mb-3" required>
                                            <option value="">Select Class</option>
                                            @foreach($classes as $class)
                                            <option value="{{ $class }}" {{ $addmission->class == $class ? 'selected' : '' }}>
                                                {{$class }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Current Class</label>
                                        <select name="current_class" id="artistDropdown" class="form-control mb-3" required>
                                            <option value="">Select Class</option>
                                            @foreach($classes as $class)
                                            <option value="{{ $class }}" {{ $addmission->current_class == $class ? 'selected' : '' }}>
                                                {{$class }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-lg-6 mt-3 mt-lg-0">
                                    <div class="mb-3">
                                        <label class="form-label">Fees</label>
                                        <input type="text" name="fees" class="form-control" value="{{ $addmission->fees }}" placeholder="Fees" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Date Of Addmission</label>
                                        <input type="date" name="date_of_addmission" class="form-control" value="{{ $addmission->date_of_addmission }}" placeholder="Date Of Addmission" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Date Of Birth</label>
                                        <input type="date" name="date_of_birth" class="form-control" value="{{ $addmission->date_of_birth }}" placeholder="Date Of Birth" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Religion</label>
                                        <input type="text" name="religion" class="form-control" value="{{ $addmission->religion }}" placeholder="Religion">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <input type="text" name="address" value="{{ $addmission->address }}" class="form-control" placeholder="Address">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Last Institute</label>
                                        <input type="text" name="last_institute" class="form-control" value="{{ $addmission->last_institute }}" placeholder="Last Institute">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Section</label>
                                        <select name="section" id="artistDropdown" class="form-control mb-3" required>
                                            @foreach($classessec as $class)
                                            <option value="{{ $class }}" {{ $addmission->section == $class ? 'selected' : '' }}>
                                                {{$class }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
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
@endsection