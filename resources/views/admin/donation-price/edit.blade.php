<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('cause.update', $causes->id) }}" class="row g-3 mt-4" method="POST"
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
                            <input type="text" name="title" value="{{ $causes->title }}" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Goal</label>
                            <input type="text" name="goal" class="form-control" value="{{ $causes->goal }}"
                                id="rupiah" placeholder="Rp.0">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Days</label>
                            <input type="number" name="days" class="form-control" value="{{ $causes->days }}">
                        </div>
                        <div class="col-xl-6">
                            <label class="form-label">Visibility</label>
                            <select name="status" class="form-control" aria-label="Default select example">
                                <option value="{{ $causes->status }}" selected>
                                    {{ old('status', $causes->status == 1 ? 'Publish' : 'Non Publish') }}
                                </option>
                                <option value="1">Publish</option>
                                <option value="0">Non Publish</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Description</label>
                            <div class="form-floating">
                                <textarea class="form-control" name="description" id="floatingTextarea" style="height: 300px;">{{ $causes->description }}</textarea>
                            </div>
                        </div>
                        <div class="text-start">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('cause.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
