<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            @php
                                $data = App\Models\FrontnendSetting::all()->first();
                                $socialAccounts = App\Models\SocialAccount::all();
                            @endphp
                            <li> <i class="fa fa-envelope"></i> Email:{{ $data->email }}</li>
                            <li> {{ GoogleTranslate::trans($data->camping_headline, app()->getLocale()) }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            @foreach ($socialAccounts as $socialAccount)
                                <a href="{{ $socialAccount->link }}"><i class="{{ $socialAccount->icon_name }}"></i></a>
                            @endforeach
                        </div>
                        <div class="header__top__right__language">

                            <img src=" {{ session()->get('locale') == 'en' ? 'https://themewagon.github.io/ogani/img/language.png' : asset('/storage/images/bd.png') }}"
                                alt="">
                            <div>{{ session()->get('locale') == 'en' ? 'English' : 'বাংলা' }}</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a class="lan" data-id="en">English</a></li>
                                <li><a class="lan" data-id="bn">বাংলা</a></li>
                            </ul>
                        </div>
                        <div class="header__top__right__auth">
                            @if (!empty(Auth::user()->name))
                                <div class="header__top__right__language ml-5">
                                    <div>{{ Auth::user()->name }}</div>
                                    <span class="arrow_carrot-down"></span>
                                    <ul>
                                        <li>
                                            <a href="{{ route('home') }}">
                                                {{ GoogleTranslate::trans('Profile', app()->getLocale()) }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('my.order') }}">
                                                {{ GoogleTranslate::trans('My Order', app()->getLocale()) }}</a>
                                        </li>
                                        <li> <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            @else
                                <a href="{{ route('login') }}"><i class="fa fa-user"></i>
                                    {{ GoogleTranslate::trans('Login', app()->getLocale()) }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="{{ route('home.page') }}"><img src="{{ $data->logo }} " alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class=" {{ Route::currentRouteName() == 'home.page' ? 'active' : '' }} "><a
                                href="{{ route('home.page') }}">
                                {{ GoogleTranslate::trans('Home', app()->getLocale()) }}</a></li>
                        <li class=" {{ Route::currentRouteName() == 'shop.page' ? 'active' : '' }}"><a
                                href="{{ route('shop.page') }}">
                                {{ GoogleTranslate::trans('Shop', app()->getLocale()) }}</a></li>
                        {{-- <li><a href="#">Pages</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="{{route('shop.details.page')}}">Shop Details</a></li>
                                <li><a href="{{route('shoping.cart.page')}}">Shoping Cart</a></li>
                                <li><a href="{{route('checkout.page')}}">Check Out</a></li>
                                <li><a href="{{route('blog.details.page')}}">Blog Details</a></li>
                            </ul>
                        </li> --}}
                        <li class=" {{ Route::currentRouteName() == 'blog.page' ? 'active' : '' }} "><a
                                href="{{ route('blog.page') }}">
                                {{ GoogleTranslate::trans('Blog', app()->getLocale()) }}</a></li>
                        <li class=" {{ Route::currentRouteName() == 'contact.page' ? 'active' : '' }} "><a
                                href="{{ route('contact.page') }}">
                                {{ GoogleTranslate::trans('Contact', app()->getLocale()) }}</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="{{ route('whiteList') }}"><i class="fa fa-heart"></i>
                                <span>{{ count((array) session('whiteList')) }}</span></a></li>
                        <li><a href="{{ route('cart') }}"><i class="fa fa-shopping-bag"></i>
                                <span>{{ count((array) session('cart')) }}</span></a></li>
                    </ul>
                    <div class="header__cart__price"> {{ GoogleTranslate::trans('item:', app()->getLocale()) }} <span>
                            @php $total = 0 @endphp
                            @if (session('cart'))
                                @foreach (session('cart') as $id => $details)
                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                @endforeach
                            @endif ${{ $total }}
                        </span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>

    </div>
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
</header>
