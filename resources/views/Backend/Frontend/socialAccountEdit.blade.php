@extends('layouts.backend_layouts')
@section('title','Edit Social Account ')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
            <div class="row">
                <h4 class="card-title text-center">Social Accouont Form</h4>
             </div>
          <form class="forms-sample" action="{{route('scocial.account.update',$socialAccountEdit->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="name">Social Accouont Name</label>
              <input type="text" class="form-control text-white" name="name" id="name" value="{{$socialAccountEdit->name}}" placeholder="Enter your Social Accouont  Name">
              @error('name')
              <p class=" text-danger" role="alert">
                  {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
                <label for="link">Social Accouont Link</label>
                <input type="text" class="form-control text-white" name="link" value="{{old('link')}}" value="{{$socialAccountEdit->link}}" id="link" placeholder="Enter your Social Accouont Link">
                @error('link')
                <p class=" text-danger" role="alert">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="form-group">
              <label for="icon_name">Social Accouont Icon</label>
              
              <input type="text" name="icon_name" class="form-control text-white"  value="{{$socialAccountEdit->icon_name}}" id="icon_name"  placeholder="Enter Social Accouont Icon">
              @error('icon_name')
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
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
            <div class="col-8"><h4 class="card-title">Social Account  List</h4></div>
            {{-- <div class="col-4"> <a href="{{route('category.add')}}" class="btn btn-success">Category <i class="mdi mdi-plus-circle"></i></a></div> --}}
         </div>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Link</th>
                <th>Icon</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($socialAccouonts as $key=>$socialAccouont)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>  {{$socialAccouont->name}}</td>
                        <td>  {{$socialAccouont->link}}</td>
                        <td> <i class="{{$socialAccouont->icon_name}}"></i> {{$socialAccouont->icon_name}}</td>
                        <td>
                            <a class="btn btn-success" href="{{route('scocial.account.edit',$socialAccouont->id)}}"><i class="mdi mdi-lead-pencil"></i></a>
                            <a class="btn btn-danger" href="{{route('scocial.account.delete',$socialAccouont->id)}}"><i class="mdi mdi-delete"></i></a>
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
    @if(Session::has('message'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('message') }}");
    @endif
  
    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ session('error') }}");
    @endif
  
    @if(Session::has('info'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("{{ session('info') }}");
    @endif
  
    @if(Session::has('warning'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.warning("{{ session('warning') }}");
    @endif
  </script>
@endsection