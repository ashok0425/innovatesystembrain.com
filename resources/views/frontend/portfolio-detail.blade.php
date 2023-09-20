@extends('frontend.layout.master')
@section('content')


            <!-- Page Header Start -->
            <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>{{$portfolio->title}}</h2>
                        </div>
                        <div class="col-12">
                            <a href="{{route('/')}}">Home</a>
                            <a href="">{{$portfolio->title}}</a>
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
                                @if ($portfolio->content_type=='video')
                                <video src="{{asset($portfolio->thumbnail)}}" autoplay style="width: 100%;max-height:300px;" controls></video>
                                @endif
                                @if (isset($portfolio->cover_image))
                                <img src="{{asset($portfolio->cover_image)}}" class="img-fluid" />
                                @endif
                                <br>
                                <br>

                                <h2>{{$portfolio->title}}</h2>
                                <br>
                                {!!$portfolio->descr!!}
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
