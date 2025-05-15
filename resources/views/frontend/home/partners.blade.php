<!-- Play Area Start -->
<div class="play-area ptb-100">
    <div class="container">
        <div class="title text-center mb-45">
            <h2> We worked with <span>250+ </span> leading universities and companies</h2>
        </div>
        <div class="brand-slider owl-carousel owl-theme pb-100">
            @foreach ($clients as $client)
            <div class="brand-item">
                <img src="{{ asset( $client->image) }}" class="brand-item-logo1" alt="{{ $client->Name }}">
            </div>
            @endforeach
        </div>


    </div>
</div>
<!-- Play Area End -->
