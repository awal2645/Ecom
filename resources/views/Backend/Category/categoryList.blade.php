@extends('layouts.backend_layouts')
@section('title','List Category ')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Category List</h4>
                    </div>
                    <div class="col-4"> <a href="{{ route('category.add') }}" class="btn btn-success">Category <i
                                class="mdi mdi-plus-circle"></i></a></div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categoryLists as $key => $categoryList)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td> <img
                                            src="https://media.sproutsocial.com/uploads/2017/02/10x-featured-social-media-image-size.png"
                                            alt=""></td>
                                    <td> {{ $categoryList->name }}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('category.edit', $categoryList->id) }}"><i
                                                class="mdi mdi-lead-pencil"></i></a>
                                        <a class="btn btn-danger" href="{{ route('category.delete', $categoryList->id) }}"><i
                                                class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
     
@endsection
