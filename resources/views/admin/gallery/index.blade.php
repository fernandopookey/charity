<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="row">
                    <div class="col-xl-12">
                        <a href="{{ route('gallery.create') }}" class="btn btn-primary"
                            style="margin-top: 20px; margin-left: 20px; margin-bottom: 20px;">Create</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Note</th>
                                <th>Media</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($galleries as $gallery)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $gallery->title }}</td>
                                    <td>{{ $gallery->note }}</td>
                                    <td>
                                        {{-- @php
                                            $extension = pathinfo($gallery->image, PATHINFO_EXTENSION);
                                        @endphp

                                        @if (in_array($extension, ['jpg', 'jpeg', 'png']))
                                            <img src="{{ Storage::url($gallery->image ?? '') }}" class="lazyload"
                                                width="100" alt="image">
                                        @elseif(in_array($extension, ['mp4', 'avi', 'mov']))
                                            <video width="100" controls>
                                                <source src="{{ Storage::url($gallery->image ?? '') }}"
                                                    type="video/{{ $extension }}">
                                                Your browser does not support the video tag.
                                            </video>
                                        @endif --}}
                                        <a href="{{ route('gallery-image-upload', $gallery->id) }}"
                                            class="btn btn-info"><i class="fa fa-file-image-o" aria-hidden="true"></i> &
                                            <i class="fa fa-video-camera" aria-hidden="true"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{ route('gallery.edit', $gallery->id) }}"
                                            class="btn btn-outline-warning btn-sm w-70">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                        <form action="{{ route('gallery.destroy', $gallery->id) }}"
                                            onclick="return confirm('Delete Data?')" method="POST"
                                            style="display:inline;">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger btn-sm w-70 mt-1">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                </div>
            </div>

        </div>
    </div>
</section>
