@extends('frontend.layout.master')

@section('content')
    @include('frontend.home.template.hero')
    @include('frontend.home.template.feature')
    @include('frontend.home.template.product')

    @include('frontend.home.template.about')
    @include('frontend.home.template.service')
    @include('frontend.home.template.video')
    @include('frontend.home.template.team')
    @include('frontend.home.template.faq')
    @include('frontend.home.template.testimonial')
    @include('frontend.home.template.blog')

@endsection
