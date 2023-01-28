@if ($testimonials->count())
<section id="section-testimonial" data-bgimage="url(/files/abouts/lg/{{$about->image.'.jpg'}}) top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h2>{{config('constant.constant.testimonials.'.$lang)}}</h2>
                    <div class="small-border"></div>
                </div>
                <div class="owl-carousel owl-theme" id="testimonial-carousel">
                    @foreach ($testimonials as $key => $testimonial)
                    <div class="item">
                        <div class="de_testi opt-2 review no-bg">
                            <blockquote>
                                <i class="fa fa-quote-left id-color"></i>
                                <p>{{$testimonial->body->$lang}}</p>
                                <div class="de_testi_by"><span>{{$testimonial->name->$lang}}</span></div>
                            </blockquote>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
