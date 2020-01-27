	<!DOCTYPE html>
        <html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="{{ URL::to('/') }}/img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Disnakertrans DKI Jakarta</title>
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="{{ URL::to('/') }}/css/linearicons.css">
			<link rel="stylesheet" href="{{ URL::to('/') }}/css/font-awesome.min.css">
			<link rel="stylesheet" href="{{ URL::to('/') }}/css/bootstrap.css">
			<link rel="stylesheet" href="{{ URL::to('/') }}/css/magnific-popup.css">
			<link rel="stylesheet" href="{{ URL::to('/') }}/css/nice-select.css">					
			<link rel="stylesheet" href="{{ URL::to('/') }}/css/animate.min.css">
			<link rel="stylesheet" href="{{ URL::to('/') }}/css/owl.carousel.css">
			<link rel="stylesheet" href="{{ URL::to('/') }}/css/main.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		</head>
		<body>

			  <header id="header" id="home">
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="index.php"><img src="{{ URL::to('/') }}/img/logo.png" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
                                            @yield('header')
                                          
<!--				          <li class="menu-has-children"><a href="">Pages</a>
				            <ul>
								<li><a href="elements.html">elements</a></li>
								<li><a href="search.html">search</a></li>
								<li><a href="single.html">single</a></li>
				            </ul>
				          </li>-->
                                          <?php
                                          if(Session::get('login')){
                                                ?>
                                                <li>Hi..<?php echo Session::get('nama');?></li>
                                                
                                                <?php
                                              
                                          }else{
                                                
                                                ?>
                                                <li><a class="ticker-btn" href="{{ URL::to('/') }}/registrasi-user">Daftar</a></li>
                                                <li><a class="ticker-btn" href="{{ URL::to('/') }}/login">Login</a></li>				          				          
                                                <?php
                                          }
                                          ?>
<!--				          <li><a class="ticker-btn" href="{{ URL::to('/') }}/registrasi-user">Daftar</a></li>
				          <li><a class="ticker-btn" href="{{ URL::to('/') }}/login">Login</a></li>				          				          -->
                                          <!--<li><a href="home/setlang/ina"  title="Translate bahasa indonesia" ><img src="{{ URL::to('/') }}/img/indonesia.png" width="20" height="10"></a><a href="home/setlang/eng" title="Translate bahasa inggris"  ><img  src="{{ URL::to('/') }}/img/inggris.png" width="20" height="10"></a></li>-->
                                          
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->


			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
                                    @yield('title')
					
				</div>
			</section>
			<!-- End banner Area -->	

			            @yield('content')

			<!-- start footer Area -->		
			<footer class="footer-area section-gap">
                            <center>	

				
						<p class="col-lg-12 col-sm-12 footer-text m-0 text-white">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> by <a href="https://colorlib.com" target="_blank">DISNAKERTRANS DKI JAKARTA</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
						
				
                            </center>
			</footer>
			<!-- End footer Area -->		

			<script src="{{ URL::to('/') }}/js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="{{ URL::to('/') }}/js/vendor/bootstrap.min.js"></script>			
			{{-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script> --}}
  			<script src="{{ URL::to('/') }}/js/easing.min.js"></script>			
			<script src="{{ URL::to('/') }}/js/hoverIntent.js"></script>
			<script src="{{ URL::to('/') }}/js/superfish.min.js"></script>	
			<script src="{{ URL::to('/') }}/js/jquery.ajaxchimp.min.js"></script>
			<script src="{{ URL::to('/') }}/js/jquery.magnific-popup.min.js"></script>	
			<script src="{{ URL::to('/') }}/js/owl.carousel.min.js"></script>			
			<script src="{{ URL::to('/') }}/js/jquery.sticky.js"></script>
			<script src="{{ URL::to('/') }}/js/jquery.nice-select.min.js"></script>			
			<script src="{{ URL::to('/') }}/js/parallax.min.js"></script>		
			<script src="{{ URL::to('/') }}/js/mail-script.js"></script>	
			<script src="{{ URL::to('/') }}/js/main.js"></script>	
		</body>
	</html>



