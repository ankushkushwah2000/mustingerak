<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Mustinger Mart</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Main CSS -->
    <link rel="stylesheet" type="text/css" href="{{url('frontend/css/main.css')}}">


    <!-- FontAwesome JS -->
    <script src="https://kit.fontawesome.com/8979f54067.js" crossorigin="anonymous"></script>

    <!-- Owl Carousel  --->
    <link rel="stylesheet" href="{{url('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/owl.theme.default.min.css')}}">


</head>

<body id="top" class="bg-light">

    <section class="all-menu">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 d-none d-md-block d-lg-block">
                    <a href="index.html"><img src="{{url('frontend/img/logo.png')}}" class="pt-1 ps-2 w-100"></a>
                </div>
                <div class="col-md-10">
                    <div class="row">
                        <div class="menu-ts"></div>
                        <div class="w-95">
                            <div class="row pe-3 py-2 bg-c1 menu-bar">
                                <div class="col-8 col-md-8 text-white">
                                    <span class="float-start top-link">
                                        <a href="mailto:abc@gmail.com"> <i class="fa fa-envelope"></i> abc@mail.com </a>
                                        <br class="d-block d-md-none d-lg-none">
                                        <a href="tel:9999999999" class=" ms-md-2"> <i class="fa fa-phone-volume  ms-md-2"></i> +91-9876543210 </a>
                                    </span>
                                </div>
                                <div class="col-1"></div>
                                <div class="col-3 col-md-3 text-white float-end top-link">
                                    <div class="row padding-small">
                                        <div class="col-5 text-center  px-2">
                                            <p class="text-center lh-1">
                                                <a href="wishlist.html" class="bada text-center">
                                                    <i class="fa-regular fa-heart"></i>
                                                    <!--
                            <mark class="text-white bg-c2 rounded">0</mark>
                          -->
                                                    <br class="d-none d-md-block d-lg-block">
                                                    <span class="d-none d-md-block d-lg-block">Wishlist</span>
                                                </a>
                                            </p>
                                        </div>
                                        <div class="col-4 text-center px-2">
                                            <p class="text-center lh-1">
                                                <a href="{{url('/cart')}}" class="bada text-center">
                                                    <i class="fa-solid fa-bag-shopping"></i>
                                                    <!--
                            <mark class="text-white bg-c2 rounded">0</mark>
                          -->
                                                    <br class="d-none d-md-block d-lg-block">
                                                    <span class="d-none d-md-block d-lg-block">Cart</span>
                                                </a>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row  ">
                        <div class="menu-tb"></div>
                        <div class="w-95">
                            <div class="row menu-bar">
                                <div class="col-md-6 col-3">
                                    <nav class="navbar navbar-expand-lg navbar-light mt-1">

                                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>
                                        </button>
                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                                                <li class="nav-item ">
                                                    <a class="nav-link active px-2" href="{{url('/')}}">Home</a>
                                                </li>
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle px-2" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Categories
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                        <li><a class="dropdown-item " href="items-list-view.html">Categorie 1</a></li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li><a class="dropdown-item" href="items-list-view.html">Categorie 2</a></li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li><a class="dropdown-item" href="items-list-view.html">Categorie 3</a></li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link  px-2" href="{{url('frontend/track_order')}}">Track Order</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link  px-2" href="{{url('frontend/about')}}">About Us</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link  px-2" href="{{url('frontend/contact')}}">Contact</a>
                                                </li>

                                            </ul>
                                        </div>

                                    </nav>
                                </div>
                                <div class="col-md-4 col-9 pt-3">
                                    <form action="{{route('search')}}" method="GET">
                                    <div class="input-group mb-2 search">
                                        <span class="input-group-text bg-transparent text-black border-0"><i class="fa-solid fa-magnifying-glass"></i></span>
                                        <input type="text" class="form-control " name="search">
                                        <span class="input-group-text border-0 bg-transparent p-0"><button class="btn btn-mike"><i class="fa-solid fa-microphone"></i></button></span>
                                    </div>
                                </form>
                                </div>
                                <div class="col-md-2 col-12 py-2 text-center">
                                    @if (empty(Auth::check()))
                                    <button class="btn btn-c2 fw-800 fs-20 br-15" data-bs-toggle="modal" data-bs-target="#login">Login</button>
                                    @else
                    <div class="dropdown">
                      <button class="btn btn-c2 fw-800 fs-20 br-15 dropdown-toggle"  type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-image-portrait me-1"></i>user</button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                        <li><a class="dropdown-item" href="#" class="btn btn-info"><button type="submit"> Logout</button></a></li>
                        </form>
                      </ul>
                    </div>

                                    @endif

                                </div>
                            </div>
                        </div>

                        <!-- Modal Login Exixting user Mobile-->
                        <div class="modal fade modle-round" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modle-round">
                                <div class="modal-content  modle-round">
                                    <div class="modal-header bg-c1 text-white  modle-round1">
                                        <h4 class="modal-title text-center w-100" id="exampleModalLabel">
                                            User Login
                                        </h4>
                                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body px-2">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">
                                                <div class="row py-3">
                                                    <div class="col-12 text-center">
                                                        <img src="{{url('frontend/img/logo.png')}}" width="150px">
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <label class="form-label text-black fw-bold">Enter your phone number :</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text bg-white" id="basic-addon1">
                                                            <img src="{{url('frontend/img/flag.png')}}" class=" me-1"> +91
                                                        </span>
                                                        <input type="text" class="form-control">
                                                    </div>

                                                    <button class="btn-block btn-c1 fw-bold py-1 border-0 text-center" onclick="login_get_otp_mn();">Get OTP</button>
                                                </div>
                                                <div class="row mt-3 py-2">
                                                    <div class="col-12">
                                                        <p class="text-center">
                                                            By signing in you agree to our<br>
                                                            <a href="privacy-policy.html" class="c2-link">Terms of Service & Privacy Policy</a>
                                                        </p>
                                                        <p class="text-center text-black-l">OR</p>
                                                        <p class="text-center">
                                                            <button class="btn btn-gm-r" onclick="login_gm();"><img src="{{url('frontend/img/gmail.png')}}" width="30px" class="me-2"> Login with Gmail Account</button>
                                                        </p>

                                                        <p class="text-center">Don’t have an account? <a href="#" class="c1-link" onclick="signup_mn();">Sign Up Here</a></p>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Login OTP -->
                        <div class="modal fade modle-round" id="login_otp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modle-round">
                                <div class="modal-content  modle-round">
                                    <div class="modal-header bg-c1 text-white  modle-round1">
                                        <h4 class="modal-title text-center w-100" id="exampleModalLabel">
                                            User Login
                                        </h4>
                                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body px-2">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">
                                                <div class="row py-3">
                                                    <div class="col-12 text-center">
                                                        <img src="{{url('frontend/img/logo.png')}}" width="150px">
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <label class="form-label text-black fw-bold">Enter your phone number :</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text bg-white" id="basic-addon1">
                                                            <img src="{{url('frontend/img/flag.png')}}" class="me-1"> +91
                                                        </span>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control border-end-0" placeholder="One Time OTP">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-secondary btn-border-r border-start-0 " type="button">Resend OTP</button>
                                                        </div>
                                                    </div>
                                                    <button class="btn-block btn-c1 fw-bold py-1">Submit</button>
                                                </div>
                                                <div class="row mt-3 py-2">
                                                    <div class="col-12">
                                                        <p class="text-center">
                                                            By signing in you agree to our<br>
                                                            <a href="privacy-policy.html" class="c2-link">Terms of Service & Privacy Policy</a>
                                                        </p>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Signup using mobile number Pages -->
                        <div class="modal fade modle-round" id="signup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modle-round">
                                <div class="modal-content  modle-round">
                                    <div class="modal-header bg-c1 text-white  modle-round1">
                                        <h4 class="modal-title text-center w-100" id="exampleModalLabel">
                                            Login
                                        </h4>
                                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body px-2">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">
                                                <div class="row py-3">
                                                    <div class="col-12 text-center">
                                                        <img src="img/logo.png" width="150px">
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <label class="form-label text-black fw-bold">Enter your phone number :</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text bg-white" id="basic-addon1">
                                                            <img src="img/flag.png" class=" me-1"> +91
                                                        </span>
                                                        <input type="text" class="form-control">
                                                    </div>

                                                    <a href="#" class="btn-block btn-c1 fw-bold py-1 border-0 text-center" onclick="signup_mn_otp();">Get OTP</a>
                                                </div>
                                                <div class="row mt-3 py-2">
                                                    <div class="col-12">
                                                        <p class="text-center">
                                                            By signing in you agree to our<br>
                                                            <a href="privacy-policy.html" class="c2-link">Terms of Service & Privacy Policy</a>
                                                        </p>
                                                        <p class="text-center text-black-l">OR</p>
                                                        <p class="text-center">
                                                            <a href="#" class="btn btn-gm-r" onclick="signup_login_gm();"><img src="img/gmail.png" width="30px" class="me-2"> Login with Gmail Account</a>
                                                        </p>
                                                        <p class="text-center">Already have an account? <a href="#" class="c1-link" onclick="signin_mn();">Sign In</a></p>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal  Signup OTP using mobile number-->
                        <div class="modal fade modle-round" id="signup_mobno_otp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modle-round">
                                <div class="modal-content  modle-round">
                                    <div class="modal-header bg-c1 text-white  modle-round1">
                                        <h4 class="modal-title text-center w-100" id="exampleModalLabel">
                                            Sign Up
                                        </h4>
                                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body px-2">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">
                                                <div class="row py-3">
                                                    <div class="col-12 text-center">
                                                        <img src="img/logo.png" width="150px">
                                                    </div>

                                                </div>
                                                <div class="row text-start">
                                                    <label class="form-label text-black fw-bold">Enter your phone number :</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text bg-white" id="basic-addon1">
                                                            <img src="img/flag.png" class="me-1"> +91
                                                        </span>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control border-end-0" placeholder="One Time OTP">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-secondary btn-border-r border-start-0 " type="button">Resend OTP</button>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="mb-3 form-control" name="" placeholder="Enter your full name">
                                                    <input type="text" class="mb-3 form-control" name="" placeholder="Enter your email address">
                                                    <div class="row mb-3">
                                                        <div class="col-12 text-black-4">
                                                            <input type="checkbox" class=" me-1" name=""> Get Update On Whatsapp
                                                            <img src="img/wh.png">
                                                        </div>
                                                    </div>
                                                    <button class="btn-block btn-c1 fw-bold py-1">Submit</button>
                                                </div>
                                                <div class="row mt-3 py-2">
                                                    <div class="col-12">
                                                        <p class="text-center">
                                                            By signing in you agree to our<br>
                                                            <a href="privacy-policy.html" class="c2-link">Terms of Service & Privacy Policy</a>
                                                        </p>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal  Login using gmail Pages-->
                        <div class="modal fade modle-round" id="login_gmail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modle-round">
                                <div class="modal-content  modle-round">
                                    <div class="modal-header bg-c1 text-white  modle-round1">
                                        <h4 class="modal-title text-center w-100" id="exampleModalLabel">
                                            User Login
                                        </h4>
                                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body px-2">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">
                                                <div class="row py-3">
                                                    <div class="col-12 text-center">
                                                        <img src="img/logo.png" width="150px">
                                                    </div>

                                                </div>
                                                <form method="POST" action="{{ route('login') }}">
                                                    @csrf
                                                <div class="row text-start">
                                                    <label class="form-label text-black fw-bold">Email</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text bg-white border-end-0">
                                                            <i class="fa-solid fa-envelope-open-text text-black-4"></i>
                                                        </span>
                                                        <input type="text" class="form-control  border-start-0" name="email">
                                                    </div>

                                                    <label class="form-label text-black fw-bold">Password</label>
                                                    <div class="input-group mb-1">
                                                        <span class="input-group-text bg-white border-end-0">
                                                            <i class="fa-solid fa-lock text-black-4"></i>
                                                        </span>
                                                        <input type="text" class="form-control  border-start-0" name="password">
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-12">
                                                            <input type="checkbox" class="me-1" name="">
                                                            <span class="text-black-8">Remember me</span>
                                                            <a onclick="forgot_password_gm();" href="#"><span class="text-muted float-end"><u>Forgot Password?</u></span></a>
                                                        </div>
                                                    </div>
                                                    <button class="btn-block btn-c1 fw-bold py-1 border-0" type="submit">Sign In</button>
                                                </div>
                                            </form>
                                                <div class="row mt-3 py-2">
                                                    <div class="col-12">
                                                        <p class="text-center">
                                                            By signing in you agree to our<br>
                                                            <a href="privacy-policy.html" class="c2-link">Terms of Service & Privacy Policy</a>
                                                        </p>
                                                        <p class="text-center text-black-l">OR</p>
                                                        <p class="text-center">
                                                            <button class="btn btn-gm-r w-100" onclick="login_mn();"><i class="fa-solid fa-mobile-screen-button me-2"></i> Login with Mobile otp</button>
                                                        </p>

                                                        <p class="text-center">Don’t have an account? <a href="#" class="c1-link" onclick="signup_gm();">Sign Up Here</a></p>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal  Signup using gmail Pages OTP-->
                        <div class="modal fade modle-round" id="signup-g" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modle-round">
                                <div class="modal-content  modle-round">
                                    <div class="modal-header bg-c1 text-white  modle-round1">
                                        <h4 class="modal-title text-center w-100" id="exampleModalLabel">
                                            Sign Up
                                        </h4>
                                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body px-2">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">
                                                <div class="row py-3">
                                                    <div class="col-12 text-center">
                                                        <img src="{{url('frontend/img/logo.png')}}" width="150px">
                                                    </div>

                                                </div>
                                                <form method="POST" action="{{route('register') }}">
                                                    @csrf
                                                    <div class="row text-start">
                                                        <input type="text" class="mb-3 form-control" name="name" placeholder="Full Name">
                                                        <input type="text" class="mb-3 form-control" name="email" placeholder="email">
                                                        <input type="text" class="mb-3 form-control" name="phone" placeholder="Mobile number">
                                                        <input type="text" class="mb-3 form-control" name="password" placeholder="Password">
                                                        <div class="row mb-3">
                                                            <div class="col-12 text-black-4">
                                                                <input type="checkbox" class=" me-1" name=""> Get Update On Whatsapp
                                                                <img src="{{url('frontend/img/wh.png')}}">
                                                            </div>
                                                        </div>
                                                        <button class="btn-block btn-c1 fw-bold py-1" type="submit">Submit</button>
                                                    </div>
                                                </form>
                                                <div class="row mt-3 py-2">
                                                    <div class="col-12">
                                                        <p class="text-center">
                                                            By signing in you agree to our<br>
                                                            <a href="privacy-policy.html" class="c2-link">Terms of Service & Privacy Policy</a>
                                                        </p>
                                                        <p class="text-center">Already have an account? <a href="#" class="c1-link" onclick="signin_gm();">Sign In</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Verify OTP gmail -->
                        <div class="modal fade modle-round" id="signup-g-otp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modle-round">
                                <div class="modal-content  modle-round">
                                    <div class="modal-header bg-c1 text-white  modle-round1">
                                        <h4 class="modal-title text-center w-100" id="exampleModalLabel">
                                            Verify OTP
                                        </h4>
                                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body px-2">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">
                                                <div class="row py-3">
                                                    <div class="col-12 text-center">
                                                        <img src="img/logo.png" width="150px">
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <label class="form-label text-black fw-bold text-center ">Code Sent to abc@gmail.com</label>
                                                    <div class="row mb-3">
                                                        <div class="col-2"> </div>
                                                        <div class="col-2 otp">
                                                            <input type="text" class="form-control" name="">
                                                        </div>
                                                        <div class="col-2 otp">
                                                            <input type="text" class="form-control" name="">
                                                        </div>
                                                        <div class="col-2 otp">
                                                            <input type="text" class="form-control" name="">
                                                        </div>
                                                        <div class="col-2 otp">
                                                            <input type="text" class="form-control" name="">
                                                        </div>
                                                        <div class="col-2">

                                                        </div>
                                                    </div>

                                                    <p class="text-center mt-2 text-black-4">35s</p>
                                                    <p class="text-center mb-4 text-muted">Didn’t receive the code? <a href="#" class="c1-link">Resend</a></p>
                                                    <button class="btn-block btn-c1 fw-bold py-1 border-0">Submit</button>
                                                </div>
                                                <div class="row mt-3 py-2">
                                                    <div class="col-12">
                                                        <p class="text-center">
                                                            By signing in you agree to our<br>
                                                            <a href="privacy-policy.html" class="c2-link">Terms of Service & Privacy Policy</a>
                                                        </p>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal  Forgot Password-->
                        <div class="modal fade modle-round" id="forget_password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modle-round">
                                <div class="modal-content  modle-round pb-4">
                                    <div class="modal-header bg-c1 text-white  modle-round1">
                                        <h4 class="modal-title text-center w-100" id="exampleModalLabel">
                                            Reset Password
                                        </h4>
                                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body px-2">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">
                                                <div class="row py-3">
                                                    <div class="col-12 text-center">
                                                        <img src="img/logo.png" width="150px">
                                                    </div>

                                                    <div class="col-12 text-center">
                                                        <p class="text-center text-black-8 text-center">Enter Your Registered Mobile Number Or Email Address To Get OTP</p>
                                                    </div>

                                                </div>
                                                <div class="row text-start">
                                                    <label class="form-label text-black fw-bold">Mobile number</label>
                                                    <input type="text" class="form-control mb-3">
                                                    <p class="text-center text-muted">OR</p>
                                                    <label class="form-label text-black fw-bold">Email</label>
                                                    <input type="text" class="form-control mb-3">

                                                    <button class="btn-block btn-c1 fw-bold py-1 border-0" onclick="fp_otp();">Send OTP</button>
                                                </div>

                                            </div>
                                            <div class="col-md-1"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Forgot Password Verify OTP -->
                        <div class="modal fade modle-round" id="forget_password-otp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modle-round">
                                <div class="modal-content  modle-round">
                                    <div class="modal-header bg-c1 text-white  modle-round1">
                                        <h4 class="modal-title text-center w-100" id="exampleModalLabel">
                                            Verify OTP
                                        </h4>
                                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body px-2">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">
                                                <div class="row py-3">
                                                    <div class="col-12 text-center">
                                                        <img src="img/logo.png" width="150px">
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <label class="form-label text-black fw-bold text-center ">Code Sent to +91-9876543210</label>
                                                    <div class="row mb-3">
                                                        <div class="col-2"> </div>
                                                        <div class="col-2 otp">
                                                            <input type="text" class="form-control" name="">
                                                        </div>
                                                        <div class="col-2 otp">
                                                            <input type="text" class="form-control" name="">
                                                        </div>
                                                        <div class="col-2 otp">
                                                            <input type="text" class="form-control" name="">
                                                        </div>
                                                        <div class="col-2 otp">
                                                            <input type="text" class="form-control" name="">
                                                        </div>
                                                        <div class="col-2">

                                                        </div>
                                                    </div>

                                                    <p class="text-center mt-2 text-black-4">35s</p>
                                                    <p class="text-center mb-4 text-muted">Didn’t receive the code? <a href="#" class="c1-link">Resend</a></p>
                                                    <button class="btn-block btn-c1 fw-bold py-1 border-0" onclick="fp_new_pass();">Submit</button>
                                                </div>
                                                <div class="row mt-3 py-2">
                                                    <div class="col-12">
                                                        <p class="text-center">
                                                            By signing in you agree to our<br>
                                                            <a href="privacy-policy.html" class="c2-link">Terms of Service & Privacy Policy</a>
                                                        </p>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal  Reset Password-->
                        <div class="modal fade modle-round" id="reset_password_n" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modle-round">
                                <div class="modal-content  modle-round">
                                    <div class="modal-header bg-c1 text-white  modle-round1">
                                        <h4 class="modal-title text-center w-100" id="exampleModalLabel">
                                            Reset Password
                                        </h4>
                                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body px-2">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">
                                                <div class="row py-3">
                                                    <div class="col-12 text-center">
                                                        <img src="img/logo.png" width="150px">
                                                    </div>

                                                    <div class="col-12 text-center">
                                                        <p class="text-center text-black-8 text-center">Enter Your Registered Mobile Number Or Email Address To Get OTP</p>
                                                    </div>

                                                </div>
                                                <div class="row text-start">
                                                    <label class="form-label text-black fw-bold">New Password</label>
                                                    <input type="text" class="form-control mb-3">
                                                    <label class="form-label text-black fw-bold">Confirm Password</label>
                                                    <input type="text" class="form-control mb-3">

                                                    <button class="btn-block btn-c1 fw-bold py-1 border-0">Submit</button>
                                                </div>

                                            </div>
                                            <div class="col-md-1"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-------category---------->
    @yield('content')
    <!-------category---------->







    <div class="section py-2 bg-white w-100"></div>

    <section class="footer pt-4">
        <div class="container">
            <div class="row pt-4">
                <div class="col-md-4 col-12 mb-2 pe-lg-4">
                    <p><img src="{{url('frontend/img/logo-sm.png')}}"></p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Massa purus gravida.
                    </p>
                    <p> Rosemary garden road, Near civil lines, wareshouse road, Cantt, 4568533, India</p>
                </div>
                <div class="col-md-2 col-6 mb-2">
                    <h5><u>Quick Links</u></h5>
                    <ul class="list-unstyled">
                        <li> <a href="about-us.html">About Us</a> </li>
                        <li> <a href="contact.html">Contact Us</a> </li>
                        <li> <a href="items-grid-view.html">Shop By Brands</a> </li>
                        <li> <a href="#">Request Brand Retailer</a> </li>
                    </ul>
                </div>
                <div class="col-md-2 col-6 mb-2">
                    <br>
                    <ul class="list-unstyled">
                        <li> <a href="tc.html">T & C</a> </li>
                        <li> <a href="faq.html">FAQs</a> </li>
                        <li> <a href="return-policy.html">Return Policy</a> </li>
                        <li> <a href="faq.html">Help</a> </li>
                    </ul>
                </div>
                <div class="col-md-4 col-12 mb-2">
                    <h5><u>Social Media</u></h5>
                    <p>
                        <a href="#"><i class="fa-brands fa-facebook-f me-2"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram me-2"></i>
                            <a href="#"><i class="fa-brands fa-twitter me-2"></i></a>
                            <a href="#"><i class="fa-solid fa-m me-2"></i>
                                <a href="#"><i class="fa-brands fa-youtube me-2"></i></a>
                                <a href="#"><i class="fa-brands fa-linkedin-in me-2"></i></a>
                    </p>

                    <p class="lh-1 m-0 p-0">Install Our App</p>
                    <div class="row py-2">
                        <div class="col-6">
                            <a href="#"><img src="{{url('frontend/img/gp.png')}}" class="w-100"></a>
                        </div>
                        <div class="col-6">
                            <a href="#"><img src="{{url('frontend/img/as.png')}}" class="w-100"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid footer-bottom">
            <div class="row">
                <div class="col-12 text-center px-3 pt-3">
                    <p class="fs-12"> Mustinger Mart - © 2022 Rights Reserved </p>
                </div>
            </div>

        </div>
    </section>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Main JavaScript -->
    <script src="{{url('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{url('frontend/js/main.js')}}"></script>


</body>

</html>
