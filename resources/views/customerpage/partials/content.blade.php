<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="{{asset('frontend/asset/images/logo-judul.png')}}">
    <title>{{ $title }}</title>
<!--
    
TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/asset/css/bootstrap.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('frontend/asset/css/font-awesome.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/asset/css/templatemo-klassy-cafe.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/asset/css/owl-carousel.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/asset/css/lightbox.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/asset/css/main.css')}}">

  

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script src="vendor/sweetalert/sweetalert.all.js"></script>
 
   
    </head>
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    @include('customerpage.partials.header')
    <!-- ***** Header Area End ***** -->

    <div>
        @yield('content')
    </div>
    
    <!-- ***** Footer Start ***** -->
    @include('customerpage.partials.footer')

     {{-- link ion icon --}}
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>

    <!-- jQuery -->
    <script src="{{asset('frontend/asset/js/jquery-2.1.0.min.js')}}"></script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{asset('frontend/asset/js/popper.js')}}"></script>
    <script src="{{asset('frontend/asset/js/bootstrap.min.js')}}"></script>

    <!-- Plugins -->
    <script src="{{asset('frontend/asset/js/owl-carousel.js')}}"></script>
    <script src="{{asset('frontend/asset/js/accordions.js')}}"></script>
    <script src="{{asset('frontend/asset/js/datepicker.js')}}"></script>
    <script src="{{asset('frontend/asset/js/scrollreveal.min.js')}}"></script>
    <script src="{{asset('frontend/asset/js/waypoints.min.js')}}"></script>
    <script src="{{asset('frontend/asset/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('frontend/asset/js/imgfix.min.js')}}"></script> 
    <script src="{{asset('frontend/asset/js/slick.js')}}"></script> 
    <script src="{{asset('frontend/asset/js/lightbox.js')}}"></script> 
    <script src="{{asset('frontend/asset/js/isotope.js')}}"></script> 
   
    <!-- Global Init -->
    <script src="{{asset('frontend/asset/js/custom.js')}}"></script>
    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>
  </body>
 
</html>