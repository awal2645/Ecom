@extends('layouts.frontend_layouts')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('Frontend') }}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>My White List</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('home.page')}}">Home</a>                            <span>White List</span>
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
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0 @endphp
                                @if (session('whiteList'))
                                    @foreach (session('whiteList') as $id => $details)
                                        @php $total += $details['price'] * $details['quantity'] @endphp
                                        <tr data-id="{{ $id }}">
                                            <td data-th="Product" class="shoping__cart__item">
                                                <div class="row">
                                                    <div class="col-sm-3 hidden-xs"><img src="{{ $details['image'] }}"
                                                            width="100" height="100" class="img-responsive" /></div>
                                                    <div class="col-sm-9">
                                                        <h4 class="nomargin">{{ $details['name'] }}</h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-th="Price" class="shoping__cart__price">${{ $details['price'] }}</td>
                                            <td data-th="Quantity" class="shoping__cart__quantity">

                                                <input type="number" value="{{ $details['quantity'] }}"
                                                    class="form-control quantity update-cart" />
                                            </td>
                                            <td data-th="Subtotal" class="shoping__cart__total">
                                                ${{ $details['price'] * $details['quantity'] }}</td>
                                            <td class="mt-4 d-flex " data-th="">
                                                <button class="btn btn-danger  remove-whiteList"><i
                                                        class="fa fa-trash-o"></i></button>
                                                <form id="add_to_cart" action="{{ route('add.to.cart', $details['id']) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="hidden" value="1" name="qty">
                                                    <input type="hidden" value=" $details['id']" name="p_Id">
                                                    <button class="ml-2 btn site-btn" type="submit"><i
                                                            class="fa fa-shopping-cart"></i></button>
                                                </form>
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
                <div class="col-lg-6">
                    <div class="shoping__cart__btns">
                        <a href="{{ url('/') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__cart__btns text-center">
                        <a href="{{ route('clear.list') }}" class="primary-btn cart-btn">Clear White List</a>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

    <script type="text/javascript">
        $(".update-cart").on('change', function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update.whiteList') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    $('table').load(location.href + ' .table');
                    window.location.reload();
                }

            });
        });

        $(".remove-whiteList").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Are you sure want to remove?")) {
                $.ajax({
                    url: '{{ route('remove.whiteList') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        $('table').load(location.href + ' .table');
                        window.location.reload();
                    }
                });
            }
        });
    </script>
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
