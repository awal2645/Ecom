@extends('layouts.frontend_layouts')
@section('content')
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="{{(!empty(Auth::user()->details->image)) ? Auth::user()->details->image : ""}}"><span class="font-weight-bold">{{Auth::user()->name}}</span><span class="text-black-50">{{Auth::user()->email}}</span><span> </span></div>
         
          
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form action="{{route('store.user.details')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" placeholder="first name" value="{{Auth::user()->name}}"></div>
                    <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" placeholder="enter email id" value="{{Auth::user()->email}}"></div>
                    
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" name="phone" class="form-control" placeholder="enter phone number" value="{{(!empty(Auth::user()->details->phone)) ? Auth::user()->details->phone : ""}}">
                        @error('phone')
                        <p class=" text-danger" role="alert">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="col-md-12"><label class="labels">Profile Pic</label><input type="file" name="image" class="form-control btn" placeholder="" value="">
                        <input type="hidden" name="img_name"  value="{{asset((!empty(Auth::user()->details->image)) ? Auth::user()->details->image : "")}}"  >

                        <img src="{{asset((!empty(Auth::user()->details->image)) ? Auth::user()->details->image : "") }}" class="img-fluid img-thumbnail" width="150">
                    </div>
                    <div class="col-md-12"><label class="labels">Address</label><input type="text" name="address" class="form-control" placeholder="enter address " value="{{ (!empty(Auth::user()->details->address)) ? Auth::user()->details->address : ""}}"></div>
                    <div class="col-md-12"><label class="labels">Postcode</label><input type="text" name="postcode" class="form-control" placeholder="enter postcode" value="{{ (!empty(Auth::user()->details->postcode )) ? Auth::user()->details->postcode  : ""}}"></div>
                    <div class="col-md-12"><label class="labels">State</label><input type="text" name="state" class="form-control" placeholder="enter state" value="{{(!empty(Auth::user()->details->state)) ? Auth::user()->details->state: ""}}"></div>
                    <div class="col-md-12"><label class="labels">Country</label><input type="text" name="country" class="form-control" placeholder=" enter country" value="{{(!empty(Auth::user()->details->country)) ? Auth::user()->details->country : ""}}"></div>
                </div>
                
                <div class="mt-5 text-center"><button class="site-btn" type="submit">Save Profile</button></div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <form action="{{route('update.password')}}" method="POST">
                    @csrf
                <div class="d-flex justify-content-between align-items-center experience">
                <h4 class="text-right">Change Password</h4>
                </div><br>
                <div class="col-md-12"><label class="labels">Old Password</label><input type="text" name="old_password" class="form-control" placeholder="Enter Old Pasword" value="">
                    @error('old_password')
                    <p class=" text-danger" role="alert">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="col-md-12"><label class="labels">New Password</label><input type="text" name="new_password" class="form-control" placeholder="Enter New Password" value="">
                    @error('new_password')
                    <p class=" text-danger" role="alert">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="col-md-12"><label class="labels">Confirm Password</label><input type="text" name="password_confirmation" class="form-control" placeholder="Enter Re-confrim Password " value="">
                    @error('password_confirmation')
                    <p class=" text-danger" role="alert">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
            </div>
            <div class="mt-5 text-center"><button class="site-btn" type="submit">Change Password</button></div>
            </form>
        </div>
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
