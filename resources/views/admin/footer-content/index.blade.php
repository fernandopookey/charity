<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('navbar-contents.update', $footerContent->id) }}" class="row g-3 mt-4"
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
                            <label class="form-label">Nomor Telfon</label>
                            <input type="text" name="phone_number" value="{{ $footerContent->phone_number }}"
                                class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="text" name="email" value="{{ $footerContent->email }}"
                                class="form-control">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Alamat</label>
                            <div class="form-floating">
                                <textarea class="form-control" name="address" id="floatingTextarea">{{ $footerContent->address }}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Deskripsi</label>
                            <div class="form-floating">
                                <textarea class="form-control" name="description" id="floatingTextarea">{{ $footerContent->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Logo</label>
                            <input type="file" name="logo" multiple class="form-control"
                                onchange="loadFile(event)">
                            <img id="output" class="img-fluid mt-2 mb-4"
                                style="width: 100px; height: 100px; object-fit: cover;" />
                        </div>
                        <img src="{{ Storage::url($footerContent->logo ?? '') }}" class="lazyload"
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
