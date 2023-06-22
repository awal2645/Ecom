@extends('layouts.backend_layouts')
@section('title',' My Profile ')
@section('content')
<div class="row">
    <div class="col-md-3 border-right">
        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="{{(!empty(auth('admin')->user()->image)) ? auth('admin')->user()->image : ""}}"><span class="font-weight-bold">{{auth('admin')->user()->name}}</span><span class="text-white-50">{{auth('admin')->user()->email}}</span><span> </span></div>
    </div>
    <div class="col-md-5 border-right">
        <div class="p-3 py-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="text-right">Profile Settings</h4>
            </div>
            <form action="{{route('update.profile.details')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="row mt-3">
                <div class="col-md-12"><label class="labels">Name</label><input type="text" name="name" class="form-control text-white" placeholder="Enter Your Name" value="{{auth('admin')->user()->name}}"></div>
                <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control text-white" placeholder="Enter Email Id" value="{{auth('admin')->user()->email}}"></div>
                <div class="col-md-12"><label class="labels">Profile Pic</label><input type="file" name="image" class="form-control btn text-white" placeholder="" value="">
                    <input type="hidden" name="img_name"  value="{{asset((!empty(auth('admin')->user()->image)) ? auth('admin')->user()->image : "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRxEXAyogJ77kzMui01yoNIhZiEcqo2MxE8Lw&usqp=CAU")}}" >
                    <img src="{{asset((!empty(auth('admin')->user()->image)) ? auth('admin')->user()->image : "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRxEXAyogJ77kzMui01yoNIhZiEcqo2MxE8Lw&usqp=CAU") }}" class="img-fluid img-thumbnail" width="150">
                </div>
            </div>
            <div class="mt-5 text-center"><button class="btn btn-outline-success btn-fw" type="submit">Save Profile</button></div>
            </form>
        </div>
    </div>
    <div class="col-md-4">
        <div class="p-3 py-5">
            <form action="{{route('update.admin.password')}}" method="POST">
                @csrf
            <div class="d-flex justify-content-between align-items-center experience">
            <h4 class="text-right">Change Password</h4>
            </div><br>
            <div class="col-md-12"><label class="labels">Old Password</label><input type="password" name="old_password" class="form-control text-white" placeholder="Enter Old Pasword" value="">
                @error('old_password')
                <p class=" text-danger" role="alert">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="col-md-12"><label class="labels">New Password</label><input type="password" name="new_password" class="form-control text-white" placeholder="Enter New Password" value="">
                @error('new_password')
                <p class=" text-danger" role="alert">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="col-md-12"><label class="labels">Confirm Password</label><input type="password" name="password_confirmation" class="form-control text-white" placeholder="Enter Re-confrim Password " value="">
                @error('password_confirmation')
                <p class=" text-danger" role="alert">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="mt-5 text-center"><button class="btn btn-outline-success btn-fw" type="submit">Change Password</button></div>
        </div>
        </form>
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