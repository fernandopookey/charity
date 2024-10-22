@include('sweetalert::alert')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>{{ $title }}</h1>
        {{-- <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav> --}}
    </div><!-- End Page Title -->

    @if ($content)
        @include($content)
    @endif

</main><!-- End #main -->
