@php
    $currentLang = $languages->firstWhere('shortcut', app()->getLocale());
@endphp

<!-- Start Navbar Area -->
   <div class="navbar-area">
    <div class="mobile-responsive-nav">
        <div class="container">
           <div class="mobile-responsive-menu">
                <div class="logo">
                    <a href="index.html">
                        <img src="{{ asset('frontend/assets/images/logos/logo-small.png') }}" class="logo-one" alt="logo">
                        <img src="{{ asset('frontend/assets/images/logos/logo-small-white.png') }}" class="logo-two" alt="logo">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="desktop-nav nav-area">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light ">
                <a class="navbar-brand" href="index.html">
                    <img src="{{ asset('frontend/assets/images/logos/logo.png') }}" class="logo-one" alt="Logo">
                    <img src="{{ asset('frontend/assets/images/logos/logo-2.png') }}" class="logo-two" alt="Logo">
                </a>

                <div class="nav-widget-form">
                    <form class="search-form search-form-bg2">
                        <input type="search" class="form-control" placeholder="Search courses">
                        <button type="submit">
                            <i class="ri-search-line"></i>
                        </button>
                    </form>
                </div>

                <div class="navbar-category">
                    <div class="dropdown category-list-dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButtoncategory" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class='flaticon-list'></i>
                            Categories
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButtoncategory">
                            <a href="courses-details.html" class="nav-link-item">
                                <i class="flaticon-web-development"></i>
                                Development
                            </a>
                            <a href="courses-details.html">
                                <i class="flaticon-design"></i>
                                Web designing
                            </a>
                            <a href="courses-details.html">
                                <i class="flaticon-wellness"></i>
                                Lifestyle
                            </a>
                            <a href="courses-details.html">
                                <i class="flaticon-heart-beat"></i>
                                Health & fitness
                            </a>
                            <a href="courses-details.html">
                                <i class="flaticon-folder"></i>
                                Data science
                            </a>
                            <a href="courses-details.html">
                                <i class="flaticon-user"></i>
                                Accounting
                            </a>
                            <a href="courses-details.html">
                                <i class="flaticon-camera"></i>
                                Photography
                            </a>
                            <a href="courses-details.html">
                                <i class="flaticon-corporate"></i>
                                Marketing
                            </a>
                        </div>
                    </div>
                </div>

                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle active">
                                Home
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="index.html" class="nav-link">
                                        Home Demo - 1
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="index-2.html" class="nav-link active">
                                        Home Demo - 2
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="index-3.html" class="nav-link">
                                        Home Demo - 3
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                           <a href="#" class="nav-link dropdown-toggle">
                                Pages
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="about.html" class="nav-link">
                                        About Us
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="testimonials.html" class="nav-link">
                                        Testimonials
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="faq.html" class="nav-link">
                                        FAQ
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="cart.html" class="nav-link">
                                        Cart
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="checkout.html" class="nav-link">
                                        Checkout
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">
                                        Instructors
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="instructors.html" class="nav-link">
                                                Instructors
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="instructors-details.html" class="nav-link">
                                                Instructors Details
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="pricing.html" class="nav-link">
                                        Pricing Plan
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">
                                        User
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="signin.html" class="nav-link">
                                                Sign in
                                            </a>
                                        </li>
                                       <li class="nav-item">
                                            <a href="signup.html" class="nav-link">
                                                Sign Up
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="forgot-password.html" class="nav-link">
                                                Forgot Password
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="terms-condition.html" class="nav-link">
                                        Terms & Conditions
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="privacy-policy.html" class="nav-link">
                                        Privacy Policy
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="404.html" class="nav-link">
                                        404 Page
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="coming-soon.html" class="nav-link">
                                        Coming Soon
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">
                                Courses
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                <a href="courses.html" class="nav-link">
                                        Courses
                                </a>
                                </li>
                                <li class="nav-item">
                                    <a href="courses-list.html" class="nav-link">
                                        Courses List
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="courses-sidebar.html" class="nav-link">
                                        Courses Sidebar
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="courses-details.html" class="nav-link">
                                        Courses Details
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">
                                Event
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="event.html" class="nav-link">Event</a>
                                </li>
                                <li class="nav-item">
                                    <a href="event-details.html" class="nav-link">Event Details</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                              <a href="#" class="nav-link dropdown-toggle">
                                Blog                                   </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="blog.html" class="nav-link">
                                        Blog Grid
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="blog-2.html" class="nav-link">
                                        Blog Left Sidebar
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="blog-3.html" class="nav-link">
                                        Blog Right Sidebar
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="author.html" class="nav-link">
                                        Author
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="categories.html" class="nav-link">
                                        Categories
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="tags.html" class="nav-link">
                                        Tags
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">
                                        Single Blog
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="single-blog-1.html" class="nav-link">
                                                Default
                                            </a>
                                        </li>
                                       <li class="nav-item">
                                            <a href="single-blog-2.html" class="nav-link">
                                                With Video
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="single-blog-3.html" class="nav-link">
                                                With Images Slider
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <img src="{{ asset('frontend/images/languages/' . $currentLang->flag) }}" alt="{{ $currentLang->name }}" width="20">
                                {{ $currentLang->name }}
                            </a>
                            <ul class="dropdown-menu">
                                @foreach($languages as $lang)
                                    <li class="dropdown-item">
                                        <a href="{{ route('language.change', $lang->shortcut) }}" class="d-flex align-items-center gap-1">
                                            <img src="{{ asset('frontend/images/languages/' . $lang->flag) }}" alt="{{ $lang->name }}" width="20">

                                            {{ $lang->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>


                        <li class="nav-item">
                            <a href="contact.html" class="nav-link">
                                Contact Us
                            </a>
                        </li>
                    </ul>

                    <div class="others-options d-flex align-items-center">
                        <div class="optional-item">
                            <a href="signup.html" class="default-btn two border-radius-5">Sign Up</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="side-nav-responsive">
        <div class="container">
            <div class="dot-menu">
                <div class="circle-inner">
                    <div class="circle circle-one"></div>
                    <div class="circle circle-two"></div>
                    <div class="circle circle-three"></div>
                </div>
            </div>

            <div class="container">
                <div class="side-nav-inner">
                    <div class="side-nav justify-content-center align-items-center">
                        <div class="side-item">
                            <form class="search-form">
                                <input type="search" class="form-control" placeholder="Search courses">
                                <button type="submit">
                                    <i class="ri-search-line"></i>
                                </button>
                            </form>
                        </div>

                        <div class="side-item">
                            <a href="signup.html" class="default-btn two">Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Navbar Area -->
