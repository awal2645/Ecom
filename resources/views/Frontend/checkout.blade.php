@extends('layouts.frontend_layouts')
@section('title','My Cheackout ')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('Frontend') }}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mt-4">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your
                        code
                    </h6>

                </div>
                <div class="col-lg-4">

                    <h5 class="mb-2">Discount Codes</h5>
                    <form action="{{ route('coupon.page') }}" method="POST">
                        @csrf
                        <input type="text" class="form-control mb-2" name="coupon_code"
                            value="{{ request('coupon_code') }}" placeholder="Enter your coupon code">
                        <button type="submit" class="btn site-btn">APPLY COUPON</button>
                    </form>

                </div>


            </div>
            <div class="checkout__form">

                <h4>Billing Details</h4>
                <form action="{{ route('order') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p> Name<span>*</span></p>
                                        <input type="text" value="{{ Auth::user()->name }}" name="name">
                                    </div>
                                </div>

                            </div>
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input type="text"
                                    value="{{ !empty(Auth::user()->details->country) ? Auth::user()->details->country : '' }}"
                                    name="country">
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text"
                                    value="{{ !empty(Auth::user()->details->address) ? Auth::user()->details->address : request('address') }}"
                                    placeholder="Street Address" class="checkout__input__add" name="address">
                                @error('address')
                                    <p class=" text-danger" role="alert">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text"
                                    value="{{ !empty(Auth::user()->details->state) ? Auth::user()->details->state : '' }}"
                                    name="city">
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text"
                                    value="{{ !empty(Auth::user()->details->postcode) ? Auth::user()->details->postcode : '' }}"
                                    name="postcode">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text"
                                            value="{{ !empty(Auth::user()->details->phone) ? Auth::user()->details->phone : '' }}"
                                            name="phone">
                                        @error('phone')
                                            <p class=" text-danger" role="alert">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text"
                                            value="{{ !empty(Auth::user()->email) ? Auth::user()->email : '' }}"
                                            name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="acc">
                                    Create an account?
                                    <input type="checkbox" id="acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <p>Create an account by entering the information below. If you are a returning customer
                                please login at the top of the page</p>
                            <div class="checkout__input">
                                <p>Account Password<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="diff-acc">
                                    Ship to a different address?
                                    <input type="checkbox" id="diff-acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input type="text"
                                    placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">

                            <div class="checkout__order">

                                <h4>Your Order</h4>

                                <div class="checkout__order__products">Products <span>Total</span></div>
                                @php $total = 0 @endphp
                                @if (session('cart'))
                                    @foreach (session('cart') as $id => $details)
                                        @php $total += $details['price'] * $details['quantity'] @endphp
                                        <ul>
                                            <li>{{ $details['name'] }} x
                                                {{ $details['quantity'] }}<span>${{ $details['price'] * $details['quantity'] }}</span>
                                            </li>

                                        </ul>
                                    @endforeach
                                @endif
                                @if (isset($ammount))
                                    <div class="checkout__order__total">Subtotal <span>${{ $total }} -
                                            ${{ $ammount->ammount }}</span></div>

                                    <div class="checkout__order__subtotal">Total
                                        <span>${{ $total - $ammount->ammount }}</span>
                                        <input type="hidden" value="{{ $ammount->ammount }}" name="discount_amount">
                                    </div>
                                @else
                                    <div class="checkout__order__subtotal">Subtotal <span>${{ $total }}</span>
                                    </div>

                                    <div class="checkout__order__total">Total <span>${{ $total }}</span></div>
                                @endif

                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Cash On Delivery <input type="checkbox" name="cod" value="COD" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Stripe
                                        <input type="checkbox" name="stripe" value="Stripe Payment" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">PLACE ORDER</button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script>
        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>
@endsection
