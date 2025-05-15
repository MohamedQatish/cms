
<!-- Blog Area -->
<div class="blog-area pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center mb-45">
            <div class="col-lg-8">
                <div class="section-title mt-rs-20">
                    <span>{{ __('LATEST BLOG') }}</span>
                    <h2>{{ __('Latest from our blogs') }}</h2>
                </div>
            </div>
            <div class="col-lg-4 text-end">
                <a href="#" class="default-btn border-radius-50">{{ __('View all blogs') }}</a>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($blogs as $blog)

                <div class="col-lg-4 col-md-6">
                    <div class="blog-card">
                        <a href="">
                            <img src="{{ asset($blog->image); }}" alt="Blog">
                        </a>
                        <div class="content">
                            <ul>
                                <li><i class="ri-calendar-todo-fill"></i> {{ \Carbon\Carbon::parse($blog->date)->format('M d, Y') }}</li>
                                <li><i class="ri-price-tag-3-fill"></i> <a href="#">{{ __('Category') }}</a></li>
                            </ul>
                            <h3><a href="#">{{ $blog->{$language_shortcut . '_title'} }}</a></h3>
                            <p>{{ Str::limit( $blog->{$language_shortcut . '_short_text'}, 100) }}</p>
                            <a href="#" class="read-btn">{{ __('Read More') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Blog Area End -->
