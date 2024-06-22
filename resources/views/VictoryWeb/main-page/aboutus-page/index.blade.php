@extends('VictoryWeb.main-page.layout.mainLayout')

@section('head')
    <style>
        .container-custom {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection

@section('content')
<div class="content-wrapper overflow-hidden">
    <div class="container-fluid mt-3 blog ">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small
                class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">About
                Us</small>
            <h1 class="display-5 mb-3 ">Chúng tôi là TopCV</h1>
            <h6 class="text-center mb-5">Hệ sinh thái HR Tech hàng đầu Việt Nam</h6>
        </div>
        <div class="container">

            <section class="pt-0">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 text-md-start text-center py-6">
                            <h1 class="mb-4 fs-9 fw-bold text-primary">Về chúng tôi </h1>
                            <p class="mb-6 lead text-secondary">Từ khởi nguyên thay đổi mọi chiếc CV đến nền tảng công nghệ tuyển dụng hàng đầu Việt Nam, sau 10 năm nghiên cứu,
                                 hình thành và phát triển, với hướng đi rõ ràng, giải đúng bài toán tuyển dụng đang “nhức nhối” của hầu hết doanh nghiệp Việt Nam trên hành trình chuyển đổi số,
                                TopCV Việt Nam nhanh chóng vươn mình trở thành công ty hàng đầu trong lĩnh vực HR Tech với mức tăng trưởng 300% mỗi năm.</p><br>
                            <p class="mb-6 lead text-secondary">Khởi đầu và gia nhập vào thị trường tuyển dụng Việt Nam vào những năm 2014 với một bài toán sơ khai trong thị trường tuyển dụng, 
                                mục tiêu của TopCV Việt Nam khi đó đơn giản là sử dụng công nghệ nhằm mang đến một nền tảng toàn diện,
                                 giúp ứng viên tiếp cận dễ dàng hơn với nhiều cơ hội việc làm.</p>
                        </div>
                        <div class="col-md-6 text-end"><img class="pt-7 pt-md-0 img-fluid"
                                src="{{asset('/')}}VictoryWeb/img/aboutus/topcvpic1.jpg" alt="" /></div>
                    </div>
                </div>
            </section>


            <section class="pt-7">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 text-end"><img class="pt-7 pt-md-0 img-fluid"
                                src="{{asset('/')}}VictoryWeb/img/aboutus/topcvpic2.webp" alt="" /></div>
                        <div class="col-md-6 text-md-start text-center py-6">
                            <h1 class="mb-4 fs-9 fw-bold text-primary">Câu chuyện của TopCV Việt Nam </h1>
                            <p class="mb-6 lead text-secondary">Trong suốt hành trình 10 năm nghiên cứu, hình thành và phát triển, chúng tôi tin rằng,
                                 việc kết nối đúng ứng viên với việc làm phù hợp là chưa đủ, mà đích đến phải là kết nối thành công. Với niềm tin vào sứ mệnh đó,
                                  TopCV Việt Nam đã không ngừng đầu tư vào việc nghiên cứu & phát triển năng lực công nghệ lõi,
                                 đặc biệt là Trí tuệ nhân tạo (AI) và Recruitment Marketing mang đến các giải pháp toàn diện giúp doanh nghiệp giải quyết đồng thời tất cả các bài toán xoay quanh vấn đề tuyển dụng.</p><br>
                            <p class="mb-6 lead text-secondary">Từ việc xây dựng thương hiệu nhà tuyển dụng (Employer Branding),
                                 hỗ trợ thiết lập và hoàn thiện quy trình phỏng vấn tuyển dụng của doanh nghiệp, 
                                 đánh giá và đào tạo nhân sự theo tiêu chuẩn của các tập đoàn lớn thông qua Nền tảng thiết lập và đánh giá năng lực nhân viên TestCenter.vn…,
                                 đến việc tạo nguồn hồ sơ, sàng lọc cho đến đánh giá ứng viên và đo lường hiệu quả.</p>
                        </div>
                    </div>
                </div>
            </section>


            <section class="pt-7">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 text-md-start text-center py-6">
                            <h1 class="mb-4 fs-9 fw-bold text-primary">Nghĩ chuẩn, nói thật,
làm tới</h1>
                            <p class="mb-6 lead text-secondary">Ở TopCV Việt Nam, chúng tôi đề cao sự chính trực trong mọi hoạt động; cam kết,
                                 chịu trách nhiệm với thông tin đưa ra không chỉ đối với nhân sự trong tổ chức mà cả với khách hàng và cộng đồng.
                                 Đây là nền móng vững chãi giúp TopCV Việt Nam tạo dựng niềm tin và uy tín trong suốt những năm qua.</p><br>
                            <p class="mb-6 lead text-secondary">“Thành công không tồn tại mãi mãi mà chỉ có chúng ta tốt hơn mỗi ngày” – CEO TopCV Việt Nam.
                                Chúng tôi không thỏa hiệp, ngủ yên với chiến thắng của ngày hôm nay mà luôn tiến về phía trước và đôi lúc phải đi trước tương lai, 
                                dự đoán được những biến số để giúp chúng tôi tồn tại.</p>
                        </div>
                        <div class="col-md-6 text-end"><img class="pt-7 pt-md-0 img-fluid"
                                src="{{asset('/')}}VictoryWeb/img/aboutus/topcvpic3.webp" alt="" /></div>
                    </div>
                </div>
            </section>


            <section class="pt-7">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 text-end"><img class="pt-7 pt-md-0 img-fluid"
                                src="{{asset('/')}}VictoryWeb/img/aboutus/topcvpic4.png" alt="" /></div>
                        <div class="col-md-6 text-md-start text-center py-6">
                            <h1 class="mb-4 fs-9 fw-bold text-primary">Nhận trách nhiệm, đưa giải pháp,
hướng tập thể, vì khách hàng </h1>
                            <p class="mb-6 lead text-secondary">TopCV Việt Nam đang giải quyết những bài toán về con người do đó con người là yếu tố ưu tiên đối với chúng tôi.
                                 Các hoạt động đầu tư vào con người,
                                tạo ra môi trường làm việc hạnh phúc và có cơ hội phát triển là ưu tiên hàng đầu của TopCV Việt Nam. Không chỉ dừng ở đó, với những cam kết của mình,
                                 chúng tôi đặt khách hàng,
                                 đối tác làm mục tiêu và luôn cố gắng đem lại giải pháp tốt nhất cho họ.</p><br>
                            <p class="mb-6 lead text-secondary">Để đạt được một tốc độ tăng trưởng nhanh với những hoạt động đột phá trên thị trường,
                                 TopCV Việt Nam luôn giữ cho mình một tư duy cởi mở. Sẵn sàng lắng nghe, 
                                 ghi nhận ý kiến cũng như những quan điểm dù là trái chiều với một thái độ tích cực và cầu tiến.
                                 Chúng tôi tin rằng, đây chính là một trong những giá trị giúp cho TopCV Việt Nam có thể đi xa hơn nữa trong tương lai.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="pt-7">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 text-md-start text-center py-6">
                            <h1 class="mb-4 fs-9 fw-bold text-primary">Bền vững tư duy,
thực thi thần tốc</h1>
                            <p class="mb-6 lead text-secondary">Sáng tạo, thay đổi không ngừng để tạo ra sự đột phá, tiên phong trong lĩnh vực của mình.
                                 Chúng tôi bắt đầu từ những thay đổi nhỏ nhất từ cải thiện công việc cá nhân,
                                  tạo ra kết quả tốt hơn cho đội nhóm rồi tạo ra giá trị cho công ty. “Phát triển nhanh và bền vững” là điều kiện tiên quyết trong thời đại thay đổi đang là xu hướng, 
                                  đặc biệt trong lĩnh vực công nghệ. Phát triển nhanh cho phép chúng tôi được thử nghiệm những cái mới, nhanh chóng rút ra bài học và vươn xa. 
                                  Tuy nhiên, chúng tôi sẽ không phát triển bằng mọi giá mà đánh mất đi mục tiêu bền vững của mình.
                            </p>
                        </div>
                        <div class="col-md-6 text-end"><img class="pt-7 pt-md-0 img-fluid"
                                src="{{asset('/')}}VictoryWeb/img/aboutus/topcvpic5.png" alt="" /></div>
                    </div>
                </div>
            </section>



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
            $('.menu-aboutus').addClass('active')
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
@endsection
