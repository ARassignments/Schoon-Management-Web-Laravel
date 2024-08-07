@extends('admin.master')
@section('content')
    <div class="feeallcard feeallshadow">
        <div id="yearly-sales-collapse" class="collapse show mt-4">

            <div class="table-responsive">
                <table class="table table-nowrap table-hover mb-0">
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
                                    <button type="button" class="btn our-color-1 rounded-2 shadow" data-bs-toggle="modal"
                                        data-bs-target="#statusModal{{ $addmission->id }}">
                                        Change Status
                                    </button>

                                </td>
                                <td>
                                    <a href="{{ url('edit-admissionform', $addmission->id) }}"
                                        class="btn our-color-1 rounded-2 shadow">Edit</a>
                                    <!-- Delete Button -->
                                    <button type="button" class="btn btn-danger mx-2" data-bs-toggle="modal"
                                        data-bs-target="#deleteConfirmationModal{{ $addmission->id }}">Delete</button>

                                    <!-- Delete Confirmation Modal -->
                                    <div class="modal fade" id="deleteConfirmationModal{{ $addmission->id }}"
                                        tabindex="-1" aria-labelledby="deleteConfirmationLabel{{ $addmission->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title"
                                                        id="deleteConfirmationLabel{{ $addmission->id }}">
                                                        Confirm Delete</h5>
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body ">
                                                    <p class="fs-5">"Are you sure you want to
                                                        delete the record for
                                                        {{ $addmission->student_name }}
                                                        {{ $addmission->father_name }}?"</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <form method="get"
                                                        action="{{ url('delete-addmissionform', $addmission->id) }}">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
            </div>
        </div>
    </div>
    
@endsection
