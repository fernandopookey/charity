<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <!-- Multi Columns Form -->
                    <form action="{{ route('terms-conditions.store') }}" class="row g-3 mt-4" method="POST"
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
                        <div class="col-md-12">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Description</label>
                            <div class="form-floating">
                                <textarea class="form-control" name="description" id="floatingTextarea" style="height: 100px;"></textarea>
                                <label for="floatingTextarea"></label>
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
