<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@stack('title') - {{ website()->site_name }}</title>
    @stack('scripts')


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('backend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">


</head>

<body>

    <div id="update_notification" style="display:none;" class="alert alert-info">
        <button type="button" style="margin-left: 20px" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <script>
        $(document).ready(function() {  
            $.ajax({
                type: 'GET',   
                url: 'updater.check',
                async: false,
                success: function(response) {
                    if(response != ''){
                        $('#update_notification').append('<strong>Update Available <span class="badge badge-pill badge-info">v. '+response+'</span></strong><a role="button" href="updater.update" class="btn btn-sm btn-info pull-right">Update Now</a>');
                        $('#update_notification').show();
                    }
                }
            });
        });
    </script>
    {{-- @include('backend.layouts.navbar') --}}
    @yield('content')


    <!-- Footer Start -->
    <div class="container-fluid pt-4 px-2">
        <div class="bg-light rounded-top p-4">
            <div class="row">
                <div class="col-12 col-sm-6 text-center text-sm-start">
                    &copy; <a href="{{ url('/') }}">{{ website()->site_name }}</a>, All Rights Reserved.
                </div>
                <div class="col-12 col-sm-6 text-center text-sm-end">
                    Developer <a href="https://linktr.ee/almasali">{{ website()->site_author_name }}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
    </div>
    <!-- Content End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('backend/lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('backend/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('backend/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('backend/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('backend/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('backend/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('backend/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('backend/js/main.js') }}"></script>
    <script src="{{ asset('js/validator.js') }}"></script>

</body>

</html>