@php
    $categories = App\Models\Category::all();
    $data = App\Models\FrontnendSetting::all()->first();

@endphp
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All departments</span>
                    </div>
                    <ul class="">
                        @foreach ($categories as $category)
                            <li>
                                <a href="{{ url('category/' . $category->slug) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="{{ route('search') }}" method="GET" role="search">
                            {{-- <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div> --}}
                            <input type="search" name="search" placeholder="Search here..."
                                value="{{ request('search') }}">
                            <button type="submit" class="site-btn">SEARCH</button>


                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>{{$data->tel}}</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
                
                <div class="hero__item set-bg" data-setbg="{{$data->banner}}">
                    <div class="hero__text">
                        <span>FRUIT FRESH</span>
                        <h2>Vegetable <br />100% Organic</h2>
                        <p>Free Pickup and Delivery Available</p>
                        <a href="#" class="primary-btn">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
