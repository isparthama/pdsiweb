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
                    


                          		<!-- start banner Area -->
			<section class="banner-area relative" id="home">
            
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-center">
                                                <div class="tema-view"></div>
						<div class="banner-content col-lg-12">
							<h1 class="text-black">
								<span>Situs Resmi Pencari Kerja</span> DKI Jakarta				
							</h1>	
                            	
							<form method="post" action="{{ URL::to('/') }}/search-pekerjaan" class="serach-form-area">
                                                                {{ csrf_field() }}
								<div class="row justify-content-center form-wrap">
									<div class="col-lg-7 form-cols">
										<input type="text" required class="form-control" name="search" placeholder="Cari info lowongan disini">
                                                                                <input type="hidden" id="cntr" name="negara" value="INA">
									</div>
									<div class="col-lg-3 form-cols">
										<div class="default-select" id="default-selects"">
											<select class="tesss" name="lokasi" id="cntr2" required>
                                                                                                <option value="0">Pilih Lokasi</option>
                                                                                                @foreach($listjumlahperkota as $kota)
                                                                                                    <option value="{{ $kota->id_kab }}">{{ $kota->nama }}</option>        
                                                                                                @endforeach

                                                                                        </select>
										</div>
									</div>
									
									<div class="col-lg-2 form-cols">
									    <button type="submit" class="btn btn-info">
									      <span class="lnr lnr-magnifier"></span> Search
									    </button>
									</div>								
								</div>
							</form>	
							<p class="text-black"> <span>Cari berdasarkan:</span> Lokasi yang anda inginkan</p>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->
		
                        <!-- Start features Area -->
			<section class="features-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<div class="single-feature bg-green">
								<h4>Pencarian Kerja</h4>
                                <img src="{{ URL::to('/') }}/baru1/images/pic-career.jpg" class="img-fluid img-border"/>
                              <p>
								  {{ $detil1->deskripsi_ina }}
								</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-feature bg-grey">
								<h4>Identitas Profesional</h4>
                                <img src="{{ URL::to('/') }}/baru1/images/pic-professional.jpg" class="img-fluid img-border"/>
								<p>
									{{ $detil2->deskripsi_ina }}
								</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-feature bg-brown">
								<h4>Profil Anda</h4>
                                <img src="{{ URL::to('/') }}/baru1/images/pic-profile.jpg" class="img-fluid img-border"/>
								<p>
									{{ $detil3->deskripsi_ina }}
								</p>
							</div>
						</div>
																							
					</div>
				</div>	
			</section>
			<!-- End features Area -->
			
                        <!-- Start popular-post Area -->
			<section class="popular-post-area pt-50">
				<div class="container">
                <div class="title text-center">
								<h1 class="mb-10">EVENT</h1>
								<p>List Event dari Disnakertrans DKI Jakarta</p>
							</div>
					<div class="row align-items-center">
						<div class="active-popular-post-carusel">
                                                        <?php
                                                        foreach ($listevent as $event){
                                                            ?>
                                                            <div class="single-popular-post d-flex flex-row">                            
                                                                        <div class="thumb">
                                                                                <img class="img-fluid" src="{{ URL::to('/') }}/baru1/images/pic-event/{{ $event->gambar }}" alt="">
                                                                                <!--<a class="btns text-uppercase" href="#">view</a>-->
                                                                        </div>

                                                                </div>	
                                                            <?php
                                                        }
                                                        
                                                        ?>
							
							
																																													
						</div>
					</div>
				</div>	
			</section>
			<!-- End popular-post Area -->
			
			
			
<!-- Start post Area -->
			<section class="post-area section-gap">
				<div class="container">
                <div class="title text-center">
								<h1 class="mb-10">LOWONGAN</h1>
								<p>Beberapa Lowongan Kerja menarik lainnya</p>
							</div>
                            <div class="mb-30"></div>
					<div class="row justify-content-center d-flex">
						<div class="col-lg-8 post-list">
							@foreach($listlowongankerjaslide1 as $lk)
							<div class="single-post d-flex flex-row">
								<div class="thumb">
									<img src="{{ URL::to('/') }}/baru1/img/post.png" alt="">
									
								</div>
								<div class="details">
									<div class="title d-flex flex-row justify-content-between">
										<div class="titles">
											<h4><a href="{{ URL::to('/') }}/job-detail/{{ $lk->id }}">{{ $lk->judul_ina }}</a></h4>
											<h6>{{ $lk->nama_perusahaan }}</h6>					
										</div>
										<ul class="btns">
										
											<li><a href="{{ URL::to('/') }}/job-detail/{{ $lk->id }}">Apply</a></li>
										</ul>
									</div>
									<p>
										{{ substr($lk->deskripsi_ina, 0, 100) }}

									</p>
									
									<p class="address"><span class="lnr lnr-location"></span> {{ $lk->namakota }}</p>
									
								</div>
							</div>
                                                        @endforeach
							
							<!--<a class="text-uppercase loadmore-btn mx-auto d-block" href="category.html">Load More job Posts</a>-->

						</div>		
			
                        
  <div class="col-lg-4 sidebar">
							<div class="single-slidebar bg-blue2">
								<h4>Pekerjaan berdasarkan lokasi</h4>
								<ul class="cat-list">
                                                                        @foreach($listjumlahperkota as $jum)
                                                                            <li> <a class="justify-content-between d-flex" href="{{ URL::to('/') }}/pekerjaan-berdasarkan-lokasi/{{ $jum->id_kab }}"><p>{{ $jum->nama }}</p><span>{{ $jum->jumlah }}</span></a></li>
                                                                        @endforeach 
									
								</ul>
							</div>

											

							<div class="single-slidebar bg-blue2">
								<h4>Pekerjaan Berdasarkan Kategori</h4>
								<ul class="cat-list">
									@foreach($listjumlahperkategori as $kat)
                                                                            <li><a class="justify-content-between d-flex" href="{{ URL::to('/') }}/pekerjaan-berdasarkan-kategori/{{ $kat->id }}"><p>{{ $kat->nama }}</p><span>{{ $kat->jumlah }}</span></a></li>
                                                                        @endforeach 

                                   
                                    
                                    
								</ul>
							</div>

<div class="single-slidebar">
								<h4>Last Post Jobs</h4>
								<div class="active-relatedjob-carusel">
									@foreach ($listlowongankerjaslide1 as $lk)
                                                                        <div class="single-rated">
                                                                                <!--<img class="img-fluid" src="{{ URL::to('/') }}/img/post.jpg" alt="">-->
                                                                                <a href="{{ URL::to('/') }}single.html"><h4>{{ $lk->judul_ina }}</h4></a>
                                                                                <h6>{{ $lk->nama_perusahaan }}</h6>
                                                                                <p>
                                                                                        {{ substr($lk->deskripsi_ina,0,100) }}
                                                                                </p>
                                                                                
                                                                                <p class="address"><span class="lnr lnr-map"></span>{{ $lk->namakota }}</p>
                                                                                <a class="btns text-uppercase" href="{{ URL::to('/') }}/login">Apply</a>
                                                                                <!--<a href="{{ URL::to('/') }}#" class="btns text-uppercase">Apply job</a>-->
                                                                        </div>
                                                                    @endforeach 
																									
								</div>
							</div>								
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            						

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



