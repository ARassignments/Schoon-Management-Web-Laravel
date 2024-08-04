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
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Date Inputs -->
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Transaction Date</label>
                                            <input type="date" name="transaction_date" class="form-control" placeholder="Transaction Date">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Month n Year</label>
                                            <input type="month" name="month_year" class="form-control" placeholder="Month n Year">
                                        </div>
                                      
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Due Date</label>
                                            <input type="date" name="due_date" class="form-control" placeholder="Due Date">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Issued Date</label>
                                            <input type="date" name="issued_date" class="form-control" placeholder="Issued Date">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Session</label>
                                            <input type="text" name="session" class="form-control" placeholder="Session">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">GR Numbe</label>
                                            <input type="text" name="session" class="form-control" placeholder="Session">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Note 01</label>
                                            <input type="text" name="note_01" class="form-control" placeholder="Note 01">
                                        </div>
                                        
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">Note 02</label>
                                                <input type="text" class="form-control" id="note_02" name="note_02" placeholder="Note 02">
                                            </div>
                                        
                                        
                            
                                        <!-- Checkboxes for Fees -->
                                        <div class="col-lg-12 mx-5 mb-4 mt-4">
                                            <div class="row ">
                                            
                                            </div>
                                        </div>
                                    </div>
                            
                                    <!-- Action Buttons -->
                                    <div class="row">
                                        <div class="col-12 text-center mb-3">
                                            <button type="button" class="btn btn-primary btn-secondary w-50">List</button>
                                        </div>
                                        <div class="col-12 text-center">
                                            <button type="button" class="btn btn-primary our-color-1 w-25">ORIGINAL</button>
                                            <button type="button" class="btn btn-primary our-color-1 w-25">OFF. COPY</button>
                                            <button type="button" class="btn btn-primary our-color-1 w-25">ALL</button>
                                        </div>
                                        <div class="col-12 text-center mt-3">
                                            <button type="button" class="btn btn-secondary w-25">Refresh</button>
                                            <button type="submit" class="btn btn-primary w-25">Generate</button>
                                            <button type="button" class="btn btn-danger w-25">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                        <div class="container mt-5">
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

@endsection