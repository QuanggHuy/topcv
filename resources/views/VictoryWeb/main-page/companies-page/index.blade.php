@extends('VictoryWeb.main-page.layout.mainLayout')

@section('head')
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
            -webkit-line-clamp: 3;
            /* Số dòng tối đa bạn muốn hiển thị cho tin tức chính*/
            -webkit-box-orient: vertical;
        }

        .truncate-text img {
            display: none;
        }

        .truncate-text1 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
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

        .searchBar {
            box-shadow: 0 0 45px rgba(240, 198, 9, 0.596);

        }


        .testimonial-item {
            height: 350px;
        }

        svg {
            width: 50px;
            /* Điều chỉnh chiều rộng của SVG */
            height: 50px;
            /* Điều chỉnh chiều cao của SVG */
        }

        .link-list nav {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .link-list .flex-1 {
            display: none;
        }

        .link-list p {
            display: none;
        }


        /*mon custom */
        /*khi màn hình lớn hơn 980px thì kích hoạt relative */
        @media (min-width: 980px) {
            #custom {
                position: relative;
                f
            }
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper overflow-hidden">
        <!-- About Start -->
        <div class="container my-3 px-0 overflow-hidden">
            <div class="row about-text py-2 wow fadeIn align-items-center" data-wow-delay="0.5s">
                <div class="d-flex flex-column align-items-center justify-content-around">
                    <div class="row section-title text-start">
                        <h1 class="display-5 mb-4 fs-3 text-center px-2">"Hãy để TopCV Việt Nam trở thành một trải nghiệm hạnh phúc trên hành trình sự nghiệp của bạn</h1>
                    </div>
                    <div class="row mb-4 pb-2">
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle d-flex flex-shrink-0 align-items-center justify-content-center bg-white"
                                    style="width: 60px; height: 60px;">
                                    <i class=" fa fa-solid fa-mountain-sun fa-2x text-primary"></i>
                                    {{-- <i class=" fa-users "></i> --}}
                                </div>
                                <div class="ms-3">
                                    <h2 class="text-primary mb-1">{{ $companiesCount }}</h2>
                                    <p class="fw-medium mb-0">Công ty</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.3s">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle d-flex flex-shrink-0 align-items-center justify-content-center bg-white"
                                    style="width: 60px; height: 60px;">

                                    <i class="fa-regular fa-heart  fa-2x text-primary"></i>
                                </div>
                                <div class="ms-3">
                                    <h2 class="text-primary mb-1">{{ $companiesAlllike }}</h2>
                                    <p class="fw-medium mb-0">Yêu thích</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <a href="#company-list" class="scrollButton btn btn-primary text-light py-3 px-5">Khám phá thêm</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-betwween">
                <div id="carouselExampleControls" class="carousel slide col" data-bs-ride="carousel">
                    <div class="carousel-inner rounded">
                        <div class="carousel-item active">
                            <img src="https://static.topcv.vn/img/T1%201100x220.png" width="100%" height="200px"
                                class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://static.topcv.vn/img/CVO_T1_1100x220.png" width="100%" height="200px"
                                class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://static.topcv.vn/img/wulKjY7b7tqWMnmRevQEM1VoiSLCfh3J_1710413484____4a70cafd01769805bf2f3939b325bacf.jpg"
                                width="100%" height="200px" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- About Satrt -->
        <div class="container-fluid  ">

            <div id="company-list" class="row g-5 align-items-top justify-content-around">
                <div class="col-lg-3  animate__animated animate__fadeInLeft overflow-hidden" data-wow-delay="0.1s">

                    <!-- mon edit   -->
                    <nav class="searchBar mt-2 border border-5 border-primary w-75 rounded " id="custom"
                        style="min-height: 600px">
                        <ul class="nav nav-pills nav-sidebar flex-column mt-1 w-100 " id="scroll" data-widget="treeview"
                            role="menu" data-accordion="false">
                            <li class="nav-item overflow-hidden menu-open  ">
                                <a href="#"
                                    class="click border border-2 border-dark mx-2 dropdown-button nav-link rounded-end bg-warning py-2 d-flex align-items-center justify-content-center">
                                    <span class="mx-2 text-light">
                                        <i class="fa-solid fa-globe"></i>
                                        <span class="hidden-lg">Locations</span>
                                        <i class=" dropdown-icon fa-solid fa-chevron-down"></i>
                                    </span>


                                </a>
                                <ul class="nav nav-treeview btn-group-vertical locationList "
                                    style="height: 550px; overflow-y:auto; overflow-x:hidden">

                                    @foreach ($countryList as $country)
                                        <li class="nav-item px-2 py-1" role="group"
                                            aria-label="Basic checkbox toggle button group">


                                            <input type="checkbox" class="btn-check w-100 location-search"
                                                id="location{{ $country->id }}" name='countryFilter[]' autocomplete="off"
                                                value="{{ $country->id }}">
                                            <label class="btn btn-outline-primary w-100 "
                                                for="location{{ $country->id }}">{{ $country->name }}</label>

                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </nav>

                </div>
                <div class="col-lg-9  animate__animated animate__fadeInUp">
                    <div class="container mt-3">
                        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                            <small
                                class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Công ty</small>
                            <h1 class="display-5 mb-5">Hãy tìm cho mình một công ty</h1>
                        </div>
                        <div class="row gx-4 justify-content-center company-list">
                            @foreach ($companiesList as $company)
                                {{-- <div class="col-md-4 col-lg-4 wow bounceInUp" data-wow-delay="0.1s">
                                    <div class="blog-item">
                                        <div class="overflow-hidden rounded">
                                            <img src="{{ asset('/') }}img/mountains/{{ $mountain->id }}/{{ $mountain->photo_main }}"
                                                class="img-fluid w-100" alt="">
                                        </div>
                                        <div class="blog-content d-flex rounded bg-light">
                                            <div class="text-dark bg-primary rounded-start overflow-auto">
                                            </div>
                                            <a href="{{ url('/mountains/detail?id=' . $mountain->id) }}"
                                                class="h5 lh-base my-auto h-100 p-3 fs-5">{{ $mountain->name }}</a>
                                        </div>
                                        @if (session()->has('user'))
                                            @if ($companiesLikeList->contains('mountain_id', $mountain->id) == true)
                                                <i class="fa-solid heart-icon fa-heart">
                                                    <input type="hidden" class="mountain-id"
                                                        value="{{ $mountain->id }}">
                                                </i>
                                            @else
                                                <i class="fa-regular heart-icon fa-heart">
                                                    <input type="hidden" class="mountain-id"
                                                        value="{{ $mountain->id }}">
                                                </i>
                                            @endif
                                        @else
                                            <i class="fa-regular heart-icon fa-heart">
                                                <input type="hidden" class="mountain-id" value="{{ $mountain->id }}">
                                            </i>
                                        @endif
                                    </div>
                                </div> --}}
                                <div class="col-md-4 col-lg-4 wow bounceInUp" data-wow-delay="0.1s">
                                    <div class="blog-item">
                                        <a href="{{ url('/companies/detail?id=' . $company->id) }}">
                                            <header class="container-fluid p-0">
                                                <img class="rounded w-100"
                                                    src="{{ asset('/') }}img/companies/{{ $company->id }}/{{ $company->photo_background }}"
                                                    alt="">
                                            </header>
                                            <section class="bg-white border-bottom pb-4">
                                                <div class="container container-lg">
                                                    <div class="d-flex align-items-start">
                                                        <div class="rounded-circle border d-flex justify-content-center align-items-center bg-white"
                                                            style="min-width: 100px; height: 100px; margin-top: -45px;">
                                                            <img class="" style="width: 80px; height: auto;"
                                                                src="{{ asset('/') }}img/companies/{{ $company->id }}/{{ $company->photo_main }}"
                                                                alt="">
                                                        </div>
                                                        <b class="fw-bold">
                                                            {{ $company->name }}
                                                        </b>
                                                    </div>
                                                </div>
                                            </section>
                                        </a>
                                        @if (session()->has('user'))
                                            @if ($companiesLikeList->contains('company_id', $company->id) == true)
                                                <i class="fa-solid heart-icon fa-heart">
                                                    <input type="hidden" class="company-id"
                                                        value="{{ $company->id }}">
                                                </i>
                                            @else
                                                <i class="fa-regular heart-icon fa-heart">
                                                    <input type="hidden" class="company-id"
                                                        value="{{ $company->id }}">
                                                </i>
                                            @endif
                                        @else
                                            <i class="fa-regular heart-icon fa-heart">
                                                <input type="hidden" class="company-id" value="{{ $company->id }}">
                                            </i>
                                        @endif
                                    </div>
                                </div>
                            @endforeach


                        </div>
                        <div class="link-list">
                            {{ $companiesList->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- About End -->

        <!-- Testimonial Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="text-center">
                    <small
                        class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Tin tức</small>
                    <h1 class="mb-5">Các tin mà bạn có thể quan tâm</h1>
                </div>
                <div class="owl-carousel testimonial-carousel position-relative">
                    @foreach ($articleList as $article)
                        <div class="testimonial-item text-center rounded wow  animate__animated animate__bounceInRight h-100"
                            data-wow-delay="0.1s">

                            @if (
                                $article->photo == null ||
                                    $article->photo == '' ||
                                    !File::exists(public_path('img/articles/' . $article->id . '/' . $article->photo)))
                                <img class="bg-light rounded p-0  p-2 mx-auto "
                                    src="{{ asset('/img/articles/unknown.png') }}" style="width: 100%; height: 200px">
                            @else
                                <img class="bg-light rounded p-0  p-2 mx-auto mb-1"
                                    src="{{ asset('/img/articles/' . $article->id . '/' . $article->photo) }}"
                                    style="width: 100%; height: 200px">
                            @endif


                            <div class="testimonial-text bg-light text-center p-4">
                                <a href="{{ url('/blogs/detail?id=' . $article->id) }}">
                                    <h6 class="mb-0 truncate-text1">{{ $article->name }}</h6>
                                </a>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
        <!-- Testimonial End -->


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
            $('.dropdown-button').click();


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
            $('.menu-companies').addClass('active')
            $('.dropdown-button').on('click', function() {

                if ($('.nav-item').hasClass('menu-open')) {
                    $('.dropdown-icon').removeClass('fa-chevron-down');
                    $('.dropdown-icon').addClass('fa-angle-right');
                } else {
                    $('.dropdown-icon').removeClass('fa-angle-right');
                    $('.dropdown-icon').addClass('fa-chevron-down');
                }
            })

            $('ul.locationList').each(function() {
                var $ul = $(this),
                    $lis = $ul.find('li:gt(7)'),
                    isExpanded = $ul.hasClass('expanded');
                $lis[isExpanded ? 'show' : 'hide']();

                if ($lis.length > 0) {
                    $ul
                        .append($('<a class="showmore "><li class="expand mx-3 fw-bold text-dark">' + (
                                isExpanded ? '  Show Less' : '  Show More') + '</li></a>')
                            .click(function(event) {
                                var isExpanded = $ul.hasClass('expanded');
                                event.preventDefault();
                                var html =
                                    '<a class="showmore "><li class="expand mx-3 fw-bold text-dark">' +
                                    (isExpanded ? '  Show Less' : '  Show More') + '</li></a>'
                                $(this).html(isExpanded ?
                                    '<a class="showmore "><li class="expand mx-3 fw-bold text-dark">' +
                                    'Show More' + '</li></a>' :
                                    '<a class="showmore "><li class="expand mx-3 fw-bold text-dark">' +
                                    'Show Less' + '</li></a>');
                                $ul.toggleClass('expanded');
                                $lis.toggle();
                            }));
                }
            });
            $('.heart-icon').on('mouseleave', function() {
                $(this).css({
                    "transition": "0.3s"
                }, {
                    "font-size": "40px"
                });
            });
            $('.heart-icon').on('click', function() {

                if (!{!! json_encode(session()->has('user')) !!}) {

                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: "btn btn-success ms-1",
                            cancelButton: "btn btn-danger me-1"
                        },
                        buttonsStyling: false
                    });
                    swalWithBootstrapButtons.fire({
                        title: "Login required !",
                        text: "You need to log in to be able to add items to your favorites list !",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Yes, let me log in ",
                        cancelButtonText: "Close",
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ url('/login') }}";
                        }
                    });


                } else {

                    if ($(this).hasClass('fa-regular')) {

                        $.ajax({
                            type: 'GET',

                            url: "{{ route('addCompanies') }}",
                            data: {
                                companyID: $(this).find('.company-id').val(),
                                action: 'add'
                            },
                            success: function(data) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Added to favorite list',
                                    text: 'View your list in account detail'
                                });

                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Action Failed !'
                                });
                            }
                        })
                        $(this).removeClass('fa-regular')
                        $(this).addClass('fa-solid')

                    } else {
                        $.ajax({
                            type: 'GET',
                            url: "{{ route('addCompanies') }}",
                            data: {
                                companyID: $(this).find('.company-id').val(),
                                action: 'remove'
                            },
                            success: function(data) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Removed from favorite list',
                                    text: 'View your list in account detail'
                                });

                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Action Failed !'
                                });
                            }
                        })
                        $(this).removeClass('fa-solid');
                        $(this).addClass('fa-regular');

                    }
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
            /////////////////////////////////////
            $('.location-search').change(function() {

                var checkedLocations = [];
                $('.location-search:checked').each(function() {
                    checkedLocations.push($(this).val());

                });
                //alert(checkedLocations)
                // Gửi mảng checkedLocations qua Ajax
                $.ajax({
                    type: 'GET',
                    url: "{{ route('searchCompanies') }}",
                    data: {
                        checkedLocations: checkedLocations
                    },
                    success: function(data) {
                        $('.company-list').empty();

                        // Duyệt qua mảng companiesList và tạo HTML tương ứng
                        $.each(data.companiesList, function(index, company) {
                            var html = '';
                            html += '<div class="col-md-4 col-lg-4 wow bounceInUp" data-wow-delay="0.1s">';
                            html += '   <div class="blog-item">';
                            html += '       <a href="{{ url('/companies/detail') }}?id=' + company.id + '">';
                            html += '           <header class="container-fluid p-0">';
                            html += '               <img class="rounded w-100" src="/img/companies/' + company.id + '/' + company.photo_background +'" alt="">';
                            html += '           </header>';
                            html += '           <section class="bg-white border-bottom pb-4">';
                            html += '               <div class="container container-lg">';
                            html += '                   <div class="d-flex align-items-start">';
                            html +='                        <div class="rounded-circle border d-flex justify-content-center align-items-center bg-white" style="min-width: 100px; height: 100px; margin-top: -45px;">';
                            html += '                           <img class="" style="width: 80px; height: auto;" src="/img/companies/' + company.id + '/' + company.photo_main +'" alt="">';
                            html += '                       </div>';
                            html += '                       <b href="/companies/detail?id=' + company.id + '" class="fw-bold">' + company.name + '</b>';
                            html += '                   </div>';
                            html += '               </div>';
                            html += '           </section>';
                            html += '       </a>';
                            var companiesLikeList = data.companiesLikeList

                            if ({!! json_encode(session()->has('user')) !!}) {

                                var check = false;
                                companiesLikeList.every(element => {
                                    if (element.company_id === company.id) {
                                        // check=true;
                                        // break;
                                        //alert('true');
                                        html +='        <i class="fa-solid heart-icon fa-heart">  <input type="hidden" class="company-id" value="' +
                                            company.id + '">    </i>    ';
                                        check = true;
                                        return false;
                                    }
                                    return true;
                                });
                                if (check == false) {
                                    html +=
                                        '        <i class="fa-regular heart-icon fa-heart"> <input type="hidden" class="company-id" value="' +
                                        company.id + '">    </i> ';

                                }

                            } else {
                                html +=
                                    '        <i class="fa-regular heart-icon fa-heart"> <input type="hidden" class="company-id" value="' +
                                    company.id + '">    </i> ';
                            }
                            html +=
                                '            <input type="hidden" class="company-id" value="' +
                                company.id + '">';
                            html += '        </i>';
                            html += '    </div>';
                            html += '</div>';


                            // Thêm HTML vào .company-list
                            $('.company-list').append(html);


                        });
                        setTimeout(function() {
                            $('.heart-icon').on('mouseleave', function() {
                                $(this).css({
                                    "transition": "0.3s"
                                }, {
                                    "font-size": "40px"
                                });
                            });
                            $('.heart-icon').on('click', function() {

                                if (!{!! json_encode(session()->has('user')) !!}) {

                                    const swalWithBootstrapButtons = Swal
                                        .mixin({
                                            customClass: {
                                                confirmButton: "btn btn-success ms-1",
                                                cancelButton: "btn btn-danger me-1"
                                            },
                                            buttonsStyling: false
                                        });
                                    swalWithBootstrapButtons.fire({
                                        title: "Login required !",
                                        text: "You need to log in to be able to add items to your favorites list !",
                                        icon: "warning",
                                        showCancelButton: true,
                                        confirmButtonText: "Yes, let me log in ",
                                        cancelButtonText: "Close",
                                        reverseButtons: true
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href =
                                                "{{ url('/login') }}";
                                        }
                                    });


                                } else {

                                    if ($(this).hasClass('fa-regular')) {

                                        $.ajax({
                                            type: 'GET',

                                            url: "{{ route('addCompanies') }}",
                                            data: {
                                                companyID: $(this)
                                                    .find(
                                                        '.company-id')
                                                    .val(),
                                                action: 'add'
                                            },
                                            success: function(data) {
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: 'Added to favorite list',
                                                    text: 'View your list in account detail'
                                                });

                                            },
                                            error: function(xhr, status,
                                                error) {
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Action Failed !'
                                                });
                                            }
                                        })
                                        $(this).removeClass('fa-regular')
                                        $(this).addClass('fa-solid')

                                    } else {
                                        $.ajax({
                                            type: 'GET',
                                            url: "{{ route('addCompanies') }}",
                                            data: {
                                                companyID: $(this)
                                                    .find(
                                                        '.company-id')
                                                    .val(),
                                                action: 'remove'
                                            },
                                            success: function(data) {
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: 'Removed from favorite list',
                                                    text: 'View your list in account detail'
                                                });

                                            },
                                            error: function(xhr, status,
                                                error) {
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Action Failed !'
                                                });
                                            }
                                        })
                                        $(this).removeClass('fa-solid');
                                        $(this).addClass('fa-regular');

                                    }
                                }

                            });
                        }, 40);


                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Action Failed !'
                        });
                    }

                });
            });

        })
    </script>
    // <!--mon-->

    <script>
        $(document).ready(function() {
            var $window = $(window); //có thể thay bằng thẻ div cố định đầu trang
            var $scroll = $("#scroll");
            var $click = $(".click");
            var $parent = $scroll.parent();
            var originalTop = $scroll.offset().top - $parent.offset().top;
            var movementStart = 75;

            function onWindowScroll() {
                var windowTop = $window.scrollTop();
                var parentOffsetTop = $parent.offset().top;
                var parentBottom = parentOffsetTop + $parent.height();
                var scrollHeight = $scroll.height();
                var maxTop = parentBottom - parentOffsetTop - scrollHeight;

                if (windowTop + movementStart > parentOffsetTop - originalTop) {
                    var newTop = windowTop + movementStart - parentOffsetTop + originalTop;
                    newTop = newTop > maxTop ? maxTop : newTop;
                    $scroll.css({
                        position: 'absolute',
                        top: newTop
                    });
                } else {
                    $scroll.css({
                        position: 'absolute',
                        top: originalTop
                    });
                }
            }

            function onLinkClick() {
                var scrollDistance = 1; // độ lớn cuộn trang 1px
                $('html, body').animate({
                    scrollTop: $window.scrollTop() - scrollDistance
                }, 600);
            }

            function checkAndSetup() {
                if ($(window).width() > 980) {
                    $window.on('scroll', onWindowScroll);
                    $click.on('click', onLinkClick);
                } else {
                    $window.off('scroll', onWindowScroll);
                    $click.off('click', onLinkClick);
                    // Reset $scroll to default state if needed
                    $scroll.css({
                        position: '',
                        top: ''
                    });
                }
            }

            // Initial check
            checkAndSetup();

            // Check on window resize
            $window.resize(checkAndSetup);
        });
    </script>
@endsection
