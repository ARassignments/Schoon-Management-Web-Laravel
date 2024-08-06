@extends('admin.master')
@section('content')
    <div style=" background-color: rgb(161, 161, 161);" class="d-flex align-items-center justify-content-center">



        <div class="my-5 page" size="A4"
            style="   width: 21cm;
height: 29.7cm;
overflow: hidden; background: white;
display: block;
position: relative;">

            <!-- ===============================================================Voucher-1-Start=============================================================== -->



            <div class="p-2">
                <div style="text-align: center; margin: 1%;">
                    <img src="/code-bar.png" height="60px" width="70px">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="d-flex justify-content-start">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;" class="col-4">GRNo.</p>
                                <span>{{ $voucher->gr_number }}</span>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;" class="col-4">Student Name</p>
                                <span>{{ $voucher->students_add->student_name }}</span>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;" class="col-4">Father Name</p>
                                <span>{{ $voucher->students_add->father_name }}</span>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;" class="col-4">Class</p>
                                <span>{{ $voucher->class }}</span>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;" class="col-4">Section</p>
                                <span>{{ $voucher->section }}</span>
                            </div>
                        </div>



                        <!-- <div class="row second"> -->


                        <div class="col-md-4">
                            <div class="d-flex justify-content-between">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;" class="col-4">Transaction</p>
                                <span class="me-2">{{ $voucher->transaction_date }}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;" class="col-4">Issued</p>
                                <span class="me-2">{{ $voucher->issued_date }}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;" class="col-4">Due On</p>
                                <span class="me-2">{{ $voucher->due_date }}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;" class="col-4">Session</p>
                                <span class="me-2">{{ $voucher->session }}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;" class="col-4">Month</p>
                                <span class="me-2">{{ $voucher->month_year }}</span>
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
                    <div class="col-lg-6">
                        <div class="due-date">
                            <p
                                style="margin: 0;
                    font-weight: 100;
                    font-size: 14px;
                    color: rgb(255, 0, 0);
                    font-family: sans-serif;">
                                100/-Rs will be charged after due date.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">

                        <div class="d-flex justify-content-between">
                            <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;" class="col-4">Previous Dues</p>
                            <span class="me-2">{{ $voucher->previous_dues }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;" class="col-8">Total Payable (Within due Date)</p>
                            <span class="me-2">{{ $voucher->total_payable_within_due_date }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;" class="col-8">Total Payable (After due Date)</p>
                            <span class="me-2">{{ $voucher->total_payable_after_due_date }}</span>
                        </div>

                    </div>


                </div>
            </div>

            <!-- ===============================================================Voucher-1-End=============================================================== -->
            <!-- ===============================================================Voucher-2-Start=============================================================== -->

            <div class="p-2">
                <div style="text-align: center; margin: 1%;">
                    <img src="/code-bar.png" height="60px" width="70px">
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="d-flex justify-content-start">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;" class="col-4">GRNo.</p>
                                <span>{{ $voucher->gr_number }}</span>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;" class="col-4">Student Name</p>
                                <span>{{ $voucher->students_add->student_name }}</span>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;" class="col-4">Father Name</p>
                                <span>{{ $voucher->students_add->father_name }}</span>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;" class="col-4">Class</p>
                                <span>{{ $voucher->class }}</span>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;" class="col-4">Section</p>
                                <span>{{ $voucher->section }}</span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="d-flex justify-content-between">
                                <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;" class="col-4">Transaction</p>
                                <span class="me-2">{{$voucher->transaction_date}}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;" class="col-4">Issued</p>
                                <span class="me-2">{{$voucher->issued_date}}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;" class="col-4">Due On</p>
                                <span class="me-2">{{$voucher->due_date}}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;" class="col-4">Session</p>
                                <span class="me-2">{{$voucher->session}}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;" class="col-4">Month</p>
                                <span class="me-2">{{$voucher->month_year}}</span>
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
                    <div class="col-lg-6">
                        <div>
                            <p
                                style="margin: 0;
                    font-weight: 100;
                    font-size: 14px;
                    color: rgb(255, 0, 0);
                    font-family: sans-serif;">
                                100/-Rs will be charged after due date.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">

                        <div class="d-flex justify-content-between">
                            <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;" class="col-4">Previous Dues</p>
                            <span class="me-2">{{ $voucher->previous_dues }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;" class="col-8">Total Payable (Within due Date)</p>
                            <span class="me-2">{{ $voucher->total_payable_within_due_date }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;" class="col-8">Total Payable (After due Date)</p>
                            <span class="me-2">{{ $voucher->total_payable_after_due_date }}</span>
                        </div>
                    </div>



                </div>
            </div>
            <!-- ===============================================================Voucher-2-End=============================================================== -->
            <!-- ===============================================================Voucher-3-Start=============================================================== -->

            <div class="p-2">
                <div style="text-align: center; margin: 1%;">
                    <img src="/code-bar.png" height="60px" width="70px">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="d-flex justify-content-start">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;" class="col-4">GRNo.</p>
                                <span>{{ $voucher->gr_number }}</span>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;" class="col-4">Student Name</p>
                                <span>{{ $voucher->students_add->student_name }}</span>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;" class="col-4">Father Name</p>
                                <span>{{ $voucher->students_add->father_name }}</span>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;" class="col-4">Class</p>
                                <span>{{ $voucher->class }}</span>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p style="margin: 0;
                                    font-weight: 100;
                                    font-size: 14px;
                                    color: black;
                                    font-family: sans-serif;" class="col-4">Section</p>
                                <span>{{ $voucher->section }}</span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="d-flex justify-content-between">
                                <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;" class="col-4">Transaction</p>
                                <span class="me-2">{{$voucher->transaction_date}}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;" class="col-4">Issued</p>
                                <span class="me-2">{{$voucher->issued_date}}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;" class="col-4">Due On</p>
                                <span class="me-2">{{$voucher->due_date}}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;" class="col-4">Session</p>
                                <span class="me-2">{{$voucher->session}}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;" class="col-4">Month</p>
                                <span class="me-2">{{$voucher->month_year}}</span>
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
                    <div class="col-lg-6">
                        <div>
                            <p
                                style="margin: 0;
                    font-weight: 100;
                    font-size: 14px;
                    color: rgb(255, 0, 0);
                    font-family: sans-serif;">
                                100/-Rs will be charged after due date.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-flex justify-content-between">
                            <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;" class="col-4">Previous Dues</p>
                            <span class="me-2">{{ $voucher->previous_dues }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;" class="col-8">Total Payable (Within due Date)</p>
                            <span class="me-2">{{ $voucher->total_payable_within_due_date }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p style="margin: 0;
                                font-weight: 100;
                                font-size: 14px;
                                color: black;
                                font-family: sans-serif;" class="col-8">Total Payable (After due Date)</p>
                            <span class="me-2">{{ $voucher->total_payable_after_due_date }}</span>
                        </div>
                    </div>



                </div>
            </div>
            <!-- ===============================================================Voucher-3-End=============================================================== -->

        </div>
    </div>
@endsection
