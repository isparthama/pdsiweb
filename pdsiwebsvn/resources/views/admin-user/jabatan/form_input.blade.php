<script language="javascript" type="text/javascript">
        (function() {
            $('.form1').ajaxForm({
                beforeSubmit: function() {
                    $('#submit').prop('disabled', true);
                },
                complete: function(xhr) {
                    alert('Data Telah terupdate');
                    
                    $('#submit').prop('disabled', false);
                    //window.open('{{ URL::to('/') }}/admin-user/inspeksi-list/0','_self');
                        
                        
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
<form id="form1" enctype="multipart/form-data"  class="form1" method="post" action="{{ $row==""?URL::to('/').'/admin-user/inspeksi-store':URL::to('/').'/admin-user/inspeksi-update' }}">
                {{ csrf_field() }}
<ul class="nav nav-tabs" id="myTabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Inspeksi</a></li>
            
    </ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade active in" role="tabpanel" id="home" aria-labelledby="home-tab">

            


            
    <div class="form-group row">
        <label  for="inputName" class="col-sm-12 col-form-label text-left">Rencana Inspeksi & Pengetesan </label>

    </div>
    <div class="form-group row">
        <label  for="inputName" class="col-sm-12 col-form-label text-left">
            <input value="1"  type="checkbox" <?php echo $row==""?"":($row->rip_dynotest_sts==1?"checked":"") ?> name="rip_dynotest_sts">  Dynotest 
            <input value="1"  type="checkbox" <?php echo $row==""?"":($row->rip_loadbank_sts==1?"checked":"") ?> name="rip_loadbank_sts">  Loadbank 
            <input value="1"  type="checkbox" <?php echo $row==""?"":($row->rip_mpo_sts==1?"checked":"") ?> name="rip_mpo_sts">  MPI 
            <input value="1"  type="checkbox" <?php echo $row==""?"":($row->rip_dyepenetrant_sts==1?"checked":"") ?> name="rip_dyepenetrant_sts">  Dye Penetrant 
            <input value="1"  type="checkbox" <?php echo $row==""?"":($row->rip_loadtest==1?"checked":"") ?> name="rip_loadtest">  Load Test 
            <input value="1"  type="checkbox" <?php echo $row==""?"":($row->rip_lain2_sts==1?"checked":"") ?> name="rip_lain2_sts">  Lain-lain 
            <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="rip_lain2_ket" value="{{ $row==""?"":$row->rip_lain2_ket }}" data-error="tess"  placeholder="keterangan Lain-lain"   >
        </label>

    </div>
            
    </div>
</div>    
<br>
<br>

<div class="form-group">
    <button type="submit" id="submit" class="btn btn-primary waves-effect waves-light" ><i class="fa fa-save" aria-hidden="true"></i></button>
    <button type="button" onclick="window.open('/admin-user/inspeksi-list/3','_self')" class="btn btn-primary waves-effect waves-light" ><i class="fa fa-rotate-left" aria-hidden="true"></i></button>

</div>


</form>



