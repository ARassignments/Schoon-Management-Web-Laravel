@extends('user.master')
@section('usercontent')
<!-- Page Header Start -->
<div class="container-fluid page-header py-6 my-6 mt-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center">
        <h1 class="display-4 text-white animated slideInDown mb-4">Contact Us</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item our-color active" aria-current="page">Contact</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Contact Start -->
<div class="container-xxl py-6">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 450px;">
                <div class="position-relative h-100">
                    <!-- <iframe class="position-relative w-100 h-100"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                                frameborder="0" style="min-height: 450px; border:0;" allowfullscreen="" aria-hidden="false"
                                tabindex="0"></iframe> -->
                    <img src="{{ asset('assetsuser/img/welcome-img.jpg')}}" alt="" class="position-relative w-100 h-100 shadow-lg">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <h6 class="our-color text-uppercase mb-2">Contact Us</h6>
                <h1 class="display-6 mb-4">If You Have Any Query, Please Contact Us</h1>
                <div id="responseMessage" style="display: none;" class="alert  our-color-3 text-center shadow">
                    <!-- Message sent succesfully dynamically with the help of ajax -->
                </div>
                <form id="contactForm">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control border-0 bg-light" id="name" name="name" placeholder="Your Name" required>
                                <label for="name">Your Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control border-0 bg-light" id="email" name="email" placeholder="Your Email" required>
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control border-0 bg-light" id="subject" name="subject" placeholder="Subject" required>
                                <label for="subject">Subject</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control border-0 bg-light" placeholder="Leave a message here" id="message" name="message" style="height: 150px" required></textarea>
                                <label for="message">Message</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn our-btn-primary py-3 px-5" type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#contactForm').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            $.ajax({
                url: "{{ route('contact.store') }}", // Your route for form submission
                type: 'POST',
                data: $(this).serialize(), // Serialize the form data
                success: function(response) {
                    $('#responseMessage').text('Your message has been sent successfully!').show();
                    $('#contactForm')[0].reset(); // Optional: Reset the form fields
                    setTimeout(function() {
                        $('#responseMessage').fadeOut(); // Hide the message after 5 seconds
                    }, 1000);
                },
                error: function(xhr) {
                    $('#responseMessage').text('There was an error sending your message. Please try again.').show();
                    setTimeout(function() {
                        $('#responseMessage').fadeOut(); // Hide the message after 5 seconds
                    }, 5000);
                }
            });
        });
    });
</script>


@endsection