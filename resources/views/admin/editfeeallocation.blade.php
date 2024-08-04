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
                        <h4 class="header-title ">Edit Fees Allocation</h4>
                    </div>
                    <form action="{{ url('update-feeallocation', $Fee->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body mt-3">
                            <div class="row">

                                <div class="mb-3 text-center">
                                    <label class="form-label text-center">
                                        <h3><b>Class</b></h3>
                                    </label>
                                    <div class="d-flex justify-content-center">
                                        <select name="class" id="artistDropdown" class="form-control mb-3" style="width: 50%;">
                                            <option value="">Select Class</option>
                                            <option value="Nursery" {{ $Fee->class == 'Nursery' ? 'selected' : '' }}>Nursery Class</option>
                                            <option value="KG-1" {{ $Fee->class == 'KG-1' ? 'selected' : '' }}>KG-1 Class</option>
                                            <option value="KG-2" {{ $Fee->class == 'KG-2' ? 'selected' : '' }}>KG-2 Class</option>
                                            <option value="One" {{ $Fee->class == 'One' ? 'selected' : '' }}>One Class</option>
                                            <option value="Two" {{ $Fee->class == 'Two' ? 'selected' : '' }}>Two Class</option>
                                            <option value="Three" {{ $Fee->class == 'Three' ? 'selected' : '' }}>Three Class</option>
                                            <option value="Four" {{ $Fee->class == 'Four' ? 'selected' : '' }}>Four Class</option>
                                            <option value="Five" {{ $Fee->class == 'Five' ? 'selected' : '' }}>Five Class</option>
                                            <option value="Six" {{ $Fee->class == 'Six' ? 'selected' : '' }}>Six Class</option>
                                            <option value="Seven" {{ $Fee->class == 'Seven' ? 'selected' : '' }}>Seven Class</option>
                                            <option value="Eight" {{ $Fee->class == 'Eight' ? 'selected' : '' }}>Eight Class</option>
                                            <option value="Nine" {{ $Fee->class == 'Nine' ? 'selected' : '' }}>Nine Class</option>
                                            <option value="Matric" {{ $Fee->class == 'Matric' ? 'selected' : '' }}>Matric Class</option>
                                            <option disabled>----------</option>
                                            <option value="Tahfees" {{ $Fee->class == 'Tahfees' ? 'selected' : '' }}>Tahfees Class</option>
                                        </select>
                                    </div>
                                </div>



                                <div class="col-lg-6">
                                    <div class="mb-3">

                                        <label class="form-label">Admission</label>
                                        <input type="text" name="admission" class="form-control" value="{{ $Fee->admission }}" placeholder="Admission">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Tution</label>
                                        <input type="text" name="tution" class="form-control" value="{{ $Fee->tution }}" placeholder="Tution">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Annual</label>
                                        <input type="text" name="annual" class="form-control" value="{{$Fee->annual}}" placeholder="Annual">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Exam Fee H</label>
                                        <input type="text" name="exam_fee" class="form-control" value="{{$Fee->exam_fee}}" placeholder="Exam Fee">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Lab Charges</label>
                                        <input type="text" name="lab_charges" class="form-control" value="{{$Fee->lab_charges}}" placeholder="Lab Charges">
                                    </div>

                                </div> <!-- end col -->

                                <div class="col-lg-6 mt-3 mt-lg-0">

                                    <div class="mb-3">
                                        <label class="form-label">Late Fee</label>
                                        <input type="text" name="late_fee" class="form-control" value="{{$Fee->late_fee}}" placeholder="Late Fee">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">PRE DUES</label>
                                        <input type="text" name="pre_dues" class="form-control" value="{{$Fee->pre_dues}}" placeholder="PRE DUES">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">ID CARD</label>
                                        <input type="text" name="id_card" class="form-control" value="{{$Fee->id_card}}" placeholder="ID CARD">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">BOARD FEE</label>
                                        <input type="text" name="board_fee" class="form-control" value="{{$Fee->board_fee}}" placeholder="BOARD FEE">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">STATIONARY</label>
                                        <input type="text" name="stationary" class="form-control" value="{{$Fee->stationary}}" placeholder="STATIONARY"></input>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <input type="submit" class="btn our-color-1 w-25 justify-content-center d-flex mb-4  container">
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