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
                    <a href="">Building Construction</a>
                    <a href="">House Renovation</a>
                    <a href="">Architecture Design</a>
                    <a href="">Interior Design</a>
                    <a href="">Painting</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="footer-link">
                    <h2>Useful Pages</h2>
                    <a href="">About Us</a>
                    <a href="">Contact Us</a>
                    <a href="">Our Team</a>
                    <a href="">Projects</a>
                    <a href="">Testimonial</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="newsletter">
                    <h2>Newsletter</h2>
                    <p>
                        Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulpu
                    </p>
                    <div class="form">
                        <input class="form-control" placeholder="Email here">
                        <button class="btn">Submit</button>
                    </div>
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
