<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="row">
                    <div class="col-xl-12">
                        <a href="{{ route('donation-price.create') }}" class="btn btn-primary"
                            style="margin-top: 20px; margin-left: 20px; margin-bottom: 20px;">Create</a>
                    </div>
                </div>
                <div class="card-body">

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prices as $price)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ rupiahFormat($price->price) }}</td>
                                    <td>
                                        {{-- <a href="{{ route('donation-price.edit', $price->id) }}"
                                            class="btn btn-outline-warning btn-sm w-70"><i class="fa fa-pencil"
                                                aria-hidden="true"></i></a> --}}
                                        <form action="{{ route('donation-price.destroy', $price->id) }}"
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
