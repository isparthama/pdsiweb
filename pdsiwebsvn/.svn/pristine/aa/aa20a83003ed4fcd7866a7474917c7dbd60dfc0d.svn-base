<script language="javascript" type="text/javascript">
        (function() {
            $('.form1').ajaxForm({
                beforeSubmit: function() {
                    if($('#statusnya').val()==1){
                        $('#submit').prop('disabled', true);
                    }else{
                        $('#reject').prop('disabled', true);
                    }
                    
                    
                    
                    
                },
                complete: function(xhr) {
//                    alert($.trim(xhr.responseText));
                    //$('#alert').css('display','block');
                    window.open('{{ URL::to('/') }}/admin-user/serah-terima-list/0','_self');
                        
                        
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
        function jsbutton(x){
            $('#statusnya').val(x);
        }
</script>

<form id="form1" enctype="multipart/form-data"  class="form1" method="post" action="{{ URL::to('/').'/admin-user/serah-terima/storeapprove' }}">
    {{ csrf_field() }}
    

<div class="form-group row">
    <label  for="inputName" class="col-sm-4 col-form-label text-left">Nomor </label>
    <div class="col-sm-6">
        <input type="hidden" name="id" value="{{ $row==""?"":$row->id }}">
        <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="form_no" value="{{ $row==""?"":$row->form_no }}" data-error="tess" placeholder="auto" readonly   >
    </div>
</div>
<div class="form-group row">
    <label  for="inputName" class="col-sm-4 col-form-label text-left">Hari </label>
    <div class="col-sm-6">
        <select disabled="true" id="hari" name="hari">
        <?php
        $hr['senin']='senin';
        $hr['selasa']='selasa';
        $hr['rabu']='rabu';
        $hr['kamis']='kamis';
        $hr['jumat']='jumat';
        $hr['sabtu']='sabtu';
        $hr['minggu']='minggu';
        foreach ($hr as $x=>$y){
            if($row==""){
                echo "<option>".$y."</option>";
            }else{
                echo "<option ".($row->hari==$x?"selected ":"").">".$y."</option>";
            }
        }
        
        ?>
        </select>
    </div>
</div>
<div class="form-group row">
    <label  for="inputName" class="col-sm-4 col-form-label text-left">Pengirim </label>
    <div class="col-sm-6">
        
        <input type="text" disabled="true" maxlength="400" class="form-control" id="nama_kelas" name="pengirim" value="{{ $row==""?"":$row->pengirim }}" data-error="tess"  >
    </div>
</div>
<div class="form-group row">
    <label  for="inputName" class="col-sm-4 col-form-label text-left">Driver </label>
    <div class="col-sm-6">
        
        <input type="text" disabled="true" maxlength="400" class="form-control" id="nama_kelas" name="driver" value="{{ $row==""?"":$row->driver }}" data-error="tess"  >
    </div>
</div>
<div class="form-group row">
    <label  for="inputName" class="col-sm-4 col-form-label text-left">No Polisi Kendaraan </label>
    <div class="col-sm-6">
        
        <input type="text" disabled="true" maxlength="400" class="form-control" id="nama_kelas" name="nopolisi" value="{{ $row==""?"":$row->nopolisi }}" data-error="tess"  >
    </div>
</div>
<div class="form-group row">
    <label  for="inputName" class="col-sm-4 col-form-label text-left">Nomor WO </label>
    <div class="col-sm-6">
        
        <input type="text" disabled="true" maxlength="400" class="form-control" id="nama_kelas" name="wo_no" value="{{ $row==""?"":$row->wo_no }}" data-error="tess"  >
    </div>
</div>
<div class="form-group row">
    <label  for="inputName" class="col-sm-4 col-form-label text-left">tanggal </label>
    <div class="col-sm-6">
        
        <input type="date" disabled="true" maxlength="400" class="form-control" id="nama_kelas" name="tanggal" value="{{ $row==""?"":date('Y-m-d',strtotime($row->tanggal)) }}" data-error="tess"  >
    </div>
</div>
<div class="form-group row">
    <label  for="inputName" disabled="true" class="col-sm-4 col-form-label text-left">Penerima</label>
    <div class="col-sm-6">
        
        <input type="text" disabled="true" maxlength="400" class="form-control" id="nama_kelas" name="penerima" value="{{ $row==""?"":$row->penerima }}" data-error="tess"  >
    </div>
</div>
<div class="form-group row">
    <label  for="inputName" class="col-sm-4 col-form-label text-left">Jam </label>
    <div class="col-sm-6">
        
        <input type="text" disabled="true" maxlength="400" class="form-control" id="nama_kelas" name="terima_jam" value="{{ $row==""?"":$row->terima_jam }}" data-error="tess"  >
    </div>
</div>

    

<div class="form-group row">
    <label  for="inputName" class="col-sm-10 col-form-label text-left"><input  disabled="true" value="1"  type="checkbox" <?php echo $row==""?"":($row->wo_tandatangan_sts==1?"checked":"") ?> name="wo_tandatangan_sts">  WO ada dan sudah ditandatangani pejabat berwenang</label>
    
</div>
<div class="form-group row">
    <label  for="inputName" class="col-sm-4 col-form-label text-left">Klarifikasi </label>
    <div class="col-sm-6">
        
        <input type="text" disabled="true" maxlength="400" class="form-control" id="nama_kelas" name="wo_tandatangan_ket" value="{{ $row==""?"":$row->wo_tandatangan_ket }}" data-error="tess"  >
    </div>
</div>
<div class="form-group row">
    <label  for="inputName" class="col-sm-10 col-form-label text-left"><input disabled="true"  value="1" type="checkbox" <?php echo $row==""?"":($row->wo_peralatan_sts==1?"checked":"") ?> name="wo_peralatan_sts">  WO dan Peralatan sesuai</label>
    
</div>
<div class="form-group row">
    <label  for="inputName" class="col-sm-4 col-form-label text-left">Klarifikasi </label>
    <div class="col-sm-6">
        
        <input type="text" disabled="true" maxlength="400" class="form-control" id="nama_kelas" name="wo_peralatan_ket" value="{{ $row==""?"":$row->wo_peralatan_ket }}" data-error="tess"  >
    </div>
</div>
<div class="form-group row">
    <label  for="inputName" class="col-sm-10 col-form-label text-left"><input disabled="true"  value="1" type="checkbox" <?php echo $row==""?"":($row->wo_instruksikerja_sts==1?"checked":"") ?> name="wo_instruksikerja_sts">  Instruksi kerja/kerusakan ada di WO</label>
    
</div>
<div class="form-group row">
    <label  for="inputName" class="col-sm-4 col-form-label text-left">Klarifikasi </label>
    <div class="col-sm-6">
        
        <input type="text" disabled="true" maxlength="400" class="form-control" id="nama_kelas" name="wo_instruksikerja_ket" value="{{ $row==""?"":$row->wo_instruksikerja_ket }}" data-error="tess"  >
    </div>
</div>


<div class="form-group row">
    <label  for="inputName" class="col-sm-4 col-form-label text-left">No Routing Slip </label>
    <div class="col-sm-6">
        
        <input type="text" disabled="true" maxlength="400" class="form-control" readonly  id="nama_kelas" name="routingslip_no" value="{{ $row==""?"":$row->routingslip_no }}" data-error="tess" placeholder="auto" >
    </div>
</div>

    
    

<div class="form-group row">
    <label  for="inputName" class="col-sm-4 col-form-label text-left">Nomor Registrasi </label>
    <div class="col-sm-6">
        
        <input type="text" disabled="true" maxlength="400" class="form-control" id="nama_kelas" name="register_no" readonly value="{{ $row==""?"":$row->register_no }}" data-error="tess"  placeholder="auto"  >
    </div>
</div>
<div class="form-group row">
    <label  for="inputName" class="col-sm-4 col-form-label text-left">Deskripsi Pekerjaan </label>
    <div class="col-sm-6">
        
        <input type="text" disabled="true" maxlength="400" class="form-control" id="nama_kelas" name="register_desc" value="{{ $row==""?"":$row->register_desc }}" data-error="tess"  >
    </div>
</div>
<div class="form-group row">
    <label  for="inputName" class="col-sm-4 col-form-label text-left">Nama Pelanggan </label>
    <div class="col-sm-6">
        
        <input type="text" disabled="true" maxlength="400" class="form-control" id="nama_kelas" name="nama_pelanggan" value="{{ $row==""?"":$row->nama_pelanggan }}" data-error="tess"  >
    </div>
</div>

    <input type="hidden" name="statusnya" id="statusnya" value="0">
<div class="form-group">
    <button type="button"  onclick="window.open('/admin-user/serah-terima-list/0','_self')" class="btn btn-primary waves-effect waves-light" ><i class="fa fa-rotate-left" aria-hidden="true"></i></button>
    
</div>

</form>




