<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | IQRA ANWAR-UL-ULOOM ACADEMY</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully responsive admin theme which can be used to build CRM, CMS,ERP etc." name="description" />
    <meta content="Techzaa" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/voucher-logo/voucherlogo.jpg')}}">

    <!-- Daterangepicker css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/daterangepicker/daterangepicker.css') }}">

    <!-- Vector Map css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}">

    <!-- Theme Config Js -->
    <script src="{{ asset('assets/js/config.js') }}"></script>

    <!-- App css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <link rel="stylesheet" href="_sidenav.scss">

    <!-- Icons css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />


    <!-------------------- form link --------------->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min2167.css') }}">




    <!-- Select2 css -->
    <link href="{{ asset('assets/vendor/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />


    <!-- Bootstrap Touchspin css -->
    <link href="{{ asset('assets/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Datepicker css -->
    <link href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Timepicker css -->
    <link href="{{ asset('assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Flatpickr Timepicker css -->
    <link href="{{ asset('assets/vendor/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />






</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">


        <!-- ========== Topbar Start ========== -->
        <div class="navbar-custom">
            <div class="topbar container-fluid">
                <div class="d-flex align-items-center gap-1">

                    <!-- Topbar Brand Logo -->
                    <div class="logo-topbar">
                        <!-- Logo light -->
                        <a href="index.html" class="logo-light">
                            <span class="logo-lg">
                                {{-- <img src="assets/images/logo.png" alt="logo"> --}}
