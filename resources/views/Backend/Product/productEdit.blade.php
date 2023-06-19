@extends('layouts.backend_layouts')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row ">
                        <h4 class="card-title text-center">Update Product Form</h4>
                    </div>
                    <form action="{{ route('product.update',$productEdit->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" class="form-control text-white" value="{{$productEdit->name}}" name="name" id="name"
                                placeholder="Enter your Product Name">
                            @error('name')
                                <p class=" text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Product Price</label>
                            <input type="number" class="form-control text-white" value="{{$productEdit->price}}" name="price" id="price"
                                placeholder="Enter your Product Price">
                            @error('price')
                                <p class=" text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_id">Product Category</label>
                            <select id="category_id" name="category_id" class=" form-control  text-white">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{($category->id==$productEdit->category_id)? "selected": ""}}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class=" text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="brand_id">Product Brand</label>
                            <select id="brand_id" name="brand_id" class=" form-control  text-white">
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" {{($brand->id==$productEdit->brand_id)? "selected": ""}}>{{ $brand->name }}</option>
                                @endforeach
                            </select>
                            @error('brand_id')
                                <p class=" text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        {{-- @php
                            dd($productEdit->availability);
                        @endphp --}}
                        <div class="form-group">
                            <label for="availability">Product Availability</label>
                            <select id="availability" name="availability" class=" form-control  text-white">
                                <option value="0" {{($productEdit->availability==0)? "selected": ""}} >In Stock</option>
                                <option value="1"  {{($productEdit->availability==1)? "selected": ""}}>Out Of Stock</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="featured_product"> Featured Product</label> <br>
                            <input type="checkbox" id="featured_product" {{($productEdit->featured_product=='isChecked')? "checked": ""}}  name="featured_product" value="isChecked">
                        </div>
                        <div class="form-group">
                            <label for="unit">Product Unit</label>
                            <input type="number" class="form-control text-white" value="{{$productEdit->unit}}" name="unit" id="unit"
                                placeholder="Enter your Category Unit">
                            @error('unit')
                                <p class=" text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="shipping_time">Product Shipping Time</label>
                            <input type="text" class="form-control text-white" value="{{$productEdit->shipping_time}}" name="shipping_time" id="shipping_time"
                                placeholder="Enter your shiping time">
                            @error('shipping_time')
                                <p class=" text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">Product slug</label>
                            <input type="text" class="form-control text-white" value="{{$productEdit->slug}}" name="slug" id="slug"
                                placeholder="Enter your  Slug">
                            @error('slug')
                                <p class=" text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="details">Product Details</label> <br>
                            <textarea class="form-control text-white"  name="details">{{$productEdit->details}}</textarea>
                            @error('details')
                                <p class=" text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Product Description</label> <br>
                            <textarea class="form-control text-white"  name="description">{{$productEdit->description}}</textarea>
                            @error('description')
                                <p class=" text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="thumbnail_image">Product Image</label>
                            <input type="file" name="thumbnail_image"  class="form-control" id="thumbnail_image">
                            <input type="hidden" name="image" value="{{$productEdit->thumbnail_image}}" class="form-control" id="thumbnail_image">
                            @error('thumbnail_image')
                                <p class=" text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                            <img src="{{$productEdit->thumbnail_image}}" alt="img">
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
