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
@endsection

@section('content')
    <div class="container mt-3 content-wrapper overflow-hidden">
        <!-- Wrapper for profile form container -->
        <h3>{{ $cv_template->name }}</h3>
        <div class="row p-0">
            <!-- Profile form container -->
            <form class="col-9 value-form" action="{{ url('cv-template/proccess-add') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4">
                                <label for="" class="form-label">
                                    <h3>Tên cv</h3>
                                </label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form fields -->
                {!! $cv_template->template !!}
                <div class="row">
                    <div class="col d-flex justify-content-end">
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <input type="hidden" name="cv_template_id" value="{{ $cv_template->id }}">
                        <button type="submit" id="saveButton" class="btn btn-primary"
                            onclick="return confirm('Are you sure you want to add this cv?')">Lưu</button>
                    </div>
                </div>
            </form>
            <div class="col-3 p-3">
                <!-- Color options -->
                <div class="color-options">
                    <div class="">
                        <h5>Background Color</h5>
                        <button class="btn btn-outline-secondary"
                            onclick="changeBackgroundColor('sidebar', 'white')">White</button>
                        <button class="btn btn-primary"
                            onclick="changeBackgroundColor('sidebar', 'lightblue')">Blue</button>
                        <button class="btn btn-success"
                            onclick="changeBackgroundColor('sidebar', 'lightgreen')">Green</button>
                    </div>
                    <div class="">
                        <h5>Text color</h5>
                        <button class="btn btn-outline-secondary" onclick="changeTextColor('sidebar', 'white')">White
                            Text</button>
                        <button class="btn btn-dark" onclick="changeTextColor('sidebar', 'black')">Black
                            Text</button>
                    </div>
                </div>
            </div>
        </div>
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
        // Đổi màu chữ, background của form cv
        function changeBackgroundColor(elementId, color) {
            document.getElementById(elementId).style.backgroundColor = color;
        }

        function changeTextColor(elementId, color) {
            document.getElementById(elementId).style.color = color;
        }

        function moveUp(button) {
            const section = button.closest('.form-section');
            const previousSection = section.previousElementSibling;
            if (previousSection && previousSection.classList.contains('form-section')) {
                section.parentNode.insertBefore(section, previousSection);
                updateButtonStates();
            }
        }

        function moveDown(button) {
            const section = button.closest('.form-section');
            const nextSection = section.nextElementSibling;
            if (nextSection && nextSection.classList.contains('form-section')) {
                section.parentNode.insertBefore(nextSection, section);
                updateButtonStates();
            }
        }

        function removeSection(button) {
            const section = button.closest('.form-section');
            section.parentNode.removeChild(section);
            updateButtonStates();
        }

        function updateButtonStates() {
            const sections = document.querySelectorAll('.form-section');
            sections.forEach((section, index) => {
                const upButton = section.querySelector('button[onclick="moveUp(this)"]');
                const downButton = section.querySelector('button[onclick="moveDown(this)"]');
                upButton.disabled = index === 0;
                downButton.disabled = index === sections.length - 1;
            });
        }

        document.addEventListener('DOMContentLoaded', updateButtonStates);

        // replace avatar ở trong form khi người dùng chọn
        function previewAvatar(event) {
            const input = event.target;
            const reader = new FileReader();
            reader.onload = function() {
                const dataURL = reader.result;
                const avatarPreview = document.getElementById('avatarPreview');
                avatarPreview.src = dataURL;
            };
            reader.readAsDataURL(input.files[0]);
        }

        // lăng nghe event download anh form cv
        document.getElementById('downloadBtn').addEventListener('click', function() {
            var formElement = document.querySelector('.profile-form');

            html2canvas(formElement).then(function(canvas) {
                // Lưu ảnh canvas về máy
                canvas.toBlob(function(blob) {
                    var link = document.createElement('a');
                    link.href = URL.createObjectURL(blob);
                    link.download = 'cv_form.png';
                    link.click();
                }, 'image/png');
            });
        });
    </script>

    <script>
        document.getElementById('saveButton').addEventListener('click', function(event) {
            // Ngăn chặn form gửi ngay lập tức
            event.preventDefault();

            // Lấy toàn bộ phần tử có class là "profile-form"
            var profileForm = document.querySelector('.profile-form');

            // Sử dụng html2canvas để chụp ảnh phần tử
            html2canvas(profileForm).then(function(canvas) {
                // Chuyển canvas thành dữ liệu Base64
                var imgData = canvas.toDataURL('image/png');

                // Chuyển đổi Base64 thành Blob
                function dataURLtoBlob(dataurl) {
                    var arr = dataurl.split(','),
                        mime = arr[0].match(/:(.*?);/)[1],
                        bstr = atob(arr[1]),
                        n = bstr.length,
                        u8arr = new Uint8Array(n);
                    while (n--) {
                        u8arr[n] = bstr.charCodeAt(n);
                    }
                    return new Blob([u8arr], {
                        type: mime
                    });
                }

                var blob = dataURLtoBlob(imgData);

                // Tạo input hidden type file
                var hiddenFileInput = document.createElement('input');
                hiddenFileInput.type = 'file';
                hiddenFileInput.name = 'cv_image';

                // Tạo một DataTransfer object để tạo tệp
                var dataTransfer = new DataTransfer();
                dataTransfer.items.add(new File([blob], "cv_image.png"));

                // Gán tệp vào input hidden
                hiddenFileInput.files = dataTransfer.files;

                // Thêm input file vào form hoặc nơi bạn muốn gửi dữ liệu
                profileForm.appendChild(hiddenFileInput);

                // Gửi form sau khi đã thêm tệp ảnh vào form
                document.querySelector('form').submit();
            });
        });
    </script>
@endsection
