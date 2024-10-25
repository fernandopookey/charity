<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="row">
                    <div class="col-xl-12">
                        <a href="{{ route('gallery.create') }}" class="btn btn-primary"
                            style="margin-top: 20px; margin-left: 20px; margin-bottom: 20px;">Create</a>
                    </div>
                </div>
                <div class="card-body">
                    {{-- <h5 class="card-title">Datatables</h5> --}}

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Images</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($galleries as $gallery)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $gallery->title }}</td>
                                    <td>
                                        <img src="{{ Storage::url($gallery->image ?? '') }}" class="lazyload"
                                            width="100" alt="image">
                                    </td>
                                    <td>
                                        <a href="{{ route('gallery.edit', $gallery->id) }}"
                                            class="btn btn-outline-warning btn-sm w-70"><i class="fa fa-pencil"
                                                aria-hidden="true"></i></a>
                                        <form action="{{ route('gallery.destroy', $gallery->id) }}"
                                            onclick="return confirm('Delete Data ? ')" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger btn-sm w-70 mt-1"><i
                                                    class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                </div>
            </div>

        </div>
    </div>
</section>
