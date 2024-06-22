<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dash board</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
</head>

<body>
    <main class="container-fluid">
        <div class="row bg-body-tertiary">
            <div class="col-lg-2 col-2 bg-dark p-0" style="height: 750px">
                <a class="navbar-brand p-0" href="{{ route('home') }}">
                    <img src="{{ asset('images/logocv.png') }}" width="100%" height="65px" alt="">
                </a>
                <!-- ---------------------------------->
                <div class="accordion accordion-flush w-100" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item text-bg-dark">
                        <h2 class="accordion-header">
                            <button class="accordion-button text-bg-dark" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Dash board
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body p-0">
                                <div class="list-group list-group-flush">
                                    <a href="#!/" class="list-group-item list-group-item-action">
                                        Thông kê tổng quan

                                    </a>
                                    <a href="#!dashboard/cart" class="list-group-item list-group-item-action">
                                        Thông kê giỏ hàng

                                    </a>
                                    <a href="#!dashboard/money" class="list-group-item list-group-item-action">
                                        Thông kê doanh thu

                                    </a>
                                    <a href="#!dashboard/product
                                    "
                                        class="list-group-item list-group-item-action">
                                        Thông kê sản phẩm

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item text-bg-dark">
                        <h2 class="accordion-header">
                            <button class="accordion-button text-bg-dark collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                aria-controls="collapseTwo">
                                Việc làm
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body p-0">
                                <div class="list-group list-group-flush">
                                    <a href="{{ route('jobList.dashboard') }}"
                                        class="list-group-item list-group-item-action">
                                        Danh sách Việc làm
                                    </a>
                                    <a href="{{ route('savedJob.dashboard') }}"
                                        class="list-group-item list-group-item-action">
                                        Danh sách Việc làm đã lưu
                                    </a>
                                    <a href="{{ route('applicationsList.dashboard') }}"
                                        class="list-group-item list-group-item-action">
                                        Danh sách ứng tuyển
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        Thêm mục
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item text-bg-dark">
                        <h2 class="accordion-header">
                            <button class="accordion-button text-bg-dark collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                aria-controls="collapseThree">
                                Công ty
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body p-0">
                                <div class="list-group list-group-flush">
                                    <a href="{{ route('companyList.dashboard') }}"
                                        class="list-group-item list-group-item-action">
                                        Danh sách Công ty
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        Thêm mục
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item text-bg-dark">
                        <h2 class="accordion-header">
                            <button class="accordion-button text-bg-dark collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false"
                                aria-controls="collapsefour">
                                Account
                            </button>
                        </h2>
                        <div id="collapsefour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body p-0">
                                <div class="list-group list-group-flush">
                                    <a href="{{ route('userList') }}" class="list-group-item list-group-item-action">
                                        User
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item text-bg-dark">
                        <h2 class="accordion-header">
                            <button class="accordion-button text-bg-dark collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="false"
                                aria-controls="collapsefive">
                                Ngành nghề
                            </button>
                        </h2>
                        <div id="collapsefive" class="accordion-collapse collapse"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body p-0">
                                <div class="list-group list-group-flush">
                                    <a href="{{ route('careerList.dashboard') }}"
                                        class="list-group-item list-group-item-action">
                                        Danh sách ngành nghề
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item text-bg-dark">
                        <h2 class="accordion-header">
                            <button class="accordion-button text-bg-dark collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapsesix" aria-expanded="false"
                                aria-controls="collapsesix">
                                Hồ sơ và Cv
                            </button>
                        </h2>
                        <div id="collapsesix" class="accordion-collapse collapse"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body p-0">
                                <div class="list-group list-group-flush">
                                    <a href="{{ route('userCvsList.dashboard') }}" class="list-group-item list-group-item-action">
                                        Danh sách hồ sơ và cv
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 col-10 p-0 position-relative">
                <div
                    class="bg-success d-flex justify-content-between py-2 px-3 align-items-center border-bottom position-absolute top-0 start-0 end-0">
                    <div class="account d-flex gap-3">
                        <div class="img">
                            <img class="" src="public/images/" alt="" style="width: 53px;">
                        </div>
                        <div>
                            <div class="text-white fw-semibold">
                                ADMIN
                            </div>
                            <div class="text-white">
                                QUẢN LÝ CỦA ADMIN
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <form method="POST" action="{{ route('logout.dashboard') }}">
                            @csrf <!-- CSRF Token -->
                            <button type="submit" class="btn btn-dark">
                                <span>Log out</span>
                            </button>
                        </form>
                    </div>

                </div>
                <div class="vh-100">
                    <div style="height: 69px;"></div>
                    <div class="overflow-auto" style="height: 100%;">
                        <!-- =================================================== -->
                        @yield('content')
                        <!-- =================================================== -->
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
<script src="{{ asset('css/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js') }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"> --}}
</script>
<script>
    CKEDITOR.replace('ckeditor');
</script>

</html>
