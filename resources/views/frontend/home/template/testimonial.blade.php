@php
    $testimonials = App\Models\Testimonial::query()
        ->limit(6)
        ->get();
@endphp
@push('style')
    <style>
        .slider-nav img{
     height: 100px!important;
     width: 100px!important;
     max-height: 100px!important;
     max-width: 100px!important;
     border-radius: 50%!important;
        }
    </style>
@endpush
<!-- Testimonial Start -->
<div class="testimonial wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="testimonial-slider-nav">
                    @foreach ($testimonials as $testimonial)
                        <div class="slider-nav"><img src="{{ asset($testimonial->thumbnail) }}"
                                alt="{{ $testimonial->name }}" ></div>
                    @endforeach

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="testimonial-slider">
                    @foreach ($testimonials as $testimonial)

                        <div class="slider-item">
                            <h3>{{$testimonial->name}}</h3>
                            <h4>{{$testimonial->position}}</h4>
                            <p>{!! $testimonial->descr !!}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->
