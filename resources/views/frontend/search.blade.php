@extends('frontend.master')
@section('content')
<section class="page-heading pt-5  bg-white">
    <div class="container">
      <div class="row">
        <div class="col-8 ">
          <h4 class=" fw-bold text-black-l lh-1">Trending Product</h4>
          <p class="text-muted small">About 2,555 results (0.62 seconds)</p>
        </div>
        <div class="col-4 text-end">
          <a class="btn btn-view-2" href="items-list-view.html"> <i class="fa fa-list "></i> </a>
          <a class="btn btn-view-1 " href="items-grid-view.html"> <i class="fas fa-th-large "></i> </a>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-white">
    <div class="container-fluid bg-white">
      <hr ><hr>
    </div>
  </section>

  <section class=" bg-white">
    <div class="container-fluid">
      <div class="row " >
        <div class="col-lg-3 sticky-sm-top sticky-xs-top">
          <nav class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler btn-lg btn-block filter p-3 w-100 mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarProfile" aria-controls="navbarProfile" aria-expanded="false" aria-label="Toggle navigation">
              <b class=""><i class="fas fa-stream me-5"></i>  FILTER </b>
            </button>
            <div class="collapse navbar-collapse " id="navbarProfile">
              <div class="row  ps-lg-5 pe-lg-2">
                <div class="col-12 filter p-3 d-none d-md-block d-lg-block ">
                  <h5 class="">
                    <i class="fas fa-stream me-5"></i>  FILTER
                  </h5>
                </div>
                <div class="col-12 bg-light mt-2">
                  <div class="list-group w-100 mt-2">

                    <a class="list-group-item list-group-item-action  border-0 fw-bold" >
                      <u> Categories </u>
                    </a>
                    <a href="" class="list-group-item list-group-item-action  border-0 fw-bold" data-bs-toggle="collapse" data-bs-target="#Mens">
                      <i class="fa fa-angle-right fw-bold c2-mm me-1" ></i>  Men Wear
                    </a>
                    <div class="collapse show ps-2" id="Mens">
                      <a href="" class="list-group-item list-group-item-action  border-0 fw-bold" data-bs-toggle="collapse" data-bs-target="#Shirt">
                        <i class="fa fa-angle-right fw-bold c2-mm me-1" ></i>  Shirt
                      </a>
                      <div class="collapse show ps-2" id="Shirt">
                        <a href="" class="list-group-item list-group-item-action border-0" >
                           Formal
                        </a>
                        <a href="" class="list-group-item list-group-item-action  border-0" >
                           Check Shirts
                        </a>
                        <a href="" class="list-group-item list-group-item-action  border-0" >
                           Casual
                        </a>
                        <a href="" class="list-group-item list-group-item-action  border-0" >
                           Party Wear
                        </a>
                        <a  class="list-group-item list-group-item-action  border-0" >
                          <button class="btn btn-show-more" data-bs-toggle="collapse" data-bs-target="#Showmore1"> Show more   <i class="fa fa-angle-down ms-1" ></i></button>
                        </a>
                        <div class="collapse ps-2" id="Showmore1">
                          <a href="" class="list-group-item list-group-item-action border-0" >
                             More 1
                          </a>
                          <a href="" class="list-group-item list-group-item-action  border-0" >
                             More 2
                          </a>
                          <a href="" class="list-group-item list-group-item-action  border-0" >
                             More 3
                          </a>
                          <a href="" class="list-group-item list-group-item-action  border-0" >
                             More 4
                          </a>
                        </div>
                      </div>
                    </div>
                    <a href="" class="list-group-item list-group-item-action  border-0 fw-bold" data-bs-toggle="collapse" data-bs-target="#Women">
                      <i class="fa fa-angle-right fw-bold c2-mm me-1" ></i>  Women Wear
                    </a>
                    <div class="collapse  ps-2" id="Women">
                      <a href="" class="list-group-item list-group-item-action  border-0 fw-bold" data-bs-toggle="collapse" data-bs-target="#ShirtW">
                        <i class="fa fa-angle-right fw-bold c2-mm me-1" ></i>  Shirt
                      </a>
                      <div class="collapse show ps-2" id="ShirtW">
                        <a href="" class="list-group-item list-group-item-action border-0" >
                          Formal
                        </a>
                        <a href="" class="list-group-item list-group-item-action  border-0" >
                           Check Shirts
                        </a>
                        <a href="" class="list-group-item list-group-item-action  border-0" >
                           Casual
                        </a>
                        <a href="" class="list-group-item list-group-item-action  border-0" >
                           Party Wear
                        </a>
                        <a  class="list-group-item list-group-item-action  border-0" >
                          <button class="btn btn-show-more" data-bs-toggle="collapse" data-bs-target="#Showmore1W"> Show more  <i class="fa fa-angle-down ms-1" ></i></button>
                        </a>
                        <div class="collapse ps-2" id="Showmore1W">
                          <a href="" class="list-group-item list-group-item-action border-0" >
                            More 1
                          </a>
                          <a href="" class="list-group-item list-group-item-action  border-0" >
                            More 2
                          </a>
                          <a href="" class="list-group-item list-group-item-action  border-0" >
                            More 3
                          </a>
                          <a href="" class="list-group-item list-group-item-action  border-0" >
                            More 4
                          </a>
                        </div>
                      </div>
                    </div>
                    <a href="" class="list-group-item list-group-item-action  border-0 fw-bold" >
                      <i class="fa fa-angle-right fw-bold c2-mm me-1" ></i>  Accessories <br>
                      <span class="fw-normal text-muted me-2">Tablets & Networking</span>
                    </a>
                    <a href="" class="list-group-item list-group-item-action  border-0 fw-bold" >
                      <i class="fa fa-angle-right fw-bold c2-mm me-1" ></i>  Kids Wear <br>
                    </a>
                    <a href="" class="list-group-item list-group-item-action  border-0 fw-bold" >
                      <i class="fa fa-angle-right fw-bold c2-mm me-1" ></i>  Sports <br>
                    </a>
                    <a href="" class="list-group-item list-group-item-action  border-0 fw-bold" >
                      <i class="fa fa-angle-right fw-bold c2-mm me-1" ></i>  Collectibles <br>
                    </a>
                    <a  class="list-group-item list-group-item-action  border-0" >
                      <button class="btn btn-show-more" data-bs-toggle="collapse" data-bs-target="#Expand1"> Expand   <i class="fa fa-angle-down ms-1" ></i></button>
                    </a>
                    <div class="collapse ps-2" id="Expand1">
                      <a href="" class="list-group-item list-group-item-action border-0" >
                         Expand 1
                      </a>
                      <a href="" class="list-group-item list-group-item-action  border-0" >
                         Expand 2
                      </a>
                      <a href="" class="list-group-item list-group-item-action  border-0" >
                         Expand 3
                      </a>
                      <a href="" class="list-group-item list-group-item-action  border-0" >
                         Expand 4
                      </a>
                    </div>

                  </div>
                </div>

                <div class="col-12 collaps-f-box p-3 mt-2 ">
                  <a href="" class="list-group-item list-group-item-action border-0 fw-bold text-black ps-1" data-bs-toggle="collapse" data-bs-target="#Collapsed_filters">
                      Collapsed filters <i class="fa fa-angle-down float-end fw-bold c2-mm" ></i>
                  </a>
                  <div class="collapse ps-2" id="Collapsed_filters">
                    <a href="" class="list-group-item list-group-item-action border-0" >
                       filters 1
                    </a>
                    <a href="" class="list-group-item list-group-item-action  border-0" >
                       filters 2
                    </a>
                    <a href="" class="list-group-item list-group-item-action  border-0" >
                       filters 3
                    </a>
                    <a href="" class="list-group-item list-group-item-action  border-0" >
                       filters 4
                    </a>
                  </div>
                </div>

                <div class="col-12 bg-light p-3 mt-2">
                  <a href="" class="list-group-item list-group-item-action border-0 fw-bold text-black ps-1" data-bs-toggle="collapse" data-bs-target="#Expanded_filters">
                      Expanded Filters <i class="fa fa-angle-down float-end fw-bold c2-mm" ></i>
                  </a>
                  <div class="collapse show ps-2" id="Expanded_filters">
                    <a  class="list-group-item list-group-item-action border-0" >
                       <input type="checkbox" name="" class="me-2"> Recommended
                    </a>
                    <a  class="list-group-item list-group-item-action  border-0" >
                       <input type="checkbox" name="" class="me-2">  Recently Added
                    </a>
                    <a href="" class="list-group-item list-group-item-action  border-0" >
                       <input type="checkbox" name="" class="me-2"> Expiring Soon
                    </a>
                    <a  class="list-group-item list-group-item-action  border-0" >
                       <input type="checkbox" name="" class="me-2">  Most Rated
                    </a>
                    <a  class="list-group-item list-group-item-action  border-0" >
                      <input type="checkbox" name="" class="me-2">  Price: Low → High
                    </a>
                    <a class="list-group-item list-group-item-action  border-0" >
                       <input type="checkbox" name="" class="me-2">  Price: High → Low
                    </a>

                  </div>
                </div>

                <div class="col-12 bg-light p-3 mt-2">
                  <a href="" class="list-group-item list-group-item-action border-0 fw-bold text-black ps-1" data-bs-toggle="collapse" data-bs-target="#Discount_Offers">
                    Discount Offers <i class="fa fa-angle-down float-end fw-bold c2-mm" ></i>
                  </a>
                  <div class="collapse show ps-2" id="Discount_Offers">
                    <a  class="list-group-item list-group-item-action border-0" >
                       <input type="checkbox" name="" class="me-2">  2% Cashback
                    </a>
                    <a  class="list-group-item list-group-item-action  border-0" >
                       <input type="checkbox" name="" class="me-2">  5% Cashback
                    </a>
                    <a href="" class="list-group-item list-group-item-action  border-0" >
                       <input type="checkbox" name="" class="me-2">  25% Cashback
                    </a>
                    <a href="" class="list-group-item list-group-item-action  border-0" >
                       <input type="checkbox" name="" class="me-2">  25% Cashback
                    </a>
                    <a href="" class="list-group-item list-group-item-action  border-0" >
                       <input type="checkbox" name="" class="me-2">  25% Cashback
                    </a>

                  </div>
                </div>
              </div>
            </div>
          </nav>
        </div>
        <div class="col-lg-9 px-3 px-lg-5">
          <div class="row">
            <div class="col-md-12 px-md-1">
              <a href="#"><span class="badge rounded-pill bg-pill-mm">Related</span></a>
              <a href="#"><span class="badge rounded-pill bg-pill-mm">Casual Wear</span></a>
              <a href="#"><span class="badge rounded-pill bg-pill-mm">under Rs 50</span></a>
              <a href="#"><span class="badge rounded-pill bg-pill-mm">Shoes</span></a>
              <a href="#"><span class="badge rounded-pill bg-pill-mm">Kitchen Item</span></a>
              <a href="#"><span class="badge rounded-pill bg-pill-mm">Electronics</span></a>
            </div>
          </div>
         @forelse ($product as $p )
         <div class="row list-box my-3">
            <div class="col-md-3 bg-img relative">
              <p class="text-end img-off round-off">{{round((($p->price -
                $p->selling_price)*100)/$p->price)}}% <br> OFF </p>
              <img src="{{imgSrc($p->image)}}" class="w-100 px-5 mx-lg-3">
            </div>
            <div class="col-md-9 p-4 relative">
              <a href="product-details.html" class="text-decoration-none">
                <div class="w-100 ">
                  <h5 class="fw-bold text-black-l">
                    {{$p->title}}
                    <mark class="float-end  p-1 bg-c2 fw-normal text-white small"><i class="fa fa-star text-white"></i> 4.3</mark>
                  </h5>
                  <h6>
                    <span class="c1-mm fw-bold me-2">Rs {{$p->price}}</span>
                    <span class="text-decoration-line-through text-muted small">Rs {{$p->selling_price}}</span>
                  </h6>
                  <br>
                  <p class="text-muted">{{Str::limit($p->description,100)}}</p>
                  <p class="text-center c2-mm fw-600 pt-2">Upto {{round((($p->price -
                    $p->selling_price)*100)/$p->price)}} %Off</p>
                  <div class="btn-cart-r fw-bold mb-5 pb-3 pe-2">
                    <button class="btn bg-shade"><i class="far fa-heart fa-2x c2-mm "></i></button>
                    <button class="btn bg-shade"><i class="fa fa-shopping-cart fa-2x c2-mm "></i></button>
                  </div>
                </div>
              </a>
            </div>
          </div>
         @empty
             <div>
                <h2>no data found</h2>
             </div>
         @endforelse





          <div class="row  my-3  p-4">
            <div class="col-12 text-center">
              <button class="btn btn-c1">Load More  <i class="fa fa-long-arrow-alt-right ms-1"></i></button>
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
      <div class="owl-navigation owl-navigation-rvpigv " >
        <span class="owl-nav-prev mr-2" ><button class="btn-round"><i class="fa fa-chevron-left"></i></button></span>
        <span class="owl-nav-next ml-2" ><button class="btn-round"><i class="fa fa-chevron-right"></i></button></span>
      </div>
    </div>
  </section>

@endsection
