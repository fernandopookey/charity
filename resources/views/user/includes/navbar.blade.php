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
                                            {{ $about->phone }}</a></li>
                                    <li><a href="#"> <i class="fa fa-envelope"></i>{{ $about->email }}</a>
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
            <div id="sticky-header" style="background-color: #fdfafb; border: 0.1px solid #e9e9e9;"
                class="main-header-area">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3">
                            <div class="logo">
                                <a href="{{ route('home') }}">
                                    <img src="{{ Storage::url($about->logo ?? '') }}"
                                        style="width: 50px; height: 60px; object-fit: cover;" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9">
                            <div class="main-menu">
                                <nav class="">
                                    <ul id="navigation">
                                        <li><a style="text-decoration: none;" href="{{ route('home') }}">Beranda</a>
                                        </li>
                                        <li><a style="text-decoration: none;"
                                                href="{{ route('user-about') }}">Tentang</a></li>
                                        <li><a style="text-decoration: none;"
                                                href="{{ route('our-gallery') }}">Gallery</a></li>
                                        <li><a style="text-decoration: none;" href="{{ route('user-contact') }}">Hubungi
                                                Kami</a></li>
                                        <li><a style="text-decoration: none;"
                                                href="{{ route('terms&conditions') }}">Terms
                                                & Conditions</a></li>
                                    </ul>
                                </nav>
                                <div class="Appointment">
                                    <div class="book_btn d-none d-lg-block" style="margin-bottom: 12px;">
                                        @guest
                                            <a href="{{ route('donate') }}" style="text-decoration: none;">Donasi</a>
                                        @endguest
                                        @auth
                                            {{-- <a href="#">{{ Auth::user()->name }}</a> --}}
                                            {{-- <a href="#">Logout</a> --}}
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <x-dropdown-link :href="route('logout')" style="text-decoration: none;"
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
                            <div class="mobile_menu d-block d-lg-none">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->
