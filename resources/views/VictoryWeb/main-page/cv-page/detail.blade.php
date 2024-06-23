@extends('VictoryWeb.main-page.layout.mainLayout')

@section('head')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
@endsection

@section('content')
    <div class="container mt-3 content-wrapper overflow-hidden">
        <!-- Wrapper for profile form container -->
        <div class="row p-0">
            <!-- Profile form container -->
            <form class="col-9" action="{{ url('/cv-template/proccess-update') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-8">
                        <div class="row">
                                <div class="col-4">
                                    <label for="" class="form-label">
                                        <h3>Tên cv</h3>
                                    </label>
                                </div>
                                <div class="col-8 d-flex justify-content-between">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="name" value="{{ $userCv->name }}" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <button class="btn btn-outline-success" type="submit" id="button-addon2">Change</button>
                                    </div>
                                </div>
                            <input type="hidden" name="id" value="{{ $userCv->id }}">
                        </div>
                    </div>
                </div>
                <!-- Form fields -->
                <div class="overflow-hidden">
                    <img src="{{ asset('/img/imageCvs/' . $userCv->id . '/' . $userCv->image) }}" class="img-thumnail"
                        width="100%" height="100%">
                </div>
            </form>
            <div class="col-3 p-3">
                <!-- Color options -->
                <div class="color-options">
                    <div class="row">
                        <a href="{{ route('download.image', ['id' => $userCv->id]) }}" class="btn btn-primary mt-3">Download Image</a>
                    </div>
                    <div class="row">
                        <h5 class="text text-danger">Delate this Cv</h5>
                        <a class="btn btn-danger col-6" href="{{ url('cv-template/delete/' . $userCv->id) }}"
                            onclick="return confirm('Are you sure you want to delete this cv?')">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('script')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
