<html lang="en">

<!-- Mirrored from demo.ninjateam.org/html/spaceX/tables-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Aug 2017 15:37:58 GMT -->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
        <link rel="icon" href="{{ URL::to('/') }}/pertamina/images/pavicon.png" type="image/x-icon" />

	<title>PDSI Pertamina Drilling</title>
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
        <!-- Remodal -->
	<link rel="stylesheet" href="{{ URL::to('/') }}/assets/plugin/modal/remodal/remodal.css">
	<link rel="stylesheet" href="{{ URL::to('/') }}/assets/plugin/modal/remodal/remodal-default-theme.css">
        <!-- Dropify -->
	<link rel="stylesheet" href="{{ URL::to('/') }}/assets/plugin/dropify/css/dropify.min.css"><!-- Fontello Icon -->
	<link rel="stylesheet" href="{{ URL::to('/') }}/assets/fonts/fontello/fontello.css">
</head>

<body>
    <div class="modal fade" id="boostrapModal-1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <form action="" enctype="multipart/form-data" method="post" id="formmodal" class="formmodal">
                            {{ csrf_field() }}
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"></h4>
                        </div>
                        <div class="modal-body">
                                
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal"><i class="fa fa-rotate-left" aria-hidden="true"></i></button>
                                <button type="submit" id="btn" class="btn btn-primary btn-sm waves-effect waves-light" data-dismiss="" ><i class="fa fa-save" aria-hidden="true"></i></button>
                        </div>
                    </form>
                </div>
        </div>
</div>

