@extends('layouts.backend_layouts')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row ">
                        <h4 class="card-title text-center">Product Form</h4>
                    </div>
                    <form class="forms-sample" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="number" class="form-control text-white" name="name" value="{{ old('name') }}"
                                id="name" placeholder="Enter your Product Name">
                            @error('name')
                                <p class=" text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Product Price</label>
                            <input type="text" class="form-control text-white" name="price" value="{{ old('price') }}"
                                id="price" placeholder="Enter your Product Price">
                            @error('price')
                                <p class=" text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Product Category</label>
                            <input type="text" class="form-control text-white" name="price" value="{{ old('price') }}"
                                id="price" placeholder="Enter your Product Price">
                            @error('price')
                                <p class=" text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Product slug</label>
                            <input type="text" class="form-control text-white" name="slug" value="{{ old('slug') }}"
                                id="exampleInputUsername1" placeholder="Enter your Category Slug">
                            @error('slug')
                                <p class=" text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Image</label>
                            <input type="file" name="image" class="form-control" id="exampleInputEmail1">
                            @error('image')
                                <p class=" text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
