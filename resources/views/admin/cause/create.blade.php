<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <!-- Multi Columns Form -->
                    <form action="{{ route('cause.store') }}" class="row g-3 mt-4" method="POST"
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
                        <div class="col-md-6">
                            <label class="form-label">Goal</label>
                            <input type="text" name="goal" class="form-control" id="rupiah" placeholder="Rp.0">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Days</label>
                            <input type="number" name="days" class="form-control" value="{{ old('days') }}">
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Visibility</label>
                                <select name="status" class="form-control" required>
                                    <option selected disabled>Pilih</option>
                                    <option value="1">Publish</option>
                                    <option value="0">Non Publish</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Description</label>
                            <div class="form-floating">
                                <textarea class="form-control" name="description" id="floatingTextarea" style="height: 300px;"></textarea>
                                <label for="floatingTextarea">{{ old('description') }}</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Detail Donation</label>
                            <div class="form-floating">
                                <textarea class="form-control" name="detail_donation" id="floatingTextarea" style="height: 300px;"></textarea>
                                <label for="floatingTextarea">{{ old('detail_donation') }}</label>
                            </div>
                        </div>
                        <div class="text-start">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('cause.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </form><!-- End Multi Columns Form -->
                </div>
            </div>
        </div>
    </div>
</section>
