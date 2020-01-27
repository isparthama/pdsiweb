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
</script>

<form id="form1" enctype="multipart/form-data"  class="form1" method="post" action="{{ URL::to('/').'/admin-user/serahterimakeluar-store' }}">
    {{ csrf_field() }}
<ul class="nav nav-tabs" id="myTabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Serah Terima Keluar</a></li>
            <li role="presentation" class=""><a href="#home2" role="tab" id="profile-tab6" data-toggle="tab" aria-controls="profile" aria-expanded="false">Verifikasi</a></li>
            
            
    </ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade active in" role="tabpanel" id="home" aria-labelledby="home-tab">       

        <div class="form-group row">
            <label  for="inputName" class="col-sm-4 col-form-label text-left">Nomor </label>
            <div class="col-sm-6">
                <input type="hidden" name="id" value="{{ $row==""?"":$row->id }}">
                <input type="hidden" readonly maxlength="400" class="form-control" id="routingslip_no"  name="routingslip_no" value="{{ $row==""?"":$row->routingslip_no }}" data-error="tess"     >
                <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="form_no" value="{{ $row==""?"":$row->serahterima_no }}" data-error="tess" placeholder="auto" readonly   >
            </div>
        </div>
        <div class="form-group row">
            <label  for="inputName" class="col-sm-4 col-form-label text-left">Tanggal </label>

            <div class="col-sm-6">
                <input type="date" maxlength="400" class="form-control" id="nama_kelas" name="tanggal" value="{{ $row->form_tanggal==""?date('Y-m-d'):$row->form_tanggal }}" data-error="tess"  >
            </div>
        </div>
        <div class="form-group row">
            <label  for="inputName" class="col-sm-4 col-form-label text-left">Pengirim </label>
            <div class="col-sm-6">

                <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="pengirim" value="{{ $row==""?"":$row->pengirim }}" data-error="tess"  >
            </div>
        </div>
        <div class="form-group row">
            <label  for="inputName" class="col-sm-4 col-form-label text-left">Driver </label>
            <div class="col-sm-6">

                <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="driver" value="{{ $row==""?"":$row->driver }}" data-error="tess"  >
            </div>
        </div>
        <div class="form-group row">
            <label  for="inputName" class="col-sm-4 col-form-label text-left">No Polisi Kendaraan </label>
            <div class="col-sm-6">

                <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="nopolisi" value="{{ $row==""?"":$row->nopolisi }}" data-error="tess"  >
            </div>
        </div>
        <div class="form-group row">
            <label  for="inputName" class="col-sm-4 col-form-label text-left">Nomor WO </label>
            <div class="col-sm-6">

                <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="wo_no" value="{{ $row==""?"":$row->wo_no }}" data-error="tess"  >
            </div>
        </div>

        <div class="form-group row">
            <label  for="inputName" class="col-sm-4 col-form-label text-left">Penerima</label>
            <div class="col-sm-6">

                <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="penerima" value="{{ $row==""?$penerima:$row->penerima }}" data-error="tess"  >
            </div>
        </div>
        <div class="form-group row">
            <label  for="inputName" class="col-sm-4 col-form-label text-left">Jam </label>
            <div class="col-sm-6">

                <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="kirim_jam" value="{{ $row==""?"":$row->kirim_jam }}" data-error="tess"  >
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




        

    </div>
    <div class="tab-pane" role="tabpanel" id="home2" > 
        <?php
        if($row!=""){
        ?>
        <div class="form-group row">
            <label  for="inputName" class="col-sm-4 col-form-label text-left">Verfikasi File </label>
            <div class="col-sm-6">
                <input type="file" name="verifikasi_filename" id="input-file-now-custom-1" class="dropify" data-default-file="{{ URL::to('/') }}{{ $row->serahterimakeluar_filename }}"  />
            </div>
        </div>
        <?php
        }
        ?>
    </div>
    
</div>
<div class="form-group">
            <button type="submit" id="submit" class="btn btn-primary waves-effect waves-light" ><i class="fa fa-save" aria-hidden="true"></i></button>
            <?php
            if($row!=""){
                ?>
                <a target="blank" href="{{ URL::to('/') }}/admin-user/serahterimakeluar-pdf/{{ $row->routingslip_no }}"><button type="button" class="btn btn-red" style="background-color: #c12e2a;color: white;font-weight: bold;" ><i class="ico icon-file-pdf" ></i></button></a>

                <?php
            }
            ?>
            <button type="button" onclick="window.open('/admin-user/serahterimakeluar-list/0','_self')" class="btn btn-primary waves-effect waves-light" ><i class="fa fa-rotate-left" aria-hidden="true"></i></button>

        </div>
</form>




