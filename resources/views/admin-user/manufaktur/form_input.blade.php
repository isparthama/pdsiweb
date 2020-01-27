<script language="javascript" type="text/javascript">
        (function() {
            $('.form1').ajaxForm({
                beforeSubmit: function() {
                    $('#submit').prop('disabled', true);
                },
                complete: function(xhr) {
                    alert('Data Telah terupdate');
                    
                    $('#submit').prop('disabled', false);
                    //window.open('{{ URL::to('/') }}/admin-user/produksi-list/0','_self');
                        
                        
                }
             });
             
        })();
        function validate(evt){
            var e = evt || window.event;
            var key = e.keyCode || e.which;
            if((key <48 || key >57) && !(key ==8 || key ==9 || key ==13  || key ==37  || key ==39 || key ==46)  ){
                e.returnValue = false;
                if(e.preventDefault)e.preventDefault();
            }
        }
</script>
<form id="form1" enctype="multipart/form-data"  class="form1" method="post" action="{{ $row==""?URL::to('/').'/admin-user/produksi-store':URL::to('/').'/admin-user/produksi-update' }}">
                {{ csrf_field() }}
<ul class="nav nav-tabs" id="myTabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">MDR</a></li>
            
    </ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade active in" role="tabpanel" id="home" aria-labelledby="home-tab">

            


            <div class="form-group row">
                <label  for="inputName" class="col-sm-4 col-form-label text-left">Nomor Routing Slip </label>
                <div class="col-sm-6">
                    <input type="hidden" id="routingslip_no_jns" value="5">
                    <input type="text" maxlength="400" class="form-control" id="routingslip_no" readonly name="routingslip_no" value="{{ $row==""?"":$row->routingslip_no }}" data-error="tess"     >
                </div>
            </div>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-4 col-form-label text-left">Nomor WO </label>
                <div class="col-sm-6">
                    <input  readonly="true" type="text" maxlength="400" class="form-control" id="wo" name="wo_no" value="{{ $row==""?"":$row->wo_no }}" data-error="tess"     >
                </div>
            </div>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-4 col-form-label text-left">Nomor Register </label>
                <div class="col-sm-6">
                    <input readonly="true" type="text" maxlength="400" class="form-control" id="register" name="register_no" value="{{ $row==""?"":$row->register_no }}" data-error="tess"     >
                </div>
            </div>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-4 col-form-label text-left">User </label>
                <div class="col-sm-6">
                    <input readonly="true" type="text" maxlength="400" class="form-control" id="user" name="create_user" value="{{ $row==""?"":$row->nama_pelanggan }}" data-error="tess"     >
                </div>
            </div>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-4 col-form-label text-left">Nomor MDR </label>
                <div class="col-sm-6">
                    <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="form_no" value="{{ $row==""?"":$row->mdr_no }}" data-error="tess"  placeholder="auto" readonly   >
                </div>
            </div>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-4 col-form-label text-left">Tanggal </label>
                <div class="col-sm-6">

                    <input type="date" maxlength="400" readonly class="form-control" id="nama_kelas" name="tanggal" value="{{ $row==""?date('Y-m-d'):date('Y-m-d',strtotime($row->mdr_tgl)) }}" data-error="tess"  >
                </div>
            </div>
            
            <div class="form-group row">
                <label  for="inputName" class="col-sm-12 col-form-label text-left">MDR harus meliputi sebagai berikut : </label>

            </div>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-12 col-form-label text-left">
                    <input value="1"  type="checkbox" <?php echo $row==""?"":($row->form_serah_terima_sts==1?"checked":"") ?> name="form_serah_terima_sts"> WO dan  Form serah terima <?php if($row->form_serah_terima_sts==1){?><a href="/admin-user/zip-mdr-detail/{{ $row->routingslip_no }}/serahterima" target="blank"><i class="ico icon-download"></i></a><?php } ?><br>
                    <input value="1"  type="checkbox" <?php echo $row==""?"":($row->form_inspeksi_sts==1?"checked":"") ?> name="form_inspeksi_sts">  inspeksi dan rencana perbaikan <?php if($row->form_inspeksi_sts==1){?><a href="/admin-user/zip-mdr-detail/{{ $row->routingslip_no }}/inspeksi" target="blank"><i class="ico icon-download"></i></a><?php } ?><br>
                    <input value="1"  type="checkbox" <?php echo $row==""?"":($row->copy_standar_sts==1?"checked":"") ?> name="copy_standar_sts">  Copy standar yang dipakai (TKO, TKI, API, ASTM, ANSI, WPS, dll) <?php if($row->copy_standar_sts==1){?><a href="/admin-user/zip-mdr-detail/{{ $row->routingslip_no }}/copy" target="blank"><i class="ico icon-download"></i></a><?php } ?><br>
                    
                    <input value="1"  type="checkbox" <?php echo $row==""?"":($row->sertifikat_personil_sts==1?"checked":"") ?> name="sertifikat_personil_sts">  Sertifikat personil jika diperlukan (welder)<?php if($row->sertifikat_personil_sts==1){?><a href="/admin-user/zip-mdr-detail/{{ $row->routingslip_no }}/personil" target="blank"><i class="ico icon-download"></i></a><?php } ?><br>
                    <input value="1"  type="checkbox" <?php echo $row==""?"":($row->sertifikat_pengetesan_sts==1?"checked":"") ?> name="sertifikat_pengetesan_sts">  Sertifikat hasil pengetesan jika diperlukan<br>
                    <input value="1"  type="checkbox" <?php echo $row==""?"":($row->perhitungan_biaya_perbaikan_sts==1?"checked":"") ?> name="perhitungan_biaya_perbaikan_sts">  Perhitungan biaya perbaikan<?php if($row->perhitungan_biaya_perbaikan_sts==1){?><a href="/admin-user/pdf-realisasi/{{ $row->routingslip_no }}" target="blank"><i class="ico icon-download"></i></a><?php } ?><br>
                    
                        <input value="1"  type="checkbox" <?php echo $row==""?"":($row->berita_acara_sts==1?"checked":"") ?> name="berita_acara_sts">  Berita Acara Pengetesan dan Selesai Pekerjaan yang telah ditandatangani kedua belah pihak <?php if($row->berita_acara_sts==1){?><a href="/admin-user/zip-mdr-detail/{{ $row->routingslip_no }}/finishing" target="blank"><i class="ico icon-download"></i></a><?php } ?><br>
                    <input value="1"  type="checkbox" <?php echo $row==""?"":($row->formulir_pengiriman_sts==1?"checked":"") ?> name="formulir_pengiriman_sts">  Formulir pengiriman selesai pekerjaan <?php if($row->formulir_pengiriman_sts==1){?><a href="/admin-user/zip-mdr-detail/{{ $row->routingslip_no }}/serahterimakeluar" target="blank"><i class="ico icon-download"></i></a><?php } ?><br>
                    
                    
                    
                </label>

            </div>
            

    </div>
</div>
    

<div class="form-group">
    <button type="button" onclick="window.open('/admin-user/mdr-print-pdf/{{ $row->routingslip_no }}','_target')" class="btn btn-red" style="background-color: #c12e2a;color: white;font-weight: bold;"><i class="ico icon-file-pdf"></i></button>
    <button type="button" onclick="window.open('/admin-user/zip-mdr/{{ $row->routingslip_no }}','_self')" class="btn btn-red" style="background-color: #F89406;color: white;font-weight: bold;"><i class="ico icon-download"></i></button>
 
    <button type="button" onclick="window.open('/admin-user/mdr-list/3','_self')" class="btn btn-primary waves-effect waves-light" ><i class="fa fa-rotate-left" aria-hidden="true"></i></button>

</div>


</form>



