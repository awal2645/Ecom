@extends('layouts.frontend_layouts')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('Frontend') }}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Order Name</th>
                                    <th>Total Amount</th>
                                    <th>Payment Status</th>
                                    <th>Action</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0 @endphp
                                @if (isset($order))
                                    @foreach ($order as $id => $details)
                            
                                    <tr data-id="{{ $id }}">
                                        <td data-th="Product" class="shoping__cart__item">
                                            <div class="row">
                                                <div class="col-sm-3 hidden-xs"><img src="{{ $details['product_img'] }}"
                                                        width="100" height="100" class="img-responsive" /></div>
                                                <div class="col-sm-9">
                                                    <h4 class="nomargin">{{ $details['product_name'] }} x {{ $details['qty']}} </h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-th="Price" class="shoping__cart__price">${{ $details['price'] }}</td>
                                        <td data-th="Quantity" class="shoping__cart__quantity">

                                            {{$details['payment_status']}}


                                        </td>
                                        <td data-th="Subtotal" class="shoping__cart__total">
                                            
                                        <td class="actions" data-th="">
                                            <button class="btn btn-danger btn-sm remove-from-cart"><i
                                                    class="fa fa-trash-o"></i></button>
                                        </td>
                                    </tr>
                                   
                                        
                                    @endforeach
                                @endif
                                {{-- <tr>
                                    <td class="shoping__cart__item">
                                        <img src="{{asset('Frontend')}}/img/cart/cart-1.jpg" alt="">
                                        <h5>Vegetable’s Package</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        $55.00
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="1">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        $110.00
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <span class="icon_close"></span>
                                    </td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{ url('/') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>

                    </div>
                </div>
              
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