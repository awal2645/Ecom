@extends('layouts.frontend_layouts')
@section('content')
<style>
h1, h2, h3, h4, h5, h6{
    color: gold;
}
.glyphicon .glyphicon-sta{
    color: gold;
}
.btn-grey{
    background-color:#D8D8D8;
	color:#FFF;
}
.rating-block{
	background-color:#FAFAFA;
	border:1px solid #EFEFEF;
	padding:15px 15px 20px 15px;
	border-radius:3px;
}
.bold{
	font-weight:700;
}
.padding-bottom-7{
	padding-bottom:7px;
}

.review-block{
	background-color:#FAFAFA;
	border:1px solid #EFEFEF;
	padding:15px;
	border-radius:3px;
	margin-bottom:15px;
}
.review-block-name{
	font-size:12px;
	margin:10px 0;
}
.review-block-date{
	font-size:12px;
}
.review-block-rate{
	font-size:13px;
	margin-bottom:15px;
}
.review-block-title{
	font-size:15px;
	font-weight:700;
	margin-bottom:10px;
}
.review-block-description{
	font-size:13px;
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
                            <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
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
                                    aria-selected="false">Reviews <span>(1)</span></a>
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
                                    <form action="{{route('rating.add')}}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $product_details->id }}" name="product_id">
                                        <div class="row">
                                            <div class="col-3"></div>
                                            <div class="col-sm-3">
                                                <div class="rating-block">
                                                    <h4>Average user rating</h4>
                                                    <h2 class="ml-2 padding-bottom-7">
                                                        <small> @if ($avg!=0)
                                                            {{ $avg/count($rating)}} 
                                                            @endif</small> <small>/ 5</small>
                                                        @if (isset($user))
                                                        <select name="rating" id="rating" class="btn" >
                            
                                                            <option value="1" {{$user->rating==1  ? 'selected' : '' }} >★</option>
                                                            <option value="2"  {{$user->rating==2  ? 'selected' : '' }}>★★</option>
                                                            <option value="3"  {{$user->rating==3  ? 'selected' : '' }}>★★★</option>
                                                            <option value="4"  {{$user->rating==5  ? 'selected' : '' }}>★★★★</option>
                                                            <option value="5"  {{$user->rating==5  ? 'selected' : '' }}>★★★★★</option>
                                                        </select>
                                                        @else
                                                        <select name="rating" id="rating" class="rating-select" >
                                                            <option value="1">★</option>
                                                            <option value="2">★★</option>
                                                            <option value="3">★★★</option>
                                                            <option value="4">★★★★</option>
                                                            <option value="5">★★★★★</option>
                                                        </select>
                                                    @endif</h2>
                                   
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <h4> Comment</h4>
                                             <textarea name="comment" id="" cols="50" rows="5"></textarea>
                                                <button class="site-btn">Submit</button>
                                            </div>			
                                        </div>			
                                        
                                        <div class="row">
                                            <div class="col-3"></div>
                                            <div class="col-sm-6">
                                                <hr/>
                                                <div class="review-block">
                                                    @foreach ($rating as $rating_detail)
                                                    <div class="row">
                                                        <col-3></col-3>
                                                        <div class="col-sm-3">
                                                            <div class="review-block-name">{{$rating_detail->user->name}}</div>
                                                            <div class="review-block-date">{{$rating_detail->updated_at->format('M d, Y')}}</div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="review-block-rate">
                                                                @if ($rating_detail->rating ==1 )
                                                                <h4>★</h4>
                                                                @elseif($rating_detail->rating ==2)
                                                                <h4>★★</h4>
                                                                @elseif($rating_detail->rating ==3)
                                                                <h4>★★★</h4>
                                                                @elseif($rating_detail->rating ==4)
                                                                <h4>★★★★</h4>
                                                                @elseif($rating_detail->rating ==5)
                                                                <h4>★★★★★</h4>
                                                                @endif                                                              
                                                            </div>
                                                            
                                                            <div class="review-block-description">{{$rating_detail->comment}}</div>
                                                        </div>
                                                    </div>
                                                    <hr/>
                                                    @endforeach
                                                   
                                                </div>
                                            </div>
                                        </div>

                                    </form>
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
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
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
@endsection
