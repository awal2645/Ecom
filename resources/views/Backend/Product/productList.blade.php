@extends('layouts.backend_layouts')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Product List</h4>
                    </div>
                    <div class="col-4"> <a href="{{ route('product.add') }}" class="btn btn-success">Product <i
                                class="mdi mdi-plus-circle"></i></a></div>
                </div>
                <div class="table-responsive">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productLists as $key => $productList)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td> <img
                                            src=" {{ isset($productList->thumbnail_image) ? $productList->thumbnail_image : 'https://media.sproutsocial.com/uploads/2017/02/10x-featured-social-media-image-size.png' }}"
                                            alt=""></td>
                                    <td> {{ $productList->name }}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('product.edit', $productList->id) }}"><i
                                                class="mdi mdi-lead-pencil"></i></a>
                                        <a class="btn btn-danger" href="{{ route('product.delete', $productList->id) }}"><i
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
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    
     
@endsection
