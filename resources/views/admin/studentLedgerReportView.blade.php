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


            <!-- ===============================================================Voucher-1-Start=============================================================== -->

            <div class="p-2">
                <div style="text-align: center; margin: 1%;">
                    {{-- <img src="/code-bar.png" id="barcodeImg1" height="60px" width="130px"> --}}
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
                                <span>{{ $add->gr_number }}</span>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;"
                                    class="col-4">Student Name</p>
                                <span>{{ $add->students_add->student_name }}</span>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;"
                                    class="col-4">Father Name</p>
                                <span>{{ $add->students_add->father_name }}</span>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;"
                                    class="col-4">Class</p>
                                <span>{{ $add->students_add->current_class }}</span>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;"
                                    class="col-4">Section</p>
                                <span>{{ $add->students_add->section }}</span>
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
                                    class="col-6">Previous Dues</p>
                                <span class="me-2">{{ $add->pre_dues }}</span>
                            </div>

                        </div>
                    </div>
                </div>


            </div>


            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table border-dark" border="1">
                            <thead>
                                <tr style="font-size: 12px; text-align: center;">
                                    <th>Receipt #</th>
                                    <th>Rec. Date</th>
                                    <th>Month</th>
                                    <th>Session</th>
                                    <th>Chln. Amt.</th>
                                    <th>Receipts</th>
                                    <th>Balance</th>
                                    <th>Issued</th>
                                    <th>Due Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($feeReceipts as $receipts)
                                    @php
                                        // Use Carbon to parse and format the date
                                        $date = \Carbon\Carbon::parse($receipts->date);
                                        $createdAt = \Carbon\Carbon::parse($receipts->created_at);
                                        $month = $date->format('F'); // Full month name, e.g., January
                                        $createdAtDate = $createdAt->format('Y-m-d'); // Format to 'YYYY-MM-DD'
                                    @endphp
                                    <tr class="text-center fs-5">
                                        <td>{{ $receipts->id }}</td>
                                        <td>{{ $receipts->date }}</td>
                                        <td>{{ $month }}</td>
                                        <td>{{ $add->session }}</td>
                                        <td>0</td>
                                        <td>{{ $receipts->receipts }}</td>
                                        <td>{{ $receipts->balance }}</td>
                                        <td>{{ $createdAtDate }}</td>
                                        <td>{{ $createdAtDate }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        function printElement(elementId) {
            var printContents = document.getElementById(elementId).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
