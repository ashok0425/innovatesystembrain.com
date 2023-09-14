 <!-- Carousel Start -->
 @php
     $banners=DB::table('banners')->latest()->limit(3)->get();
 @endphp
 <div id="carousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        @foreach ($banners as $banner)

        <div class="carousel-item {{$loop->iteration==1?'active':''}}">
            <img src="{{asset($banner->thumbnail)}}" alt="Carousel Image">
            <div class="carousel-caption">
                <p class="animated fadeInRight">{{$banner->title}}</p>
                {{-- <h1 class="animated fadeInLeft">{!! $banner->descr !!}</h1> --}}
                <a class="btn animated fadeInUp" href="{{route('contact')}}">Get A Quote</a>
            </div>
        </div>
        @endforeach

    </div>

    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- Carousel End -->
