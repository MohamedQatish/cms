@if($faqs->isNotEmpty())
        <!-- FAQ Area -->
        <div class="faq-area pt-100 pb-70">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="faq-img">
                            <img src="{{ asset('frontend/assets/images/faq-img.jpg')}}" alt="faq" />
                            <div class="shape">
                                <img src="{{ asset('frontend/assets/images/faq-shape.png')}}" alt="Faq" />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="faq-accordion pl-20">
                            <div class="section-title mb-45">
                                <span>FAQ</span>
                                <h2>الأسئلة الشائعة</h2>
                            </div>
                            <ul class="accordion">
                                @foreach($faqs as $faq)
                                    <li class="accordion-item">
                                        <a class="accordion-title" href="javascript:void(0)">
                                            <i class="ri-add-fill"></i>
                                            {{ $faq->{$language_shortcut . '_qs'} }}
                                        </a>

                                        <div class="accordion-content">
                                            <p>
                                                {{ $faq->{$language_shortcut . '_answer'} }}
                                            </p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FAQ Area End -->
        @endif
