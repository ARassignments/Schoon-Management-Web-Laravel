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
                            <form method="post" action="{{ route('updateSpecialFeeVoucher', ['id' => $voucher->id]) }}">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Date Inputs -->
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Transaction Date</label>
                                            <input type="date" name="transaction_date" class="form-control"
                                                value="{{ $voucher->transaction_date }}">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Month n Year</label>
                                            <input type="month" name="month_year" class="form-control"
                                                value="{{ $voucher->month_year }}">
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Due Date</label>
                                            <input type="date" name="due_date" class="form-control"
                                                value="{{ $voucher->due_date }}">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Issued Date</label>
                                            <input type="date" name="issued_date" class="form-control"
                                                value="{{ $voucher->issued_date }}">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Session</label>
                                            <input type="text" name="session" class="form-control" placeholder="Session"
                                                value="{{ $voucher->session }}">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">GR Number</label>
                                            <input type="text" name="gr_number" class="form-control"
                                                placeholder="GR Number" value="{{ $voucher->gr_number }}">
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Note 01</label>
                                            <input type="text" name="note_01" class="form-control" placeholder="Note 01"
                                                value="{{ $voucher->note_01 }}">
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Note 02</label>
                                            <input type="text" class="form-control" id="note_02" name="note_02"
                                                placeholder="Note 02" value="{{ $voucher->note_02 }}">
                                        </div>


                                        <!-- Checkboxes for Fees -->
                                        <div class="col-lg-12 mx-5 mb-4 mt-4">
                                            <div class="row">
                                                <div class="col-md-4 form-check d-flex align-items-center">
                                                    <input type="checkbox" class="form-check-input me-2 fee-checkbox"
                                                        id="admission-checkbox" name="fees[admission]"
                                                        value="{{ $voucher->admission > 0 ? $voucher->admission : '0' }}"
                                                        data-fee="admission"
                                                        {{ $voucher->admission > 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="admission-checkbox">Admission</label>
                                                </div>
                                                <div class="col-md-4 form-check d-flex align-items-center">
                                                    <input type="checkbox" class="form-check-input me-2 fee-checkbox"
                                                        id="tuition-checkbox" name="fees[tution]"
                                                        value="{{ $voucher->tution > 0 ? $voucher->tution : '0' }}"
                                                        data-fee="tution" {{ $voucher->tution > 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="tuition-checkbox">Tuition</label>
                                                </div>
                                                <div class="col-md-4 form-check d-flex align-items-center">
                                                    <input type="checkbox" class="form-check-input me-2 fee-checkbox"
                                                        id="annual-checkbox" name="fees[annual]"
                                                        value="{{ $voucher->annual > 0 ? $voucher->annual : '0' }}"
                                                        data-fee="annual" {{ $voucher->annual > 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="annual-checkbox">Annual</label>
                                                </div>
                                                <div class="col-md-4 form-check d-flex align-items-center">
                                                    <input type="checkbox" class="form-check-input me-2 fee-checkbox"
                                                        id="exam-fee-checkbox" name="fees[exam_fee]"
                                                        value="{{ $voucher->exam_fee > 0 ? $voucher->exam_fee : '0' }}"
                                                        data-fee="exam_fee" {{ $voucher->exam_fee > 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="exam-fee-checkbox">Exam
                                                        Fee</label>
                                                </div>
                                                <div class="col-md-4 form-check d-flex align-items-center">
                                                    <input type="checkbox" class="form-check-input me-2 fee-checkbox"
                                                        id="lab-charges-checkbox" name="fees[lab_charges]"
                                                        value="{{ $voucher->lab_charges > 0 ? $voucher->lab_charges : '0' }}"
                                                        data-fee="lab_charges"
                                                        {{ $voucher->lab_charges > 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="lab-charges-checkbox">Lab
                                                        Charges</label>
                                                </div>
                                                <div class="col-md-4 form-check d-flex align-items-center">
                                                    <input type="checkbox" class="form-check-input me-2 fee-checkbox"
                                                        id="late-fee-checkbox" name="fees[late_fee]"
                                                        value="{{ $voucher->late_fee > 0 ? $voucher->late_fee : '0' }}"
                                                        data-fee="late_fee" {{ $voucher->late_fee > 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="late-fee-checkbox">Late
                                                        Fee</label>
                                                </div>
                                                <div class="col-md-4 form-check d-flex align-items-center">
                                                    <input type="checkbox" class="form-check-input me-2 fee-checkbox"
                                                        id="pre-dues-checkbox" name="fees[pre_dues]"
                                                        value="{{ $voucher->pre_dues > 0 ? $voucher->pre_dues : '0' }}"
                                                        data-fee="pre_dues" {{ $voucher->pre_dues > 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="pre-dues-checkbox">PRE
                                                        DUES</label>
                                                </div>
                                                <div class="col-md-4 form-check d-flex align-items-center">
                                                    <input type="checkbox" class="form-check-input me-2 fee-checkbox"
                                                        id="id-card-checkbox" name="fees[id_card]"
                                                        value="{{ $voucher->id_card > 0 ? $voucher->id_card : '0' }}"
                                                        data-fee="id_card" {{ $voucher->id_card > 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="id-card-checkbox">ID CARD</label>
                                                </div>
                                                <div class="col-md-4 form-check d-flex align-items-center">
                                                    <input type="checkbox" class="form-check-input me-2 fee-checkbox"
                                                        id="board-fee-checkbox" name="fees[board_fee]"
                                                        value="{{ $voucher->board_fee > 0 ? $voucher->board_fee : '0' }}"
                                                        data-fee="board_fee"
                                                        {{ $voucher->board_fee > 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="board-fee-checkbox">BOARD
                                                        FEE</label>
                                                </div>
                                                <div class="col-md-4 form-check d-flex align-items-center">
                                                    <input type="checkbox" class="form-check-input me-2 fee-checkbox"
                                                        id="stationary-checkbox" name="fees[stationary]"
                                                        value="{{ $voucher->stationary > 0 ? $voucher->stationary : '0' }}"
                                                        data-fee="stationary"
                                                        {{ $voucher->stationary > 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="stationary-checkbox">STATIONARY</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="row">
                                        <div class="col-12 text-center my-3">
                                            <button type="submit" class="btn btn-primary w-25">Voucher Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>

                    <!-- Voucher View -->

                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var selectedClass = '{{ $voucher->students_add->current_class }}';
            if (selectedClass) {
                $.ajax({
                    url: '{{ url('getclass') }}/' + selectedClass,
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
        });
    </script>
@endsection
