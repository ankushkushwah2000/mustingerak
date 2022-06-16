@extends('frontend.master')
@section('content')
<section class="page-heading py-3 bg-white">
    @foreach ($data as $a)
    <div class="container-fluid bg-white">
        <div class="row mb-3 px-2 px-lg-5 bg-white">
            <div class="col-md-5 p-md-2 mb-2">
                <div class="row">
                    <div class="col-12 p-md-2 justify-content-center shop-img">
                        <img src="{{ imgSrc($a->image) }}" id="pMi" class="shop-img w-100">
                    </div>
                </div>
                <div class="row">
                    @foreach ($a->images as $img )
                    <div class="col py-2">
                        <div class="col mhp text-center">
                            <i class="fas fa-chevron-left c1-mm fw-bold mt-3 fs-20"></i>
                        </div>
                    </div>
                    <div class="col py-2">
                        <div class="col mhp" onclick="document.getElementById('pMi').src='img/product/p1.png'">
                            <img src="{{$img->path}}" class="img img-thumbnail w-100">
                        </div>
                    </div>
                    <div class="col py-2">
                        <div class="col mhp text-center">
                            <i class="fas fa-chevron-right c1-mm fw-bold mt-3 fs-20"></i>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4 p-md-3 py-4 py-lg-5">
                <h4 class="fw-bold"> {{$a->title}}
                    <form>
                    <button class="btn c2-mm float-end"><i class="far fa-2x fa-heart"></i></button>
                    </form>
                </h4>
                <p class="text-success"><i class="fa-regular fa-circle-check me-1"></i> Verified Product</p>
                <p>
                    <i class="fa fa-star c2-mm"></i>
                    <i class="fa fa-star c2-mm"></i>
                    <i class="fa fa-star c2-mm"></i>
                    <i class="fa fa-star c2-mm"></i>
                    <i class="fa fa-star text-muted"></i>
                    <br>
                    <span class="text-muted ms-1"> 4.0 out of (1256)
                        <a href="#Reviews" class="c1-link" onclick="activaTab('Reviews')">Reviews</a></span>
                </p>
                <h5>
                    <span class="fw-bold c1-mm me-1">Rs {{$a->selling_price}} </span>
                    <span class="text-decoration-line-through text-muted me-3">₹ {{$a->price}}</span>
                    <span class="c2-mm  p-1 fs-12">{{ round((($a->price -
                        $a->selling_price)*100)/$a->price) }}% OFF</span>
                </h5>
                <form action="{{url('add_to_cart')}}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" id="" value="{{$a->id}}">
                    <input type="hidden" name="product_name" id="" value="{{$a->title}}">
                    <input type="hidden" name="product_price" id="" value="{{$a->selling_price}}">
                <div class="row py-2">
                    <div class="col-12 mb-2">
                        <h6><label class="fw-bold text-black-l">Select Size : </label></h6>

                        @foreach (explode(',',$a->sizes) as $item)
                        <input class="btn btn-round-s-selected btn-round-s me-1 small"  type="radio" value="{{$item}}" name="size"  required>{{$item}}</input>
                        @endforeach


                    </div>

                </div>
                <div class="row py-2">
                    <div class="col-md-12 col-6 mb-1">
                        <h6 class="text-black-l fw-bold">Select Colour :</h6>
                    </div>
                    <div class="col-md-12 col-6 mb-2">
                        @foreach (explode(',',$a->colours) as $item)
                        <input class="btn btn-round-s-selected btn-round-s me-1 small" type="radio" value="{{$item}}" name="colour" required>{{$item}}</input>

                        @endforeach
                        {{-- <input class="btn btn-c-round bg-p-c1 me-1" type="radio" value="bg-p-c2" name="colour">
                        <input class="btn btn-c-round bg-p-c1 me-1" type="radio" value="bg-p-c3" name="colour">
                        <input class="btn btn-c-round bg-p-c1 me-1" type="radio" value="bg-p-c4" name="colour">
                        <br> <br>
                            <br><button class="btn btn-c-round bg-p-c2 me-1" type="button"> <br>
                            <br><button class="btn btn-c-round bg-p-c3 me-1" type="button"> <br>
                            <br><button class="btn btn-c-round bg-p-c4 me-1" type="button"> <br> --}}

                    </div>
                    <div class="col-md-6 mb-2"></div>
                </div>
                <div class="row py-2">
                    <div class="col-md-4 col-6 mb-2">
                        <h5 class="text-black-l fw-bold">Quantity :</h5>
                    </div>
                    <div class="col-md-4 col-6 mb-2">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary" type="button" id="minus" onclick="Quantitymeasure('sub')">-</button>
                            </div>
                            <input type="number" class="form-control" placeholder="0" value="1" min="1" aria-label="" id="quantity" aria-describedby="basic-addon1" name="quantity" >

                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="add" onclick="Quantitymeasure('add')">+</button>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4 mb-2"></div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <button class="btn btn-n1 me-1" type="submit">ADD TO CART</button>
                        <button class="btn btn-n2" type="submit">BUY NOW</button>
                    </div>

                </div>
            </form>
            </div>
            <div class="col-md-3 p-md-3 pt-2 p-md-4">
                <div class="row product-box-r pt-3 my-2 relative">
                    <div class="col-12">
                        <p class="text-black text-center fw-bold">(3) Offers | Applicable on cart</p>
                        <hr>
                        <div class="list-group w-100 mt-2">
                            <a class="list-group-item list-group-item-action  border-0 fw-bold">
                                <i class="fa-solid fa-tags bg-c2 text-white me-1 p-2 rounded"></i> 15% Instant Discount Using Au Small Finance Bank Debit & Credit Cards T&C
                            </a>
                            <a class="list-group-item list-group-item-action  border-0 fw-bold">
                                <i class="fa-solid fa-tags bg-c2 text-white me-1 p-2 rounded"></i> 15% Instant Discount Using Au Small Finance Bank Debit & Credit Cards T&C
                            </a>

                            <div class="collapse" id="Showmore1">
                                <a class="list-group-item list-group-item-action  border-0 fw-bold">
                                    <i class="fa-solid fa-tags bg-c2 text-white me-1 p-2 rounded"></i> 15% Instant Discount Using Au Small Finance Bank Debit & Credit Cards T&C
                                </a><a class="list-group-item list-group-item-action  border-0 fw-bold">
                                    <i class="fa-solid fa-tags bg-c2 text-white me-1 p-2 rounded"></i> 15% Instant Discount Using Au Small Finance Bank Debit & Credit Cards T&C
                                </a><a class="list-group-item list-group-item-action  border-0 fw-bold">
                                    <i class="fa-solid fa-tags bg-c2 text-white me-1 p-2 rounded"></i> 15% Instant Discount Using Au Small Finance Bank Debit & Credit Cards T&C
                                </a>

                            </div>
                            <a class="list-group-item list-group-item-action  border-0">
                                <p class="text-center cen-bo"><button class="btn btn-exp " data-bs-toggle="collapse" data-bs-target="#Showmore1"><i class="fas fa-chevron-down"></i></button></p>

                            </a>
                        </div>
                    </div>
                </div>

                <div class="row product-box-r mt-lg-4 mt-2 pt-2">
                    <div class="col-12">
                        <label class="text-black-l">Check Delivery Availability :</label>
                        <div class="input-group my-3">
                            <input type="text" class="form-control" placeholder="Enter pin code here">
                            <button class="btn bg-dark text-white" type="button">Check</button>
                        </div>

                        <ul>
                            <li class="text-blue-l">Generally Deliveredbin 5 -6 Days</li>
                            <li class="text-blue-l">100% Original Product</li>
                            <li class="text-blue-l">Cash On Delivery</li>
                            <li class="text-blue-l">Easy 15 Days Return Policy & Exchange</li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="row mb-3 px-2 px-lg-5 bg-white">
                <div class="col-md-12 p-md-2 my-2">
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nec consequat lorem. Maecenas elementum at diam consequat bibendum. Mauris iaculis fringilla ex, sit amet semper libero facilisis sit amet. Nunc ut aliquet metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nec consequat lorem. Maecenas elementum at diam consequat bibendum. Mauris iaculis fringilla ex, sit amet semper libero facilisis sit amet. Nunc ut aliquet metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nec consequat lorem. Maecenas elementum at diam consequat bibendum. Mauris iaculis fringilla ex, sit amet semper libero facilisis sit amet. Nunc ut aliquet metus. </p>
                </div>
            </div>
        </div>

    </div>
    @endforeach
