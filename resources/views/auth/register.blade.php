<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('assets')}}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('assets')}}/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">{{ $title ?? "" }} {{ __('Register') }}</h3>
                @isset($route)
                <form method="POST" action="{{ $route }}">
                @else
                <form method="POST" action="{{ route('register') }}">
                @endisset
                @csrf
                <div class="form-group">
                    <label> {{ __('Name') }} *</label>
                    <input type="text" class="form-control p_input text-white"@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <p class=" text-danger" role="alert">
                       {{ $message }}
                    </p>
                    @enderror
                </div>
                  <div class="form-group">
                    <label> {{ __('Email Address') }} *</label>
                    <input type="email" class="form-control p_input text-white" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <p class=" text-danger" role="alert">
                       {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Password') }} *</label>
                    <input id="password" type="password" class="form-control p_input text-white" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                    <p class=" text-danger" role="alert">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Confirm Password') }} *</label>
                    <input id="password-confirm" type="password" class="form-control  p_input text-white" name="password_confirmation" required autocomplete="new-password">
                    @error('password')
                    <p class=" text-danger" role="alert">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                {{-- <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}</label>
                    </div>
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-pass">{{ __('Forgot Your Password?') }}</a>
                    @endif
                </div> --}}
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">{{ __('Register') }}</button>
                  </div>
                  {{-- <div class="d-flex">
                    <button class="btn btn-facebook me-2 col">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div> --}}
                  @if (Route::has('login'))
                    <p class="sign-up">Already have an Account?<a href="{{ route('login') }}">{{ __('Login') }}</a></p>
                  @endif
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('assets')}}/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('assets')}}/js/off-canvas.js"></script>
    <script src="{{asset('assets')}}/js/hoverable-collapse.js"></script>
    <script src="{{asset('assets')}}/js/misc.js"></script>
    <script src="{{asset('assets')}}/js/settings.js"></script>
    <script src="{{asset('assets')}}/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>






















{{-- 
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $title ?? "" }} {{ __('Register') }}</div>

                <div class="card-body">
                    @isset($route)
                        <form method="POST" action="{{ $route }}">
                    @else
                        <form method="POST" action="{{ route('register') }}">
                    @endisset
                    @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
