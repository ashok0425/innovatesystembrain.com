@extends('frontend.layout.master')
@section('content')


            <!-- Page Header Start -->
            <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Our Portfolio</h2>
                        </div>
                        <div class="col-12">
                            <a href="{{route('/')}}">Home</a>
                            <a href="">Our Portfolio</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->


            <!-- Service Start -->
            <div class="service">
                <div class="container">
                    <div class="section-header text-center">
                        <p>Our Services</p>
                        <h2>We Provide Services</h2>
                    </div>
                    <div class="row">
                        @foreach ($portfolios as $portfolio)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item">
                                <a class="portfolio-img" href="{{route('service.detail',['slug'=>$portfolio->slug])}}">
                                    <img src="{{asset($portfolio->thumbnail)}}" alt="Image">

                                </a>
                                <div class="service-text">
                                     <h3>
                                        <a class="a"  href="{{route('portfolio.detail',['slug'=>$portfolio->slug])}}">               {!!$portfolio->title!!}
                                        </a>
                                    </h3>
                                    <a class="btn" href="{{asset($portfolio->thumbnail)}}" data-lightbox="service">+</a>
                                </div>
                            </div>
                        </div>

                        @endforeach

                    </div>
                </div>
            </div>
            <!-- Service End -->

            @include('frontend.home.template.faq')

@endsection
