@extends('layouts.frontend_layouts')
@section('content')
    <title>Stripe Payment Gateway </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <body>

        <div class="container">

            <h1 class="text-center mb-3"> Stripe Payment Gateway </h1>
            <div class="checkout__order">

                <h4>Your Order</h4>

                <div class="checkout__order__products">Products <span>Total</span></div>
                @php $total = 0 @endphp
                @if (isset($order))
                    @foreach ($order as $id => $details)
                        @php $total += $details['price'] * $details['qty'] @endphp
                        <ul>
                            <li>{{ $details['product_name'] }} x
                                {{ $details['qty'] }}<span>${{ $details['price'] * $details['qty'] }}</span>
                            </li>

                        </ul>
                    @endforeach
                @endif
                @if (isset($order_id->shiping->discount_amount))
                    <div class="checkout__order__total">Subtotal - Coupon <span>${{ $total }} -
                            ${{ $order_id->shiping->discount_amount }}</span></div>

                    <div class="checkout__order__subtotal">Total
                        <span>${{ $total - $order_id->shiping->discount_amount }}</span>
                        <input type="hidden" value="{{ $order_id->shiping->discount_amount }}" name="discount_amount">
                    </div>
                @else
                    <div class="checkout__order__total">Total <span>${{ $total }}</span></div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-12 col-md-offset-3">
                    <div class="panel panel-default credit-card-box">
                        <div class="panel-heading display-table">
                            <h2 class="text-center mt-3">Payment Forms</h2>
                        </div>
                        <div class="panel-body">

                            @if (Session::has('success'))
                                <div class="alert alert-success text-center">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <p>{{ Session::get('success') }}</p>
                                </div>
                            @endif

                            <form id='checkout-form' method='post' action="{{ route('stripe.post') }}">
                                @csrf
                                <input type='hidden' name='stripeToken' id='stripe-token-id'>
                                <br>
                                <div id="card-element" class="form-control"></div>
                                <input type="hidden" value="{{ $total }}" name="amount">
                                <input type="hidden" value="{{ $order_id->order_id }}" name="order_id">
                                @if ($order_id->shiping->payment_status == "Paid")
                                <a  href="{{route('my.order')}}" class="btn btn-danger mt-3" type="button"
                                style="margin-top: 20px; width: 100%;padding: 7px;" > Your Payment Done 
                            </a>
                                @else
                                    @if (isset($order_id->shiping->discount_amount))
                                        <button id='pay-btn' class="btn btn-success mt-3" type="button"
                                            style="margin-top: 20px; width: 100%;padding: 7px;" onclick="createToken()">PAY $
                                            {{ $total - $order_id->shiping->discount_amount }} 
                                        </button>
                                    @else
                                        <button id='pay-btn' class="btn btn-success mt-3" type="button"
                                            style="margin-top: 20px; width: 100%;padding: 7px;" onclick="createToken()">PAY $
                                            {{ $total }}
                                        </button>
                                    @endif
                                @endif
                               
                                <form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="https://js.stripe.com/v3/"></script>
    <script >
        var stripe = Stripe('{{ env('STRIPE_KEY') }}');
        var elements = stripe.elements();
        var cardElement = elements.create('card');
        cardElement.mount('#card-element');

        /*------------------------------------------
        --------------------------------------------
        Create Token Code
        --------------------------------------------
        --------------------------------------------*/
        function createToken() {
            document.getElementById("pay-btn").disabled = true;
            stripe.createToken(cardElement).then(function(result) {

                if (typeof result.error != 'undefined') {
                    document.getElementById("pay-btn").disabled = false;
                    alert(result.error.message);
                }

                /* creating token success */
                if (typeof result.token != 'undefined') {
                    document.getElementById("stripe-token-id").value = result.token.id;
                    document.getElementById('checkout-form').submit();
                }
            });
        }
    </script>
@endsection
