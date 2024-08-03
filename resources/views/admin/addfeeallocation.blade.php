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
                        <h4 class="header-title ">Add Fees Allocation</h4>
                    </div>
                    <form action="{{ url('storefeeallocation') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card-body mt-3">
        <div class="row">
            <div class="mb-3 text-center">
                <label class="form-label text-center">
                    <h3><b>Class</b></h3>
                </label>
                <div class="d-flex justify-content-center">
                    <select name="class" id="artistDropdown" class="form-control mb-3" style="width: 50%;" required>
                        <option value="" disabled selected>Select Class</option>
                        @foreach($feealo as $fees)
                        <option>{{$fees->class_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">Admission</label>
                    <input type="text" name="admission" class="form-control" placeholder="Admission" required pattern="\d+" title="Please enter a valid number">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tution</label>
                    <input type="text" name="tution" class="form-control" placeholder="Tution" required pattern="\d+" title="Please enter a valid number">
                </div>

                <div class="mb-3">
                    <label class="form-label">Annual</label>
                    <input type="text" name="annual" class="form-control" placeholder="Annual" required pattern="\d+" title="Please enter a valid number">
                </div>

                <div class="mb-3">
                    <label class="form-label">Exam Fee</label>
                    <input type="text" name="exam_fee" class="form-control" placeholder="Exam Fee" required pattern="\d+" title="Please enter a valid number">
                </div>

                <div class="mb-3">
                    <label class="form-label">Lab Charges</label>
                    <input type="text" name="lab_charges" class="form-control" placeholder="Lab Charges" required pattern="\d+" title="Please enter a valid number">
                </div>
            </div> <!-- end col -->

            <div class="col-lg-6 mt-3 mt-lg-0">
                <div class="mb-3">
                    <label class="form-label">Late Fee</label>
                    <input type="text" name="late_fee" class="form-control" placeholder="Late Fee" required pattern="\d+" title="Please enter a valid number">
                </div>

                <div class="mb-3">
                    <label class="form-label">PRE DUES</label>
                    <input type="text" name="pre_dues" class="form-control" placeholder="PRE DUES" required pattern="\d+" title="Please enter a valid number">
                </div>

                <div class="mb-3">
                    <label class="form-label">ID CARD</label>
                    <input type="text" name="id_card" class="form-control" placeholder="ID CARD" required pattern="\d+" title="Please enter a valid number">
                </div>

                <div class="mb-3">
                    <label class="form-label">BOARD FEE</label>
                    <input type="text" name="board_fee" class="form-control" placeholder="BOARD FEE" required pattern="\d+" title="Please enter a valid number">
                </div>

                <div class="mb-3">
                    <label class="form-label">STATIONARY</label>
                    <input type="text" name="stationary" class="form-control" placeholder="STATIONARY" required pattern="\d+" title="Please enter a valid number">
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
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
<!-- content -->
@endsection