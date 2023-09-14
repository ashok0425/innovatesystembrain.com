@php
    $setting=App\Models\Frontendsetting::query()->first();
@endphp
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>{{$setting->meta_title}}</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Construction Company Website Template" name="keywords">
        <meta content="Construction Company Website Template" name="description">

        <!-- Favicon -->
        <link href="{{asset($setting->fev)}}o" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="{{asset('frontend/lib/flaticon/font/flaticon.css')}}" rel="stylesheet">
        <link href="{{asset('frontend/lib/animate/animate.min.css')}}" rel="stylesheet">
        <link href="{{asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{asset('frontend/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
        <link href="{{asset('frontend/lib/slick/slick.css')}}" rel="stylesheet">
        <link href="{{asset('frontend/lib/slick/slick-theme.css')}}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
    </head>

    <body>
        <div class="wrapper">

            @include('frontend.layout.header')


            {{-- main content  --}}
             @yield('content')











@include('frontend.layout.footer')


            <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('frontend/lib/easing/easing.min.js')}}"></script>
        <script src="{{asset('frontend/lib/wow/wow.min.js')}}"></script>
        <script src="{{asset('frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('frontend/lib/isotope/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('frontend/lib/lightbox/js/lightbox.min.js')}}"></script>
        <script src="{{asset('frontend/lib/waypoints/waypoints.min.js')}}"></script>
        <script src="{{asset('frontend/lib/counterup/counterup.min.js')}}"></script>
        <script src="{{asset('frontend/lib/slick/slick.min.js')}}"></script>

        <!-- Template Javascript -->
        <script src="{{asset('frontend/js/main.js')}}"></script>
    </body>
</html>
