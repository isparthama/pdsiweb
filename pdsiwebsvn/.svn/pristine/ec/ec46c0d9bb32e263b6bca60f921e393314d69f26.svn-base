<script language="javascript" type="text/javascript">
        (function() {
            $('.form1').ajaxForm({
                beforeSubmit: function() {
                    $('#submit').prop('disabled', true);
                },
                complete: function(xhr) {
                    window.open('{{ URL::to('/') }}/admin-user/produksi-list/0','_self');
                        
                        
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
<form id="form1" enctype="multipart/form-data"  class="form1" method="post" action="{{ $row==""?URL::to('/').'/admin-user/produksi-store':URL::to('/').'/admin-user/produksi-store-approve' }}">
                {{ csrf_field() }}
<ul class="nav nav-tabs" id="myTabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Produksi</a></li>
            
    </ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade active in" role="tabpanel" id="home" aria-labelledby="home-tab">

            


            <div class="form-group row">
                <label  for="inputName" class="col-sm-4 col-form-label text-left">Nomor Routing Slip </label>
                <div class="col-sm-6">
                    <input type="hidden" name="serahterima_id" id="serahterima_id" value="{{ $row==""?"":$row->serahterima_id }}">
                    <input type="hidden" id="routingslip_no_jns" value="5">
                    <input type="hidden" name="ids" value="{{ $row==""?"":$row->id }}">
                    <input type="hidden" name="inspeksiperbaikan_id" value="{{ $row==""?"":$row->inspeksiperbaikan_id }}">
                    <input type="text" maxlength="400" readonly class="form-control" id="routingslip_no"  name="routingslip_no" value="{{ $row==""?"":$row->routingslip_no }}" data-error="tess"     >
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
                <label  for="inputName" class="col-sm-4 col-form-label text-left">Nomor Inspeksi </label>
                <div class="col-sm-6">
                    <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="form_no" value="{{ $row==""?"":$row->form_no }}" data-error="tess"  placeholder="auto" readonly   >
                </div>
            </div>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-4 col-form-label text-left">Tanggal </label>
                <div class="col-sm-6">

                    <input type="date" readonly maxlength="400" class="form-control" id="nama_kelas" name="tanggal" value="{{ $row==""?date('Y-m-d'):date('Y-m-d',strtotime($row->form_tanggal)) }}" data-error="tess"  >
                </div>
            </div>
            
            <div class="form-group row">
                <label  for="inputName" class="col-sm-12 col-form-label text-left">Check List Sebelum Pekerjaan </label>

            </div>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-12 col-form-label text-left">
                    <input value="1"  type="checkbox" <?php echo $row==""?"":($row->material_sts==1?"checked":"") ?> name="material_sts">  Material Lengkap 
                    <input value="1"  type="checkbox" <?php echo $row==""?"":($row->permit_sts==1?"checked":"") ?> name="permit_sts">  Permit sudah dibuat 
                    <input value="1"  type="checkbox" <?php echo $row==""?"":($row->tool_sts==1?"checked":"") ?> name="tool_sts">  Tools lengkap 
                    <input value="1"  type="checkbox" <?php echo $row==""?"":($row->jsa_sts==1?"checked":"") ?> name="jsa_sts">  JSA sudah dibuat dan disosialisasikan
                    
                </label>

            </div>
            <div class="form-group row">
                {{-- <div class="col-md-4"></div> --}}
                <label  for="inputName" class="col-sm-4 col-form-label text-left">File Permit sudah dibuat</label>
                <div class="col-md-6 col-xs-12">
                        @if ($row->dim_filename!="")
                        <a target="blank" href="{{ URL::to('/') }}{{ $row->dim_filename }}" ><i style="font-size:20px;" class="fa fa-image"></i> {{ $row->dim_filename }}</a>
                            <br>
                        @else
                            &nbsp;
                        @endif
                       

                </div>
            </div>
            <div class="form-group row">
                {{-- <div class="col-md-4"></div> --}}
                <label  for="inputName" class="col-sm-4 col-form-label text-left">JSA sudah dibuat dan diselesaikan</label>
                <div class="col-md-6 col-xs-12">
                        @if ($row->vis_filename!="")
                        <a target="blank" href="{{ URL::to('/') }}{{ $row->vis_filename }}" ><i style="font-size:20px;" class="fa fa-image"></i> {{ $row->vis_filename }}</a>
                            <br>
                        @else
                            &nbsp;
                        @endif
                       

                </div>
            </div>
    </div>
    
</div>
<br>
<br>

    

<div class="form-group">
    <button type="submit" id="submit" class="btn btn-primary waves-effect waves-light" ><i class="fa fa-thumbs-up" aria-hidden="true"> OK </i></button>
    <button type="button" onclick="window.open('/admin-user/produksi-list/0','_self')" class="btn btn-primary waves-effect waves-light" ><i class="fa fa-rotate-left" aria-hidden="true"></i></button>

</div>


</form>



