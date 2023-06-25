@extends('layouts.frontend_layouts')
@section('title','Ogani  ')
@section('content')
  

    <!-- Categories Section Begin -->
    @include('components.Frontend.categorise_section')
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    @include('components.Frontend.featured_section')
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    @include('components.Frontend.banner_section')
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    @include('components.Frontend.product_section')
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    @include('components.Frontend.blog_section')
    <!-- Blog Section End -->
@endsection
