@extends('frontend.layout.master')
@section('content')


            <!-- Page Header Start -->
            <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Our Services</h2>
                        </div>
                        <div class="col-12">
                            <a href="{{route('/')}}">Home</a>
                            <a href="">Our Services</a>
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
                        @foreach ($services as $service)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item">
                                <a class="service-img" href="{{route('service.detail',['slug'=>$service->slug])}}">
                                    <div style=" width: 100%;
                                    height: 200px;
                                    background-image: url('{{asset($service->thumbnail)}}');
                                    background-size: cover;
                                    background-repeat: no-repeat;
                                    background-position: 50% 25%;">
                                </div>

                                </a>
                                <div class="service-text">
                                     <h3>
                                        <a class="a"  href="{{route('service.detail',['slug'=>$service->slug])}}">               {!!$service->title!!}
                                        </a>
                                    </h3>
                                    <a class="btn" href="{{asset($service->thumbnail)}}" data-lightbox="service">+</a>
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