<h2>IQRA</h2>
                            </span>
                            <span class="logo-sm">
                                {{-- <img src="assets/images/logo-sm.png" alt="small logo"> --}}
                                <h2>IQRA</h2>
                            </span>
                        </a>

                        <!-- Logo Dark -->
                        <a href="index.html" class="logo-dark">
                            <span class="logo-lg">
                                {{-- <img src="assets/images/logo-dark.png" alt="dark logo"> --}}
                                <h2>IQRA</h2>
                            </span>
                            <span class="logo-sm">
                                {{-- <img src="assets/images/logo-sm.png" alt="small logo"> --}}
                                <h2>IQRA</h2>
                            </span>
                        </a>
                    </div>

                    <!-- Sidebar Menu Toggle Button -->
                    <button class="button-toggle-menu">
                        <i class="ri-menu-line"></i>
                    </button>

                    <!-- Horizontal Menu Toggle Button -->
                    <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </button>
                </div>

                <ul class="topbar-menu d-flex align-items-center gap-3">
                    <li class="dropdown d-lg-none">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="ri-search-line fs-22"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                            <form class="p-3">
                                <input type="search" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                            </form>
                        </div>
                    </li>



                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="ri-mail-line fs-22"></i>
                            <span class="noti-icon-badge badge text-bg-purple" id="notification-count">{{ $notificationCount }}</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg py-0">
                            <div class="p-2 border-top-0 border-start-0 border-end-0 border-dashed border">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0 fs-16 fw-semibold">Messages</h6>
                                    </div>
                                    <div class="col-auto d-flex justify-content-center align-items-center">
                                        <a href="{{ url('ContactForm') }}" class="text-dark text-decoration-underline mx-2">
                                            View All
                                        </a>
                                        <a href="javascript:void(0);" class="text-dark text-decoration-underline mx-2" id="clear-all-notifications">
                                            <small>Clear All</small>
                                        </a>
                                    </div>
                                </div>

                            </div>

                            <div style="max-height: 300px;" data-simplebar>
                                @foreach ($contacts->where('is_new', 1) as $contact)
                                <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card m-0 shadow-none" data-contact-id="{{ $contact->id }}">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="notify-icon">
                                                    <img src="{{ $contact->avatar_url }}" class="img-fluid rounded-circle" alt="" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 text-truncate ms-2">
                                                <h5 class="noti-item-title fw-semibold fs-14">{{ $contact->name }}
                                                    <small class="fw-normal text-muted float-end ms-1">{{ $contact->created_at->diffForHumans() }}</small>
                                                </h5>
                                                <small class="noti-item-subtitle text-muted">{{ $contact->message }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @endforeach


                                <style>
                                    .highlight {
                                        background-color: #d1e7dd !important;
                                        /* Change to your highlight color */
                                    }
                                </style>

                            </div>
                        </div>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                // Notification item click event
                                document.querySelectorAll('.notify-item').forEach(item => {
                                    item.addEventListener('click', function() {
                                        var contactId = this.getAttribute('data-contact-id');
                                        window.location.href = "{{ url('ContactForm') }}" + "?contact_id=" + contactId;
                                    });
                                });

                                // Handle URL parameters on page load
                                var urlParams = new URLSearchParams(window.location.search);
                                var contactId = urlParams.get('contact_id');

                                if (contactId) {
                                    var chatCollapse = document.getElementById('chat-collapse-' + contactId);
                                    if (chatCollapse) {
                                        var bsCollapse = new bootstrap.Collapse(chatCollapse, {
                                            toggle: false
                                        });
                                        bsCollapse.show();
                                        chatCollapse.scrollIntoView({
                                            behavior: 'smooth',
                                            block: 'start'
                                        });

                                        // Highlight specific message
                                        document.querySelectorAll('.notify-item').forEach(el => el.classList.remove('highlight'));
                                        var notifyItem = document.querySelector('.notify-item[data-contact-id="' + contactId + '"]');
                                        if (notifyItem) {
                                            notifyItem.classList.add('highlight');
                                        }

                                        // Clear the notification
                                        fetch("{{ route('clear-notification') }}", {
                                                method: 'POST',
                                                headers: {
                                                    'Content-Type': 'application/json',
                                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                },
                                                body: JSON.stringify({
                                                    contact_id: contactId
                                                })
                                            })
                                            .then(response => response.json())
                                            .then(data => {
                                                if (data.success) {
                                                    var notificationItem = document.querySelector('.notify-item[data-contact-id="' + contactId + '"]');
                                                    if (notificationItem) {
                                                        notificationItem.remove();
                                                        var countElement = document.getElementById('notification-count');
                                                        countElement.innerText = parseInt(countElement.innerText) - 1;
                                                        if (parseInt(countElement.innerText) === 0) {
                                                            countElement.style.display = 'none'; // Hide badge if count is 0
                                                        }
                                                    }
                                                }
                                            })
                                            .catch(error => console.error('Error:', error));
                                    }
                                }

                                // Clear all notifications
                                document.getElementById('clear-all-notifications').addEventListener('click', function() {
                                    fetch("{{ route('clear-all-notifications') }}", {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                            }
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            if (data.success) {
                                                // Clear all notifications from the dropdown
                                                document.querySelectorAll('.notify-item').forEach(item => item.remove());
                                                // Update the notification count
                                                var countElement = document.getElementById('notification-count');
                                                countElement.innerText = 0;
                                                countElement.style.display = 'none'; // Hide badge if count is 0
                                            }
                                        })
                                        .catch(error => console.error('Error:', error));
                                });

                                // Update badge visibility based on count
                                var notificationCountElement = document.getElementById('notification-count');
                                var notificationCount = parseInt(notificationCountElement.innerText);
                                if (notificationCount === 0) {
                                    notificationCountElement.style.display = 'none'; // Hide badge if count is 0
                                } else {
                                    notificationCountElement.style.display = 'inline-block'; // Show badge if count is greater than 0
                                }
                            });
                        </script>








                    </li>



                    <!-- <li class="d-none d-sm-inline-block">
                        <a class="nav-link" data-bs-toggle="offcanvas" href="#theme-settings-offcanvas">
                            <i class="ri-settings-3-line fs-22"></i>
                        </a>
                    </li> -->

                    <!-- <li class="d-none d-sm-inline-block">
                        <div class="nav-link" id="light-dark-mode">
                            <i class="ri-moon-line fs-22"></i>
                        </div>
                    </li> -->

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle arrow-none nav-user" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <span class="account-user-avatar">
                                <img src="assets/images/users/avatar-1.jpg" alt="user-image" width="32" class="rounded-circle">
                            </span>
                            <span class="d-lg-block d-none">
                                <h5 class="my-0 fw-normal">MedAir Tech</h5>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                            <!-- item-->
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="{{ url('my profile') }}" class="dropdown-item">
                                <i class="ri-account-circle-line fs-18 align-middle me-1"></i>
                                <span>My Account</span>
                            </a>

                            <!-- item-->
                            <a href="pages-profile.html" class="dropdown-item">
                                <i class="ri-settings-4-line fs-18 align-middle me-1"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="pages-faq.html" class="dropdown-item">
                                <i class="ri-customer-service-2-line fs-18 align-middle me-1"></i>
                                <span>Support</span>
                            </a>

                            <!-- item-->
                            <a href="auth-lock-screen.html" class="dropdown-item">
                                <i class="ri-lock-password-line fs-18 align-middle me-1"></i>
                                <span>Lock Screen</span>
                            </a>

                            <!-- item-->
                            <a href="auth-logout-2.html" class="dropdown-item">
                                <i class="ri-logout-box-line fs-18 align-middle me-1"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ========== Topbar End ========== -->


        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu ">

            <!-- Brand Logo Light -->
            <a href="index.html" class="logo logo-light">
                <span class="logo-lg">
                    {{-- <img src="assets/images/logo.png" alt="logo"> --}}
                    <h2 class="text-white mt-2">IQRA</h2>
                </span>
                <span class="logo-sm">
                    {{-- <img src="assets/images/logo-sm.png" alt="small logo"> --}}
                    <h2 class="text-white mt-2">IQRA</h2>
                </span>
            </a>

            <!-- Brand Logo Dark -->
            <a href="index.html" class="logo logo-dark">
                <span class="logo-lg">
                    {{-- <img src="assets/images/logo-dark.png" alt="dark logo"> --}}
                    <h2 class="text-white mt-2">IQRA</h2>
                </span>
                <span class="logo-sm">
                    {{-- <img src="assets/images/logo-sm.png" alt="small logo"> --}}
                    <h2 class="text-white mt-2">IQRA</h2>
                </span>
            </a>
            <!-- Sidebar -left -->
            <div class="h-100 " id="leftside-menu-container" data-simplebar>
                <!--- Sidemenu -->
                <ul class="side-nav mt-4">
                    <li class="side-nav-item aside-navbar mb-1">
                        <a href="{{ url('dashboard') }}" class="side-nav-link">
                            <i class="ri-dashboard-3-line"></i>
                            <!-- <span class="badge bg-success float-end">9+</span> -->
                            <span> Dashboard </span>
                        </a>
                    </li>

                    <li class="side-nav-item mb-1">
                        <a href="{{ url('show-addmissionform') }}" class="side-nav-link">
                            <i class="ri-dashboard-3-line"></i>
                            <span> Addmission Form </span>
                        </a>
                    </li>

                    <li class="side-nav-item mb-1">
                        <a href="{{ url('class') }}" class="side-nav-link">
                            <i class="ri-dashboard-3-line"></i>

                            <span> Class </span>
                        </a>
                    </li>



                    {{-- <li class="side-nav-item mb-1">
                        <a href="{{ url('fee') }}" class="side-nav-link">
                    <i class="ri-dashboard-3-line"></i>

                    <span> Fees </span>
                    </a>
                    </li> --}}
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarExtendedUI" class="side-nav-link side-nav-link-dropdown">
                            <i class="ri-compasses-2-line"></i>
                            <span>Fee Controller</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarExtendedUI" data-bs-parent="#sidebarMenu1">
                            <ul class="side-nav-item">
                                <li>
                                    <!-- <a class="side-nav-link ps-4" href="{{ url('fee') }}">Fees Name</a> -->
                                </li>
                                <li>
                                    <a class="side-nav-link ps-4" href="{{ url('feeallocation') }}">Fees Allocation</a>
                                </li>
                                <li>
                                    <a class="side-nav-link ps-4" href="{{ url('Student Promotion') }}">Student Promotion</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarExtendedUI1" class="side-nav-link side-nav-link-dropdown">
                            <i class="ri-compasses-2-line"></i>
                            <span>Fee Voucher Generate</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarExtendedUI1" data-bs-parent="#sidebarMenu2">
                            <ul class="side-nav-item">
                                <li>
                                    <a class="side-nav-link ps-4" href="classfeesgenerate">Class Fees Generate</a>
                                </li>
                                <li>
                                    <a class="side-nav-link ps-4" href="showclassfees">Show Class Fees</a>
                                </li>
                                <li>
                                    <a class="side-nav-link ps-4" href="specialfeesgenerate">Special Fees Generate</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-item mb-1">
                        <a href="{{ url('showFeeReceipts') }}" class="side-nav-link">
                            <i class="ri-book-3-line"></i>

                            <span> Fee Receipts </span>
                        </a>
                    </li>





                    {{-- <li class="side-nav-item mb-1">
                        <a data-bs-toggle="collapse" href="#sidebarLayouts" aria-expanded="false"
                            aria-controls="sidebarLayouts" class="side-nav-link">
                            <i class="ri-layout-line"></i>

                            <span> Student ledger </span>
                        </a>
                        <div class="collapse" id="sidebarLayouts">

                        </div>
                    </li>


                    <li class="side-nav-item mb-1">
                        <a data-bs-toggle="collapse" href="#sidebarLayouts" aria-expanded="false"
                            aria-controls="sidebarLayouts" class="side-nav-link">
                            <i class="ri-layout-line"></i>

                            <span> Fee Entry Form </span>
                        </a>
                        <div class="collapse" id="sidebarLayouts">

                        </div>
                    </li> --}}


                </ul>
                <!--- End Sidemenu -->

                <div class="clearfix"></div>
            </div>
        </div>

        <!-- ========== Left Sidebar End ========== -->


        @yield('content')


        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © IQRA ACADEMY - Developed by <b>MedAir Technology</b>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->



        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Theme Settings -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="theme-settings-offcanvas">
        <div class="d-flex align-items-center bg-primary p-3 offcanvas-header">
            <h5 class="text-white m-0">Theme Settings</h5>
            <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body p-0">
            <div data-simplebar class="h-100">
                <div class="p-3">
                    <h5 class="mb-3 fs-16 fw-bold">Color Scheme</h5>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-check form-switch card-switch mb-1">
                                <input class="form-check-input" type="checkbox" name="data-bs-theme" id="layout-color-light" value="light">
                                <label class="form-check-label" for="layout-color-light">
                                    <img src="assets/images/layouts/light.png" alt="" class="img-fluid">
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                        </div>

                        <div class="col-4">
                            <div class="form-check form-switch card-switch mb-1">
                                <input class="form-check-input" type="checkbox" name="data-bs-theme" id="layout-color-dark" value="dark">
                                <label class="form-check-label" for="layout-color-dark">
                                    <img src="assets/images/layouts/dark.png" alt="" class="img-fluid">
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                        </div>
                    </div>

                    <div id="layout-width">
                        <h5 class="my-3 fs-16 fw-bold">Layout Mode</h5>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-layout-mode" id="layout-mode-fluid" value="fluid">
                                    <label class="form-check-label" for="layout-mode-fluid">
                                        <img src="assets/images/layouts/light.png" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Fluid</h5>
                            </div>

                            <div class="col-4">
                                <div id="layout-boxed">
                                    <div class="form-check form-switch card-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="data-layout-mode" id="layout-mode-boxed" value="boxed">
                                        <label class="form-check-label" for="layout-mode-boxed">
                                            <img src="assets/images/layouts/boxed.png" alt="" class="img-fluid">
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Boxed</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h5 class="my-3 fs-16 fw-bold">Topbar Color</h5>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-check form-switch card-switch mb-1">
                                <input class="form-check-input" type="checkbox" name="data-topbar-color" id="topbar-color-light" value="light">
                                <label class="form-check-label" for="topbar-color-light">
                                    <img src="assets/images/layouts/light.png" alt="" class="img-fluid">
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                        </div>

                        <div class="col-4">
                            <div class="form-check form-switch card-switch mb-1">
                                <input class="form-check-input" type="checkbox" name="data-topbar-color" id="topbar-color-dark" value="dark">
                                <label class="form-check-label" for="topbar-color-dark">
                                    <img src="assets/images/layouts/topbar-dark.png" alt="" class="img-fluid">
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                        </div>
                    </div>

                    <div>
                        <h5 class="my-3 fs-16 fw-bold">Menu Color</h5>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-menu-color" id="leftbar-color-light" value="light">
                                    <label class="form-check-label" for="leftbar-color-light">
                                        <img src="assets/images/layouts/sidebar-light.png" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                            </div>

                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-menu-color" id="leftbar-color-dark" value="dark">
                                    <label class="form-check-label" for="leftbar-color-dark">
                                        <img src="assets/images/layouts/light.png" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                            </div>
                        </div>
                    </div>

                    <div id="sidebar-size">
                        <h5 class="my-3 fs-16 fw-bold">Sidebar Size</h5>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-sidenav-size" id="leftbar-size-default" value="default">
                                    <label class="form-check-label" for="leftbar-size-default">
                                        <img src="assets/images/layouts/light.png" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Default</h5>
                            </div>

                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-sidenav-size" id="leftbar-size-compact" value="compact">
                                    <label class="form-check-label" for="leftbar-size-compact">
                                        <img src="assets/images/layouts/compact.png" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Compact</h5>
                            </div>

                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-sidenav-size" id="leftbar-size-small" value="condensed">
                                    <label class="form-check-label" for="leftbar-size-small">
                                        <img src="assets/images/layouts/sm.png" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Condensed</h5>
                            </div>


                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-sidenav-size" id="leftbar-size-full" value="full">
                                    <label class="form-check-label" for="leftbar-size-full">
                                        <img src="assets/images/layouts/full.png" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Full Layout</h5>
                            </div>
                        </div>
                    </div>

                    <div id="layout-position">
                        <h5 class="my-3 fs-16 fw-bold">Layout Position</h5>

                        <div class="btn-group checkbox" role="group">
                            <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-fixed" value="fixed">
                            <label class="btn btn-soft-primary w-sm" for="layout-position-fixed">Fixed</label>

                            <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-scrollable" value="scrollable">
                            <label class="btn btn-soft-primary w-sm ms-0" for="layout-position-scrollable">Scrollable</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="offcanvas-footer border-top p-3 text-center">
            <div class="row">
                <div class="col-6">
                    <button type="button" class="btn btn-light w-100" id="reset-layout">Reset</button>
                </div>
                <div class="col-6">
                    <a href="https://1.envato.market/velonic" target="_blank" role="button" class="btn btn-primary w-100">Buy Now</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor js -->
    <script src="{{asset('assets/js/vendor.min.js')}}"></script>

    <!-- Daterangepicker js -->
    <script src="{{asset('assets/vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('assets/vendor/daterangepicker/daterangepicker.js')}}"></script>

    <!-- Apex Charts js -->
    <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>

    <!-- Vector Map js -->
    <script src="{{asset('assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js')}}"></script>

    <!-- Dashboard App js -->
    <script src="{{asset('assets/js/pages/dashboard.js')}}"></script>


    <!-- App js -->
    <script src="{{asset('assets/js/app.min.js')}}"></script>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




    <!--  Select2 Plugin Js -->
    <script src="{{asset('assets/vendor/select2/js/select2.min.js')}}"></script>



    <!-- Bootstrap Datepicker Plugin js -->
    <script src="{{asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>

    <!-- Bootstrap Timepicker Plugin js -->
    <script src="{{asset('assets/vendor/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>

    <!-- Input Mask Plugin js -->
    <script src="{{asset('assets/vendor/jquery-mask-plugin/jquery.mask.min.js')}}"></script>

    <!-- Bootstrap Touchspin Plugin js -->
    <script src="{{asset('assets/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>

    <!-- Bootstrap Maxlength Plugin js -->
    <script src="{{asset('assets/vendor/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>

    <!-- Typehead Plugin js -->
    <script src="{{asset('assets/vendor/handlebars/handlebars.min.js')}}"></script>
    <script src="{{asset('assets/vendor/typeahead.js/typeahead.bundle.min.js')}}"></script>

    <!-- Flatpickr Timepicker Plugin js -->
    <script src="{{asset('assets/vendor/flatpickr/flatpickr.min.js')}}"></script>

    <!-- Typehead Demo js -->
    <script src="{{asset('assets/js/pages/typehead.init.js')}}"></script>

    <!-- Timepicker Demo js -->
    <script src="{{asset('assets/js/pages/timepicker.init.js')}}"></script>

</body>

</html>