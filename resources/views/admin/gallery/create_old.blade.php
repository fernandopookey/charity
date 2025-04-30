<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <!-- Multi Columns Form -->
                    <form action="{{ route('gallery.store') }}" class="row g-3 mt-4" method="POST"
                        enctype="multipart/form-data">
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
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Note</label>
                            <textarea name="note" class="form-control" rows="4">{{ old('note') }}</textarea>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Category</label>
                                <select name="categories_id" class="form-control" aria-label="Default select example"
                                    required>
                                    <option disabled selected value>
                                        <- Choose ->
                                    </option>
                                    @foreach ($galleryCategories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Upload Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" name="image" onchange="loadFile(event)">
                                <img id="output" class="img-fluid mt-2 mb-4"
                                    style="width: 100px; height: 100px; object-fit: cover;" />
                            </div>
                        </div>
                        <div class="text-start">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form><!-- End Multi Columns Form -->
                </div>
            </div>
        </div>
    </div>
</section>
