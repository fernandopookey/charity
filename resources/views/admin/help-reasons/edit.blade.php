<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('help-reasons.update', $helpReason->id) }}" class="row g-3 mt-4" method="POST"
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
                            <input type="text" name="title" value="{{ $helpReason->title }}" class="form-control">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Description</label>
                            <div class="form-floating">
                                <textarea class="form-control" name="description" id="floatingTextarea" style="height: 100px;">{{ $helpReason->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Upload Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" name="image" id="formFile">
                            </div>
                        </div>
                        <div class="text-start">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('cause.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
