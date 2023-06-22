@extends('layouts.backend_layouts')
@section('title','Frontend Setting ')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
            <div class="row">
                <h4 class="card-title text-center">Frontend Setting Form</h4>
             </div>
          <form class="forms-sample" action="{{route('frontend.setting.update', $frontendData->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="name">Frontend Site Name</label>
              <input type="text" class="form-control text-white" name="name" id="name" value="{{$frontendData->name}}">
              @error('name')
              <p class=" text-danger" role="alert">
                  {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="email">Frontend Site Email</label>
              <input type="email" class="form-control text-white" name="email" id="email" value="{{$frontendData->email}}">
              @error('email')
              <p class=" text-danger" role="alert">
                  {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="tel">Frontend Site Phone</label>
              <input type="tel" class="form-control text-white" name="tel" id="tel"value="{{$frontendData->tel}}">
              @error('tel')
              <p class=" text-danger" role="alert">
                  {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="address">Frontend Site Adress</label>
              <input type="text" class="form-control text-white" name="address" id="address" value="{{$frontendData->address}}">
              @error('address')
              <p class=" text-danger" role="alert">
                  {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="openig_time">Openig Time</label>
              <input type="text" class="form-control text-white" name="openig_time" id="openig_time" value="{{$frontendData->openig_time}}">
              @error('openig_time')
              <p class=" text-danger" role="alert">
                  {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="camping_headline">Camping Headline</label>
              <input type="text" class="form-control text-white" name="camping_headline" id="camping_headline" value="{{$frontendData->camping_headline}}">
            </div>
            <div class="form-group">
              <label for="logo">Frontend Logo </label>
              <input type="file" name="logo" class="form-control" id="logo" >
              <input type="hidden" name="img_logo" value="{{$frontendData->logo}}">
              <img src="{{asset($frontendData->logo)}}" alt="">
              @error('logo')
                <p class=" text-danger" role="alert">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="form-group">
              <label for="banner">Frontend Header Banner </label>
              <input type="file" name="banner" class="form-control" id="banner" >
              <input type="hidden" name="img_banner" value="{{$frontendData->banner}}">
              <img src="{{asset($frontendData->banner)}}" alt="" width="200px" height="100px">
              @error('banner')
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