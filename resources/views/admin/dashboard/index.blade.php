<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">

                <!-- Sales Card -->
                <div class="col-xxl-3 col-md-4">
                    <div class="card info-card sales-card">

                        {{-- <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>

                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div> --}}

                        <div class="card-body">
                            <h5 class="card-title">Users</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cart"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $users }}</h6>
                                    {{-- <span class="text-success small pt-1 fw-bold">12%</span> <span
                                        class="text-muted small pt-2 ps-1">increase</span> --}}
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->

                <!-- Revenue Card -->
                <div class="col-xxl-3 col-md-4">
                    <div class="card info-card revenue-card">

                        <div class="card-body">
                            <h5 class="card-title">Causes</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-currency-dollar"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $causes }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Revenue Card -->

                <!-- Customers Card -->
                <div class="col-xxl-3 col-xl-3">

                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Transactions</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $transactions }}</h6>
                                </div>
                            </div>

                        </div>
                    </div>

                </div><!-- End Customers Card -->

                {{-- <!-- Customers Card -->
                <div class="col-xxl-3 col-xl-3">

                    <div class="card info-card customers-card">

                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                    class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>

                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Customers <span>| This Year</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>1244</h6>
                                    <span class="text-danger small pt-1 fw-bold">12%</span> <span
                                        class="text-muted small pt-2 ps-1">decrease</span>

                                </div>
                            </div>

                        </div>
                    </div>

                </div><!-- End Customers Card --> --}}

            </div>
        </div><!-- End Left side columns -->

    </div>
</section>
