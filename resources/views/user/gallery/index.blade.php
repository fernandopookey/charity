<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <h2 class="contact-title">Gallery Kami</h2>
            </div>
            <div class="col-lg-12 d-flex justify-content-center flex-wrap">
                @foreach ($galleries as $item)
                    @php
                        // Mendapatkan ekstensi file
                        $extension = pathinfo($item->image, PATHINFO_EXTENSION);
                    @endphp

                    @if (in_array($extension, ['jpg', 'jpeg', 'png']))
                        <!-- Menampilkan Gambar -->
                        <img src="{{ Storage::url($item->image ?? '') }}" loading="lazy" class="mx-2 gallery-image"
                            style="width: 200px; height: 200px; object-fit: cover; cursor: pointer;" alt="image"
                            data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-type="image"
                            data-bs-image="{{ Storage::url($item->image ?? '') }}">
                    @elseif(in_array($extension, ['mp4', 'avi', 'mov']))
                        <!-- Menampilkan Video -->
                        <video width="200" height="200" class="mx-2 gallery-video"
                            style="object-fit: cover; cursor: pointer;" controls data-bs-toggle="modal"
                            data-bs-target="#imageModal" data-bs-type="video"
                            data-bs-src="{{ Storage::url($item->image ?? '') }}">
                            <source src="{{ Storage::url($item->image ?? '') }}" type="video/{{ $extension }}">
                        </video>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <!-- Bootstrap Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body d-flex justify-content-center">
                    <img src="" id="modalImage" class="img-fluid" alt="Gallery Image">
                    {{-- <video id="modalVideo" class="w-100" controls style="display: none;"></video> --}}
                </div>
            </div>
        </div>
    </div>
</section>

{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const imageModal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');
        const modalVideo = document.getElementById('modalVideo');

        imageModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const src = button.getAttribute('data-bs-src');
            const type = button.getAttribute('data-bs-type');

            if (type === 'image') {
                // Tampilkan gambar dan sembunyikan video
                modalVideo.style.display = 'none';
                modalImage.style.display = 'block';
                modalImage.src = src;
            } else if (type === 'video') {
                // Tampilkan video dan sembunyikan gambar
                modalImage.style.display = 'none';
                modalVideo.style.display = 'block';
                modalVideo.src = src;
            }
        });

        // Bersihkan sumber video saat modal ditutup untuk menghentikan pemutaran
        imageModal.addEventListener('hidden.bs.modal', function() {
            modalVideo.src = '';
            modalImage.src = '';
        });
    });
</script> --}}
