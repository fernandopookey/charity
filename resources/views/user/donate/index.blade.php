    <!-- bradcam_area_start  -->
    <div class="bradcam_area breadcam_bg overlay d-flex align-items-center justify-content-center container">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Tujuan Donasi</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->

    <!-- popular_causes_area_start  -->
    <div class="popular_causes_area pt-120">
        <div class="container">
            <div class="row">
                @foreach ($causes as $cause)
                    <div class="col-lg-4 col-md-6">
                        <div class="single_cause">
                            <div class="thumb">
                                <img src="{{ $cause->causeImage->image ?? '' }}"
                                    style="height: 250px; object-fit: cover;" alt="Cause Image" loading="lazy"
                                    class="gallery-image" data-bs-toggle="modal" data-bs-target="#imageModal"
                                    data-bs-image="{{ $cause->causeImage->image ?? '' }}">
                            </div>
                            <div class="causes_content">
                                {{-- <div class="custom_progress_bar">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 30%;"
                                            aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                            <span class="progres_count">
                                                30%
                                            </span>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="balance d-flex justify-content-between align-items-center">
                                    <span style="color: #f8004c;">Terkumpul :
                                        {{ rupiahFormat($causesWithRaised[$cause->id] ?? 0) }}</span>
                                    <span style="color: #f8004c;">Goal: {{ rupiahFormat($cause->goal) }} </span>
                                </div>
                                {{-- <p>Sisa Hari: 3</p> --}}
                                <h4>{{ \Illuminate\Support\Str::limit($cause->title, 28) }}</h4>
                                <p>{{ \Illuminate\Support\Str::limit($cause->description, 43) }}</p>
                                {{-- {{ \Illuminate\Support\Str::limit($product ?? '',500,' ...') }} --}}
                                <a class="read_more" href="{{ route('user-cause-detail', $cause->id) }}">Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- popular_causes_area_end  -->


    {{-- <div data-scroll-index='1' class="make_donation_area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-55">
                        <h3><span>Make a Donation</span></h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form action="#" class="donation_form">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <div class="single_amount">
                                    <div class="input_field">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">$</span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="40,200"
                                                aria-label="Username" aria-describedby="basic-addon1">
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
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="donate_now_btn text-center">
                        <a href="#" class="boxed-btn4">Donate Now</a>
                    </div>
                </div>

            </div>
        </div>
    </div> --}}
