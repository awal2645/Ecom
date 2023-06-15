@extends('layouts.frontend_layouts')
@section('content')
    <style>
        .page-item.active .page-link {
            z-index: 1;
            color: #fff;
            background-color: #7fad39; //your color
            border-color: #f3f6fa !important; //your color

        }

        .page-link {
            color: #7fad39;
        }
    </style>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('Frontend') }}/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Blog</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Blog</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Categories</h4>
                            <ul>
                                <li><a href="#">All</a></li>
                                @foreach ($blog_categories as $blog_category)
                                    <li><a href="{{ url('blog/' . $blog_category->slug) }}">{{ $blog_category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Recent News</h4>
                            <div class="blog__sidebar__recent">
                                @foreach ($latest_blogs as $latest_blog)
                                    <a href="{{ url('blog/' . $latest_blog->slug) }}" class="blog__sidebar__recent__item">
                                        <div class="blog__sidebar__recent__item__pic">
                                            <img src="{{ $latest_blog->image }}" alt="" width="50px"
                                                height="30px">
                                        </div>
                                        <div class="blog__sidebar__recent__item__text">
                                            <h6>{{ $latest_blog->name }}</h6>
                                            <span>{{ $latest_blog->updated_at->format('M d, Y') }}</span>
                                        </div>
                                    </a>
                                @endforeach

                            </div>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Search By</h4>
                            <div class="blog__sidebar__item__tags">
                                <a href="#">Apple</a>
                                <a href="#">Beauty</a>
                                <a href="#">Vegetables</a>
                                <a href="#">Fruit</a>
                                <a href="#">Healthy Food</a>
                                <a href="#">Lifestyle</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="row">
                        @foreach ($blogs as $blog)
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="blog__item">
                                    <div class="blog__item__pic">
                                        <img src="{{ $blog->image }}" alt="">
                                    </div>
                                    <div class="blog__item__text">
                                        <ul>
                                            <li><i class="fa fa-calendar-o"></i> {{ $blog->updated_at->format('M d, Y') }}
                                            </li>
                                            <li><i class="fa fa-comment-o"></i> 5</li>
                                        </ul>
                                        <h5><a href="{{ url('blog-details/' . $blog->slug) }}">{{ $blog->name }}</a></h5>
                                        <p>{{ $blog->description }} </p>
                                        <a href="{{ url('blog-details/' . $blog->slug) }}" class="blog__btn">READ MORE <span
                                                class="arrow_right"></span></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                        <div class="col-lg-12">
                            <div class="product__pagination blog__pagination">
                                {!! $blogs->withQueryString()->links('pagination::custom') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection
