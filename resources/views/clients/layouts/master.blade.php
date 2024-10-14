<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Fruitkha - Slider Version</title>

	<!-- favicon -->
	@include('clients.layouts.partials.css')

</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	<!-- header -->
	
	@include('clients.layouts.partials.header')
	<!-- end header -->
	
	<!-- search area -->
	
	@include('clients.layouts.partials.search')
	<!-- end search area -->

	<!-- home page slider -->
	
	<!-- end home page slider -->

	<!-- features list section -->
	
	<!-- end features list section -->

	<!-- product section -->
      @yield('content')

	  @yield('component')
	<!-- end product section -->

	<!-- cart banner section -->
	
    <!-- end cart banner section -->

	<!-- testimonail-section -->
	
	<!-- end testimonail-section -->
	
	<!-- advertisement section -->
	
	<!-- end advertisement section -->
	
	<!-- shop banner -->

	<!-- end shop banner -->

	<!-- latest news -->
	
	<!-- end latest news -->

	<!-- logo carousel -->
	@include('clients.layouts.partials.logocarousels')
	<!-- end logo carousel -->

	<!-- footer -->
	@include('clients.layouts.partials.footer')
	<!-- end footer -->
	
	<!-- copyright -->
	@include('clients.layouts.partials.copyright')
	<!-- end copyright -->
	
	<!-- jquery -->
	@include('clients.layouts.partials.script')

</body>
</html>