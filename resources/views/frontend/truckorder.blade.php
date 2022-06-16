@extends('frontend.master')
@section('content')
<section class="py-4">
      <div class="container">
        <div class="row " >
          <div class="col-lg-3 sticky-sm-top sticky-xs-top ">
            <nav class="navbar navbar-expand-lg navbar-light dashboard-box">
              <button class="navbar-toggler btn-lg btn-block w-100 mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarProfile" aria-controls="navbarProfile" aria-expanded="false" aria-label="Toggle navigation">
                <b class="text-black">My Profile <i class="fa fa-caret-down ms-4"></i></b>
              </button>
              <div class="collapse navbar-collapse" id="navbarProfile">
                <div class="list-group w-100">
                  <a class="list-group-item list-group-item-action bg-black d-none d-md-block d-lg-block profile-top" aria-current="true">
                    <h4 class="text-center py-2">My Profile</h4>
                  </a>
                  <a class="list-group-item list-group-item-action text-center profile-bg p-0 m-0">
                    <div class="profile-bg-f w-100  py-3">
                      <img src="img/profile.png" class="profile-img   rounded-circle" >
                      <h5  class="text-blue-d mt-2 fs-24 fw-700">Nitish Kumar</h5>
                      <p class="text-blue-d m-0 p-0 lh-1">abc@gmail.com</p>
                    </div>
                  </a>
                  <a href="profile.html" class="list-group-item list-group-item-action fs-16 ">   Account Details </a>
                  <a href="orders.html" class="list-group-item list-group-item-action fs-16"> Orders  </a>
                  <a href="address.html" class="list-group-item list-group-item-action fs-16">   Address </a>
                  <a href="track-order.html" class="list-group-item list-group-item-action fs-16 active">  Track Order  </a>
                  <a href="profile-faqs.html" class="list-group-item list-group-item-action fs-16">  FAQs  </a>
                  <a href="coupon.html" class="list-group-item list-group-item-actionfs-16">  Coupons  </a>
                  <a href="product-review.html" class="list-group-item list-group-item-action fs-16">   Product Reviews  </a>
                  <a class="list-group-item list-group-item-action fs-16 text-danger" href="#"> Log Out </a>

                </div>
              </div>
            </nav>
          </div>
          <div class="col-lg-9 p-3  pb-5 px-4">

            <h3 class="mb-3">Track Order</h3>
            <div class="row my-3 p-4 bg-track" >
              <div class="col-12 col-md-12">
                <div class="row d-flex justify-content-center">
                  <div class="col-12 ">
                    <ul id="progressbar" class="text-center">
                        <li class="active step0 text-light fw-bold"> <small class="fw-normal">Order Placed </small> <br>Jan 05, 2022 </li>
                        <li class="active step0 text-light"> Arriving Soon </li>
                        <li class="step0  text-light fw-bold"> <small class="fw-normal">Order Received </small> <br> April 10, 2022</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="row my-4">
              <div class="col-md-3 mb-5">
                <p class="mb-4 text-black-l fs-20 fw-600">
                  <span>Order ID : </span>
                  <span>#556556545</span>
                </p>

                <button class="btn btn-c2-outline p-1"><i class="fas fa-file-pdf"></i> Download</button>
              </div>
              <div class="col-md-6 mt-1">

                <div class="row">
                  <div class="col-8">
                    <p><b>1x</b> <span class="ms-2 text-muted">Casual Shirt Wear</span></p>
                  </div>
                  <div class="col-4">
                    <p class="fw-bold text-black-l">Rs 2999</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-8">
                    <p><b>1x</b> <span class="ms-2 text-muted">Casual Shirt Wear</span></p>
                  </div>
                  <div class="col-4">
                    <p class="fw-bold text-black-l">Rs 2999</p>
                  </div>
                </div>

                <div class="b-b-d m-2"></div>

                <div class="row">
                  <div class="col-8">
                    <p class="text-muted">Subtotal</p>
                  </div>
                  <div class="col-4">
                    <p class="fw-bold text-black-l">Rs 2999</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-8">
                    <p class="text-muted">Shipping Fee <span class="float-end small text-muted">( Free Shipping Cost )</span></p>
                  </div>
                  <div class="col-4">
                    <p class="fw-bold text-black-l">Rs 00.00</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-8">
                    <p class="text-muted">Tax</p>
                  </div>
                  <div class="col-4">
                    <p class="fw-bold text-black-l">Rs 00.00</p>
                  </div>
                </div>

                <div class="b-b-d m-2"></div>

                <div class="row fw-bold">
                  <div class="col-8">
                    <p>Order Total</p>
                  </div>
                  <div class="col-4 ">
                    <h5 class=" fw-bold c1-mm">Rs 1999</h5>
                  </div>
                </div>

                <div class="b-b-d m-2"></div>

                <div class="row fw-bold">
                  <div class="col-8">
                    <p>Payment Method</p>
                  </div>
                  <div class="col-4 ">
                    <p class="fw-bold text-black-l">Cash</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <p>Shipping Address</p>
                  </div>
                  <div class="col-6">
                    <p>18 Richardson Drive
                    Fountain Valley, CA 92708</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
