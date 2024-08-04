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
                                            <a style="text-decoration: none;" href="{{ url('addclass') }}">
                                                <button class="addbutton">
                                                    Add Class
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div> -->
            <button class="addbtn-container  row mb-3 "> <a href="{{ url('add-class') }}" class="add-btn2 "><span class="spn2">Add Class</span></a></button>
            <div class="row">
                <div class="col-xl-12 ">
                    <!-- Todo-->
                    <div class="">
                        <div class="card-body p-0">
                            <div class="card-body-container p-3 d-flex align-items-center justify-content-end rounded shadow ">
                                <div class="card-widgets me-3">
                                    <a href="javascript:;" data-bs-toggle="reload"><i class="ri-refresh-line text-white"></i></a>
                                    <a data-bs-toggle="collapse" href="#yearly-sales-collapse" role="button" aria-expanded="false" aria-controls="yearly-sales-collapse"><i class="ri-subtract-line text-white"></i></a>
                                </div>
                                <h5 class="header-title mb-0 me-auto text-white">All Classes</h5>

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
                                    <input class="search-input" name="search" placeholder="Search..." type="search" value="{{ $search }}">

                                </form>
                                <!-- Searchbar End -->
                            </div>



                            @if(session('success'))
                            <div id="successMessage" class="alert alert-success fade show mt-4 text-center" role="alert">
                                {{ session('success') }}
                            </div>
                            @endif
                            @if(session('successdelete'))
                            <div id="successMessage" class="alert alert-danger fade show mt-4 text-center" role="alert">
                                {{ session('successdelete') }}
                            </div>
                            @endif
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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



                            <div class="row mt-5">
                                @foreach ($class as $classes)
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                    <div class="card widget-flat text-bg-white shadow">
                                        <div class="card-body dashboard-card">
                                            <!-- <div class="float-end">
                                                            <i class="ri-eye-line widget-icon"></i>
                                                        </div> -->
                                            <h6 class="text-uppercase mt-0 our-color-2 fs-4" title="Customers">
                                                <h6 class="our-color"><b class="text-dark card-id">ID. </b>
                                                    {{ $classes->id }}
                                                </h6>
                                                <b>
                                                    <blockquote>
                                                        <h5 class="our-color-2 fs-3">Class</h5>
                                                        <p class="fs-1"> {{ $classes->class_name }}--{{ $classes->section_name }}</p>
                                                        <h2 class="my-2 our-color"> </h2>
                                                    </blockquote>
                                                </b>
                                            </h6>
                                            <hr>
                                            {{-- <h2 class="my-2 our-color"> {{ $classes->section_name }}</h2> --}}
                                            <p class="mb-0">
                                                <span class="badge bg-white bg-opacity-10 me-1">{{ $classes->created_at }}</span>
                                                <span class="text-nowrap">{{ $classes->updated_at }}</span>
                                            </p>
                                            <div class="d-flex justify-content-center mt-3">
                                                <a href="{{ url('editclass', $classes->id) }}" class="btn our-color-1 mx-2">Edit</a>
                                                <!-- Delete Confirmation Modal -->
                                                <div class="modal fade" id="deleteConfirmationModal-{{ $classes->id }}" tabindex="-1" aria-labelledby="deleteConfirmationLabel-{{ $classes->id }}" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-danger text-white">
                                                                <h5 class="modal-title" id="deleteConfirmationLabel-{{ $classes->id }}">Confirm Delete</h5>
                                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="fs-5">Are you sure you want to delete this class {{ $classes->class_name }}--{{ $classes->section_name }}?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                <form id="deleteForm-{{ $classes->id }}" method="get" action="{{ url('deleteclass', $classes->id) }}">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- Original Delete Button -->
                                                <button type="button" class="btn btn-danger mx-2" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal-{{ $classes->id }}">
                                                    Delete
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @endforeach


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
    @endsection