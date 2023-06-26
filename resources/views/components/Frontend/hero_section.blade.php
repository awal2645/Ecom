@php
    $categories = App\Models\Category::all();
    $data = App\Models\FrontnendSetting::all()->first();

@endphp
<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        {{-- <span> {{ GoogleTranslate::trans('All departments', app()->getLocale()) }} </span> --}}
                        <span> All departments</span>
                    </div>
                    <ul style="display: none;">
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
                        <form action="{{route('search')}}" method="GET">
                            <div class="hero__search__categories">
                                <select class="form-select" name="category" id="cars" style="border: none;background-color:white;">
                                    <option >All departments</option>
                                    @foreach ($categories as $category)
                                    <option  {{(request('category')==$category->id)? 'selected' :''}} value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                  </select>
                            </div>
                            <input type="search" value="{{request('search')}}" name="search" placeholder="What do yo u need?">
                            {{-- <button type="submit" class="site-btn"> {{ GoogleTranslate::trans('SEARCH', app()->getLocale()) }}</button> --}}
                            <button type="submit" class="site-btn"> SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>{{$data->tel}}</h5>
                            {{-- <span>  {{ GoogleTranslate::trans('support 24/7 time', app()->getLocale()) }}</span> --}}
                            <span>  support 24/7 time</span>
                        </div>
                    </div>
                </div>
                @if ( Route::currentRouteName() == 'home.page')
                <div class="hero__item set-bg mt-2" data-setbg="{{$data->banner}}">
                    <div class="hero__text">
                        {{-- <span> {{ GoogleTranslate::trans('FRUIT FRESH', app()->getLocale()) }}</span>
                        <h2> {{ GoogleTranslate::trans('Vegetable', app()->getLocale()) }} <br /> {{ GoogleTranslate::trans('100% Organic', app()->getLocale()) }}</h2>
                        <p> {{ GoogleTranslate::trans('Free Pickup and Delivery Available', app()->getLocale()) }}</p>
                        <a href="{{route('shop.page')}}" class="primary-btn"> {{ GoogleTranslate::trans('SHOP NOW', app()->getLocale()) }}</a>
                         --}}
                         <span> FRUIT FRESH</span>
                        <h2>Vegetable<br /> 100% Organic</h2>
                        <p> Free Pickup and Delivery Available</p>
                        <a href="{{route('shop.page')}}" class="primary-btn"> SHOP NOW</a>
                    </div>
                </div> 
                @endif
            </div>
        </div>
    </div>
</section>