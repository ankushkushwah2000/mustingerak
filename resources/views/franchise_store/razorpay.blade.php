<!DOCTYPE html>
<html>

<head>
    <title>Pay with Razorpay</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    @yield('style')
</head>

<body style="background-color: #012E72; display:grid; place-content:center; height: 100vh;">
    @if($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <strong>Error!</strong> {{ $message }}
    </div>
    @endif
    {!! Session::forget('error') !!}
    @if($message = Session::get('success'))
    <div class="alert alert-info alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <strong>Success!</strong> {{ $message }}
    </div>
    @endif
    {!! Session::forget('success') !!}
    <form action="{!!route('franchise_store.razorpay.payment')!!}" method="POST">
        @csrf
        <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ $razorpay->key }}"
            data-amount="{{ $razorpay_total_amount }}" data-name="SEICO" data-description="Order Value" data-image=""
            data-prefill.name="{{ $customer_name }}" data-prefill.email="{{ $customer_email }}"
            data-theme.color="#012E72" data-order_id="{{ $razorpay_order_id }}">
        </script>
    </form>
    <br>
    <p style="color: #fff">Please do not refresh the page</p>
    <script>
        $(window).on('load', function() {
            $('.razorpay-payment-button').click();
        });
        // document.getElementsByClassName('razorpay-payment-button')[0].style.opacity =0 ;
    </script>
</body>

</html>