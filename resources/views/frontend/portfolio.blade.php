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
                        <p>Our Work</p>
                        <h2>Our Work Video</h2>
                    </div>
                    <div class="row">
                        @foreach ($videos as $portfolio)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item">
                                <a class="portfolio-img" href="{{route('portfolio.detail',['slug'=>$portfolio->slug])}}">
                                   <video src="{{asset($portfolio->thumbnail)}}" autoplay style="max-width: 100%" controls></video>

                                </a>
                                <a class="service-text" href="{{route('portfolio.detail',['slug'=>$portfolio->slug])}}">
                                     <h3>
                                        <span class="a"  >               {!!$portfolio->title!!}
                                        </span>
                                    </h3>

                                </a>
                            </div>
                        </div>

                        @endforeach

                    </div>
                </div>
            </div>
            <!-- Service End -->


            <div class="service">
                <div class="container">
                    <div class="section-header text-center">
                        <p>Our Portfolio</p>
                        <h2>We Work Images</h2>
                    </div>
                    <div class="row">
                        @foreach ($images as $image)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item">
                                <a class="service-img" href="{{route('portfolio.detail',['slug'=>$image->slug])}}">
                                    <div style=" width: 100%;
                                    height: 200px;
                                    background-image: url('{{asset($image->thumbnail)}}');
                                    background-size: cover;
                                    background-repeat: no-repeat;
                                    background-position: 50% 25%;">
                                </div>

                                </a>
                                <div class="service-text">
                                     <h3>
                                        <a class="a"  href="{{route('portfolio.detail',['slug'=>$image->slug])}}">               {!!$image->title!!}
                                        </a>
                                    </h3>
                                    <a class="btn" href="{{asset($image->thumbnail)}}" data-lightbox="service">+</a>
                                </div>
                            </div>
                        </div>

                        @endforeach

                    </div>
                </div>
            </div>

            @include('frontend.home.template.faq')

@endsection
