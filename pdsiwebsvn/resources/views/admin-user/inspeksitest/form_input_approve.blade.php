<script language="javascript" type="text/javascript">
        (function() {
            $('.form1').ajaxForm({
                beforeSubmit: function() {
                    $('#submit').prop('disabled', true);
                },
                complete: function(xhr) {
                    window.open('{{ URL::to('/') }}/admin-user/inspeksitest-list/0','_self');
                        
                        
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
<form id="form1" enctype="multipart/form-data"  class="form1" method="post" action="{{ URL::to('/').'/admin-user/inspeksitest-store-approve' }}">
                {{ csrf_field() }}
<ul class="nav nav-tabs" id="myTabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Inspeksi Test</a></li>
            
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

                    <input type="date" readonly maxlength="400" class="form-control" id="nama_kelas" name="tanggal" value="{{ $row==""?date('Y-m-d'):date('Y-m-d',strtotime($row->inspeksi_test_tgl)) }}" data-error="tess"  >
                </div>
            </div>
            
            <div class="form-group row">
                <label  for="inputName" class="col-sm-12 col-form-label text-left">Check List Setelah Pekerjaan </label>

            </div>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-12 col-form-label text-left">
                    <input value="1"  type="checkbox" <?php echo $row==""?"":($row->dim_check_sts==1?"checked":"") ?> name="dim_check_sts">  Dimensional Check
                    <input value="1"  type="checkbox" <?php echo $row==""?"":($row->ndt_sts==1?"checked":"") ?> name="ndt_sts">  NDT 
                    <input value="1"  type="checkbox" <?php echo $row==""?"":($row->finishing_sts==1?"checked":"") ?> name="finishing_sts">  Finishing
                    <input value="1"   type="checkbox" <?php echo $row==""?"":($row->vis_check_sts==1?"checked":"") ?> name="vis_check_sts">  Visual Check
                    <input value="1"  type="checkbox" <?php echo $row==""?"":($row->load_test_sts==1?"checked":"") ?> name="load_test_sts">  Load Test
                    
                    
                </label>

            </div>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-3 col-form-label text-left">Inspeksi Hasil Perbaikan</label>

            
                <div class="col-sm-3">
                <select name="routingslip_status_desc_ihp">
                    <?php
                    $st= explode("-", $row->routingslip_status_desc_ihp);
                    ?>
                        <option {{ $st[0]==0?"selected":"" }} value="0">Open</option>
                        <option {{ $st[0]==1?"selected":"" }} value="1">Approve</option>
                        <option {{ $st[0]==2?"selected":"" }} value="2">Not Approve</option>

                    </select>
                </div>
                <div class="col-sm-6">
                    <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="keterangan_ihp" value="{{ $row->keterangan_ihp }}" placeholder="keterangan" >
                </div>

            </div>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-3 col-form-label text-left">Inspeksi Hasil Pengetesan</label>

            
                <div class="col-sm-3">
                <select name="routingslip_status_desc_test">
                    <?php
                    $st= explode("-", $row->routingslip_status_desc_test);
                    ?>
                        <option {{ $st[0]==0?"selected":"" }} value="0">Open</option>
                        <option {{ $st[0]==1?"selected":"" }} value="1">Approve</option>
                        <option {{ $st[0]==2?"selected":"" }} value="2">Not Approve</option>

                    </select>
                </div>
                
                <div class="col-sm-6">
                    <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="keterangan_test" value="{{ $row->keterangan_test }}" placeholder="keterangan" >
                </div>

            </div>
        <div class="form-group row">
            <div class="col-sm-3"><input value="1"  type="checkbox" <?php echo $row==""?"":($row->reproduction_sts==1?"checked":"") ?> name="reproduction_sts">  Produksi Ulang</div>
        </div>
        
    </div>
    
</div>
<br>
<br>

    

<div class="form-group">
    <button type="submit" id="submit" class="btn btn-primary waves-effect waves-light" ><i class="fa fa-thumbs-up" aria-hidden="true"> OK </i></button>
    <button type="button" onclick="window.open('/admin-user/inspeksitest-list/0','_self')" class="btn btn-primary waves-effect waves-light" ><i class="fa fa-rotate-left" aria-hidden="true"></i></button>

</div>


</form>


