@extends('frontend.layout.master')
@section('content')


            <!-- Page Header Start -->
            <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>{{$service->title}}</h2>
                        </div>
                        <div class="col-12">
                            <a href="{{route('/')}}">Home</a>
                            <a href="">{{$service->title}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->


            <!-- Single Post Start-->
            <div class="single">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 offset-md-1">
                            <div class="wow fadeInUp">
                               <div class="card shadow border-none border-0">
                              <div class="card-body">
                                <img src="{{asset($service->cover_image)}}" class="img-fluid" />
                                <br>
                                <br>

                                <h2>{{$service->title}}</h2>
                                <br>
                                {!!$service->descr!!}
                               </div>
                              </div>
                        </div>
                        </div>
                    </div>
                </div>

                    </div>

            <!-- Single Post End-->

            @include('frontend.home.template.faq')

@endsection
