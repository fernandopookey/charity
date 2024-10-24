<!-- slider_area_start -->
{{-- <div class="slider_area">
    <div class="single_slider  d-flex align-items-center slider_bg_1 overlay2">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="slider_text ">
                        <span>{{ $slider->title }}</span>
                        <h3>{{ $slider->sub_title }}</h3>
                        <p>{{ $slider->description }}</p>
                        <a href="About.html" class="boxed-btn3">Learn More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="row" style="margin-top: 70px">
    <div class="col-lg-12">
        <div class="causes_active owl-carousel">
            @foreach ($causes as $cause)
                <div class="single_cause">
                    <div class="thumb">
                        <img src="{{ $cause->causeImage->image }}" style="height: 250px; object-fit: cover;"
                            alt="Cause Image">
                    </div>
                    <div class="causes_content">
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
                        <div class="balance d-flex justify-content-between align-items-center mb-2">
                            <span style="color: #f8004c;">Terkumpul: Rp. 50.000</span>
                            <span style="color: #f8004c;">Target: {{ rupiahFormat($cause->goal) }}</span>
                        </div>
                        <h4>{{ \Illuminate\Support\Str::limit($cause->title, 20) }}</h4>
                        <p>{{ \Illuminate\Support\Str::limit($cause->description, 40) }}</p>
                        <a class="read_more" href="{{ route('user-cause-detail', $cause->id) }}">Selengkapnya</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- slider_area_end -->

<!-- reson_area_start  -->
<div class="reson_area section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb-55">
                    <h3><span>Panggilan Hati</span></h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($helpReasons as $helpReason)
                <div class="col-lg-4 col-md-6">
                    <div class="single_reson">
                        <div class="thum">
                            <div class="thum_1">
                                <img src="{{ Storage::url($helpReason->image ?? '') }}" alt="">
                            </div>
                        </div>
                        <div class="help_content">
                            <h4>{{ \Illuminate\Support\Str::limit($helpReason->title, 10) }}</h4>
                            <p>{{ \Illuminate\Support\Str::limit($helpReason->description, 10) }}</p>
                            <a href="#" class="read_more">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- reson_area_end  -->

{{-- <div class="news__area section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb-55">
                    <h3><span>News & Updates</span></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="news_active owl-carousel">
                    <div class="single__blog d-flex align-items-center">
                        <div class="thum">
                            <img src="{{ asset('charifit-master/img/news/1.png') }}" alt="">
                        </div>
                        <div class="newsinfo">
                            <span>July 18, 2019</span>
                            <a href="single-blog.html">
                                <h3>Pure Water Is More
                                    Essential</h3>
                            </a>
                            <p>The passage experienced a
                                surge in popularity during the
                                1960s when used it on their
                                sheets, and again.</p>
                            <a class="read_more" href="single-blog.html">Read More</a>
                        </div>
                    </div>
                    <div class="single__blog d-flex align-items-center">
                        <div class="thum">
                            <img src="{{ asset('charifit-master/img/news/2.png') }}" alt="">
                        </div>
                        <div class="newsinfo">
                            <span>July 18, 2019</span>
                            <a href="single-blog.html">
                                <h3>Pure Water Is More
                                    Essential</h3>
                            </a>
                            <p>The passage experienced a
                                surge in popularity during the
                                1960s when used it on their
                                sheets, and again.</p>
                            <a class="read_more" href="single-blog.html">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<!-- latest_activites_area_start  -->
<div class="latest_activites_area">
    <div class=" video_bg_1 video_activite  d-flex align-items-center justify-content-center"
        style="background-color: #f8004c">
        {{-- <a class="popup-video" href="https://www.youtube.com/watch?v=MG3jGHnBVQs">
            <i class="flaticon-ui"></i>
        </a> --}}
        <div class="video-container" style="position: relative; display: inline-block;">
            <img src="{{ Storage::url($about->logo ?? '') }}" class="lazyload"
                style="width: 155px; height: 180px; object-fit: cover; margin-top: 50px;" alt="image">
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-7">
                <div class="activites_info">
                    <div class="section_title">
                        <h3>{{ $about->title }}</h3>
                    </div>
                    <p class="para_1">{{ $about->description }}</p>
                    {{-- <a href="#" data-scroll-nav='1' class="boxed-btn4">Donate Now</a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- latest_activites_area_end  -->

<!-- popular_causes_area_start  -->
{{-- <div class="popular_causes_area section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb-55">
                    <h3><span>Popular Causes</span></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="causes_active owl-carousel">
                    @foreach ($causes as $cause)
                        <div class="single_cause">
                            <div class="thumb">
                                <img src="{{ $cause->causeImage->image }}" style="height: 250px; object-fit: cover;"
                                    alt="Cause Image">
                            </div>
                            <div class="causes_content">
                                <div class="custom_progress_bar">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 30%;"
                                            aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                            <span class="progres_count">
                                                30%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="balance d-flex justify-content-between align-items-center">
                                    <span>Raised: $5000.00 </span>
                                    <span>Goal: $9000.00 </span>
                                </div>
                                <h4>{{ \Illuminate\Support\Str::limit($cause->title, 20) }}</h4>
                                <p>{{ \Illuminate\Support\Str::limit($cause->description, 40) }}</p>
                                <a class="read_more" href="cause_details.html">Read More</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- popular_causes_area_end  -->

<!-- counter_area_start  -->
{{-- <div class="counter_area">
    <div class="container">
        <div class="counter_bg overlay">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single_counter d-flex align-items-center justify-content-center">
                        <div class="icon">
                            <i class="flaticon-calendar"></i>
                        </div>
                        <div class="events">
                            <h3 class="counter">120</h3>
                            <p>Finished Event</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single_counter d-flex align-items-center justify-content-center">
                        <div class="icon">
                            <i class="flaticon-heart-beat"></i>
                        </div>
                        <div class="events">
                            <h3 class="counter">120</h3>
                            <p>Finished Event</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single_counter d-flex align-items-center justify-content-center">
                        <div class="icon">
                            <i class="flaticon-in-love"></i>
                        </div>
                        <div class="events">
                            <h3 class="counter">120</h3>
                            <p>Finished Event</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single_counter d-flex align-items-center justify-content-center">
                        <div class="icon">
                            <i class="flaticon-hug"></i>
                        </div>
                        <div class="events">
                            <h3 class="counter">120</h3>
                            <p>Finished Event</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- counter_area_end  -->

<!-- our_volunteer_area_start  -->
{{-- <div class="our_volunteer_area section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb-55">
                    <h3><span>Our Volunteer</span></h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="single_volenteer">
                    <div class="volenteer_thumb">
                        <img src="{{ asset('charifit-master/img/volenteer/1.png') }}" alt="">
                    </div>
                    <div class="voolenteer_info d-flex align-items-end">
                        <div class="social_links">
                            <ul>
                                <li>
                                    <a href="#"> <i class="fa fa-facebook"></i> </a>
                                </li>
                                <li>
                                    <a href="#"> <i class="fa fa-pinterest"></i> </a>
                                </li>
                                <li>
                                    <a href="#"> <i class="fa fa-linkedin"></i> </a>
                                </li>
                                <li>
                                    <a href="#"> <i class="fa fa-twitter"></i> </a>
                                </li>
                            </ul>
                        </div>
                        <div class="info_inner">
                            <h4>Sakil khan</h4>
                            <p>Donner</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_volenteer">
                    <div class="volenteer_thumb">
                        <img src="{{ asset('charifit-master/img/volenteer/2.png') }}" alt="">
                    </div>
                    <div class="voolenteer_info d-flex align-items-end">
                        <div class="social_links">
                            <ul>
                                <li>
                                    <a href="#"> <i class="fa fa-facebook"></i> </a>
                                </li>
                                <li>
                                    <a href="#"> <i class="fa fa-pinterest"></i> </a>
                                </li>
                                <li>
                                    <a href="#"> <i class="fa fa-linkedin"></i> </a>
                                </li>
                                <li>
                                    <a href="#"> <i class="fa fa-twitter"></i> </a>
                                </li>
                            </ul>
                        </div>
                        <div class="info_inner">
                            <h4>Emran Ahmed</h4>
                            <p>Volunteer</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_volenteer">
                    <div class="volenteer_thumb">
                        <img src="{{ asset('charifit-master/img/volenteer/3.png') }}" alt="">
                    </div>
                    <div class="voolenteer_info d-flex align-items-end">
                        <div class="social_links">
                            <ul>
                                <li>
                                    <a href="#"> <i class="fa fa-facebook"></i> </a>
                                </li>
                                <li>
                                    <a href="#"> <i class="fa fa-pinterest"></i> </a>
                                </li>
                                <li>
                                    <a href="#"> <i class="fa fa-linkedin"></i> </a>
                                </li>
                                <li>
                                    <a href="#"> <i class="fa fa-twitter"></i> </a>
                                </li>
                            </ul>
                        </div>
                        <div class="info_inner">
                            <h4>Sabbir Ahmed</h4>
                            <p>Volunteer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- our_volunteer_area_end  -->

<!-- news__area_start  -->
{{-- <div class="news__area section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb-55">
                    <h3><span>News & Updates</span></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="news_active owl-carousel">
                    <div class="single__blog d-flex align-items-center">
                        <div class="thum">
                            <img src="{{ asset('charifit-master/img/news/1.png') }}" alt="">
                        </div>
                        <div class="newsinfo">
                            <span>July 18, 2019</span>
                            <a href="single-blog.html">
                                <h3>Pure Water Is More
                                    Essential</h3>
                            </a>
                            <p>The passage experienced a
                                surge in popularity during the
                                1960s when used it on their
                                sheets, and again.</p>
                            <a class="read_more" href="single-blog.html">Read More</a>
                        </div>
                    </div>
                    <div class="single__blog d-flex align-items-center">
                        <div class="thum">
                            <img src="{{ asset('charifit-master/img/news/2.png') }}" alt="">
                        </div>
                        <div class="newsinfo">
                            <span>July 18, 2019</span>
                            <a href="single-blog.html">
                                <h3>Pure Water Is More
                                    Essential</h3>
                            </a>
                            <p>The passage experienced a
                                surge in popularity during the
                                1960s when used it on their
                                sheets, and again.</p>
                            <a class="read_more" href="single-blog.html">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- news__area_end  -->

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
