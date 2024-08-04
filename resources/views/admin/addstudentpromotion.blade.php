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
                            <h4 class="header-title ">Add Student Promotion</h4>
                        </div>
                        <form action="{{ url('storeStudentPromotion') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body mt-3">
                                <div class="row">
                                    
                                    <div class="mb-3 text-center">
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
                                    </div>
                                    
                                    
                                    
                                    <div class="col-lg-6">
                                        <div class="mb-3">

                                            <label class="form-label">Admission</label>
                                            <input type="text" name="admission" class="form-control"
                                                placeholder="Admission">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Tution</label>
                                            <input type="text" name="tution" class="form-control"
                                                placeholder="Tution">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Annual</label>
                                            <input type="text" name="annual" class="form-control"
                                                placeholder="Annual">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Exam Fee (H)</label>
                                            <input type="number" name="exam_fee" class="form-control"
                                                placeholder="Exam Fee">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Lab Charges</label>
                                            <input type="text" name="lab_charges" class="form-control"
                                                placeholder="Lab Charges">
                                        </div>

                                    </div> <!-- end col -->

                                    <div class="col-lg-6 mt-3 mt-lg-0">

                                        <div class="mb-3">
                                            <label class="form-label">Late Fee</label>
                                            <input type="text" name="late_fee" class="form-control" placeholder="Late Fee">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">PRE DUES</label>
                                            <input type="text" name="Pre_dues" class="form-control"
                                                placeholder="PRE DUES">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">ID CARD</label>
                                            <input type="date" name="id_card" class="form-control"
                                                placeholder="ID CARD">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">BOARD FEE</label>
                                            <input type="text" name="board_fee" class="form-control"
                                                placeholder="BOARD FEE">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">STATIONARY</label>
                                            <input type="text" name="stationary" class="form-control" placeholder="STATIONARY"></input>
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
    <!-- content -->
@endsection
