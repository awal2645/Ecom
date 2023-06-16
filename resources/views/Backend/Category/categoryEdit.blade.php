@extends('layouts.backend_layouts')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <h4 class="card-title text-center">Category Edit form</h4>
                    </div>
                    <form class="forms-sample" action="{{ route('category.update', $categoryEdit->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Category Name</label>
                            <input type="text" class="form-control text-white" name="name" id="exampleInputUsername1"
                                value="{{ $categoryEdit->name }}" required>
                            @error('name')
                                <p class=" text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Category slug</label>
                            <input type="text" class="form-control text-white" name="slug" id="exampleInputUsername1"
                                value="{{ $categoryEdit->slug }}" required>
                            @error('slug')
                                <p class=" text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Image</label>
                            <input type="file" name="image" class="form-control" id="exampleInputEmail1">
                            <img src="{{ asset($categoryEdit->image) }}" alt="" width="200px" height="100px">
                            <input type="hidden" value="{{ $categoryEdit->image }}" name="img_name">
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
