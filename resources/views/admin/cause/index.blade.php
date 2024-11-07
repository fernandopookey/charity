<style>
    .bg {
        background-color: #e21010;
    }
</style>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="row">
                    <div class="col-xl-12">
                        <a href="{{ route('cause.create') }}" class="btn btn-primary"
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
                                <th>Goal</th>
                                <th>Raised</th>
                                <th>Days Left</th>
                                <th>Date</th>
                                {{-- <th>Description</th> --}}
                                <th>Visibility</th>
                                <th>Status</th>
                                <th>Images</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($causes as $cause)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $cause->title }}</td>
                                    <td>{{ rupiahFormat($cause->goal) }}</td>
                                    <td>{{ rupiahFormat($cause->raised) }}</span></td>
                                    <td>{{ $cause->left_days }} Days</td>
                                    <td>{{ dateFormat($cause->created_at, 'DD MMMM YYYY') }} -
                                        {{ dateFormat($cause->expired_date, 'DD MMMM YYYY') }}</td>
                                    {{-- <td>{{ \Illuminate\Support\Str::limit($cause->description, 50) }}</td> --}}
                                    <td>
                                        @if ($cause->visibility_status == 1)
                                            <span class="badge bg-primary">Publish</span>
                                        @else
                                            <span class="badge bg-danger">Non Publish</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($cause->active_status == 'Running')
                                            <span class="badge bg-primary">Running</span>
                                        @else
                                            <span class="badge bg-danger">Ended</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('cause-image-upload', $cause->id) }}" class="btn btn-info"><i
                                                class="fa fa-file-image-o" aria-hidden="true"></i> & <i
                                                class="fa fa-video-camera" aria-hidden="true"></i></a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('cause.edit', $cause->id) }}"
                                            class="btn btn-outline-warning btn-sm w-70"><i class="fa fa-pencil"
                                                aria-hidden="true"></i></a>
                                        <a href="{{ route('cause.show', $cause->id) }}"
                                            class="btn btn-outline-warning btn-sm w-70 mt-1"><i class="fa fa-eye"
                                                aria-hidden="true"></i></a>
                                        <form action="{{ route('cause.destroy', $cause->id) }}"
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
