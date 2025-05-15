@if($services->isNotEmpty())
        <!-- Featured Area -->
        <div class="featured-area featured-area-mt pb-70">
            <div class="container">
                <div class="row justify-content-center">
                    @foreach($services as $service)
                        <div class="col-lg-4 col-6">
                            <div class="featured-item">
                                <i class="flaticon-platform"></i>
                                <h3>{{ $service->{$language_shortcut . '_name'} }}</h3> <!-- ar_name, en_name, fr_name, de_name -->
                                <p>{{ $service->{$language_shortcut . '_content'} }}</p> <!-- ar_content, en_content, fr_content, de_content -->
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
        <!-- Featured Area End -->
        @endif
