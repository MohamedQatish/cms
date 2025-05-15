<!-- Testimonials Area -->
<div class="testimonials-area section-bg ptb-100">
    <div class="container">
        <div class="section-title mb-45 text-center">
            <h2>ماذا قال <b>العملاء</b> عن خدماتنا</h2>
        </div>
        <div class="testimonials-slider owl-carousel owl-theme">

            @foreach ($stories as $story)
                <div class="testimonials-card">
                    <div class="content">
                        <img src="{{ asset($story->image) }}" alt="testimonial" />
                        <h3>{{ $story->name }}</h3>
                        <span>{{ $story->spec }}</span>
                    </div>
                    <div class="quote"> <i class="flaticon-quote"></i></div>
                    <p>{{ $story->content }}</p>
                    <div class="rating">
                        {{-- @for ($i = 0; $i < 5; $i++)
                            <i class="ri-star-fill"></i>
                        @endfor --}}
                        <div class="rating">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
<!-- Testimonials Area End -->
