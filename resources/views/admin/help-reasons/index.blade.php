<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="row">
                    <div class="col-xl-12">
                        <a href="{{ route('help-reasons.create') }}" class="btn btn-primary"
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
                                <th>Description</th>
                                <th>Images</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($helpReasons as $helpReason)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $helpReason->title }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($helpReason->description, 50) }}</td>
                                    <td>
                                        <img src="{{ Storage::url($helpReason->image ?? '') }}" class="lazyload"
                                            width="100" alt="image">
                                    </td>
                                    <td>
                                        <a href="{{ route('help-reasons.edit', $helpReason->id) }}"
                                            class="btn btn-outline-warning btn-sm w-70"><i class="fa fa-pencil"
                                                aria-hidden="true"></i></a>
                                        <a href="{{ route('help-reasons.show', $helpReason->id) }}"
                                            class="btn btn-outline-warning btn-sm w-70"><i class="fa fa-eye"
                                                aria-hidden="true"></i></a>
                                        <form action="{{ route('help-reasons.destroy', $helpReason->id) }}"
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
