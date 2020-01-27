<?php
//if($_SESSION['groupcode']==""){
//    header("location:".base_url()."login");
//}
?>
<!DOCTYPE html>
<html lang="en">


<head>

	<title>Disnakertrans</title>
        <!--<link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet"/>-->
        <link rel="stylesheet" href="{{asset('assets/styles/style.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/fonts/themify-icons/themify-icons.css')}}">
        <link rel="stylesheet" href="{{asset('assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css')}}">
	<!-- Main Styles -->

	<link rel="stylesheet" href="{{ URL::to('/') }}/assets/plugin/waves/waves.min.css">

	<link rel="stylesheet" href="{{ URL::to('/') }}/assets/plugin/sweet-alert/sweetalert.css">
	<!-- Remodal -->
	<link rel="stylesheet" href="{{ URL::to('/') }}/assets/plugin/modal/remodal/remodal.css">
	<link rel="stylesheet" href="{{ URL::to('/') }}/assets/plugin/modal/remodal/remodal-default-theme.css">

	<!-- Data Tables -->

        <style type="text/css">@import url("<?php echo URL::to('/');?>/assets/plugin/datatables/media/css/dataTables.bootstrap.min.css");</style>

        <style type="text/css">@import url("<?php echo URL::to('/');?>/assets/plugin/datatables/extensions/Responsive/css/responsive.bootstrap.min.css");</style>

        <!-- Touch Spin -->
	<link rel="stylesheet" href="{{ URL::to('/') }}/assets/plugin/touchspin/jquery.bootstrap-touchspin.min.css">

	<!-- Colorpicker -->
	<link rel="stylesheet" href="{{ URL::to('/') }}/assets/plugin/colorpicker/css/bootstrap-colorpicker.min.css">

	<!-- Datepicker -->
	<link rel="stylesheet" href="{{ URL::to('/') }}/assets/plugin/datepicker/css/bootstrap-datepicker.min.css">
        <!-- DateRangepicker -->
	<link rel="stylesheet" href="{{ URL::to('/') }}/assets/plugin/daterangepicker/daterangepicker.css">

	<!-- Dropify -->
	<link rel="stylesheet" href="{{asset('assets/plugin/dropify/css/dropify.min.css')}}">

        <!-- Jquery UI -->
	<link rel="stylesheet" href="{{ URL::to('/') }}/assets/plugin/jquery-ui/jquery-ui.min.css">
	<link rel="stylesheet" href="{{ URL::to('/') }}/assets/plugin/jquery-ui/jquery-ui.structure.min.css">
	<link rel="stylesheet" href="{{ URL::to('/') }}/assets/plugin/jquery-ui/jquery-ui.theme.min.css">
	<link rel="stylesheet" href="{{ URL::to('/') }}/assets/plugin/sweet-alert/sweetalert.css">


</head>

<body>
<div class="main-menu">
	<header class="header">
		<a href="index.html" class="logo">
                    <img href="{{ URL::to('/') }}/img/logodki.png" alt="" title="" />
                </a>
		<button type="button" class="button-close fa fa-times js__menu_close"></button>
	</header>
	<!-- /.header -->
	<div class="content">

		<div class="navigation">

			<ul class="menu js__accordion">
                                <?php
                                // foreach ($listmenu as $dt){
                                //     echo '
                                //         <li>
                                //                 <a class="waves-effect" href="'.URL::to('/admin-user').'/'.$dt->links.'"><i class="menu-icon ti-user"></i><span>'.$dt->namamenu.'</span></a>
                                //         </li>';
								// }
								?>
								{{-- MENU FOR ALL ADMIN --}}
								<li>
										<a class="waves-effect" href="<?= URL::to('/admin-user')?>"><i class="menu-icon fa fa-home"></i><span>Dashboard</span></a>
								</li>

								{{-- MENU FOR SUPER ADMIN / KADIS --}}
								@if (Session::get('role_level') == 'superadmin' || Session::get('role_level') == 'kepala_dinas')
									<li>
											<a class="waves-effect" href="<?= URL::to('/admin-user')?>/petugas-management"><i class="menu-icon fa fa-user"></i><span>Petugas Management</span></a>
									</li>
									<li>
											<a class="waves-effect" href="<?= URL::to('/admin-user')?>/config-role"><i class="menu-icon fa fa-gears"></i><span>Role User</span></a>
									</li>
								@endif
								@if (Session::get('role_level') == 'superadmin' || Session::get('role_level') == 'kepala_dinas' || strpos(Session::get('role_level'), 'ppkd') !== false)
									<li>
										<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-file"></i><span>Master Pelatihan</span><span class="menu-arrow fa fa-angle-down"></span></a>
										<ul class="sub-menu js__content">
											<li><a href="<?= URL::to('/admin-user')?>/pelatihan-kerja/listdata">List</a></li>
											<li><a href="<?= URL::to('/admin-user')?>/pelatihan-kerja/seleksi">Seleksi</a></li>
											<li><a href="<?= URL::to('/admin-user')?>/pelatihan-kerja/penilaian">penilaian</a></li>
                                            <li>
                                                <a class="waves-effect" href="/admin-user/output"><i class="menu-icon fa fa-config"></i><span>Config Output</span></a>
                                            </li>
                                        </ul>
									</li>
								@endif
								<li>
										<a class="waves-effect" href="/admin-user/pengaduan"><i class="menu-icon fa fa-bullhorn"></i><span>Pengaduan</span></a>
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
		<h1 class="page-title">Halaman Administrasi Disnakertrans DKI Jakarta</h1>
		<!-- /.page-title -->
	</div>
	<!-- /.pull-left -->
	<div class="pull-right">
                <div class="ico-item">
			<i class="ti-user"></i> {{Session::get('nama')}}
			<ul class="sub-ico-item">
                                <li><a  href="#"  data-toggle="modal" data-target="#boostrapModal-2">Ganti Password</a></li>
                                <li><a  href="#" onclick="jvlogout();">Log Out</a></li>

			</ul>

		</div>
	</div>
	<!-- /.pull-right -->
