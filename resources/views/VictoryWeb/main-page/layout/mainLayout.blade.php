<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>VicTory Group - Mountaineering</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playball&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    {{-- <link rel="stylesheet" href="{{asset('/')}}VictoryWeb/lib/fontawesome/all.css" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="{{ asset('VictoryWeb') }}/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="{{ asset('VictoryWeb') }}/lib/owlcarousel/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
    <link href="{{ asset('VictoryWeb') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('VictoryWeb') }}/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- adddlink from detail company --}}
    <link href="{{ asset('VictoryWeb') }}/lib/splide/splide.min.css" rel="stylesheet">

    {{-- add from cv detail --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>

    @yield('head')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar start -->
    <div class="container-fluid nav-bar fixed-top">
        <div class="container">
            <nav class="navbar navbar-light navbar-expand-lg py-0">
                <a href="{{ url('/') }}" class="navbar-brand  py-0">
                    <img src="{{ asset('/') }}VictoryWeb/img/logotopcv.png" class="img-fluid rounded p-0"
                        width="90px" alt="">

                    {{-- <h1 class="text-primary fw-bold m-0">Vic<span class="text-dark">Tory</span> </h1> --}}
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <a href="{{ url('/home') }}" class="nav-item nav-link menu menu-home">Trang chủ</a>
                        <a href="{{ url('/companies') }}" class="nav-item nav-link menu menu-mountain">Công ty</a>
                        <a href="{{ url('/jobs') }}" class="nav-item nav-link menu menu-organization">Công việc</a>
                        <a href="{{ url('/cv-template') }}" class="nav-item nav-link menu menu-cv-template">Hồ sơ và Cv</a>
                        <a href="{{ url('/blogs') }}" class="nav-item nav-link menu menu-blog">Tin tức</a>
                        <a href="{{ url('/aboutus') }}" class="nav-item nav-link menu menu-aboutus">Về chúng tôi</a>

                        <a href="{{ url('/contact') }}" class="nav-item nav-link menu-contact">Liên hệ</a>
                    </div>

                    <div
                        class="btn-search btn btn-primary btn-md-square me-4 rounded-circle  d-lg-inline-flex dropdown">
                        @if (!session()->has('user'))
                            <a class="btn btn-primary btn-md-square rounded-circle d-lg-inline-flex fw-bold"
                                href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa-regular fa-user fw-bold"></i>
                            </a>
                        @else
                            @php
                                $account = session()->get('user');
                            @endphp
                            <a class="rounded-circle border border-3 border-primary animate__animated animate__jello animate__infinite"
                                href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                aria-expanded="false" style="width:fit-content">
                                @if (
                                    $account->photo == null ||
                                        $account->photo == '' ||
                                        !File::exists(public_path('img/accounts/' . $account->id . '/' . $account->photo)))
                                    <img src="{{ asset('/img/accounts/unknown.png') }}" class="rounded-circle "
                                        style="width:45px !important;height:45px !important" alt="User Image">
                                @else
                                    <img src="{{ asset('/img/accounts/' . $account->id . '/' . $account->photo) }}"
                                        class="rounded-circle " style="width:45px !important;height:45px !important"
                                        alt="User Image">
                                @endif
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink"
                                style="left: 50%;transform: translateX(-50%);">
                                <li class="text-center">
                                    <a class="dropdown-item" href="{{ url('/account/profile') }}">Xem trang cá nhân</a>
                                </li>
                                <li class="text-center">
                                    <a class="dropdown-item" href="{{ url('/logout?command=logout') }}" role="button">Đăng xuất</a>
                                </li>
                            </ul>
                        @endif
                    </div>

                    @if (!session()->has('user'))
                        <a href="{{ url('/login') }}"
                            class="btn btn-light py-2 px-4 mx-1  d-xl-inline-block rounded-pill border border-2 border-primary">Đăng nhập</a>
                        <a href="{{ url('/register') }}"
                            class="btn btn-primary py-2 px-4  d-xl-inline-block rounded-pill">Đăng ký</a>
                    @endif
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    @yield('content')

    <div class="content-footer">
        <!-- Footer Start -->
        <div class="container-fluid footer py-4 my-6 mb-0 bg-light wow bounceInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="footer-item">
                            <h1 class="text-primary">Top<span class="text-dark">CV</span></h1>
                            <p class="lh-lg mb-4">TopCV là công ty công nghệ nhân sự (HR Tech) hàng đầu Việt Nam. Với năng lực lõi là công nghệ,
                                 đặc biệt là trí tuệ nhân tạo (AI), sứ mệnh của TopCV đặt ra cho mình là thay đổi thị trường tuyển dụng - nhân sự ngày một hiệu quả hơn. Bằng công nghệ, chúng tôi tạo ra nền tảng cho phép người lao động tạo CV, phát triển được các kỹ năng cá nhân,
                                 xây dựng hình ảnh chuyên nghiệp trong mắt nhà tuyển dụng và tiếp cận với các cơ hội việc làm phù hợp.</p>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="footer-item">
                            <h4 class="mb-4">Contact Us</h4>
                            <div class="d-flex flex-column align-items-start">
                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i> 7/1 Đ. Thành Thái, Phường 14, Quận 10, Hồ Chí Minh 700000, Việt Nam
                                </p>
                                <p><i class="fa fa-phone-alt text-primary me-2"></i>028 7309 1991</p>
                                <p><i class="fas fa-envelope text-primary me-2"></i> https://www.hoasen.edu.vn/</p>
                                <p><i class="fa fa-clock text-primary me-2"></i> 24/7 Hours Service</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10856.57948347803!2d106.66789709505545!3d10.765340941044759!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f7c8bf050ff%3A0x4fa87595d124cc0c!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBIb2EgU2VuIC0gQ8ahIHPhu58gVGjDoG5oIFRow6Fp!5e0!3m2!1svi!2s!4v1718802776773!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Copyright Start -->
        <div class="container-fluid copyright bg-dark py-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <span class="text-light"><a href="#"><i
                                    class="fas fa-copyright text-light me-2"></i>Victory
                                Group</a>, All right reserved.</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-md-square btn-primary rounded-circle back-to-top"><i
                class="fa fa-arrow-up"></i></a>

    </div>

    {{-- <script src="{{ asset('css/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js') }}"></script> --}}

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>


    <!-- wow.min.js: hiệu ứng khi cuộn tương tự như aos, nhưng aos đơn giản dễ sử dụng và wow js sẽ phụ thuộc nhiều vào Animate.css , config trong main.js -->
    <script src="{{ asset('/') }}VictoryWeb/lib/wow/wow.min.js"></script>
    <script src="{{ asset('/') }}VictoryWeb/lib/easing/easing.min.js"></script>

    <!-- waypoints.min.js: hiệu ứng được cài đặt khi kéo lên xuống trong trang, tại mỗi vị trí 1 nào đó hiệu ứng được quy định sẽ được chạy , config trong main.js -->
    <script src="{{ asset('/') }}VictoryWeb/lib/waypoints/waypoints.min.js"></script>

    <!-- counterup.min.js: hiệu ứng số đếm tăng dần trong js, config trong main.js -->
    <script src="{{ asset('/') }}VictoryWeb/lib/counterup/counterup.min.js"></script>

    <!-- lightbox.min.js: hiệu ứng ui liên quan đến chỉnh và xem các image trong web , config trong main.js -->
    <script src="{{ asset('/') }}VictoryWeb/lib/lightbox/js/lightbox.min.js"></script>

    <!-- owl.carousel.min.js: hiệu ứng slide bar nằm ngang, config trong main.js -->
    <script src="{{ asset('/') }}VictoryWeb/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('/') }}VictoryWeb/js/main.js"></script>

    {{-- companies add script --}}
    <script src="{{ asset('/') }}AdminLte/dist/js/adminlte.min.js"></script>

    {{-- companies detail script --}}
    <script src="{{ asset('/') }}VictoryWeb/lib/splide/splide.min.js"></script>

    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <script src="{{ asset('/') }}AdminLte/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- add from cv detail --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @yield('script')


</body>

</html>
