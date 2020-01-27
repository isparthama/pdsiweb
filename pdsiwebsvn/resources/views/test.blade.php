<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.ninjateam.org/html/spaceX/tables-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Aug 2017 15:37:58 GMT -->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Disnakertrans DKI Jakarta</title>
	<!-- Main Styles -->
	<link rel="stylesheet" href="{{ URL::to('/') }}/assets/styles/style.min.css">	
	<!-- Themify Icon -->
	<link rel="stylesheet" href="{{ URL::to('/') }}/assets/fonts/themify-icons/themify-icons.css">
	<!-- mCustomScrollbar -->
	<link rel="stylesheet" href="{{ URL::to('/') }}/assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css">
	<!-- Waves Effect -->
	<link rel="stylesheet" href="{{ URL::to('/') }}/assets/plugin/waves/waves.min.css">
	<!-- Sweet Alert -->
	<link rel="stylesheet" href="{{ URL::to('/') }}/assets/plugin/sweet-alert/sweetalert.css">	
</head>

<body>
<div class="main-menu">
	<header class="header">
            <a href="{{ URL::to('/') }}/" class="logo"><img src="{{ URL::to('/') }}/img/logodki.png" width="32" height="32"> &nbsp;&nbsp;DKI JAKARTA
		<button type="button" class="button-close fa fa-times js__menu_close"></button>
            </a>
	</header>
	<!-- /.header -->
	<div class="content">

		<div class="navigation">
			<h5 class="title">Menu Utama</h5>
			<!-- /.title -->
			<ul class="menu js__accordion">
				<li>
					<a class="waves-effect" href="{{ URL::to('/') }}/index.html"><i class="menu-icon ti-dashboard"></i><span>Dashboard</span></a>
				</li>
				<li>
					<a class="waves-effect" href="{{ URL::to('/') }}/profile.html"><i class="menu-icon ti-user"></i><span>Profile</span></a>
				</li>			
				<li class="current active">
					<a class="waves-effect parent-item js__control" href="{{ URL::to('/') }}/#"><i class="menu-icon ti-layout-accordion-merged"></i><span>Tables</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li class="current"><a href="{{ URL::to('/') }}/tables-basic.html">Basic Tables</a></li>
						<li><a href="{{ URL::to('/') }}/tables-datatable.html">Data Tables</a></li>
						<li><a href="{{ URL::to('/') }}/tables-responsive.html">Responsive Tables</a></li>
						<li><a href="{{ URL::to('/') }}/tables-editable.html">Editable Tables</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
			</ul>
			
			<!-- /.menu js__accordion -->
		</div>
		<!-- /.navigation -->
	</div>
	<!-- /.content -->
</div>
<!-- /.main-menu -->

<div class="fixed-navbar">
	<div class="pull-left">
		<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
		<h1 class="page-title">Aplikasi Disnakertrans DKI Jakarta</h1>
		<!-- /.page-title -->
	</div>
	<!-- /.pull-left -->
	<div class="pull-right">
		<div class="ico-item">
			<i class="ti-user"></i>
			<ul class="sub-ico-item">
				<li><a href="{{ URL::to('/') }}/#">Settings</a></li>
				<li><a class="js__logout" href="{{ URL::to('/') }}/#">Log Out ini user</a></li>
			</ul>
			<!-- /.sub-ico-item -->
		</div>
	</div>
	<!-- /.pull-right -->
</div>
<!-- /.fixed-navbar -->

<div id="wrapper">
	<div class="main-content">
		<div class="row row-inline-block small-spacing">
	
			<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Responsive tables</h4>
					<!-- /.box-title -->
					
					<!-- /.dropdown js__dropdown -->
					<p>Create responsive tables by wrapping any <code>.table</code> in <code>.table-responsive</code> to make them scroll horizontally on small devices (under 768px). When viewing on anything larger than 768px wide, you will not see any difference in these tables.</p>
					<div class="table-responsive">
						<table class="table">
							<thead> 
								<tr> 
									<th>#</th> 
									<th>Table heading</th> 
									<th>Table heading</th> 
									<th>Table heading</th> 
									<th>Table heading</th> 
									<th>Table heading</th> 
									<th>Table heading</th> 
								</tr> 
							</thead> 
							<tbody> 
								<tr> 
									<th scope="row">1</th> 
									<td>Table cell</td> 
									<td>Table cell</td> 
									<td>Table cell</td> 
									<td>Table cell</td> 
									<td>Table cell</td> 
									<td>Table cell</td> 
								</tr> 
								<tr> 
								<th scope="row">2</th> 
									<td>Table cell</td> 
									<td>Table cell</td> 
									<td>Table cell</td> 
									<td>Table cell</td> 
									<td>Table cell</td> 
									<td>Table cell</td> 
								</tr> 
								<tr> 
									<th scope="row">3</th> 
									<td>Table cell</td> 
									<td>Table cell</td> 
									<td>Table cell</td> 
									<td>Table cell</td> 
									<td>Table cell</td> 
									<td>Table cell</td> 
								</tr> 
							</tbody> 
						</table> 
						<table class="table table-bordered">
							<thead> 
								<tr> 
									<th>#</th> 
									<th>Table heading</th> 
									<th>Table heading</th> 
									<th>Table heading</th> 
									<th>Table heading</th> 
									<th>Table heading</th> 
									<th>Table heading</th> 
								</tr> 
							</thead> 
							<tbody> 
								<tr> 
									<th scope="row">1</th> 
									<td>Table cell</td> 
									<td>Table cell</td> 
									<td>Table cell</td> 
									<td>Table cell</td> 
									<td>Table cell</td> 
									<td>Table cell</td> 
								</tr> 
								<tr> 
								<th scope="row">2</th> 
									<td>Table cell</td> 
									<td>Table cell</td> 
									<td>Table cell</td> 
									<td>Table cell</td> 
									<td>Table cell</td> 
									<td>Table cell</td> 
								</tr> 
								<tr> 
									<th scope="row">3</th> 
									<td>Table cell</td> 
									<td>Table cell</td> 
									<td>Table cell</td> 
									<td>Table cell</td> 
									<td>Table cell</td> 
									<td>Table cell</td> 
								</tr> 
							</tbody> 
						</table>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-xs-12 -->
		</div>
		<!-- /.row row-inline-block small-spacing -->		
		<footer class="footer">
			<ul class="list-inline">
				<li><?php echo date('Y');?> © DISNAKERTRANS DKI JAKARTA.</li>
				
			</ul>
		</footer>
	</div>
	<!-- /.main-content -->
</div>
	<script src="{{ URL::to('/') }}/assets/scripts/jquery.min.js"></script>
	<script src="{{ URL::to('/') }}/assets/scripts/modernizr.min.js"></script>
	<script src="{{ URL::to('/') }}/assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="{{ URL::to('/') }}/assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="{{ URL::to('/') }}/assets/plugin/nprogress/nprogress.js"></script>
	<script src="{{ URL::to('/') }}/assets/plugin/sweet-alert/sweetalert.min.js"></script>
	<script src="{{ URL::to('/') }}/assets/plugin/waves/waves.min.js"></script>
	<!-- Sparkline Chart -->
	<script src="{{ URL::to('/') }}/assets/plugin/chart/sparkline/jquery.sparkline.min.js"></script>
	<script src="{{ URL::to('/') }}/assets/scripts/chart.sparkline.init.min.js"></script>

	<script src="{{ URL::to('/') }}/assets/scripts/main.min.js"></script>
</body>

<!-- Mirrored from demo.ninjateam.org/html/spaceX/tables-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Aug 2017 15:38:16 GMT -->
</html>