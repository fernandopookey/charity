<div class="bradcam_area breadcam_bg overlay d-flex align-items-center justify-content-center container">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h4 class="text-white">{{ $gallery->title }}</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- popular_causes_area_start  -->
<div class="popular_causes_area pt-120">
    <div class="container">
        <div class="row">
            @foreach ($galleryImages as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="single_cause">
                        <div class="thumb">
                            <img src="{{ Storage::url($item->image ?? '') }}" alt="Image"
                                style="max-width: 100%; max-height: 250px; object-fit: cover; cursor: pointer;"
                                data-bs-toggle="modal" data-bs-target="#imageModal"
                                data-image="{{ Storage::url($item->image ?? '') }}">
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>


<!-- Bootstrap Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body d-flex justify-content-center">
                <img src="" id="modalImage" class="img-fluid" alt="Gallery Image"
                    style="width: 250px; height: 250px; object-fit: cover;">
                {{-- <video id="modalVideo" class="w-100" controls style="display: none;"></video> --}}
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
