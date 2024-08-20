@extends('admin.master')
@section('content')
    <div style=" background-color: rgb(161, 161, 161);" class="d-flex align-items-center justify-content-center flex-column">
        <button onclick="printElement('printableArea')" class="btn btn-primary mt-3">Print</button>

        <div class="my-3 page pb-3 mb-5" size="A4" id="printableArea"
            style="   width: 21cm;
            overflow: hidden; background: white;
            display: block;
            position: relative;">
            {{-- height: 29.7cm; --}}

            <svg id="barcode" class="d-none"></svg>
            <!-- ===============================================================Voucher-1-Start=============================================================== -->

            <div class="p-2">
                <div style="text-align: center; margin: 1%;">
                    <img src="/code-bar.png" id="barcodeImg1" height="60px" width="130px">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <div class="d-flex justify-content-start">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;"
                                    class="col-4">GRNo.</p>
                                <span>{{ $voucher->gr_number }}</span>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;"
                                    class="col-4">Student Name</p>
                                <span>{{ $voucher->students_add->student_name }}</span>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;"
                                    class="col-4">Father Name</p>
                                <span>{{ $voucher->students_add->father_name }}</span>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;"
                                    class="col-4">Class</p>
                                <span>{{ $voucher->class }}</span>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;"
                                    class="col-4">Section</p>
                                <span>{{ $voucher->section }}</span>
                            </div>
                        </div>



                        <!-- <div class="row second"> -->


                        <div class="col-4">
                            <div class="d-flex justify-content-between">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;"
                                    class="col-4">Transaction</p>
                                <span class="me-2">{{ $voucher->transaction_date }}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;"
                                    class="col-4">Issued</p>
                                <span class="me-2">{{ $voucher->issued_date }}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;"
                                    class="col-4">Due On</p>
                                <span class="me-2">{{ $voucher->due_date }}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;"
                                    class="col-4">Session</p>
                                <span class="me-2">{{ $voucher->session }}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;"
                                    class="col-4">Month</p>
                                <span class="me-2">{{ $voucher->month_year }}</span>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <table class="table border-dark" border="1">
                            <thead>
                                <tr style="font-size: 12px; text-align: center;">
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
                                <tr style="text-align: center">
                                    <td>{{ $voucher->admission }}</td>
                                    <td>{{ $voucher->tution }}</td>
                                    <td>{{ $voucher->annual }}</td>
                                    <td>{{ $voucher->exam_fee }}</td>
                                    <td>{{ $voucher->lab_charges }}</td>
                                    <td>{{ $voucher->late_fee }}</td>
                                    <td>{{ $voucher->pre_dues }}</td>
                                    <td>{{ $voucher->id_card }}</td>
                                    <td>{{ $voucher->board_fee }}</td>
                                    <td>{{ $voucher->stationary }}</td>
                                    <td>{{ $voucher->total }}</td>
                                </tr>
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="due-date">
                            <p
                                style="margin: 0;
                    font-weight: 100;
                    font-size: 14px;
                    color: rgb(255, 0, 0);
                    font-family: sans-serif;">
                                100/-Rs will be charged after due date.</p>
                        </div>
                        <p
                            style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: rgb(129, 129, 129);
                                font-family: sans-serif;">
                            {{ $voucher->note_01 }}</p>
                        <p
                            style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: rgb(129, 129, 129);
                                font-family: sans-serif;">
                            {{ $voucher->note_02 }}</p>
                    </div>
                    <div class="col-6">

                        <div class="d-flex justify-content-between">
                            <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;"
                                class="col-4">Previous Dues</p>
                            <span class="me-2">{{ $voucher->previous_dues }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;"
                                class="col-8">Total Payable (Within due Date)</p>
                            <span class="me-2">{{ $voucher->total_payable_within_due_date }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;"
                                class="col-8">Total Payable (After due Date)</p>
                            <span class="me-2">{{ $voucher->total_payable_after_due_date }}</span>
                        </div>

                    </div>


                </div>
            </div>

            <!-- ===============================================================Voucher-1-End=============================================================== -->
            <!-- ===============================================================Voucher-2-Start=============================================================== -->

            <div class="p-2">
                <div style="text-align: center; margin: 1%;">
                    <img src="/code-bar.png" id="barcodeImg2" height="60px" width="130px">
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <div class="d-flex justify-content-start">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;"
                                    class="col-4">GRNo.</p>
                                <span>{{ $voucher->gr_number }}</span>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;"
                                    class="col-4">Student Name</p>
                                <span>{{ $voucher->students_add->student_name }}</span>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;"
                                    class="col-4">Father Name</p>
                                <span>{{ $voucher->students_add->father_name }}</span>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;"
                                    class="col-4">Class</p>
                                <span>{{ $voucher->class }}</span>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;"
                                    class="col-4">Section</p>
                                <span>{{ $voucher->section }}</span>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="d-flex justify-content-between">
                                <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;"
                                    class="col-4">Transaction</p>
                                <span class="me-2">{{ $voucher->transaction_date }}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;"
                                    class="col-4">Issued</p>
                                <span class="me-2">{{ $voucher->issued_date }}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;"
                                    class="col-4">Due On</p>
                                <span class="me-2">{{ $voucher->due_date }}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;"
                                    class="col-4">Session</p>
                                <span class="me-2">{{ $voucher->session }}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;"
                                    class="col-4">Month</p>
                                <span class="me-2">{{ $voucher->month_year }}</span>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <table class="table border-dark" border="1">
                            <thead>
                                <tr style="font-size: 12px; text-align: center;">
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
                                <tr style="text-align: center;">
                                    <td>{{ $voucher->admission }}</td>
                                    <td>{{ $voucher->tution }}</td>
                                    <td>{{ $voucher->annual }}</td>
                                    <td>{{ $voucher->exam_fee }}</td>
                                    <td>{{ $voucher->lab_charges }}</td>
                                    <td>{{ $voucher->late_fee }}</td>
                                    <td>{{ $voucher->pre_dues }}</td>
                                    <td>{{ $voucher->id_card }}</td>
                                    <td>{{ $voucher->board_fee }}</td>
                                    <td>{{ $voucher->stationary }}</td>
                                    <td>{{ $voucher->total }}</td>
                                </tr>
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div>
                            <p
                                style="margin: 0;
                    font-weight: 100;
                    font-size: 14px;
                    color: rgb(255, 0, 0);
                    font-family: sans-serif;">
                                100/-Rs will be charged after due date.</p>
                        </div>
                        <p
                            style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: rgb(129, 129, 129);
                                font-family: sans-serif;">
                            {{ $voucher->note_01 }}</p>
                        <p
                            style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: rgb(129, 129, 129);
                                font-family: sans-serif;">
                            {{ $voucher->note_02 }}</p>
                    </div>
                    <div class="col-6">

                        <div class="d-flex justify-content-between">
                            <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;"
                                class="col-4">Previous Dues</p>
                            <span class="me-2">{{ $voucher->previous_dues }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;"
                                class="col-8">Total Payable (Within due Date)</p>
                            <span class="me-2">{{ $voucher->total_payable_within_due_date }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;"
                                class="col-8">Total Payable (After due Date)</p>
                            <span class="me-2">{{ $voucher->total_payable_after_due_date }}</span>
                        </div>
                    </div>



                </div>
            </div>
            <!-- ===============================================================Voucher-2-End=============================================================== -->
            <!-- ===============================================================Voucher-3-Start=============================================================== -->

            <div class="p-2">
                <div style="text-align: center; margin: 1%;">
                    <img src="/code-bar.png" id="barcodeImg3" height="60px" width="130px">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <div class="d-flex justify-content-start">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;"
                                    class="col-4">GRNo.</p>
                                <span>{{ $voucher->gr_number }}</span>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;"
                                    class="col-4">Student Name</p>
                                <span>{{ $voucher->students_add->student_name }}</span>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;"
                                    class="col-4">Father Name</p>
                                <span>{{ $voucher->students_add->father_name }}</span>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;"
                                    class="col-4">Class</p>
                                <span>{{ $voucher->class }}</span>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;"
                                    class="col-4">Section</p>
                                <span>{{ $voucher->section }}</span>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="d-flex justify-content-between">
                                <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;"
                                    class="col-4">Transaction</p>
                                <span class="me-2">{{ $voucher->transaction_date }}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;"
                                    class="col-4">Issued</p>
                                <span class="me-2">{{ $voucher->issued_date }}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;"
                                    class="col-4">Due On</p>
                                <span class="me-2">{{ $voucher->due_date }}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;"
                                    class="col-4">Session</p>
                                <span class="me-2">{{ $voucher->session }}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;"
                                    class="col-4">Month</p>
                                <span class="me-2">{{ $voucher->month_year }}</span>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <table class="table border-dark" border="1">
                            <thead>
                                <tr style="font-size: 12px; text-align: center;">
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
                                <tr style="text-align: center;">
                                    <td>{{ $voucher->admission }}</td>
                                    <td>{{ $voucher->tution }}</td>
                                    <td>{{ $voucher->annual }}</td>
                                    <td>{{ $voucher->exam_fee }}</td>
                                    <td>{{ $voucher->lab_charges }}</td>
                                    <td>{{ $voucher->late_fee }}</td>
                                    <td>{{ $voucher->pre_dues }}</td>
                                    <td>{{ $voucher->id_card }}</td>
                                    <td>{{ $voucher->board_fee }}</td>
                                    <td>{{ $voucher->stationary }}</td>
                                    <td>{{ $voucher->total }}</td>
                                </tr>
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div>
                            <p
                                style="margin: 0;
                    font-weight: 100;
                    font-size: 14px;
                    color: rgb(255, 0, 0);
                    font-family: sans-serif;">
                                100/-Rs will be charged after due date.</p>
                        </div>
                        <p
                            style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: rgb(129, 129, 129);
                                font-family: sans-serif;">
                            {{ $voucher->note_01 }}</p>
                        <p
                            style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: rgb(129, 129, 129);
                                font-family: sans-serif;">
                            {{ $voucher->note_02 }}</p>
                    </div>
                    <div class="col-6">
                        <div class="d-flex justify-content-between">
                            <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;"
                                class="col-4">Previous Dues</p>
                            <span class="me-2">{{ $voucher->previous_dues }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;"
                                class="col-8">Total Payable (Within due Date)</p>
                            <span class="me-2">{{ $voucher->total_payable_within_due_date }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;"
                                class="col-8">Total Payable (After due Date)</p>
                            <span class="me-2">{{ $voucher->total_payable_after_due_date }}</span>
                        </div>
                    </div>



                </div>
            </div>
            <!-- ===============================================================Voucher-3-End=============================================================== -->

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const barcodeValue = "{{ $voucher->gr_number }}"; // Example barcode value

            // Generate barcode in SVG
            JsBarcode("#barcode", barcodeValue, {
                format: "CODE128",
                displayValue: true,
                width: 2,
                height: 50
            });

            // document.querySelector("#barcode").with = "100%"

            // // Convert SVG to PNG image
            const svgElement = document.getElementById("barcode");
            const svgData = new XMLSerializer().serializeToString(svgElement);
            const canvas = document.createElement("canvas");
            const ctx = canvas.getContext("2d");
            const img = document.createElement("img");

            img.onload = function() {
                canvas.width = img.width;
                canvas.height = img.height;
                ctx.drawImage(img, 0, 0);
                const pngData = canvas.toDataURL("image/png");
                document.getElementById("barcodeImg1").src = pngData;
                document.getElementById("barcodeImg2").src = pngData;
                document.getElementById("barcodeImg3").src = pngData;
            };

            img.src = 'data:image/svg+xml;base64,' + btoa(svgData);
        });

        function printElement(elementId) {
            var printContents = document.getElementById(elementId).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
