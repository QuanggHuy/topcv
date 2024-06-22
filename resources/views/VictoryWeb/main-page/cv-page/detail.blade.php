@extends('VictoryWeb.main-page.layout.mainLayout')

@section('head')
@endsection

@section('content')
    <div class="container mt-3 content-wrapper overflow-hidden">
        <!-- Wrapper for profile form container -->
        <div class="row p-0">
            <!-- Profile form container -->
            <form class="col-9 value-form" action="{{ url('cv-template/proccess-update') }}" method="post"
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
                                <input type="text" class="form-control" name="name" value="{{ $userCv->name }}">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form fields -->
                <div class=" content-wrapper overflow-hidden">
                    <img src="{{ asset('/img/imageCvs/' . $userCv->id . '/' . $userCv->image) }}" class="img-thumnail"
                        width="100%" height="100%">
                </div>
            </form>
            <div class="col-3 p-3">
                <!-- Color options -->
                <div class="color-options">
                    <div class="">
                        <button id="downloadBtn" class="btn btn-success mt-2">Download as Image</button>
                    </div>
                    <div class="row">
                        <h5 class="text text-danger">Delate this Cv</h5>
                        <a class="btn btn-danger" href="{{ url('cv-template/delete/' . $userCv->id) }}"
                            onclick="return confirm('Are you sure you want to delete this cv?')">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('script')
    
@endsection
