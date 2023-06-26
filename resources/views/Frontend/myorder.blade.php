@extends('layouts.frontend_layouts')
@section('title','My Order ')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('Frontend') }}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>My Order List</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('home.page') }}">Home</a>
                            <span>Order List</span>
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
                                    <th class="shoping__product">Shiping Status</th>
                                    <th class="shoping__product">Payment Status</th>
                                    <th class="shoping__product">Payment Method</th>
                                    <th class="">Action</th>
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
                                                    <div class="col-sm-9">
                                                        <h4 class="nomargin"> Order No {{ $details->order_id }} </h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-th="Product" class="shoping__cart__item">
                                                <div class="row">
                                                    <div class="col-sm-9">
                                                        <h4 class="nomargin">{{ $details->shiping_status }} </h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-th="Product" class="shoping__cart__item">
                                                <div class="row">
                                                    <div class="col-sm-9">
                                                        <a
                                                            @if ($details->payment_status == 'Paid') class=" btn btn-success " @else href="{{ route('stripe.id', $details->order_id) }}"
                                                                class=" btn btn-danger " @endif>
                                                            {{ $details->payment_status }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-th="Product" class="shoping__cart__item">
                                                <div class="row">
                                                    <div class="col-sm-9">
                                                        <button class="btn  btn-warning">
                                                            @if ($details->payment_method == 'cod')
                                                                Cash On Delivery
                                                            @else
                                                                Stripe 
                                                            @endif
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-th="Product" class="">
                                                <div class="row">
                                                    <div class="col-sm-12 d-flex">
                                                        <a href="{{ route('my.order.edit', $details->order_id) }}"
                                                            class="btn btn-info btn-sm edit-from-cart">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('invoice', $details->id) }}"
                                                            class="btn btn-success   ml-2">
                                                            <i class="fa fa-print" aria-hidden="true"></i>
                                                        </a>
                                                        <a href="{{ route('invoice.download', $details->id) }}"
                                                            class="btn btn-primary   ml-2">
                                                            <i class="fa fa-download" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
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
     
@endsection
