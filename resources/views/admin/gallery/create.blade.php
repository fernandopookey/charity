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
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
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
                            <label class="form-label">Note</label>
                            <div class="form-floating">
                                <textarea class="form-control" name="note" id="floatingTextarea" style="height: 300px;"></textarea>
                                <label for="floatingTextarea">{{ old('note') }}</label>
                            </div>
                        </div>
                        <div class="text-start">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('gallery.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </form><!-- End Multi Columns Form -->
                </div>
            </div>
        </div>
    </div>
</section>
