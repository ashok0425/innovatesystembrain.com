@php
    $faqs=App\Models\Faq::all();
@endphp
<!-- FAQs Start -->
<div class="faqs">
    <div class="container">
        <div class="section-header text-center">
            <p>Frequently Asked Question</p>
            <h2>You May Ask</h2>
        </div>
        <div class="row">
            @foreach ($faqs as $faq)
            <div class="col-md-6">
                <div id="accordion-1">
                    <div class="card wow fadeInLeft" data-wow-delay="0.1s">
                        <div class="card-header">
                            <a class="card-link collapsed" data-toggle="collapse" href="#collapse{{$faq->id}}">
                                Lorem ipsum dolor sit amet?
                            </a>
                        </div>
                        <div id="collapse{{$faq->id}}" class="collapse" data-parent="#accordion-1">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach


        </div>
    </div>
</div>
<!-- FAQs End -->
