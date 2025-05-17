@if($services->isNotEmpty())
<!-- Featured Area -->
<div class="featured-area featured-area-mt pb-70">
    <div class="container">
        <div class="row justify-content-center">
            @foreach($services as $service)
                <div class="col-lg-4 col-6">
                    <div class="featured-item">
                        <img src="{{ asset($service->icon) }}" alt="icon" style="width: 40px; height: 40px;" />
                        <h3>{{ $service->getTranslation('name', app()->getLocale()) }}</h3>
                        <p>{{ $service->getTranslation('content', app()->getLocale()) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Featured Area End -->
@endif
