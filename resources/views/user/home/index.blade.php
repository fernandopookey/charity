<!-- slider_area_start -->
<div class="container">
    <div class="row" style="margin-top: 70px">
        <div class="col-lg-12">
            <div class="causes_active owl-carousel">
                @foreach ($causes as $cause)
                    <?php
                    $percentation = $cause->goal > 0 ? ($cause->raised / $cause->goal) * 100 : 0;
                    ?>
                    <div class="single_cause">
                        <div class="thumb">
                            <img src="{{ $cause->primary_image ?? '' }}" style="height: 250px; object-fit: cover;"
                                alt="Cause Image" loading="lazy" class="gallery-image" data-bs-toggle="modal"
                                data-bs-image="{{ $cause->primary_image ?? '' }}">
                        </div>
                        <div class="causes_content">
                            <div class="custom_progress_bar">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar"
                                        style="width: {{ round($percentation) }}%;"
                                        aria-valuenow="{{ round($percentation) }}" aria-valuemin="0"
                                        aria-valuemax="100">
                                        <span class="progres_count">
                                            {{ round($percentation) }}%
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="balance d-flex justify-content-between align-items-center mb-2">
                                <span style="color: #f8004c;">Terkumpul:
                                    {{ rupiahFormat($cause->raised ?? 0) }}</span>
                                <span style="color: #f8004c;">Target: {{ rupiahFormat($cause->goal) }}</span>
                            </div>
                            <small style="font-size: 13px"><b style="color: rgb(106, 105, 105)">Sisa Hari :
                                    {{ $cause->left_days }}</b></small>
                            <a href="{{ route('user-cause-detail', $cause->id) }}" style="text-decoration: none">
                                <h4 style="color: black;">{{ \Illuminate\Support\Str::limit($cause->title, 20) }}</h4>
                                <p>{{ \Illuminate\Support\Str::limit($cause->description, 40) }}</p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
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
                    <h3><span>Visi & Misi</span></h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($helpReasons as $helpReason)
                <div class="col-lg-4 col-md-6">
                    <div class="single_reson">
                        <div class="thum">
                            <div class="thum_1">
                                <img src="{{ Storage::url($helpReason->image ?? '') }}" alt=""
                                    style="height: 400px; width: 380px; object-fit: cover">
                            </div>
                        </div>
                        <div class="help_content">
                            <h4>{{ $helpReason->title }}</h4>
                            <p>{{ $helpReason->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- reson_area_end  -->

<!-- latest_activites_area_start  -->
<div class="container">
    <div class="latest_activites_area">
        <div class=" video_bg_1 video_activite  d-flex align-items-center justify-content-center"
            style="background-color: #ffffff">
            <div class="video-container" style="position: relative; display: inline-block;">
                <img src="{{ Storage::url($about->logo ?? '') }}" class="lazyload"
                    style="width: 300px; height: 330px; object-fit: cover; margin-top: 50px;" alt="image">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- latest_activites_area_end  -->

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
