    <!-- header-start -->
    <header>
        {{-- <h2>Hallo</h2> --}}
        <div class="header-area ">
            <div class="header-top_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-md-12 col-lg-8">
                            <div class="short_contact_list">
                                <ul>
                                    <li><a href="#"> <i class="fa fa-phone"></i>
                                            {{ $navbarContent->phone_number }}</a></li>
                                    <li><a href="#"> <i class="fa fa-envelope"></i>{{ $navbarContent->email }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-lg-4">
                            <div class="social_media_links d-none d-lg-block">
                                @foreach ($mediaSocials as $mediaSocial)
                                    <a href="{{ $mediaSocial->link }}" target="_blank" style="cursor: pointer;">
                                        <img src="{{ Storage::url($mediaSocial->icon ?? '') }}"
                                            style="width: 20px; height: 20px; object-fit: cover" alt="">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" style="background-color: #e7e7e7;" class="main-header-area">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3">
                            <div class="logo">
                                <a href="{{ route('home') }}">
                                    <img src="{{ Storage::url($navbarContent->logo ?? '') }}"
                                        style="width: 50px; height: 60px; object-fit: cover;" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9">
                            <div class="main-menu">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{ route('home') }}">Beranda</a></li>
                                        <li><a href="{{ route('user-about') }}">Tentang</a></li>
                                        {{-- <li><a href="#">blog <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">blog</a></li>
                                                <li><a href="single-blog.html">single-blog</a></li>
                                            </ul>
                                        </li> --}}
                                        {{-- <li><a href="#">pages <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="elements.html">elements</a></li>
                                                <li><a href="Cause.html">Cause</a></li>
                                            </ul>
                                        </li> --}}
                                        {{-- <li><a href="contact.html">Kontak</a></li> --}}
                                        {{-- <li>
                                            <a href="#">pages <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <div class="Appointment">
                                                    <div class="book_btn d-none d-lg-block">
                                                        @guest
                                                            <a href="{{ route('donate') }}">Donasi</a>
                                                        @endguest
                                                        @auth
                                                            <a href="#">{{ Auth::user()->name }}</a>
                                                        @endauth
                                                    </div>
                                                </div>
                                            </ul>
                                        </li> --}}
                                    </ul>
                                </nav>
                                <div class="Appointment">
                                    <div class="book_btn d-none d-lg-block">
                                        @guest
                                            <a href="{{ route('donate') }}">Donasi</a>
                                        @endguest
                                        @auth
                                            {{-- <a href="#">{{ Auth::user()->name }}</a> --}}
                                            {{-- <a href="#">Logout</a> --}}
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf

                                                <x-dropdown-link :href="route('logout')"
                                                    onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                                    {{ __('Logout') }}
                                                </x-dropdown-link>
                                            </form>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->
