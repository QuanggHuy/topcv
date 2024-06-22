@extends('VictoryWeb.main-page.layout.mainLayout')

@section('content')
<div class="container content-wrapper overflow-hidden">
    <div class="row mt-4" id="mainContent">
        @foreach ($cv_templates as $cv_template)
        <div class="col-3">
            <div class="card" style="width: 100%;">
                <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/delicate_2_v2.png?v=1.0.6" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $cv_template->name }}</h5>
                    {{-- <p class="card-text">{{ $cv_template->cv_template_description }}</p> --}}
                    <a href="{{ url('cv-template/add-form/' . $cv_template->id) }}" class="btn btn-primary cv-button">Chọn mẫu này</a>
                </div>
            </div>
            <hr>
        </div>
        @endforeach
    </div>
</div>
<hr>
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
        $('.cv-button').on('click', function() {
            if (!{
                    !! json_encode(session() - > has('user')) !!
                }) {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success ms-1",
                        cancelButton: "btn btn-danger me-1"
                    },
                    buttonsStyling: false
                });
                swalWithBootstrapButtons.fire({
                    title: "Login required !",
                    text: "You need to log in to be able to add items to your cv list !",
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
            }
             else {
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
    })
</script>

@endsection