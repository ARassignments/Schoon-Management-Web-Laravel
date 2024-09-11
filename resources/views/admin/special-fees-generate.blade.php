@extends('admin.master')
@section('content')
    <div class="content-page mt-4">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10"> <!-- Adjusted to center the content -->
                    <div class="card">
                        <div class="card-header our-color-1 text-center add-addmission shadow">
                            <h4 class="header-title text-white"> Special Fees Generate</h4>
                        </div>
                        <div class="container-fluid">
                            <form action="{{ route('storeSpecialFeesVoucher') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Date Inputs -->
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Transaction Date</label>
                                            <input type="date" name="transaction_date" class="form-control">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Month n Year</label>
                                            <input type="month" name="month_year" class="form-control">
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Due Date</label>
                                            <input type="date" name="due_date" class="form-control">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Issued Date</label>
                                            <input type="date" name="issued_date" class="form-control">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Session</label>
                                            <input type="text" name="session" class="form-control" placeholder="Session">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">GR Number</label>
                                            <input type="text" name="gr_number" class="form-control" id="gr_number"
                                                placeholder="GR Number">
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Note 01</label>
                                            <input type="text" name="note_01" class="form-control" placeholder="Note 01">
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Note 02</label>
                                            <input type="text" class="form-control" id="note_02" name="note_02"
                                                placeholder="Note 02">
                                        </div>


                                        <!-- Checkboxes for Fees -->
                                        <div class="col-lg-12 mx-5 mb-4 mt-4">
                                            <div class="row">
                                                <div class="col-md-4 form-check d-flex align-items-center">
                                                    <input type="checkbox" class="form-check-input me-2 fee-checkbox"
                                                        id="admission-checkbox" name="fees[admission]" value=""
                                                        data-fee="admission">
                                                    <label class="form-check-label"
                                                        for="admission-checkbox">Admission</label>
                                                </div>
                                                <div class="col-md-4 form-check d-flex align-items-center">
                                                    <input type="checkbox" class="form-check-input me-2 fee-checkbox"
                                                        id="tuition-checkbox" name="fees[tution]" value=""
                                                        data-fee="tution">
                                                    <label class="form-check-label" for="tuition-checkbox">Tuition</label>
                                                </div>
                                                <div class="col-md-4 form-check d-flex align-items-center">
                                                    <input type="checkbox" class="form-check-input me-2 fee-checkbox"
                                                        id="annual-checkbox" name="fees[annual]" value=""
                                                        data-fee="annual">
                                                    <label class="form-check-label" for="annual-checkbox">Annual</label>
                                                </div>
                                                <div class="col-md-4 form-check d-flex align-items-center">
                                                    <input type="checkbox" class="form-check-input me-2 fee-checkbox"
                                                        id="exam-fee-checkbox" name="fees[exam_fee]" value=""
                                                        data-fee="exam_fee">
                                                    <label class="form-check-label" for="exam-fee-checkbox">Exam
                                                        Fee</label>
                                                </div>
                                                <div class="col-md-4 form-check d-flex align-items-center">
                                                    <input type="checkbox" class="form-check-input me-2 fee-checkbox"
                                                        id="lab-charges-checkbox" name="fees[lab_charges]" value=""
                                                        data-fee="lab_charges">
                                                    <label class="form-check-label" for="lab-charges-checkbox">Lab
                                                        Charges</label>
                                                </div>
                                                <div class="col-md-4 form-check d-flex align-items-center">
                                                    <input type="checkbox" class="form-check-input me-2 fee-checkbox"
                                                        id="late-fee-checkbox" name="fees[late_fee]" value=""
                                                        data-fee="late_fee">
                                                    <label class="form-check-label" for="late-fee-checkbox">Late
                                                        Fee</label>
                                                </div>
                                                <div class="col-md-4 form-check d-flex align-items-center">
                                                    <input type="checkbox" class="form-check-input me-2 fee-checkbox"
                                                        id="pre-dues-checkbox" name="fees[pre_dues]" value=""
                                                        data-fee="pre_dues">
                                                    <label class="form-check-label" for="pre-dues-checkbox">PRE
                                                        DUES</label>
                                                </div>
                                                <div class="col-md-4 form-check d-flex align-items-center">
                                                    <input type="checkbox" class="form-check-input me-2 fee-checkbox"
                                                        id="id-card-checkbox" name="fees[id_card]" value=""
                                                        data-fee="id_card">
                                                    <label class="form-check-label" for="id-card-checkbox">ID
                                                        CARD</label>
                                                </div>
                                                <div class="col-md-4 form-check d-flex align-items-center">
                                                    <input type="checkbox" class="form-check-input me-2 fee-checkbox"
                                                        id="board-fee-checkbox" name="fees[board_fee]" value=""
                                                        data-fee="board_fee">
                                                    <label class="form-check-label" for="board-fee-checkbox">BOARD
                                                        FEE</label>
                                                </div>
                                                <div class="col-md-4 form-check d-flex align-items-center">
                                                    <input type="checkbox" class="form-check-input me-2 fee-checkbox"
                                                        id="stationary-checkbox" name="fees[stationary]" value=""
                                                        data-fee="stationary">
                                                    <label class="form-check-label"
                                                        for="stationary-checkbox">STATIONARY</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="row">
                                        <div class="col-12 text-center mb-3">
                                            <button type="button"
                                                class="btn btn-primary btn-secondary w-50">List</button>
                                        </div>
                                        <div class="col-12 text-center">
                                            <button type="button"
                                                class="btn btn-primary our-color-1 w-25">ORIGINAL</button>
                                            <button type="button" class="btn btn-primary our-color-1 w-25">OFF.
                                                COPY</button>
                                            <button type="button" class="btn btn-primary our-color-1 w-25">ALL</button>
                                        </div>
                                        <div class="col-12 text-center mt-3">
                                            <button type="button" class="btn btn-secondary w-25"
                                                onclick="refreshPage()">Refresh</button>
                                            <button type="submit" class="btn btn-primary w-25">Generate</button>
                                            <button type="button" class="btn btn-danger w-25">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="container mt-5 d-none">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="our-color-1">
                                        <th>G. R. No.</th>
                                        <th>Student's Name</th>
                                        <th>Class</th>
                                        <th colspan="3">Date</th>
                                        <th>Session</th>
                                        <th>Month/Year</th>
                                    </tr>
                                    <tr class="our-color-1">
                                        <th colspan="3"></th>
                                        <th>Trans.</th>
                                        <th>Issue</th>
                                        <th>Due</th>
                                        <th colspan="2"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Rows can be added here -->
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <!-- Voucher View -->

                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function refreshPage() {
            window.location.href = "/specialfeesgenerate";
        }

        $(document).ready(function() {

            $('#gr_number').on('change', function() {
                var grNumber = $(this).val();

                if (grNumber) {
                    $.ajax({
                        url: '/fetchStudent/' + grNumber,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === 'success') {
                                if (response.data.current_class) {
                                    $.ajax({
                                        url: '{{ url('getclass') }}/' + response.data.current_class,
                                        type: 'GET',
                                        success: function(data) {
                                            if (data) {
                                                $('#admission-checkbox').val(data.admission || '0');
                                                $('#tuition-checkbox').val(data.tution || '0');
                                                $('#annual-checkbox').val(data.annual || '0');
                                                $('#exam-fee-checkbox').val(data.exam_fee || '0');
                                                $('#lab-charges-checkbox').val(data.lab_charges || '0');
                                                $('#late-fee-checkbox').val(data.late_fee || '0');
                                                $('#pre-dues-checkbox').val(data.pre_dues || '0');
                                                $('#id-card-checkbox').val(data.id_card || '0');
                                                $('#board-fee-checkbox').val(data.board_fee || '0');
                                                $('#stationary-checkbox').val(data.stationary || '0');
                                            }
                                        }
                                    });
                                }
                            }
                        },
                        error: function() {
                            alert('Error fetching student data');
                        }
                    });
                }
            });
        });
    </script>
@endsection
