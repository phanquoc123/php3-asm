<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Mono - Responsive Admin & Dashboard Template</title>
    
  <!-- theme meta -->
  <meta name="theme-name" content="mono" />

  <!-- GOOGLE FONTS -->
   @include('admin.layouts.partials.css')
</head>


  <body class="navbar-fixed sidebar-fixed" id="body">
   

    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">
      
      
        <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
		@include('admin.layouts.partials.aside')

      

      <!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
      <div class="page-wrapper">
        
          <!-- Header -->
          

		  @include('admin.layouts.partials.header')


        <!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->
    	@yield('content')
        
          <!-- Footer -->
         
		  @include('admin.layouts.partials.footer')

      </div>
    </div>
    

                   
              
                    

    @include('admin.layouts.partials.script')
                    <!--  -->


  </body>
</html>
