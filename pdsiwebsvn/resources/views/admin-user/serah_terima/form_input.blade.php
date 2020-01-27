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
</script>

<form id="form1" enctype="multipart/form-data"  class="form1" method="post" action="{{ $row==""?URL::to('/').'/admin-user/serah-terima/store':URL::to('/').'/admin-user/serah-terima/update' }}">
    {{ csrf_field() }}
<ul class="nav nav-tabs" id="myTabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Serah Terima</a></li>
            <li role="presentation" class=""><a href="#home2" role="tab" id="profile-tab6" data-toggle="tab" aria-controls="profile" aria-expanded="false">Verifikasi</a></li>
            
            
    </ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade active in" role="tabpanel" id="home" aria-labelledby="home-tab">    

        <div class="form-group row">
            <label  for="inputName" class="col-sm-4 col-form-label text-left">Nomor </label>
            <div class="col-sm-6">
                <input type="hidden" name="id" value="{{ $row==""?"":$row->id }}">
                <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="form_no" value="{{ $row==""?"":$row->form_no }}" data-error="tess" placeholder="auto" readonly   >
            </div>
        </div>
        <div class="form-group row">
            <label  for="inputName" class="col-sm-4 col-form-label text-left">Hari </label>
            <div class="col-sm-2">
                <select name="hari" class="form-control">
                <?php
                $hr['senin']='senin';
                $hr['selasa']='selasa';
                $hr['rabu']='rabu';
                $hr['kamis']='kamis';
                $hr['jumat']='jumat';
                $hr['sabtu']='sabtu';
                $hr['minggu']='minggu';

                $hari = array ( 1 =>    'senin',
                                'selasa',
                                'rabu',
                                'kamis',
                                'jumat',
                                'sabtu',
                                'minggu'
                        );


                foreach ($hr as $x=>$y){
                    if($row==""){
                        echo "<option ".($hari[date('N')]==$x?"selected ":"").">".$y."</option>";
                    }else{
                        echo "<option ".($row->hari==$x?"selected ":"").">".$y."</option>";
                    }
                }

                ?>
                </select>
            </div>
            <div class="col-sm-4">
                <input type="date" maxlength="400" class="form-control" id="nama_kelas" name="tanggal" value="{{ $row==""?date('Y-m-d'):date('Y-m-d',strtotime($row->tanggal)) }}" data-error="tess"  >
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

                <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="terima_jam" value="{{ $row==""?"":$row->terima_jam }}" data-error="tess"  >
            </div>
        </div>



        <div class="form-group row">
            <label  for="inputName" class="col-sm-10 col-form-label text-left"><input value="1"  type="checkbox" <?php echo $row==""?"":($row->wo_tandatangan_sts==1?"checked":"") ?> name="wo_tandatangan_sts">  WO ada dan sudah ditandatangani pejabat berwenang</label>

        </div>
        <div class="form-group row">
            <label  for="inputName" class="col-sm-4 col-form-label text-left">Klarifikasi </label>
            <div class="col-sm-6">

                <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="wo_tandatangan_ket" value="{{ $row==""?"":$row->wo_tandatangan_ket }}" data-error="tess"  >
            </div>
        </div>
        <div class="form-group row">
            <label  for="inputName" class="col-sm-10 col-form-label text-left"><input  value="1" type="checkbox" <?php echo $row==""?"":($row->wo_peralatan_sts==1?"checked":"") ?> name="wo_peralatan_sts">  WO dan Peralatan sesuai</label>

        </div>
        <div class="form-group row">
            <label  for="inputName" class="col-sm-4 col-form-label text-left">Klarifikasi </label>
            <div class="col-sm-6">

                <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="wo_peralatan_ket" value="{{ $row==""?"":$row->wo_peralatan_ket }}" data-error="tess"  >
            </div>
        </div>
        <div class="form-group row">
            <label  for="inputName" class="col-sm-10 col-form-label text-left"><input  value="1" type="checkbox" <?php echo $row==""?"":($row->wo_instruksikerja_sts==1?"checked":"") ?> name="wo_instruksikerja_sts">  Instruksi kerja/kerusakan ada di WO</label>

        </div>
        <div class="form-group row">
            <label  for="inputName" class="col-sm-4 col-form-label text-left">Klarifikasi </label>
            <div class="col-sm-6">

                <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="wo_instruksikerja_ket" value="{{ $row==""?"":$row->wo_instruksikerja_ket }}" data-error="tess"  >
            </div>
        </div>

        <div class="form-group row">
            <label  for="inputName" class="col-sm-4 col-form-label text-left">Nomor Registrasi </label>
            <div class="col-sm-6">

                <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="register_no" readonly value="{{ $row==""?"":$row->register_no }}" data-error="tess"  placeholder="auto"  >
            </div>
        </div>
        <div class="form-group row">
            <label  for="inputName" class="col-sm-4 col-form-label text-left">Deskripsi Pekerjaan </label>
            <div class="col-sm-6">

                <input type="text" maxlength="400" class="form-control" id="nama_kelas" name="register_desc" value="{{ $row==""?"":$row->register_desc }}" data-error="tess"  >
            </div>
        </div>
        <div class="form-group row">
            <label  for="inputName" class="col-sm-4 col-form-label text-left">Nama Pelanggan </label>
            <div class="col-sm-6">
                <select name="nama_pelanggan" required class="form-control">
                    <option value="">--</option>
                    <?php
                    foreach ($listpelanggan as $pelanggan){
                        if($row==""){
                            echo "<option value='".$pelanggan->username."'>".$pelanggan->fullname."</option>";
                        }else{
                            if($row->nama_pelanggan==$pelanggan->username){
                                echo "<option selected value='".$pelanggan->username."'>".$pelanggan->fullname."</option>";
                            }else{
                                echo "<option value='".$pelanggan->username."'>".$pelanggan->fullname."</option>";
                            }
                        }
                    }

                    ?>
                </select>

            </div>
        </div>
        <div class="form-group row">
            <label  for="inputName" class="col-sm-4 col-form-label text-left">No Routing Slip </label>
            <div class="col-sm-6">

                <input type="text" maxlength="400" class="form-control" readonly  id="nama_kelas" name="routingslip_no" value="{{ $row==""?"":$row->routingslip_no }}" data-error="tess" placeholder="auto" >
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
                <input type="file" name="verifikasi_filename" id="input-file-now-custom-1" class="dropify" data-default-file="{{ URL::to('/') }}{{ $row->serahterima_filename }}"  />
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
    <button type="submit" id="submit" class="btn btn-primary waves-effect waves-light" ><i class="fa fa-save" aria-hidden="true"></i></button>
    <?php
    if($row!=""){
        ?>
        <a target="blank" href="{{ URL::to('/') }}/admin-user/serah-terima/print-pdf/{{ $row->form_no }}"><button type="button" class="btn btn-red" style="background-color: #c12e2a;color: white;font-weight: bold;" ><i class="ico icon-file-pdf" ></i></button></a>
    
        <?php
    }
    ?>
    <button type="button" onclick="window.open('/admin-user/serah-terima-list/0','_self')" class="btn btn-primary waves-effect waves-light" ><i class="fa fa-rotate-left" aria-hidden="true"></i></button>
    
</div>

</form>




