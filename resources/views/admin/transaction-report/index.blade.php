<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title flex-wrap justify-content-start mb-4">
                <div class="col-3 d-flex flex-nowrap align-items-center mb-4 mt-2">
                    <input type="date" id="fromDate" class="form-control" value="{{ $fromDate }}">
                    <span class="mx-1">to</span>
                    <input type="date" id="toDate" class="form-control" value="{{ $toDate }}">
                    <button type="button" onclick="reloadPage()" class="btn btn-info mx-1" data-bs-toggle="modal">
                        Filter
                    </button>
                </div>
                <button type="button" onclick="reloadPage(1)" class="btn btn-outline-info" data-bs-toggle="modal">
                    Download PDF
                </button>
            </div>
            <div class="card">
                {{-- <div class="row">
                    <div class="col-xl-12">
                        <a href="{{ route('cause.create') }}" class="btn btn-primary"
                            style="margin-top: 20px; margin-left: 20px; margin-bottom: 20px;">Create</a>
                    </div>
                </div> --}}
                <div class="card-body">
                    {{-- <h5 class="card-title">Datatables</h5> --}}

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Customer Name</th>
                                <th>Donation Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $transaction->customer_name }}</td>
                                    <td>{{ rupiahFormatFloat($transaction->price) }}</td>
                                    <td>{{ $transaction->status }}</td>
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


{{-- <script>
    function reloadPage(pdf = 0) {
        var fromDate = document.getElementById("fromDate").value;
        var toDate = document.getElementById("toDate").value;
        // alert(window.location.host );
        window.open(window.location.pathname + '?fromDate=' + fromDate + '&toDate=' + toDate +
            "&date=" + new Date().toISOString(), '_self');
    }
</script> --}}


<script>
    function reloadPage(pdf = 0) {
        var fromDate = document.getElementById("fromDate").value;
        var toDate = document.getElementById("toDate").value;
        window.open(window.location.pathname + '?fromDate=' + fromDate + '&toDate=' + toDate +
            '&pdf=' + pdf + '&date=' + new Date().toISOString(), '_self');
    }
</script>
