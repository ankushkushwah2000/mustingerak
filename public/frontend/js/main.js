$(".toggle-password").click(function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    input = $(this).parent().find("input");
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});
$('#cat').owlCarousel({
  loop: true,
  autoplay: true,
  autoPlaySpeed: 1000,
  autoplayHoverPause: true,
  dots: false,
  nav: true,
  navText: [$('.owl-navigation-cat .owl-nav-prev'), $('.owl-navigation-cat .owl-nav-next')],
  responsive: {
      0: {
          items: 2.2
      },
      600:{
          items:5
      },
      960: {
          items: 8
      }
  }
});
$('#rvpigv').owlCarousel({
  loop: true,
  autoplay: true,
  autoPlaySpeed: 1000,
  autoplayHoverPause: true,
  dots: false,
  nav: true,
  navText: [$('.owl-navigation-rvpigv .owl-nav-prev'), $('.owl-navigation-rvpigv .owl-nav-next')],
  responsive: {
      0: {
          items: 1.2
      },
      600:{
          items:3
      },
      960: {
          items: 4.1
      }
  }
});
$('#dod').owlCarousel({
  loop: true,
  autoplay: true,
  autoPlaySpeed: 1000,
  autoplayHoverPause: true,
  dots: false,
  nav: true,
  navText: [$('.owl-navigation-dod .owl-nav-prev'), $('.owl-navigation-dod .owl-nav-next')],
  responsive: {
      0: {
          items: 1.2
      },
      600:{
          items:3
      },
      960: {
          items: 4.1
      }
  }
});
$('#tp').owlCarousel({
  loop: true,
  autoplay: true,
  autoPlaySpeed: 1000,
  autoplayHoverPause: true,
  dots: false,
  nav: true,
  navText: [$('.owl-navigation-tp .owl-nav-prev'), $('.owl-navigation-tp .owl-nav-next')],
  responsive: {
      0: {
          items: 1.2
      },
      600:{
          items:3
      },
      960: {
          items: 4.1
      }
  }
});
$('#bpw').owlCarousel({
  loop: true,
  autoplay: true,
  autoPlaySpeed: 1000,
  autoplayHoverPause: true,
  dots: false,
  nav: true,
  navText: [$('.owl-navigation-bpw .owl-nav-prev'), $('.owl-navigation-bpw .owl-nav-next')],
  responsive: {
      0: {
          items: 1.2
      },
      600:{
          items:3
      },
      960: {
          items: 4.1
      }
  }
});
$('#mbp').owlCarousel({
  loop: true,
  autoplay: true,
  autoPlaySpeed: 1000,
  autoplayHoverPause: true,
  dots: false,
  nav: true,
  navText: [$('.owl-navigation-mbp .owl-nav-prev'), $('.owl-navigation-mbp .owl-nav-next')],
  responsive: {
      0: {
          items: 1.2
      },
      600:{
          items:3
      },
      960: {
          items: 4.1
      }
  }
});
$('#fso').owlCarousel({
  loop: true,
  autoplay: true,
  autoPlaySpeed: 1000,
  autoplayHoverPause: true,
  dots: false,
  nav: true,
  navText: [$('.owl-navigation-fso .owl-nav-prev'), $('.owl-navigation-fso .owl-nav-next')],
  responsive: {
      0: {
          items: 1.2
      },
      600:{
          items:3
      },
      960: {
          items: 4.1
      }
  }
});
$('#itm').owlCarousel({
  loop: true,
  autoplay: true,
  autoPlaySpeed: 1000,
  autoplayHoverPause: true,
  dots: false,
  nav: true,
  navText: [$('.owl-navigation-itm .owl-nav-prev'), $('.owl-navigation-itm .owl-nav-next')],
  responsive: {
      0: {
          items: 1.2
      },
      600:{
          items:3
      },
      960: {
          items: 4.1
      }
  }
});
$('#gtb').owlCarousel({
  loop: true,
  autoplay: true,
  autoPlaySpeed: 1000,
  autoplayHoverPause: true,
  dots: false,
  nav: true,
  navText: [$('.owl-navigation-gtb .owl-nav-prev'), $('.owl-navigation-gtb .owl-nav-next')],
  responsive: {
      0: {
          items: 1.2
      },
      600:{
          items:3
      },
      960: {
          items: 4.1
      }
  }
});
$('#mhmc').owlCarousel({
  loop: true,
  autoplay: true,
  autoPlaySpeed: 1000,
  autoplayHoverPause: true,
  dots: false,
  nav: true,
  navText: [$('.owl-navigation-mhmc .owl-nav-prev'), $('.owl-navigation-mhmc .owl-nav-next')],
  responsive: {
      0: {
          items: 1.2
      },
      600:{
          items:3
      },
      960: {
          items: 4.1
      }
  }
});
$('#gb').owlCarousel({
  loop: true,
  autoplay: true,
  autoPlaySpeed: 1000,
  autoplayHoverPause: true,
  dots: false,
  nav: true,
  navText: [$('.owl-navigation-gb .owl-nav-prev'), $('.owl-navigation-gb .owl-nav-next')],
  responsive: {
      0: {
          items: 1.2
      },
      600:{
          items:3
      },
      960: {
          items: 4.1
      }
  }
});

//login modal

//from Exixting user Login Mobile
function login_get_otp_mn(){
  //alert("hii");
  $('#login').modal('hide');
  $('#login_otp').modal('show');
}

function login_gm(){
  $('#login').modal('hide');
  $('#login_gmail').modal('show');
}

function signup_mn() {
  $('#login').modal('hide');
  $('#signup').modal('show');
}

//---End  from Exixting user Login Mobile

// signup mobile

function signup_mn_otp() {
  $('#signup').modal('hide');signup
  $('#signup_mobno_otp').modal('show');
}
function signup_login_gm() {
  $('#signup').modal('hide');signup
  $('#login_gmail').modal('show');
}

// End Signup mobile

//Login using gmail

function login_mn() {
  $('#login_gmail').modal('hide');
  $('#login').modal('show');
}
function forgot_password_gm() {
  $('#login_gmail').modal('hide');
  $('#forget_password').modal('show');
}

function signup_gm() {
  $('#login_gmail').modal('hide');
  $('#signup-g').modal('show');
}
function signin_gm(){
  $('#signup-g').modal('hide');
  $('#login_gmail').modal('show');

}
function signin_mn(){
  $('#signup').modal('hide');
  $('#login').modal('show');
}
//---End Login using gmail

//Forget Password
function fp_otp() {
  $('#forget_password').modal('hide');
  $('#forget_password-otp').modal('show');
}

function fp_new_pass() {
  $('#forget_password-otp').modal('hide');
  $('#reset_password_n').modal('show');
}

//---End  Forget Password