@extends('frontend.master')
@section('content')
@if(Session::has('message'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif
<section class=" bg-white">
    <div class="container-fluid my-3 pt-3">
      <div class="row " >
        <div class="col-md-1"></div>
        <div class="col-11"><h3 class="fw-bold">Cart</h3></div>
        <div class="col-md-1"></div>
      </div>
    </div>
    <div class="container">
      <div class="row " >
        <div class="ps-md-5 table-responsive">
          <table class="table table-striped w-100">
            <thead>
              <tr class="fs-32 text-black-7 fw-700">
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $a )
                @foreach ($a->product as $p )
              <tr>
                <td>
                  <div class="row">
                    <div class="col-4 bg-img text-center">
                      <img src="{{imgSrc($p->image)}}" height="170px" width="auto">
                    </div>
                    <div class="col-8">
                      <div class="fs-22 fw-600 text-black-l w-100">{{$p->title}}</div>
                      <div class="fs-18 fw-700 c1-mm w-100">
                        Rs {{$p->selling_price}}
                        <span class="text-decoration-line-through text-black-4 fs-16 fw-400 ms-2">Rs {{$p->price}}</span>
                      </div>
                      <div class="fs-18 text-black-4 w-100">Color: {{$a->colour}}</div>
                      <div class="fs-18 text-black-4 w-100">Size: {{$a->size}}</div>
                    </div>
                  </div>
                </td>

                <td>
                  <div class="fs-24 fw-700 c1-mm w-100 mt-2"> Rs {{$p->selling_price}}</div>
                </td>
                <td>
                  <div class="w-100px  mt-2">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        {{-- <button class="btn btn-outline-secondary border-0" type="button" id="minus">-</button> --}}
                      </div>
                      <h4 >{{$a->quantity}}</h4>

                      <div class="input-group-append">
                        {{-- <button class="btn btn-outline-secondary border-0" type="button" id="add">+</button> --}}
                      </div>
                    </div>

                  </div>
                </td>
                <td>
                  <div class="fs-24 text-black fw-700 mt-2">Rs {{$a->quantity*$p->selling_price}}</div>
                </td>
                <td>
                  <form action="{{route('delete_from_cart')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$a->id}}">
                  <button class="btn text-black-9" type="submit"> <i class="fa-solid fa-circle-xmark"></i></button>
                  </form>
                </td>
              </tr>
              @endforeach
              @endforeach
            </tbody>
            <tfoot class="py-2">
              <tr>
                <td class="fs-24">
                  <span class="fs-26 fw-700 text-black-7">Promo Code :</span>
                  <input type="text" name="" class="cart-input" placeholder="COUP255552">
                  <span class="fs-20 fw-600 text-black-8">10% OFF</span>
                </td>
                <td class="text-black-7 fs-25 fw-700">Subtotal :</td>
                <td class="text-black-8 fs-25 fw-700">Rs {{$sum}}</td>
                <td class="text-black-7 fs-25 fw-700">Discount</td>
                <td class="text-black-8 fs-25 fw-700">Rs {{0.9*$sum}}</td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <div class="row  my-3  p-4">
        <div class="col-12 text-end">
          <button class="btn btn-c2-outline me-2">Cancel</button>
          <a href="{{route('checkout')}}" class="btn btn-c2" >Checkout</a>
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
          <a href="items-grid-view.html" class="btn btn-c1-mm">View All  <i class="fa fa-long-arrow-alt-right ms-1"></i> </a>
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
