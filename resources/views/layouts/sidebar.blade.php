{{-- @extends('layouts.app') --}}

{{-- @section('sidebar') --}}
<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">

        <div class="navbar-nav theme-brand flex-row  text-center">
            <div class="nav-logo">
                <div class="nav-item theme-logo">
                    <a href="{{ getRouterValue() }}dashboard/analytics">
                        <img src="{{ Vite::asset('resources/images/logo2.svg') }}" class="logo-light navbar-logo-g"
                            alt="logo">
                        <img src="{{ Vite::asset('resources/images/logo.svg') }}" class="logo-dark navbar-logo-g"
                            alt="logo">
                    </a>
                </div>
                <div class="nav-item theme-text">
                    <a href="{{ getRouterValue() }}dashboard" class="nav-link"> Admin </a>
                </div>
            </div>
            <div class="nav-item sidebar-toggle">
                <div class="btn-toggle sidebarCollapse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-chevrons-left">
                        <polyline points="11 17 6 12 11 7"></polyline>
                        <polyline points="18 17 13 12 18 7"></polyline>
                    </svg>
                </div>
            </div>
        </div>

        <div class="profile-info">
            <div class="user-info">
                <div class="profile-img">
                    <img src="{{ Vite::asset('resources/images/profile-30.png') }}" alt="avatar">
                </div>
                <div class="profile-content">
                    <h6 class="">Shaun Park</h6>
                    <p class="">Project Leader</p>
                </div>
            </div>
        </div>

        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu {{ $catName === 'dashboard' ? 'active' : '' }}">
                <a href="/dashboard" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>{{ __('menu.home') }}</span>
                    </div>
                </a>
            </li>

            <li class="menu {{ isset($submenu) && $submenu === 'site-settings' ? 'active' : '' }}">
                <a href="#site-settings" data-bs-toggle="collapse"
                    aria-expanded="{{ isset($submenu) && $submenu === 'site-settings' ? 'true' : 'false' }}"
                    class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-settings">
                            <path
                                d="M19.14 12.936l1.423-1.423c.276-.277.294-.717.06-1.022l-2.557-3.577a1.001 1.001 0 0 0-1.3-.359l-2.739 1.639a5.034 5.034 0 0 0-1.145-.735l-.09-3.086c-.02-.784-.672-1.415-1.463-1.413l-3.018-.01a1.488 1.488 0 0 0-1.45 1.521l.095 2.894a4.99 4.99 0 0 0-1.326.764l-2.786-1.637a1.005 1.005 0 0 0-1.312.357l-2.563 3.577a.77.77 0 0 0 .053 1.022l1.42 1.423c-.025.076-.057.146-.057.229 0 1.104.896 2 2 2s2-.896 2-2c0-.083-.032-.153-.057-.229zM12 15.003a3 3 0 1 1 3-3 3 3 0 0 1-3 3z">
                            </path>
                        </svg>
                        <span>{{ __('menu.site_settings') }}</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ isset($submenu) && $submenu === 'site-settings' ? 'show' : '' }}"
                    id="site-settings" data-bs-parent="#accordionExample">
                    <li class="menu {{ $catName === 'dashboard' ? 'active' : '' }}">

                    <li class="{{ Request::routeIs('admin.settings.site-info') ? 'active' : '' }}">
                        <a href="{{ route('admin.settings.index') }}">{{ __('menu.site_info') }}</a>
                    </li>
            </li>
            <li class="{{ Request::routeIs('reviews') ? 'active' : '' }}">
                <a href="{{ route('admin.stories.index') }}">{{ __('menu.opinions') }}</a>
            </li>
            <li class="{{ Request::routeIs('pages') ? 'active' : '' }}">
                <a href="{{ route('admin.pages.index') }}">{{ __('menu.pages') }}</a>
            </li>
            <li class="{{ Request::routeIs('languages') ? 'active' : '' }}">
                <a href="{{ route('admin.languages.index') }}">{{ __('menu.languages') }}</a>
            </li>
            <li class="{{ Request::routeIs('faq') ? 'active' : '' }}">
                <a href="{{ route('admin.faqs.index') }}">{{ __('menu.faq') }}</a>
            </li>
            <li class="{{ Request::routeIs('messages') ? 'active' : '' }}">
                <a href="{{ route('admin.contact_us.index') }}">{{ __('menu.messages') }}</a>
            </li>
            <li class="{{ Request::routeIs('ratings') ? 'active' : '' }}">
                <a href="{{ route('admin.reviews.index') }}">{{ __('menu.ratings') }}</a>
            </li>
            <li class="{{ Request::routeIs('admins') ? 'active' : '' }}">
                <a href="{{ route('admin.admins.index') }}">{{ __('menu.admins') }}</a>
            </li>
            <li class="{{ Request::routeIs('payments') ? 'active' : '' }}">
                <a href="{{ route('admin.payments.index') }}">{{ __('menu.payments') }}</a>
            </li>
            <li class="{{ Request::routeIs('clients') ? 'active' : '' }}">
                <a href="{{ route('admin.clients.index') }}">{{ __('menu.clients') }}</a>
            </li>
            <li class="{{ Request::routeIs('top-menu') ? 'active' : '' }}">
                <a href="{{ route('admin.top-menu.index') }}">{{ __('menu.top_menu') }}</a>
            </li>
        </ul>

        <li class="menu {{ isset($submenu) && $submenu === 'statistics' ? 'active' : '' }}">
            <a href="#statistics" data-bs-toggle="collapse"
                aria-expanded="{{ isset($submenu) && $submenu === 'statistics' ? 'true' : 'false' }}"
                class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-bar-chart-2">
                        <path d="M21 20h-18M3 10h3v10H3zM9 6h3v14H9zM15 3h3v17h-3z"></path>
                    </svg>
                    <span>{{ __('menu.statistics') }}</span>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-chevron-right">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </div>
            </a>
            <ul class="collapse submenu list-unstyled {{ isset($submenu) && $submenu === 'statistics' ? 'show' : '' }}"
                id="statistics" data-bs-parent="#accordionExample">
                <li class="{{ Request::routeIs('all-statistics') ? 'active' : '' }}">
                </li>
            </ul>
        </li>

        <li class="menu {{ isset($submenu) && $submenu === 'home' ? 'active' : '' }}">
            <a href="#home" data-bs-toggle="collapse"
                aria-expanded="{{ isset($submenu) && $submenu === 'home' ? 'true' : 'false' }}"
                class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    <span>{{ __('menu.main_page') }}</span>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-chevron-right">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </div>
            </a>
            <ul class="collapse submenu list-unstyled {{ isset($submenu) && $submenu === 'home' ? 'show' : '' }}"
                id="home" data-bs-parent="#accordionExample">
                <li class="{{ Request::routeIs('slider') ? 'active' : '' }}">
                    <a href="{{ route('admin.sliders.index') }}">{{ __('menu.slider') }}</a>
                </li>
                <li class="{{ Request::routeIs('home-sections') ? 'active' : '' }}">
                    <a href="{{ route('admin.homepage_widgets.index') }}">{{ __('menu.home_sections') }}</a>
                </li>
                <li class="{{ Request::routeIs('our-services') ? 'active' : '' }}">
                    <a href="{{ route('admin.services.index') }}">{{ __('menu.our_services') }}</a>
                </li>
                <li class="{{ Request::routeIs('image-gallery') ? 'active' : '' }}">
                    <a href="{{ getRouterValue() }}home/image-gallery">{{ __('menu.image_gallery') }}</a>
                </li>
            </ul>
        </li>

        <li class="menu {{ isset($submenu) && $submenu === 'projects' ? 'active' : '' }}">
            <a href="#projects" data-bs-toggle="collapse"
                aria-expanded="{{ isset($submenu) && $submenu === 'projects' ? 'true' : 'false' }}"
                class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-briefcase">
                        <path d="M10 3h4v4h-4z"></path>
                        <path d="M3 7h18v10H3z"></path>
                        <path d="M4 11h16v4H4z"></path>
                    </svg>
                    <span>{{ __('menu.projects') }}</span>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-chevron-right">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </div>
            </a>
            <ul class="collapse submenu list-unstyled {{ isset($submenu) && $submenu === 'projects' ? 'show' : '' }}"
                id="projects" data-bs-parent="#accordionExample">
                <li class="{{ Request::routeIs('new-project') ? 'active' : '' }}">
                    <a>
                        <span>{{ __('menu.new_project') }}</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu {{ isset($submenu) && $submenu === 'articles' ? 'active' : '' }}">
            <a href="#articles" data-bs-toggle="collapse"
                aria-expanded="{{ isset($submenu) && $submenu === 'articles' ? 'true' : 'false' }}"
                class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-file-text">
                        <path d="M4 4h16v16H4z"></path>
                        <path d="M4 4l16 16"></path>
                        <path d="M12 12h4"></path>
                        <path d="M12 16h4"></path>
                        <path d="M8 12h4"></path>
                        <path d="M8 16h4"></path>
                    </svg>
                    <span>{{ __('menu.articles') }}</span>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-chevron-right">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </div>
            </a>

            <ul class="collapse submenu list-unstyled {{ isset($submenu) && $submenu === 'articles' ? 'show' : '' }}"
                id="articles" data-bs-parent="#accordionExample">
                <li class="{{ Request::routeIs('articles.index') ? 'active' : '' }}">
                    <a> <span>{{ __('menu.articles') }}</span></a>
                </li>
                <li class="{{ Request::routeIs('categories.index') ? 'active' : '' }}">
                    <a>
                        <span>{{ __('menu.article_categories') }}</span>
                    </a>
                </li>
            </ul>
        </li>
        </ul>
    </nav>
</div>
{{-- @endsection --}}
