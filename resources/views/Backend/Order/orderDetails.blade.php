@extends('layouts.backend_layouts')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1>Order Details</h1>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order Information</h5>
                        <p class="card-text"><strong>Order ID:</strong> {{ $orderDetails->id }}</p>
                        <p class="card-text"><strong>Date:</strong>{{ $orderDetails->updated_at->format('M d, Y') }}</p>
                        <p class="card-text"><strong>Shiping Status:</strong> {{ $orderDetails->shiping_status }}</p>
                        <p class="card-text"><strong>Payment Status:</strong> {{ $orderDetails->payment_status }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 offset-md-2 mt-3">
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Order Items</h5>
                        <table class="table">
                            <tbody>
                            <tbody>
                                @php $total = 0 @endphp
                                @foreach ($product_details as $product_detail)
                                    @php $total += $product_detail['price'] * $product_detail['qty'] @endphp
                                    <tr>
                                    <tr>

                                        <td class="text-end color-subtext">{{ $product_detail->product_name }}</td>
                                        <td class="pl5 p-r5 text-end">
                                            <div class="inline_block">
                                                <span>${{ $product_detail->price }}</span>
                                            </div>
                                        </td>
                                        <td class="pl5 p-r5 text-center">x</td>
                                        <td class="pl5 p-r5">
                                            <span>{{ $product_detail->qty }}</span>
                                        </td>
                                        <td class="pl5 text-end">${{ $product_detail->price * $product_detail->qty }}</td>
                                    </tr>
                                @endforeach

                                <tr>
                                    <td class="text-end color-subtext mt10">
                                        <p class="mb0">Discount</p>
                                    </td>
                                    <td class="text-end p-none-b pl10">
                                        <p class="mb0">$0.00</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-end color-subtext mt10">
                                        <p class="mb0">Tax</p>
                                    </td>
                                    <td class="text-end p-none-t pl10">
                                        <p class="mb0">$0.00</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-end mt10">
                                        <p class="mb0 color-subtext">Total amount</p>
                                        </p>
                                    </td>
                                    <td class="text-end mt10">
                                        <p class="mb0 color-subtext">${{ $total }}</p>
                                    </td>
                                </tr>
                                <tr>
                                </tr>
                            </tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class=" text-center"> <a href="{{ route('invoice', $orderDetails->id) }}"
                        class="btn btn-primary mt-4  ">Print Invoice</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <h4>Shiping Details</h4>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Customer Information</h5>
                        <p class="card-text"><strong>Name: {{ $orderDetails->user->name }}</p>
                        <p class="card-text"><strong>Email:</strong> {{ $orderDetails->user->email }}</p>
                        <p class="card-text"><strong>Number:</strong> {{ $orderDetails->userdetail->phone }}</p>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Shipping Information</h5>
                        <p class="card-text"><strong>Name:</strong> {{ $orderDetails->name }}</p>
                        <p class="card-text"><strong>Email:</strong> {{ $orderDetails->email }}</p>
                        <p class="card-text"><strong>Phone:</strong> {{ $orderDetails->phone }}</p>
                    </div>
                </div>

            </div>
            <div class="col-6">

            </div>
        </div>
    </div>
@endsection
