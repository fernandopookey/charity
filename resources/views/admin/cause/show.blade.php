<section class="section profile">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body pt-3">
                    <div class="tab-content pt-2">
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Title</div>
                                <div class="col-lg-9 col-md-8">{{ $cause->title }}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Goal</div>
                                <div class="col-lg-9 col-md-8">{{ rupiahFormat($cause->goal) }}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Raised</div>
                                <div class="col-lg-9 col-md-8">{{ rupiahFormat($cause->raised) }}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Description</div>
                                <div class="col-lg-9 col-md-8">{{ $cause->description }}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Description</div>
                                <img src="{{ asset('charifit-master/img/help/1.png') }}"
                                    style="width: 180px; height: 150px; object-fit: cover;" alt="">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="tab-content pt-2">
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Created At</div>
                                <div class="col-lg-9 col-md-8">{{ dateFormat($cause->created_at, 'DD MMMM YYYY') }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Expired Date</div>
                                <div class="col-lg-9 col-md-8">{{ dateFormat($cause->expired_date, 'DD MMMM YYYY') }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Days Left</div>
                                <div class="col-lg-9 col-md-8">{{ $cause->left_days }} Days</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Visibility</div>
                                <div class="col-lg-9 col-md-8">
                                    @if ($cause->left_days == 1)
                                        Publish
                                    @else
                                        Non Publish
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Active Status</div>
                                <div class="col-lg-9 col-md-8">
                                    @if ($cause->active_status == 'Running')
                                        Running
                                    @else
                                        Ended
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <a href="{{ route('cause.index') }}" class="btn btn-primary"
                            style="margin-left: 20px; margin-bottom: 10px;">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
