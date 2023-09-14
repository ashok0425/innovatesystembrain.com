@php
    $products=App\Models\Portfolio::where('type','product')->get();
@endphp
<div class="faqs">
    <div class="container">
        <div class="section-header text-center">
            <p>Our Products</p>
            <h2>Our other Products</h2>
        </div>

        <div class="row">
            @foreach ($products as $product)
            <div class="col-md-6 text-center">
               <a href="">
                <div><img src="{{asset($product->thumbnail)}}" alt="{{$product->title}}"></div>
                <p>{{$product->title}}</p>
               </a>
            </div>
            @endforeach

        </div>
    </div>
</div>
