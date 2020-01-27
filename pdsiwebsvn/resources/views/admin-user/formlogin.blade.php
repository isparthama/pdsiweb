<html lang="en">
<head>
    <?php 
//    $_SESSION['n1a'] = rand(1,20); //mendapatkan nilai 1
//    $_SESSION['n2a'] = rand(1,20); //mendapatkan nilai 2
//    $_SESSION['hasila'] = $_SESSION['n1a']+$_SESSION['n2a'];
    ?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="assets/styles/style.min.css">
	<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">
        <link rel="shortcut icon" href="img/fav.png">

</head>

<body>
<script language="javascript" type="text/javascript">

function validate(evt){

    var e = evt || window.event;
    var key = e.keyCode || e.which;
    if((key <48 || key >57) && !(key ==8 || key ==9 || key ==13  || key ==37  || key ==39 || key ==46)  ){
        e.returnValue = false;
        if(e.preventDefault)e.preventDefault();
    }
}
function jvCek(id){
    if(id=='nik'){
        if($('#'+id).val().length!=16){
            alert('Jumlah Karakter harus 16 Digit!');
            $('#'+id).val('');
            $('#'+id).focus();
            return false;
        }
    }
}
</script>
<div id="single-wrapper">
    <form action="{{ URL::to('/') }}/validate-admin" method="post" class="frm-single">
                @csrf
		<div class="inside">
			<div class="title">
                            <img src="img/logodki.png" width='100' height='30'><br>
                            <span style="font-size: small;"></span>
			<div class="frm-title">Aplikasi Disnakertrans DKI Jakarta</div>
                        
                        <div class="frm-input"><input id="username" type="text"  name="username" placeholder="username anda" class="frm-inp"><i class="fa fa-user frm-ico"></i></div>
			<div class="frm-input"><input type="password" name="password" placeholder="Password anda" class="frm-inp"><i class="fa fa-lock frm-ico"></i></div>
			    <?php
                            //if(!empty($_SESSION['gagal']) ){
                            ?>
<!--                        <div class="frm-input">
                        
                            <div class="alert alert-danger alert-dismissible" role="alert"> 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <span style="font-size: 14px;"><strong>Maaf !</strong> <?php 
                                    //echo $_SESSION['gagal'] ?> </span>
                            </div>
                        </div>-->
                            <?php
                            //}
                            ?>
                       
<!--			<div class="frm-input">
                            <?php 
                            //echo "<small>Hitung</small>&nbsp;&nbsp;&nbsp;&nbsp; ".$_SESSION['n1a']." + ".$_SESSION['n2a'];?> <br>
                            <input type="text" placeholder="masukan hasil jumlah" maxlength="3"   name="captcha" class="frm-inp" required>
                        </div>-->
                        <button type="submit" class="frm-submit"><span style="font-size: small;">Login</span><i class="fa fa-arrow-circle-right"></i></button>
                        
                            <a href="{{ URL::to('/') }}/registrasi-user" class="a-link"><i class="fa fa-key"></i>
                            <span style="font-size: small;">Register</span>
                        </a> 
                        
			<div class="frm-footer">
                            <span style="font-size: small;">Copyright © {{ date('Y') }} | Disnakertrans DKI Jakarta</span>
                        </div>
		</div>
	</form>
</div><!--/#single-wrapper -->

        <script src="assets/scripts/jquery.min.js"></script>
	<script src="assets/scripts/modernizr.min.js"></script>
	<script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugin/nprogress/nprogress.js"></script>
	<script src="assets/plugin/waves/waves.min.js"></script>

	<script src="assets/scripts/main.min.js"></script>
</body>
</html>