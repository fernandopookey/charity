<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('media-socials.update', $mediaSocials->id) }}" class="row g-3 mt-4"
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
                            <label class="form-label">Title</label>
                            <input type="text" name="title" value="{{ $mediaSocials->title }}" class="form-control"
                                value="{{ old('title', $mediaSocials->full_name) }}" autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Link</label>
                            <input type="text" name="link" value="{{ $mediaSocials->link }}" class="form-control"
                                value="{{ old('link', $mediaSocials->full_name) }}" autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Upload Icon</label>
                            <input type="file" name="icon" multiple class="form-control"
                                onchange="loadFile(event)">
                            <img id="output" class="img-fluid mt-2 mb-4"
                                style="width: 100px; height: 100px; object-fit: cover;" />
                        </div>
                        <img src="{{ Storage::url($mediaSocials->icon ?? '') }}" class="img-fluid mt-2 mb-4"
                            style="width: 100px; height: 100px; object-fit: cover;" alt="image">
                        <div class="text-start">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('media-socials.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
