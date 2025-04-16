<section class="section profile">
    <div class="row">

        <div class="col-xl-12">

            <div class="card">
                <div class="card-body pt-3">
                    <div class="tab-content pt-2">

                        <div class="tab-pane fade show active profile-overview" id="profile-overview">

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Title</div>
                                <div class="col-lg-9 col-md-8">{{ $termsConditions->title }}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Description</div>
                                <div class="col-lg-9 col-md-8">{{ $termsConditions->description }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <a href="{{ route('terms-conditions.index') }}" class="btn btn-primary"
                            style="margin-left: 20px; margin-bottom: 10px;">Back</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
