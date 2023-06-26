@extends('layouts.backend_layouts')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card corona-gradient-card">
                <div class="card-body py-0 px-0 px-sm-3">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">{{ count($products) }}</h3>
                                {{-- <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p> --}}
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success ">
                                <span class="mdi mdi-arrow-top-right icon-item"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Product</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">{{ count($orders) }}</h3>
                                {{-- <p class="text-success ms-2 mb-0 font-weight-medium">+11%</p> --}}
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success">
                                <span class="mdi mdi-arrow-top-right icon-item"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Order</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">${{$income}}</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-danger">
                                <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Income</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">$31.53</h3>
                                <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success ">
                                <span class="mdi mdi-arrow-top-right icon-item"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Expense current</h6>
                </div>
            </div>
        </div>
    </div>
  
    <div class="row ">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Order List</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Customer</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Amount</th>
                                    <th>Order Date</th>
                                    <th>Payment Status</th>
                                    <th>Shiping Status</th>
                                    <th>Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderLists as $key => $orderList)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td> {{ $orderList->user->name }}</td>
                                        <td> {{ $orderList->user->email }}</td>
                                        <td> {{ $orderList->userdetail->phone }}</td>
                                        @php
                                            $ammounts = App\Models\Order::where('order_id', $orderList->id)->sum('price');
                                        @endphp
    
                                        <td>{{ $ammounts }}</td>
                                        <td>{{ $orderList->updated_at->format('M d, Y') }}</td>
                                        <td><label class="badge badge-success">{{ $orderList->payment_status }}</label></td>
                                        <td>
                                            <form action="{{ route('order.status.update') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="order_id" value="{{ $orderList->id }}">
                                                <select id="dropdown" name="data" class="badge badge-success"
                                                    onchange="this.form.submit()">
                                                    <option value="Pending"
                                                        @php
                                                                if($orderList->shiping_status == "Pending"){
                                                                                        echo "selected";
                                                                                        } @endphp>
                                                                                    Pending</option>
                                                                                <option value="Shiped"
                                                                                    @php if($orderList->shiping_status == "Shiped"){
                                                                echo "selected";
                                                                } @endphp>
                                                                                    Shiped</option>
                                                                                <option value="Delivered"
                                                                                    @php if($orderList->shiping_status == "Delivered"){
                                                                echo "selected";
                                                                } @endphp>
                                                        Delivered</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            <a class="btn btn-success" href="{{ route('order.details', $orderList->id) }}"><i
                                                    class="mdi mdi-lead-pencil"></i></a>
                                            <a class="btn btn-danger" href=""><i class="mdi mdi-delete"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
@endsection
