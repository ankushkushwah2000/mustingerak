<section class="bg-white py-4 px-3 py-lg-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 col-7 py-2">
                    <h4 class="fw-bold">Deals Of The Day
                        <br class="d-block d-lg-none d-md-none">
                        <span class="text-muted small fw-normal ms-lg-2"> <i class="fa fa-stopwatch"></i> 02 : 32 : 22 Left</span>
                    </h4>
                </div>
                <div class="col-md-3 col-5 text-lg-end text-md-end pt-1">
                    <a href="items-grid-view.html" class="btn btn-c1-mm">View All <i class="fa fa-long-arrow-alt-right ms-1"></i> </a>
                </div>
            </div>

            <div class="row pt-4 owl-carousel px-3 relative" id="dod">
                @foreach ($product as $a)
                <div class="bg-white p-2">
                    <div class="product-box relative p-0 m-0">
                        <a href="{{url('singal_product/'.$a->id)}}">
                        <div class="bg-img">
                            <p class="text-end img-off round-off">{{ round((($a->price -
                                $a->selling_price)*100)/$a->price) }}% <br> OFF </p>
                            <img src="{{ imgSrc($a->image) }}" class="w-100 px-5">
                        </div>
                    </a>
                        <a href="{{url('singal_product/'.$a->id)}}" class="text-decoration-none text-black">
                            <div class="row p-3">
                                <div class="col-12">
                                    <h6 class="fw-bold text-black-l">
                                        {{$a->title}}
                                        <mark class="float-end  p-1 bg-c2 fw-normal text-white small"><i class="fa fa-star text-white"></i> 4.3</mark>
                                    </h6>
                                    <h5>
                                        <span class="c1-mm fw-bold me-2">Rs {{$a->selling_price}}</span>
                                        <span class="text-decoration-line-through text-muted small">Rs {{$a->price}}</span>
                                    </h5>
                                    <p class="text-center c2-mm fw-600 pt-2">Upto {{ round((($a->price -
                                        $a->selling_price)*100)/$a->price) }}% Off</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach


            </div>
            <!---  owl-carousel-nav        ---->
            <div class="owl-navigation owl-navigation-dod ">
                <span class="owl-nav-prev mr-2"><button class="btn-round"><i class="fa fa-chevron-left"></i></button></span>
                <span class="owl-nav-next ml-2"><button class="btn-round"><i class="fa fa-chevron-right"></i></button></span>
            </div>
        </div>
    </section>

    <section class="">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 relative">
                    <img src="{{url('frontend/img/sales1.png')}}" class="w-100">
                    <a href="items-grid-view.html" class="btn btn-c2 btn-ab-botm text-center">Shop Now</a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-4 px-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 col-7 py-2">
                    <h4 class="fw-bold">Trending Products </h4>
                </div>
                <div class="col-md-3 col-5 text-lg-end text-md-end pt-1">
                    <a href="items-grid-view.html" class="btn btn-c1-mm">View All <i class="fa fa-long-arrow-alt-right ms-1"></i> </a>
                </div>
            </div>

            <div class="row pt-4 owl-carousel px-3 relative" id="tp">
                <div class="bg-white p-2">
                    <div class="product-box  p-0 m-0">
                        <div class="bg-img relative">
                            <p class="text-end img-off round-off">50% <br> OFF </p>
                            <img src="{{url('frontend/img/product/product2.png')}}" class="w-100 px-5">
                            <div class=" btn-cart-r fw-bold mb-3">
                                <button class="btn bg-shade"><i class="far fa-heart c2-mm "></i></button>
                                <br class="lh-1">
                                <button class="btn bg-shade"><i class="fa fa-shopping-cart c2-mm "></i></button>
                            </div>
                        </div>
                        <a href="product-details.html" class="text-decoration-none text-black">
                            <div class="row p-3">
                                <div class="col-12">
                                    <h6 class="fw-bold text-black-l">
                                        Lorem Ipsum
                                        <mark class="float-end  p-1 bg-c2 fw-normal text-white small"><i class="fa fa-star text-white"></i> 4.3</mark>
                                    </h6>
                                    <h5>
                                        <span class="c1-mm fw-bold me-2">Rs 599.00</span>
                                        <span class="text-decoration-line-through text-muted small">Rs 699.00</span>
                                    </h5>
                                    <p class="text-center c2-mm fw-600 pt-2">Upto 50% Off</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="bg-white p-2">
                    <div class="product-box  p-0 m-0">
                        <div class="bg-img relative">
                            <p class="text-end img-off round-off">50% <br> OFF </p>
                            <img src="{{url('frontend/img/product/product2.png')}}" class="w-100 px-5">
                            <div class=" btn-cart-r fw-bold mb-3">
                                <button class="btn bg-shade"><i class="far fa-heart c2-mm "></i></button>
                                <br class="lh-1">
                                <button class="btn bg-shade"><i class="fa fa-shopping-cart c2-mm "></i></button>
                            </div>
                        </div>
                        <a href="product-details.html" class="text-decoration-none text-black">
                            <div class="row p-3">
                                <div class="col-12">
                                    <h6 class="fw-bold text-black-l">
                                        Lorem Ipsum
                                        <mark class="float-end  p-1 bg-c2 fw-normal text-white small"><i class="fa fa-star text-white"></i> 4.3</mark>
                                    </h6>
                                    <h5>
                                        <span class="c1-mm fw-bold me-2">Rs 599.00</span>
                                        <span class="text-decoration-line-through text-muted small">Rs 699.00</span>
                                    </h5>
                                    <p class="text-center c2-mm fw-600 pt-2">Upto 50% Off</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="bg-white p-2">
                    <div class="product-box  p-0 m-0">
                        <div class="bg-img relative">
                            <p class="text-end img-off round-off">50% <br> OFF </p>
                            <img src="{{url('frontend/img/product/product2.png')}}" class="w-100 px-5">
                            <div class=" btn-cart-r fw-bold mb-3">
                                <button class="btn bg-shade"><i class="far fa-heart c2-mm "></i></button>
                                <br class="lh-1">
                                <button class="btn bg-shade"><i class="fa fa-shopping-cart c2-mm "></i></button>
                            </div>
                        </div>
                        <a href="product-details.html" class="text-decoration-none text-black">
                            <div class="row p-3">
                                <div class="col-12">
                                    <h6 class="fw-bold text-black-l">
                                        Lorem Ipsum
                                        <mark class="float-end  p-1 bg-c2 fw-normal text-white small"><i class="fa fa-star text-white"></i> 4.3</mark>
                                    </h6>
                                    <h5>
                                        <span class="c1-mm fw-bold me-2">Rs 599.00</span>
                                        <span class="text-decoration-line-through text-muted small">Rs 699.00</span>
                                    </h5>
                                    <p class="text-center c2-mm fw-600 pt-2">Upto 50% Off</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="bg-white p-2">
                    <div class="product-box  p-0 m-0">
                        <div class="bg-img relative">
                            <p class="text-end img-off round-off">50% <br> OFF </p>
                            <img src="{{url('frontend/img/product/product2.png')}}" class="w-100 px-5">
                            <div class=" btn-cart-r fw-bold mb-3">
                                <button class="btn bg-shade"><i class="far fa-heart c2-mm "></i></button>
                                <br class="lh-1">
                                <button class="btn bg-shade"><i class="fa fa-shopping-cart c2-mm "></i></button>
                            </div>
                        </div>
                        <a href="product-details.html" class="text-decoration-none text-black">
                            <div class="row p-3">
                                <div class="col-12">
                                    <h6 class="fw-bold text-black-l">
                                        Lorem Ipsum
                                        <mark class="float-end  p-1 bg-c2 fw-normal text-white small"><i class="fa fa-star text-white"></i> 4.3</mark>
                                    </h6>
                                    <h5>
                                        <span class="c1-mm fw-bold me-2">Rs 599.00</span>
                                        <span class="text-decoration-line-through text-muted small">Rs 699.00</span>
                                    </h5>
                                    <p class="text-center c2-mm fw-600 pt-2">Upto 50% Off</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="bg-white p-2">
                    <div class="product-box  p-0 m-0">
                        <div class="bg-img relative">
                            <p class="text-end img-off round-off">50% <br> OFF </p>
                            <img src="{{url('frontend/img/product/product2.png')}}" class="w-100 px-5">
                            <div class=" btn-cart-r fw-bold mb-3">
                                <button class="btn bg-shade"><i class="far fa-heart c2-mm "></i></button>
                                <br class="lh-1">
                                <button class="btn bg-shade"><i class="fa fa-shopping-cart c2-mm "></i></button>
                            </div>
                        </div>
                        <a href="product-details.html" class="text-decoration-none text-black">
                            <div class="row p-3">
                                <div class="col-12">
                                    <h6 class="fw-bold text-black-l">
                                        Lorem Ipsum
                                        <mark class="float-end  p-1 bg-c2 fw-normal text-white small"><i class="fa fa-star text-white"></i> 4.3</mark>
                                    </h6>
                                    <h5>
                                        <span class="c1-mm fw-bold me-2">Rs 599.00</span>
                                        <span class="text-decoration-line-through text-muted small">Rs 699.00</span>
                                    </h5>
                                    <p class="text-center c2-mm fw-600 pt-2">Upto 50% Off</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
            <!---  owl-carousel-nav        ---->
            <div class="owl-navigation owl-navigation-tp ">
                <span class="owl-nav-prev mr-2"><button class="btn-round"><i class="fa fa-chevron-left"></i></button></span>
                <span class="owl-nav-next ml-2"><button class="btn-round"><i class="fa fa-chevron-right"></i></button></span>
            </div>
        </div>
    </section>

    <section class="bg-white py-4 px-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 col-7 py-2">
                    <h4 class="fw-bold">Best Products Of The Week </h4>
                </div>
                <div class="col-md-3 col-5 text-lg-end text-md-end pt-1">
                    <a href="items-grid-view.html" class="btn btn-c1-mm">View All <i class="fa fa-long-arrow-alt-right ms-1"></i> </a>
                </div>
            </div>

            <div class="row pt-4 owl-carousel px-3 relative" id="bpw">
                <div class="bg-white p-2">
                    <div class="product-box  p-0 m-0">
                        <div class="bg-img relative">
                            <p class="text-end img-off round-off">50% <br> OFF </p>
                            <img src="{{url('frontend/img/product/product3.png')}}" class="w-100 px-5">
                            <div class=" btn-cart-r fw-bold mb-3">
                                <button class="btn bg-shade"><i class="far fa-heart c2-mm "></i></button>
                                <br class="lh-1">
                                <button class="btn bg-shade"><i class="fa fa-shopping-cart c2-mm "></i></button>
                            </div>
                        </div>
                        <a href="product-details.html" class="text-decoration-none text-black">
                            <div class="row p-3">
                                <div class="col-12">
                                    <h6 class="fw-bold text-black-l">
                                        Lorem Ipsum
                                        <mark class="float-end  p-1 bg-c2 fw-normal text-white small"><i class="fa fa-star text-white"></i> 4.3</mark>
                                    </h6>
                                    <h5>
                                        <span class="c1-mm fw-bold me-2">Rs 599.00</span>
                                        <span class="text-decoration-line-through text-muted small">Rs 699.00</span>
                                    </h5>
                                    <p class="text-center c2-mm fw-600 pt-2">Upto 50% Off</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="bg-white p-2">
                    <div class="product-box  p-0 m-0">
                        <div class="bg-img relative">
                            <p class="text-end img-off round-off">50% <br> OFF </p>
                            <img src="{{url('frontend/img/product/product3.png')}}" class="w-100 px-5">
                            <div class=" btn-cart-r fw-bold mb-3">
                                <button class="btn bg-shade"><i class="far fa-heart c2-mm "></i></button>
                                <br class="lh-1">
                                <button class="btn bg-shade"><i class="fa fa-shopping-cart c2-mm "></i></button>
                            </div>
                        </div>
                        <a href="product-details.html" class="text-decoration-none text-black">
                            <div class="row p-3">
                                <div class="col-12">
                                    <h6 class="fw-bold text-black-l">
                                        Lorem Ipsum
                                        <mark class="float-end  p-1 bg-c2 fw-normal text-white small"><i class="fa fa-star text-white"></i> 4.3</mark>
                                    </h6>
                                    <h5>
                                        <span class="c1-mm fw-bold me-2">Rs 599.00</span>
                                        <span class="text-decoration-line-through text-muted small">Rs 699.00</span>
                                    </h5>
                                    <p class="text-center c2-mm fw-600 pt-2">Upto 50% Off</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="bg-white p-2">
                    <div class="product-box  p-0 m-0">
                        <div class="bg-img relative">
                            <p class="text-end img-off round-off">50% <br> OFF </p>
                            <img src="{{url('frontend/img/product/product3.png')}}" class="w-100 px-5">
                            <div class=" btn-cart-r fw-bold mb-3">
                                <button class="btn bg-shade"><i class="far fa-heart c2-mm "></i></button>
                                <br class="lh-1">
                                <button class="btn bg-shade"><i class="fa fa-shopping-cart c2-mm "></i></button>
                            </div>
                        </div>
                        <a href="product-details.html" class="text-decoration-none text-black">
                            <div class="row p-3">
                                <div class="col-12">
                                    <h6 class="fw-bold text-black-l">
                                        Lorem Ipsum
                                        <mark class="float-end  p-1 bg-c2 fw-normal text-white small"><i class="fa fa-star text-white"></i> 4.3</mark>
                                    </h6>
                                    <h5>
                                        <span class="c1-mm fw-bold me-2">Rs 599.00</span>
                                        <span class="text-decoration-line-through text-muted small">Rs 699.00</span>
                                    </h5>
                                    <p class="text-center c2-mm fw-600 pt-2">Upto 50% Off</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="bg-white p-2">
                    <div class="product-box  p-0 m-0">
                        <div class="bg-img relative">
                            <p class="text-end img-off round-off">50% <br> OFF </p>
                            <img src="{{url('frontend/img/product/product3.png')}}" class="w-100 px-5">
                            <div class=" btn-cart-r fw-bold mb-3">
                                <button class="btn bg-shade"><i class="far fa-heart c2-mm "></i></button>
                                <br class="lh-1">
                                <button class="btn bg-shade"><i class="fa fa-shopping-cart c2-mm "></i></button>
                            </div>
                        </div>
                        <a href="product-details.html" class="text-decoration-none text-black">
                            <div class="row p-3">
                                <div class="col-12">
                                    <h6 class="fw-bold text-black-l">
                                        Lorem Ipsum
                                        <mark class="float-end  p-1 bg-c2 fw-normal text-white small"><i class="fa fa-star text-white"></i> 4.3</mark>
                                    </h6>
                                    <h5>
                                        <span class="c1-mm fw-bold me-2">Rs 599.00</span>
                                        <span class="text-decoration-line-through text-muted small">Rs 699.00</span>
                                    </h5>
                                    <p class="text-center c2-mm fw-600 pt-2">Upto 50% Off</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="bg-white p-2">
                    <div class="product-box  p-0 m-0">
                        <div class="bg-img relative">
                            <p class="text-end img-off round-off">50% <br> OFF </p>
                            <img src="{{url('frontend/img/product/product3.png')}}" class="w-100 px-5">
                            <div class=" btn-cart-r fw-bold mb-3">
                                <button class="btn bg-shade"><i class="far fa-heart c2-mm "></i></button>
                                <br class="lh-1">
                                <button class="btn bg-shade"><i class="fa fa-shopping-cart c2-mm "></i></button>
                            </div>
                        </div>
                        <a href="product-details.html" class="text-decoration-none text-black">
                            <div class="row p-3">
                                <div class="col-12">
                                    <h6 class="fw-bold text-black-l">
                                        Lorem Ipsum
                                        <mark class="float-end  p-1 bg-c2 fw-normal text-white small"><i class="fa fa-star text-white"></i> 4.3</mark>
                                    </h6>
                                    <h5>
                                        <span class="c1-mm fw-bold me-2">Rs 599.00</span>
                                        <span class="text-decoration-line-through text-muted small">Rs 699.00</span>
                                    </h5>
                                    <p class="text-center c2-mm fw-600 pt-2">Upto 50% Off</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
            <!---  owl-carousel-nav        ---->
            <div class="owl-navigation owl-navigation-bpw ">
                <span class="owl-nav-prev mr-2"><button class="btn-round"><i class="fa fa-chevron-left"></i></button></span>
                <span class="owl-nav-next ml-2"><button class="btn-round"><i class="fa fa-chevron-right"></i></button></span>
            </div>
        </div>
    </section>

    <section class="bg-white py-4 px-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 col-7 py-2">
                    <h4 class="fw-bold">Must Buy Products </h4>
                </div>
                <div class="col-md-3 col-5 text-lg-end text-md-end pt-1">
                    <a href="items-grid-view.html" class="btn btn-c1-mm">View All <i class="fa fa-long-arrow-alt-right ms-1"></i> </a>
                </div>
            </div>

            <div class="row pt-4 owl-carousel px-3 relative" id="mbp">
                <div class="bg-white p-2">
                    <div class="product-box  p-0 m-0">
                        <div class="bg-img relative">
                            <p class="text-end img-off round-off">50% <br> OFF </p>
                            <img src="{{url('frontend/img/product/product2.png')}}" class="w-100 px-5">
                            <div class=" btn-cart-r fw-bold mb-3">
                                <button class="btn bg-shade"><i class="far fa-heart c2-mm "></i></button>
                                <br class="lh-1">
                                <button class="btn bg-shade"><i class="fa fa-shopping-cart c2-mm "></i></button>
                            </div>
                        </div>
                        <a href="product-details.html" class="text-decoration-none text-black">
                            <div class="row p-3">
                                <div class="col-12">
                                    <h6 class="fw-bold text-black-l">
                                        Lorem Ipsum
                                        <mark class="float-end  p-1 bg-c2 fw-normal text-white small"><i class="fa fa-star text-white"></i> 4.3</mark>
                                    </h6>
                                    <h5>
                                        <span class="c1-mm fw-bold me-2">Rs 599.00</span>
                                        <span class="text-decoration-line-through text-muted small">Rs 699.00</span>
                                    </h5>
                                    <p class="text-center c2-mm fw-600 pt-2">Upto 50% Off</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="bg-white p-2">
                    <div class="product-box  p-0 m-0">
                        <div class="bg-img relative">
                            <p class="text-end img-off round-off">50% <br> OFF </p>
                            <img src="{{url('frontend/img/product/product2.png')}}" class="w-100 px-5">
                            <div class=" btn-cart-r fw-bold mb-3">
                                <button class="btn bg-shade"><i class="far fa-heart c2-mm "></i></button>
                                <br class="lh-1">
                                <button class="btn bg-shade"><i class="fa fa-shopping-cart c2-mm "></i></button>
                            </div>
                        </div>
                        <a href="product-details.html" class="text-decoration-none text-black">
                            <div class="row p-3">
                                <div class="col-12">
                                    <h6 class="fw-bold text-black-l">
                                        Lorem Ipsum
                                        <mark class="float-end  p-1 bg-c2 fw-normal text-white small"><i class="fa fa-star text-white"></i> 4.3</mark>
                                    </h6>
                                    <h5>
                                        <span class="c1-mm fw-bold me-2">Rs 599.00</span>
                                        <span class="text-decoration-line-through text-muted small">Rs 699.00</span>
                                    </h5>
                                    <p class="text-center c2-mm fw-600 pt-2">Upto 50% Off</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="bg-white p-2">
                    <div class="product-box  p-0 m-0">
                        <div class="bg-img relative">
                            <p class="text-end img-off round-off">50% <br> OFF </p>
                            <img src="{{url('frontend/img/product/product2.png')}}" class="w-100 px-5">
                            <div class=" btn-cart-r fw-bold mb-3">
                                <button class="btn bg-shade"><i class="far fa-heart c2-mm "></i></button>
                                <br class="lh-1">
                                <button class="btn bg-shade"><i class="fa fa-shopping-cart c2-mm "></i></button>
                            </div>
                        </div>
                        <a href="product-details.html" class="text-decoration-none text-black">
                            <div class="row p-3">
                                <div class="col-12">
                                    <h6 class="fw-bold text-black-l">
                                        Lorem Ipsum
                                        <mark class="float-end  p-1 bg-c2 fw-normal text-white small"><i class="fa fa-star text-white"></i> 4.3</mark>
                                    </h6>
                                    <h5>
                                        <span class="c1-mm fw-bold me-2">Rs 599.00</span>
                                        <span class="text-decoration-line-through text-muted small">Rs 699.00</span>
                                    </h5>
                                    <p class="text-center c2-mm fw-600 pt-2">Upto 50% Off</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="bg-white p-2">
                    <div class="product-box  p-0 m-0">
                        <div class="bg-img relative">
                            <p class="text-end img-off round-off">50% <br> OFF </p>
                            <img src="{{url('frontend/img/product/product2.png')}}" class="w-100 px-5">
                            <div class=" btn-cart-r fw-bold mb-3">
                                <button class="btn bg-shade"><i class="far fa-heart c2-mm "></i></button>
                                <br class="lh-1">
                                <button class="btn bg-shade"><i class="fa fa-shopping-cart c2-mm "></i></button>
                            </div>
                        </div>
                        <a href="product-details.html" class="text-decoration-none text-black">
                            <div class="row p-3">
                                <div class="col-12">
                                    <h6 class="fw-bold text-black-l">
                                        Lorem Ipsum
                                        <mark class="float-end  p-1 bg-c2 fw-normal text-white small"><i class="fa fa-star text-white"></i> 4.3</mark>
                                    </h6>
                                    <h5>
                                        <span class="c1-mm fw-bold me-2">Rs 599.00</span>
                                        <span class="text-decoration-line-through text-muted small">Rs 699.00</span>
                                    </h5>
                                    <p class="text-center c2-mm fw-600 pt-2">Upto 50% Off</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="bg-white p-2">
                    <div class="product-box  p-0 m-0">
                        <div class="bg-img relative">
                            <p class="text-end img-off round-off">50% <br> OFF </p>
                            <img src="{{url('frontend/img/product/product2.png')}}" class="w-100 px-5">
                            <div class=" btn-cart-r fw-bold mb-3">
                                <button class="btn bg-shade"><i class="far fa-heart c2-mm "></i></button>
                                <br class="lh-1">
                                <button class="btn bg-shade"><i class="fa fa-shopping-cart c2-mm "></i></button>
                            </div>
                        </div>
                        <a href="product-details.html" class="text-decoration-none text-black">
                            <div class="row p-3">
                                <div class="col-12">
                                    <h6 class="fw-bold text-black-l">
                                        Lorem Ipsum
                                        <mark class="float-end  p-1 bg-c2 fw-normal text-white small"><i class="fa fa-star text-white"></i> 4.3</mark>
                                    </h6>
                                    <h5>
                                        <span class="c1-mm fw-bold me-2">Rs 599.00</span>
                                        <span class="text-decoration-line-through text-muted small">Rs 699.00</span>
                                    </h5>
                                    <p class="text-center c2-mm fw-600 pt-2">Upto 50% Off</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
            <!---  owl-carousel-nav        ---->
            <div class="owl-navigation owl-navigation-mbp ">
                <span class="owl-nav-prev mr-2"><button class="btn-round"><i class="fa fa-chevron-left"></i></button></span>
                <span class="owl-nav-next ml-2"><button class="btn-round"><i class="fa fa-chevron-right"></i></button></span>
            </div>
        </div>
    </section>

    <section class="py-2 bg-light my-2">
        <div class="container-fluid bg-white">
            <div class="row">
                <div class="col-12 relative">
                    <img src="{{url('frontend/img/sales1.png')}}" class="w-100">
                    <a href="items-grid-view.html" class="btn btn-c2 btn-ab-botm text-center">Shop Now</a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 col-7 py-2">
                    <h4 class="fw-bold">Shop By Brands
                    </h4>
                </div>
                <div class="col-md-3 col-5 text-lg-end text-md-end pt-1">
                    <a href="items-grid-view.html" class="btn btn-c1-mm">View All <i class="fa fa-long-arrow-alt-right ms-1"></i> </a>
                </div>
            </div>
        </div>
        <div class="container py-4">
            <div class="row">
                <div class="col-md-4 p-2 relative">
                    <img src="{{url('frontend/img/brand/1.png')}}" class="w-100">
                    <div class="sbb-box text-center">
                        <button class="btn bg-white border-0 text-black-8">LOREM IPSUM</button>
                    </div>
                </div>
                <div class="col-md-4 p-2 relative">
                    <img src="{{url('frontend/img/brand/2.png')}}" class="w-100">
                    <div class="sbb-box text-center">
                        <button class="btn bg-white border-0 text-black-8">LOREM IPSUM</button>
                    </div>
                </div>
                <div class="col-md-4 p-2 relative">
                    <img src="{{url('frontend/img/brand/3.png')}}" class="w-100">
                    <div class="sbb-box text-center">
                        <button class="btn bg-white border-0 text-black-8">LOREM IPSUM</button>
                    </div>
                </div>
                <div class="col-md-4 p-2 relative">
                    <img src="{{url('frontend/img/brand/4.png')}}" class="w-100">
                    <div class="sbb-box text-center">
                        <button class="btn bg-white border-0 text-black-8">LOREM IPSUM</button>
                    </div>
                </div>
                <div class="col-md-4 p-2 relative">
                    <img src="{{url('frontend/img/brand/5.png')}}" class="w-100">
                    <div class="sbb-box text-center">
                        <button class="btn bg-white border-0 text-black-8">LOREM IPSUM</button>
                    </div>
                </div>
                <div class="col-md-4 p-2 relative">
                    <img src="{{url('frontend/img/brand/6.png')}}" class="w-100">
                    <div class="sbb-box text-center">
                        <button class="btn bg-white border-0 text-black-8">LOREM IPSUM</button>
                    </div>
                </div>
                <div class="col-md-4 p-2 relative">
                    <img src="{{url('frontend/img/brand/7.png')}}" class="w-100">
                    <div class="sbb-box text-center">
                        <button class="btn bg-white border-0 text-black-8">LOREM IPSUM</button>
                    </div>
                </div>
                <div class="col-md-4 p-2 relative">
                    <img src="{{url('frontend/img/brand/8.png')}}" class="w-100">
                    <div class="sbb-box text-center">
                        <button class="btn bg-white border-0 text-black-8">LOREM IPSUM</button>
                    </div>
                </div>
                <div class="col-md-4 p-2 relative">
                    <img src="{{url('frontend/img/brand/9.png')}}" class="w-100">
                    <div class="sbb-box text-center">
                        <button class="btn bg-white border-0 text-black-8">LOREM IPSUM</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
