	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="{{ URL::to('/') }}/baru1/images/logo-dki.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Disnaketrans DKI Jakarta</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="{{ URL::to('/') }}/baru1/css/linearicons.css">
			<link rel="stylesheet" href="{{ URL::to('/') }}/baru1/css/font-awesome.min.css">
			<link rel="stylesheet" href="{{ URL::to('/') }}/baru1/css/bootstrap.css">
			<link rel="stylesheet" href="{{ URL::to('/') }}/baru1/css/magnific-popup.css">
			<link rel="stylesheet" href="{{ URL::to('/') }}/baru1/css/nice-select.css">					
			<link rel="stylesheet" href="{{ URL::to('/') }}/baru1/css/animate.min.css">
			<link rel="stylesheet" href="{{ URL::to('/') }}/baru1/css/owl.carousel.css">
			<link rel="stylesheet" href="{{ URL::to('/') }}/baru1/css/main.css">
		</head>
		<body>

		  <header id="header" id="home">
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="index.php"><img src="{{ URL::to('/') }}/baru1/images/logo-dki.png" alt="" title="" /> <h1>DISNAKETRANS</h1></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <?php
                                          foreach ($listmenu as $menu){                                              
                                              echo '<li class="menu-active"><a href="'.$menu->menu_link.'">'.$menu->menu_ina.'</a></li>';
                                          }
                                          ?>
				          
				          <li class="menu-active"><a class="ticker-btn" href="{{ URL::to('/') }}/registrasi-user">Daftar</a></li>
				          <li class="menu-active"><a class="ticker-btn" href="{{ URL::to('/') }}/login">Login</a></li>				          				          				          				          
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->

                    <section class="banner-area relative" id="home" >	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
                                            <div class="about-content col-lg-12">
                                                    <h1 class="text-white">
                                                            {{ $judulmenu }}
                                                    </h1>	
                                                <p class="text-white link-nav"><a href="{{ URL::to('/') }}/">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{ URL::to('/') }}/{{ $judulmenulink }}"> {{ $judulmenu }}</a></p><br>



                                                <script>
                                                function validate(evt){
                                                    var e = evt || window.event;
                                                    var key = e.keyCode || e.which;
                                                    if((key <48 || key >57) && !(key ==8 || key ==9 || key ==13  || key ==37  || key ==39 || key ==46)  ){
                                                        e.returnValue = false;
                                                        if(e.preventDefault)e.preventDefault();
                                                    }
                                                }    
												</script>
												
												@if(Session::has('alert-success'))
												<div class="alert alert-success">
													<strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
												</div>
											@endif
								
											@if(Session::has('alert-error'))
												<div class="alert alert-warning">
													<strong>{{ \Illuminate\Support\Facades\Session::get('alert-error') }}</strong>
												</div>
											@endif
                                                <form action="{{ URL::to('/') }}/signup" method="post">
                                                                {{ csrf_field() }}
                                                                <div class="row justify-content-center form-wrap">

                                                            <div class="col-lg-12">&nbsp;</div>
                                                                    <div class="col-lg-8">
                                                                        <select name="user_type" class="form-control" required>
                                                                                <option value="">Daftar Sebagai</option>
                                                                                <option value="1">Pencari Kerja</option>
                                                                                <option value="2">Perusahaan</option>
                                                                            </select>

                                                                    </div>

                                                                    <div class="col-lg-12">&nbsp;</div>

                                                                    <div class="col-lg-8">
                                                                        <input type="text" class="form-control" onkeypress="validate(event);" maxlength="16" name="username" placeholder="Masukkan NIK" required>
                                                                    </div>


                                                                    <div class="col-lg-12">&nbsp;</div>
                                                                    <div class="col-lg-8">
                                                                        <input type="email" class="form-control" name="email" placeholder="Masukkan alamat email" required>
                                                                    </div>

                                                                    <div class="col-lg-12">&nbsp;</div>
                                                                    <div class="col-lg-8">
                                                                        <input type="password" class="form-control" name="password" placeholder="Masukkan kata sandi" required>
                                                                    </div>

                                                                    <div class="col-lg-12">&nbsp;</div>

                                                                    <div class="col-lg-2">
                                                                        <button type="submit" class="btn btn-info">
                                                                          Daftar
                                                                        </button>
                                                                    </div>								
                                                                </div>
                                                            </form>	
                                            </div>											
                                    </div>
				</div>
			</section>
	
 
			<!-- End post Area -->

		
			<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-4  col-md-12">
							<div class="single-footer-widget">
								<h6>TENTANG KAMI</h6>
								<p>
                                Situs Resmi Pencari Kerja DKI Jakarta adalah Situs yang dimiliki oleh Disnaketrans Provinsi DKI Jakarta
                                </p>
							</div>
						</div>
						<div class="col-lg-4  col-md-12">
							<div class="single-footer-widget">
								<h6>LINKS</h6>
								<ul class="footer-nav">
                                                                    <?php
                                                                    foreach ($listmenu as $menu){

                                                                        echo '<li ><a href="'.$menu->menu_link.'">'.$menu->menu_ina.'</a></li>';
                                                                    }
                                                                    ?>
								</ul>
							</div>
						</div>
						<div class="col-lg-3  col-md-12">
							<div class="single-footer-widget mail-chimp">
								<h6 class="mb-20">Hubungi Kami</h6>
								<p>
                                {{ $detil4->deskripsi_ina }}
                                </p>
							</div>
						</div>						
					</div>
</footer>			
<div id="copyright-area">
<div class="container">
						<p class="col-lg-12 col-sm-12 footer-text m-0 text-white text-center">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy; 2019  | Disnaketrans DKI Jakarta 
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
						
					</div>
				</div>
			<!-- End footer Area -->		
	
	
			<script src="{{ URL::to('/') }}/baru1/js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="{{ URL::to('/') }}/baru1/js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="{{ URL::to('/') }}/baru1/js/easing.min.js"></script>			
			<script src="{{ URL::to('/') }}/baru1/js/hoverIntent.js"></script>
			<script src="{{ URL::to('/') }}/baru1/js/superfish.min.js"></script>	
			<script src="{{ URL::to('/') }}/baru1/js/jquery.ajaxchimp.min.js"></script>
			<script src="{{ URL::to('/') }}/baru1/js/jquery.magnific-popup.min.js"></script>	
			<script src="{{ URL::to('/') }}/baru1/js/owl.carousel.min.js"></script>			
			<script src="{{ URL::to('/') }}/baru1/js/jquery.sticky.js"></script>
			<script src="{{ URL::to('/') }}/baru1/js/jquery.nice-select.min.js"></script>			
			<script src="{{ URL::to('/') }}/baru1/js/parallax.min.js"></script>		
			<script src="{{ URL::to('/') }}/baru1/js/mail-script.js"></script>	
			<script src="{{ URL::to('/') }}/baru1/js/main.js"></script>	
		</body>
	</html>



