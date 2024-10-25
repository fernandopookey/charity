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
                            <input type="text" name="title" class="form-control">
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
