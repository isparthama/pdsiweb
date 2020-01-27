<script language="javascript" type="text/javascript">
        (function() {
            $('.form1').ajaxForm({
                beforeSubmit: function() {
                    $('#submit').prop('disabled', true);
                },
                complete: function(xhr) {
                    alert('Data Telah terupdate');
                    
                    $('#submit').prop('disabled', false);
                    //window.open('{{ URL::to('/') }}/admin-user/produksi-list/0','_self');
                        
                        
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
<form id="form1" enctype="multipart/form-data"  class="form1" method="post" action="{{ $row==""?URL::to('/').'/admin-user/produksi-store':URL::to('/').'/admin-user/produksi-update' }}">
                {{ csrf_field() }}
<ul class="nav nav-tabs" id="myTabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Inspeksi</a></li>
            <li role="presentation" class=""><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">DKM</a></li>
            <li role="presentation" class=""><a href="#profile2" role="tab" id="profile-tab2" data-toggle="tab" aria-controls="profile" aria-expanded="false">Tools</a></li>
            <li role="presentation" class=""><a href="#profile3" role="tab" id="profile-tab3" data-toggle="tab" aria-controls="profile" aria-expanded="false">SDM</a></li>
            <li role="presentation" class=""><a href="#profile4" role="tab" id="profile-tab4" data-toggle="tab" aria-controls="profile" aria-expanded="false">Mesin</a></li>
            
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
                    <input value="1" disabled="true"  type="checkbox" <?php echo $row==""?"":($row->material_sts==1?"checked":"") ?> name="material_sts">  Material Lengkap 
                    <input value="1" disabled="true"  type="checkbox" <?php echo $row==""?"":($row->permit_sts==1?"checked":"") ?> name="permit_sts">  Permit sudah dibuat 
                    <input value="1" disabled="true"  type="checkbox" <?php echo $row==""?"":($row->tool_sts==1?"checked":"") ?> name="tool_sts">  Tools lengkap 
                    <input value="1" disabled="true"  type="checkbox" <?php echo $row==""?"":($row->jsa_sts==1?"checked":"") ?> name="jsa_sts">  JSA sudah dibuat dan disosialisasikan
                    
                </label>

            </div>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-12 col-form-label text-left">Check List Setelah Pekerjaan </label>

            </div>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-12 col-form-label text-left">
                    <input value="1" disabled="true"  type="checkbox" <?php echo $row==""?"":($row->dim_check_sts==1?"checked":"") ?> name="dim_check_sts">  Dimensional check
                    <input value="1" disabled="true"  type="checkbox" <?php echo $row==""?"":($row->permit_sts==1?"checked":"") ?> name="ndt_sts">  NDT
                    <input value="1" disabled="true"  type="checkbox" <?php echo $row==""?"":($row->tool_sts==1?"checked":"") ?> name="finishing_sts">  Finishing
                    <input value="1" disabled="true"  type="checkbox" <?php echo $row==""?"":($row->jsa_sts==1?"checked":"") ?> name="vis_check_sts">  Visual check
                    <input value="1" disabled="true"  type="checkbox" <?php echo $row==""?"":($row->jsa_sts==1?"checked":"") ?> name="load_test_sts">  Load Test

                </label>

            </div>

            <div class="form-group row">
                <label  for="inputName" class="col-sm-12 col-form-label text-left">Rekomendasi</label>

            </div>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-12 col-form-label text-left">
                    <input value="1" disabled="true"  type="checkbox" <?php echo $row==""?"":($row->terima_baik_sts==1?"checked":"") ?> name="terima_baik_sts">  Diterima dengan baik
                    <input value="1" disabled="true"  type="checkbox" <?php echo $row==""?"":($row->kirim_keluar_sts==1?"checked":"") ?> name="kirim_keluar_sts">  Kirim ke bengkel luar
                    <input value="1" disabled="true"  type="checkbox" <?php echo $row==""?"":($row->rework_sts==1?"checked":"") ?> name="rework_sts">  Rework
                    <input value="1" disabled="true"  type="checkbox" <?php echo $row==""?"":($row->tidak_bisa_diperbaiki_sts==1?"checked":"") ?> name="tidak_bisa_diperbaiki_sts">  Tidak Bisa diperbaiki


                </label>

            </div>

    </div>
    <div class="tab-pane fade" role="tabpanel" id="profile" aria-labelledby="profile-tab">
        <style>
        * {
          box-sizing: border-box;
        }

        /*the container must be positioned relative:*/
        .autocomplete {
          position: relative;
          display: inline-block;
        }
        .autocomplete-items {
          position: absolute;
          border: 1px solid #d4d4d4;
          border-bottom: none;
          border-top: none;
          z-index: 99;
          /*position the autocomplete items to be the same width as the container:*/
          top: 100%;
          left: 0;
          right: 0;
        }
        .autocomplete-items div {
          padding: 10px;
          cursor: pointer;
          background-color: #fff; 
          border-bottom: 1px solid #d4d4d4; 
        }

        /*when hovering an item:*/
        .autocomplete-items div:hover {
          background-color: #e9e9e9; 
        }

        /*when navigating through the items using the arrow keys:*/
        .autocomplete-active {
          background-color: DodgerBlue !important; 
          color: #ffffff; 
        }
        </style>
        <input type="hidden" name="jumlahbarismaterial" id="jumlahbarismaterial">
        <input type="hidden" name="jumlahbaristools" id="jumlahbaristools">
        <input type="hidden" name="jumlahbarispersonil" id="jumlahbarispersonil">
        
        <br><br><table class="table table-bordered" id="material">        
                        <thead>
                                <tr>
                                        <td>Nama Material</td>
                                        <td>PN</td> 
                                        <td>Jumlah</td> 
                                        <td>Satuan</td>
                                        <td>Est Harga</td>
                                        <td>Est Total</td>
                                        
                                </tr> 
                        </thead> 
                        <?php
                        if($row==""){
                        ?>
                        <tbody>
                                <tr>
                                    <td><div class="autocomplete" style="width:300px;">
                                            
                                            <input type="text" size="10" id="m1" name="nama[]" onkeypress="jscaridt(this);" >
                                            </div>
                                       </td>
                                       <td><input type="hidden" value="1" size="2" name="jns[]" id="m1_jns">
                                           <input type="text" size="2" name="pn[]" id="m1_pn"></td> 
                                       <td><input type="text" size="2" id="m1_qty" name="qty[]" onblur="jshitung(this);"></td> 
                                        <td><input type="text" size="2" readonly name="satuan[]" id="m1_satuan">
                                        <input type="hidden" size="2" id="m1_id" name="id[]"></td>
                                        <td><input type="text" size="2" id="m1_harga" onblur="jshitung(this);" name="harga[]"></td>
                                        <td><input type="text" size="2" readonly id="m1_total" name="total[]"> 
                                            </td>
                                        
                                </tr> 
                        </tbody>
                        <?php
                        }else{
                        ?>
                        <tbody>
                                <?php
                                $no=1;
                                foreach ($listmaterial as $material){
                                ?>
                                <tr>
                                    <td><div class="autocomplete" style="width:300px;">
                                            <input type="text" size="10" id="m<?php echo $material->baris_no;?>" value="<?php echo $material->keterangan;?>" name="nama[]" onkeypress="jscaridt(this);" >
                                            </div>
                                       </td>
                                       <td><input type="hidden" value="1" size="2" name="jns[]" id="m<?php echo $material->baris_no;?>_jns">
                                           <input type="text" size="2" name="pn[]"  value="<?php echo $material->keterangan_tambahan;?>" id="m<?php echo $material->baris_no;?>_pn"></td> 
                                       <td><input type="text" size="2" id="m<?php echo $material->baris_no;?>_qty" name="qty[]" value="<?php echo $material->estimasi_jumlah;?>"  onblur="jshitung(this);"></td> 
                                        <td><input type="text" size="2" readonly name="satuan[]" value="<?php echo $material->satuan;?>"  id="m<?php echo $material->baris_no;?>_satuan">
                                        <input type="hidden" size="2" id="m<?php echo $material->baris_no;?>_id" value="<?php echo $material->base_id;?>"  name="id[]"></td>
                                        <td><input type="text" size="2" id="m<?php echo $material->baris_no;?>_harga" value="<?php echo $material->estimasi_harga;?>" onblur="jshitung(this);" name="harga[]"></td>
                                        <td><input type="text" size="2" readonly id="m<?php echo $material->baris_no;?>_total" value="<?php echo $material->estimasi_harga_total;?>"  name="total[]"> 
                                            </td>
                                        
                                </tr>
                                <?php
                                $no++;
                                }
                                ?>
                        </tbody>
                        <?php
                        }
                        ?>
        </table>
        Total : <input type="text" readonly style="background-color: #e9e9e9;" value="0" id="totalmaterial" class="form-control" size="3">

        <script>
        function formatMoney(amount, decimalCount = 2, decimal = ".", thousands = ",") {
            try {
              decimalCount = Math.abs(decimalCount);
              decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

              const negativeSign = amount < 0 ? "-" : "";

              let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
              let j = (i.length > 3) ? i.length % 3 : 0;

              return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
            } catch (e) {
              console.log(e)
            }
        };
        function jstotal(){
            var i=1;var jum=0;
            $('#material > tbody  > tr').each(function() {
                if($('#m'+i+'_total').val()!=''){
                    jum=jum+parseInt($('#m'+i+'_total').val());
                    i++;
                }
            });
            $('#totalmaterial').val(jum);
            var i=1;var jum=0;
            $('#tools > tbody  > tr').each(function() {
                if($('#t'+i+'_total').val()!=''){
                    jum=jum+parseInt($('#t'+i+'_total').val());
                    i++;
                }
                
            });
            $('#totaltools').val(jum);
            var i=1;var jum=0;
            $('#personil > tbody  > tr').each(function() {
                if($('#p'+i+'_total').val()!=''){
                    jum=jum+parseInt($('#p'+i+'_total').val());
                    i++;
                }
            });
            $('#totalpersonil').val(jum);
            var i=1;var jum=0;
            $('#mesin > tbody  > tr').each(function() {
                if($('#r'+i+'_total').val()!=''){
                    jum=jum+parseInt($('#r'+i+'_total').val());
                    i++;
                }
            });
            $('#totalmesin').val(jum);
            
            
            
        }
        
        jstotal();
        /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
        //autocomplete(document.getElementById("myInput"), countries);
        </script>

    </div>
    <div class="tab-pane fade" role="tabpanel" id="profile2" aria-labelledby="profile-tab2">
        <br><br><table class="table table-bordered" id="tools">        
                        <thead>
                                <tr>
                                        <td>Nama Tools</td>
                                        <td>SN</td> 
                                        <td>Jumlah</td> 
                                        <td>Satuan</td>
                                        <td>Est Harga</td>
                                        <td>Est Total</td>
                                        
                                </tr> 
                        </thead> 
                        <?php
                        if($row==""){
                        
                        ?>
                        <tbody>
                                <tr>
                                    <td><div class="autocomplete" style="width:300px;">
                                            <input type="text" size="10" id="t1" name="tnama[]" onkeypress="jscaridt(this);" >
                                            </div>
                                       </td>
                                       <td><input type="hidden" value="2" size="2" name="tjns[]" id="t1_jns"><input type="text" size="2" name="tpn[]" id="t1_pn"></td> 
                                       <td><input type="text" size="2" id="t1_qty" name="tqty[]" onblur="jshitung(this);"></td> 
                                        <td><input type="text" size="2" readonly name="tsatuan[]" id="t1_satuan">
                                        <input type="hidden" size="2" id="t1_id" name="tid[]"></td>
                                        <td><input type="text" size="2" id="t1_harga" onblur="jshitung(this);" name="tharga[]"></td>
                                        <td><input type="text" size="2" readonly id="t1_total" name="ttotal[]"> 
                                            </td>
                                        
                                </tr> 
                        </tbody>
                        <?php
                        }else{
                        ?>
                        <tbody>
                            <?php
                            $no=1;
                            foreach ($listtools as $tools){
                            ?>
                                <tr>
                                    <td><div class="autocomplete" style="width:300px;">
                                            <input type="text" size="10" id="t<?php echo $tools->baris_no;?>" value="<?php echo $tools->keterangan;?>" name="tnama[]"  onkeypress="jscaridt(this);" >
                                            </div>
                                       </td>
                                       <td><input type="hidden" value="2" size="2" name="tjns[]" id="t<?php echo $tools->baris_no;?>_jns">
                                           <input type="text" size="2" name="tpn[]"  value="<?php echo $tools->keterangan_tambahan;?>" id="t<?php echo $tools->baris_no;?>_pn"></td> 
                                       <td><input type="text" size="2" id="t<?php echo $tools->baris_no;?>_qty"  value="<?php echo $tools->estimasi_jumlah;?>" name="tqty[]" onblur="jshitung(this);"></td> 
                                        <td><input type="text" size="2" readonly name="tsatuan[]"  value="<?php echo $tools->satuan;?>" id="t<?php echo $tools->baris_no;?>_satuan">
                                        <input type="hidden" size="2" id="t<?php echo $tools->baris_no;?>_id"  value="<?php echo $tools->base_id;?>" name="tid[]"></td>
                                        <td><input type="text" size="2" id="t<?php echo $tools->baris_no;?>_harga" onblur="jshitung(this);"  value="<?php echo $tools->estimasi_harga;?>" name="tharga[]"></td>
                                        <td><input type="text" size="2" readonly   value="<?php echo $tools->estimasi_harga_total;?>" id="t<?php echo $tools->baris_no;?>_total" name="ttotal[]"> 
                                            </td>
                                        
                                </tr> 
                            <?php
                            $no++;
                            }
                            ?>
                        </tbody>
                        <?php
                        }
                        ?>
        </table>
        Total : <input type="text" readonly style="background-color: #e9e9e9;" value="0" id="totaltools" class="form-control" size="3">

    </div>
    <div class="tab-pane fade" role="tabpanel" id="profile3" aria-labelledby="profile-tab3">
        <br><br><table class="table table-bordered" id="personil">        
                        <thead>
                                <tr>
                                        <td>Nama Personil</td>
                                        <td>Jabatan</td> 
                                        <td>Durasi/jam</td> 
                                        <td>Satuan</td>
                                        <td>Est Harga</td>
                                        <td>Est Total</td>
                                        
                                </tr> 
                        </thead> 
                        <?php
                        if($row==""){
                        ?>
                        <tbody>
                                <tr>
                                    <td><div class="autocomplete" style="width:300px;">
                                            <input type="text" size="10" id="p1" name="pnama[]" onkeypress="jscaridt(this);" >
                                            </div>
                                       </td>
                                       <td><input type="hidden" value="3" size="2" name="pjns[]" id="p1_jns"><input type="text" size="2" name="ppn[]" id="p1_pn"></td> 
                                       <td><input type="text" size="2" id="p1_qty" name="pqty[]" onblur="jshitung(this);"></td> 
                                        <td><input type="text" size="2" readonly name="psatuan[]" id="p1_satuan">
                                        <input type="hidden" size="2" id="p1_id" name="pid[]"></td>
                                        <td><input type="text" size="2" onblur="jshitung(this);" id="p1_harga" name="pharga[]"></td>
                                        <td><input type="text" size="2" readonly id="p1_total" name="ptotal[]"> 
                                            </td>
                                        
                                </tr> 
                        </tbody>
                        <?php
                        }else{
                            ?>
                        <tbody>
                                <?php
                                $no=1;
                                    foreach ($listpersonil as $personil){
                                ?>
                                <tr>
                                    <td><div class="autocomplete" style="width:300px;">
                                            <input type="text" size="10" id="p<?php echo $personil->baris_no;?>" value="<?php echo $personil->keterangan;?>" name="pnama[]" onkeypress="jscaridt(this);" >
                                            </div>
                                       </td>
                                       <td><input type="hidden" value="3" size="2" name="pjns[]" id="p<?php echo $personil->baris_no;?>_jns">
                                           <input type="text" size="2" name="ppn[]"  value="<?php echo $personil->keterangan_tambahan;?>" id="p<?php echo $personil->baris_no;?>_pn"></td> 
                                       <td><input type="text" size="2" id="p<?php echo $personil->baris_no;?>_qty" name="pqty[]" value="<?php echo $personil->estimasi_jumlah;?>"  onblur="jshitung(this);"></td> 
                                        <td><input type="text" size="2" readonly name="psatuan[]" value="<?php echo $personil->satuan;?>"  id="p<?php echo $personil->baris_no;?>_satuan">
                                        <input type="hidden" size="2" id="p<?php echo $personil->baris_no;?>_id" value="<?php echo $personil->base_id;?>"  name="pid[]"></td>
                                        <td><input type="text" onblur="jshitung(this);" size="2" id="p<?php echo $personil->baris_no;?>_harga" value="<?php echo $personil->estimasi_harga;?>"  name="pharga[]"></td>
                                        <td><input type="text" size="2" readonly id="p<?php echo $personil->baris_no;?>_total" value="<?php echo $personil->estimasi_harga_total;?>"  name="ptotal[]"> 
                                            </td>
                                        
                                </tr> 
                                <?php
                                $no++;
                                    }
                                ?>
                        </tbody>
                        <?php
                        }
                        ?>
        </table>
        Total : <input type="text" readonly style="background-color: #e9e9e9;" value="0" id="totalpersonil" class="form-control" size="3">

    </div>
    <div class="tab-pane fade" role="tabpanel" id="profile4" aria-labelledby="profile-tab4">
        <br><br><table class="table table-bordered" id="mesin">        
                        <thead>
                                <tr>
                                        <td>Nama Mesin</td>
                                        <td>Keterangan</td> 
                                        <td>Durasi/jam</td> 
                                        <td>Satuan</td>
                                        <td>Est Harga</td>
                                        <td>Est Total</td>
                                        
                                </tr> 
                        </thead> 
                        <?php
                        if($row==""){
                        ?>
                        <tbody>
                                <tr>
                                    <td><div class="autocomplete" style="width:300px;">
                                            <input type="text" size="10" id="r1" name="rnama[]" onkeypress="jscaridt(this);" >
                                            </div>
                                       </td>
                                       <td><input type="hidden" value="4" size="2" name="rjns[]" id="r1_jns">
                                           <input type="text" size="2" name="rpn[]" id="r1_pn"></td> 
                                       <td><input type="text" size="2" id="r1_qty" name="rqty[]" onblur="jshitung(this);"></td> 
                                        <td><input type="text" size="2" readonly name="rsatuan[]" id="r1_satuan">
                                        <input type="hidden" size="2" id="r1_id" name="rid[]"></td>
                                        <td><input type="text" size="2" onblur="jshitung(this);" id="r1_harga" name="rharga[]"></td>
                                        <td><input type="text" size="2" readonly id="r1_total" name="rtotal[]"> 
                                            </td>
                                        
                                </tr> 
                        </tbody>
                        <?php
                        }else{
                            ?>
                        <tbody>
                                <?php
                                $no=1;
                                    foreach ($listmesin as $mesin){
                                ?>
                                <tr>
                                    <td><div class="autocomplete" style="width:300px;">
                                            <input type="text" size="10" id="r<?php echo $mesin->baris_no;?>" value="<?php echo $mesin->keterangan;?>" name="rnama[]" onkeypress="jscaridt(this);" >
                                            </div>
                                       </td>
                                       <td><input type="hidden" value="4" size="2" name="rjns[]" id="r<?php echo $mesin->baris_no;?>_jns">
                                           <input type="text" size="2" name="rpn[]"  value="<?php echo $mesin->keterangan_tambahan;?>" id="r<?php echo $mesin->baris_no;?>_pn"></td> 
                                       <td><input type="text" size="2" id="r<?php echo $mesin->baris_no;?>_qty" name="rqty[]" value="<?php echo $mesin->estimasi_jumlah;?>"  onblur="jshitung(this);"></td> 
                                        <td><input type="text" size="2" readonly name="rsatuan[]" value="<?php echo $mesin->satuan;?>"  id="r<?php echo $mesin->baris_no;?>_satuan">
                                        <input type="hidden" size="2" id="r<?php echo $mesin->baris_no;?>_id" value="<?php echo $mesin->base_id;?>"  name="rid[]"></td>
                                        <td><input type="text" onblur="jshitung(this);" size="2" id="r<?php echo $mesin->baris_no;?>_harga" value="<?php echo $mesin->estimasi_harga;?>"  name="rharga[]"></td>
                                        <td><input type="text" size="2" readonly id="r<?php echo $mesin->baris_no;?>_total" value="<?php echo $mesin->estimasi_harga_total;?>"  name="rtotal[]"> 
                                            </td>
                                        
                                </tr> 
                                <?php
                                $no++;
                                    }
                                ?>
                        </tbody>
                        <?php
                        }
                        ?>
        </table>
        Total : <input type="text" readonly style="background-color: #e9e9e9;" value="0" id="totalmesin" class="form-control" size="3">

    </div>
</div>
<br>
<br>

    

<div class="form-group">
    <button type="button" onclick="window.open('/admin-user/produksi-list/0','_self')" class="btn btn-primary waves-effect waves-light" ><i class="fa fa-rotate-left" aria-hidden="true"></i></button>

</div>


</form>



