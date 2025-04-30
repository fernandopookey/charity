<div class="bradcam_area breadcam_bg overlay d-flex align-items-center justify-content-center container">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Kategori Galeri</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- popular_causes_area_start  -->
<div class="popular_causes_area pt-120">
    <div class="container">
        <div class="row">
            @foreach ($categories as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="single_cause">
                        <div class="thumb">
                            @php
                                $foundImage = null;
                                foreach ($item->galleries as $gallery) {
                                    if (isset($gallery->galleryImage[0])) {
                                        $foundImage = $gallery->galleryImage[0]->image;
                                        break;
                                    }
                                }
                            @endphp
                            @if ($foundImage)
                                <img src="{{ Storage::url($foundImage) }}" alt=""
                                    style="max-width: 100%; max-height: 250px; object-fit: cover;">
                            @else
                                <img src="{{ asset('image.png') }}" alt="Default Image"
                                    style="max-width: 100%; max-height: 250px; object-fit: cover;">
                            @endif
                        </div>
                        <div class="causes_content">
                            <a href="#" style="text-decoration: none; color: black;">
                                <h4>{{ $item->name }}</h4>
                            </a>
                            <a class="read_more"
                                href="{{ route('gallery-category-detail', $item->slug) }}">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
