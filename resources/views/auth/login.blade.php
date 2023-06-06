@extends('layouts.frontend_layouts')
@section('content')
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        {{-- <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class=" "  src="{{asset('Frontend')}}/img/logo.png">
                <h3>Welcome to Ogani </h3>
            </div>
        </div> --}}
        <div class="col-md-6 border-right">
            <form method="POST" action="{{ route('login') }}">
                @csrf
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-center">Login User</h4>
                </div>
              
                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Email *</label>
                        <input type="email" class="form-control" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                       
                        @error('email')
                        <p class=" text-danger" role="alert">
                           {{ $message }}
                        </p>
                       
                        @endif
                    </div>
                    <div class="col-md-12"><label class="labels">Password *</label>
                        <input id="password" type="password" class="form-control p_input  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class=" text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                  
                </div>
                
                <div class="mt-5 text-center">
                    <button type="submit"  class="site-btn">{{ __('Login') }}</button>
                </div>
                
                <div class="d-flex row mt-5">
                    <div class="col-2"></div>
                    <div class="col-5">
                        <a href="{{route('auth.facebook')}}" class="btn  btn-primary ">
                            <i class="fa fa-facebook"></i> Facebook </a>
                    </div>
                    
               <div class="col-5">
                <a  href="{{route('google-auth')}}" class="btn btn-danger ">
                        <i class="fa fa-google"></i> Google </a>
               </div>
                    
                  </div> 
            </div>
            </form>
        </div>
        <div class="col-md-6">
            <form method="POST" action="{{ route('register') }}">
                @csrf
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-center">Register User</h4>
                </div>
                <div class="form-group">
                    <label> {{ __('Name') }} *</label>
                    <input type="text" class="form-control"@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <p class=" text-danger" role="alert">
                       {{ $message }}
                    </p>
                    @enderror
                </div>
                  <div class="form-group">
                    <label> {{ __('Email Address') }} *</label>
                    <input type="email" class="form-control p_input " @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @if($errors->register->has('email'))
                    @error('email')
                    <p class=" text-danger" role="alert">
                       {{ $message }}
                    </p>
                    @enderror
                    @endif
                </div>
                <div class="form-group">
                    <label>{{ __('Password') }} *</label>
                    <input id="password" type="password" class="form-control" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @if($errors->register->has('password'))
                    @error('password')
                    <p class=" text-danger" role="alert">
                        {{ $message }}
                    </p>
                    @enderror
                    @endif
                </div>
                <div class="form-group">
                    <label>{{ __('Confirm Password') }} *</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    @error('password')
                    <p class=" text-danger" role="alert">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="site-btn">{{ __('Register') }}</button>
                  </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection
