<script language="javascript" type="text/javascript">
        (function() {
            $('.form1').ajaxForm({
                beforeSubmit: function() {
                    $('#submit').prop('disabled', true);
                },
                complete: function(xhr) {
                    //alert($.trim(xhr.responseText));
                    //$('#alert').css('display','block');
                    window.open('{{ URL::to('/') }}/admin-user/inspeksi-list/0','_self');
                        
                        
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
<form id="form1" enctype="multipart/form-data"  class="form1" method="post" action="{{ URL::to('/').'/admin-user/inspeksi-store-approve' }}">
                {{ csrf_field() }}
<ul class="nav nav-tabs" id="myTabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Inspeksi</a></li>
            
    </ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade active in" role="tabpanel" id="home" aria-labelledby="home-tab">

            


            <div class="form-group row">
                <label  for="inputName" class="col-sm-4 col-form-label text-left">Nomor Routing Slip </label>
                <div class="col-sm-6">
                    <input type="hidden" name="serahterima_form_id" id="serahterima_form_id" value="{{ $row==""?"":$row->serahterima_form_id }}">
                    <input type="hidden" id="routingslip_no_jns" value="4">
                    <input type="hidden" name="ids" value="{{ $row==""?"":$row->id }}">
                    <input type="text" maxlength="400" class="form-control" id="routingslip_no" onkeypress="jscaridt(this,4);" name="routingslip_no" readonly value="{{ $row==""?"":$row->routingslip_no }}" data-error="tess"     >
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

                    <input type="date" maxlength="400" class="form-control" id="nama_kelas" name="tanggal" readonly value="{{ $row==""?date('Y-m-d'):date('Y-m-d',strtotime($row->form_tanggal)) }}" data-error="tess"  >
                </div>
            </div>
            <input type="hidden" name="form_sts" value="1">
            <div class="form-group row" style="background-color: orange;padding: 20px;border-radius: 5px;margin: 20px;" >
                <label  for="inputName" class="col-sm-3 col-form-label text-left">
                    Status Approve (Technical Review)

                </label>
                <div class="col-sm-3">
                <select name="routingslip_status_tr">
                        <option {{ $status1==0?"selected":"" }} value="0">Open</option>
                        <option {{ $status1==1?"selected":"" }} value="1">Approve</option>
                        <option {{ $status1==2?"selected":"" }} value="2">Not Approve</option>

                    </select>
                </div>
                <div class="col-sm-6">
                    <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="keterangan_tr" value="{{ $ket1 }}" placeholder="keterangan" >
                </div>
            </div>
            <div class="form-group row" style="background-color: orange;padding: 20px;border-radius: 5px;margin: 20px;" >
                <label  for="inputName" class="col-sm-3 col-form-label text-left">
                    Status Approve (Laporan Inspeksi)

                </label>
                <div class="col-sm-3">
                <select name="routingslip_status_li">
                        <option {{ $status2==0?"selected":"" }} value="0">Open</option>
                        <option {{ $status2==1?"selected":"" }} value="1">Approve</option>
                        <option {{ $status2==2?"selected":"" }} value="2">Not Approve</option>

                    </select>
                </div>
                <div class="col-sm-6">
                    <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="keterangan_li" value="{{ $ket2 }}" placeholder="keterangan" >
                </div>
            </div>
            <div class="form-group row" style="background-color: orange;padding: 20px;border-radius: 5px;margin: 20px;" >
                <label  for="inputName" class="col-sm-3 col-form-label text-left">
                    Status Approve (Rencana Perbaikan)

                </label>
                <div class="col-sm-3">
                <select name="routingslip_status_lrp">
                        <option {{ $status3==0?"selected":"" }} value="0">Open</option>
                        <option {{ $status3==1?"selected":"" }} value="1">Approve</option>
                        <option {{ $status3==2?"selected":"" }} value="2">Not Approve</option>

                    </select>
                </div>
                <div class="col-sm-6">
                    <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="keterangan_lrp" placeholder="keterangan" value="{{ $ket3 }}" >
                </div>
            </div>
            <div class="form-group row" style="background-color: orange;padding: 20px;border-radius: 5px;margin: 20px;" >
                <label  for="inputName" class="col-sm-3 col-form-label text-left">
                    Status Approve (Daftar Kebutuhan Material)

                </label>
                <div class="col-sm-3">
                <select name="routingslip_status_ldkm">
                        <option {{ $status4==0?"selected":"" }}  value="0">Open</option>
                        <option {{ $status4==1?"selected":"" }}  value="1">Approve</option>
                        <option {{ $status4==2?"selected":"" }}  value="2">Not Approve</option>

                    </select>
                </div>
                <div class="col-sm-6">
                    <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="keterangan_ldkm" placeholder="keterangan"  value="{{ $ket4 }}"  >
                </div>
            </div>
            
            
    </div>
    
    
</div>
<br>
<br>

<input type="hidden" name="statusnya" id="statusnya" value="0">
<div class="form-group">
    <button type="submit" id="submit" onclick="jsbutton('1');" class="btn btn-primary waves-effect waves-light" ><i class="fa fa-thumbs-up" aria-hidden="true"> OK </i></button>
    <button type="submit" id="reject" onclick="jsbutton('2');" class="btn btn-primary waves-effect waves-light" ><i class="fa fa-thumbs-down" aria-hidden="true"> NOT OK </i></button>
    <button type="button" onclick="window.open('/admin-user/inspeksi-list/0','_self')" class="btn btn-primary waves-effect waves-light" ><i class="fa fa-rotate-left" aria-hidden="true"></i></button>

</div>


</form>



