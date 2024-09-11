@extends('admin.master')
@section('content')

    <head>
        <link rel="stylesheet" href="//cdn.datatables.net/2.1.3/css/dataTables.dataTables.min.css">
    </head>
    <div class="content-page mt-4">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="card">
                        <div class="card-header our-color-1 text-center add-addmission shadow">
                            <h4 class="header-title text-white">Fees Generate</h4>
                        </div>
                        <div class="container-fluid">
                            <form method="POST" action="{{ route('updateFeeVoucher', ['id' => $voucher->id]) }}">
                                @csrf
                                {{-- @method('PUT') <!-- This is important for a PUT request to update data --> --}}

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
                                            <input type="text" name="session" class="form-control"
                                                value="{{ $voucher->session }}">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label for="class" class="form-label">Class</label>
                                            <select name="class" id="class" class="form-control">
                                                <option>select</option>
                                                @foreach ($clases as $class)
                                                    <option value="{{ $class }}"
                                                        {{ $voucher->class == $class ? 'selected' : '' }}>
                                                        {{ $class }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label for="section" class="form-label">Section</label>
                                            <select name="section" id="section" class="form-control" required>
                                                <option>select</option>
                                                @foreach ($secs as $section)
                                                    <option value="{{ $section }}"
                                                        {{ $voucher->section == $section ? 'selected' : '' }}>
                                                        {{ $section }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Note 01</label>
                                            <input type="text" name="note_01" class="form-control"
                                                value="{{ $voucher->note_01 }}">
                                        </div>
                                        <div class="row justify-content-center text-center mt-2">
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">Note 02</label>
                                                <input type="text" class="form-control" name="note_02"
                                                    value="{{ $voucher->note_02 }}">
                                            </div>
                                        </div>

                                        <!-- Checkboxes for Fees -->
                                        <div class="col-lg-12 mx-5 mb-4 mt-4">
                                            <div class="row">
                                                <div class="col-md-4 form-check d-flex align-items-center">
                                                    <input type="checkbox" class="form-check-input me-2 fee-checkbox"
                                                        id="admission-checkbox" name="fees[admission]" value="{{ $voucher->admission > 0 ? $voucher->admission : '0' }}"
                                                        data-fee="admission"
                                                        {{ $voucher->admission > 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="admission-checkbox">Admission</label>
                                                </div>
                                                <div class="col-md-4 form-check d-flex align-items-center">
                                                    <input type="checkbox" class="form-check-input me-2 fee-checkbox"
                                                        id="tuition-checkbox" name="fees[tution]" value="{{ $voucher->tution > 0 ? $voucher->tution : '0' }}"
                                                        data-fee="tution" {{ $voucher->tution > 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="tuition-checkbox">Tuition</label>
                                                </div>
                                                <div class="col-md-4 form-check d-flex align-items-center">
                                                    <input type="checkbox" class="form-check-input me-2 fee-checkbox"
                                                        id="annual-checkbox" name="fees[annual]" value="{{ $voucher->annual > 0 ? $voucher->annual : '0' }}"
                                                        data-fee="annual" {{ $voucher->annual > 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="annual-checkbox">Annual</label>
                                                </div>
                                                <div class="col-md-4 form-check d-flex align-items-center">
                                                    <input type="checkbox" class="form-check-input me-2 fee-checkbox"
                                                        id="exam-fee-checkbox" name="fees[exam_fee]" value="{{ $voucher->exam_fee > 0 ? $voucher->exam_fee : '0' }}"
                                                        data-fee="exam_fee" {{ $voucher->exam_fee > 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="exam-fee-checkbox">Exam
                                                        Fee</label>
                                                </div>
                                                <div class="col-md-4 form-check d-flex align-items-center">
                                                    <input type="checkbox" class="form-check-input me-2 fee-checkbox"
                                                        id="lab-charges-checkbox" name="fees[lab_charges]" value="{{ $voucher->lab_charges > 0 ? $voucher->lab_charges : '0' }}"
                                                        data-fee="lab_charges"
                                                        {{ $voucher->lab_charges > 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="lab-charges-checkbox">Lab
                                                        Charges</label>
                                                </div>
                                                <div class="col-md-4 form-check d-flex align-items-center">
                                                    <input type="checkbox" class="form-check-input me-2 fee-checkbox"
                                                        id="late-fee-checkbox" name="fees[late_fee]" value="{{ $voucher->late_fee > 0 ? $voucher->late_fee : '0' }}"
                                                        data-fee="late_fee" {{ $voucher->late_fee > 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="late-fee-checkbox">Late
                                                        Fee</label>
                                                </div>
                                                <div class="col-md-4 form-check d-flex align-items-center">
                                                    <input type="checkbox" class="form-check-input me-2 fee-checkbox"
                                                        id="pre-dues-checkbox" name="fees[pre_dues]" value="{{ $voucher->pre_dues > 0 ? $voucher->pre_dues : '0' }}"
                                                        data-fee="pre_dues" {{ $voucher->pre_dues > 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="pre-dues-checkbox">PRE
                                                        DUES</label>
                                                </div>
                                                <div class="col-md-4 form-check d-flex align-items-center">
                                                    <input type="checkbox" class="form-check-input me-2 fee-checkbox"
                                                        id="id-card-checkbox" name="fees[id_card]" value="{{ $voucher->id_card > 0 ? $voucher->id_card : '0' }}"
                                                        data-fee="id_card" {{ $voucher->id_card > 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="id-card-checkbox">ID CARD</label>
                                                </div>
                                                <div class="col-md-4 form-check d-flex align-items-center">
                                                    <input type="checkbox" class="form-check-input me-2 fee-checkbox"
                                                        id="board-fee-checkbox" name="fees[board_fee]" value="{{ $voucher->board_fee > 0 ? $voucher->board_fee : '0' }}"
                                                        data-fee="board_fee"
                                                        {{ $voucher->board_fee > 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="board-fee-checkbox">BOARD
                                                        FEE</label>
                                                </div>
                                                <div class="col-md-4 form-check d-flex align-items-center">
                                                    <input type="checkbox" class="form-check-input me-2 fee-checkbox"
                                                        id="stationary-checkbox" name="fees[stationary]" value="{{ $voucher->stationary > 0 ? $voucher->stationary : '0' }}"
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
                                        <div class="col-12 text-center mt-3">
                                            <button type="submit" class="btn btn-primary w-25">Update Voucher</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>


                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>

            $(document).ready(function() {
                $('#class').change(function() {
                    var selectedClass = $(this).val();
                    if (selectedClass) {
                        $.ajax({
                            url: '{{ url('getclass') }}/' + selectedClass,
                            type: 'GET',
                            success: function(data) {
                                if (data) {
                                    console.log(data);

                                    // Update checkboxes with fetched values
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

                                    // Check the boxes if the value is not '0'
                                    // updateCheckboxStatus();
                                }
                            },
                            error: function(xhr) {
                                console.error('Error fetching class data');
                                // Handle error here
                            }
                        });
                    } else {
                        // If no class is selected, uncheck and reset values
                        $('.fee-checkbox').val('0').prop('checked', false);
                    }
                });

                // Function to update checkbox status based on value
                // function updateCheckboxStatus() {
                //     $('.fee-checkbox').each(function() {
                //         var value = $(this).val();
                //         if (value && value !== '0') {
                //             $(this).prop('checked', true);
                //         } else {
                //             $(this).prop('checked', false);
                //         }
                //     });
                // }

                // Event listener for checkbox changes
                // $('.fee-checkbox').change(function() {
                //     if ($(this).is(':checked')) {
                //         // If checked, do something with the value
                //         console.log('Checkbox ' + $(this).data('fee') + ' is checked with value: ' + $(this)
                //             .val());
                //         // You can perform additional actions here if needed
                //     } else {
                //         // If unchecked, reset the value to '0'
                //         $(this).val('0');
                //     }
                // });

                // Trigger change event on page load
                $('#class').trigger('change');
            });
        </script>
    @endsection
