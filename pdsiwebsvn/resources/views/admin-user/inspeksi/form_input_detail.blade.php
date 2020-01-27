<script language="javascript" type="text/javascript">
        (function() {
            
            $('.form1').ajaxForm({
                beforeSubmit: function() {
                    $('#submit').prop('disabled', true);
                },
                complete: function(xhr) {
                    alert('Data Telah terupdate');
                    
                    $('#submit').prop('disabled', false);
                    window.open('{{ URL::to('/') }}/admin-user/proses-review-list/0','_self');
                        
                        
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
<form id="form1" enctype="multipart/form-data"   class="form1" method="post" action="{{ $row==""?URL::to('/').'/admin-user/inspeksi-store':URL::to('/').'/admin-user/proses-review-open' }}">
                {{ csrf_field() }}
<ul class="nav nav-tabs" id="myTabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Inspeksi</a></li>
            <li role="presentation" class=""><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">DKM</a></li>
            <li role="presentation" class=""><a href="#profile2" role="tab" id="profile-tab2" data-toggle="tab" aria-controls="profile" aria-expanded="false">Tools</a></li>
            <li role="presentation" class=""><a href="#profile3" role="tab" id="profile-tab3" data-toggle="tab" aria-controls="profile" aria-expanded="false">SDM</a></li>
            <li role="presentation" class=""><a href="#profile4" role="tab" id="profile-tab4" data-toggle="tab" aria-controls="profile" aria-expanded="false">Mesin</a></li>
            <li role="presentation" class=""><a href="#profile5" role="tab" id="profile-tab5" data-toggle="tab" aria-controls="profile" aria-expanded="false">FILE</a></li>
            <!--<li role="presentation" class=""><a href="#profile6" role="tab" id="profile-tab6" data-toggle="tab" aria-controls="profile" aria-expanded="false">Verifikasi</a></li>-->
            
            
    </ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade active in" role="tabpanel" id="home" aria-labelledby="home-tab">

            


            <div class="form-group row">
                <label  for="inputName" class="col-sm-4 col-form-label text-left">Nomor Routing Slip </label>
                <div class="col-sm-6">
                    <input type="hidden" name="serahterima_form_id" id="serahterima_form_id" value="{{ $row==""?"":$row->serahterima_form_id }}">
                    <input type="hidden" id="routingslip_no_jns" value="5">
                    <input type="hidden" name="ids" value="{{ $row==""?"":$row->id }}">
                    <input type="text"  readonly maxlength="400" class="form-control" id="routingslip_no" onkeypress="jscaridt(this,4);" name="routingslip_no" value="{{ $row==""?"":$row->routingslip_no }}" data-error="tess"     >
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
                <label  for="inputName" class="col-sm-12 col-form-label text-left">Referensi </label>
                
            </div>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-4 col-form-label text-left"><input disabled="true" value="1"  type="checkbox" <?php echo $row==""?"":($row->ref_api_sts==1?"checked":"") ?> name="ref_api_sts">  API </label>
                <div class="col-sm-6">
                    <input type="text" readonly maxlength="400" class="form-control" id="nama_kelas" name="ref_api_ket" value="{{ $row==""?"":$row->ref_api_ket }}" data-error="tess"  placeholder="keterangan"   >
                </div>
            </div>
            <div class="form-group row">
                {{-- <div class="col-md-4"></div> --}}
                <label  for="inputName" class="col-sm-4 col-form-label text-left">File API</label>
                <div class="col-md-6 col-xs-12">
                        @if ($row->api_filename!="")
                        <a target="blank" href="{{ URL::to('/') }}{{ $row->api_filename }}" ><i style="font-size:20px;" class="fa fa-image"></i> {{ $row->api_filename }}</a>
                            <br>
                            <!--<input type="file" name="api_filename"  />-->
                        @else
                            <!--<input type="file" name="api_filename" />-->
                        @endif
                       

                </div>
            </div>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-4 col-form-label text-left"><input disabled="true" value="1"  type="checkbox" <?php echo $row==""?"":($row->ref_astm_sts==1?"checked":"") ?> name="ref_astm_sts">  ASTM </label>
                <div class="col-sm-6">
                    <input type="text" readonly maxlength="400" class="form-control" id="nama_kelas" name="ref_astm_ket" value="{{ $row==""?"":$row->ref_astm_ket }}" data-error="tess"  placeholder="keterangan"   >
                </div>
            </div>
            <div class="form-group row">
                {{-- <div class="col-md-4"></div> --}}
                <label  for="inputName" class="col-sm-4 col-form-label text-left">File ASTM</label>
                <div class="col-md-6 col-xs-12">
                        @if ($row->astm_filename!="")
                        <a target="blank" href="{{ URL::to('/') }}{{ $row->astm_filename }}" ><i style="font-size:20px;" class="fa fa-image"></i> {{ $row->astm_filename }}</a>
                            <br>
                            <!--<input type="file" name="astm_filename"  />-->
                        @else
                            <!--<input type="file" name="astm_filename" />-->
                        @endif
                </div>
            </div>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-4 col-form-label text-left"><input disabled="true" value="1"  type="checkbox" <?php echo $row==""?"":($row->ref_aws_sts==1?"checked":"") ?> name="ref_aws_sts">  AWS </label>
                <div class="col-sm-6">
                    <input type="text" readonly maxlength="400" class="form-control" id="nama_kelas" name="ref_aws_ket" value="{{ $row==""?"":$row->ref_aws_ket }}" data-error="tess"  placeholder="keterangan"   >
                </div>
            </div>
            <div class="form-group row">
                {{-- <div class="col-md-4"></div> --}}
                <label  for="inputName" class="col-sm-4 col-form-label text-left">File AWS</label>
                <div class="col-md-6 col-xs-12">
                      
                        @if ($row->aws_filename!="")
                        <a target="blank" href="{{ URL::to('/') }}{{ $row->aws_filename }}" ><i style="font-size:20px;" class="fa fa-image"></i> {{ $row->aws_filename }}</a>
                            <br>
                            <!--<input type="file" name="aws_filename"  />-->
                        @else
                            <!--<input type="file" name="aws_filename" />-->
                        @endif
                </div>
            </div>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-4 col-form-label text-left"><input disabled="true" value="1"  type="checkbox" <?php echo $row==""?"":($row->ref_tko_sts==1?"checked":"") ?> name="ref_tko_sts">  TKO </label>
                <div class="col-sm-6">
                    <input type="text" readonly maxlength="400" class="form-control" id="nama_kelas" name="ref_tko_ket" value="{{ $row==""?"":$row->ref_tko_ket }}" data-error="tess"  placeholder="keterangan"   >
                </div>
            </div>
            <div class="form-group row">
                {{-- <div class="col-md-4"></div> --}}
                <label  for="inputName" class="col-sm-4 col-form-label text-left">File TKO</label>
                <div class="col-md-6 col-xs-12">
                        @if ($row->tko_filename!="")
                        <a target="blank" href="{{ URL::to('/') }}{{ $row->tko_filename }}" ><i style="font-size:20px;" class="fa fa-image"></i> {{ $row->tko_filename }}</a>
                            <br>
                            <!--<input type="file" name="tko_filename"  />-->
                        @else
                            <!--<input type="file" name="tko_filename" />-->
                        @endif
                </div>
            </div>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-4 col-form-label text-left"><input disabled="true" value="1"  type="checkbox" <?php echo $row==""?"":($row->ref_tki_sts==1?"checked":"") ?> name="ref_tki_sts">  TKI </label>
                <div class="col-sm-6">
                    <input type="text" readonly maxlength="400" class="form-control" id="nama_kelas" name="ref_tki_ket" value="{{ $row==""?"":$row->ref_tki_ket }}" data-error="tess"  placeholder="keterangan"   >
                </div>
            </div>
            <div class="form-group row">
                {{-- <div class="col-md-4"></div> --}}
                <label  for="inputName" class="col-sm-4 col-form-label text-left">File TKI</label>
                <div class="col-md-6 col-xs-12">
                    
                        @if ($row->tki_filename!="")
                        <a target="blank" href="{{ URL::to('/') }}{{ $row->tki_filename }}" ><i style="font-size:20px;" class="fa fa-image"></i> {{ $row->tki_filename }}</a>
                            <br>
                            <!--<input type="file" name="tki_filename"  />-->
                        @else
                            <!--<input type="file" name="tki_filename" />-->
                        @endif
                </div>
            </div>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-4 col-form-label text-left"><input  disabled="true" value="1"  type="checkbox" <?php echo $row==""?"":($row->ref_manualbook_sts==1?"checked":"") ?> name="ref_manualbook_sts">  Manual Book </label>
                <div class="col-sm-6">
                    <input type="text" readonly maxlength="400" class="form-control" id="nama_kelas" name="ref_manualbook_ket" value="{{ $row==""?"":$row->ref_manualbook_ket }}" data-error="tess"  placeholder="keterangan"   >
                </div>
            </div>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-4 col-form-label text-left"><input disabled="true" value="1"  type="checkbox" <?php echo $row==""?"":($row->ref_lain2_sts==1?"checked":"") ?> name="ref_lain2_sts">  Lain-lain </label>
                <div class="col-sm-6">
                    <input type="text" readonly maxlength="400" class="form-control" id="nama_kelas" name="ref_lain2_ket" value="{{ $row==""?"":$row->ref_lain2_ket }}" data-error="tess"  placeholder="keterangan"   >
                </div>
            </div>
                
                
            <div class="form-group row">
                <label  for="inputName" class="col-sm-4 col-form-label text-left">Rencana Perbaikan </label>
                <div class="col-sm-6">
                    <textarea class="form-control" readonly id="nama_kelas" name="rencana_perbaikan" >{{ $row==""?"":$row->rencana_perbaikan }}</textarea>
                </div>
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
        
        <!--<a href="#" class="btn btn-warning waves-effect waves-light" onclick="jsadd('material',1);"><i class="fa fa-plus" aria-hidden="true"></i></a>-->
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
                                $no=1;
                                foreach ($listmaterial as $material){
                                ?>
                                <tr>
                                    <td><div class="autocomplete" style="width:300px;">
                                            <input readonly type="text" size="18" id="m<?php echo $material->baris_no;?>" value="<?php echo $material->keterangan;?>" name="nama[]" onkeypress="jscaridt(this);" >
                                            </div>
                                       </td>
                                       <td><input type="hidden" value="1" size="2" name="jns[]" id="m<?php echo $material->baris_no;?>_jns">
                                           <input readonly type="text" size="2" name="pn[]"  value="<?php echo $material->keterangan_tambahan;?>" id="m<?php echo $material->baris_no;?>_pn"></td> 
                                       <td><input readonly type="text" size="2" onkeypress="validate(event);" id="m<?php echo $material->baris_no;?>_qty" name="qty[]" value="<?php echo $material->estimasi_jumlah;?>"  onblur="jshitung(this);"></td> 
                                        <td><input readonly type="text" size="2" readonly name="satuan[]" value="<?php echo $material->satuan;?>"  id="m<?php echo $material->baris_no;?>_satuan">
                                        <input readonly type="hidden" size="2" id="m<?php echo $material->baris_no;?>_id" value="<?php echo $material->base_id;?>"  name="id[]"></td>
                                        <td><input readonly type="text" size="2" id="m<?php echo $material->baris_no;?>_harga" value="<?php echo $material->estimasi_harga;?>" onblur="jshitung(this);" name="harga[]"></td>
                                        <td><input readonly type="text" size="2" readonly id="m<?php echo $material->baris_no;?>_total" value="<?php echo $material->estimasi_harga_total;?>"  name="total[]"> 
                                            <!--<i onclick="jsdel(this);" id="m<?php echo $material->baris_no;?>_del" class="fa fa-trash"></i>-->
                                        </td>
                                        
                                </tr>
                                <?php
                                $no++;
                                }
                                ?>
                        
        </table>
        <input type="hidden" id="totalmaterial">
        <input type="hidden" id="totaltools">
        <input type="hidden" id="totalpersonil">
        <input type="hidden" id="totalmesin">
        
        Total : <input type="text" readonly style="background-color: #e9e9e9;" value="0" id="totalmaterialacc" class="form-control" size="3">
        <script>
            $(document).ready(function(){
                //setInterval(function(){ alert("Hello"); }, 3000);
                jstotal();
              });
            
            </script>
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
            var i=0;var jum=0;
            $('#material tr').each(function() {
                if($.trim($('#m'+i+'_total').val())!=''){
                    jum=jum+parseInt($('#m'+i+'_total').val());
                    
                }
                i++;
            });
            $('#totalmaterial').val(jum);
            $('#totalmaterialacc').val(formatMoney(jum));
            
            var i=0;var jum2=0;
            $('#tools tr').each(function() {
                if($.trim($('#t'+i+'_total').val())!=''){
                    jum2=jum2+parseInt($('#t'+i+'_total').val());
                }
                i++;
                
            });
            $('#totaltools').val(jum2);
            $('#totaltoolsacc').val(formatMoney(jum2));
            
            var i=0;var jum3=0;
            $('#personil tr').each(function() {
                if($.trim($('#p'+i+'_total').val())!=''){
                    jum3=jum3+parseInt($('#p'+i+'_total').val());
                }
                i++;
                
            });
            $('#totalpersonil').val(jum3);
            $('#totalpersonilacc').val(formatMoney(jum3));
            
            var i=0;var jum4=0;
            $('#mesin tr').each(function() {
                if($.trim($('#r'+i+'_total').val())!=''){
                    jum4=jum4+parseInt($('#r'+i+'_total').val());
                }
                i++;
                
            });
            $('#totalmesin').val(jum4);
            $('#totalmesinacc').val(formatMoney(jum4));
            
//            
            $('#estimasi_biaya').val(formatMoney(parseInt($('#totalmaterial').val())+parseInt($('#totaltools').val())+parseInt($('#totalpersonil').val())+parseInt($('#totalmesin').val())));
            
            
        }
        function jsdel(id){
            var x=$(id).attr('id').split('_');
            var param={};
            param['_token']='{{ csrf_token() }}';
            var baris=x[0].replace('m','');
            baris=baris.replace('t','');
            baris=baris.replace('p','');
            param['baris_no']=baris;
            
            param['idx']='{{ $row->id }}';
            param['base_id']=$('#'+x[0]+'_id').val();
            param['keterangan']=$('#'+x[0]).val();
            param['keterangan_tambahan']=$('#'+x[0]+'_pn').val();
            param['estimasi_jumlah']=$('#'+x[0]+'_qty').val();
            param['estimasi_harga']=$('#'+x[0]+'_harga').val();
            param['estimasi_harga_total']=$('#'+x[0]+'_total').val();
            param['satuan']=$('#'+x[0]+'_satuan').val();
            param['jenis']=$('#'+x[0]+'_jns').val();
            $.post("{{ URL::to('/') }}/admin-user/delete-material", param,function(data){
                jstotal();
                $(id).parents('tr').remove();
                $('#jumlahbarismaterial').val($('#material tr').length);
                $('#jumlahbaristools').val($('#tools tr').length);
                $('#jumlahbarispersonil').val($('#personil tr').length);
            });
            
            
        }
        function jsadd(x,jns){
            $('#jumlahbaris'+x).val($('#'+x+' tr').length);
            //alert(n);
            if(jns==1){
                n=$('#'+x+' tr').length;
                $('#'+x+' tr:last').after('<tr><td><div class="autocomplete" style="width:300px;"><input type="text" name="nama[]" size="18" id="m'+n+'"  onkeypress="jscaridt(this);" ></div></td><td><input type="hidden" value="1" size="2" name="jns[]" id="m'+n+'_jns"><input type="text" name="pn[]" size="2" id="m'+n+'_pn"></td><td><input type="text" onkeypress="validate(event);" name="qty[]" size="2" id="m'+n+'_qty" onblur="jshitung(this);"></td><td><input type="hidden" name="id[]" size="2" readonly id="m'+n+'_id"><input type="text" name="satuan[]" size="2" readonly id="m'+n+'_satuan"></td><td><input type="text" size="2" onblur="jshitung(this);" name="harga[]" id="m'+n+'_harga"></td><td><input type="text" size="2" name="total[]" readonly id="m'+n+'_total">  <i onclick="jsdel(this);" id="m'+n+'_del" class="fa fa-trash"></i></td></tr>');
            }
            if(jns==2){
                n=$('#'+x+' tr').length;
                $('#'+x+' tr:last').after('<tr><td><div class="autocomplete" style="width:300px;"><input type="text" name="tnama[]" size="18" id="t'+n+'"  onkeypress="jscaridt(this);" ></div></td><td><input type="hidden" value="2" size="2" name="tjns[]" id="t'+n+'_jns"><input type="text" name="tpn[]" size="2" id="t'+n+'_pn"></td><td><input type="text" onkeypress="validate(event);" name="tqty[]" size="2" id="t'+n+'_qty" onblur="jshitung(this);"></td><td><input type="hidden" name="tid[]" size="2" readonly id="t'+n+'_id"><input type="text" name="tsatuan[]" size="2" readonly id="t'+n+'_satuan"></td><td><input type="text" onblur="jshitung(this);" size="2" name="tharga[]" id="t'+n+'_harga"></td><td><input type="text" size="2" name="ttotal[]" readonly id="t'+n+'_total">  <i onclick="jsdel(this);" id="t'+n+'_del" class="fa fa-trash"></i></td></tr>');
            }
            if(jns==3){
                n=$('#'+x+' tr').length;
                $('#'+x+' tr:last').after('<tr><td><div class="autocomplete" style="width:300px;"><input type="text" name="pnama[]" size="18" id="p'+n+'"  onkeypress="jscaridt(this);" ></div></td><td><input type="hidden" value="3" size="2" name="pjns[]" id="p'+n+'_jns"><input type="text" name="ppn[]" size="10" id="p'+n+'_pn"></td><td><input type="text" onkeypress="validate(event);" name="pqty[]" size="2" id="p'+n+'_qty" onblur="jshitung(this);"></td><td><input type="hidden" name="pid[]" size="2" readonly id="p'+n+'_id"><input type="text" name="psatuan[]" size="2" readonly id="p'+n+'_satuan"></td><td><input type="text" onblur="jshitung(this);" size="2" name="pharga[]" id="p'+n+'_harga"></td><td><input type="text" size="2" name="ptotal[]" readonly id="p'+n+'_total">  <i onclick="jsdel(this);" id="p'+n+'_del" class="fa fa-trash"></i></td></tr>');
            }
            if(jns==4){
                n=$('#'+x+' tr').length;
                $('#'+x+' tr:last').after('<tr><td><div class="autocomplete" style="width:300px;"><input type="text" name="rnama[]" size="18" id="r'+n+'"  onkeypress="jscaridt(this);" ></div></td><td><input type="hidden" value="4" size="2" name="rjns[]" id="r'+n+'_jns"><input type="text" name="rpn[]" size="2" id="r'+n+'_pn"></td><td><input type="text" onkeypress="validate(event);" name="rqty[]" size="2" id="r'+n+'_qty" onblur="jshitung(this);"></td><td><input type="hidden" name="rid[]" size="2" readonly id="r'+n+'_id"><input type="text" name="rsatuan[]" size="2" readonly id="r'+n+'_satuan"></td><td><input type="text" onblur="jshitung(this);" size="2" name="rharga[]" id="r'+n+'_harga"></td><td><input type="text" size="2" name="rtotal[]" readonly id="r'+n+'_total">  <i onclick="jsdel(this);" id="r'+n+'_del" class="fa fa-trash"></i></td></tr>');
            }
            if(jns==6){
                n=$('#'+x+' tr').length;
                $('#'+x+' tr:last').after('<tr><td width="50" height="30"><input type="hidden" name="visid[]" value=""><input  type="file" name="vis_filename[]" id="input-file-now-custom-1"  data-default-file=""  /></td><td width="50" height="30"><input type="hidden" name="dimid[]" value=""><input type="file" name="dim_filename[]" id="input-file-now-custom-1"  data-default-file=""  /></td></tr> ');
            }
            
            
            
            
        }
//        function jshitung(id){
//            var x=$(id).attr('id').split('_');
//            $('#'+x[0]+'_total').val(parseInt($('#'+x[0]+'_qty').val())*parseInt($('#'+x[0]+'_harga').val()));
//            var param={};
//            param['_token']='{{ csrf_token() }}';
//            var baris=x[0].replace('m','');
//            baris=baris.replace('t','');
//            baris=baris.replace('p','');
//            baris=baris.replace('r','');
//            
//            param['baris_no']=baris;
//            
//            param['idx']='{{ $row->id }}';
//            param['base_id']=$('#'+x[0]+'_id').val();
//            param['keterangan']=$('#'+x[0]).val();
//            param['keterangan_tambahan']=$('#'+x[0]+'_pn').val();
//            param['estimasi_jumlah']=$('#'+x[0]+'_qty').val();
//            param['estimasi_harga']=$('#'+x[0]+'_harga').val();
//            param['estimasi_harga_total']=$('#'+x[0]+'_total').val();
//            param['satuan']=$('#'+x[0]+'_satuan').val();
//            param['jenis']=$('#'+x[0]+'_jns').val();
//            //jstotal();
//            $.post("{{ URL::to('/') }}/admin-user/save-material", param,function(data){
//                jstotal();
//            });
//            
//            
//        }
        
        function jsmaterial(id){
            var param={};
            var arr={};
            param['_token']='{{ csrf_token() }}';
            x=$(id).val().split('-');
            
            param['jns']=$('#'+$(id).attr('id')+'_jns').val();
            if(param['jns']==5){
                param['id']=$(id).val();
            }else{
                param['id']=x[1];
            }
            $.post("{{ URL::to('/') }}/admin-user/detail-material", param,function(data){
                arr=data.split('~');
                if($('#'+$(id).attr('id')+'_jns').val()!=5){
                    if($('#'+$(id).attr('id')+'_jns').val()==3){
                        $('#'+$(id).attr('id')+'_harga').val(arr[0]);
                        $('#'+$(id).attr('id')+'_satuan').val(arr[1]);
                        $('#'+$(id).attr('id')+'_id').val(arr[2]);
                        $('#'+$(id).attr('id')+'_pn').val(arr[3]);
                        
                    }else{
                        $('#'+$(id).attr('id')+'_harga').val(arr[0]);
                        $('#'+$(id).attr('id')+'_satuan').val(arr[1]);
                        $('#'+$(id).attr('id')+'_id').val(arr[2]);
                    }
                
                }else{
                    $('#wo').val(arr[0]);
                    $('#register').val(arr[1]);
                    $('#user').val(arr[2]);
                    $('#serahterima_form_id').val(arr[3]);
                    
                }
                
                //autocomplete(document.getElementById("myInput"),arr);
            });
        }
        function jscaridt(id,jns){
            var param={};
            var arr={};
            
            param['_token']='{{ csrf_token() }}';
            param['material_name']=$(id).val();
            param['jns']=$('#'+$(id).attr('id')+'_jns').val();
            $.post("{{ URL::to('/') }}/admin-user/inspeksi-material", param,function(data){
                arr=data.split(',');
                autocomplete($(id)[0],arr);
                
            });
        }
        function autocomplete(inp,arr) {
            
            
          /*the autocomplete function takes two arguments,
          the text field element and an array of possible autocompleted values:*/
          var currentFocus;
          /*execute a function when someone writes in the text field:*/
          inp.addEventListener("input", function(e) {
              var a, b, i, val = this.value;
              /*close any already open lists of autocompleted values*/
              closeAllLists();
              if (!val) { return false;}
              currentFocus = -1;
              /*create a DIV element that will contain the items (values):*/
              a = document.createElement("DIV");
              a.setAttribute("id", this.id + "autocomplete-list");
              a.setAttribute("class", "autocomplete-items");
              /*append the DIV element as a child of the autocomplete container:*/
              this.parentNode.appendChild(a);
              /*for each item in the array...*/
              for (i = 0; i < arr.length; i++) {
                /*check if the item starts with the same letters as the text field value:*/
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                  /*create a DIV element for each matching element:*/
                  b = document.createElement("DIV");
                  /*make the matching letters bold:*/
                  b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                  b.innerHTML += arr[i].substr(val.length);
                  /*insert a input field that will hold the current array item's value:*/
                  b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                  /*execute a function when someone clicks on the item value (DIV element):*/
                  b.addEventListener("click", function(e) {
                      /*insert the value for the autocomplete text field:*/
                      inp.value = this.getElementsByTagName("input")[0].value;
                      /*close the list of autocompleted values,
                      (or any other open lists of autocompleted values:*/
                      closeAllLists();
                  });
                  a.appendChild(b);
                }
              }
          });
          /*execute a function presses a key on the keyboard:*/
          inp.addEventListener("keydown", function(e) {
              var x = document.getElementById(this.id + "autocomplete-list");
              if (x) x = x.getElementsByTagName("div");
              if (e.keyCode == 40) {
                /*If the arrow DOWN key is pressed,
                increase the currentFocus variable:*/
                currentFocus++;
                /*and and make the current item more visible:*/
                addActive(x);
              } else if (e.keyCode == 38) { //up
                /*If the arrow UP key is pressed,
                decrease the currentFocus variable:*/
                currentFocus--;
                /*and and make the current item more visible:*/
                addActive(x);
              } else if (e.keyCode == 13) {
                  
                /*If the ENTER key is pressed, prevent the form from being submitted,*/
                e.preventDefault();
                if (currentFocus > -1) {
                  /*and simulate a click on the "active" item:*/
                  
                  if (x) {
                      x[currentFocus].click();
                      jsmaterial(this.id);
                  }
                }
              }
          });
          function addActive(x) {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*add class "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
          }
          function removeActive(x) {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) {
              x[i].classList.remove("autocomplete-active");
            }
          }
          function closeAllLists(elmnt) {
            /*close all autocomplete lists in the document,
            except the one passed as an argument:*/
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
              if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
                //alert($(inp).val());
                jsmaterial(inp);
                //alert('tess2');
              }
            }
            
          }
          /*execute a function when someone clicks in the document:*/
          document.addEventListener("click", function (e) {
              closeAllLists(e.target);
              //alert(e);
          });
        }
        
        /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
        //autocomplete(document.getElementById("myInput"), countries);
        </script>

    </div>
    <div class="tab-pane fade" role="tabpanel" id="profile2" aria-labelledby="profile-tab2">
        <!--<a href="#" class="btn btn-warning waves-effect waves-light" onclick="jsadd('tools',2);"><i class="fa fa-plus" aria-hidden="true"></i></a>-->
        <br><br><table class="table table-bordered" id="tools">        
                                <tr>
                                        <td>Nama Tools</td>
                                        <td>SN</td> 
                                        <td>Jumlah</td> 
                                        <td>Satuan</td>
                                        <td>Est Harga</td>
                                        <td>Est Total</td>
                                        
                                </tr> 
                            <?php
                            $no=1;
                            foreach ($listtools as $tools){
                            ?>
                                <tr>
                                    <td><div class="autocomplete" style="width:300px;">
                                            <input readonly type="text" size="18" id="t<?php echo $tools->baris_no;?>" value="<?php echo $tools->keterangan;?>" name="tnama[]"  onkeypress="jscaridt(this);" >
                                            </div>
                                       </td>
                                       <td><input readonly type="hidden" value="2" size="2" name="tjns[]" id="t<?php echo $tools->baris_no;?>_jns">
                                           <input readonly type="text" size="2" name="tpn[]"  value="<?php echo $tools->keterangan_tambahan;?>" id="t<?php echo $tools->baris_no;?>_pn"></td> 
                                       <td><input readonly type="text" size="2" onkeypress="validate(event);" id="t<?php echo $tools->baris_no;?>_qty"  value="<?php echo $tools->estimasi_jumlah;?>" name="tqty[]" onblur="jshitung(this);"></td> 
                                        <td><input readonly type="text" size="2" readonly name="tsatuan[]"  value="<?php echo $tools->satuan;?>" id="t<?php echo $tools->baris_no;?>_satuan">
                                        <input readonly type="hidden" size="2" id="t<?php echo $tools->baris_no;?>_id"  value="<?php echo $tools->base_id;?>" name="tid[]"></td>
                                        <td><input readonly type="text" size="2" id="t<?php echo $tools->baris_no;?>_harga" onblur="jshitung(this);"  value="<?php echo $tools->estimasi_harga;?>" name="tharga[]"></td>
                                        <td><input readonly type="text" size="2" readonly   value="<?php echo $tools->estimasi_harga_total;?>" id="t<?php echo $tools->baris_no;?>_total" name="ttotal[]"> 
                                            <!--<i onclick="jsdel(this);"  id="t<?php echo $tools->baris_no;?>_del" class="fa fa-trash"></i>-->
                                        </td>
                                        
                                </tr> 
                            <?php
                            $no++;
                            }
                            ?>
                        
        </table>
        Total : <input type="text" readonly style="background-color: #e9e9e9;" value="0" id="totaltoolsacc" class="form-control" size="3">

    </div>
    <div class="tab-pane fade" role="tabpanel" id="profile3" aria-labelledby="profile-tab3">
        <!--<a href="#" class="btn btn-warning waves-effect waves-light" onclick="jsadd('personil',3);"><i class="fa fa-plus" aria-hidden="true"></i></a>-->
        <br><br><table class="table table-bordered" id="personil">        
                                <tr>
                                        <td>Nama Personil</td>
                                        <td>Jabatan</td> 
                                        <td>Durasi/jam</td> 
                                        <td>Satuan</td>
                                        <td>Est Harga</td>
                                        <td>Est Total</td>
                                        
                                </tr> 
                        
                                <?php
                                $no=1;
                                    foreach ($listpersonil as $personil){
                                ?>
                                <tr>
                                    <td><div class="autocomplete" style="width:300px;">
                                            <input readonly type="text" size="18" id="p<?php echo $personil->baris_no;?>" value="<?php echo $personil->keterangan;?>" name="pnama[]" onkeypress="jscaridt(this);" >
                                            </div>
                                       </td>
                                       <td><input readonly type="hidden" value="3" size="2" name="pjns[]" id="p<?php echo $personil->baris_no;?>_jns">
                                           
                                           <input readonly type="text" size="10" name="ppn[]"  value="<?php echo $personil->keterangan_tambahan;?>" id="p<?php echo $personil->baris_no;?>_pn"></td> 
                                       <td><input readonly type="text" size="2" onkeypress="validate(event);" id="p<?php echo $personil->baris_no;?>_qty" name="pqty[]" value="<?php echo $personil->estimasi_jumlah;?>"  onblur="jshitung(this);"></td> 
                                        <td><input readonly type="text" size="2" readonly name="psatuan[]" value="<?php echo $personil->satuan;?>"  id="p<?php echo $personil->baris_no;?>_satuan">
                                        <input readonly type="hidden" size="2" id="p<?php echo $personil->baris_no;?>_id" value="<?php echo $personil->base_id;?>"  name="pid[]"></td>
                                        <td><input readonly type="text" onblur="jshitung(this);" size="2" id="p<?php echo $personil->baris_no;?>_harga" value="<?php echo $personil->estimasi_harga;?>"  name="pharga[]"></td>
                                        <td><input readonly type="text" size="2" readonly id="p<?php echo $personil->baris_no;?>_total" value="<?php echo $personil->estimasi_harga_total;?>"  name="ptotal[]"> 
                                            <!--<i onclick="jsdel(this);" <?php echo $personil->baris_no;?> id="p<?php echo $personil->baris_no;?>_del" class="fa fa-trash"></i>-->
                                        </td>
                                        
                                </tr> 
                                <?php
                                $no++;
                                    }
                                ?>
                        
        </table>
        Total : <input type="text" readonly style="background-color: #e9e9e9;" value="0" id="totalpersonilacc" class="form-control" size="3">

    </div>
    <div class="tab-pane fade" role="tabpanel" id="profile4" aria-labelledby="profile-tab4">
        <!--<a href="#" class="btn btn-warning waves-effect waves-light" onclick="jsadd('mesin',4);"><i class="fa fa-plus" aria-hidden="true"></i></a>-->
        <br><br><table class="table table-bordered" id="mesin">        
                                <tr>
                                        <td>Nama Mesin</td>
                                        <td>Keterangan</td> 
                                        <td>Durasi/jam</td> 
                                        <td>Satuan</td>
                                        <td>Est Harga</td>
                                        <td>Est Total</td>
                                        
                                </tr> 
                                <?php
                                $no=1;
                                    foreach ($listmesin as $mesin){
                                ?>
                                <tr>
                                    <td><div class="autocomplete" style="width:300px;">
                                            <input readonly type="text" size="10" id="r<?php echo $mesin->baris_no;?>" value="<?php echo $mesin->keterangan;?>" name="rnama[]" onkeypress="jscaridt(this);" >
                                            </div>
                                       </td>
                                       <td><input readonly type="hidden" value="3" size="2" name="rjns[]" id="r<?php echo $mesin->baris_no;?>_jns">
                                           <input readonly type="text" size="2" name="rpn[]"  value="<?php echo $mesin->keterangan_tambahan;?>" id="r<?php echo $mesin->baris_no;?>_pn"></td> 
                                       <td><input readonly type="text" size="2" id="r<?php echo $mesin->baris_no;?>_qty" name="rqty[]" value="<?php echo $mesin->estimasi_jumlah;?>"  onblur="jshitung(this);"></td> 
                                        <td><input readonly type="text" size="2" readonly name="rsatuan[]" value="<?php echo $mesin->satuan;?>"  id="r<?php echo $mesin->baris_no;?>_satuan">
                                        <input readonly type="hidden" size="2" id="r<?php echo $mesin->baris_no;?>_id" value="<?php echo $mesin->base_id;?>"  name="rid[]"></td>
                                        <td><input readonly type="text" onblur="jshitung(this);" size="2" id="r<?php echo $mesin->baris_no;?>_harga" value="<?php echo $mesin->estimasi_harga;?>"  name="rharga[]"></td>
                                        <td><input readonly type="text" size="2" readonly id="r<?php echo $mesin->baris_no;?>_total" value="<?php echo $mesin->estimasi_harga_total;?>"  name="rtotal[]"> 
                                            <!--<i onclick="jsdel(this);" <?php echo $tools->baris_no;?> id="r<?php echo $mesin->baris_no;?>_del" class="fa fa-trash"></i>-->
                                        </td>
                                        
                                </tr> 
                                <?php
                                $no++;
                                    }
                                ?>
                        
        </table>
        Total : <input type="text" readonly style="background-color: #e9e9e9;" value="0" id="totalmesinacc" class="form-control" size="3">

    </div>
    <div class="tab-pane fade" role="tabpanel" id="profile5" aria-labelledby="profile-tab5">
        <!--<a href="#" class="btn btn-warning waves-effect waves-light" onclick="jsadd('files',6);"><i class="fa fa-plus" aria-hidden="true"></i></a>-->
        <br><br><table class="table table-bordered" id="files">        
                                <tr>
                                        <td>Visual Inspection</td>
                                        <td>Dimensional Check</td> 
                                        
                                </tr> 
                            <?php
                            $no=1;
                                foreach ($listgambar as $gambar){
                                    if($gambar->visual!=""){
                            ?>
                                <tr>
                                    <td width="50" height="30">
                                        <?php
                                        
                                        if($gambar->visual!=""){
                                        ?>
                                        <a target="blank" href="{{ URL::to('/') }}{{ $gambar->visual }}" ><i style="font-size:20px;" class="fa fa-image"></i> {{ $gambar->visual }}</a>
                                        <?php
                                        }
                                        ?>
                                        <input type="hidden" name="visid[]" value="{{ $gambar->id }}">
                                        <!--<input  type="file" name="vis_filename[]" id="input-file-now-custom-1"  data-default-file=""  />-->
                        
                                    </td>
                                    <td width="50" height="30">
                                        <?php
                                        if($gambar->dimensi!=""){
                                        ?>
                                        <a target="blank" href="{{ URL::to('/') }}{{ $gambar->dimensi }}" ><i style="font-size:20px;" class="fa fa-image"></i> {{ $gambar->dimensi }}</a>
                                        
                                        <?php
                                        }
                                        ?>
                                        <input type="hidden" name="dimid[]" value="{{ $gambar->id }}">
                                        <!--<input type="file" name="dim_filename[]" id="input-file-now-custom-1" data-default-file=""  />-->
                        
                                    </td>
                                    
                                </tr> 
                            <?php    
                                    $no++;
                                    }
                                }
                            ?>
                        
                        
        </table>
        
    </div>
