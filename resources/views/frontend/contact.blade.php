@extends('frontend.master')
@section('content')
<section class="py-5 bg-white">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-5">
            <h4 class="">Contact Us</h4>
            <p class="text-black-l">Lorem ipsum dolor sit Lorem ipsum dolor sit Lorem ipsum dolor sitLorem  </p>
          </div>
        </div>
        <div class="row contact-box">
          <div class="col-md-6  p-5">
            <p class="fw-bold">
              <i class="fas fa-map-marker-alt c2-mm"></i>
              OFFICE ( Head Office )<br>
              <span class="ms-2">NCR</span>
            </p>
            <p class="ms-2">
               Bldg. No. V/5, 1st Floor Supreme Tower <br>
               Near  South Chalakudy <br>
               NCR, India. 5544455 <br>
               Contact:+91 7853552 <br>
               abc@mail.com
            </p>
          </div>
          <div class="col-md-6 p-5">
            <h5><u>Lorem Ispum</u></h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mattis neque ultrices mattis aliquam, malesuada diam est. Malesuada sem tristique amet erat vitae eget dolor lobortis. Accumsan faucibus vitae lobortis quis bibendum quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mattis neque ultrices mattis aliquam, malesuada diam est. Malesuada sem tristique amet erat vitae eget dolor lobortis. Accumsan </p>
          </div>
        </div>
        <div class="row py-5">
          <div class="col-md-6 mb-3">
            <div class="  p-2">
              <h4 class="">  Get In Touch</h4>
              <p class="text-black-l">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mattis neque ultrices mattis aliquam, malesuada
              </p>

              <form>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <input type="text" name="" class="form-control" placeholder="Your Name*">
                  </div>
                  <div class="col-md-6 mb-3">
                    <input type="email" name="" class="form-control" placeholder="Email ID*">
                  </div>

                  <div class="col-md-12 mb-3">
                    <input type="text" name="" class="form-control" placeholder="Subject*">
                  </div>
                  <div class="col-md-12 mb-3">
                    <textarea class="form-control" placeholder="Type Your Messege*"></textarea>
                  </div>
                  <div class="col-md-12 pt-2 text-center">
                    <button type="submit" class="btn btn-c2">Send Message</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-6 mb-3 px-4">
            <img src="img/contact.png" class="w-100">
          </div>
        </div>
      </div>
    </section>

    <div class="section py-2 bg-white w-100"></div>
@endsection
