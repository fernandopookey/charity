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
<div class="row" style="margin-top: 70px">
    <div class="col-lg-12">
        <div class="causes_active owl-carousel">
            @foreach ($causeImages as $causeImage)
                <div class="single_cause">
                    <div class="thumb">
                        <img src="{{ asset($causeImage->image) }}" style="height: 250px; object-fit: cover;"
                            alt="Cause Image">
                    </div>
                    {{-- <div class="causes_content">
                    <div class="custom_progress_bar">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 30%;" aria-valuenow="30"
                                aria-valuemin="0" aria-valuemax="100">
                                <span class="progres_count">
                                    30%
                                </span>
                            </div>
                        </div>
                    </div>
                </div> --}}
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
                        <div class="balance d-flex justify-content-between align-items-center">
                            <span style="color: #f8004c;"><b>Terkumpul</b> : {{ rupiahFormat($raised) }}</span>
                            <span style="color: #f8004c;"><b>Target: </b>{{ rupiahFormat($cause->goal) }}</span>
                        </div>
                        <h4>{{ $cause->title }}</h4>
                        <p>{{ $cause->description }}</p>

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

<hr>
<div class="row mx-4">
    <div class="col-lg-12">
        @foreach ($causeVideos as $causeVideo)
            <video width="320" height="240" controls class="mx-3 my-2">
                <source src="{{ asset($causeVideo->image) }}" type="video/mp4">
                <source src="{{ asset($causeVideo->image) . '.ogg' }}" type="video/ogg">
            </video>
        @endforeach
    </div>
</div>

<hr>


<div class="make_donation_area section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb-55">
                    <h3><span>Ayo Donasi</span></h3>
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
                    <p><b class="text-dark">Pilih nominal donasi.</b></p>
                    <form action="{{ route('api-payments', $cause->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex align-items-center mb-2">
                            <input type="hidden" name="price" value="10000">
                            <input type="text" class="form-control" value="Rp. 10.000" readonly>
                            <button type="submit" class="customButton ml-2"><i class="fa fa-arrow-right"
                                    aria-hidden="true"></i></button>
                        </div>
                    </form>
                    <form action="{{ route('api-payments', $cause->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex align-items-center mb-2">
                            <input type="hidden" name="price" value="20000">
                            <input type="text" class="form-control" value="Rp. 20.000" readonly>
                            <button type="submit" class="ml-2 customButton"><i class="fa fa-arrow-right"
                                    aria-hidden="true"></i></button>
                        </div>
                    </form>
                    <form action="{{ route('api-payments', $cause->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex align-items-center mb-2">
                            <input type="hidden" name="price" value="30000">
                            <input type="text" class="form-control" value="Rp. 30.000" readonly>
                            <button type="submit" class="customButton ml-2"><i class="fa fa-arrow-right"
                                    aria-hidden="true"></i></button>
                        </div>
                    </form>
                    <form action="{{ route('api-payments', $cause->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex align-items-center mb-2">
                            <input type="hidden" name="price" value="50000">
                            <input type="text" class="form-control" value="Rp. 50.000" readonly>
                            <button type="submit" class="customButton ml-2"><i class="fa fa-arrow-right"
                                    aria-hidden="true"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>




        <form action="{{ route('api-payments', $cause->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-center">
                        <p><b class="text-dark">Masukan nominal donasi.</b></p>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="d-flex col-lg-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Rp</span>
                            </div>
                            <input type="text" class="form-control" name="price" aria-label="Username"
                                aria-describedby="basic-addon1" id="rupiah" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="donate_now_btn text-center">
                        {{-- <a href="#" class="boxed-btn4">Donasi Sekarang</a> --}}
                        <button type="submit" class="customButton" style="font-size: 20px; font-weight: bold">Donasi
                            Sekarang</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
