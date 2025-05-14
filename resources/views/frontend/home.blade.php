@extends('frontend/layouts.main')

@section('title')
    Home
@endsection

@section('content')
        <!-- Banner Area -->
        <div class="banner-area banner-area-ptb">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="banner-content">
                            <span data-aos="fade-up" data-aos-delay="900" data-aos-duration="1000" data-aos-once="true">FOR A BETTER FUTURE</span>
                            <h1 data-aos="fade-down" data-aos-delay="900" data-aos-duration="1000" data-aos-once="true">Discover the most exciting online courses</h1>
                            <p data-aos="fade-up" data-aos-delay="900" data-aos-duration="1000" data-aos-once="true">Flexible easy to access learning opportunities can bring a significant change in how individuals prefer to learn! The Ellen can offer you to enjoy the beauty of eLearning!</p>
                            <div class="banner-form-area" data-aos="fade-down" data-aos-delay="900" data-aos-duration="1000" data-aos-once="true">
                                <form class="banner-form" data-toggle="validator" method="POST">
                                    <input type="email" class="form-control" placeholder="Search your courses" name="EMAIL" required autocomplete="off">
                                    <button class="default-btn" type="submit">
                                        <i class="ri-search-line"></i> Search now
                                    </button>
                                </form>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-4 col-sm-3">
                                    <div class="banner-counter" data-aos="fade-up" data-aos-delay="900" data-aos-duration="1000" data-aos-once="true">
                                        <h3>32M</h3>
                                        <p>Learners</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-4 col-sm-3">
                                    <div class="banner-counter" data-aos="fade-up" data-aos-delay="900" data-aos-duration="1000" data-aos-once="true">
                                        <h3>200M</h3>
                                        <p>Countries</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-4 col-sm-3">
                                    <div class="banner-counter" data-aos="fade-up" data-aos-delay="900" data-aos-duration="1000" data-aos-once="true">
                                        <h3>8.1k+</h3>
                                        <p>Courses</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="banner-img-two" data-aos="fade-up" data-aos-delay="900" data-aos-duration="1000" data-aos-once="true">
                            <img src="{{ asset('frontend/assets/images/home-two/home-two.png') }}" alt="Man" />
                            <div class="bg-shape">
                                <img src="{{ asset('frontend/assets/images/home-two/home-shape.png') }}" alt="Shape" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Area End -->

        @if($faqs->isNotEmpty())
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
        <!-- Featured Area End -->$
        @endif

        <!-- Testimonials Area -->
        <div class="testimonials-area section-bg ptb-100">
            <div class="container">
                <div class="section-title mb-45 text-center">
                    <h2>ماذا قال  <b>العملاء</b> عن خدماتنا</h2>
                </div>
                <div class="testimonials-slider owl-carousel owl-theme">
                    <div class="testimonials-card">
                        <div class="content">
                            <img src="{{ asset('frontend/assets/images/testimonials/testimonials-img1.jpg') }}" alt="testimonials" />
                            <h3>Nikolas albart</h3>
                            <span>Student</span>
                        </div>
                        <div class="quote"> <i class="flaticon-quote"></i></div>
                        <p>“Morbi porttitor ligula id varius consectetur. Integer ipsum justo, congue sit amet massa vel, porttitor semper magna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus.”</p>
                        <div class="rating">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                        </div>
                    </div>
                    <div class="testimonials-card">
                        <div class="content">
                            <img src="{{ asset('frontend/assets/images/testimonials/testimonials-img2.jpg') }}" alt="testimonials" />
                            <h3>Terry ambady</h3>
                            <span>Content strategist</span>
                        </div>
                        <div class="quote"> <i class="flaticon-quote"></i></div>
                        <p>“Morbi porttitor ligula id varius consectetur. Integer ipsum justo, congue sit amet massa vel, porttitor semper magna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus.”</p>
                        <div class="rating">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                        </div>
                    </div>
                    <div class="testimonials-card">
                        <div class="content">
                            <img src="{{ asset('frontend/assets/images/testimonials/testimonials-img3.jpg') }}" alt="testimonials" />
                            <h3>Cory zamora</h3>
                            <span>Photographer</span>
                        </div>
                        <div class="quote"> <i class="flaticon-quote"></i></div>
                        <p>“Morbi porttitor ligula id varius consectetur. Integer ipsum justo, congue sit amet massa vel, porttitor semper magna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus.”</p>
                        <div class="rating">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                        </div>
                    </div>
                    <div class="testimonials-card">
                        <div class="content">
                            <img src="{{ asset('frontend/assets/images/testimonials/testimonials-img3.jpg') }}" alt="testimonials" />
                            <h3>Jonquil von</h3>
                            <span>Photographer</span>
                        </div>
                        <div class="quote"> <i class="flaticon-quote"></i></div>
                        <p>“Morbi porttitor ligula id varius consectetur. Integer ipsum justo, congue sit amet massa vel, porttitor semper magna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus.”</p>
                        <div class="rating">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonials Area End -->

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

        <!-- Instructors Area -->
        <div class="instructors-area instructors-area-rs pt-100 pb-70">
            <div class="container">
                <div class="section-title mb-45">
                    <h2>معرض <b>أعمالنا</b> </h2>
                </div>

                <div class="instructors-slider owl-carousel owl-theme">
                    <div class="instructors-card">
                        <a href="instructors-details.html">
                            <img src="{{ asset('frontend/assets/images/instructors/instructors-img1.jpg') }}" alt="Team Images">
                        </a>
                        <div class="content">
                            <ul class="instructors-social">
                                <li class="share-btn"><i class="ri-add-line"></i></li>

                            </ul>
                            <h3><a href="instructors-details.html">Sally welch</a></h3>
                            <span>Web designer</span>
                        </div>
                    </div>
                    <div class="instructors-card">
                        <a href="instructors-details.html">
                            <img src="{{ asset('frontend/assets/images/instructors/instructors-img2.jpg') }}" alt="Team Images">
                        </a>
                        <div class="content">
                            <ul class="instructors-social">
                                <li class="share-btn"><i class="ri-add-line"></i></li>

                            </ul>
                            <h3><a href="instructors-details.html">Jesse joslin</a></h3>
                            <span>Content strategist</span>
                        </div>
                    </div>
                    <div class="instructors-card">
                        <a href="instructors-details.html">
                            <img src="{{ asset('frontend/assets/images/instructors/instructors-img3.jpg') }}" alt="Team Images">
                        </a>
                        <div class="content">
                            <ul class="instructors-social">
                                <li class="share-btn"><i class="ri-add-line"></i></li>

                            </ul>
                            <h3><a href="instructors-details.html">Lance altman</a></h3>
                            <span>Photographer</span>
                        </div>
                    </div>
                    <div class="instructors-card">
                        <a href="instructors-details.html">
                            <img src="{{ asset('frontend/assets/images/instructors/instructors-img4.jpg') }}" alt="Team Images">
                        </a>
                        <div class="content">
                            <ul class="instructors-social">
                                <li class="share-btn"><i class="ri-add-line"></i></li>

                            </ul>
                            <h3><a href="instructors-details.html">Jonquil von</a></h3>
                            <span>Art director</span>
                        </div>
                    </div>
                    <div class="instructors-card">
                        <a href="instructors-details.html">
                            <img src="{{ asset('frontend/assets/images/instructors/instructors-img5.jpg') }}" alt="Team Images">
                        </a>
                        <div class="content">
                            <ul class="instructors-social">
                                <li class="share-btn"><i class="ri-add-line"></i></li>

                            </ul>
                            <h3><a href="instructors-details.html">Oliva welch</a></h3>
                            <span>Web designer</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Instructors Area End -->

                <!-- Contact Info Area -->
                <div class="contact-info-area pt-100 pb-70">
                    <div class="container">
                        <div class="section-title mb-45 text-center">
                            <h2>تواصل معنا</h2>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-4  col-12 col-sm-8">
                                <div class="contact-info-card">
                                    <i class="ri-map-pin-fill"></i>
                                    <h3>Our location </h3>
                                    <p>Ca 560 Bush St & 20th Ave, Apt 5</p>
                                    <p>San Francisco,230909, Canada</p>
                                </div>
                            </div>

                            <div class="col-lg-4 col-6">
                                <div class="contact-info-card">
                                    <i class="ri-mail-fill"></i>
                                    <h3>Email us</h3>
                                    <p><a href="mailto:hello@ledu.com">hello@ledu.com</a></p>
                                    <p><a href="mailto:info@ledu.com">info@ledu.com</a></p>
                                </div>
                            </div>

                            <div class="col-lg-4 col-6">
                                <div class="contact-info-card">
                                    <i class="ri-phone-fill"></i>
                                    <h3>Phone</h3>
                                    <p><a href="tel:+44587154756">+44 587 154756</a></p>
                                    <p><a href="tel:+44555514574">+44 5555 14574</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Contact Info Area End -->

                <!-- Contact Widget Area -->
                <div class="contact-widget-area pb-70">
                    <div class="container">
                        <div class="section-title text-center mb-45">
                            <span>ارسال رسالة</span>
                            <h2>Ready to get started?</h2>
                        </div>
                        <div class="contact-form">
                            <form id="contactForm">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control" required data-error="Please Enter Your Name" placeholder="Name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" class="form-control" required data-error="Please Enter Your Email" placeholder="Email">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="text" name="phone_number" id="phone_number" required data-error="Please Enter Your number" class="form-control" placeholder="Phone Number">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="7" required data-error="Write your message" placeholder="Your Message"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>


                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn">
                                            ارسال
                                        </button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Contact Widget Area End -->

                <!-- Contact Map Area -->
                <div class="contact-map-area pb-100">
                    <div class="container">
                        <div class="contact-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3152.972641599872!2d-122.40869708532713!3d37.790680919018435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085808bfb7cb35b%3A0x9b649f6a7d9c50e8!2s560%20Bush%20St%20%235%2C%20San%20Francisco%2C%20CA%2094108%2C%20USA!5e0!3m2!1sen!2sbd!4v1641381557316!5m2!1sen!2sbd"></iframe>
                        </div>
                    </div>
                </div>
                <!-- Contact Map Area End -->



@endsection
