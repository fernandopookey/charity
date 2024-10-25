<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('about.update', $about->id) }}" class="row g-3 mt-4" method="POST"
                        enctype="multipart/form-data">
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
                            <input type="text" name="title" value="{{ $about->title }}" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="text" name="email" value="{{ $about->email }}" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" value="{{ $about->phone }}" class="form-control">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Address</label>
                            <div class="form-floating">
                                <textarea class="form-control" name="address" id="floatingTextarea" style="height: 100px;">{{ $about->address }}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Description</label>
                            <div class="form-floating">
                                <textarea class="form-control" name="description" id="floatingTextarea" style="height: 100px;">{{ $about->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Logo</label>
                            <input type="file" name="logo" multiple class="form-control"
                                onchange="loadFile(event)">
                            <img id="output" class="img-fluid mt-2 mb-4"
                                style="width: 100px; height: 100px; object-fit: cover;" />
                        </div>
                        <img src="{{ Storage::url($about->logo ?? '') }}" class="lazyload"
                            style="width: 155px; height: 180px; object-fit: cover; margin-top: 50px;" alt="image">

                        <div class="text-start">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
