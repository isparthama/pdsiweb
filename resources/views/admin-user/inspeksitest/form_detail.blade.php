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
<form id="form1" enctype="multipart/form-data"  class="form1" method="post" action="{{ URL::to('/').'/admin-user/inspeksitest-store' }}">
                {{ csrf_field() }}
<ul class="nav nav-tabs" id="myTabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Inspeksi Test</a></li>
            
    </ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade active in" role="tabpanel" id="home" aria-labelledby="home-tab">

            


            <div class="form-group row">
                <label  for="inputName" class="col-sm-4 col-form-label text-left">Nomor Routing Slip </label>
                <div class="col-sm-6">
                    <input type="hidden" name="serahterima_id" id="serahterima_id" value="{{ $row==""?"":$row->serahterima_id }}">
                    <input type="hidden" name="ids" value="{{ $row==""?"":$row->id }}">
                    <input type="hidden" name="production_id" value="{{ $row==""?"":$row->production_id }}">
                    <input type="text" maxlength="400" class="form-control" id="routingslip_no"  name="routingslip_no" value="{{ $row==""?"":$row->routingslip_no }}" data-error="tess"     >
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

                    <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="tanggal" value="{{ $row->form_tanggal==""?date('Y-m-d'):$row->form_tanggal }}" data-error="tess"  >
                </div>
            </div>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-12 col-form-label text-left">Check List Setelah Pekerjaan </label>

            </div>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-12 col-form-label text-left">
                    <input value="1"  type="checkbox" <?php echo $row==""?"":($row->dim_check_sts==1?"checked":"") ?> name="dim_check_sts">  Dimensional check
                    <br>
                            @if ($row->dim_filename!="")
                                    <a target="blank" href="{{ URL::to('/') }}{{ $row->dim_filename }}" ><i style="font-size:20px;" class="fa fa-image"></i> {{ $row->dim_filename }}</a>
                                
                            @endif
                      
                    <br>
                    <input value="1"  type="checkbox" <?php echo $row==""?"":($row->ndt_sts==1?"checked":"") ?> name="ndt_sts">  NDT
                    <br>        @if ($row->ndt_filename!="")
                                    <a target="blank" href="{{ URL::to('/') }}{{ $row->ndt_filename }}" ><i style="font-size:20px;" class="fa fa-image"></i> {{ $row->ndt_filename }}</a>
                             
                            @endif
                    <br>
                    <input value="1"  type="checkbox" <?php echo $row==""?"":($row->finishing_sts==1?"checked":"") ?> name="finishing_sts">  Finishing
                    <br>
                            @if ($row->finishing_filename!="")
                                    <a target="blank" href="{{ URL::to('/') }}{{ $row->finishing_filename }}" ><i style="font-size:20px;" class="fa fa-image"></i> {{ $row->finishing_filename }}</a>
                               
                            @endif
                    <br>
                    <input value="1"  type="checkbox" <?php echo $row==""?"":($row->vis_check_sts==1?"checked":"") ?> name="vis_check_sts">  Visual check
                    <br>
                        
                       @if ($row->vis_filename!="")
                                    <a target="blank" href="{{ URL::to('/') }}{{ $row->vis_filename }}" ><i style="font-size:20px;" class="fa fa-image"></i> {{ $row->vis_filename }}</a>
                             
                            @endif
                    <br>
                    <input value="1"  type="checkbox" <?php echo $row==""?"":($row->load_test_sts==1?"checked":"") ?> name="load_test_sts">  Load Test
                    <br>
                             @if ($row->load_filename!="")
                                    <a target="blank" href="{{ URL::to('/') }}{{ $row->load_filename }}" ><i style="font-size:20px;" class="fa fa-image"></i> {{ $row->load_filename }}</a>
                 
                            @endif
                    <br>
                </label>

            </div>


            
    </div>
    
</div>
<br>
<br>

    

<div class="form-group">
    
    <button type="button" onclick="window.open('/admin-user/inspeksitest-list/0','_self')" class="btn btn-primary waves-effect waves-light" ><i class="fa fa-rotate-left" aria-hidden="true"></i></button>

</div>


</form>




