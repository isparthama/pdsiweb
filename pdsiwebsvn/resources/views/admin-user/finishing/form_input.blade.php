<script language="javascript" type="text/javascript">
        (function() {
            $('.form1').ajaxForm({
                beforeSubmit: function() {
                   $('#submit').prop('disabled', true);
                },
                complete: function(xhr) {
                    window.open('{{ URL::to('/') }}/admin-user/finishing-list/0','_self');
                        
                        
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
<form id="form1" enctype="multipart/form-data"  class="form1" method="post" action="{{ URL::to('/').'/admin-user/finishing-store' }}">
                {{ csrf_field() }}
<ul class="nav nav-tabs" id="myTabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Finishing dan Dokumentasi</a></li>
            <li role="presentation" class=""><a href="#home2" role="tab" id="profile-tab6" data-toggle="tab" aria-controls="profile" aria-expanded="false">Verifikasi</a></li>
            
    </ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade active in" role="tabpanel" id="home" aria-labelledby="home-tab">

            


            <div class="form-group row">
                <label  for="inputName" class="col-sm-4 col-form-label text-left">Nomor Routing Slip </label>
                <div class="col-sm-6">
                    <input type="hidden" name="serahterima_id" value="{{ $row==""?"":$row->serahterima_id }}">
                    <input type="text" readonly maxlength="400" class="form-control" id="routingslip_no"  name="routingslip_no" value="{{ $row==""?"":$row->routingslip_no }}" data-error="tess"     >
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
                <label  for="inputName" class="col-sm-4 col-form-label text-left">Nomor Inspeksi Test</label>
                <div class="col-sm-6">
                    <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="form_no" value="{{ $row==""?"":$row->form_no }}" data-error="tess"  placeholder="auto" readonly   >
                </div>
            </div>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-4 col-form-label text-left">Tanggal </label>
                <div class="col-sm-6">

                    <input type="date" maxlength="400" class="form-control" id="nama_kelas" name="tanggal" value="{{ $row==""?date('Y-m-d'):date('Y-m-d',strtotime($row->form_tanggal)) }}" data-error="tess"  >
                </div>
            </div>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-12 col-form-label text-left">Rekomendasi </label>

            </div>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-12 col-form-label text-left">
                    <input value="1"  type="checkbox" <?php echo $row==""?"":($row->terima_baik_sts==1?"checked":"") ?> name="terima_baik_sts">  Diterima dengan baik<br>
                    <input value="1"  type="checkbox" <?php echo $row==""?"":($row->kirim_keluar_sts==1?"checked":"") ?> name="kirim_keluar_sts">  Kirim Ke bengkel luar<br>
                    
                    <input value="1"  type="checkbox" <?php echo $row==""?"":($row->tidak_bisa_diperbaiki_sts==1?"checked":"") ?> name="tidak_bisa_diperbaiki_sts">  Tidak bisa diperbaiki<br>
                    
                    
                    
                </label>

            </div>


            
    </div>
    <div class="tab-pane" role="tabpanel" id="home2" > 
        <?php
        if($row!=""){
        ?>
        <div class="form-group row">
            <label  for="inputName" class="col-sm-4 col-form-label text-left">Verfikasi File </label>
            <div class="col-sm-6">
                <input type="file" name="verifikasi_filename" id="input-file-now-custom-1" class="dropify" data-default-file="{{ URL::to('/') }}{{ $row->finishing_filename }}"  />
            </div>
        </div>
        <?php
        }
        ?>
    </div>
    
</div>
<br>
<br>

    

<div class="form-group">
    <button type="submit" id="submit" class="btn btn-primary waves-effect waves-light" ><i class="fa fa-save" aria-hidden="true"> </i></button>
    <?php
    if($row!=""){
        ?>
        <a target="blank" href="{{ URL::to('/') }}/admin-user/finishing-pdf/{{ $row->routingslip_no }}"><button type="button" class="btn btn-red" style="background-color: #c12e2a;color: white;font-weight: bold;" ><i class="ico icon-file-pdf" ></i></button></a>
    
        <?php
    }
    ?>
    <button type="button" onclick="window.open('/admin-user/finishing-list/0','_self')" class="btn btn-primary waves-effect waves-light" ><i class="fa fa-rotate-left" aria-hidden="true"></i></button>

</div>


</form>



