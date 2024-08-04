@extends('user.master')
@section('usercontent')
    <!-- Carousel Start -->
    <div class="intro-section" id="home-section">

        <div class="slide-1" style="background-image: url({{ asset('assetsuser/img/hero_1.jpg') }});"
            data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-4">
                                <h1 data-aos="fade-up" data-aos-delay="100">Education is the most powerful weapon which
                                    you can use to change the world.</h1>
                                <!-- <p class="mb-4" data-aos="fade-up" data-aos-delay="200">Lorem ipsum dolor sit amet
                                            consectetur adipisicing elit. Maxime ipsa nulla sed quis rerum amet natus quas
                                            necessitatibus.</p> -->
                                <p data-aos="fade-up" data-aos-delay="300"><a href="#"
                                        class="btn btn-primary py-3 px-5 btn-pill admission-btn">Admission Now</a></p>

                            </div>

                            <!-- <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">
                                        <form action="" method="post" class="form-box">
                                            <h3 class="h4 text-black mb-4">Sign Up</h3>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Email Addresss">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" placeholder="Password">
                                            </div>
                                            <div class="form-group mb-4">
                                                <input type="password" class="form-control" placeholder="Re-type Password">
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary btn-pill sign-btn" value="Sign up">
                                            </div>
                                        </form>

                                    </div> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Facts Start -->
    <div class="container-fluid facts py-5 pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="bg-white shadow d-flex align-items-center h-100 p-4" style="min-height: 150px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square bg-primary">
                                <i class="fa-solid fa-book text-white"></i>
                            </div>
                            <div class="ps-4">
                                <h5>Admissions Procedure</h5>
                                <span>The admission test for primary and secondary school is based on the following subjects
                                    and classes</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="bg-white shadow d-flex align-items-center h-100 p-4" style="min-height: 150px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square bg-primary">
                                <i class="fa-solid fa-bullhorn text-white"></i>
                            </div>
                            <div class="ps-4">
                                <h5>Academics</h5>
                                <span>The Iqra Anwar-Ul-Uloom Academy Department works very closely with teachers for a
                                    common objective:</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-white shadow d-flex align-items-center h-100 p-4" style="min-height: 150px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square bg-primary">
                                <i class="fa-regular fa-bookmark text-white"></i>
                            </div>
                            <div class="ps-4">
                                <h5>Examinations</h5>
                                <span>The academic year commences from March and continues till February of next year. There
                                    are 2 terms in an academic year</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->

    <!-- About Start -->
    <div class="site-section courses-title" id="courses-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
                    <h2 class="section-title ">Study Programs</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section courses-entry-wrap" data-aos="fade-up" data-aos-delay="100">
        <div class="container">
            <div class="row">

                <div class="owl-carousel col-12 nonloop-block-14">

                    <div class="course bg-white h-100 align-self-stretch">
                        <figure class="m-0">
                            <a href="courses.html#Nursery-School"><img src="{{ asset('assetsuser/img/img_1.jpg') }}"
                                    alt="Image" class="img-fluid"></a>
                        </figure>
                        <div class="course-inner-text py-4 px-4">
                            <h3><a href="courses.html#Nursery-School" class="our-color">Nursery School</a></h3>
                            <p>A nursery school is a preschool educational program for young children typically between
                                the... </p>
                        </div>
                        <div class="d-flex border-top stats">
                            <div class="py-3 px-4"><span class="icon-users"></span> 168 students</div>
                            <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
                        </div>
                    </div>

                    <div class="course bg-white h-100 align-self-stretch">
                        <figure class="m-0">
                            <a href="courses.html#primary-school"><img src="{{ asset('assetsuser/img/img_2.jpg') }}"
                                    alt="Image" class="img-fluid"></a>
                        </figure>
                        <div class="course-inner-text py-4 px-4">
                            <h3><a href="courses.html#primary-school" class="our-color">Primary School</a></h3>
                            <p>Primary school, also known as elementary school in some places, is the initial stage
                                of...</p>
                        </div>
                        <div class="d-flex border-top stats">
                            <div class="py-3 px-4"><span class="icon-users"></span> 175 students</div>
                            <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
                        </div>
                    </div>

                    <div class="course bg-white h-100 align-self-stretch">
                        <figure class="m-0">
                            <a href="courses.html#Secondary-School"><img src="{{ asset('assetsuser/img/img_3.jpg') }}"
                                    alt="Image" class="img-fluid"></a>
                        </figure>
                        <div class="course-inner-text py-4 px-4">
                            <h3><a href="courses.html#Secondary-School" class="our-color">Secondary School</a></h3>
                            <p>Secondary school, also sometimes referred to as high school or middle/senior high
                                school...</p>
                        </div>
                        <div class="d-flex border-top stats">
                            <div class="py-3 px-4"><span class="icon-users"></span> 123 students</div>
                            <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
                        </div>
                    </div>



                    <div class="course bg-white h-100 align-self-stretch">
                        <figure class="m-0">
                            <a href="courses.html#Matriculation"><img src="{{ asset('assetsuser/img/img_4.jpg') }}"
                                    alt="Image" class="img-fluid"></a>
                        </figure>
                        <div class="course-inner-text py-4 px-4">
                            <h3><a href="courses.html#Matriculation" class="our-color">Matriculation</a></h3>
                            <p>It signifies the final examinations taken at the end of 9th and 10th grades. These exams
                                are usually taken by students... </p>
                        </div>
                        <div class="d-flex border-top stats">
                            <div class="py-3 px-4"><span class="icon-users"></span> 54 students</div>
                            <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
                        </div>
                    </div>

                    <div class="course bg-white h-100 align-self-stretch">
                        <figure class="m-0">
                            <a href="courses.html#Tehfees Ul Qurban"><img src="{{ asset('assetsuser/img/quran-2.jpg') }}"
                                    height="400px" alt="Image" class="img-fluid"></a>
                        </figure>
                        <div class="course-inner-text py-4 px-4">
                            <h3><a href="courses.html#Tehfees Ul Qurban" class="our-color">Tehfees Ul Qurban</a></h3>
                            <p>This metaphorical interpretation views dedicating oneself to Quran memorization as a form
                                of sacrifice... </p>
                        </div>
                        <div class="d-flex border-top stats">
                            <div class="py-3 px-4"><span class="icon-users"></span>36 students</div>
                            <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
                        </div>
                    </div>

                    <div class="course bg-white h-100 align-self-stretch">
                        <figure class="m-0">
                            <a href="courses.html#Nazra Quran"><img
                                    src="{{ asset('assetsuser/img/quran-verse-islam.jpg') }}" alt="Image"
                                    class="img-fluid"></a>
                        </figure>
                        <div class="course-inner-text py-4 px-4">
                            <h3><a href="courses.html#Nazra Quran" class="our-color">Nazra Quran</a></h3>
                            <p>Nazra Quran refers to the initial stage of learning how to recite the Quran in Islam...
                            </p>
                        </div>
                        <div class="d-flex border-top stats">
                            <div class="py-3 px-4"><span class="icon-users"></span>650 students</div>
                            <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
                        </div>
                    </div>

                </div>



            </div>
            <div class="row justify-content-center">
                <div class="col-7 text-center">
                    <button class="customPrevBtn btn our-btn-primary m-1">Prev</button>
                    <button class="customNextBtn btn our-btn-primary m-1">Next</button>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Features Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="display-6 mb-4">Welcome to Iqra Anwar Ul Uloom Academy</h1>
                    <p class="mb-5">At Iqra Anwar Ul Uloom Academy, we give a good education that helps students learn,
                        be creative, and have strong values. Our school offers many different subjects to help each
                        student grow in mind and character. <br><br>

                        Our kind and skilled teachers create a friendly place that makes learning fun. We want to help
                        students love learning and do their best. <br><br>

                        Look at our programs to see how Iqra Anwar Ul Uloom Academy can help you or your child do well
                        in school and in life. Join our community focused on great education.
                    </p>
                    <div class="row gy-5 gx-4">
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0 btn-square our-style  me-3">
                                    <i class="fa fa-check text-white "></i>
                                </div>
                                <h5 class="mb-0">Experienced Teachers</h5>
                            </div>
                            <span>Our skilled teachers make learning engaging and effective.</span>
                        </div>
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.2s">
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0 btn-square our-style me-3">
                                    <i class="fa fa-check text-white"></i>
                                </div>
                                <h5 class="mb-0">Islamic Environment</h5>
                            </div>
                            <span>Fostering Islamic values and a love for learning.</span>
                        </div>
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0 btn-square our-style me-3">
                                    <i class="fa fa-check text-white"></i>
                                </div>
                                <h5 class="mb-0">Student Growth</h5>
                            </div>
                            <span>Helping students grow their knowledge and skills!</span>
                        </div>
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.4s">
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0 btn-square our-style me-3">
                                    <i class="fa fa-check text-white"></i>
                                </div>
                                <h5 class="mb-0">Personal Development</h5>
                            </div>
                            <span>We help students succeed in school and life through strong values and
                                education.</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="position-relative overflow-hidden pe-5 pt-5 h-100 shadow-sm" style="min-height: 400px;">
                        <img class="position-absolute w-100 h-100" src="{{ asset('assetsuser/img/welcome-img-2.jpg') }}"
                            alt="" style="object-fit: cover;">
                        <img class="position-absolute top-0 end-0 bg-white ps-3 pb-3"
                            src="{{ asset('assetsuser/img/welcome-img.jpg') }}" alt=""
                            style="width: 200px; height: 200px">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->

    <!-- Team Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h6 class=" text-uppercase our-color mb-2">Meet Our Teacher</h6>
                <h1 class="display-6 mb-4">We Have Great Experienced Teacher</h1>
            </div>
            <div class="row g-0 team-items">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item position-relative">
                        <div class="position-relative">
                            <img class="img-fluid" src="{{ asset('assetsuser/img/avatar.jpg') }}" alt="">
                            <div class="team-social text-center">
                                <a class="btn btn-square our-outline-color border-2 m-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square our-outline-color border-2 m-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square our-outline-color border-2 m-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5 class="mt-2">Sir Asif</h5>
                            <span>Teacher</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item position-relative">
                        <div class="position-relative">
                            <img class="img-fluid" src="{{ asset('assetsuser/img/avatar.jpg') }}" alt="">
                            <div class="team-social text-center">
                                <a class="btn btn-square our-outline-color border-2 m-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square our-outline-color border-2 m-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square our-outline-color border-2 m-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5 class="mt-2">Sir Danish Imtiaz</h5>
                            <span>Teacher</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item position-relative">
                        <div class="position-relative">
                            <img class="img-fluid" src="{{ asset('assetsuser/img/avatar.jpg') }}" alt="">
                            <div class="team-social text-center">
                                <a class="btn btn-square our-outline-color border-2 m-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square our-outline-color border-2 m-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square our-outline-color border-2 m-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5 class="mt-2">Sir Mujtaba</h5>
                            <span>Teacher</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item position-relative">
                        <div class="position-relative">
                            <img class="img-fluid" src="{{ asset('assetsuser/img/avatar.jpg') }}" alt="">
                            <div class="team-social text-center">
                                <a class="btn btn-square our-outline-color border-2 m-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square our-outline-color border-2 m-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square our-outline-color border-2 m-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5 class="mt-2">Sir Kamal</h5>
                            <span>Teacher</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Testimonial Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h6 class="our-color text-uppercase mb-2">Testimonial</h6>
                <h1 class="display-6 mb-4">Parents Speak</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="owl-carousel testimonial-carousel">
                        <div class="testimonial-item text-center">
                            <div class="position-relative mb-5">
                                <img class="img-fluid rounded-circle mx-auto"
                                    src="{{ asset('assetsuser/img/testimonial-1.jpg') }}" alt="">
                                <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle"
                                    style="width: 60px; height: 60px;">
                                    <i class="fa fa-quote-left fa-2x  our-color"></i>
                                </div>
                            </div>
                            <p class="fs-4">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore
                                lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat.
                            </p>
                            <hr class="w-25 mx-auto">
                            <h5>Client Name</h5>
                            <span>Profession</span>
                        </div>
                        <div class="testimonial-item text-center">
                            <div class="position-relative mb-5">
                                <img class="img-fluid rounded-circle mx-auto"
                                    src="{{ asset('assetsuser/img/testimonial-2.jpg') }}" alt="">
                                <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle"
                                    style="width: 60px; height: 60px;">
                                    <i class="fa fa-quote-left fa-2x our-color"></i>
                                </div>
                            </div>
                            <p class="fs-4">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore
                                lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat.
                            </p>
                            <hr class="w-25 mx-auto">
                            <h5>Client Name</h5>
                            <span>Profession</span>
                        </div>
                        <div class="testimonial-item text-center">
                            <div class="position-relative mb-5">
                                <img class="img-fluid rounded-circle mx-auto"
                                    src="{{ asset('assetsuser/img/testimonial-3.jpg') }}" alt="">
                                <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle"
                                    style="width: 60px; height: 60px;">
                                    <i class="fa fa-quote-left fa-2x our-color"></i>
                                </div>
                            </div>
                            <p class="fs-4">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore
                                lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat.
                            </p>
                            <hr class="w-25 mx-auto">
                            <h5>Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@endsection
