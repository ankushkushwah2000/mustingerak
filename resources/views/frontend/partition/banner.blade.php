<section class="p-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div id="carouselExampleCaptions" class="carousel slide " data-bs-ride="carousel">
                    <div class="carousel-indicators mb-lg-5">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active " aria-current="true" aria-label="Slide 1" button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>

                    </div>
                    @foreach ($banner as $b )
                    <div class="carousel-inner p-0">
                        <div class="carousel-item {{$loop->index + 1 == 1 ? 'active' :''}}">
                            <div class="carousel-item banner-bg active ">
                                <div class="row">
                                    <div class="col-md-2 relative d-none d-md-block d-lg-block"> <img src="{{url('frontend/img/banr-1.png')}}" class="banr-1-img"></div>
                                    <div class="col-md-5 p-5  my-md-5 text-white">
                                        <p class="fs-16 fw-700 c2-mm">Best in class...</p>
                                        <p class="fs-40 fw-700 text-black">{{$b->title}}</p>
                                        <p class="fw-700 mt-3 text-black-6">{{$b->sub_title}}</p>
                                        <p class="mt-2"><a href="items-grid-view.html" class="text-decoration-none"><button class="btn btn-c2 ">Shop Now </button></a></p>

                                    </div>
                                    <div class="col-md-5 d-none d-lg-block d-md-block bg-banr-2 relative text-center">
                                        <div class="offer">
                                            <p class="text-center text-white fw-700 fs-30 lh-1">{{round((($b->price -
                                                $b->selling_price)*100)/$b->price)}}% off</p>
                                        </div>
                                        <img src="{{imgSrc($b->image)}}" class="d-block" alt="..." style="height: 400px;
                                        width: 400px;">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <button class="carousel-control-prev ms-1" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon text-black-4" aria-hidden="true"><i class="fa-solid fa-chevron-left"></i></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next me-1" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon text-black-4" aria-hidden="true"><i class="fa-solid fa-chevron-right "></i></span>
                        <span class="visually-hidden">Next</span>
                    </button>


                </div>
            </div>
        </div>
    </div>
</section>

<!-- <section class="gpb">
        <div class="container">
            <div class="row py-5">
                <div class="col-md-1"></div>
                <div class="col-md-6 py-lg-4">
                    <h3 class="text-white">
                        Book an company name from the App
                    </h3>
                    <p class="text-white">
                        Download the app for exclusive deals and ease of shopping
                    </p>

                    <div class="row py-2 ">
                        <div class="col-6 col-md-4">
                            <a href="#"><img src="{{url('frontend/img/gp.png')}}" class="w-100"></a>
                        </div>
                        <div class="col-6 col-md-4">
                            <a href="#"><img src="{{url('frontend/img/as.png')}}" class="w-100"></a>
                        </div>
                        <div class="col-6 col-md-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
