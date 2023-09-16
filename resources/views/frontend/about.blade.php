@extends('frontend.layout.master')
@section('content')
<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>About Us</h2>
            </div>
            <div class="col-12">
                <a href="{{route('/')}}">Home</a>
                <a href="">About Us</a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

@php
    $page=App\Models\Page::where('slug','about-us')->first();
@endphp
            <!-- About Start -->
            <div class="about wow fadeInUp" data-wow-delay="0.1s">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-6">
                            <div class="about-img">
                                <img src="{{asset($page->thumbnail)}}" alt="Image">
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="section-header text-left">
                                <h2>{{$page->title}}</h2>
                            </div>
                            <div class="about-text">
                               <p>
                                {{$page->short_desc}}
                               </p>
                            </div>
                        </div>
                    </div>
                    <br>
                {!!$page->descr!!}

                </div>

            </div>
            <!-- About End -->

@endsection
