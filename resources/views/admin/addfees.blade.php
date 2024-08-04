@extends('admin.master')
@section('content')
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page mt-4">
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div class="">
                        <div class="card-header  our-color-1 text-center add-addmission shadow">
                            <h4 class="header-title ">Add Fees Name</h4>
                        </div>
                        <form action="{{ url('storefees') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body mt-3">
                                <div class="row">
                                    <div class="d-flex justify-content-center">
                                        <div class="col-lg-6">
                                            <div class="mb-3 ">
                                                <label class="form-label">Fees Name</label>
                                                <input type="text" name="ees_name" class="form-control" placeholder="Fees Name">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- end col -->
                                    <!-- end col -->
                                </div>
                                <!-- end row -->
                            </div>
                            <input type="submit"
                                class="btn our-color-1 w-25 justify-content-center d-flex mb-4  container">
                        </form>
                        <!-- end card-body -->
                    </div>
                    <!-- end card-->
                </div>
                <!-- end col -->
            </div>
        </div>
    </div>
    <!-- content -->
@endsection
