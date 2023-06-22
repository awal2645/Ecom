@extends('layouts.frontend_layouts')
@section('title', 'Blog Details')
@section('content')
    <!-- Blog Details Hero Begin -->
    <section class="blog-details-hero set-bg" data-setbg="{{ asset('Frontend') }}/img/blog/details/details-hero.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog__details__hero__text">
                        <h2>{{ $blog_details->name }}</h2>
                        <ul>
                            <li>By Michael Scofield</li>
                            <li>{{ $blog_details->updated_at->format('M d, Y') }}</li>
                            <li>8 Comments</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 order-md-1 order-2">
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
                                @foreach ($blog_categories as $blog_category)
                                    <li><a href="{{ url('blog/' . $blog_category->slug) }}">{{ $blog_category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Recent News</h4>
                            <div class="blog__sidebar__item">
                                <h4>Recent News</h4>
                                <div class="blog__sidebar__recent">
                                    @foreach ($latest_blogs as $latest_blog)
                                        <a href="{{ url('blog-details/' . $latest_blog->slug) }}"
                                            class="blog__sidebar__recent__item">
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
                <div class="col-lg-8 col-md-7 order-md-1 order-1">
                    <div class="blog__details__text">
                        <img src="{{ asset('Frontend') }}/img/blog/details/details-pic.jpg" alt="">
                        <p>{{ $blog_details->details }}</p>
                        <h3>{{ $blog_details->head_line }}</h3>
                        <p>{{ $blog_details->description }}</p>
                    </div>
                    <div class="blog__details__content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="blog__details__author">
                                    <div class="blog__details__author__pic">
                                        <img src="{{ asset('Frontend') }}/img/blog/details/details-author.jpg"
                                            alt="">
                                    </div>
                                    <div class="blog__details__author__text">
                                        <h6>Michael Scofield</h6>
                                        <span>Admin</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="blog__details__widget">
                                    <ul>
                                        <li><span>Categories:</span> {{ $blog_details->category->name }}</li>
                                        <li><span>Tags:</span> </li>
                                    </ul>
                                    <div class="blog__details__social">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

    <!-- Related Blog Section Begin -->
    <section class="related-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related-blog-title">
                        <h2>Post You May Like</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach ($related_blogs as $related_blog)
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="{{ $related_blog->image }}" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> {{ $related_blog->updated_at->format('M d, Y') }}
                                    </li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5><a
                                        href="{{ url('blog-details/' . $related_blog->slug) }}">{{ $related_blog->name }}</a>
                                </h5>
                                <p>{{ $related_blog->description }} </p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Related Blog Section End -->
@endsection
