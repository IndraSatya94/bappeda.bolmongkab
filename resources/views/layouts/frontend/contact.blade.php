<section id="kontak" class="contact">
    <div class="container">
        <div class="section-title">
            <h2>Contact</h2>
        </div>

        <div>
            {!! $profile->google_maps ?? null !!}
        </div>

        <div class="row mt-5">
            <div class="col-lg-4">
                <div class="info">
                    <div class="address">
                        <i class="icofont-google-map"></i>
                        <h6>Address :</h6>
                        <small class="text-secondary">{{ $profile->address ?? null }}</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="info">
                    <div class="email">
                        <i class="icofont-envelope"></i>
                        <h6>e-mail :</h6>
                        <small class="text-secondary">{{ $profile->email ?? null }}</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="info">
                    <div class="phone">
                        <i class="icofont-phone"></i>
                        <h6>Phone :</h6>
                        <small class="text-secondary">{{ $profile->phone ?? null }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>