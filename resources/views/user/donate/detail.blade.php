<meta property="og:title" content="{{ $causeById->title }}" />
<meta property="og:description" content="{{ $causeById->description }}" />
{{-- <meta property="og:image" content="{{ asset('storage/' . $causeById->image) }}" /> --}}
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:type" content="article" />


<!-- bradcam_area_start  -->
<div class="container">
    <div class="row" style="margin-top: 70px">
        <div class="col-lg-12">
            <div class="causes_active owl-carousel">
                @foreach ($causesList as $cause)
                    <div class="single_cause">
                        <div class="thumb">
                            <img src="{{ Storage::url($cause->cause_image ?? '') }}"
                                style="height: 250px; object-fit: cover; cursor: pointer;" alt="Cause Image"
                                loading="lazy" class="gallery-image" data-bs-toggle="modal" data-bs-target="#imageModal"
                                data-bs-image="{{ Storage::url($cause->cause_image ?? '') }}">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->

    <!-- popular_causes_area_start  -->
    <div class="popular_causes_area cause_details ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="single_cause">
                        <div class="causes_content">
                            <div class="custom_progress_bar">
                                <?php
                                $percent = $causeById->raised > 0 ? ($causeById->raised / $causeById->goal) * 100 : 0;
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: {{ $percent }}%;"
                                        aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100">
                                        <span class="progres_count">
                                            {{ round($percent) }}%
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="balance d-flex justify-content-between align-items-center">
                                <span style="color: #f8004c;"><b>Terkumpul</b> :
                                    {{ rupiahFormat($causeById->raised) }}</span>
                                <span style="color: #f8004c;"><b>Target:
                                    </b>{{ rupiahFormat($causeById->goal) }}</span>
                            </div>
                            <div style="margin-bottom: 30px">
                                <small><b style="color: rgb(106, 105, 105)">Sisa Hari:
                                        5</b></small>
                            </div>
                            <h4>{{ $causeById->title }}</h4>
                            <p style="font-size: 20px;">{{ $causeById->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popular_causes_area_end  -->

    @if ($causeVideos->isNotEmpty())
        <hr>
        <div class="row mx-4">
            <div class="col-lg-12">
                @foreach ($causeVideos as $video)
                    <video width="320" height="240" controls class="mx-3 my-2">
                        <source src="{{ asset($video->image) }}" type="video/mp4">
                        <source src="{{ asset($video->image) . '.ogg' }}" type="video/ogg">
                    </video>
                @endforeach
            </div>
        </div>
        <hr>
    @endif

    @if ($now <= $causeById->expired_date && $causeById->raised < $causeById->goal)
        <div class="make_donation_area section_padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section_title text-center mb-cus">
                            <h3><span>Ayo Donasi</span></h3>
                        </div>
                        <div class="section_title text-center">
                            <small>Dibawah Rp. 51.000 hanya bisa menggunakan gopay / qris</small>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-12">
                        <div class="d-flex flex-column align-items-center">
                            <p><b class="text-dark" style="font-size: 30px;">Pilih nominal donasi.</b></p>

                            @foreach ($donatePrices as $donatePrice)
                                <form action="{{ route('api-payments', $causeById->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="d-flex align-items-center mb-2">
                                        <input type="hidden" name="price" value="{{ $donatePrice->price }}">
                                        <input type="text" style="font-size: 20px" class="form-control"
                                            value="{{ rupiahFormat($donatePrice->price) }}" readonly>
                                        <button type="submit" class="customButton ml-2"><i class="fa fa-arrow-right"
                                                aria-hidden="true"></i></button>
                                    </div>
                                </form>
                            @endforeach

                            {{-- <form action="{{ route('api-payments', $causeById->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="d-flex align-items-center mb-2">
                                    <input type="hidden" name="price" value="1000">
                                    <input type="text" style="font-size: 20px" class="form-control" value="Rp. 1.000"
                                        readonly>
                                    <button type="submit" class="customButton ml-2"><i class="fa fa-arrow-right"
                                            aria-hidden="true"></i></button>
                                </div>
                            </form>
                            <form action="{{ route('api-payments', $causeById->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="d-flex align-items-center mb-2">
                                    <input type="hidden" name="price" value="20000">
                                    <input type="text" style="font-size: 20px" class="form-control"
                                        value="Rp. 20.000" readonly>
                                    <button type="submit" class="ml-2 customButton"><i class="fa fa-arrow-right"
                                            aria-hidden="true"></i></button>
                                </div>
                            </form>
                            <form action="{{ route('api-payments', $causeById->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="d-flex align-items-center mb-2">
                                    <input type="hidden" name="price" value="30000">
                                    <input type="text" style="font-size: 20px" class="form-control"
                                        value="Rp. 30.000" readonly>
                                    <button type="submit" class="customButton ml-2"><i class="fa fa-arrow-right"
                                            aria-hidden="true"></i></button>
                                </div>
                            </form>
                            <form action="{{ route('api-payments', $causeById->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="d-flex align-items-center mb-2">
                                    <input type="hidden" name="price" value="50000">
                                    <input type="text" style="font-size: 20px" class="form-control"
                                        value="Rp. 50.000" readonly>
                                    <button type="submit" class="customButton ml-2"><i class="fa fa-arrow-right"
                                            aria-hidden="true"></i></button>
                                </div>
                            </form> --}}
                        </div>
                    </div>
                </div>

                <form action="{{ route('api-payments', $causeById->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex justify-content-center">
                                <p><b class="text-dark" style="font-size: 25px">Masukan nominal donasi.</b></p>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="d-flex col-lg-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Rp</span>
                                    </div>
                                    <input type="text" style="font-size: 20px" class="form-control" name="price"
                                        aria-label="Username" aria-describedby="basic-addon1" id="rupiah"
                                        autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="donate_now_btn text-center">
                                <button type="submit" class="customButton"
                                    style="font-size: 20px; font-weight: bold">Donasi
                                    Sekarang</button>
                            </div>
                        </div>
                    </div>
                </form>

                @php
                    $shareButtons = \Share::page(url()->current(), 'Bagikan yuk!')
                        ->whatsapp()
                        ->facebook()
                        ->twitter()
                        ->telegram();
                @endphp

                {{-- {!! $shareButtons !!} --}}
                {{-- {!! str_replace('<a ', '<a target="_blank" rel="noopener noreferrer" ', $shareButtons) !!} --}}
                <div class="d-flex gap-2">
                    Bagikan Via :
                    <a href="https://www.whatsapp.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                        target="_blank" rel="noopener noreferrer" class="text-blue-600">
                        <i class="fa fa-whatsapp" aria-hidden="true"></i>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                        target="_blank" rel="noopener noreferrer" class="text-blue-600">
                        <i class="fa fa-facebook-official" aria-hidden="true"></i>
                    </a>

                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}" target="_blank"
                        rel="noopener noreferrer" class="text-blue-400">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    @endif
    {{-- <p>Share Via : </p>
    <a href="https://wa.me/?text={{ urlencode(Request::fullUrl()) }}" target="_blank">
        <i class="fa fa-whatsapp" aria-hidden="true"></i>
    </a>
    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" target="_blank">
        <i class="fa fa-facebook-square" aria-hidden="true"></i>
    </a> --}}

    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="" id="modalImage" style="width: 500px; height: 500px; object-fit: cover;"
                        class="img-fluid" alt="Gallery Image">
                </div>
            </div>
        </div>
    </div>

</div>
