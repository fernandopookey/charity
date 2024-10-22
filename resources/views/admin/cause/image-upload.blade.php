<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-6 mt-2">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" value="{{ $causes->title }}" class="form-control" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('cause-image-upload-process', $causes->id) }}" class="row g-3 mt-4"
                        method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="col-md-6">
                            <label class="form-label">Image</label>
                            <input type="file" name="images[]" multiple class="form-control">
                        </div>
                        <div class="text-start mt-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('cause.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="img-content mt-2">
                        @foreach ($causeImages as $causeImage)
                            <div class="image-container" style="position: relative; display: inline-block;">
                                <img src="{{ asset($causeImage->image) }}"
                                    style="width: 150px; height: 150px; object-fit: cover" class="my-2 mx-2"
                                    class="my-2 mx-2" alt="">
                                <a href="{{ route('cause-image-delete', $causeImage) }}"
                                    style="position: absolute; top: 1px; right: 1px; color: #32CD32;"><i
                                        class="fa fa-trash" aria-hidden="true"></i></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @foreach ($causeVideos as $causeVideo)
                        <div class="video-container" style="position: relative; display: inline-block;">
                            <a href="{{ route('cause-image-delete', $causeImage) }}"
                                style="position: absolute; top: 5px; right: 5px; color: #32CD32; z-index: 10;">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                            <video width="320" height="240" controls class="mx-3 my-2">
                                <source src="{{ asset($causeVideo->image) }}" type="video/mp4">
                                <source src="{{ asset($causeVideo->image) . '.ogg' }}" type="video/ogg">
                            </video>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</section>
