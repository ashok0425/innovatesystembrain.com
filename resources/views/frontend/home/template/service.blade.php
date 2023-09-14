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
                    <div class="service-img">
                        <img src="{{asset($service->thumbnail)}}" alt="Image">
                        <div class="service-overlay">
                            <p>
                                   {!! Str::limit(strip_tags($service->descr),150)!!}

                            </p>
                        </div>
                    </div>
                    <div class="service-text">
                        <h3>                             {!!$service->title!!}
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
