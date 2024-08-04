@extends('admin.master')
@section('content')
<div class="content-page mt-4">
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="">
                    <div class="card-header our-color-1 text-center add-addmission shadow">
                        <h4 class="header-title ">Edit Classes</h4>
                    </div>
                    <form action="{{ url('updateClass', $class->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body mt-3 ">
                            <div class="row d-flex justify-content-center ">
                                <div class="col-lg-6">
                                    <div class="mb-3 ">

                                        <label class="form-label ">Class Name</label>
                                        <input type="text" name="class_name" value="{{ $class->class_name }}" class="form-control"
                                            placeholder="Class Name">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Section Name</label>
                                        <input type="text" name="section_name" value="{{ $class->section_name }}" class="form-control"
                                            placeholder="Section Name">
                                    </div>
                                </div>
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
    <!-- end row -->
@endsection
