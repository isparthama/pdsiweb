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
<form id="form1" enctype="multipart/form-data"  class="form1" method="post" action="{{ URL::to('/').'/admin-user/finishing-store-approve' }}">
                {{ csrf_field() }}
<ul class="nav nav-tabs" id="myTabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Finishing dan Dokumentasi</a></li>
            
    </ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade active in" role="tabpanel" id="home" aria-labelledby="home-tab">

            


            <div class="form-group row">
                <label  for="inputName" class="col-sm-4 col-form-label text-left">Nomor Routing Slip </label>
                <div class="col-sm-6">
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
                    <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="form_no" value="{{ $row==""?"":$row->ispeksi_test_no }}" data-error="tess"  placeholder="auto" readonly   >
                </div>
            </div>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-4 col-form-label text-left">Tanggal </label>
                <div class="col-sm-6">

                    <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="tanggal" value="{{ $row->inspeksi_test_tgl==""?date('Y-m-d'):$row->inspeksi_test_tgl }}" data-error="tess"  >
                </div>
            </div>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-12 col-form-label text-left">Rekomendasi </label>

            </div>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-12 col-form-label text-left">
                    <input value="1"  type="checkbox" <?php echo $row==""?"":($row->terima_baik_sts==1?"checked":"") ?> name="terima_baik_sts">  Diterima dengan baik<br>
                    <input value="1"  type="checkbox" <?php echo $row==""?"":($row->kirim_keluar_sts==1?"checked":"") ?> name="kirim_keluar_sts">  Kirim Ke bengkel luar<br>
                    <!--<input value="1"  type="checkbox" <?php echo $row==""?"":($row->rework_sts==1?"checked":"") ?> name="rework_sts">  Rework<br>-->
                    <input value="1"  type="checkbox" <?php echo $row==""?"":($row->tidak_bisa_diperbaiki_sts==1?"checked":"") ?> name="tidak_bisa_diperbaiki_sts">  Tidak bisa diperbaiki<br>
                    
                    
                    
                </label>

            </div>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-3 col-form-label text-left">Laporan hasil inspeksi</label>

            
                <div class="col-sm-3">
                <select name="routingslip_status_desc_lhi">
                    <?php
                    $st= explode("-", $row->routingslip_status_desc_lhi);
                    ?>
                        <option {{ $st[0]==0?"selected":"" }} value="0">Open</option>
                        <option {{ $st[0]==1?"selected":"" }} value="1">Approve</option>
                        <option {{ $st[0]==2?"selected":"" }} value="2">Not Approve</option>

                    </select>
                </div>
                <div class="col-sm-6">
                    <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="keterangan_lhi" value="{{ $row->keterangan_lhi }}" placeholder="keterangan" >
                </div>

            </div>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-3 col-form-label text-left">Laporan hasil pengetesan</label>

            
                <div class="col-sm-3">
                <select name="routingslip_status_desc_lhp">
                    <?php
                    $st= explode("-", $row->routingslip_status_desc_lhp);
                    ?>
                        <option {{ $st[0]==0?"selected":"" }} value="0">Open</option>
                        <option {{ $st[0]==1?"selected":"" }} value="1">Approve</option>
                        <option {{ $st[0]==2?"selected":"" }} value="2">Not Approve</option>

                    </select>
                </div>
                <div class="col-sm-6">
                    <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="keterangan_lhp" value="{{ $row->keterangan_lhp }}" placeholder="keterangan" >
                </div>

            </div>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-3 col-form-label text-left">Finishing</label>

            
                <div class="col-sm-3">
                <select name="routingslip_status_desc_fns">
                    <?php
                    $st= explode("-", $row->routingslip_status_desc_fns);
                    ?>
                        <option {{ $st[0]==0?"selected":"" }} value="0">Open</option>
                        <option {{ $st[0]==1?"selected":"" }} value="1">Approve</option>
                        <option {{ $st[0]==2?"selected":"" }} value="2">Not Approve</option>

                    </select>
                </div>
                <div class="col-sm-6">
                    <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="keterangan_fns" value="{{ $row->keterangan_fns }}" placeholder="keterangan" >
                </div>

            </div>
        

            
    </div>
    
</div>
<br>
<br>

    

<div class="form-group">
    <button type="submit" id="submit" class="btn btn-primary waves-effect waves-light" ><i class="fa fa-thumbs-up" aria-hidden="true"> OK </i></button>
    <button type="button" onclick="window.open('/admin-user/finishing-list/0','_self')" class="btn btn-primary waves-effect waves-light" ><i class="fa fa-rotate-left" aria-hidden="true"></i></button>

</div>

</form>








