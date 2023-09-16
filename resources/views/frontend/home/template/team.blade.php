@php
    $teams=App\Models\Team::query()->limit(4)->get();
@endphp
            <!-- Team Start -->
            <div class="team">
                <div class="container">
                    <div class="section-header text-center">
                        <p>Our Team</p>
                        <h2>Meet Our Team</h2>
                    </div>
                    <div class="row">
                        @foreach ($teams as $team)

                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="team-item">
                                <div class="team-img">
                                    <div style=" width: 100%;
                                    height: 200px;
                                    background-image: url('{{asset($team->thumbnail)}}');
                                    background-size: cover;
                                    background-repeat: no-repeat;
                                    background-position: 50% 25%;">
                                </div>
                                </div>
                                <div class="team-text">
                                    <h2>{{$team->name}}</h2>
                                    <p>{{$team->position}}</p>
                                </div>
                                {{-- <div class="team-social">
                                    <a class="social-tw" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="social-fb" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="social-li" href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a class="social-in" href=""><i class="fab fa-instagram"></i></a>
                                </div> --}}
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <!-- Team End -->
