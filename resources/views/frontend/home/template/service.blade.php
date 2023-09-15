  <!-- Service Start -->
  @php
      $services=DB::table('services')->latest()->get();
  @endphp
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
                        <img src="{{asset($service->thumbnail)}}" alt="Image">

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
