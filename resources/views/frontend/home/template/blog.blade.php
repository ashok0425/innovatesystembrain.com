   <!-- Blog Start -->
   @php
    $blogs = App\Models\Blog::query()
        ->limit(6)
        ->get();
@endphp
   <div class="blog">
    <div class="container">
        <div class="section-header text-center">
            <p>Latest Blog</p>
            <h2>Latest From Our Blog</h2>
        </div>
        <div class="row">
            @foreach ($blogs as $blog)

            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                <a class="blog-item" href="">
                    <div class="blog-img">
                        <img src="{{asset($blog->thumbnail)}}" alt="Image" height="180">
                    </div>
                    <div class="blog-title">
                        <h3>{{$blog->title}}</h3>
                    </div>

                    <div class="blog-text">
                        <p>
                           {!! Str::limit($blog->short_desc,100)!!}
                        </p>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
    </div>
</div>
<!-- Blog End -->
