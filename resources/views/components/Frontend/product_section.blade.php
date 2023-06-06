@php
    $latest_products = App\Models\Product::latest()->get();
@endphp
<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Latest Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        @foreach ($latest_products->chunk(3) as $chunk)
                            <div class="latest-prdouct__slider__item">
                                @foreach ($chunk as $latest_product)
                                    <!-- Display product information here -->
                                    <a href="{{ url('shop-details/' . $latest_product->slug) }}"
                                        class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ $latest_product->thumbnail_image }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $latest_product->name }}</h6>
                                            <span>${{ $latest_product->price }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Top Rated Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        @foreach ($latest_products->chunk(3) as $chunk)
                            <div class="latest-prdouct__slider__item">
                                @foreach ($chunk as $latest_product)
                                    <!-- Display product information here -->
                                    <a href="{{ url('shop-details/' . $latest_product->slug) }}"
                                        class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ $latest_product->thumbnail_image }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $latest_product->name }}</h6>
                                            <span>${{ $latest_product->price }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Review Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        @foreach ($latest_products->chunk(3) as $chunk)
                            <div class="latest-prdouct__slider__item">
                                @foreach ($chunk as $latest_product)
                                    <!-- Display product information here -->
                                    <a href="{{ url('shop-details/' . $latest_product->slug) }}"
                                        class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ $latest_product->thumbnail_image }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $latest_product->name }}</h6>
                                            <span>${{ $latest_product->price }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
