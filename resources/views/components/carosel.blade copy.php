

<div class="container vision-mission-outer">
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/slider-image1.jpg') }}" class="d-block w-100" alt="..."
                     style="height: 600px; object-fit: cover; width: 100vw;">
                <div class="carousel-caption d-none d-md-block text-center">
                    <h5>First Slide Caption</h5>
                    <p>Description of the first slide goes here.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/slider-image2.jpg') }}" class="d-block w-100" alt="..."
                     style="height: 600px; object-fit: cover; width: 100vw;">
                <div class="carousel-caption d-none d-md-block text-center">
                    <h5>Second Slide Caption</h5>
                    <p>Description of the second slide goes here.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/slider-image3.jpg') }}" class="d-block w-100" alt="..."
                     style="height: 600px; object-fit: cover; width: 100vw;">
                <div class="carousel-caption d-none d-md-block text-center">
                    <h5>Third Slide Caption</h5>
                    <p>Description of the third slide goes here.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
