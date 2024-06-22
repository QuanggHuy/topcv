@extends('VictoryWeb.main-page.layout.mainLayout')

@section('head')

@endsection

@section('content')
    <!-- Contact Start -->
    <div class="container-fluid contact wow bounceInUp py-5 mt-5" data-wow-delay="0.1s">
        <div class="container mt-5 px-0" style="box-shadow: 0 0 60px rgba(240, 198, 9, 0.596)">
            <div class="p-5 bg-light rounded contact-form">
                <div class="row g-4">
                    <div class="col-12 text-center">
                        <small
                            class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Liên hệ</small>
                        <h1 class="display-5 mb-0">Hãy liên hệ chúng tôi</h1>
                    </div>
                    <div class="col-md-6 col-lg-7">

                        <form method="post" action="{{ url('/contact/send') }}">
                            @csrf
                            <input type="text" name="name" id="name"
                                class="w-100 form-control p-3 mb-4 border-primary bg-light" placeholder="Your Name">
                            <input type="email" name="email" id="email"
                                class="w-100 form-control p-3 mb-4 border-primary bg-light" placeholder="Enter Your Email">
                            <textarea name="message" id="message" class="w-100 form-control mb-4 p-3 border-primary bg-light" rows="4"
                                cols="10" placeholder="Your Message"></textarea>
                            <div class="row">
                                <div id="recaptcha" style="display: none;" class="col-6">
                                    <div class="g-recaptcha d-flex justify-content-center"
                                        data-sitekey="{{$recapchaKey}}"></div>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-primary form-control p-3 border-primary bg-primary rounded-pill"
                                        type="submit">Gửi ngay</button>
                                </div>

                            </div>


                        </form>
                    </div>
                    <div class="col-md-6 col-lg-5">
                        <div>
                            <div class="d-inline-flex w-100 border border-primary p-4 rounded mb-4">
                                <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                                <div class="">
                                    <h4>Địa chỉ</h4>
                                    <p>7/1 Đ. Thành Thái, Phường 14, Quận 10, Hồ Chí Minh 700000, Việt Nam</p>
                                </div>
                            </div>
                            <div class="d-inline-flex w-100 border border-primary p-4 rounded mb-4">
                                <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                                <div class="">
                                    <h4>Email</h4>
                                    <p class="mb-2">https://www.hoasen.edu.vn/</p>
                                </div>
                            </div>
                            <div class="d-inline-flex w-100 border border-primary p-4 rounded">
                                <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                                <div class="">
                                    <h4>Đường dây nóng</h4>
                                    <p class="mb-2">028 7309 1991</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection

@section('script')
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--reCaptcha-->
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>

    <script>
        $(document).ready(function() {

            window.addEventListener("pageshow", function(event) {
                var historyTraversal = event.persisted ||
                    (typeof window.performance != "undefined" &&
                        window.performance.navigation.type === 2);
                if (historyTraversal) {
                    // Handle page restore.
                    window.location.reload();
                }
            });
            $('.dropdown-button').click()

            @if (session()->has('mess'))
                var mess = {!! json_encode(session()->get('mess')) !!};


                Swal.fire({
                    icon: {!! json_encode(session()->get('icon')) !!},
                    title: mess,
                    text: {!! json_encode(session()->get('text')) !!}
                });
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    contentType: 'application/json',
                    url: "{{ url('/admin/removeMessSession') }}",

                });
            @endif

            $('.menu').removeClass('active')
            $('.menu-contact').addClass('active')
            $('.dropdown-button').on('click', function() {

                if ($('.nav-item').hasClass('menu-open')) {
                    $('.dropdown-icon').removeClass('fa-chevron-down');
                    $('.dropdown-icon').addClass('fa-angle-right');
                } else {
                    $('.dropdown-icon').removeClass('fa-angle-right');
                    $('.dropdown-icon').addClass('fa-chevron-down');
                }
            })


            $('.heart-icon').on('mouseleave', function() {
                $(this).css({
                    "transition": "0.3s"
                }, {
                    "font-size": "40px"
                });
            });
            $('.heart-icon').on('click', function() {
                if ($(this).hasClass('fa-regular')) {
                    $(this).removeClass('fa-regular');
                    $(this).addClass('fa-solid');
                    Swal.fire({
                        icon: 'success',
                        title: 'Added to favorite list',
                        text: 'View your list in account detail'
                    });
                } else {
                    $(this).removeClass('fa-solid');
                    $(this).addClass('fa-regular');
                    Swal.fire({
                        icon: 'success',
                        title: 'Removed from favorite list',
                        text: 'View your list in account detail'
                    });
                }
            });

            // Testimonial carousel
            $(".testimonial-carousel").owlCarousel({
                autoplay: true,
                smartSpeed: 1000,
                center: true,
                margin: 25,
                dots: true,
                loop: true,
                nav: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    992: {
                        items: 3
                    }
                }
            });
        })
    </script>
    <script>
        $(document).ready(function() {
            function checkFields() {
                const name = document.querySelector('input[name="name"]').value;
                const email = document.querySelector('input[name="email"]').value;
                const message = document.querySelector('textarea[name="message"]').value;
                let isFormFilled = true;

                if (name === '') {
                    $('#name').addClass('border border-2 border-danger');
                    isFormFilled = false;
                } else {
                    $('#name').removeClass('border border-2 border-danger');
                }

                if (email === '') {
                    $('#email').addClass('border border-2 border-danger');
                    isFormFilled = false;
                } else {
                    $('#email').removeClass('border border-2 border-danger');
                }

                if (message === '') {
                    $('#message').addClass('border border-2 border-danger');
                    isFormFilled = false;
                } else {
                    $('#message').removeClass('border border-2 border-danger');
                }

                return isFormFilled;
            }

            $('form').on('submit', function(e) {
                if (!checkFields()) {
                    e.preventDefault(); // Ngăn không cho form được submit
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please fill in all the fields before submitting!',
                    });
                    $('#recaptcha').hide();
                } else {
                    // Các trường đã được điền, kiểm tra xem reCAPTCHA đã được hiển thị chưa
                    if ($('#recaptcha').is(':visible')) {
                        // Nếu reCAPTCHA đã được hiển thị, tiếp tục submit form
                        // Lưu ý: bạn cần thực hiện xác minh reCAPTCHA ở phía server
                    } else {
                        // Hiển thị reCAPTCHA
                        e.preventDefault();
                        $('#recaptcha').show();
                        Swal.fire({
                            icon: 'warning',
                            title: 'Almost there...',
                            text: 'Please complete the CAPTCHA to proceed!',
                        });
                    }
                }
            });

            // Ví dụ kiểm tra reCAPTCHA và hiển thị mỗi khi người dùng nhập vào các trường
            $('#name, #email, #message').on('input', function() {
                if (checkFields()) {
                    // Các trường đã được điền, hiển thị reCAPTCHA
                    $('#recaptcha').show();
                } else {
                    $('#recaptcha').hide();
                }
            });
        });
    </script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
            });
        </script>
    @endif

       
@endsection
