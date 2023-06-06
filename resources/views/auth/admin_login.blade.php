<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('Backend')}}/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{asset('Backend')}}/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('Backend')}}/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('Backend')}}/assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">{{ $title ?? "" }} {{ __('Login') }}</h3>
                @isset($route)
                <form method="POST" action="{{ $route }}">
                @else
                <form method="POST" action="{{ route('login') }}">
                @endisset
                @csrf
                  <div class="form-group">
                    <label> Email *</label>
                    <input type="email" class="form-control p_input text-white" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <p class="text-danger" >
                       {{ $message }}
                    </p>
                    @enderror
                </div>
                  <div class="form-group">
                    <label>Password *</label>
                    <input id="password" type="password" class="form-control p_input text-white @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <p class="text-danger" >
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}</label>
                    </div>
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-pass">{{ __('Forgot Your Password?') }}</a>
                    @endif
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">{{ __('Login') }}</button>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-facebook me-2 col">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div>
                  @isset($route)
               
                  @else
                        
                  <p class="sign-up">Don't have an Account?<a href="{{ route('register') }}"> Sign Up</a></p>
                      
                  @endisset
                    {{-- @if (Route::has('register'))
                    <p class="sign-up">Don't have an Account?<a href="{{ route('register') }}"> Sign Up</a></p>
                    @endif --}}
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
    <script src="{{asset('Backend')}}/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('Backend')}}/assets/js/off-canvas.js"></script>
    <script src="{{asset('Backend')}}/assets/js/hoverable-collapse.js"></script>
    <script src="{{asset('Backend')}}/assets/js/misc.js"></script>
    <script src="{{asset('Backend')}}/assets/js/settings.js"></script>
    <script src="{{asset('Backend')}}/assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>
