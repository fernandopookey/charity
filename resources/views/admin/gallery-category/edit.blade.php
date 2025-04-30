<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('gallery-categories.update', $categories->id) }}" class="row g-3 mt-4"
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
                            <label class="form-label">Category Name</label>
                            <input type="text" name="name" value="{{ $categories->name }}" class="form-control"
                                value="{{ old('name', $categories->name) }}" autocomplete="off">
                        </div>
                        <div class="text-start">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('gallery-categories.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
