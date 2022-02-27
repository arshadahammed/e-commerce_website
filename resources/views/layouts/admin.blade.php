<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

   

    <!-- Fonts -->
     <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

      <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
  

    <!-- Styles -->
     <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
      <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet">

      

      
      

</head>
<body id="page-top">

         <!-- Page Wrapper -->
             <div id="wrapper">

              @include('layouts.inc.sidebar')

     
             <!-- Content Wrapper -->
          <div id="content-wrapper" class="d-flex flex-column">

              <!-- Main Content -->
                  <div id="content">
                      <!-- Topbar -->
              @include('layouts.inc.adminnav')

                  <div class="container-fluid">
                  @yield('content')

                  </div>
                   </div>

                <!-- footer -->
               @include('layouts.inc.adminfooter')
                 <!-- End of Footer -->

           </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

                            

                  

                    
                   

                     
                 


         

               

            </div>
        



              





   
     <!-- Scripts -->
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}" defer></script>
  <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>

   <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}" defer></script>


     <!-- Custom scripts for all pages-->
   

     <script src="{{ asset('admin/js/sb-admin-2.min.js') }}" defer></script>

      <!-- Page level plugins -->
  
 <script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}" defer></script>

 
    <!-- Page level custom scripts -->
    
    <script src="{{ asset('admin/vendor/js/demo/chart-area-demo.js') }}" defer></script>


    <script src="js/demo/chart-pie-demo.js"></script>

     <script src="{{ asset('admin/js/demo/chart-pie-demo.js') }}" defer></script>
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     
     @if(session('status'))

     <script>

      swal("{{ (session('status')) }}");
     </script>

     


     @endif


    


@yield('scripts')
</body>
</html>
