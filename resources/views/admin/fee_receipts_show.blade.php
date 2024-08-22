@extends('admin.master')
@section('content')

    <head>
        <link rel="stylesheet" href="//cdn.datatables.net/2.1.3/css/dataTables.dataTables.min.css">
    </head>
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <style>
        /* Chrome, Safari, Edge, Opera */
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type="number"] {
            -moz-appearance: textfield;
        }

        #scanner-container {
            position: relative;
            width: 100%;
            max-width: 600px;
            margin: auto;
        }

        #interactive {
            width: 100%;
            height: auto;
            display: none;
        }

        #interactive video {
            border-radius: 20px;
        }

        #interactive canvas {
            display: none;
        }
    </style>


    <div class="content-page mt-4">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">

                <div id="scanner-container">
                    <div id="interactive" class="viewport"></div>
                </div>
                <p id="result"></p>

                <form id="feeReceiptForm" class="d-flex align-items-center gap-2 col-md-4">
                    @csrf
                    <input type="number" name="gr_number" id="gr_number" maxlength="10"
                        class="form-control form-control-lg col-md-8" placeholder="GR Number Here..." required>
                    <button type="submit" class="add-btn2 col-md-5">
                        <span class="spn2">Add Receipt</span>
                    </button>
                    <button class="add-btn2 scanBarCodeBtn col-md-5" type="button">
                        <span class="spn2">Scan Voucher</span>
                    </button>
                </form>

                <div class="row">
                    <div class="col-xl-12 ">
                        <!-- Todo-->
                        <div class="">
                            <div class="card-body p-0">
                                <div
                                    class="card-body-container p-3 d-flex align-items-center justify-content-end shadow rounded mt-4">

                                    <h5 class="header-title mb-0 me-auto text-white">Fee Receipts</h5>

                                
                                    <form class="app-search" action="" method="GET">
                                        <input class="search-input" name="search" placeholder="Search GR Number..."
                                            type="text" maxlength="10" value="" onkeyup="fetchData(this.value)"
                                            onchange="fetchData(this.value)"
                                            onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">

                                    </form>
                                    <!-- Searchbar End -->
                                </div>
                                @if (session('success'))
                                    <div id="successMessage" class="alert alert-success fade show mt-3 text-center"
                                        role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (session('successdelete'))
                                    <div id="successMessage" class="alert alert-danger fade show mt-3 text-center"
                                        role="alert">
                                        {{ session('successdelete') }}
                                    </div>
                                @endif
                                {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        var successMessage = document.getElementById('successMessage');
                                        if (successMessage) {
                                            setTimeout(function() {
                                                var bsAlert = new bootstrap.Alert(successMessage);
                                                bsAlert.close(); // This will trigger the fade-out animation
                                            }, 3000); // Display duration
                                        }
                                    });
                                </script>
                                <div class="feeallcard feeallshadow">
                                    <div id="yearly-sales-collapse" class="collapse show mt-4">
                                        <div class="form-group p-3">
                                            <label for="filterSelector">Filter By:</label>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <select id="filterSelector" class="form-select"
                                                    onchange="fetchFilterData()">
                                                    <option value="" selected disabled>--Select Filter--</option>
                                                    <option value="all">All Data</option>
                                                    <option value="today">Today</option>
                                                    <option value="monthly">This Month</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-nowrap table-hover mb-0">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>#</th>
                                                        <th>Id</th>
                                                        <th>Date</th>
                                                        <th>GR No.</th>
                                                        <th>Student Detail</th>
                                                        <th>Total Amount</th>
                                                        <th>Pay Type</th>
                                                        <th>Discount</th>
                                                        <th>Receipts</th>
                                                        <th>Balance</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="feeReceiptContainer">

                                                    <tr>
                                                        <td colspan="11">
                                                            <h1 class="text-center display-4 fs-1 text-uppercase mt-2">
                                                                data
                                                                not found</h1>
                                                        </td>
                                                    </tr>

                                                    <style>
                                                        /* Modal Styles */
                                                        .modal-header {
                                                            background-color: #0C2B4B;
                                                            border-bottom: none;
                                                        }

                                                        .modal-body {
                                                            background-color: #0C2B4B;
                                                            border-top: 3px solid #0097b2;
                                                        }

                                                        .modal-footer {
                                                            background-color: #0C2B4B;
                                                            border-top: none;
                                                        }

                                                        /* Dropdown Styles */
                                                        .form-select {
                                                            font-size: 1.1rem;
                                                            color: #092139;
                                                            transition: background-color 0.3s, color 0.3s;
                                                        }

                                                        .form-select:hover,
                                                        .form-select:focus {
                                                            background-color: #0097b2;
                                                            color: #ffffff;
                                                        }

                                                        .form-select option {
                                                            background-color: #ffffff;
                                                            color: #092139;
                                                        }

                                                        .form-select option:hover {
                                                            background-color: red;
                                                            color: #ffffff;
                                                        }
                                                    </style>

                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div>
                <!-- end row -->

            </div>
            <!-- container -->

        </div>
        <!-- content -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="//cdn.datatables.net/2.1.3/js/dataTables.min.js"></script>
        <script>
            let table = new DataTable('#myTable');
        </script>
        <!-- Include SweetAlert2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.save-status').click(function() {
                    var studentId = $(this).data('id');
                    var studentName = $(this).data('student-name');
                    var fatherName = $(this).data('father-name');
                    var form = $('#statusForm' + studentId);
                    var formData = form.serialize();

                    $.ajax({
                        url: '/update-status', // Adjust to your actual route
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            // Handle success
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: 'Status for ' + studentName + ' ' + fatherName +
                                    ' updated successfully!',
                                confirmButtonText: 'OK',
                                background: '#092139',
                                color: '#ffffff',
                                customClass: {
                                    confirmButton: 'btn btn-success'
                                },
                                buttonsStyling: false
                            }).then(() => {
                                $('#statusModal' + studentId).modal('hide');
                                // Optionally refresh the data on the page
                                location.reload();
                            });
                        },
                        error: function(response) {
                            // Handle error
                            Swal.fire({
                                icon: 'warning',
                                title: 'No Status Selected',
                                text: 'Please select a status before submitting.',
                                confirmButtonText: 'OK',
                                background: '#092139',
                                color: '#ffffff',
                                customClass: {
                                    confirmButton: 'btn btn-warning'
                                },
                                buttonsStyling: false
                            });
                        }
                    });
                });
            });
        </script>


        <script src="https://cdn.jsdelivr.net/npm/quagga@0.12.1/dist/quagga.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#feeReceiptForm').on('submit', function(e) {
                    e.preventDefault();

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('createFeeReceipts') }}',
                        data: $(this).serialize(),
                        success: function(response) {
                            console.log(response);
                            document.querySelector("#gr_number").value = null;
                            const Toast = Swal.mixin({
                                toast: true,
                                position: "top-end",
                                showConfirmButton: false,
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.onmouseenter = Swal.stopTimer;
                                    toast.onmouseleave = Swal.resumeTimer;
                                }
                            });
                            let data = response.message;
                            if (data) {
                                Toast.fire({
                                    icon: "error",
                                    title: data
                                });
                            } else {
                                fetchData("");
                                Toast.fire({
                                    icon: "success",
                                    title: "Fee Receipt Added Successfully"
                                });
                            }
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                });
            });

            fetchData("");

            function fetchData(searchValue) {
                let url = "";
                $.ajax({
                    type: 'get',
                    url: "showSearchedFeeReceipts/" + (searchValue ? searchValue : ''),
                    success: function(response) {
                        if (response.length > 0) {
                            document.querySelector("#feeReceiptContainer").innerHTML = "";
                            for (var i = 0; i < response.length; i++) {
                                let selectedPaymentMethod = response[i].paytype;
                                document.querySelector("#feeReceiptContainer").innerHTML += `
                            <tr class="text-center">
                                <td>${i+1}</td>
                                <td>${response[i].voucher_id}</td>
                                <td>${response[i].date}</td>
                                <td>${response[i].gr_number}</td>
                                <td>${response[i].student_name} -- ${response[i].class} --
                                    ${response[i].section}</td>
                                <td>${response[i].total}</td>
                                <td>
                                    <select class="form-select form-control-sm fs-5 m-auto"
                                        style="width:80px" id="paymentMethod${i}" onchange="updatePayType('paymentMethod${i}',${response[i].id})">
                                        <option selected ${!selectedPaymentMethod ? 'selected' : ''} value=""></option>
                                        <option value="bank" ${selectedPaymentMethod === 'bank' ? 'selected' : ''}>Bank</option>
                                        <option value="cash" ${selectedPaymentMethod === 'cash' ? 'selected' : ''}>Cash</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text"
                                        class="form-control form-control-sm fs-5 text-center m-auto"
                                        style="width:80px" value="${response[i].discount}" id="discount${i}"
                                        maxlength="2"
                                        onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" onchange="updateDiscount('discount${i}',${response[i].id})">
                                </td>
                                <td>
                                    <input type="text"
                                        class="form-control form-control-sm fs-5 text-center m-auto"
                                        style="width:80px" value="${response[i].receipts}" id="receipt${i}"
                                        maxlength="5"
                                        onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" onchange="updateReceipt('receipt${i}',${response[i].id},'balance${i}')">
                                </td>
                                <td>
                                    <input type="text"
                                        class="form-control form-control-sm fs-5 text-center m-auto" id="balance${i}"
                                        style="width:80px" value="${response[i].balance}"
                                        maxlength="5"
                                        onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" onchange="updateBalance('balance${i}',${response[i].id})">
                                </td>
                                <td>
                                    <a href="#"
                                        class="btn btn-danger btn-sm" onclick="deleteFeeReceipts(${response[i].id})">Delete</a>
                                </td>
                            </tr>
                        `;
                            }
                        } else {
                            document.querySelector("#feeReceiptContainer").innerHTML = `
                        <tr>
                            <td colspan="11">
                                <h1 class="text-center display-4 fs-1 text-uppercase mt-2">
                                    data
                                    not found</h1>
                            </td>
                        </tr>
                        `;
                        }

                    }
                });
            }

            function fetchFilterData() {
                let filterData = document.querySelector("#filterSelector").value;
                $.ajax({
                    type: 'POST',
                    url: "{{ route('showFilteredFeeReceipts') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        filterData: filterData
                    },
                    success: function(response) {
                        let feeReceiptContainer = document.querySelector("#feeReceiptContainer");
                        if (response.length > 0) {
                            feeReceiptContainer.innerHTML = "";
                            for (let i = 0; i < response.length; i++) {
                                let selectedPaymentMethod = response[i].paytype;
                                feeReceiptContainer.innerHTML += `
                        <tr class="text-center">
                            <td>${i+1}</td>
                            <td>${response[i].voucher_id}</td>
                            <td>${response[i].date}</td>
                            <td>${response[i].gr_number}</td>
                            <td>${response[i].student_name} -- ${response[i].class} -- ${response[i].section}</td>
                            <td>${response[i].total}</td>
                            <td>
                                <select class="form-select form-control-sm fs-5 m-auto" style="width:80px" id="paymentMethod${i}" onchange="updatePayType('paymentMethod${i}',${response[i].id})">
                                    <option value="" ${!selectedPaymentMethod ? 'selected' : ''}></option>
                                    <option value="bank" ${selectedPaymentMethod === 'bank' ? 'selected' : ''}>Bank</option>
                                    <option value="cash" ${selectedPaymentMethod === 'cash' ? 'selected' : ''}>Cash</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control form-control-sm fs-5 text-center m-auto" style="width:80px" value="${response[i].discount}" id="discount${i}" maxlength="2" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" onchange="updateDiscount('discount${i}',${response[i].id})">
                            </td>
                            <td>
                                <input type="text" class="form-control form-control-sm fs-5 text-center m-auto" style="width:80px" value="${response[i].receipts}" id="receipt${i}" maxlength="5" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" onchange="updateReceipt('receipt${i}',${response[i].id}, 'balance${i}')">
                            </td>
                            <td>
                                <input type="text" class="form-control form-control-sm fs-5 text-center m-auto" id="balance${i}" style="width:80px" value="${response[i].balance}" maxlength="5" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" onchange="updateBalance('balance${i}',${response[i].id})">
                            </td>
                            <td>
                                <a href="#" class="btn btn-danger btn-sm" onclick="deleteFeeReceipts(${response[i].id})">Delete</a>
                            </td>
                        </tr>
                    `;
                            }
                        } else {
                            feeReceiptContainer.innerHTML = `
                    <tr>
                        <td colspan="11">
                            <h1 class="text-center display-4 fs-1 text-uppercase mt-2">Data not found</h1>
                        </td>
                    </tr>
                `;
                        }
                    }
                });
            }

            function updatePayType(elementId, id) {
                let selectedValue = document.querySelector('#' + elementId).value;
                $.ajax({
                    type: 'post',
                    url: 'updatePayTypeFeeReceipts',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        paytype: selectedValue
                    },
                    success: function(response) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        let data = response.message;
                        if (data) {
                            Toast.fire({
                                icon: "error",
                                title: data
                            });
                        } else {
                            Toast.fire({
                                icon: "success",
                                title: "Pay Type Updated Successfully"
                            });
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

            function updateDiscount(elementId, id) {
                let discountValue = document.querySelector('#' + elementId).value;
                $.ajax({
                    type: 'post',
                    url: 'updateDiscountFeeReceipts',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        discount: discountValue
                    },
                    success: function(response) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        let data = response.message;
                        if (data) {
                            Toast.fire({
                                icon: "error",
                                title: data
                            });
                        } else {
                            Toast.fire({
                                icon: "success",
                                title: "Discount Updated Successfully"
                            });
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

            function updateReceipt(elementId, id, balanceEle) {
                let receiptsValue = document.querySelector('#' + elementId).value;
                $.ajax({
                    type: 'post',
                    url: 'updateReceiptsFeeReceipts',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        receipts: receiptsValue
                    },
                    success: function(response) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        let data = response.message;
                        if (data) {
                            Toast.fire({
                                icon: "error",
                                title: data
                            });
                        } else {
                            document.querySelector(`#${balanceEle}`).value = response.balance;
                            Toast.fire({
                                icon: "success",
                                title: "Receipt Updated Successfully"
                            });
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

            function updateBalance(elementId, id) {
                let balanceValue = document.querySelector('#' + elementId).value;
                $.ajax({
                    type: 'post',
                    url: 'updateBalanceFeeReceipts',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        balance: balanceValue
                    },
                    success: function(response) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        let data = response.message;
                        if (data) {
                            Toast.fire({
                                icon: "error",
                                title: data
                            });
                        } else {
                            Toast.fire({
                                icon: "success",
                                title: "Balance Updated Successfully"
                            });
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

            function deleteFeeReceipts(id) {
                Swal.fire({
                    title: "Are you sure?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'get',
                            url: 'deleteFeeReceipts/' + id,
                            success: function(response) {
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: "top-end",
                                    showConfirmButton: false,
                                    timer: 2000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.onmouseenter = Swal.stopTimer;
                                        toast.onmouseleave = Swal.resumeTimer;
                                    }
                                });
                                let data = response.message;
                                if (data) {
                                    Toast.fire({
                                        icon: "error",
                                        title: data
                                    });
                                } else {
                                    fetchData("");
                                    Toast.fire({
                                        icon: "success",
                                        title: "Fee Receipts Delete Successfully"
                                    });
                                }
                            },
                            error: function(error) {
                                console.log(error);
                            }
                        });
                    }
                });
            }

            document.addEventListener("DOMContentLoaded", function() {
                const resultElement = document.getElementById('gr_number');
                const scannerContainer = document.getElementById('interactive');

                document.querySelector(".scanBarCodeBtn").onclick = () => {
                    scannerContainer.style.display = 'block';
                    Quagga.init({
                        inputStream: {
                            type: "LiveStream",
                            target: scannerContainer,
                            constraints: {
                                facingMode: "environment"
                            }
                        },
                        decoder: {
                            readers: ["code_128_reader"]
                        }
                    }, function(err) {
                        if (err) {
                            console.log(err);
                            scannerContainer.style.display = 'none';
                            const Toast = Swal.mixin({
                                toast: true,
                                position: "top-end",
                                showConfirmButton: false,
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.onmouseenter = Swal.stopTimer;
                                    toast.onmouseleave = Swal.resumeTimer;
                                }
                            });
                            Toast.fire({
                                icon: "error",
                                title: err
                            });
                            return;
                        }
                        console.log("Initialization finished. Ready to start");
                        Quagga.start();
                    });
                }

                Quagga.onDetected(function(result) {
                    if (result && result.codeResult && result.codeResult.code) {
                        resultElement.value = `${result.codeResult.code}`;
                        Quagga.stop();
                        scannerContainer.style.display = 'none';
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "success",
                            title: "Voucher Scanned successfully"
                        });
                    }
                });

                // Quagga.onProcessed(function(result) {
                //     if (result) {
                //         const drawingCtx = Quagga.canvas.ctx.overlay;
                //         const drawingCanvas = Quagga.canvas.dom.overlay;
                //         if (result.boxes) {
                //             drawingCtx.clearRect(0, 0, drawingCanvas.width, drawingCanvas.height);
                //             result.boxes.filter(function(box) {
                //                 return box !== result.box;
                //             }).forEach(function(box) {
                //                 Quagga.ImageDebug.drawPath(box, {
                //                     x: 0,
                //                     y: 1
                //                 }, drawingCtx, {
                //                     color: "green",
                //                     lineWidth: 2
                //                 });
                //             });
                //         }
                //         if (result.box) {
                //             Quagga.ImageDebug.drawPath(result.box, {
                //                 x: 0,
                //                 y: 1
                //             }, drawingCtx, {
                //                 color: "blue",
                //                 lineWidth: 2
                //             });
                //         }
                //         if (result.codeResult && result.codeResult.code) {
                //             Quagga.ImageDebug.drawPath(result.line, {
                //                 x: 'x',
                //                 y: 'y'
                //             }, drawingCtx, {
                //                 color: 'red',
                //                 lineWidth: 3
                //             });
                //         }
                //     }
                // });
            });
        </script>
    @endsection
