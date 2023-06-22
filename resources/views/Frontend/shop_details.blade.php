@extends('layouts.frontend_layouts')
@section('title', 'Shop Details ')
@section('content')
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">

    <!-- SweetAlert JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>

    <style>
        .swal2-cancel {
            background-color: red !important;
            border-color: red !important;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: gold;
        }

        .rating-title {
            color: black;
        }

        .alt-btn {
            color: red;
        }

        .alt-btn a {
            color: green;
        }

        .alt-btn :hover {
            color: green;
        }

        .glyphicon .glyphicon-sta {
            color: gold;
        }

        .btn-grey {
            background-color: #D8D8D8;
            color: #FFF;
        }

        .rating-block {
            background-color: #FAFAFA;
            border: 1px solid #EFEFEF;
            padding: 15px 15px 20px 15px;
            border-radius: 3px;
        }

        .bold {
            font-weight: 700;
        }

        .padding-bottom-7 {
            padding-bottom: 7px;
        }

        .review-block {
            background-color: #FAFAFA;
            border: 1px solid #EFEFEF;
            padding: 15px;
            border-radius: 3px;
            margin-bottom: 15px;
        }

        .review-block-name {
            font-size: 12px;
            margin: 10px 0;
        }

        .review-block-date {
            font-size: 12px;
        }

        .review-block-rate {
            font-size: 13px;
            margin-bottom: 15px;
        }

        .review-block-title {
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .review-block-description {
            font-size: 13px;
        }
    </style>
    <style>
        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rate:not(:checked)>input {
            position: absolute;
            display: none;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rated:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }

        .star-rating-complete {
            color: #c59b08;
        }

        .rating-container .form-control:hover,
        .rating-container .form-control:focus {
            background: #fff;
            border: 1px solid #ced4da;
        }

        .rating-container textarea:focus,
        .rating-container input:focus {
            color: #000;
        }

        .rated {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rated:not(:checked)>input {
            position: absolute;
            display: none;
        }

        .rated:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ffc700;
        }

        .rated:not(:checked)>label:before {
            content: '★ ';
        }

        .rated>input:checked~label {
            color: #ffc700;
        }

        .rated:not(:checked)>label:hover,
        .rated:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rated>input:checked+label:hover,
        .rated>input:checked+label:hover~label,
        .rated>input:checked~label:hover,
        .rated>input:checked~label:hover~label,
        .rated>label:hover~input:checked~label {
            color: #c59b08;
        }
    </style>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('Frontend') }}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Vegetable’s Package</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <a href="./index.html">Vegetables</a>
                            <span>Vegetable’s Package</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="{{ asset('Frontend') }}/img/product/details/product-details-1.jpg" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="img/product/details/product-details-2.jpg"
                                src="{{ asset('Frontend') }}/img/product/details/thumb-1.jpg" alt="">
                            <img data-imgbigurl="img/product/details/product-details-3.jpg"
                                src="{{ asset('Frontend') }}/img/product/details/thumb-2.jpg" alt="">
                            <img data-imgbigurl="img/product/details/product-details-5.jpg"
                                src="{{ asset('Frontend') }}/img/product/details/thumb-3.jpg" alt="">
                            <img data-imgbigurl="img/product/details/product-details-4.jpg"
                                src="{{ asset('Frontend') }}/img/product/details/thumb-4.jpg" alt="">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{ $product_details->name }}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>({{ count($rating) }})</span>
                        </div>
                        <div class="product__details__price">$ {{ $product_details->price }}</div>
                        <p>{{ $product_details->details }}</p>
                        <form id="add_to_cart" action="{{ route('add.to.cart', $product_details->id) }}" method="POST">
                            @csrf
                            <div class="product__details__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1" name="qty">
                                    </div>
                                </div>
                            </div>
                            <a type="submit" onclick='$("#add_to_cart").submit()' class="primary-btn">ADD TO CARD</a>
                            <form id="add_to_whiteList" action="{{ route('add.to.whiteList', $product_details->id) }}"
                                method="POST">
                                @csrf
                                <input type="hidden" value="1" name="qty">
                                <a type="submit" class="heart-icon" onclick='$("#add_to_whiteList").submit()'><span
                                        class="icon_heart_alt"></span></a>
                            </form>
                        </form>
                        <ul>
                            <li><b>Availability</b> <span>{{ $product_details->availability }}</span></li>
                            <li><b>Shipping</b> <span>{{ $product_details->shipping_time }} </span></li>
                            <li><b>Weight</b> <span>0.5 kg</span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                    aria-selected="false">Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Reviews <span>({{ count($rating) }})</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">

                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>{{ $product_details->description }}</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>{{ $product_details->description }}</p>
                                </div>
                            </div>
                            <div class="tab-pane mt-5" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__des d-block ">
                                    @if (!empty($value->star_rating))
                                        <div class="container">
                                            <div class="row">
                                                <div class="col mt-4">
                                                    <p class="font-weight-bold ">Review</p>
                                                    <div class="form-group row">
                                                        <input type="hidden" name="booking_id"
                                                            value="{{ $value->id }}">
                                                        <div class="col">
                                                            <div class="rated">
                                                                @for ($i = 1; $i <= $value->star_rating; $i++)
                                                                    <label class="star-rating-complete"
                                                                        title="text">{{ $i }} stars</label>
                                                                @endfor
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mt-4">
                                                        <div class="col">
                                                            <p>{{ $value->comments }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="container">
                                            <div class="row">
                                                <div class="col mt-4">
                                                    <form class="py-2 px-4" action="{{ route('rating.add') }}"
                                                        style="box-shadow: 0 0 10px 0 #ddd;" method="POST"
                                                        autocomplete="off">
                                                        @csrf
                                                        <p class="font-weight-bold ">Review</p>
                                                        <div class="form-group row">
                                                            <input type="hidden" name="booking_id"
                                                                value="{{ $product_details->id }}">
                                                            <input type="hidden" value="{{ $product_details->id }}"
                                                                name="product_id">
                                                            <div class="col">
                                                                @if (isset($user_rating))
                                                                    <div class="rate">
                                                                        <input type="radio"
                                                                            {{ $user_rating->rating == 5 ? 'checked' : '' }}
                                                                            id="star5" class="rate" name="rating"
                                                                            value="5" />
                                                                        <label for="star5" title="text">5
                                                                            stars</label>
                                                                        <input type="radio"
                                                                            {{ $user_rating->rating == 4 ? 'checked' : '' }}
                                                                            id="star4" class="rate" name="rating"
                                                                            value="4" />
                                                                        <label for="star4" title="text">4
                                                                            stars</label>
                                                                        <input type="radio"
                                                                            {{ $user_rating->rating == 3 ? 'checked' : '' }}
                                                                            id="star3" class="rate" name="rating"
                                                                            value="3" />
                                                                        <label for="star3" title="text">3
                                                                            stars</label>
                                                                        <input type="radio"
                                                                            {{ $user_rating->rating == 2 ? 'checked' : '' }}
                                                                            id="star2" class="rate" name="rating"
                                                                            value="2">
                                                                        <label for="star2" title="text">2
                                                                            stars</label>
                                                                        <input type="radio"
                                                                            {{ $user_rating->rating == 1 ? 'checked' : '' }}
                                                                            id="star1" class="rate" name="rating"
                                                                            value="1" />
                                                                        <label for="star1" title="text">1
                                                                            star</label>
                                                                    </div>
                                                                @else
                                                                    <div class="rate">
                                                                        <input type="radio" id="star5"
                                                                            class="rate" name="rating"
                                                                            value="5" />
                                                                        <label for="star5" title="text">5
                                                                            stars</label>
                                                                        <input type="radio" id="star4"
                                                                            class="rate" name="rating"
                                                                            value="4" />
                                                                        <label for="star4" title="text">4
                                                                            stars</label>
                                                                        <input type="radio" id="star3"
                                                                            class="rate" name="rating"
                                                                            value="3" />
                                                                        <label for="star3" title="text">3
                                                                            stars</label>
                                                                        <input type="radio" id="star2"
                                                                            class="rate" name="rating" value="2">
                                                                        <label for="star2" title="text">2
                                                                            stars</label>
                                                                        <input type="radio" id="star1"
                                                                            class="rate" name="rating"
                                                                            value="1" />
                                                                        <label for="star1" title="text">1
                                                                            star</label>
                                                                    </div>
                                                                @endif

                                                            </div>
                                                        </div>
                                                        <div class="form-group row mt-4">
                                                            <div class="col">
                                                                <textarea class="form-control" name="comment" rows="6 " placeholder="Comment" maxlength="200">{{ isset($user_rating) ? $user_rating->comment : '' }}</textarea>
                                                            </div>
                                                        </div>
                                                        <span></span>
                                                        <div class="mt-3 text-right">
                                                            @if (isset(Auth::user()->id))
                                                                <button class="btn btn-sm py-2 px-3 btn-info">Submit
                                                                </button>
                                                            @else
                                                                <!-- Button to trigger SweetAlert -->
                                                                <a onclick="showConfirmation()"
                                                                    class="btn btn-sm py-2 px-3 btn-info">Submit
                                                                </a>
                                                                <!-- JavaScript code -->

                                                                {{-- <a href="/login"
                                                                    class="btn btn-sm py-2 px-3 btn-info">Login First
                                                                </a> --}}
                                                            @endif

                                                        </div>
                                                        <div class="row">

                                                            <div class="col-sm-8">
                                                                <hr />
                                                                <div class="review-block">
                                                                    @foreach ($rating as $rating_detail)
                                                                        <div class="row">
                                                                            <col-3></col-3>
                                                                            <div class="col-sm-3">
                                                                                <div class="review-block-name">
                                                                                    {{ $rating_detail->user->name }}</div>
                                                                                <div class="review-block-date">
                                                                                    {{ $rating_detail->updated_at->format('M d, Y') }}
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-8">
                                                                                <div class="review-block-rate">
                                                                                    @if ($rating_detail->rating == 1)
                                                                                        <h4>★</h4>
                                                                                    @elseif($rating_detail->rating == 2)
                                                                                        <h4>★★</h4>
                                                                                    @elseif($rating_detail->rating == 3)
                                                                                        <h4>★★★</h4>
                                                                                    @elseif($rating_detail->rating == 4)
                                                                                        <h4>★★★★</h4>
                                                                                    @elseif($rating_detail->rating == 5)
                                                                                        <h4>★★★★★</h4>
                                                                                    @endif
                                                                                </div>

                                                                                <div class="review-block-description">
                                                                                    {{ $rating_detail->comment }}</div>
                                                                            </div>
                                                                        </div>
                                                                        <hr />
                                                                    @endforeach

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($related_products as $related_product)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ $related_product->thumbnail_image }}">
                                <ul class="product__item__pic__hover">
                                    <li>
                                        <form id="add_to_whiteList"
                                            action="{{ route('add.to.whiteList', $related_product->id) }}"
                                            method="POST">
                                            @csrf
                                            <input type="hidden" value="1" name="qty">
                                            <button type="submit"><i class="fa fa-heart"></i></button>
                                        </form>
                                    </li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li>
                                        <form id="add_to_cart" action="{{ route('add.to.cart', $related_product->id) }}"
                                            method="POST">
                                            @csrf
                                            <input type="hidden" value="1" name="qty">
                                            <a onclick='$("#add_to_cart").submit()' type="submit"><i
                                                    class="fa fa-shopping-cart"></i></a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a
                                        href="{{ url('shop-details/' . $related_product->slug) }}">{{ $related_product->name }}</a>
                                </h6>
                                <h5>${{ $related_product->price }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Related Product Section End -->
    <script></script>
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
    <script>
        function showConfirmation() {
            Swal.fire({
                title: 'Unauthenticated?',
                text: 'If you perform this action, you need to log in to your account first. Do you want to log in now',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, want to login',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {

                    window.location.href = "{{ route('home') }}";

                }
            });
        }
    </script>
@endsection
