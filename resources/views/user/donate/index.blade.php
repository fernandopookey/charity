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
                    <?php
                    $percentation = $cause->goal > 0 ? ($cause->raised / $cause->goal) * 100 : 0;
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_cause">
                            <div class="thumb">
                                <img src="{{ Storage::url($cause->primary_image ?? '') }}"
                                    style="height: 250px; object-fit: cover;" alt="Cause Image" loading="lazy"
                                    class="gallery-image" data-bs-toggle="modal" data-bs-target="#imageModal"
                                    data-bs-image="{{ Storage::url($cause->primary_image ?? '') }}">
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
                                <div class="balance d-flex justify-content-between align-items-center">
                                    <span style="color: #f8004c;">Terkumpul:
                                        {{ rupiahFormat($cause->raised ?? 0) }}</span>
                                    <span style="color: #f8004c;">Target: {{ rupiahFormat($cause->goal) }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <small style="font-size: 13px"><b style="color: rgb(106, 105, 105)">Tanggal :
                                            {{ \Carbon\Carbon::parse($cause->expired_date)->format('d M Y') }}</b></small>
                                    <small style="font-size: 13px"><b style="color: rgb(106, 105, 105)">Sisa Hari :
                                            {{ $cause->left_days }}</b></small>
                                </div>
                                <a href="{{ route('user-cause-detail', $cause->slug) }}"
                                    style="text-decoration: none; color: black;">
                                    <h4>{{ \Illuminate\Support\Str::limit($cause->title, 20) }}</h4>
                                    <p>{{ \Illuminate\Support\Str::limit($cause->description, 40) }}</p>
                                </a>
                                <a class="read_more"
                                    href="{{ route('user-cause-detail', $cause->slug) }}">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- popular_causes_area_end  -->

    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="" id="modalImage" style="width: 450px; height: 450px; object-fit: cover;"
                        class="img-fluid" alt="Gallery Image">
                </div>
            </div>
        </div>
    </div>

    <script>
        const imageModal = document.getElementById('imageModal');
        imageModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const imageUrl = button.getAttribute('data-image');
            const modalImage = document.getElementById('modalImage');
            modalImage.src = imageUrl;
        });
    </script>
