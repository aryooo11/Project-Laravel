<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Yo Tour n Travel</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicons/favicon-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicons/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('assets/img/favicons/manifest.json')}}">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="{{ asset('vendors/plyr/plyr.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/theme.css') }}" rel="stylesheet" />

  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg fixed-top py-3 backdrop bg-white " data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand d-flex align-items-center fw-bold fs-2" href="{{ url('/') }}"> <img class="d-inline-block align-top img-fluid" src="{{ asset('assets/img/gallery/logo-icon.png') }}" alt="" width="50" /><span class="text-primary fs-4 ps-2">yo</span></a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto pt-2 pt-lg-0">
              <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a></li>
              {{-- <li class="nav-item"><a class="nav-link text-600" href="#featuresVideos">Video</a></li> --}}
              <li class="nav-item"><a class="nav-link text-600" href="{{ route('destination') }}">Destinations</a></li>
              <li class="nav-item"><a class="nav-link text-600" href="{{ route('contact') }}">Contact</a></li>
            </ul>
            <form class="ps-lg-5" >
              <a class="btn btn-lg btn-white hover-top btn-outline-primary order-0" href="{{ url('/reservasi') }} " role="button">Book Now</a>
            <form class="ps-lg-5" >
              <a class="btn btn-lg btn-white hover-top btn-outline-danger order-0" href="{{ route('logout') }} " role="button">Log Out</a>
            </form>
            {{-- <form class="ps-lg-5">
              <button class="btn btn-lg btn-outline-primary order-0" type="submit" >
                <a href="{{ route('register') }} ">Sign Up</a>
                
              </button>
              <form class="ps-lg-5">
                <button class="btn btn-lg btn-outline-warning order-0" type="submit" >
                  <a href="{{ route('login') }}">Log In</a>
                  
                </button>
            </form> --}}
            
          </div>
        </div>
      </nav>
      {{-- <section class="py-0">
        <div class="bg-holder d-none d-md-block" style="background-image:url(assets/img/illustrations/hero.png);background-position:right bottom;background-size:contain;">
        </div>
        <!--/.bg-holder-->

        <div class="container position-relative">
          <div class="row align-items-center min-vh-75 my-lg-8">
            <div class="col-md-7 col-lg-6 text-center text-md-start py-8">
              <h1 class="mb-4 display-1 lh-sm">Travel around <br class="d-block d-lg-none d-xl-block" />the world</h1>
              <p class="mt-4 mb-5 fs-1 lh-base">Plan and book your perfect trip with expert advice, <br class="d-none d-lg-block" />travel tips, destination information and <br class="d-none d-lg-block" />inspiration from us.</p><a class="btn btn-lg btn-primary hover-top" href="{{ route('register') }} " role="button">Sign Up Now</a>
            </div>
          </div>
        </div>
      </section> --}}


      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <!-- <section> close ============================-->
      <!-- ============================================-->


    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ asset('vendors/@popperjs/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/is/is.min.js') }}"></script>
    <script src="{{ asset('vendors/plyr/plyr.polyfilled.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
  </body>

</html>