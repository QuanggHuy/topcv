@extends('VictoryWeb.main-page.layout.mainLayout')

@section('head')
    <style>
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
            -webkit-line-clamp: 3;
            /* Số dòng tối đa bạn muốn hiển thị cho tin tức phụ*/
            -webkit-box-orient: vertical;
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

        .companies-title {
            background-color: hsl(0, 0%, 91%);

        }

        .companies-title img {
            border-radius: 10px 300px 300px 10px;
        }

        .searchBar {
            box-shadow: 0 0 45px rgba(240, 198, 9, 0.596);

        }

        .heart-icon1:hover {
            font-size: 30px;
            transition: 0.3s;
        }

        .heart-icon1 {

            font-size: 25px;
            color: rgb(255, 63, 63);
            text-shadow: rgb(80, 80, 80) 0.1px 0px 0px, rgb(80, 80, 80) 0.540302px 0.841471px 0px, rgb(80, 80, 80) -0.416147px 0.909297px 0px, rgb(80, 80, 80) -0.989992px 0.14112px 0px, rgb(80, 80, 80) -0.653644px -0.756802px 0px, rgb(80, 80, 80) 0.283662px -0.958924px 0px, rgb(80, 80, 80) 0.96017px -0.279416px 0px;
        }

        .testimonial-item {
            height: 350px;
        }

        .slide1 img {
            width: 100px;
            height: auto;
            object-fit: cover;
        }

        .slide2 img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .splide__slide {
            opacity: 0.6;
        }

        .splide__slide.is-active {
            opacity: 1;
            border: red
        }

        .iframe-rwd {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
        }

        .iframe-rwd iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
    {{--  --}}
    <style>
         .modal-backdrop.show {
            opacity: 0.5;
        }
        .modal-dialog {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .modal-content {
            margin: auto;
        }
        .cv-card {
            cursor: pointer;
        }
        .cv-card.selected {
            border: 2px solid #007bff;
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper overflow-hidden">
        <!-- About Satrt -->
        <div class="container-fluid  pt-2 d-flex flex-column align-items-center">
            <div class="text-center ">
                @if ($job->photo == null || $job->photo == '' || !File::exists(public_path('img/jobs/' . $job->id . '/' . $job->photo)))
                    <img src="{{ asset('/img/groups/unknown.png') }}" class="img-fluid  rounded-circle"
                        style="width:260px; height:260px" alt="">
                @else
                    <img src="{{ asset('/img/jobs/' . $job->id . '/' . $job->photo) }}" class="img-fluid  rounded-circle"
                        style="width:260px; height:260px" alt="">
                @endif

            </div>
        </div>
        <!-- About End -->
        <!-- About Satrt -->
        <div class="container-fluid py-3">
            <div id="aboutus" class="container">
                <div class="row g-5 align-items-center">

                    <div class="col-lg-8 wow  animate__animated animate__bounceInUp border-rounded">
                        <div class="row bg-white p-3 rounded">
                            <h5 class="">
                                {{ $job->title }}
                            </h5>
                            <div class="row d-flex justify-content-between mb-3">
                                <div class="col text-center">
                                    <i class="fa-solid fa-coins"></i>
                                    {{ $job->salary }}
                                </div>
                                <div class="col text-center">
                                    <i class="fa-solid fa-location-dot"></i>
                                    {!! $job->location !!}
                                </div>
                                <div class="col text-center">
                                    <i class="fa-solid fa-hourglass-half"></i>
                                    {{ $job->experience }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-9">
                                    <button class="btn btn-success" id="applyButton" style="width: 100%"><i
                                            class="fa-solid fa-paper-plane"></i> Ứng tuyển ngay</button>
                                </div>
                                <div class="col-3">
                                    <h1 class="mb-4">
                                        @if (session()->has('user'))
                                            @if ($jobsLikeList->contains('job_id', $job->id) == true)
                                                <i class="fa-solid heart-icon1 fa-heart">
                                                    <input type="hidden" class="job-id" value="{{ $job->id }}">
                                                </i>
                                            @else
                                                <i class="fa-regular heart-icon1 fa-heart">
                                                    <input type="hidden" class="job-id" value="{{ $job->id }}">
                                                </i>
                                            @endif
                                        @else
                                            <i class="fa-regular heart-icon1 fa-heart">
                                                <input type="hidden" class="job-id" value="{{ $job->id }}">
                                            </i>
                                        @endif
                                        Lưu tin
                                    </h1>
                                </div>
                            </div>
                            {{--  --}}
                            <div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="applyModalLabel">Vui lòng chọn Hồ Sơ CV</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="applyForm" action="{{ url('/jobs/apply/save') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="job_id" value="{{ $job->id }}">
                                                <input type="hidden" name="user_cv_id" id="selected_cv_id">
                                                @foreach ($user_cvs as $userCv)
                                                <div class="card mb-2 cv-card" data-cv-id="{{ $userCv->id }}">
                                                    <div class="row no-gutters">
                                                        <div class="col-lg-2 d-flex align-items-center">
                                                            @if ($userCv->image == null || $userCv->image == '' || !File::exists(public_path('img/imageCvs/' . $userCv->id . '/' . $userCv->image)))
                                                                <img src="{{ asset('/img/articles/unknown.png') }}" class="img-thumbnail" width="100%" height="100%">
                                                            @else
                                                                <img src="{{ asset('/img/imageCvs/' . $userCv->id . '/' . $userCv->image) }}" class="img-thumbnail" width="100%" height="100%">
                                                            @endif
                                                        </div>
                                                        <div class="col-lg-10">
                                                            <div class="card-body">
                                                                <h5 class="card-title"><a href="{{ url('cv-template/detail/' . $userCv->id) }}">{{ $userCv->name }}</a></h5>
                                                                <p class="card-text">Thời gian thêm: {{ \Carbon\Carbon::parse($userCv->created_at)->format('d/m/Y') }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                <button type="submit" class="btn btn-primary mt-3">Gửi</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--  --}}

                        </div>
                        <div class="row bg-white p-3 rounded mt-3">
                            <h3>
                                Chi tiết nội dung
                            </h3>
                            <div>
                                {!! html_entity_decode($job->description) !!}
                            </div>
                        </div>
                        <div class="bg-primary py-3 px-5 rounded-pill  d-flex " style="width:fit-content">
                            <span class="fw-bold fs-5 text-dark">Đánh giá: &nbsp;</span>

                            <div class="star-rating ">
                                <span class="fa-regular fa-star  " data-rating="1"></span>
                                <span class="fa-regular fa-star " data-rating="2"></span>
                                <span class="fa-regular fa-star " data-rating="3"></span>
                                <span class="fa-regular fa-star " data-rating="4"></span>
                                <span class="fa-regular fa-star " data-rating="5"></span>
                                @if (session()->has('user'))
                                    @if ($score != null)
                                        <input type="hidden" name="whatever1" class="rating-value"
                                            value="{{ $score->rate_score }}">
                                    @else
                                        <input type="hidden" name="whatever1" class="rating-value" value="0">
                                    @endif
                                @else
                                    <input type="hidden" name="whatever1" class="rating-value" value="0">
                                @endif
                            </div>
                            <input type="hidden" id="job-id" value="{{ $job->id }}">
                        </div>
                    </div>
                    <div class="col-lg-4 g-4 border border-5 border-primary roundedwow  animate__animated animate__lightSpeedInRight"
                        data-wow-delay="0.1s">
                        <h1 class="display-5 mb-4 fs-3">Thông tin liên hệ</h1>
                        <p class="mb-4">{!! html_entity_decode($job->contact) !!}</p>
                        <div class="row g-4  animate__animated  animate__fadeInUp">
                            <div class="menu-item">
                                <div class="iframe-rwd rounded">
                                    {!! html_entity_decode($job->api) !!}
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Team Start -->
        <div class="container-fluid  animate__animated animate__bounceInUp     rounded-pill border  border-primary py-2 mb-2  d-flex flex-column align-items-center justify-content-between overflow-hidden  "
            style="width:90%;    box-shadow: 0 0 45px rgba(95, 101, 4, 0.701);
                ">

            <div class="container " style="width:65%">
                @if ($companiesList->isEmpty())
                    <span class="fs-6 fw-bold ">Thông tin về {{ $job->name }}'s kinh nghiệm vẫn còn đang được cập nhật</span>
                @else
                    <div class="d-flex flex-column align-items-center  pb-5 wow animate__animated animate__fadeIn "
                        data-wow-delay=".1s">
                        <small
                            class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Company</small>
                        <h1>Các công ty liên quan</h1>
                    </div>
                    <div class="owl-carousel  testimonial-carousel wow animate__animated animate__fadeIn "
                        data-wow-delay=".2s">

                        @foreach ($companiesList as $company)
                            <div class="rounded team-item wow  animate__animated animate__bounceInRight "
                                data-wow-delay="0.1s">
                                <div class="team-content rounded">
                                    <div class="team-img-icon">
                                        <div class="team-img rounded  overflow-hidden">
                                            <img src="{{ asset('/') }}img/companies/{{ $company->id }}/{{ $company->photo_main }}"
                                                class="img-fluid w-100 h-auto rounded-bottom" alt="">
                                        </div>
                                        <div class="team-name text-center py-3">
                                            <h4 class="fs-6">{{ $company->name }}</h4>
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
                @endif
            </div>

        </div>



        <!-- Team End -->



        <!-- Testimonial Start -->


        <!-- Menu Start -->
        <div class="container-fluid menu bg-white py-6 my-3">
            <div class="container">
                <div class="card card-widget ">
                    <div class="card-header bg-light">
                        <div class="user-block ">

                            <h1 class="display-5 ">Bình luận</h1>
                        </div>
                        <!-- /.user-block -->

                    </div>
                    <!-- /.card-header -->

                    <div class="card-footer card-comments px-1 d-flex flex-column-reverse"
                        style="max-height: 800px;overflow:auto">

                        @foreach ($commentList as $comment)
                            <div class="card-comment my-3 d-flex flex-column align-items-end">
                                <div class="rounded  bg-primary px-1 pt-1 w-100">
                                    <span class="username d-flex align-items-center justify-content-between w-100">
                                        <!-- User image -->
                                        <span class="username text-dark fw-bold d-flex align-items-center">
                                            @if (
                                                $comment->photo == null ||
                                                    $comment->photo == '' ||
                                                    !File::exists(public_path('img/accounts/' . $comment->id . '/' . $comment->photo)))
                                                <img class="img-thumbnail rounded-circle " height="40px" width="40px"
                                                    src="{{ asset('/img/accounts/unknown.png') }}" alt="User Image">
                                            @else
                                                <img class="img-thumbnail rounded-circle " height="40px" width="40px"
                                                    src="{{ asset('/img/accounts/' . $comment->id . '/' . $comment->photo) }}"
                                                    alt="User Image">
                                            @endif

                                            &nbsp;
                                            {{ $comment->fullname }}
                                        </span>

                                        <small
                                            class="text-dark">{{ \Carbon\Carbon::parse($comment->created)->format('H:i d/m/Y') }}</small>
                                    </span><!-- /.username -->
                                    <div class="comment-text text-light ps-5 fst-italic">

                                        - {{ $comment->comment_text }}
                                    </div>
                                    <!-- /.comment-text -->
                                </div>


                            </div>
                        @endforeach


                    </div>
                    <!-- /.card-footer -->
                    <div class="card-footer">
                        {{-- <form action="{{ url('') }}" method="post" class="d-flex align-items-center"> --}}
                        <div class="d-flex align-items-center">
                            <input type="hidden" id="comment-job-id" value="{{ $job->id }}">
                            @if (session()->has('user'))
                                @php
                                    $account = session()->get('user');
                                @endphp
                                @if (
                                    $account->photo == null ||
                                        $account->photo == '' ||
                                        !File::exists(public_path('img/accounts/' . $account->id . '/' . $account->photo)))
                                    <img class="img-thumbnail rounded-circle " height="40px" width="40px"
                                        src="{{ asset('/img/accounts/unknown.png') }}" alt="User Image">
                                @else
                                    <img class="img-thumbnail rounded-circle " height="40px" width="40px"
                                        src="{{ asset('/img/accounts/' . $account->id . '/' . $account->photo) }}"
                                        alt="User Image">
                                @endif
                            @else
                                <img class="img-thumbnail rounded-circle " height="40px" width="40px"
                                    src="{{ asset('/img/accounts/unknown.png') }}" class="" alt="User Image">
                            @endif

                            <!-- .img-push is used to add margin to elements next to floating images -->
                            <div class="img-push w-75 px-1">
                                <input type="text" class="form-control form-control-sm" id="comment-text"
                                    name="comment-text" placeholder="Press enter to post comment">
                            </div>
                            <button type="button"
                                class="d-flex align-items-center justify-content-center rouded btn btn-secondary  text-light "
                                id="submit-comment" style="width:60px; height:30px">
                                <i class="fa-solid fa-location-arrow"></i>
                            </button>
                        </div>

                        {{-- </form> --}}
                    </div>
                    <!-- /.card-footer -->
                </div>

            </div>
        </div>
        <!-- Menu End -->






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
            $('.menu-jobs').addClass('active')
            $('.dropdown-button').on('click', function() {

                if ($('.nav-item').hasClass('menu-open')) {
                    $('.dropdown-icon').removeClass('fa-chevron-down');
                    $('.dropdown-icon').addClass('fa-angle-right');
                } else {
                    $('.dropdown-icon').removeClass('fa-angle-right');
                    $('.dropdown-icon').addClass('fa-chevron-down');
                }
            })

            $('.heart-icon1').on('mouseleave', function() {
                $(this).css({
                    "transition": "0.3s"
                }, {
                    "font-size": "25px"
                });
            });
            $('.heart-icon1').on('click', function() {

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

                            url: "{{ route('addJobs') }}",
                            data: {
                                jobID: $(this).find('.job-id').val(),
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
                            url: "{{ route('addJobs') }}",
                            data: {
                                jobID: $(this).find('.job-id').val(),
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

            $('#submit-comment').on('click', function(event) {
                if (!{!! json_encode(session()->has('user')) !!}) {
                    event.preventDefault();
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: "btn btn-success ms-1",
                            cancelButton: "btn btn-danger me-1"
                        },
                        buttonsStyling: false
                    });
                    swalWithBootstrapButtons.fire({
                        title: "Login required !",
                        text: "You need to log in to be able comment !",
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
                    var comment = $('#comment-text').val().trim();
                    if (comment === '') {
                        event.preventDefault();
                    } else {
                        $.ajax({
                            type: 'GET',
                            data: {
                                type: 'job',
                                comment_text: comment,
                                id: $('#comment-job-id').val()

                            },
                            url: "{{ route('comment') }}",
                            success: function(data) {

                                location.reload();

                            },
                            error: function(xhr, status, error) {
                                alert(xhr.responseText);
                            }


                        });
                    }
                }

            });

            var $star_rating = $('.star-rating .fa-star');

            var SetRatingStar = function() {
                return $star_rating.each(function() {
                    var value = parseInt($star_rating.siblings('input.rating-value').val());

                    if (value >= parseInt($(this).data('rating'))) {
                        return $(this).removeClass('fa-regular').addClass('fa-solid');
                    } else {
                        return $(this).removeClass('fa-solid').addClass('fa-regular');
                    }
                });
            };

            $star_rating.on('click', function() {
                $star_rating.siblings('input.rating-value').val($(this).data('rating'));


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
                        text: "You need to log in to be able to rate this organization !",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Yes, let me log in !",
                        cancelButtonText: "Close",
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ url('/login') }}";
                        }
                    });

                } else {
                    var score = $(this).data('rating');
                    $.ajax({
                        type: 'GET',

                        url: "{{ route('rateJobs') }}",
                        data: {
                            jobID: $('#job-id').val(),
                            score: score
                        },
                        success: function(data) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Thank you for your feedback !'
                            });

                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Action Failed !'
                            });
                        }
                    });

                    return SetRatingStar();
                }
            });

            SetRatingStar();




            var $star_rating_result = $('.star-rating-result .fa-star');

            var SetRatingStarResult = function() {
                return $star_rating_result.each(function() {
                    var value = parseInt($star_rating_result.siblings('input.rating-value-result')
                        .val());

                    if (value >= parseInt($(this).data('rating'))) {
                        return $(this).removeClass('fa-regular').addClass('fa-solid');
                    } else {
                        return $(this).removeClass('fa-solid').addClass('fa-regular');
                    }
                });
            };



            SetRatingStarResult();



        })
    </script>
    {{--  --}}
    <script>
        $(document).ready(function() {
            $('#applyButton').click(function() {
                $('#applyModal').modal('show');
            });

            $('.cv-card').click(function() {
                $('.cv-card').removeClass('selected');
                $(this).addClass('selected');
                $('#selected_cv_id').val($(this).data('cv-id'));
            });

            $('#applyForm').submit(function(e) {
                if (!$('#selected_cv_id').val()) {
                    e.preventDefault();
                    alert('Vui lòng chọn một hồ sơ CV.');
                }
            });
        });
    </script>
@endsection
