 @php
     $services=App\Models\Service::limit(5)->get();
     $products=App\Models\Portfolio::where('type','product')->limit(5)->get();

 @endphp
 <!-- Footer Start -->
 <div class="footer wow fadeIn" data-wow-delay="0.3s">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="footer-contact">
                    <h2>Office Contact</h2>
                    <p><i class="fa fa-map-marker-alt"></i>{{$setting->openingtime}}</p>
                    <p><i class="fa fa-phone-alt"></i>{{$setting->phone}}</p>
                    <p><i class="fa fa-envelope"></i>{{$setting->email}}</p>
                    <div class="footer-social">
                        <a href="{{asset($setting->twitter)}}"><i class="fab fa-twitter"></i></a>
                        <a href="{{asset($setting->facebook)}}"><i class="fab fa-facebook-f"></i></a>
                        {{-- <a href="{{asset($setting->youtube)}}"><i class="fab fa-youtube"></i></a> --}}
                        <a href="{{asset($setting->instagram)}}"><i class="fab fa-instagram"></i></a>
                        <a href="{{asset($setting->linkdin)}}"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="footer-link">
                    <h2>Services Areas</h2>
                    @foreach ($services as $service)
                    <a href="{{route('service.detail',['slug'=>$service->slug])}}">{{$service->title}}</a>

                    @endforeach

                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="footer-link">
                    <h2>Our Product</h2>
                    @foreach ($products as $product)
                    <a href="{{route('portfolio.detail',['slug'=>$product->slug])}}">{{$product->title}}</a>

                    @endforeach
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="footer-link">
                    <h2>Useful Pages</h2>
                    <a href="{{route('about')}}">About Us</a>
                    <a href="{{route('contact')}}">Contact Us</a>
                    <a href="{{route('teams')}}">Our Team</a>
                    <a href="{{route('portfolios')}}">Portfolio</a>
                    <a href="{{route('services')}}">Service</a>
                </div>
            </div>

        </div>
    </div>
    {{-- <div class="container footer-menu">
        <div class="f-menu">
            <a href="">Terms of use</a>
            <a href="">Privacy policy</a>
            <a href="">FQAs</a>
        </div>
    </div> --}}
    <div class="container copyright text-center border-top">

                <p>&copy; <a href="{{route('/')}}">{{$setting->copyright}}</a>, All Right Reserved.</p>

        </div>
    </div>
</div>
<!-- Footer End -->
