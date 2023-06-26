@extends('layouts.backend_layouts')
@section('content')
<style>
    .image-preview {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }

    .image-preview img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        margin-right: 10px;
        margin-bottom: 10px;
    }

    .unselect-button {
        display: inline-block;
        padding: 6px 12px;
        background-color: #ffcccc;
        color: #ff0000;
        font-size: 14px;
        font-weight: bold;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .unselect-button:hover {
        background-color: #ff0000;
        color: #ffffff;
    }
</style>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row ">
                        <h4 class="card-title text-center">Product Form</h4>
                    </div>
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" class="form-control text-white" name="name" id="name"
                                placeholder="Enter your Product Name">
                            @error('name')
                                <p class=" text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Product Price</label>
                            <input type="number" class="form-control text-white" name="price" id="price"
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
                                <option selected value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                <option selected value="">Select Brand</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                            @error('brand_id')
                                <p class=" text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="availability">Product Availability</label>
                            <select id="availability" name="availability" class=" form-control  text-white">
                                <option value="0">In Stock</option>
                                <option value="1">Out Of Stock</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="featured_product"> Featured Product</label> <br>
                            <input type="checkbox" id="featured_product" name="featured_product" value="isChecked">
                        </div>
                        <div class="form-group">
                            <label for="unit">Product Unit</label>
                            <input type="number" class="form-control text-white" name="unit" id="unit"
                                placeholder="Enter your Category Unit">
                            @error('unit')
                                <p class=" text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="shipping_time">Product Shipping Time</label>
                            <input type="text" class="form-control text-white" name="shipping_time" id="shipping_time"
                                placeholder="Enter your shiping time">
                            @error('shipping_time')
                                <p class=" text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">Product slug</label>
                            <input type="text" class="form-control text-white" name="slug" id="slug"
                                placeholder="Enter your  Slug">
                            @error('slug')
                                <p class=" text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="details">Product Details</label> <br>
                            <textarea class="form-control text-white" name="details"></textarea>
                            @error('details')
                                <p class=" text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Product Description</label> <br>
                            <textarea class="form-control text-white" name="description"></textarea>
                            @error('description')
                                <p class=" text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="thumbnail_image">Product Image</label>
                            <input type="file" name="thumbnail_image" class="form-control" id="thumbnail_image">
                            @error('thumbnail_image')
                                <p class=" text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="images">Multipule Image</label>
                            <input type="file"id="imageInput"  name="images[]" class="form-control" onchange="previewImages(event)"multiple>
                            <div class="image-preview" id="imagePreview"></div>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection  

<script>
    function previewImages(event) {
        var previewContainer = document.getElementById('imagePreview');
        previewContainer.innerHTML = '';

        var files = event.target.files;
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var reader = new FileReader();

            reader.onload = function (e) {
                var image = document.createElement('img');
                image.src = e.target.result;
                previewContainer.appendChild(image);

                var unselectButton = document.createElement('button');
                unselectButton.innerText = 'Unselect';
                unselectButton.classList.add('unselect-button');
                unselectButton.addEventListener('click', function () {
                    image.parentNode.removeChild(image);
                    unselectButton.parentNode.removeChild(unselectButton);
                    document.getElementById('imageInput').value = null;
                });
                previewContainer.appendChild(unselectButton);
            };

            reader.readAsDataURL(file);
        }
    }
</script>