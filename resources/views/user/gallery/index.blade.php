{{-- <div class="bradcam_area breadcam_bg overlay d-flex align-items-center justify-content-center container">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>{{ $category-> }}</h3>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<!-- popular_causes_area_start  -->
<div class="popular_causes_area pt-120 mb-4">
    <div class="container">
        <div class="row">
            @forelse ($galleries as $item)
                @php
                    $extension = pathinfo($item->image, PATHINFO_EXTENSION);
                @endphp
                <div class="col-lg-4 col-md-6">
                    <div class="single_cause">
                        <div class="thumb">
                            @if (in_array($extension, ['jpg', 'jpeg', 'png']))
                                <img src="{{ Storage::url($item->image ?? '') }}"loading="lazy" class="mx-2 gallery-image"
                                    style="width: 200px; height: 200px; object-fit: cover; cursor: pointer;"
                                    alt="image" data-bs-toggle="modal" data-bs-target="#imageModal"
                                    data-bs-type="image" data-bs-image="{{ Storage::url($item->image ?? '') }}">
                            @elseif (in_array($extension, ['mp4', 'avi', 'mov']))
                                <video width="200" height="200" class="mx-2 gallery-video"
                                    style="object-fit: cover; cursor: pointer;" controls data-bs-toggle="modal"
                                    data-bs-target="#imageModal" data-bs-type="video"
                                    data-bs-src="{{ Storage::url($item->image ?? '') }}">
                                    <source src="{{ Storage::url($item->image ?? '') }}"
                                        type="video/{{ $extension }}">
                                </video>
                            @endif
                        </div>
                        <div class="causes_content">
                            <a href="{{ route('gallery-image-user', $item->slug) }}">
                                <h4>{{ Str::limit($item->title, 31) }}</h4>
                            </a>
                            <p>{{ Str::limit($item->note, 40) }}</p>
                            <a class="read_more" href="{{ route('gallery-image-user', $item->slug) }}">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </div>
</div>
