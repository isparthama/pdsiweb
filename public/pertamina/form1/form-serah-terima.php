<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Registration">
    <meta name="author" content="Registration">
    <meta name="keywords" content="Registration">

    <!-- Title Page-->
    <title>Form</title>
    <link rel="icon" href="../images/pavicon.png" type="image/x-icon" />
    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
 
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    
 
    
    
    
</head>

<body>

    <div class="page-wrapper row p-t-10 p-b-20 font-robo">
        <div class="container">
                    <div class="card card-4">
            
                <div class="card-body">
                <div class="container">
                <div class="title-bar">
                    <h2 class="title">Form Serah Terima</h2>
                    </div>
                    <form method="POST">
                        <div class="row row-space">
                            <div class="kol-2">
                            <div class="input-group2">
                            <label class="label">Nomor Form :</label>
                             <input class="input--style-4" type="no_form" name="nopol">
                            </div> 
                            </div>
                        
                        
                            <div class="kol-2">
                                <div class="input-group">
                                    <label class="label">Nomor WO : </label>
                                    <input class="input--style-4" type="nomor_wo" name="nomor_wo">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="kol-2">
                            <div class="input-group2">
                            <label class="label">Hari :</label>
                           
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="subject">
                                    <option disabled="disabled" selected="selected">Pilih</option>
                                    <option>Senin</option>
                                    <option>Selasa</option>
                                    <option>Rabu</option>
                                    <option>Kamis</option>
                                    <option>Jum'at</option>
                                    <option>Sabtu</option>
                                    <option>Minggu</option>
                                    
                                </select>
                            <div class="select-dropdown"></div>
                            </div>
                            </div> 
                            </div>
                            
                            <div class="kol-2">
                                <div class="input-group">
                                    <label class="label">Tanggal : </label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="tanggal" name="tanggal">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                                
                        </div>
                        <div class="row row-space">
                            <div class="kol-2">
                                <div class="input-group2">
                                    <label class="label">Pengirim :</label>
                                    <input class="input--style-4" type="pengirim" name="pengirim">
                                </div>
                            </div>
                            <div class="kol-2">
                                <div class="input-group">
                                    <label class="label">Penerima :</label>
                                    <input class="input--style-4" type="penerima" name="penerima">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row row-space">
                        <div class="kol-2">
                        <div class="input-group2">
                            <label class="label">Driver :</label>
                             <input class="input--style-4" type="driver" name="driver">
                        </div> 
                        </div>
                        
                        
                        <div class="kol-2">
                                <div class="input-group">
                                    <label class="label">Jam :</label>
                                    <input class="input--style-4" type="penerima" name="penerima">
                                </div>
                        </div>
                         </div>
                        
                        <div class="kol-2">
                        <div class="input-group">
                            <label class="label">No. Pol Kendaraan :</label>
                             <input class="input--style-4" type="nopol" name="nopol">
                        </div> 
                        </div>
                        
                        <div class="kol-2">
                        <div class="input-group">
                        <div class="p-t-10">
                                        
                        <label class="radio-container"><span class="text-content">WO ada dan sudah ditandatangani pejabat berwenang</span>
                       <input type="checkbox"  name="klarifikasi">
                        <span class="checkmark"></span>
                        </label>
                        
                        </div>
                        
                        
                        <label class="label">Klarifikasi :</label>
                        <input class="input--style-4" type="klarifikasi" name="klarifikasi">
                        </div> 
                        </div>
                        
                        <div class="kol-2">
                        <div class="input-group">
                        <div class="p-t-10">
                                        
                        <label class="radio-container"><span class="text-content">WO dan Peralatan sesuai</span>
                        <input type="checkbox"  name="klarifikasi">
                        <span class="checkmark"></span>
                        </label>
                        </div>
                        <label class="label">Klarifikasi :</label>
                        <input class="input--style-4" type="klarifikasi" name="klarifikasi">
                        </div> 
                        </div>
                        
                        <div class="kol-2">
                        <div class="input-group">
                        <div class="p-t-10">
                                        
                        <label class="radio-container"><span class="text-content">Instruksi kerja/kerusakan ada di WO</span>
                        <input type="checkbox"  name="klarifikasi">
                        <span class="checkmark"></span>
                        </label>
                        </div>
                        <label class="label">Klarifikasi :</label>
                        <input class="input--style-4" type="klarifikasi" name="klarifikasi">
                        </div> 
                        </div>
                        
                        <div class="kol-2">
                                <div class="input-group">
                                    <label class="label">Nomor Register :</label>
                                    <input class="input--style-4" type="text" name="nomor_reg" placeholder="TK-">
                                </div>
                        </div>
                        
                        <div class="kol-2">
                                <div class="input-group">
                                    <label class="label">Deskripsi pekerjaan :</label>
                                    <input class="input--style-4" type="deskripsi" name="deskripsi">
                                </div>
                        </div>
                        
                        <div class="kol-2">
                                <div class="input-group">
                                    <label class="label">Nama Pelanggan : </label>
                                    <input class="input--style-4" type="nama_pelanggan" name="nama_pelanggan">
                                </div>
                        </div>
                        
                         <div class="kol-2">
                                <div class="input-group">
                                    <label class="label">No Routing Slip :</label>
                                    <input class="input--style-4" type="text" name="nomor_routing" placeholder="RS-">
                                </div>
                        </div>
                        
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--red" type="reset">Batal</button> <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->