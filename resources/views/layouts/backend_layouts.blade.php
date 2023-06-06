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

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <script src="{{asset('Frontend')}}/js/jquery-3.3.1.min.js"></script>    
    <link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>   

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('Backend')}}/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="{{asset('Backend')}}/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{asset('Backend')}}/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('Backend')}}/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('Backend')}}/assets/css/style.css">
    <link rel="stylesheet" href="{{asset('Frontend')}}/css/toastr.css" type="text/css">

    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('Backend')}}/assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      {{-- <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div> --}}
      <!-- partial:partials/_sidebar.html -->
      @include('components.Backend.aside')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
       @include('components.Backend.nav')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            {{-- <div class="page-header">
              <h3 class="page-title"> Form elements </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Forms</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol>
              </nav>
            </div> --}}
            @yield('content')
        
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
            </div>
          </footer>
             <!-- partial -->
            </div>
            <!-- main-panel ends -->
          </div>
           <!-- page-body-wrapper ends -->
          </div>
          <!-- container-scroller -->
          <!-- plugins:js -->
          <script src="{{asset('Backend')}}/assets/vendors/js/vendor.bundle.base.js"></script>
          <!-- endinject -->
          <!-- Plugin js for this page -->
          <script src="{{asset('Backend')}}/assets/vendors/chart.js/Chart.min.js"></script>
          <script src="{{asset('Backend')}}/assets/vendors/progressbar.js/progressbar.min.js"></script>
          <script src="{{asset('Backend')}}/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
          <script src="{{asset('Backend')}}/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
          <script src="{{asset('Backend')}}/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
          <script src="{{asset('Backend')}}/assets/js/jquery.cookie.js" type="text/javascript"></script>
          <!-- End plugin js for this page -->
          <!-- inject:js -->
          <script src="{{asset('Backend')}}/assets/js/off-canvas.js"></script>
          <script src="{{asset('Backend')}}/assets/js/hoverable-collapse.js"></script>
          <script src="{{asset('Backend')}}/assets/js/misc.js"></script>
          <script src="{{asset('Backend')}}/assets/js/settings.js"></script>
          <script src="{{asset('Backend')}}/assets/js/todolist.js"></script>
          <!-- endinject -->
          <!-- Custom js for this page -->
          <script src="{{asset('Backend')}}/assets/js/dashboard.js"></script>
          <!-- End custom js for this page -->
        </body>
        </html>
     