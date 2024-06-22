@extends('VictoryWeb.main-page.layout.mainLayout')

@section('head')
    <title>VicTory Group - Mountaineering</title>
    
    <style>
        .l-section-video {
            position: relative;
            /* overflow: hidden; */
            width: 100%;
            height: 670px;
        }

        .l-section-video video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .truncate-text {
            color: #ffffff;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 8;
            /* Số dòng tối đa bạn muốn hiển thị cho tin tức chính*/
            -webkit-box-orient: vertical;
        }

        .truncate-text img {
            display: none !important;
        }

        .truncate-text figure {
            display: none !important;

        }

        .truncate-text table {
            display: none !important;
        }

        .truncate-text figcaption {
            display: none !important;
        }

        .truncate-text .hero-container {
            display: none !important;
        }


        .truncate-text1 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            /* Số dòng tối đa bạn muốn hiển thị cho tin tức phụ*/
            -webkit-box-orient: vertical;
        }

        .truncate-text1 img {
            display: none !important;
        }

        .truncate-text1 figure {
            display: none !important;

        }

        .truncate-text1 table {
            display: none !important;
        }

        .truncate-text1 figcaption {
            display: none !important;
        }

        .truncate-text1 .hero-container {
            display: none !important;
        }

        .home-title-text-1 {
            text-shadow: rgb(155, 110, 42) 2px 0px 0px, rgb(155, 110, 42) 1.75517px 0.958851px 0px, rgb(155, 110, 42) 1.0806px 1.68294px 0px, rgb(155, 110, 42) 0.141474px 1.99499px 0px, rgb(155, 110, 42) -0.832294px 1.81859px 0px, rgb(155, 110, 42) -1.60229px 1.19694px 0px, rgb(155, 110, 42) -1.97998px 0.28224px 0px, rgb(155, 110, 42) -1.87291px -0.701566px 0px, rgb(155, 110, 42) -1.30729px -1.5136px 0px, rgb(155, 110, 42) -0.421592px -1.95506px 0px, rgb(155, 110, 42) 0.567324px -1.91785px 0px, rgb(155, 110, 42) 1.41734px -1.41108px 0px, rgb(155, 110, 42) 1.92034px -0.558831px 0px;
        }

        .home-title-text-2 {
            text-shadow: rgb(155, 110, 42) 2px 0px 0px, rgb(155, 110, 42) 1.75517px 0.958851px 0px, rgb(155, 110, 42) 1.0806px 1.68294px 0px, rgb(155, 110, 42) 0.141474px 1.99499px 0px, rgb(155, 110, 42) -0.832294px 1.81859px 0px, rgb(155, 110, 42) -1.60229px 1.19694px 0px, rgb(155, 110, 42) -1.97998px 0.28224px 0px, rgb(155, 110, 42) -1.87291px -0.701566px 0px, rgb(155, 110, 42) -1.30729px -1.5136px 0px, rgb(155, 110, 42) -0.421592px -1.95506px 0px, rgb(155, 110, 42) 0.567324px -1.91785px 0px, rgb(155, 110, 42) 1.41734px -1.41108px 0px, rgb(155, 110, 42) 1.92034px -0.558831px 0px;
        }

        .secondary-news {
            overflow: auto;
            height: 100%;
        }

        .news-area {
            height: 700px;
            width: 100%;
            /* overflow-y: scroll; */
            overflow-x: hidden;

        }

        .news-area::-webkit-scrollbar {
            display: none;
            /* Safari and Chrome */
        }

        .read-more {
            --animate-duration: 2.0s;
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Modal Search Start -->
        {{-- <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control bg-transparent p-3" placeholder="keywords"
                                aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Modal Search End -->

        <!-- Hero Start -->
        <div class="container-fluid bg-light py-6 my-6 mt-0 l-section-video d-flex align-items-center">
            <video class="w-100" muted loop autoplay playsinline preload="auto">
                <source type="video/mp4" src="https://www.theuiaa.org/wp-content/uploads/2024/01/Mini-Reel-15.mp4" />
            </video>
            <div class="container">
                <div class="row g-5 d-flex justify-content-center align-items-center">
                    <div class="col-lg-7 col-md-12 text-center p-3 rounded" style="backdrop-filter: blur(1px); ">
                        <small
                            class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-4 animate__animated  animate__bounceInDown ">Welcome
                            to TopCV </small>
                        <h1 class="home-title-text-1 display-1 mb-4 animate__animated  animate__bounceInDown text-light">
                            Tiếp <span class="text-primary home-title-text-2">Lợi Thế </span>Nối
                            <span class="text-primary  home-title-text-2">Thành Công</span>
                        </h1>

                        <a href="#aboutus"
                            class="scrollButton btn btn-primary border-0 rounded-pill py-3 px-4 px-md-5 animate__animated  animate__tada
                        animate__infinite animate__delay-1s"
                            style=" --animate-duration: 1.3s;">Tổng Quan</a>
                    </div>
                    {{-- <div class="col-lg-5 col-md-12">
                    <img src="{{asset('/')}}VictoryWeb/img/hero.png" class="img-fluid rounded animated zoomIn" alt="">
                </div> --}}
                </div>
            </div>
        </div>
        <!-- Hero End -->


        <!-- About Satrt -->
        <div class="container-fluid py-3">
            <div id="aboutus" class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-5 wow animate__animated animate__bounceInUp " data-wow-delay="0.1s">
                        <img src="{{ asset('/') }}VictoryWeb/img/logotopcv.png" class="img-fluid rounded" alt="">
                    </div>
                    <div class="col-lg-7 wow animate__animated animate__bounceInUp" data-wow-delay="0.1s">
                        <small
                            class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">About
                            Us</small>
                        <h1 class="display-5 mb-4">TopCV</h1>
                        <p class="mb-4">TopCV là công ty công nghệ nhân sự (HR Tech) hàng đầu Việt Nam. Với năng lực lõi là công nghệ,
                             đặc biệt là trí tuệ nhân tạo (AI), sứ mệnh của TopCV đặt ra cho mình là thay đổi thị trường tuyển dụng - nhân sự ngày một hiệu quả hơn.
                              Bằng công nghệ, chúng tôi tạo ra nền tảng cho phép người lao động tạo CV, phát triển được các kỹ năng cá nhân,
                             xây dựng hình ảnh chuyên nghiệp trong mắt nhà tuyển dụng và tiếp cận với các cơ hội việc làm phù hợp.</p>
                        <div class="row g-4 text-dark mb-5">
                            <div class="col-sm-6">
                                <i class="fas fa-share text-primary me-2"></i>500+
                                 Nhân viên trên toàn quốc
                            </div>
                            <div class="col-sm-6">
                                <i class="fas fa-share text-primary me-2"></i>
2
Văn phòng
tại Hà Nội & TP. Hồ Chí Minh
                            </div>
                            <div class="col-sm-6">
                                <i class="fas fa-share text-primary me-2"></i>100+
Kỹ sư công nghệ
                            </div>
                            {{-- <div class="col-sm-6">
                                <i class="fas fa-share text-primary me-2"></i>2.000.000+
Việc làm đã được kết nối
                            </div> --}}
                        </div>
                        <a href="{{ url('/aboutus') }}" class="btn btn-primary py-3 px-5 rounded-pill">Tìm hiểu chúng tôi<i
                                class="fas fa-arrow-right ps-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
        <div class="container-fluid service py-6">
            <div class="container">

                <div class="row g-4">
                    <div class="col-lg-3 col-md-6 col-sm-12 wow animate__animated animate__bounceInUp"
                        data-wow-delay="0.1s">
                        <div class="bg-light rounded service-item">
                            <div class="service-content d-flex align-items-center justify-content-between h-100 p-3">
                                <div
                                    class="service-content-icon text-center d-flex flex-column align-items-center justify-content-between h-100">
                                    <img class="img-fluid mb-4" src="{{ asset('/') }}VictoryWeb/img/recruitment.png"
                                        width="60%" alt="">

                                    <h4 class="mb-3">540.000+
Nhà tuyển dụng uy tín</h4>
                                    <p class="mb-4">Các nhà tuyển dụng đến từ tất cả các ngành nghề và được xác thực bởi TopCV.</p>

                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 wow animate__animated animate__bounceInUp"
                        data-wow-delay="0.2s">
                        <div class="bg-light rounded service-item">
                            <div class="service-content d-flex align-items-center justify-content-between h-100 p-3">
                                <div
                                    class="service-content-icon text-center d-flex flex-column align-items-center justify-content-between h-100">
                                    <img class="img-fluid mb-4" src="{{ asset('/') }}VictoryWeb/img/world.svg"
                                        width="60%" alt="">

                                    <h4 class="mb-3">200.000+
Doanh nghiệp hàng đầu</h4>
                                    <p class="mb-4">TopCV được nhiều doanh nghiệp hàng đầu tin tưởng và đồng hành,
                                         trong đó có các thương hiệu nổi bật như Samsung, Viettel, Vingroup, FPT, Techcombank,...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 wow animate__animated animate__bounceInUp"
                        data-wow-delay="0.3s">
                        <div class="bg-light rounded service-item">
                            <div class="service-content d-flex align-items-center justify-content-between h-100 p-3">
                                <div
                                    class="service-content-icon text-center d-flex flex-column align-items-center justify-content-between h-100">
                                    <img class="img-fluid mb-4"
                                        src="{{ asset('/') }}VictoryWeb/img/network.png" width="60%"
                                        alt="">
                                    <h4 class="mb-3">2.000.000+
Việc làm đã được kết nối</h4>
                                    <p class="mb-4">TopCV đồng hành và kết nối hàng nghìn ứng viên với
                                         những cơ hội việc làm hấp dẫn từ các doanh nghiệp uy tín.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 wow animate__animated animate__bounceInUp"
                        data-wow-delay="0.4s">
                        <div class="bg-light rounded service-item">
                            <div class="service-content d-flex align-items-center justify-content-between h-100 p-3">
                                <div
                                    class="service-content-icon text-center d-flex flex-column align-items-center justify-content-between h-100">
                                    <img class="img-fluid mb-4" src="{{ asset('/') }}VictoryWeb/img/downloadicon.png"
                                        width="60%" alt="">
                                    <h4 class="mb-3">1.200.000+
Lượt tải ứng dụng
</h4>
                                    <p class="mb-4">Hàng triệu ứng viên sử dụng ứng dụng TopCV để tìm kiếm việc làm,
                                         trong đó có 60% là ứng viên có kinh nghiệm từ 3 năm trở lên.</p>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <!-- Team Start -->
        <div class="container-fluid wow animate__animated animate__lightSpeedInLeft  border border-2 border-primary rounded  py-5 mb-5  team mountain-featured d-flex flex-column align-items-center justify-content-between overflow-hidden  "
            style="width:95%">
            <div class="container ">
                <div class="text-center mx-auto pb-5 wow animate__animated animate__fadeIn " data-wow-delay=".1s"
                    style="max-width: 600px;">

                    <small
                        class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Nổi Bật</small>
                    <h1>Những công ty được xem nhiều nhất</h1>
                </div>
                <div class="owl-carousel team-carousel wow animate__animated animate__fadeIn " data-wow-delay=".2s">
                    @foreach ($companiesList as $company)
                        <div class="rounded team-item">
                            <div class="team-content rounded">
                                <div class="team-img-icon">
                                    <div class="team-img rounded overflow-hidden">
                                        <img src="{{ asset('/') }}img/companies/{{ $company->id }}/{{ $company->photo_main }}"
                                            class="img-fluid w-100  rounded-bottom" alt="">
                                    </div>
                                    <div class="team-name text-center py-3">
                                        <h4 class="">{{ $company->name }}</h4>
                                        <p class="m-0">{{ $company->country_name }}</p>
                                    </div>
                                    <div class="team-icon d-flex justify-content-end pb-4">
                                        <a class="btn btn-square btn-primary text-white rounded-circle m-1 w-50 text-left"
                                            href="{{ url('/companies/detail?id=' . $company->id) }}"><i
                                                class="fa-solid fa-paper-plane"></i></a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <a href="{{ url('/companies') }}"
                class="btn btn-primary px-4 py-2 my-4 rounded-pill read-more animate__animated animate__rubberBand animate__infinite">Đánh giá từ cộng đồng</a>
            <div class="owl-carousel owl-theme testimonial-carousel  mb-4 wow tada" data-wow-delay="0.1s">
                @foreach ($accountRateList as $account)
                    <div class="testimonial-item rounded bg-light">
                        <div class="d-flex mb-3">

                            @if (
                                $account->photo == null ||
                                    $account->photo == '' ||
                                    !File::exists(public_path('img/accounts/' . $account->id . '/' . $account->photo)))
                                <img src="{{ asset('/img/accounts/unknown.png') }}"
                                    class="img-fluid rounded-circle flex-shrink-0" alt="">
                            @else
                                <img src="{{ asset('/img/accounts/' . $account->id . '/' . $account->photo) }}"
                                    class="img-fluid rounded-circle flex-shrink-0" alt="">
                            @endif

                            <div class="position-absolute" style="top: 15px; right: 20px;">
                                <i class="fa fa-quote-right fa-2x"></i>
                            </div>
                            <div class="ps-3 my-auto">
                                <h4 class="mb-0">{{ $account->fullname }}</h4>
                                <p class="m-0">Rate for: {{ $account->companyName }}</p>
                                <div class="d-flex justify-content-start star-rating-result ">
                                    <span class="fa-regular fa-star text-warning " data-rating="1"></span>
                                    <span class="fa-regular fa-star text-warning" data-rating="2"></span>
                                    <span class="fa-regular fa-star text-warning" data-rating="3"></span>
                                    <span class="fa-regular fa-star text-warning" data-rating="4"></span>
                                    <span class="fa-regular fa-star text-warning" data-rating="5"></span>
                                    <input type="hidden" name="whatever1" class="rating-value-result"
                                        value="{{ $account->avg_score }}">

                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach


            </div>
        </div>
        <!-- Team End -->

        <!--News start-->
        <div class="container-fluid blog py-3 w-100 bg-light">
            <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                <small
                    class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Tin tức</small>
                <h1 class="display-5 mb-5">Tin tức tiêu biểu</h1>
            </div>
            <div class=" news-area m-0 ">

                <div class="row h-100  ">

                    <div class="col-lg-9 d-flex flex-column justify-content-between h-100 border-end">
                        <!-- 1 Tin chính, lấy cái mới nhất theo id-->


                        <div class="card  wow bounceInUp w-100  d-flex align-items-center " style="height:49%"
                            data-wow-delay="0.2s">
                            <div class="row  overflow-auto ">
                                <div class=" col-lg-5 d-flex align-items-center justify-content-center h-100">
                                    <img src="{{ asset('/img/articles/' . $articleFirst->id . '/' . $articleFirst->photo) }}"
                                        class="img-fluid rounded h-100" alt="">
                                </div>
                                <div class=" col-lg-7 h-100">
                                    <div class="card-body h-100 ">
                                        <h5 class="card-title"><a
                                                href="{{ url('/blogs/detail?id=' . $articleFirst->id) }}">{{ $articleFirst->name }}</a>
                                        </h5>
                                        <span class="card-text truncate-text text-secondary">
                                            {!! html_entity_decode($articleFirst->description) !!}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card  wow bounceInUp w-100  d-flex flex-column justify-content-center overflow-hidden"
                            style="height:49%" data-wow-delay="0.2s">
                            <div class="row overflow-auto ">
                                @foreach ($articleSecond as $article)
                                    <div class="col-lg-4  border-end h-100">
                                        <div class="card-body  h-100 overflow-hidden">
                                            <h5 class="card-title"><a
                                                    href="{{ url('/blogs/detail?id=' . $article->id) }}">{{ $article->name }}</a>
                                            </h5>
                                            <span class="card-text truncate-text text-secondary">
                                                {!! html_entity_decode($article->description) !!}
                                            </span>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3  secondary-news   wow bounceInUp" data-wow-delay="0.3s">
                        <!-- 3 Tin phụ, controller skip (1) take(3) theo id mới nhất-->
                        <span class="pt-2">Tin tức mới nhất</span>
                        @foreach ($articleThird as $article)
                            <div class="card mb-2">
                                <div class="card-body">
                                    <h5 class="card-title truncate-text1 "><a
                                            href="{{ url('/blogs/detail?id=' . $article->id) }}">{{ $article->name }}</a>
                                    </h5>
                                    <span class="card-text truncate-text1">{!! html_entity_decode($article->description) !!}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>

            </div>
            <div class="text-center wow bounceInUp">
                <a href="{{ url('/blogs') }}"
                    class="btn read-more btn-primary py-3 my-2 px-5 rounded-pill animate__animated animate__rubberBand animate__infinite">Đọc thêm<i class="fas fa-arrow-right ps-2"></i></a>
            </div>
        </div>
        <!--News end-->

        <!-- Team Start -->
        <div class="container-fluid team organization-featured py-6">
            <div class="mx-3">
                <div class="text-center wow  animate__animated animate__bounceInUp" data-wow-delay="0.1s">
                    <small
                        class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Công ty nổi bật</small>
                    <h1 class="display-5 mb-5">Các công ty được tìm kiếm nhiều nhất</h1>
                </div>
                <div class="row g-4 border border-5 border-primary rounded">
                    <div class="owl-carousel  py-2  owl-theme testimonial-carousel mb-4 wow tada" data-wow-delay="0.1s">

                        @foreach ($groupList as $group)
                            <div class=" wow  animate__animated animate__bounceInRight h-100" data-wow-delay="0.1s">

                                <div class="team-item rounded-pill  h-100">
                                    <a class="h-100 d-flex align-items-center"
                                        href="{{ url('/organizations/detail?id=' . $group->id) }}">


                                        @if (
                                            $group->photo == null ||
                                                $group->photo == '' ||
                                                !File::exists(public_path('img/groups/' . $group->id . '/' . $group->photo)))
                                            <img class=" img-fluid rounded-circle h-100"
                                                src="{{ asset('/img/groups/unknown.png') }}" alt="User profile picture">
                                        @else
                                            <img class=" img-fluid rounded-circle h-100"
                                                src="{{ asset('/img/groups/' . $group->id . '/' . $group->photo) }}"
                                                alt="User profile picture">
                                        @endif


                                        <span class="fs-6 fw-bold ">{{ $group->name }}</span>

                                        <div class="team-icon bg-primary rounded-circle d-flex flex-column justify-content-center text-center "
                                            style="width:40px;height:40px">


                                            <i class="fas fa-share-alt text-dark"></i>


                                        </div>
                                    </a>

                                </div>

                            </div>
                        @endforeach









                    </div>




                </div>
            </div>
        </div>
        <!-- Team End -->


        <!-- Service Start -->
        <div class="container-xxl service py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <small
                        class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Các dịch vụ tiêu biểu</small>
                    <h1 class="mb-5">Khám phá hệ sinh thái HR tech của TopCV</h1>
                </div>
                <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="col-lg-4">
                        <div class="nav w-100 nav-pills me-4">
                            <button class="nav-link w-100 d-flex align-items-center text-start p-3 mb-4 active"
                                data-bs-toggle="pill" data-bs-target="#tab-pane-1" type="button">
                                <i class="fa-2x me-3 fa-solid fa-hourglass"></i>
                                <h4 class="m-0">TopCV</h4>
                            </button>
                            <button class="nav-link w-100 d-flex align-items-center text-start p-3 mb-4"
                                data-bs-toggle="pill" data-bs-target="#tab-pane-2" type="button">
                                <i class="fa-2x me-3 fa-solid fa-mountain"></i>

                                <h4 class="m-0">HappyTime.vn</h4>
                            </button>
                            <button class="nav-link w-100 d-flex align-items-center text-start p-3 mb-4"
                                data-bs-toggle="pill" data-bs-target="#tab-pane-3" type="button">
                                <i class="fa-2x me-3 fa-solid fa-map"></i>

                                <h4 class="m-0">TestCenter.vn</h4>
                            </button>
                            <button class="nav-link w-100 d-flex align-items-center text-start p-3 mb-4"
                                data-bs-toggle="pill" data-bs-target="#tab-pane-4" type="button">
                                <i class="fa-2x me-3 fa-solid fa-house"></i>

                                <h4 class="m-0">SHiring.ai</h4>
                            </button>
                            {{-- <button class="nav-link w-100 d-flex align-items-center text-start p-3 mb-0"
                                data-bs-toggle="pill" data-bs-target="#tab-pane-5" type="button">
                                <i class="fa-2x me-3 fa-solid fa-exclamation-triangle"></i>

                                <h4 class="m-0">Mountain Hazards</h4>
                            </button> --}}
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="tab-content w-100 h-100">
                            <div class="tab-pane fade show active" id="tab-pane-1">
                                <div class="row g-4">
                                    <div class="col-md-6 " style="min-height: 416px;">
                                        <div class="position-relative h-100 ">
                                            <img class="position-absolute img-fluid w-100 h-100 rounded-3"
                                                src="{{ asset('VictoryWeb/img/history.jpg') }}"
                                                style="object-fit: cover;" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="mb-3">Công ty Cổ phần TopCV Việt Nam</h3>
                                        <p class="mb-4">Trong suốt hành trình 10 năm nghiên cứu,
                                            hình thành và phát triển, chúng tôi tin rằng,
                                            việc kết nối đúng ứng viên với việc làm phù hợp là chưa đủ,
                                            mà đích đến phải là kết nối thành công.
                                            Với niềm tin vào sứ mệnh đó, TopCV Việt Nam đã không ngừng đầu tư vào việc nghiên cứu & phát triển năng lực công nghệ lõi,
                                            đặc biệt là Trí tuệ nhân tạo (AI) và Recruitment Marketing mang đến các giải pháp toàn diện giúp doanh nghiệp giải quyết đồng thời tất cả các bài toán xoay quanh vấn đề tuyển dụng.</p>
                                        <p><i class="fa fa-check text-success me-3"></i>Nhận trách nhiệm, đưa giải pháp,
hướng tập thể, vì khách hàng</p>
                                        <p><i class="fa fa-check text-success me-3"></i>Nỗ lực vượt trội,
tốt hơn mỗi ngày</p>
                                        <p><i class="fa fa-check text-success me-3"></i>Lắng nghe, mỉm cười,
thay đổi tích cực</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-pane-2">
                                <div class="row g-4">
                                    <div class="col-md-6" style="min-height: 416px;">
                                        <div class="position-relative h-100">
                                            <img class="position-absolute img-fluid w-100 h-100 rounded-3"
                                                src="{{ asset('VictoryWeb/img/style.jpg') }}" style="object-fit: cover;"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="mb-3">Con Người Là Trung Tâm Của Mọi Sự Phát Triển.</h3>
                                        <p class="mb-4">Với khát vọng giải quyết bài toán phức tạp về quản trị nhân sự cho mọi doanh nghiệp,
                                             ý tưởng về HappyTime đã được chúng tôi ấp ủ từ năm 2020 và chính thức cho ra mắt vào tháng 10/2021,
                                              quyết tâm trở thành nền tảng quản lý và gia tăng trải nghiệm nhân viên hàng đầu Việt Nam,
                                             chiếm vị trí quan trọng trong hệ sinh thái HR Tech của Công ty Cổ phần TopCV Việt Nam.</p>
                                        <p><i class="fa fa-check text-success me-3"></i>Giúp doanh nghiệp giảm chi phí quản trị nhân sự</p>
                                        <p><i class="fa fa-check text-success me-3"></i> mang lại trải nghiệm hạnh phúc cho nhân viên</p>
                                        <p><i class="fa fa-check text-success me-3"></i>tối đa hiệu suất, gia tăng sự gắn kết và giữ chân nhân tài</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-pane-3">
                                <div class="row g-4">
                                    <div class="col-md-6" style="min-height: 416px;">
                                        <div class="position-relative h-100">
                                            <img class="position-absolute img-fluid w-100 h-100 rounded-3"
                                                src="{{ asset('VictoryWeb/img/guides.jpg') }}" style="object-fit: cover;"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="mb-3">Nền tảng đánh giá năng lực nhân sự hàng đầu Việt Nam</h3>
                                        <p class="mb-4">Chiêu mộ, đào tạo và phát triển đội ngũ nhân sự luôn là chủ đề cấp thiết đối với mọi mô hình doanh nghiệp trong mục tiêu phát triển bền vững.
                                             Với TestCenter.vn, chúng tôi mong muốn cung cấp cho doanh nghiệp Việt Nam công cụ đánh giá nhân sự tối ưu và toàn diện,
                                             giúp tiết kiệm thời gian và nâng cao chất lượng nhân sự.</p>
                                        <p><i class="fa fa-check text-success me-3"></i>Đơn giản & dễ sử dụng</p>
                                        <p><i class="fa fa-check text-success me-3"></i>Số hóa quy trình đánh giá nhân sự</p>
                                        <p><i class="fa fa-check text-success me-3"></i>Nâng cao hiệu quả đào tạo và phát triển nhân sự</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-pane-4">
                                <div class="row g-4">
                                    <div class="col-md-6" style="min-height: 416px;">
                                        <div class="position-relative h-100">
                                            <img class="position-absolute img-fluid w-100 h-100 rounded-3"
                                                src="{{ asset('VictoryWeb/img/shelter.jpg') }}"
                                                style="object-fit: cover;" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="mb-3">High-performance Hiring Solution utilizing AI </h3>
                                        <p class="mb-4">A pioneering breakthrough solution in applying artificial intelligence to recruitment management, 
                                            digitizing processes, optimizing manual work, evaluating, and recruiting talents.</p>
                                        <p><i class="fa fa-check text-success me-3"></i>Integrate with ERM, HRM to synchronize data</p>
                                        <p><i class="fa fa-check text-success me-3"></i>Connect to many recruitment websites</p>
                                        <p><i class="fa fa-check text-success me-3"></i>Applying AI technology minimizes recruitment work</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-pane-5">
                                <div class="row g-4">
                                    <div class="col-md-6" style="min-height: 416px;">
                                        <div class="position-relative h-100">
                                            <img class="position-absolute img-fluid w-100 h-100 rounded-3"
                                                src="{{ asset('VictoryWeb/img/hazards.jpg') }}"
                                                style="object-fit: cover;" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="mb-3">Vigilance Against the Elements</h3>
                                        <p class="mb-4">Understanding and respecting the hazards inherent in mountain
                                            environments are paramount for safe climbing. This includes navigating
                                            unpredictable weather, potential avalanches, and challenging terrain. Armed with
                                            the right knowledge and a respect for nature's power, climbers can mitigate
                                            risks and embrace the exhilarating experience of mountaineering with confidence.
                                        </p>
                                        <p><i class="fa fa-check text-success me-3"></i>Weather Awareness</p>
                                        <p><i class="fa fa-check text-success me-3"></i>Avalanche Safety</p>
                                        <p><i class="fa fa-check text-success me-3"></i>Terrain Navigation</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->

    </div>
@endsection



@section('script')
    
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

            $('.menu-home').addClass('active')
            // Testimonial carousel
            $(".testimonial-carousel").owlCarousel({

                center: true,


                loop: true,
                dots: false,

                margin: 25,
                autoplay: true,
                autoplayTimeout: 0,
                autoplaySpeed: 5000,

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


            $('.star-rating-result').each(function() {
                var $star_rating_result = $(this).find('.fa-star');

                var SetRatingStarResult = function() {
                    return $star_rating_result.each(function() {
                        var value = parseInt($star_rating_result.siblings(
                                'input.rating-value-result')
                            .val());

                        if (value >= parseInt($(this).data('rating'))) {
                            return $(this).removeClass('fa-regular').addClass('fa-solid');
                        } else {
                            return $(this).removeClass('fa-solid').addClass('fa-regular');
                        }
                    });
                };



                SetRatingStarResult();
            });
        })
    </script>
    
@endsection
