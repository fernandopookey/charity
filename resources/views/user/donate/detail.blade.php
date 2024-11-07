<!-- bradcam_area_start  -->
{{-- <div class="bradcam_area breadcam_bg overlay d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Donate Detail</h3>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="container">
    <div class="row" style="margin-top: 70px">
        <div class="col-lg-12">
            <div class="causes_active owl-carousel">
                @foreach ($causesList as $cause)
                    <div class="single_cause">
                        <div class="thumb">
                            <img src="{{ asset($cause->cause_image) ?? '' }}" style="height: 250px; object-fit: cover;"
                                alt="Cause Image" loading="lazy" class="gallery-image" data-bs-toggle="modal"
                                data-bs-target="#imageModal" data-bs-image="{{ asset($cause->cause_image) ?? '' }}">
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
                        {{-- <div class="thumb">
                        <img src="{{ asset('charifit-master/img/causes/large_img.png') }}" alt="">
                    </div> --}}
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
                                <span style="color: #f8004c;"><b>Target: </b>{{ rupiahFormat($causeById->goal) }}</span>
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

    {{-- <div class="row" style="margin-top: 70px">
    <div class="col-lg-12">
        <div class="causes_active owl-carousel">
            @foreach ($causeVideos as $causeVideo)
                <div class="video-container" style="position: relative; display: inline-block;">
                    <video width="320" height="240" controls class="mx-3 my-2">
                        <source src="{{ asset($causeVideo->image) }}" type="video/mp4">
                        <source src="{{ asset($causeVideo->image) . '.ogg' }}" type="video/ogg">
                    </video>
                </div>
            @endforeach
        </div>
    </div>
</div> --}}

    {{-- @if ($causeById()) --}}
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

    {{-- @if ($raised < $cause->goal || $expiredDate > $now) --}}
    {{-- @if ($raised < $cause->goal && $now <= $expiredDate) --}}
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
                {{-- <div class="row justify-content-center">
            <div class="col-lg-6">
                <form action="#" class="donation_form">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="single_amount">
                                <div class="input_field">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input type="text" class="form-control" name="nominal" aria-label="Username"
                                            aria-describedby="basic-addon1" id="rupiah" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="single_amount">
                                <div class="fixed_donat d-flex align-items-center justify-content-between">
                                    <div class="select_prise">
                                        <h4>Select Amount:</h4>
                                    </div>
                                    <div class="single_doonate">
                                        <input type="radio" id="blns_1" name="radio-group" checked>
                                        <label for="blns_1">10</label>
                                    </div>
                                    <div class="single_doonate">
                                        <input type="radio" id="blns_2" name="radio-group" checked>
                                        <label for="blns_2">30</label>
                                    </div>
                                    <div class="single_doonate">
                                        <input type="radio" id="Other" name="radio-group" checked>
                                        <label for="Other">Other</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div> --}}
                <div class="row mb-4">
                    <div class="col-lg-12">
                        <div class="d-flex flex-column align-items-center">
                            <p><b class="text-dark" style="font-size: 30px;">Pilih nominal donasi.</b></p>
                            <form action="{{ route('api-payments', $causeById->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="d-flex align-items-center mb-2">
                                    <input type="hidden" name="price" value="10000">
                                    <input type="text" style="font-size: 20px" class="form-control"
                                        value="Rp. 10.000" readonly>
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
                            </form>
                        </div>
                    </div>
                </div>


                {{-- <h1>{{ $now }}</h1>
            <h1>{{ $causeById->expired_date }}</h1> --}}


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
                                    <input type="text" style="font-size: 20px" class="form-control"
                                        name="price" aria-label="Username" aria-describedby="basic-addon1"
                                        id="rupiah" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="donate_now_btn text-center">
                                {{-- <a href="#" class="boxed-btn4">Donasi Sekarang</a> --}}
                                <button type="submit" class="customButton"
                                    style="font-size: 20px; font-weight: bold">Donasi
                                    Sekarang</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    @endif

    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="" id="modalImage" style="width: 500px; height: 500px; object-fit: cover;"
                        class="img-fluid" alt="Gallery Image">
                </div>
            </div>
        </div>
    </div>
    {{-- @endif --}}

</div>