</div>
<!-- /#message-popup -->
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">
                                            @yield('title') 
                                        </h4>
                                        
                                        @yield('content')
                                        
                                    
                                        
                        
				</div>
				<!-- /.box-content -->
			</div>
		</div>
		<!-- /.row small-spacing -->
		<footer class="footer">
			<ul class="list-inline">
				<li>{{ date('Y') }} © Disnakertrans DKI Jakarta.</li>
			</ul>
		</footer>
	</div>
</div> <!-- End Wrapper -->

    <script>
    $('#namadiklat').val('');
    </script>
<div class="modal fade"  id="boostrapModal-2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Form Ganti Password</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
                                        <label for="inputName" class="control-label">Password Lama  </label>
                                        <input type="password" onblur="cekpasslama();" class="form-control" id="passlama" name="passlama"  placeholder="Masukan Password Lama ..."  required >
                                </div>
                                <div class="form-group">
                                        <label for="inputName" class="control-label">Password Baru  </label>
                                        <input type="password" class="form-control" id="passbaru" name="passbaru"  placeholder="Masukan Password Baru ..." required >
                                </div>
                                <div class="form-group">
                                        <label for="inputName" class="control-label">Confirm Password Baru  </label>
                                        <input type="password" class="form-control" onblur="confpassbaru();" id="confpassbaru" name="confpassbaru"  placeholder="Masukan Password Baru ..."  required >
                                </div>

                                <div class="modal-footer">
                                        <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">Close</button>
                                        <button type="button" onclick="savepass();" class="btn btn-primary btn-sm waves-effect waves-light"  data-dismiss="modal">Update Password</button>
                                </div>
                            <script>
                            function cekpasslama(){
                                var param={};
                               param['passlama']=$('#passlama').val();
                                $.post('login/cekpass',param,function(data){
                                    if($.trim(data)=='0H'){
                                        $('#passlama').val('');
                                        alert('Password anda salah');return false;
                                    }
                                });
                            }
                            function savepass(){
                                var param={};
                                if($('#passlama').val()==''){
                                    alert('Password lama harus diisi');return false;
                                }
                                if($('#passbaru').val()==''){
                                    alert('Password baru harus diisi');return false;
                                }
                                if($('#confpassbaru').val()==''){
                                    alert('Password baru harus diisi');return false;
                                }

                                if($('#passbaru').val()!=$('#confpassbaru').val()){
                                    $('#confpassbaru').val('');
                                    alert('Confirm Password anda tidak sama!!');return false;

                                }
                                param['confpassbaru']=$('#confpassbaru').val();
                                $.post('login/savepass',param,function(data){
                                    alert('Password telah terupdate');
                                });
                            }
                            function confpassbaru(){
                                if($('#passbaru').val()!=$('#confpassbaru').val()){
                                    $('#confpassbaru').val('');
                                    alert('Confirm Password anda tidak sama!!');return false;

                                }
                            }

                            </script>
                        </div>
                </div>
        </div>
</div>

</body>
@yield('script')
<!-- Mirrored from demo.ninjateam.org/html/spaceX/tables-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Aug 2017 15:39:03 GMT -->
</html>


<script type="text/javascript" src="{{ URL::to('/') }}/disini/jquery.js"></script>
                                        <script type="text/javascript" src="{{ URL::to('/') }}/disini/bootstrap/js/bootstrap.min.js"></script>
                                        <script type="text/javascript" src="{{ URL::to('/') }}/disini/datatables/media/js/jquery.dataTables.min.js"></script>
										<script type="text/javascript" src="{{ URL::to('/') }}/disini/datatables/media/js/dataTables.bootstrap.min.js"></script>
										
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
	<script src="{{ URL::to('/') }}/assets/plugin/dropify/js/dropify.min.js"></script>

        <!-- Jquery UI -->
	<script src="{{ URL::to('/') }}/assets/plugin/jquery-ui/jquery-ui.min.js"></script>
	<script src="{{ URL::to('/') }}/assets/plugin/jquery-ui/jquery.ui.touch-punch.min.js"></script>
        
	<script src="{{ URL::to('/') }}/assets/scripts/main.min.js"></script>
        
        <script src="{{ URL::to('/') }}/assets/plugin/datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="{{ URL::to('/') }}/assets/plugin/datatables/media/js/dataTables.bootstrap.min.js"></script>
		<script src="{{ URL::to('/') }}/assets/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
		<script src="{{ URL::to('/') }}/assets/plugin/editable-table/mindmup-editabletable.js"></script>
		<script src="{{ URL::to('/') }}/assets/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js"></script>
		<script src="{{ URL::to('/') }}/assets/scripts/datatables.demo.min.js"></script>
		<script src="{{ URL::to('/') }}/assets/plugin/sweet-alert/sweetalert.min.js"></script>

		{{-- <script src="{{ URL::to('/') }}/assets/plugin/1jquery.dataTables.min.js"></script>
		<script src="{{ URL::to('/') }}/assets/plugin/dataTables.bootstrap.min.js"></script> --}}
        
<script>
$(window).on('load', function() {
    // your code here
});
$(document).ready(function(){
	$('#kis_updating').DataTable({
    "searching": true,
    "processing": true
	});  
	
})	
function jvlogout(){
	window.open('<?php echo URL::to('/');?>/logout','_self');
}  

</script>   