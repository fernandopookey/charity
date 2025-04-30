<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-heading">Main Menu</li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('dashboard') ? 'active' : 'collapsed' }}" href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">Content Management</li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('cause.index') ? 'active' : 'collapsed' }}"
                href="{{ route('cause.index') }}">
                <i class="fa fa-heart" aria-hidden="true"></i>
                <span>Cause</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('help-reasons.index') ? 'active' : 'collapsed' }}"
                href="{{ route('help-reasons.index') }}">
                <i class="fa fa-handshake-o" aria-hidden="true"></i>
                <span>Visi & Misi</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('about.index') ? 'active' : 'collapsed' }}"
                href="{{ route('about.index') }}">
                <i class="fa fa-info-circle" aria-hidden="true"></i>
                <span>About</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('media-socials.index') ? 'active' : 'collapsed' }}"
                href="{{ route('media-socials.index') }}">
                <i class="fa fa-link" aria-hidden="true"></i>
                <span>Media Sosial</span>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link {{ Route::is('slider.index') ? 'active' : 'collapsed' }}"
                href="{{ route('slider.index') }}">
                <i class="fa fa-file-image-o" aria-hidden="true"></i>
                <span>Slider</span>
            </a>
        </li> --}}
        <li class="nav-heading">Gallery Management</li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('gallery-categories.index') ? 'active' : 'collapsed' }}"
                href="{{ route('gallery-categories.index') }}">
                <i class="fa fa-picture-o" aria-hidden="true"></i>
                <span>Gallery Category</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('gallery.index') ? 'active' : 'collapsed' }}"
                href="{{ route('gallery.index') }}">
                <i class="fa fa-picture-o" aria-hidden="true"></i>
                <span>Gallery</span>
            </a>
        </li>
        <li class="nav-heading">Donation & Transaction</li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('transactions.index') ? 'active' : 'collapsed' }}"
                href="{{ route('transactions.index') }}">
                <i class="fa fa-money" aria-hidden="true"></i>
                <span>Transaksi</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('donation-price') ? 'active' : 'collapsed' }}"
                href="{{ route('donation-price.index') }}">
                <i class="fa fa-money" aria-hidden="true"></i>
                <span>Donation Price</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('transaction-report') ? 'active' : 'collapsed' }}"
                href="{{ route('transaction-report') }}">
                <i class="fa fa-book" aria-hidden="true"></i>
                <span>Transaction Report</span>
            </a>
        </li>
        <li class="nav-heading">User Management</li>
        {{-- <li class="nav-item">
            <a class="nav-link {{ Route::is('home-video.index') ? 'active' : 'collapsed' }}"
                href="{{ route('home-video.index') }}">
                <i class="fa fa-file-video-o" aria-hidden="true"></i>
                <span>Home Video</span>
            </a>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link {{ Route::is('users.index') ? 'active' : 'collapsed' }}"
                href="{{ route('users.index') }}">
                <i class="fa fa-users" aria-hidden="true"></i>
                <span>User</span>
            </a>
        </li>
    </ul>

</aside><!-- End Sidebar-->
