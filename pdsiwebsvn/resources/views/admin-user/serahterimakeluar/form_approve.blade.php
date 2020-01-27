<script language="javascript" type="text/javascript">
        (function() {
            $('.form1').ajaxForm({
                beforeSubmit: function() {
                    $('#submit').prop('disabled', true);
                },
                complete: function(xhr) {
//                    alert($.trim(xhr.responseText));
                    //$('#alert').css('display','block');
                    $('#submit').prop('disabled', false);
                    window.open('{{ URL::to('/') }}/admin-user/serahterimakeluar-list/0','_self');
                        
                        
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

<form id="form1" enctype="multipart/form-data"  class="form1" method="post" action="{{ URL::to('/').'/admin-user/serahterimakeluar-store-approve' }}">
    {{ csrf_field() }}
    

<div class="form-group row">
    <label  for="inputName" class="col-sm-4 col-form-label text-left">Nomor </label>
    <div class="col-sm-6">
        <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="form_no" value="{{ $row==""?"":$row->kirim_no }}" data-error="tess" placeholder="auto" readonly   >
    </div>
</div>
<div class="form-group row">
    <label  for="inputName" class="col-sm-4 col-form-label text-left">Tanggal </label>
    
    <div class="col-sm-6">
        <input type="date" maxlength="400" class="form-control" id="nama_kelas" name="tanggal" value="{{ $row==""?date('Y-m-d'):date('Y-m-d',strtotime($row->kirim_tgl)) }}" data-error="tess"  >
    </div>
</div>
<div class="form-group row">
    <label  for="inputName" class="col-sm-4 col-form-label text-left">Nomor WO </label>
    <div class="col-sm-6">
        
        <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="wo_no" value="{{ $row==""?"":$row->wo_no }}" data-error="tess"  >
    </div>
</div>

<div class="form-group row">
    <label  for="inputName" class="col-sm-10 col-form-label text-left"><input value="1"  type="checkbox" <?php echo $row==""?"":($row->klarifikasi_sts==1?"checked":"") ?> name="klarifikasi_sts">  Peralatan sudah selesai diperbaiki sesuai permintaan</label>
    
</div>
<div class="form-group row">
    <label  for="inputName" class="col-sm-4 col-form-label text-left">Klarifikasi </label>
    <div class="col-sm-6">
        
        <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="klarifikasi_ket" value="{{ $row==""?"":$row->klarifikasi_ket }}" data-error="tess"  >
    </div>
</div>
<div class="form-group row">
    <label  for="inputName" class="col-sm-10 col-form-label text-left"><input  value="1" type="checkbox" <?php echo $row==""?"":($row->mdr_sts==1?"checked":"") ?> name="mdr_sts">  MDR lengkap dan sesuai</label>
    
</div>
<div class="form-group row">
    <label  for="inputName" class="col-sm-4 col-form-label text-left">Klarifikasi </label>
    <div class="col-sm-6">
        
        <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="mdr_ket" value="{{ $row==""?"":$row->mdr_ket }}" data-error="tess"  >
    </div>
</div>
<div class="form-group row">
    <label  for="inputName" class="col-sm-3 col-form-label text-left">Serah Terima Hasil Perbaikan</label>


    <div class="col-sm-3">
    <select name="routingslip_status_desc_krm">
        <?php
        $st= explode("-", $row->routingslip_status_desc_krm);
        ?>
            <option {{ $st[0]==0?"selected":"" }} value="0">Open</option>
            <option {{ $st[0]==1?"selected":"" }} value="1">Approve</option>
            <option {{ $st[0]==2?"selected":"" }} value="2">Not Approve</option>

        </select>
    </div>
    <div class="col-sm-6">
        <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="keterangan_krm" value="{{ $row->keterangan_krm }}" placeholder="keterangan" >
    </div>

</div>

    

<div class="form-group">
    <button type="submit" id="submit" onclick="jsbutton('1');" class="btn btn-primary waves-effect waves-light" ><i class="fa fa-thumbs-up" aria-hidden="true"> OK </i></button>
    
    <button type="button" onclick="window.open('/admin-user/serahterimakeluar-list/0','_self')"  class="btn btn-primary waves-effect waves-light" ><i class="fa fa-rotate-left" aria-hidden="true"></i></button>
    
</div>

</form>








