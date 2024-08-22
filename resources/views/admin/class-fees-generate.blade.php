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
                            <form method="POST" action="{{ route('store_class_voucher') }}">
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
                                            <input type="text" name="session" class="form-control">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label for="class" class="form-label">Class</label>
                                            <select name="class" id="class" class="form-control">
                                                <option>select</option>
                                                @foreach ($clases as $class)
                                                    <option value="{{ $class }}"
                                                        {{ isset($selectedClass) && $selectedClass == $class ? 'selected' : '' }}>
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
                                                        {{ isset($selectedSection) && $selectedSection == $section ? 'selected' : '' }}>
                                                        {{ $section }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Note 01</label>
                                            <input type="text" name="note_01" class="form-control">
                                        </div>
                                        <div class="row justify-content-center text-center mt-2">
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">Note 02</label>
                                                <input type="text" class="form-control" name="note_02">
                                            </div>
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
                                        <div class="col-12 text-center mt-3">
                                            <button type="button" class="btn btn-secondary w-25"
                                                onclick="refreshPage()">Refresh</button>
                                            <button type="submit" class="btn btn-primary w-25">Generate Fees</button>
                                            <button type="button" class="btn btn-danger w-25">Delete</button>
                                        </div>
                                        <div class="col-12 text-center mt-3">
                                            <a href="javascript:void(0);" class="btn btn-primary"
                                                onclick="printDiv('printableArea')"><i class="ri-printer-line"></i>
                                                Print</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <script>
                            function printDiv(divName) {
                                var printContents = document.getElementById(divName).innerHTML;
                                var originalContents = document.body.innerHTML;

                                document.body.innerHTML = printContents;

                                window.print();

                                document.body.innerHTML = originalContents;
                            }
                        </script>


                        <div class="container mt-5 shadow" style=" background-color: var(--tz-body-bg) ">



                            <!-- Dynamic fees table and vouchers -->
                            <div id="printableArea">
                                @foreach ($admis as $admission)
                                    <div class="my-5 page" size="A4"
                                        style="width: auto; height:auto; overflow: hidden; background: white; display: block; position: relative;">
                                        <div class="m-2 px-3 mt-4 border border-dark">
                                            <div class="pb-5 pt-3">
                                                <img src="{{ asset('assets/images/voucher-logo/voucherlogo.jpg') }}"
                                                    width="100px">
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <p
                                                            style="margin: 0; font-weight: 100; font-size: 14px; color: black;">
                                                            GRNo.__________ {{ $admission->gr_number }}</p>
                                                        <p
                                                            style="margin: 0; font-weight: 100; font-size: 14px; color: black;">
                                                            Father Name.__________ {{ $admission->father_name }}</p>
                                                        <p
                                                            style="margin: 0; font-weight: 100; font-size: 14px; color: black;">
                                                            Class.__________ {{ $admission->current_class }}</p>
                                                        <p
                                                            style="margin: 0; font-weight: 100; font-size: 14px; color: black;">
                                                            Section.__________ {{ $admission->section }}</p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p
                                                            style="margin: 0; font-weight: 100; font-size: 14px; color: black;">
                                                            Transaction</p>
                                                        <p
                                                            style="margin: 0; font-weight: 100; font-size: 14px; color: black;">
                                                            Issued</p>
                                                        <p
                                                            style="margin: 0; font-weight: 100; font-size: 14px; color: black;">
                                                            Due On</p>
                                                        <p
                                                            style="margin: 0; font-weight: 100; font-size: 14px; color: black;">
                                                            Session</p>
                                                        <p
                                                            style="margin: 0; font-weight: 100; font-size: 14px; color: black;">
                                                            Month</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <table class="table table-bordered border-dark"
                                                            id="fees-table-{{ $admission->id }}" style="width: auto;">
                                                            <thead>
                                                                <tr class="text-center" style="font-size: 0.75rem;">
                                                                    <th>Admission</th>
                                                                    <th>Tuition</th>
                                                                    <th>Annual</th>
                                                                    <th>Exam Fee</th>
                                                                    <th>Lab Charges</th>
                                                                    <th>Late Fee</th>
                                                                    <th>PRE DUES</th>
                                                                    <th>ID CARD</th>
                                                                    <th>BOARD FEE</th>
                                                                    <th>STATIONARY</th>
                                                                    <th>Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($admissionfees as $fee)
                                                                    <tr class="text-center">
                                                                        <td class="admission">{{ $fee->admission }}</td>
                                                                        <td class="tution">{{ $fee->tution }}</td>
                                                                        <td class="annual">{{ $fee->annual }}</td>
                                                                        <td class="exam_fee">{{ $fee->exam_fee }}</td>
                                                                        <td class="lab_charges">{{ $fee->lab_charges }}
                                                                        </td>
                                                                        <td class="late_fee">{{ $fee->late_fee }}</td>
                                                                        <td class="pre_dues">{{ $fee->pre_dues }}</td>
                                                                        <td class="id_card">{{ $fee->id_card }}</td>
                                                                        <td class="board_fee">{{ $fee->board_fee }}</td>
                                                                        <td class="stationary">{{ $fee->stationary }}</td>
                                                                        <td class="total">
                                                                            {{ $fee->admission + $fee->tution + $fee->annual + $fee->exam_fee + $fee->lab_charges + $fee->late_fee + $fee->pre_dues + $fee->id_card + $fee->board_fee + $fee->stationary }}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            function refreshPage() {
                window.location.href = "/classfeesgenerate";
            }

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
            });
        </script>
    @endsection
