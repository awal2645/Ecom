@php
    $categories = App\Models\Category::all();
    $featured = 'isChecked';
    $featuredProducts = App\Models\Product::where('featured_product', $featured)->get();
@endphp
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Product</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        @foreach ($categories as $category)
                            <li data-filter=".{{ $category->slug }}"> {{ $category->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach ($featuredProducts as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mix {{ $product->category->slug }}">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ $product->thumbnail_image }}">
                            <ul class="featured__item__pic__hover">
                                <li>
                                    <form id="add_to_whiteList" action="{{ route('add.to.whiteList', $product->id) }}"
                                        method="POST">
                                        @csrf
                                        <input type="hidden" value="1" name="qty">
                                        <button type="submit"><i class="fa fa-heart"></i></button>
                                    </form>
                                </li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li>
                                    <form id="add_to_cart" action="{{ route('add.to.cart', $product->id) }}"
                                        method="POST">
                                        @csrf
                                        <input type="hidden" value="1" name="qty">
                                        <button type="submit"><i class="fa fa-shopping-cart "></i></button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <h5>{{ $product->is_featured }}</h5>
                        <div class="featured__item__text">
                            <h6><a href="#">{{ $product->name }}</a></h6>
                            <h5>${{ $product->price }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
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
