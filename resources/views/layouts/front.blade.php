<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

   

    <!-- Fonts -->
<link href="{{asset('frontend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

<link
href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('frontend/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">
    {{-- Owl carosal --}}
    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
{{-- google font Awsom --}}
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
{{--font awsom  --}}


<script src="https://kit.fontawesome.com/313fe7f0be.js" crossorigin="anonymous"></script>

    <style>
        a{
              
            text-decoration: none !important;
            color:#000 !important;


        }


    </style>

          

</head>
<body id="page-top">

    @include('layouts.inc.frontnavbar')

         <!-- Page Wrapper -->
             <div id="wrapper">



            

     
             <!-- Content Wrapper -->
          <div id="content-wrapper" class="d-flex flex-column">

              <!-- Main Content -->
                  <div id="content">
                      <!-- Topbar -->
             

                  <div class="container-fluid">
                  @yield('content')

                  </div>
                   </div>

                <!-- footer -->
             
                 <!-- End of Footer -->

           </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

                            

                  

                    
                   

                     
                 


         

               

            </div>
        



              





   
     <!-- Scripts -->
  <!-- Bootstrap core JavaScript-->

   <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}" ></script>
   <script src="{{ asset('frontend/js/owl.carousel.min.js') }}" ></script>
    <script src="{{ asset('frontend/js/custom.js') }}" ></script>

  
  <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" ></script>

  
  

   <!-- Core plugin JavaScript-->
    


     <!-- Custom scripts for all pages-->
   

     <script src="{{ asset('frontend/js/sb-admin-2.min.js') }}" defer></script>

      <!-- Page level plugins -->
  


 
    <!-- Page level custom scripts -->
    
   


   

   
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     
     @if(session('status'))

     <script>

      swal("{{ (session('status')) }}");
     </script>

     


     @endif


    


@yield('scripts')
</body>
</html>
