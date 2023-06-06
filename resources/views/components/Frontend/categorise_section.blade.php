@php
    $categories = App\Models\Category::all();
@endphp
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                @foreach ($categories as $category)
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ $category->image }}">
                            <h5><a href="{{ url('category/' . $category->slug) }}">{{ $category->name }}</a></h5>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
</section>
