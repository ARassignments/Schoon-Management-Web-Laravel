@extends('user.master')
@section('usercontent')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-6 my-6 mt-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">Our Programs</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item our-color active" aria-current="page">Our Programs</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Study progrm details start -->
    <div class="container-xxl py-6" id="Nursery-School">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative overflow-hidden ps-5 pt-5 h-100" style="min-height: 400px;">
                        <img class="position-absolute w-100 h-100" src="{{ asset('assetsuser/img/img_1.jpg')}}" alt=""
                            style="object-fit: cover;">
                        <img class="position-absolute top-0 start-0 bg-white pe-3 pb-3" src="{{ asset('assetsuser/img/img_1.jpg')}}" alt=""
                            style="width: 200px; height: 200px;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <h6 class="text-primary text-uppercase our-color mb-2">Nursery School</h6>
                        <!-- <h1 class="display-6 mb-4">We Help Students To Pass Test & Get A License On The First Try</h1> -->

                        <p class="mb-4">Socialization: Nursery school helps children learn to socialize with other
                            children their age. This can help them develop important social skills, such as sharing, taking
                            turns, and cooperating.
                            Cognitive development: Nursery school can help children develop their cognitive skills, such as
                            language skills, problem-solving skills, and critical thinking skills.
                            Emotional development: Nursery school can help children develop their emotional skills, such as
                            self-regulation and coping mechanisms.
                            Physical development: Nursery school can help children develop their physical skills, such as
                            gross motor skills and fine motor skills.</p>
                        <!-- <div class="row g-2 mb-4 pb-2">
                                        <div class="col-sm-6">
                                            <i class="fa fa-check our-color me-2"></i>Fully Licensed
                                        </div>
                                        <div class="col-sm-6">
                                            <i class="fa fa-check our-color me-2"></i>Online Tracking
                                        </div>
                                        <div class="col-sm-6">
                                            <i class="fa fa-check our-color me-2"></i>Afordable Fee
                                        </div>
                                        <div class="col-sm-6">
                                            <i class="fa fa-check our-color me-2"></i>Best Trainers
                                        </div>
                                    </div>
                                    <div class="row g-4">
                                        <div class="col-sm-6">
                                            <a class="btn our-btn-primary py-3 px-5" href="">Read More</a>
                                        </div>
                                        <div class="col-sm-6">
                                            <a class="d-inline-flex align-items-center btn our-btn-primary border-2 p-2"
                                                href="tel:+0123456789">
                                                <span class="flex-shrink-0 btn-square our-btn-primary">
                                                    <i class="fa fa-phone-alt  text-white"></i>
                                                </span>
                                                <span class="px-3 ">+012 345 6789</span>
                                            </a>
                                        </div>
                                    </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl py-6" id="primary-school">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <h6 class="text-primary text-uppercase our-color mb-2">Primary School</h6>
                        <!-- <h1 class="display-6 mb-4">We Help Students To Pass Test & Get A License On The First Try</h1> -->

                        <p class="mb-4">Academic Foundation: Primary schools equip students with foundational literacy
                            and numeracy skills. This includes learning to read, write, and comprehend complex texts, as
                            well as developing proficiency in mathematics.
                            Social and Emotional Development: Primary schools provide a structured environment where
                            children learn to interact with peers and teachers in positive ways. They develop important
                            social skills like collaboration, communication, and conflict resolution. Additionally, primary
                            school experiences help foster emotional intelligence, self-confidence, and a sense of
                            belonging.</p>
                        <!-- <div class="row g-2 mb-4 pb-2">
                                        <div class="col-sm-6">
                                            <i class="fa fa-check our-color me-2"></i>Fully Licensed
                                        </div>
                                        <div class="col-sm-6">
                                            <i class="fa fa-check our-color me-2"></i>Online Tracking
                                        </div>
                                        <div class="col-sm-6">
                                            <i class="fa fa-check our-color me-2"></i>Afordable Fee
                                        </div>
                                        <div class="col-sm-6">
                                            <i class="fa fa-check our-color me-2"></i>Best Trainers
                                        </div>
                                    </div>
                                    <div class="row g-4">
                                        <div class="col-sm-6">
                                            <a class="btn our-btn-primary py-3 px-5" href="">Read More</a>
                                        </div>
                                        <div class="col-sm-6">
                                            <a class="d-inline-flex align-items-center btn our-btn-primary border-2 p-2"
                                                href="tel:+0123456789">
                                                <span class="flex-shrink-0 btn-square our-btn-primary">
                                                    <i class="fa fa-phone-alt  text-white"></i>
                                                </span>
                                                <span class="px-3 ">+012 345 6789</span>
                                            </a>
                                        </div>
                                    </div> -->
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative overflow-hidden ps-5 pt-5 h-100" style="min-height: 400px;">
                        <img class="position-absolute w-100 h-100" src="{{ asset('assetsuser/img/img_3.jpg')}}" alt=""
                            style="object-fit: cover;">
                        <img class="position-absolute top-0 start-0 bg-white pe-3 pb-3" src="{{ asset('assetsuser/img/img_3.jpg')}}" alt=""
                            style="width: 200px; height: 200px;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl py-6" id="Secondary-School">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative overflow-hidden ps-5 pt-5 h-100" style="min-height: 400px;">
                        <img class="position-absolute w-100 h-100" src="{{ asset('assetsuser/img/img_4.jpg')}}" alt=""
                            style="object-fit: cover;">
                        <img class="position-absolute top-0 start-0 bg-white pe-3 pb-3" src="{{ asset('assetsuser/img/img_4.jpg')}}"
                            alt="" style="width: 200px; height: 200px;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <h6 class="text-primary text-uppercase our-color mb-2">Secondary School</h6>
                        <!-- <h1 class="display-6 mb-4">We Help Students To Pass Test & Get A License On The First Try</h1> -->

                        <p class="mb-4">Academic Depth: Secondary school builds upon the foundation set in primary school
                            by delving deeper into core subjects like math, science, English, and social studies. Students
                            encounter more complex concepts and may choose specialized courses based on their interests and
                            future aspirations.
                            Preparation for Higher Education: Secondary school prepares students for the rigors of college
                            or university. They develop essential research, writing, and critical thinking skills required
                            for success in higher education.
                            Career Exploration: Many secondary schools offer career counseling and exploration programs.
                            Students can gain exposure to various career paths, participate in internships, and develop
                            skills relevant to their chosen field.</p>
                        <!-- <div class="row g-2 mb-4 pb-2">
                                        <div class="col-sm-6">
                                            <i class="fa fa-check our-color me-2"></i>Fully Licensed
                                        </div>
                                        <div class="col-sm-6">
                                            <i class="fa fa-check our-color me-2"></i>Online Tracking
                                        </div>
                                        <div class="col-sm-6">
                                            <i class="fa fa-check our-color me-2"></i>Afordable Fee
                                        </div>
                                        <div class="col-sm-6">
                                            <i class="fa fa-check our-color me-2"></i>Best Trainers
                                        </div>
                                    </div>
                                    <div class="row g-4">
                                        <div class="col-sm-6">
                                            <a class="btn our-btn-primary py-3 px-5" href="">Read More</a>
                                        </div>
                                        <div class="col-sm-6">
                                            <a class="d-inline-flex align-items-center btn our-btn-primary border-2 p-2"
                                                href="tel:+0123456789">
                                                <span class="flex-shrink-0 btn-square our-btn-primary">
                                                    <i class="fa fa-phone-alt  text-white"></i>
                                                </span>
                                                <span class="px-3 ">+012 345 6789</span>
                                            </a>
                                        </div>
                                    </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl py-6" id="Matriculation">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <h6 class="text-primary text-uppercase our-color mb-2">Matriculation</h6>
                        <!-- <h1 class="display-6 mb-4">We Help Students To Pass Test & Get A License On The First Try</h1> -->

                        <p class="mb-4">Subjects: Students typically take 8 exam subjects. These include a combination of
                            compulsory subjects like English, Urdu, Islamiyat (or Ethics for non-Muslim students), Pakistan
                            Studies, Mathematics, and General Science (which may be split into Physics, Chemistry, and
                            Biology in some schools). Students also choose elective subjects based on their chosen academic
                            track (Science, Arts/Humanities, or Commerce).
                            Importance: Passing Matriculation exams is a major milestone in Pakistani education. It unlocks
                            opportunities for higher education by allowing students to pursue Higher Secondary School (HSSC)
                            programs in colleges.</p>
                        <!-- <div class="row g-2 mb-4 pb-2">
                                        <div class="col-sm-6">
                                            <i class="fa fa-check our-color me-2"></i>Fully Licensed
                                        </div>
                                        <div class="col-sm-6">
                                            <i class="fa fa-check our-color me-2"></i>Online Tracking
                                        </div>
                                        <div class="col-sm-6">
                                            <i class="fa fa-check our-color me-2"></i>Afordable Fee
                                        </div>
                                        <div class="col-sm-6">
                                            <i class="fa fa-check our-color me-2"></i>Best Trainers
                                        </div>
                                    </div>
                                    <div class="row g-4">
                                        <div class="col-sm-6">
                                            <a class="btn our-btn-primary py-3 px-5" href="">Read More</a>
                                        </div>
                                        <div class="col-sm-6">
                                            <a class="d-inline-flex align-items-center btn our-btn-primary border-2 p-2"
                                                href="tel:+0123456789">
                                                <span class="flex-shrink-0 btn-square our-btn-primary">
                                                    <i class="fa fa-phone-alt  text-white"></i>
                                                </span>
                                                <span class="px-3 ">+012 345 6789</span>
                                            </a>
                                        </div>
                                    </div> -->
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative overflow-hidden ps-5 pt-5 h-100" style="min-height: 400px;">
                        <img class="position-absolute w-100 h-100" src="{{ asset('assetsuser/img/img_2.jpg')}}" alt=""
                            style="object-fit: cover;">
                        <img class="position-absolute top-0 start-0 bg-white pe-3 pb-3" src="{{ asset('assetsuser/img/img_2.jpg')}}"
                            alt="" style="width: 200px; height: 200px;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl py-6" id="Tehfees Ul Qurban">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative overflow-hidden ps-5 pt-5 h-100" style="min-height: 400px;">
                        <img class="position-absolute w-100 h-100" src="{{ asset('assetsuser/img/quran-2.jpg')}}" alt=""
                            style="object-fit: cover;">
                        <img class="position-absolute top-0 start-0 bg-white pe-3 pb-3" src="{{ asset('assetsuser/img/quran-2.jpg')}}"
                            alt="" style="width: 200px; height: 200px;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <h6 class="text-primary text-uppercase our-color mb-2">Tehfees Ul Qurban</h6>
                        <!-- <h1 class="display-6 mb-4">We Help Students To Pass Test & Get A License On The First Try</h1> -->

                        <p class="mb-4">Increased Quran Memorization During Eid al-Adha: This refers to focusing on
                            memorizing the Quran during the days leading up to or during Eid al-Adha. This deepens one's
                            spiritual connection during this holy holiday.

                            Sacrifice Through Knowledge: This metaphorical interpretation views dedicating oneself to Quran
                            memorization as a form of sacrifice. Similar to sacrificing animals during Eid al-Adha, devoting
                            time and effort to learning the Quran is seen as giving up something of oneself for Allah (God).
                        </p>
                        <!-- <div class="row g-2 mb-4 pb-2">
                                        <div class="col-sm-6">
                                            <i class="fa fa-check our-color me-2"></i>Fully Licensed
                                        </div>
                                        <div class="col-sm-6">
                                            <i class="fa fa-check our-color me-2"></i>Online Tracking
                                        </div>
                                        <div class="col-sm-6">
                                            <i class="fa fa-check our-color me-2"></i>Afordable Fee
                                        </div>
                                        <div class="col-sm-6">
                                            <i class="fa fa-check our-color me-2"></i>Best Trainers
                                        </div>
                                    </div>
                                    <div class="row g-4">
                                        <div class="col-sm-6">
                                            <a class="btn our-btn-primary py-3 px-5" href="">Read More</a>
                                        </div>
                                        <div class="col-sm-6">
                                            <a class="d-inline-flex align-items-center btn our-btn-primary border-2 p-2"
                                                href="tel:+0123456789">
                                                <span class="flex-shrink-0 btn-square our-btn-primary">
                                                    <i class="fa fa-phone-alt  text-white"></i>
                                                </span>
                                                <span class="px-3 ">+012 345 6789</span>
                                            </a>
                                        </div>
                                    </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl py-6" id="Nazra Quran">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <h6 class="text-primary text-uppercase our-color mb-2">Nazra Quran</h6>
                        <!-- <h1 class="display-6 mb-4">We Help Students To Pass Test & Get A License On The First Try</h1> -->

                        <p class="mb-4">Teachers: Nazra Quran is typically taught by qualified Quran teachers who can
                            guide students on proper pronunciation and tajweed rules.
                            Resources: Students use specially designed Quran textbooks with large, clear fonts and markings
                            to guide pronunciation. Audio recordings of Quran recitation can also be used as a learning aid.
                            Progression: Nazra Quran learning usually starts with basic Arabic letters and progresses
                            gradually to more complex sounds and word combinations. Students then move on to recite full
                            verses and eventually chapters (Surahs) of the Quran.</p>
                        <!-- <div class="row g-2 mb-4 pb-2">
                                        <div class="col-sm-6">
                                            <i class="fa fa-check our-color me-2"></i>Fully Licensed
                                        </div>
                                        <div class="col-sm-6">
                                            <i class="fa fa-check our-color me-2"></i>Online Tracking
                                        </div>
                                        <div class="col-sm-6">
                                            <i class="fa fa-check our-color me-2"></i>Afordable Fee
                                        </div>
                                        <div class="col-sm-6">
                                            <i class="fa fa-check our-color me-2"></i>Best Trainers
                                        </div>
                                    </div>
                                    <div class="row g-4">
                                        <div class="col-sm-6">
                                            <a class="btn our-btn-primary py-3 px-5" href="">Read More</a>
                                        </div>
                                        <div class="col-sm-6">
                                            <a class="d-inline-flex align-items-center btn our-btn-primary border-2 p-2"
                                                href="tel:+0123456789">
                                                <span class="flex-shrink-0 btn-square our-btn-primary">
                                                    <i class="fa fa-phone-alt  text-white"></i>
                                                </span>
                                                <span class="px-3 ">+012 345 6789</span>
                                            </a>
                                        </div>
                                    </div> -->
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative overflow-hidden ps-5 pt-5 h-100" style="min-height: 400px;">
                        <img class="position-absolute w-100 h-100" src="{{ asset('assetsuser/img/quran-verse-islam.jpg')}}" alt=""
                            style="object-fit: cover;">
                        <img class="position-absolute top-0 start-0 bg-white pe-3 pb-3" src="{{ asset('assetsuser/img/quran-verse-islam.jpg')}}"
                            alt="" style="width: 200px; height: 200px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Study program End -->
@endsection