</section>

<section class="pt-2">
    <div class="container">
        <div class="row ">
            <div class="col-md-12" id="description">
                <ul class="nav nav-tabs d-flex justify-content-lg-between justify-content-md-between px-4 tab-bar" id="myTab" role="tablist">
                    <li class="nav-item nav-product" role="presentation">
                        <button class="nav-link active" id="Description-tab" data-bs-toggle="tab" data-bs-target="#Description" type="button" role="tab" aria-controls="Description" aria-selected="true">Description</button>
                    </li>
                    <li class="nav-item nav-product" role="presentation">
                        <button class="nav-link" id="Specifications-tab" data-bs-toggle="tab" data-bs-target="#Specifications" type="button" role="tab" aria-controls="Specifications" aria-selected="false">Specifications</button>
                    </li>
                    <li class="nav-item nav-product" role="presentation">
                        <button class="nav-link" id="Warrenty-tab" data-bs-toggle="tab" data-bs-target="#Warrenty" type="button" role="tab" aria-controls="Warrenty" aria-selected="false">Warrenty</button>
                    </li>
                    <li class="nav-item nav-product" role="presentation">
                        <button class="nav-link" id="Reviews-tab" data-bs-toggle="tab" data-bs-target="#Reviews" type="button" role="tab" aria-controls="Reviews" aria-selected="false">Reviews</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">

                    <!---   Description  --->
                    <div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                        <div class="row">
                            <div class="col-12 py-4 px-4 px-lg-5">
                                <h4 class="text-black-l">Unique Features</h4>
                                <p>Aliquam dis vulputate vulputate integer sagittis. Faucibus dolor ornare faucibus vel sed et eleifend habitasse amet. Montes, mauris varius ac est bibendum. Scelerisque a, risus ac ante. Velit consectetur neque, elit, aliquet. Non varius proin sed urna, egestas consequat laoreet diam tincidunt. Magna eget faucibus cras justo, tortor sed donec tempus. Imperdiet consequat, quis diam arcu, nulla lobortis justo netus dis. Eu in fringilla vulputate nunc nec. Dui, massa viverr .</p>
                                <h4 class="text-black-l">More details</h4>
                                <ul>
                                    <li>Aliquam dis vulputate vulputate integer sagittis. Faucibus ds diam arcu, nulla lobortis justo netus dis. Eu in fringilla vulputate nunc nec. Dui, massa viverr .</li>
                                    <li>Aliquam dis vulputate vulputate integer sagittis. Faucibus ds diam arcu, nulla lobortis justo netus dis. Eu in fringilla vulputate nunc nec. Dui, massa viverr .</li>
                                    <li>Aliquam dis vulputate vulputate integer sagittis. Faucibus ds diam arcu, nulla lobortis justo netus dis. Eu in fringilla vulputate nunc nec. Dui, massa viverr .</li>
                                    <li>Aliquam dis vulputate vulputate integer sagittis. Faucibus ds diam arcu, nulla lobortis justo netus dis. Eu in fringilla vulputate nunc nec. Dui, massa viverr .</li>
                                    <li>Aliquam dis vulputate vulputate integer sagittis. Faucibus ds diam arcu, nulla lobortis justo netus dis. Eu in fringilla vulputate nunc nec. Dui, massa viverr .</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!---   Specifications  --->
                    <div class="tab-pane fade" id="Specifications" role="tabpanel" aria-labelledby="Specifications-tab">
                        <div class="row">
                            <div class="col-12 py-4 px-4 px-lg-5">
                                <h4 class="text-black-l">Specifications</h4>
                                <p>Aliquam dis vulputate vulputate integer sagittis. Faucibus dolor ornare faucibus vel sed et eleifend habitasse amet. Montes, mauris varius ac est bibendum. Scelerisque a, risus ac ante. Velit consectetur neque, elit, aliquet. Non varius proin sed urna, egestas consequat laoreet diam tincidunt. Magna eget faucibus cras justo, tortor sed donec tempus. Imperdiet consequat, quis diam arcu, nulla lobortis justo netus dis. Eu in fringilla vulputate nunc nec. Dui, massa viverr .</p>
                            </div>
                        </div>
                    </div>

                    <!---   Warrenty  --->
                    <div class="tab-pane fade" id="Warrenty" role="tabpanel" aria-labelledby="Warrenty-tab">
                        <div class="row">
                            <div class="col-12 py-4 px-4 px-lg-5">
                                <h4 class="text-black-l">Warrenty</h4>
                                <p>Warrenty dis vulputate vulputate integer sagittis. Faucibus dolor ornare faucibus vel sed et eleifend habitasse amet. Montes, mauris varius ac est bibendum. Scelerisque a, risus ac ante. Velit consectetur neque, elit, aliquet. Non varius proin sed urna, egestas consequat laoreet diam tincidunt. Magna eget faucibus cras justo, tortor sed donec tempus. Imperdiet consequat, quis diam arcu, nulla lobortis justo netus dis. Eu in fringilla vulputate nunc nec. Dui, massa viverr .</p>
                            </div>
                        </div>
                    </div>

                    <!---   Reviews  --->
                    <div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                        <p class="text-end fw-bold">
                            <span class="display-2 c1-mm">4.0</span>
                            <span class="font-13">/5</span>
                            <select class="select-review ms-2">
                                <option>Select</option>
                                <option>Positive First</option>
                                <option>Negative First</option>
                            </select>
                        </p>

                        <div class="row mt-3">
                            <div class="col-1 col-md-1">
                                <img src="img/review.png" class="w-100">
                            </div>
                            <div class="col-11  col-md-8 text-black-8 fs-22 lh-1 fw-600">
                                Shubham Verma
                                <br>
                                <span class="c1-mm fs-14 fw-normal"><i class="fa-regular fa-circle-check me-1"></i> Verified</span>
                            </div>
                            <div class=" col-md-3">
                                <p class="text-center c2-mm">
                                    <i class="fa fa-star c2-mm"></i>
                                    <i class="fa fa-star c2-mm"></i>
                                    <i class="fa fa-star c2-mm"></i>
                                    <i class="fa fa-star c2-mm"></i>
                                    <br>
                                    4.0
                                </p>
                            </div>
                            <div class="mt-1 fs-18 text-black-6">
                                Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sit Lorem ipsum dolor sit
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-1 col-md-1">
                                <img src="img/review.png" class="w-100">
                            </div>
                            <div class="col-11  col-md-8 text-black-8 fs-22 lh-1 fw-600">
                                Shubham Verma
                                <br>
                                <span class="c1-mm fs-14 fw-normal"><i class="fa-regular fa-circle-check me-1"></i> Verified</span>
                            </div>
                            <div class=" col-md-3">
                                <p class="text-center c2-mm">
                                    <i class="fa fa-star c2-mm"></i>
                                    <i class="fa fa-star c2-mm"></i>
                                    <i class="fa fa-star c2-mm"></i>
                                    <i class="fa fa-star c2-mm"></i>
                                    <br>
                                    4.0
                                </p>
                            </div>
                            <div class="mt-1 fs-18 text-black-6">
                                Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sit Lorem ipsum dolor sit
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-1 col-md-1">
                                <img src="img/review.png" class="w-100">
                            </div>
                            <div class="col-11  col-md-8 text-black-8 fs-22 lh-1 fw-600">
                                Shubham Verma
                                <br>
                                <span class="c1-mm fs-14 fw-normal"><i class="fa-regular fa-circle-check me-1"></i> Verified</span>
                            </div>
                            <div class=" col-md-3">
                                <p class="text-center c2-mm">
                                    <i class="fa fa-star c2-mm"></i>
                                    <i class="fa fa-star c2-mm"></i>
                                    <i class="fa fa-star c2-mm"></i>
                                    <i class="fa fa-star c2-mm"></i>
                                    <br>
                                    4.0
                                </p>
                            </div>
                            <div class="mt-1 fs-18 text-black-6">
                                Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sit Lorem ipsum dolor sit
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-1 col-md-1">
                                <img src="img/review.png" class="w-100">
                            </div>
                            <div class="col-11  col-md-8 text-black-8 fs-22 lh-1 fw-600">
                                Shubham Verma
                                <br>
                                <span class="c1-mm fs-14 fw-normal"><i class="fa-regular fa-circle-check me-1"></i> Verified</span>
                            </div>
                            <div class=" col-md-3">
                                <p class="text-center c2-mm">
                                    <i class="fa fa-star c2-mm"></i>
                                    <i class="fa fa-star c2-mm"></i>
                                    <i class="fa fa-star c2-mm"></i>
                                    <i class="fa fa-star c2-mm"></i>
                                    <br>
                                    4.0
                                </p>
                            </div>
                            <div class="mt-1 fs-18 text-black-6">
                                Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sit Lorem ipsum dolor sit
                            </div>
                        </div>
                        <div class="row py-4 my-2">
                            <div class="col-12 text-center pt-1">
                                <a href="#" class="btn btn-c1-mm">See All <i class="fa fa-long-arrow-alt-right ms-1"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="section py-2 bg-light w-100"></div>

