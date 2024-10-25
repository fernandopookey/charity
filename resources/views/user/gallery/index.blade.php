<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <h2 class="contact-title">Gallery Kami</h2>
            </div>
            <div class="col-lg-12 d-flex justify-content-center">
                @foreach ($galleries as $item)
                    <img src="{{ Storage::url($item->image ?? '') }}" loading="lazy" class="mx-2 gallery-image"
                        style="width: 200px; height: 200px; object-fit: cover; cursor: pointer;" alt="image"
                        data-bs-toggle="modal" data-bs-target="#imageModal"
                        data-bs-image="{{ Storage::url($item->image ?? '') }}">
                @endforeach
            </div>
        </div>
    </div>

    <!-- Bootstrap Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="" id="modalImage" class="img-fluid" alt="Gallery Image">
                </div>
            </div>
        </div>
    </div>
</section>
