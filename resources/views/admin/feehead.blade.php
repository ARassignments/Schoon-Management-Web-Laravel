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
                <button class="addbtn-container rounded row mb-3 "> <a href="{{ url('addfees') }}" class="add-btn2 "><span class="spn2">Add Fees Name</span></a>
                </button>
                <div class="row">
                    <div class="col-xl-12 ">
                        <!-- Todo-->
                        <div class="">
                            <div class="card-body p-0">
                                <div class="card-body-container p-3 d-flex align-items-center justify-content-end shadow rounded mt-4">
                                    <div class="card-widgets me-3">
                                        <a href="javascript:;" data-bs-toggle="reload"><i class="ri-refresh-line text-white"></i></a>
                                        <a data-bs-toggle="collapse" href="#yearly-sales-collapse" role="button" aria-expanded="false" aria-controls="yearly-sales-collapse"><i class="ri-subtract-line text-white"></i></a>
                                    </div>
                                    <h5 class="header-title mb-0 me-auto text-white">Fees Name</h5>
    
                                    <!-- Searchbar Start -->
                                    <!-- <div class="app-search ms-3">
                                        <form>
                                            <div class="input-group">
                                                <input type="search" class="form-control" placeholder="Search...">
                                                <span class="ri-search-line search-icon text-muted"></span>
                                            </div>
                                        </form>
                                    </div> -->
                                    <input class="search-input" name="text" placeholder="Search..." type="search">
                                    <!-- Searchbar End -->
                                </div>
                                <div id="yearly-sales-collapse" class="collapse show mt-4">
    
                                    <div class="table-responsive">
                                        <table class="table table-nowrap table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Fees Name</th>
                                                    <th>Created Date</th>
                                                    <th>Updated Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
    
                                                {{-- @foreach ($add as $addmission) --}}
                                                <tr>
                                                    <td></td>
                                                    {{-- <td>
                                                        <a href="{{ url('edit-admissionform', $addmission->id) }}" class="btn our-color-1">Edit</a>
                                                        <a href="{{ url('delete-addmissionform', $addmission->id) }}" class="btn btn-danger">Delete</a>
                                                    </td> --}}
                                                </tr>
                                                {{-- @endforeach --}}
    
                                            </tbody>
    
    
                                        </table>
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



@endsection