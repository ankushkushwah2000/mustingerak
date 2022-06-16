<section class="py-3 bg-white">
        <div class="container-fluid">
            <div class="row pt-4 owl-carousel px-2 px-lg-3  relative" id="cat">
                @foreach ($data as $a)
                <div class="bg-white p-2">
                    <div class="p-0 m-0">
                        <div class="px-3">
                            <img src="{{ imgSrc($a->image) }}" class="w-100 px-1">
                        </div>
                        <a href="product-details.html" class="text-decoration-none text-black">
                            <div class="row py-3">
                                <div class="col-12 text-black-8 text-center fs-20 fw-700">
                                    {{$a->title}}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach

            </div>
            <!---  owl-carousel-nav        ---->
            <div class="owl-navigation owl-navigation-cat ">
                <span class="owl-nav-prev mr-2"><button class="btn-round"><i class="fa fa-chevron-left"></i></button></span>
                <span class="owl-nav-next ml-2"><button class="btn-round"><i class="fa fa-chevron-right"></i></button></span>
            </div>
        </div>
    </section>