<!--    <div class="tab-pane fade" role="tabpanel" id="profile6" aria-labelledby="profile-tab6">
        
        <div class="form-group row">
            <label  for="inputName" class="col-sm-4 col-form-label text-left">Verfikasi File </label>
            <div class="col-sm-6">
                <input type="file" name="verifikasi_filename" id="input-file-now-custom-1" class="dropify" data-default-file="{{ URL::to('/') }}{{ $row->verifikasi_filename }}"  />
            </div>
        </div>
    </div>-->
    
</div>
<br>
<br>

<div class="form-group row">
    <label  for="inputName" class="col-sm-12 col-form-label text-left">Rencana Inspeksi & Pengetesan </label>
                
</div>
<div class="form-group row">
    <label  for="inputName" class="col-sm-12 col-form-label text-left">
        <input value="1" disabled="true"  type="checkbox" <?php echo $row==""?"":($row->rip_dynotest_sts==1?"checked":"") ?> name="rip_dynotest_sts">  Dynotest 
        <input value="1" disabled="true"  type="checkbox" <?php echo $row==""?"":($row->rip_loadbank_sts==1?"checked":"") ?> name="rip_loadbank_sts">  Loadbank 
        <input value="1" disabled="true"  type="checkbox" <?php echo $row==""?"":($row->rip_mpo_sts==1?"checked":"") ?> name="rip_mpo_sts">  MPI 
        <input value="1" disabled="true"  type="checkbox" <?php echo $row==""?"":($row->rip_dyepenetrant_sts==1?"checked":"") ?> name="rip_dyepenetrant_sts">  Dye Penetrant 
        <input value="1" disabled="true"  type="checkbox" <?php echo $row==""?"":($row->rip_loadtest==1?"checked":"") ?> name="rip_loadtest">  Load Test 
        <input value="1" disabled="true"  type="checkbox" <?php echo $row==""?"":($row->rip_lain2_sts==1?"checked":"") ?> name="rip_lain2_sts">  Lain-lain 
        <input readonly type="text" maxlength="400" class="form-control" id="nama_kelas" name="rip_lain2_ket" value="{{ $row==""?"":$row->rip_lain2_ket }}" data-error="tess"  placeholder="keterangan Lain-lain"   >
    </label>

</div>
<div class="form-group row">
    <label  for="inputName" class="col-sm-4 col-form-label text-left">Estimasi Biaya</label>
    <div class="col-sm-6">
        <input type="text" readonly style="background-color: #e9e9e9;"  maxlength="400" class="form-control" id="estimasi_biaya" name="estimasi_biaya" value="{{ $row==""?"0":$row->estimasi_biaya }}" data-error="tess"    >
    </div>
</div>
<div class="form-group row">
    <label  for="inputName" class="col-sm-4 col-form-label text-left">Keterangan</label>
    <div class="col-sm-6">
        <textarea class="form-control" id="keteranganopen" name="keteranganopen"    >{{ $row->keteranganopen }}</textarea>
    </div>
</div>
<div class="form-group">
    <button type="submit"  class="btn btn-primary waves-effect waves-light" ><i class="fa fa-folder-open" aria-hidden="true">Open Status</i></button>

    <button type="button" onclick="window.open('/admin-user/proses-review-list/0','_self')" class="btn btn-primary waves-effect waves-light" ><i class="fa fa-rotate-left" aria-hidden="true"></i></button>

</div>


</form>