<section class="bg-white py-4 px-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 col-7 py-2">
                <h4 class="fw-bold">Recently Viewed Products
                    <br class="d-block d-lg-none d-md-none">
                    <span class="text-muted small fw-normal ms-lg-2"> <i class="fa fa-stopwatch"></i> 02 : 32 : 22 Left</span>
                </h4>
            </div>
            <div class="col-md-3 col-5 text-lg-end text-md-end pt-1">
                <a href="items-grid-view.html" class="btn btn-c1-mm">View All <i class="fa fa-long-arrow-alt-right ms-1"></i> </a>
            </div>
        </div>

        <div class="row pt-4 owl-carousel px-3 relative" id="rvpigv">
            <div class="bg-white p-2">
                <div class="product-box  p-0 m-0">
                    <div class="bg-img relative">
                        <p class="text-end img-off round-off">50% <br> OFF </p>
                        <img src="img/product/product2.png" class="w-100 px-5">
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
                        <img src="img/product/product2.png" class="w-100 px-5">
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
                        <img src="img/product/product2.png" class="w-100 px-5">
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
                        <img src="img/product/product2.png" class="w-100 px-5">
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
                        <img src="img/product/product2.png" class="w-100 px-5">
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
        <div class="owl-navigation owl-navigation-rvpigv ">
            <span class="owl-nav-prev mr-2"><button class="btn-round"><i class="fa fa-chevron-left"></i></button></span>
            <span class="owl-nav-next ml-2"><button class="btn-round"><i class="fa fa-chevron-right"></i></button></span>
        </div>
    </div>
</section>

<script>
    function add_selected_to_size(string)
    {
        var allclass = ["small","medium","extraLarge","extraExtraLarge"];

        allclass.forEach(element => {
            if(element == string)
            {
                console.log("");
            }
            else{
                ids = document.getElementById(element);
                ids.classList.remove("btn-round-s-selected");

            }

        });
       var element =  document.getElementById(string);
        element.classList.add("btn-round-s-selected");
    }

    function Quantitymeasure(perform)
    {
        if(perform == "add")
        {
            var input = document.getElementById('quantity');
            input.value = ++input.value;
        }
        if(perform == "sub")
        {

            var input = document.getElementById('quantity');
            if(input.value == 1)
            {
                input.value = 1;
            }
            else
            {

                input.value -= 1;
            }
        }
    }
</script>


@endsection
