  <!-- Service Start -->
  @php
      $portfolios=DB::table('portfolios')->where('type','portfolio')->where('content_type','video')->limit(6)->latest()->get();
  @endphp
  <div class="service">
    <div class="container">
        <div class="section-header text-center">
            <p>Our Work</p>
            <h2>We Work Video</h2>
        </div>
        <div class="row">
            @foreach ($portfolios as $portfolio)

            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <a class="portfolio-img" href="{{route('portfolio.detail',['slug'=>$portfolio->slug])}}">
                            <video src="{{asset($portfolio->thumbnail)}}" autoplay style="max-width: 100%;min-width:100%;max-height:200px" controls></video>

                        </a>
                        <a class="service-text" href="{{route('portfolio.detail',['slug'=>$portfolio->slug])}}">
                             <h3>
                                <span class="a">{!!$portfolio->title!!}
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
