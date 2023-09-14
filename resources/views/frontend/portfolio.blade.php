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
            <div class="portfolio">
                <div class="container">
                    <div class="section-header text-center">
                        <p>Our Portfolio</p>
                        <h2>Visit Our Portfolio
                        </h2>
                    </div>
                    <div class="row portfolio-container">
                        @foreach ($portfolios as $portfolio)

                        <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                            <div class="portfolio-warp">
                                <div class="portfolio-img">
                                    <img src="{{asset($portfolio->thumbnail)}}" alt="{{$portfolio->title}}" height="200">
                                    <div class="portfolio-overlay">
                                        <p>
                                            {!!Str::limit(strip_tags($portfolio->descr),200,'')!!}

                                        </p>
                                    </div>
                                </div>
                                <div class="portfolio-text">
                                    <h3>{{$portfolio->title}}</h3>
                                    <a class="btn" href="{{asset($portfolio->thumbnail)}}" data-lightbox="portfolio">+</a>
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
