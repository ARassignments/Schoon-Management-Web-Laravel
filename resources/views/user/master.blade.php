<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>IQRA ANWAR-UL-ULOOM ACADEMY</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/Untitled design.jpg" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assetsuser/lib/animate/animate.min.css') }}"rel="stylesheet">
    <link href="{{ asset('assetsuser/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assetsuser/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assetsuser/css/style.css') }}" rel="stylesheet">



    <!--
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css"> -->

    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="{{ asset('assetsuser/css/jquery-ui.css') }}">
    <!-- <link rel="stylesheet" href="css/owl.carousel.min.css"> -->
    <link rel="stylesheet" href="{{ asset('assetsuser/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsuser/css/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assetsuser/css/jquery.fancybox.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assetsuser/css/bootstrap-datepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('assetsuser/fonts/flaticon/font/flaticon.css') }}">

    <link rel="stylesheet" href="{{ asset('assetsuser/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('assetsuser/css/style-2.css') }}">


</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow our-color" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark text-light p-0">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <small class="fa fa-map-marker-alt  our-color me-2"></small>
                    <small>Karachi Pakistan</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <small class="far fa-clock  our-color me-2"></small>
                    <small>Mon - Sat : 08.00 AM - 12.00 PM</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <small class="fa fa-phone-alt  our-color me-2"></small>
                    <small>+92 333 2203858</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center mx-n2">
                    <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary"
                        href="https://www.facebook.com/profile.php?id=100095553402212"><i
                            class="fab fa-facebook-f text-light"></i></a>
                    <!-- <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" href=""><i class="fab fa-twitter"></i></a> -->
                    <!-- <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" href=""><i class="fab fa-linkedin-in"></i></a> -->
                    <a class="btn btn-square btn-link rounded-0"
                        href="https://www.facebook.com/profile.php?id=100095553402212"><i
                            class="fab fa-instagram text-light"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center border-end px-2">
            <h2 class="m-0 schl-color">Iqra Anwar-UL-Uloom</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ url('userHome') }}"
                    class="nav-item nav-link {{ Request::is('userHome') ? 'active' : '' }}">Home</a>
                <a href="{{ url('userAbout') }}"
                    class="nav-item nav-link {{ Request::is('userAbout') ? 'active' : '' }}">About</a>
                <a href="{{ url('ourprogram') }}"
                    class="nav-item nav-link {{ Request::is('ourprogram') ? 'active' : '' }}">Our Programs</a>
                <a href="{{ url('contactform') }}"
                    class="nav-item nav-link {{ Request::is('contactform') ? 'active' : '' }}">Contact</a>
                {{-- ======================Auth-Login-&-Register========================== --}}
                <button type="button" class="btn btn-light"
                    onclick="navigateTo('{{ url('auth-logins') }}')">Login</button>
                <button type="button" class="btn btn-dark"
                    onclick="navigateTo('{{ url('auth-registers') }}')">Register</button>
                <script>
                    function navigateTo(url) {
                        window.location.href = url;
                    }
                </script>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    @yield('usercontent')




    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer my-6 mb-0 py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <a href="index.html" class=" d-flex align-items-center mb-4">
                        <h3 class="m-0 schl-color">Iqra Anwar-UL-Uloom</h3>
                    </a>
                    <h4 class="text-white mb-4">Get In Touch</h4>
                    <!-- <h2 class="text-primary mb-4"><i class="fa fa-car text-white me-2"></i>Drivin</h2> -->

                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Karachi Pakistan</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+92 333 2203858</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>etc</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Popular Links</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h6 class="text-white mt-4 mb-3">Follow Us</h6>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light me-1" href="https://g.co/kgs/vecLD6w"><i
                                class="fab  fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light me-1" href="https://g.co/kgs/vecLD6w"><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light me-1" href="https://g.co/kgs/vecLD6w"><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light me-0" href="https://g.co/kgs/vecLD6w"><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright text-light py-4 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a href="#" class="text-white">iqraanwarululoom</a>, All Right Reserved 2025.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    Develop By <a href="https://medairtech.com" class="our-color">Med Air Technology</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top our-style"><i
            class="bi bi-arrow-up"></i></a>

    <!-- template 1 links -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assetsuser/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assetsuser/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assetsuser/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assetsuser/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assetsuser/js/main.js') }}"></script>



    <!-- template 2 links -->

    <script src="{{ asset('assetsuser/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assetsuser/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('assetsuser/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assetsuser/js/popper.min.js') }}"></script>
    <script src="{{ asset('assetsuser/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assetsuser/js/owl.carousel-2.min.js') }}"></script>
    <script src="{{ asset('assetsuser/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('assetsuser/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assetsuser/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assetsuser/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('assetsuser/js/aos.js') }}"></script>
    <script src="{{ asset('assetsuser/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('assetsuser/js/jquery.sticky.js') }}"></script>


    <script src="{{ asset('assetsuser/js/main-2.js') }}"></script>
</body>

</html>
