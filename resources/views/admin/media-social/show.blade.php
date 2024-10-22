<section class="section profile">
    <div class="row">

        <div class="col-xl-12">

            <div class="card">
                <div class="card-body pt-3">
                    <div class="tab-content pt-2">

                        <div class="tab-pane fade show active profile-overview" id="profile-overview">

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Title</div>
                                <div class="col-lg-9 col-md-8">{{ $helpReason->title }}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Description</div>
                                <div class="col-lg-9 col-md-8">{{ $helpReason->description }}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Description</div>
                                <img src="{{ asset('charifit-master/img/help/1.png') }}"
                                    style="width: 180px; height: 150px; object-fit: cover;" alt="">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <a href="{{ route('help-reasons.index') }}" class="btn btn-primary"
                            style="margin-left: 20px; margin-bottom: 10px;">Back</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
