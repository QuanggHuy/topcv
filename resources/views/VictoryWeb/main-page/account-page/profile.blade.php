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

        .truncate-text5 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            /* Số dòng tối đa bạn muốn hiển thị cho tin tức phụ*/
            -webkit-box-orient: vertical;
        }

        .home-title-text-1 {
            text-shadow: rgb(155, 110, 42) 2px 0px 0px, rgb(155, 110, 42) 1.75517px 0.958851px 0px, rgb(155, 110, 42) 1.0806px 1.68294px 0px, rgb(155, 110, 42) 0.141474px 1.99499px 0px, rgb(155, 110, 42) -0.832294px 1.81859px 0px, rgb(155, 110, 42) -1.60229px 1.19694px 0px, rgb(155, 110, 42) -1.97998px 0.28224px 0px, rgb(155, 110, 42) -1.87291px -0.701566px 0px, rgb(155, 110, 42) -1.30729px -1.5136px 0px, rgb(155, 110, 42) -0.421592px -1.95506px 0px, rgb(155, 110, 42) 0.567324px -1.91785px 0px, rgb(155, 110, 42) 1.41734px -1.41108px 0px, rgb(155, 110, 42) 1.92034px -0.558831px 0px;
        }

        .home-title-text-2 {
            text-shadow: rgb(155, 110, 42) 2px 0px 0px, rgb(155, 110, 42) 1.75517px 0.958851px 0px, rgb(155, 110, 42) 1.0806px 1.68294px 0px, rgb(155, 110, 42) 0.141474px 1.99499px 0px, rgb(155, 110, 42) -0.832294px 1.81859px 0px, rgb(155, 110, 42) -1.60229px 1.19694px 0px, rgb(155, 110, 42) -1.97998px 0.28224px 0px, rgb(155, 110, 42) -1.87291px -0.701566px 0px, rgb(155, 110, 42) -1.30729px -1.5136px 0px, rgb(155, 110, 42) -0.421592px -1.95506px 0px, rgb(155, 110, 42) 0.567324px -1.91785px 0px, rgb(155, 110, 42) 1.41734px -1.41108px 0px, rgb(155, 110, 42) 1.92034px -0.558831px 0px;
        }

        .read-more {
            --animate-duration: 2.0s;
        }

        .mountains-title {
            background-color: hsl(0, 0%, 91%);

        }

        .mountains-title img {
            border-radius: 10px 300px 300px 10px;
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

        .modal {
            overflow-y: auto;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper ">

        <div class="container-fluid align-items-center d-flex flex-column mt-4">
            <!-- user profile Start -->
            <div class="row align-items-center container">
                <div
                    class="container col-lg-12 g-4 border border-5 border-primary rounded mt-0 py-4  animate__animated animate__zoomInDown">
                    <div class="row">
                        <!-- photo -->
                        <div
                            class="col-lg-5 text-center animate__animated animate__fadeInUp d-flex align-items-center justify-content-center">
                            @php
                                $account = session()->get('user');
                                $photoPath = 'img/accounts/' . $account->id . '/' . $account->photo;
                                $photoExists = $account->photo && File::exists(public_path($photoPath));
                            @endphp
                            @if (!$photoExists)
                                <img src="{{ asset('img/accounts/unknown.png') }}" class="img-fluid rounded-circle"
                                    style="width:260px; height:260px" alt="">
                            @else
                                <img src="{{ asset($photoPath) }}" class="img-fluid rounded-circle"
                                    style="width:260px; height:260px" alt="">
                            @endif
                        </div>

                        <!-- user details -->
                        <div class="col-lg-7 ">
                            <h1 class="display-5 mb-4 fs-3 fw-bold  text-center text-uppercase mt-2">Thông tin cá nhân
                            </h1>
                            <h3 class="profile-username text-center">{{ $account->fullname }}</h3>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Số điện thoại:</b> <span class="float-end">{{ $account->phone }}</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Email:</b> <span class="float-end">{{ $account->email }}</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Giới tính:</b> <span class="float-end">{{ $account->gender }}</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Ngày sinh:</b> <span
                                        class="float-end">{{ \Carbon\Carbon::parse($account->dob)->format('d/m/Y') }}</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Ngày tham gia:</b> <span
                                        class="float-end">{{ \Carbon\Carbon::parse($account->created)->format('d/m/Y') }}</span>
                                </li>
                            </ul>
                            <div class="d-flex justify-content-center">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#update"
                                    class="btn btn-primary mt-3 py-2 px-4 update{{ $account->id }}">Chỉnh sửa <i
                                        class="fas fa-pencil-alt"></i></button>







                                <!-- Button trigger modal -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Update modal -->
        <div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="display-5 fs-2">Cập nhật thông tin cá nhân</h1>
                    </div>
                    <form class="updateForm" action="{{ url('/account/proccessUpdate') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="roleid" value="1">
                        {{-- <input type="hidden" name="currentLoginId" value="user"> --}}


                        <input type="hidden" name="menu" value="user">

                        <input type="hidden" id='id' name="id" value="{{ $account->id }}">
                        <input type="hidden" id="currentUsername" name="currentUsername" value="{{ $account->username }}">
                        <input type="hidden" id="currentEmail" name="currentEmail" value="{{ $account->email }}">
                        <input type="hidden" id="currentPhone" name="currentPhone" value="{{ $account->phone }}">
                        <div class="modal-body">

                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label for="fullname">Tên đầy đủ</label>
                                    <div class="input-group">
                                        <input type="text" id="fullname" name='fullname'
                                            class="form-control p-1  border-primary bg-light"
                                            placeholder="Enter Your Full Name" value="{{ $account->fullname }}">
                                        <span class="input-group-text"><i
                                                class="fa-solid fa-circle-info text-primary"></i></span>
                                    </div>
                                </div>

                                <div class="form-group mb-3">

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1"
                                            value="male" @if ($account->gender == 'male') checked @endif>
                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2"
                                            value="female" @if ($account->gender == 'female') checked @endif>
                                        <label class="form-check-label" for="inlineRadio2">Female</label>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <div class="input-group">
                                        <input type="text" id="email" name="email"
                                            class="form-control p-1  border-primary bg-light "
                                            placeholder="Enter Your Email" value="{{ $account->email }}">
                                        <span class="input-group-text"><i
                                                class="fa-regular fa-envelope text-primary"></i></span>
                                    </div>

                                </div>
                                <div class="form-group mb-3">
                                    <label for="phone">Số điện thoại</label>
                                    <div class="input-group">

                                        <input type="text" id="phone" name="phone"
                                            class=" form-control p-1  border-primary bg-light" placeholder="Phone Number"
                                            value="{{ $account->phone }}">
                                        <span class="input-group-text"><i
                                                class="fa-solid fa-phone-flip text-primary"></i></span>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Ngày sinh:</label>
                                    <input type="date" name="dob" id="dob"
                                        data-inputmask-inputformat="DD/MM/YY"
                                        class="w-100 form-control p-1 mb-4 border-primary bg-light "
                                        placeholder="Date of Birth" value="{{ $account->dob }}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="username">Tên tài khoản</label>
                                    <input id="username" name='username' type="text" class="form-control"
                                        placeholder="Enter name" value="{{ $account->username }}" disabled>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Mật khẩu mới</label>

                                    <input type="password" id="password" name="password"
                                        class="w-100 form-control p-1  border-primary bg-light"
                                        placeholder="New Password (optional)">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="cofirmPassword">Xác nhận mật khẩu</label>

                                    <input type="password" id="cofirmPassword" name="confirmPassword"
                                        class="w-100 form-control p-1 mb-4 border-primary bg-light"
                                        placeholder="Confirm New Password ">
                                </div>

                                <div class="form-group mb-5">
                                    <label for="main-photo">Ảnh đại diện</label>
                                    <br>
                                    @if (
                                        $account->photo == null ||
                                            $account->photo == '' ||
                                            !File::exists(public_path('img/accounts/' . $account->id . '/' . $account->photo)))
                                        <img class="rounded mx-auto d-block mb-2 img-fluid w-50"
                                            src="{{ asset('/img/accounts/unknown.png') }}" alt="">
                                    @else
                                        <img class="rounded mx-auto d-block mb-2 img-fluid w-50"
                                            src="{{ asset('/img/accounts/' . $account->id . '/' . $account->photo) }}"
                                            alt="">
                                    @endif

                                    <div class="input-group">
                                        <input class="form-control main-photo   p-0 h-100" type="file" id="main-photo"
                                            name="main-photo" accept="image/*">
                                        <!-- Main Photo Croppie modal -->
                                        <div id="imageModel" class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Cắt hình theo tỉ lệ
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body d-flex justify-content-center">
                                                        <div id="image_demo" style="width:100%; margin-top:30px">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Đóng</button>
                                                        <button type="button" class="btn btn-primary crop_image">Lưu thay
                                                            đổi</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!-- /.card-body -->



                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-bs-dismiss="modal"
                                aria-label="Close">Đóng</button>
                            <button type="submit" name="button" value="update" class="btn btn-primary">Lưu thay
                                đổi</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- End Update modal -->

        <!--test-->
        <div class="container-fluid menu bg-light py-6 my-3">
            <div class="container">
                <div class="text-center animate__animated animate__bounceInUp">
                    <h1 class="display-5 mb-5">Danh sách yêu thích</h1>
                </div>
                <div class="tab-class text-center">
                    <ul class="nav nav-pills d-inline-flex justify-content-center mb-3 bounceInUp">
                        <!-- Tab links -->
                        <li class="nav-item p-2 animate__animated animate__bounceInLeft">
                            <a class="nav-link d-flex py-2 mx-2 border border-primary bg-white rounded-pill active"
                                data-bs-toggle="pill" href="#all">
                                <span class="text-dark" style="width: 150px;">Tất cả</span>
                            </a>
                        </li>
                        <li class="nav-item p-2 animate__animated animate__bounceInLeft --animate-delay-100ms">
                            <a class="nav-link d-flex py-2 mx-2 border border-primary bg-white rounded-pill"
                                data-bs-toggle="pill" href="#companies">
                                <span class="text-dark" style="width: 150px;">Công ty</span>
                            </a>
                        </li>
                        <li class="nav-item p-2 animate__animated animate__bounceInLeft --animate-delay-300ms">
                            <a class="nav-link d-flex py-2 mx-2 border border-primary bg-white rounded-pill"
                                data-bs-toggle="pill" href="#jobs">
                                <span class="text-dark" style="width: 150px;">Công việc</span>
                            </a>
                        </li>
                        <li class="nav-item p-2 animate__animated animate__bounceInLeft --animate-delay-500ms">
                            <a class="nav-link d-flex py-2 mx-2 border border-primary bg-white rounded-pill"
                                data-bs-toggle="pill" href="#blogs">
                                <span class="text-dark" style="width: 150px;">Bản tin</span>
                            </a>
                        </li>
                        <li class="nav-item p-2 animate__animated animate__bounceInLeft --animate-delay-700ms">
                            <a class="nav-link d-flex py-2 mx-2 border border-primary bg-white rounded-pill"
                                data-bs-toggle="pill" href="#cvs">
                                <span class="text-dark" style="width: 150px;">Danh sách CV</span>
                            </a>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-center">
                        <div class="tab-content col-md-8">
                            <!-- Tab panes -->
                            <div id="all" class="tab-pane fade show active">
                                <section class="text-start">
                                    <h1 class="display-5 fs-5 text-decoration-underline">Công ty yêu thích</h1>
                                    @foreach ($companiesLikeList as $company)
                                        <div class=" card mb-2   overflow-hidden ">
                                            <div class="row blog-item">
                                                <div class="col-lg-2  overflow-hidden d-flex align-items-center">
                                                    <img src="{{ asset('/img/companies/' . $company->id . '/' . $company->photo_main) }}"
                                                        class="img-thumnail" width="100%" height="100%">
                                                </div>
                                                <div class="col-lg-10 ">
                                                    <div class="card-body overflow-hidden">
                                                        <h5 class="card-title truncate-text1 fs-4"><a
                                                                href="{{ url('companies/detail?id=' . $company->id) }}">{{ $company->name }}</a>
                                                        </h5>
                                                        <span class="card-text truncate-text5 fs-6">
                                                            Thời gian thêm:
                                                            {{ \Carbon\Carbon::parse($company->created)->format('d/m/Y') }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </section>
                                <section class="text-start mt-5">
                                    <h1 class="display-5 fs-5 text-decoration-underline">Công việc yêu thích</h1>
                                    @foreach ($jobsLikeList as $job)
                                        <div class=" card mb-2  overflow-hidden ">
                                            <div class="row blog-item">
                                                <div class="col-lg-2  overflow-hidden d-flex align-items-center">
                                                    @if ($job->photo == null || $job->photo == '' || !File::exists(public_path('img/jobs/' . $job->id . '/' . $job->photo)))
                                                        <img src="{{ asset('/img/jobs/unknown.png') }}"
                                                            class="img-thumnail" width="100%" height="100%">
                                                    @else
                                                        <img src="{{ asset('/img/jobs/' . $job->id . '/' . $job->photo) }}"
                                                            class="img-thumnail" width="100%" height="100%">
                                                    @endif
                                                </div>
                                                <div class="col-lg-10 ">
                                                    <div class="card-body overflow-hidden">
                                                        <h5 class="card-title truncate-text1 fs-4"><a
                                                                href="{{ url('jobs/detail?id=' . $job->id) }}">{{ $job->name }}</a>
                                                        </h5>
                                                        <span class="card-text truncate-text5 fs-6">
                                                            Thời gian thêm:
                                                            {{ \Carbon\Carbon::parse($job->created)->format('d/m/Y') }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </section>
                                <section class="text-start mt-5">
                                    <h1 class="display-5 fs-5 text-decoration-underline">Tin yêu thích</h1>
                                    @foreach ($articleLikeList as $article)
                                        <div class="card mb-2 overflow-hidden ">
                                            <div class="row blog-item">
                                                <div class="col-lg-2 overflow-hidden d-flex align-items-center">

                                                    @if (
                                                        $article->photo == null ||
                                                            $article->photo == '' ||
                                                            !File::exists(public_path('img/articles/' . $article->id . '/' . $article->photo)))
                                                        <img src="{{ asset('/img/articles/unknown.png') }}"
                                                            class="img-thumnail" width="100%" height="100%">
                                                    @else
                                                        <img src="{{ asset('/img/articles/' . $article->id . '/' . $article->photo) }}"
                                                            class="img-thumnail" width="100%" height="100%">
                                                    @endif
                                                </div>
                                                <div class="col-lg-10 ">
                                                    <div class="card-body overflow-hidden">
                                                        <h5 class="card-title truncate-text1 fs-4"><a
                                                                href="{{ url('blogs/detail?id=' . $article->id) }}">{{ $article->name }}</a>
                                                        </h5>
                                                        <span class="card-text truncate-text5 fs-6">
                                                            Thời gian thêm:
                                                            {{ \Carbon\Carbon::parse($article->created)->format('d/m/Y') }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </section>
                                <section class="text-start mt-5">
                                    <h1 class="display-5 fs-5 text-decoration-underline">Danh sách CV</h1>
                                    @foreach ($userCvsList as $userCv)
                                        <div class="card mb-2 overflow-hidden ">
                                            <div class="row blog-item">
                                                <div class="col-lg-2 overflow-hidden d-flex align-items-center">
                                                    @if (
                                                        $userCv->image == null ||
                                                            $userCv->image == '' ||
                                                            !File::exists(public_path('img/imageCvs/' . $userCv->id . '/' . $userCv->image)))
                                                        <img src="{{ asset('/img/articles/unknown.png') }}"
                                                            class="img-thumnail" width="100%" height="100%">
                                                    @else
                                                        <img src="{{ asset('/img/imageCvs/' . $userCv->id . '/' . $userCv->image) }}"
                                                            class="img-thumnail" width="100%" height="100%">
                                                    @endif
                                                </div>
                                                <div class="col-lg-10 ">
                                                    <div class="card-body overflow-hidden">
                                                        <h5 class="card-title truncate-text1 fs-4"><a
                                                                href="{{ url('cv-template/detail/' . $userCv->id) }}">{{ $userCv->name }}</a>
                                                        </h5>
                                                        <span class="card-text truncate-text5 fs-6">
                                                            Thời gian thêm:
                                                            {{-- {{ \Carbon\Carbon::parse($userCv->created)->format('d/m/Y') }} --}}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                </section>
                            </div>
                            <div id="companies" class="tab-pane fade">
                                <!-- Content for Companies -->
                                @foreach ($companiesLikeList as $company)
                                    <div class="text-start card mb-2   overflow-hidden ">
                                        <div class="row blog-item">
                                            <div class="col-lg-2  overflow-hidden d-flex align-items-center">
                                                <img src="{{ asset('/img/companies/' . $company->id . '/' . $company->photo_main) }}"
                                                    class="img-thumnail" width="100%" height="100%">

                                            </div>
                                            <div class="col-lg-10 ">
                                                <div class="card-body overflow-hidden">
                                                    <h5 class="card-title truncate-text1 fs-4"><a
                                                            href="{{ url('companies/detail?id=' . $company->id) }}">{{ $company->name }}</a>
                                                    </h5>
                                                    <span class="card-text truncate-text5 fs-6">
                                                        Thời gian thêm:
                                                        {{ \Carbon\Carbon::parse($company->created)->format('d/m/Y') }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div id="jobs" class="tab-pane fade">
                                <!-- Content for jobs -->
                                @foreach ($jobsLikeList as $job)
                                    <div class=" text-start card mb-2   overflow-hidden ">
                                        <div class="row blog-item">
                                            <div class="col-lg-2  overflow-hidden d-flex align-items-center">

                                                @if ($job->photo == null || $job->photo == '' || !File::exists(public_path('img/jobs/' . $job->id . '/' . $job->photo)))
                                                    <img src="{{ asset('/img/jobs/unknown.png') }}" class="img-thumnail"
                                                        width="100%" height="100%">
                                                @else
                                                    <img src="{{ asset('/img/jobs/' . $job->id . '/' . $job->photo) }}"
                                                        class="img-thumnail" width="100%" height="100%">
                                                @endif

                                                {{-- <img src="{{ asset('/img/jobs/'.$job->id.'/'.$job->photo) }}" class="img-thumnail"
                                                    width="100%" height="100%"> --}}

                                            </div>
                                            <div class="col-lg-10 ">
                                                <div class="card-body overflow-hidden">
                                                    <h5 class="card-title truncate-text1 fs-4"><a
                                                            href="{{ url('jobs/detail?id=' . $job->id) }}">{{ $job->name }}</a>
                                                    </h5>
                                                    <span class="card-text truncate-text5 fs-6">
                                                        Thời gian thêm:
                                                        {{ \Carbon\Carbon::parse($job->created)->format('d/m/Y') }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div id="blogs" class="tab-pane fade">
                                @foreach ($articleLikeList as $article)
                                    <div class="text-start card mb-2   overflow-hidden ">
                                        <div class="row blog-item">
                                            <div class="col-lg-2  overflow-hidden d-flex align-items-center">

                                                @if (
                                                    $article->photo == null ||
                                                        $article->photo == '' ||
                                                        !File::exists(public_path('img/articles/' . $article->id . '/' . $article->photo)))
                                                    <img src="{{ asset('/img/articles/unknown.png') }}"
                                                        class="img-thumnail" width="100%" height="100%">
                                                @else
                                                    <img src="{{ asset('/img/articles/' . $article->id . '/' . $article->photo) }}"
                                                        class="img-thumnail" width="100%" height="100%">
                                                @endif

                                            </div>
                                            <div class="col-lg-10 ">
                                                <div class="card-body overflow-hidden">
                                                    <h5 class="card-title truncate-text1 fs-4"><a
                                                            href="{{ url('blogs/detail?id=' . $article->id) }}">{{ $article->name }}</a>
                                                    </h5>
                                                    <span class="card-text truncate-text5 fs-6">
                                                        Thời thêm:
                                                        {{ \Carbon\Carbon::parse($article->created)->format('d/m/Y') }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div id="cvs" class="tab-pane fade">
                                @foreach ($userCvsList as $userCv)
                                    <div class="text-start card mb-2   overflow-hidden ">
                                        <div class="row blog-item">
                                            <div class="col-lg-2  overflow-hidden d-flex align-items-center">
                                                @if (
                                                    $userCv->image == null ||
                                                        $userCv->image == '' ||
                                                        !File::exists(public_path('img/imageCvs/' . $userCv->id . '/' . $userCv->image)))
                                                    <img src="{{ asset('/img/articles/unknown.png') }}"
                                                        class="img-thumnail" width="100%" height="100%">
                                                @else
                                                    <img src="{{ asset('/img/imageCvs/' . $userCv->id . '/' . $userCv->image) }}"
                                                        class="img-thumnail" width="100%" height="100%">
                                                @endif
                                            </div>
                                            <div class="col-lg-10 ">
                                                <div class="card-body overflow-hidden">
                                                    <h5 class="card-title truncate-text1 fs-4"><a
                                                            href="{{ url('cv-template/detail/' . $userCv->id) }}">{{ $userCv->name }}</a>
                                                    </h5>
                                                    <span class="card-text truncate-text5 fs-6">
                                                        Thời gian thêm:
                                                        {{-- {{ \Carbon\Carbon::parse($userCv->created)->format('d/m/Y') }} --}}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
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
            $('.heart-icon1').on('mouseleave', function() {
                $(this).css({
                    "transition": "0.3s"
                }, {
                    "font-size": "25px"
                });
            });
            $('.heart-icon1').on('click', function() {
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

            function isValidDate(dateString) {
                var regex = /^\d{1,2}\/\d{1,2}\/\d{4}$/;;
                return regex.test(dateString);
            }

            function hasSpecialCharacters(str) {
                var nonAlphanumericPattern = /[^a-zA-Z0-9]/;

                var nonEnglishAlphabeticPattern = /[^a-zA-Z]/;

                var hasSpecialASCII = nonAlphanumericPattern.test(str);

                var hasNonEnglishCharacters = nonEnglishAlphabeticPattern.test(str);

                return hasSpecialASCII && hasNonEnglishCharacters;
            }

            // function isEmail(str) {
            //     var pattern = /[@]+/;
            //     return pattern.test(str);
            // }
            function isEmail(email) {
                var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                return regex.test(email);
            }


            function isIntegerString(str) {
                // Biểu thức chính quy để kiểm tra chuỗi có chứa toàn bộ số và có độ dài từ 7 đến 15 ký tự
                var integerPattern = /^\d{7,15}$/;

                return integerPattern.test(str);
            }

            $('.updateForm').submit(function(event) {

                var form = $(this);

                var id = form.find('#id').val().trim();


                var fullname = form.find('#fullname').val().trim();
                var email = form.find('#email').val().trim();
                var phone = form.find('#phone').val().trim();

                var dob = form.find('#dob').val().trim();

                var email = form.find('#email').val().trim();

                //var oldPassword = form.find('#oldPassword').val().trim();
                var password = form.find('#password').val().trim();
                var cofirmPassword = form.find('#cofirmPassword').val().trim();

                if (fullname === '' || email === '' || phone === '' || dob === '') {
                    event.preventDefault();
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Please fill in all required blanks"
                    });
                } else if (password != '' && password != cofirmPassword) {
                    event.preventDefault();
                    Swal.fire({
                        icon: "warning",
                        title: "Varify passwork not match",
                        text: "Please check your passwork input again !"
                    });

                }
                var accountsList = {!! json_encode($accountsCheckList) !!};
                var check = true;
                var error_note = '';
                var currentUsername = form.find('#currentUsername').val().trim();
                var currentEmail = form.find('#currentEmail').val().trim();
                var currentPhone = form.find('#currentPhone').val().trim();
                accountsList.forEach(element => {


                    if (element.phone != currentPhone && element.phone === phone) {


                        check = false;
                        error_note += 'Phone number [ ' + phone + ' ] is already exist ! <br>'

                    }
                    if (element.email != currentEmail && element.email.toLowerCase() === email
                        .toLowerCase()) {
                        check = false;
                        error_note += 'Email "' + email.toLowerCase() + '" is already exist ! <br>'


                    }


                });
                if (isEmail(email) == false) {
                    check = false;
                    error_note += 'Inputed email is invalid ! <br>'
                }

                if (!isIntegerString(phone) && phone != '') {
                    check = false;
                    error_note += 'Phone number [ ' + phone + ' ] is invalid ! <br>'


                }

                if (check == false) {

                    event.preventDefault();
                    Swal.fire({
                        icon: "error",
                        title: 'Update failed !',
                        html: error_note

                    });
                }

                if (fullname === '') {
                    console.log('fullname empty')
                    form.find('#fullname').addClass('border border-2 border-danger')
                } else {
                    form.find('#fullname').removeClass('border border-2 border-danger')
                }
                if (email === '') {
                    console.log('email empty')
                    form.find('#email').addClass('border border-2 border-danger')
                } else {
                    form.find('#email').removeClass('border border-2 border-danger')
                }
                if (phone === '') {
                    console.log('phone empty')
                    form.find('#phone').addClass('border border-2 border-danger')
                } else {
                    form.find('#phone').removeClass('border border-2 border-danger')
                }
                if (dob === '') {
                    console.log('dob empty')
                    form.find('#dob').addClass('border border-2 border-danger')
                } else {
                    form.find('#dob').removeClass('border border-2 border-danger')
                }


                if ((cofirmPassword === '' && password != '') || password != cofirmPassword) {
                    console.log('cofirmPassword empty')
                    form.find('#cofirmPassword').addClass('border border-2 border-danger')
                } else {
                    form.find('#cofirmPassword').removeClass('border border-2 border-danger')
                }



            });



            var sizeBoundary = window.innerWidth > 512 ? 512 : 256;
            var sizeViewPort = 400;
            $image_crop = $('#image_demo').croppie({
                enableExif: true,
                mouseWheelZoom: true,
                viewport: {
                    width: 400,
                    height: 400,
                    type: 'square' //circle
                },
                boundary: {
                    width: 500,
                    height: 500
                }
            });
            //$image_crop.croppie('setZoom', 1)
            $('#main-photo').on('change', function() {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $image_crop.croppie('bind', {
                        url: event.target.result
                    }).then(function() {

                        //$image_crop.croppie('setZoom', 0.5)
                        //$('.cr-slider').attr({'min':0.5, 'max':3.5000,'aria-valuenow':0.2000});
                        var img = new Image();
                        img.src = reader.result;

                        var minXY = img.height < img.width ? img.height : img.width;

                        var aux = minXY <= sizeViewPort ? sizeViewPort * 2 : minXY;

                        var min = minXY <= sizeViewPort ? 0 : sizeViewPort / aux;
                        var max = minXY <= sizeViewPort ? 0 : aux / sizeViewPort;



                        var scale = minXY <= sizeViewPort ? sizeViewPort / minXY : 1;
                        var x = minXY <= sizeViewPort ? sizeViewPort - (img.width * scale / 2) :
                            (sizeViewPort - ((img.width * scale) / (sizeBoundary /
                                sizeViewPort))) / 2;
                        var y = minXY <= sizeViewPort ? sizeViewPort - (img.height * scale /
                            2) : (sizeViewPort - ((img.height * scale) / (sizeBoundary /
                            sizeViewPort))) / 2;

                        var originX = minXY <= sizeViewPort ? 0 : img.width * scale / 2;
                        var originY = minXY <= sizeViewPort ? 0 : img.height * scale / 2;

                        $('.cr-image').css("opacity", "1");
                        $('.cr-image').css("transform", "translate3d(" + x + "px, " + y +
                            "px, 0px) scale(" + scale + ")");
                        $('.cr-image').css("transform-origin", "" + originX + "px " + originY +
                            "px 0px");
                        $('.cr-slider').attr({
                            'min': min,
                            'max': max,
                            'aria-valuenow': max
                        });
                        console.log('jQuery bind complete');
                    });
                }
                reader.readAsDataURL(this.files[0]);
                $('#imageModel').modal('show');

            });
            $('.crop_image').click(function(event) {
                //alert("Success");
                $image_crop.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function(response) {
                    $.ajax({
                        url: '{{ route('storeAccountImage') }}',
                        type: 'POST',
                        data: {
                            '_token': $('meta[name="csrf-token"]').attr('content'),
                            'image': response

                        },
                        success: function(data) {
                            $('#imageModel').modal('hide');
                            Swal.fire({
                                icon: 'success',
                                title: 'Cropping success !',

                            });
                        }
                    })
                });
            });

        })
    </script>
    <script>
        window.onload = function() {
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth() + 1; //January is 0!
            var yyyy = today.getFullYear();
            if (dd < 10) {
                dd = '0' + dd
            }
            if (mm < 10) {
                mm = '0' + mm
            }

            today = yyyy + '-' + mm + '-' + dd;
            document.getElementById("dob").setAttribute("max", today);
        };
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var dobInput = document.getElementById("dob");
            var today = new Date().toISOString().split('T')[0]; // Format YYYY-MM-DD
            dobInput.setAttribute("max", today);

            dobInput.addEventListener("change", function() {
                var selectedDate = new Date(this.value);
                var now = new Date();
                if (selectedDate > now) {
                    this.value = null; // xóa giá trị user nhập
                }
            });
        });
    </script>
@endsection