<div class="main-menu">
	<header class="header">
            <a href="{{ URL::to('/') }}/" class="logo"><img src="{{ URL::to('/') }}/pertamina/images/logo.png" style="height: 30px;"> &nbsp;&nbsp;
		<button type="button" class="button-close fa fa-times js__menu_close"></button>
            </a>
	</header>
	<!-- /.header -->
	<div class="content"> 

		<div class="navigation">
			<!--<h5 class="title">Menu Utama</h5>-->
			<!-- /.title -->
			<ul class="menu js__accordion">
				<?php  echo '
                                        <li '.Session::get('home').'>
                                                <a class="waves-effect" href="/admin-user/"><i class="menu-icon fa fa-home"></i><span>Home</span></a>
                                        </li>';
                                if(Session::get('role_level')=='superadmin'){$hsl=\App\ModelMenu::all()->where('levels','0'); foreach($hsl as $rw){ $sess=$rw->sesion; echo '
                                        <li '.Session::get(''.$sess).'>
                                                <a class="waves-effect" href="/'.$rw->links.'"><i class="menu-icon fa fa-'.$rw->icons.'"></i><span>'.$rw->namamenu.'</span></a>
                                        </li>'; }
                                }else{
                                    $hsl=\App\ModelMenu::all()->where('levels','0'); foreach($hsl as $rw){ $sess=$rw->sesion; $hsl2=\App\ModelRoleMenu::all()->where('jabatanid',Session::get('jabatan_id'))->where('menuid',$rw->id); if(count($hsl2)>0){echo '
                                        <li '.Session::get(''.$sess).'>
                                                <a class="waves-effect" href="/'.$rw->links.'"><i class="menu-icon fa fa-'.$rw->icons.'"></i><span>'.$rw->namamenu.'</span></a>
                                    </li>';} }
                                } $sql="select * from m_site where id=".Session::get('site_id'); $namasite=collect(Illuminate\Support\Facades\DB::select($sql))->first()->nama_site;
                                ?>
                                
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
		<h1 class="page-title">Aplikasi Digital Workshop (Site : {{ $namasite }})</h1>
		<!-- /.page-title -->
	</div>
	<!-- /.pull-left -->
	<div class="pull-right">
		<div class="ico-item">
			<i class="ti-user"></i> {{Session::get('nama')}}
			<ul class="sub-ico-item">
				<!--<li><a href="{{ URL::to('/') }}/#">Settings</a></li>-->
				<li><a  href="{{ URL::to('/') }}/logout">Log Out</a></li>
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
					<h4 class="box-title">
                                            {{ $judul }}
                                        </h4>
                                        <script type="text/javascript" src="{{ URL::to('/') }}/disini/jquery.js"></script>
                                        <script type="text/javascript" src="{{ URL::to('/') }}/disini/bootstrap/js/bootstrap.min.js"></script>
                                        <script type="text/javascript" src="{{ URL::to('/') }}/disini/datatables/media/js/jquery.dataTables.min.js"></script>
                                        <script type="text/javascript" src="{{ URL::to('/') }}/disini/datatables/media/js/dataTables.bootstrap.min.js"></script>
                                        <script src="{{ URL::to('/') }}/js/jquery.form.js"></script>
                                        @include($content)
                                        
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-xs-12 -->
		</div>
		<!-- /.row row-inline-block small-spacing -->		
		<footer class="footer">
			<ul class="list-inline">
				<li><?php echo date('Y');?> © Pertamina Drilling.</li>
				
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
        <!-- Sparkline Chart -->
	<script src="{{ URL::to('/') }}/assets/plugin/chart/sparkline/jquery.sparkline.min.js"></script>
	<script src="{{ URL::to('/') }}/assets/scripts/chart.sparkline.init.min.js"></script>

	<!-- Flex Datalist -->
	<script src="{{ URL::to('/') }}/assets/plugin/flexdatalist/jquery.flexdatalist.min.js"></script>

	<!-- Popover -->
	<script src="{{ URL::to('/') }}/assets/plugin/popover/jquery.popSelect.min.js"></script>

	<!-- Select2 -->
	<script src="{{ URL::to('/') }}/assets/plugin/select2/js/select2.min.js"></script>

	<!-- Multi Select -->
	<script src="{{ URL::to('/') }}/assets/plugin/multiselect/multiselect.min.js"></script>

	<!-- Touch Spin -->
	<script src="{{ URL::to('/') }}/assets/plugin/touchspin/jquery.bootstrap-touchspin.min.js"></script>

	<!-- Timepicker -->
	<script src="{{ URL::to('/') }}/assets/plugin/timepicker/bootstrap-timepicker.min.js"></script>

	<!-- Colorpicker -->
	<script src="{{ URL::to('/') }}/assets/plugin/colorpicker/js/bootstrap-colorpicker.min.js"></script>

	<!-- Datepicker -->
	<script src="{{ URL::to('/') }}/assets/plugin/datepicker/js/bootstrap-datepicker.min.js"></script>

	<!-- Moment -->
	<script src="{{ URL::to('/') }}/assets/plugin/moment/moment.js"></script>

	<!-- DateRangepicker -->
	<script src="{{ URL::to('/') }}/assets/plugin/daterangepicker/daterangepicker.js"></script>

	<!-- Maxlength -->
	<script src="{{ URL::to('/') }}/assets/plugin/maxlength/bootstrap-maxlength.min.js"></script>

	<!-- Demo Scripts -->
	<script src="{{ URL::to('/') }}/assets/scripts/form.demo.min.js"></script>

        <!-- Jquery UI -->
	<script src="{{ URL::to('/') }}/assets/plugin/jquery-ui/jquery-ui.min.js"></script>
	<script src="{{ URL::to('/') }}/assets/plugin/jquery-ui/jquery.ui.touch-punch.min.js"></script>
        
	<!--<script src="{{ URL::to('/') }}/assets/scripts/main.min.js"></script>-->
        
        <script src="{{ URL::to('/') }}/assets/plugin/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="{{ URL::to('/') }}/assets/plugin/datatables/media/js/dataTables.bootstrap.min.js"></script>
        <script src="{{ URL::to('/') }}/assets/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{ URL::to('/') }}/assets/plugin/editable-table/mindmup-editabletable.js"></script>
        <script src="{{ URL::to('/') }}/assets/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js"></script>
        <script src="{{ URL::to('/') }}/assets/scripts/datatables.demo.min.js"></script>

        {{-- <script src="{{ URL::to('/') }}/assets/plugin/1jquery.dataTables.min.js"></script>
        <script src="{{ URL::to('/') }}/assets/plugin/dataTables.bootstrap.min.js"></script> --}}
        <!-- Remodal -->
	<script src="{{ URL::to('/') }}/assets/plugin/modal/remodal/remodal.min.js"></script>

	<script src="{{ URL::to('/') }}/assets/scripts/main.min.js"></script>
        <!-- Dropify -->
	<script src="{{ URL::to('/') }}/assets/plugin/dropify/js/dropify.min.js"></script>
	<script src="{{ URL::to('/') }}/assets/scripts/fileUpload.demo.min.js"></script>

	<script src="{{ URL::to('/') }}/assets/scripts/main.min.js"></script>
</body>
</html>

