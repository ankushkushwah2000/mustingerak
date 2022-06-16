@extends('frontend.master')
@section('content')
<section class=" bg-white">
      <div class="container-fluid my-3 pt-3">
        <div class="row px-5" >
          <div class="col-12 px-md-4"><h3 class="fw-bold">Checkout</h3></div>
        </div>
      </div>
      <div class="container">
        <div class="row py-4">
          <div class="col-md-5 border-ch p-4">
            @foreach ($data as $p )
            <div class="row">
              <div class="col-8">
                <p><b>{{$p->quantity}}x</b> <span class="ms-2 text-muted">{{$p->product_name}}</span></p>
              </div>
              <div class="col-4">
                <p class="fw-bold text-black-l">Rs {{$p->product_price}}</p>
              </div>
            </div>
            @endforeach

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
              <div class="col-12">
                <p>Payment</p>

              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <input type="checkbox" class="me-1" name="" checked> Debit Card
                <br>
                <input type="checkbox" class="me-1" name=""> Net Banking
                <br>
                <input type="checkbox" class="me-1" name=""> UPI
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 text-center mt-3">
                <a href="order-placed.html" class="btn btn-c2 my-3">Place Order</a>

                <p class="text-muted text-start">Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sitLorem orem ipsum dolor sit Lorem ipsum dolor sit</p>
              </div>
          </div>
        </div>
          <div class="col-md-7 px-md-5 px-lg-5">
            <h4 class="mb-3">Shipping Details
              <span class="float-end select-address">
                <select>
                  <option>Choose From Saved Address</option>
                </select>
              </span>
            </h4>

            <form action="#" method="post" class="mt-5">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="fw-700">First Name :</label>
                  <input type="text" placeholder="First Name" class="form-control" required value="{{Auth::user()->name}}">
                </div>
                <div class="col-md-6 mb-3">
                  <label class="fw-700">Last Name :</label>
                  <input type="text"  placeholder="Last Name" class="form-control" value="{{Auth::user()->last_name}}">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="fw-700">Phone Number :</label>
                  <input type="text"  placeholder="Phone Nuber"  class="form-control" value="{{Auth::user()->phone}}">
                </div>
                <div class="col-md-6 mb-3">
                  <label class="fw-700">E-Mail :</label>
                  <input type="text"  placeholder="E-mail" class="form-control" value="{{Auth::user()->email}}">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="fw-700">Address :</label>
                  <input type="text"  placeholder="Address" class="form-control" value="{{Auth::user()->address}}">
                </div>
                <div class="col-md-6 mb-3">
                  <label class="fw-700">State :</label>
                  <select class="form-control">
                    <option></option>
                    <option>Bihar</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="fw-700">Pin Code :</label>
                  <input type="text"  placeholder="Address" class="form-control" value="{{Auth::user()->pincode}}" >
                </div>
                <div class="col-md-6 mb-3">
                  <label class="fw-700">Town/City :</label>
                  <select class="form-control">
                    <option></option>
                    <option>Hajipur</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-12 mb-3">
                  <input type="checkbox" class="me-2" name="" checked> Save Address
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>




    <!----
      <button  class="btn btn-c2 fw-800 fs-20 br-15" data-bs-toggle="modal" data-bs-target="#add_card">Add Card</button>

    ---->
    <!-- Add Card Modal -->
    <div class="modal fade modle-round" id="add_card" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modle-round">
        <div class="modal-content ">
          <div class="modal-header ">
            <h4 class="modal-title text-center w-100" id="exampleModalLabel">

            </h4>
            <button type="button" class="btn-close text-black" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body px-2">
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-10">
                <div class="row pb-3">
                  <div class="col-12 text-center">
                    <div class="text-center text-black-8 fs-18 fw-600">Add your payment methods</div>
                    <div class="text-center text-black-6 fs-16 fw-400">This card will only be charged when you place an order.</div>
                  </div>

                </div>
                <div class="row">
                  <label class="form-label text-black-l fw-600 fs-20">Card Number</label>
                  <div class="input-group mb-3 ">
                    <span class="input-group-text bg-white text-black-6 chckout border-end-0"  >
                      <i class="fa-regular fa-credit-card"></i>
                    </span>
                    <input type="text" class="form-control chckout border-start-0" >
                  </div>
                  <div class="row">
                    <div class="col-6 mb-3">
                      <label class="form-label text-black-l fw-600 fs-20">Expirey Date</label>
                      <input type="text" class="form-control chckout" placeholder="MM/YY" >
                    </div>
                    <div class="col-6 mb-3">
                      <label class="form-label text-black-l fw-600 fs-20">CVV Number</label>
                      <input type="text" class="form-control chckout" placeholder="" >
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 my-3 text-center">
                      <button class="btn btn-c2 fw-bold ">Add Card</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-1"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
