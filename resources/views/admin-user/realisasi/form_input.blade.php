<?php
$jumtotal=0;$total=0;

?>
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
            <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Realisasi Produksi</a></li>
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
                    <input type="hidden" name="ids" value="{{ $row==""?"":$row->id }}">
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
                <label  for="inputName" class="col-sm-4 col-form-label text-left">Nomor Produksi </label>
                <div class="col-sm-6">
                    <input type="text" maxlength="400" class="form-control" id="form_no" name="form_no" value="{{ $row==""?"":$row->form_no }}" data-error="tess"  placeholder="auto" readonly   >
                </div>
            </div>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-4 col-form-label text-left">Tanggal </label>
                <div class="col-sm-6">

                    <input readonly type="date" maxlength="400" class="form-control" id="form_tanggal" name="form_tanggal" value="{{ $row==""?date('Y-m-d'):date('Y-m-d',strtotime($row->form_tanggal)) }}" data-error="tess"  >
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
        <div style="width:900px;overflow-x: auto;height: 500px;">
        <!--<a href="#" class="btn btn-warning waves-effect waves-light" onclick="jsadd('material',1);"><i class="fa fa-plus" aria-hidden="true"></i></a>-->
        <br><br><table class="table table-bordered" id="material">        
                        
                                <tr>
                                        <td>Nama Material</td>
                                        <td>D1</td> 
                                        <td>D2</td> 
                                        <td>D3</td> 
                                        <td>D4</td> 
                                        <td>D5</td> 
                                        <td>D6</td> 
                                        <td>D7</td> 
                                        <td>D8</td> 
                                        <td>D9</td> 
                                        <td>D10</td> 
                                        <td>D11</td> 
                                        <td>D12</td> 
                                        <td>D13</td> 
                                        <td>D14</td> 
                                        <td>D15</td> 
                                        <td>D16</td> 
                                        <td>D17</td> 
                                        <td>D18</td> 
                                        <td>D19</td> 
                                        <td>D20</td>
                                        <td>D21</td> 
                                        <td>D22</td> 
                                        <td>Total</td> 
                                        
                                        
                                </tr> 
                        
                            <?php
                            $no=1;
                            foreach ($listmaterial as $material){
                                $jumtotal +=$material->real_jumlah;
                                $total +=$material->real_harga_total;
                                
                                
                            ?>
                            
                            
                                <tr>
                                    <td><div class="autocomplete" style="width:300px;">
                                            
                                            <input type="text" value="{{ $material->keterangan }}" size="10" id="m{{ $no }}" name="nama[]" onkeypress="jscaridt(this);" >
                                            <input type="hidden" size="2" id="m{{ $no }}_id" name="id[]" value="{{ $material->base_id}}">
                                            <input type="hidden" value="1" size="2" name="jns[]" id="m{{ $no }}_jns">
                                            
                                        </div>
                                       </td>
                                       <?php
                                       $jum=0;
                                       for ($i=1;$i<=22;$i++){
                                           $hr="hari".$i;
                                       ?>
                                       <td>
                                           <input type="text" size="2"  onkeypress="validate(event);"  onblur="jshitung(this);" style="text-align:right;" name="md1[]" value="<?php $hr="hari".$i; echo $material->{$hr};?>" id="m{{ $no }}_d{{ $i }}">
                                       </td> 
                                       <?php
                                       $jum=$jum+$material->{$hr};
                                       }
                                       ?>
                                       
                                       <td>
                                           <input type="text" size="2"  readonly value="{{ $jum }}" name="mtotal[]" id="m{{ $no }}_total">
                                           <input type="hidden"  size="2" name="jum[]" id="m{{ $no }}_jum" value="{{ $jum }}">
                                            <input type="hidden"  size="2" name="jumharga[]" id="m{{ $no }}_jumharga"  value="{{ $jum*$material->estimasi_harga }}">
                                       </td> 
                                       <td>
                                            <!--<i onclick="jsdel(this);" id="m{{ $no }}_del" class="fa fa-trash"></i>-->
                                       </td>
                                        
                                </tr>
                                <?php
                                $no++;
                            }
                                ?>
                        
                        
        </table>
        </div>
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
        
        function jsdel(id){
            if(confirm('yakin hapus ? ')==false){
                return false;
            }
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
            $.post("{{ URL::to('/') }}/admin-user/delete-material-produksi", param,function(data){
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
                $('#'+x+' tr:last').after('<tr><td><div class="autocomplete" style="width:300px;"><input type="text" size="10" id="m'+x+'" name="nama[]" onkeypress="jscaridt(this);" ><input type="hidden" size="2" id="m'+x+'_id" name="id[]"><input type="hidden" value="1" size="2" name="jns[]" id="m'+x+'_jns"></div></td><td><input type="text" size="2"  onkeypress="validate(event);"  onblur="jshitung(this);" style="text-align:right;" name="md1[]" id="m'+x+'_d1"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md2[]" id="m'+x+'_d2"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md3[]" id="m'+x+'_d3"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md4[]" id="m'+x+'_d4"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md5[]" id="m'+x+'_d5"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md6[]" id="m'+x+'_d6"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md7[]" id="m'+x+'_d7"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md8[]" id="m'+x+'_d8"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md9[]" id="m'+x+'_d9"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md10[]" id="m'+x+'_d10"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md11[]" id="m'+x+'_d11"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md12[]" id="m'+x+'_d12"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md13[]" id="m'+x+'_d13"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md14[]" id="m'+x+'_d14"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md15[]" id="m'+x+'_d15"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md16[]" id="m'+x+'_d16"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md17[]" id="m'+x+'_d17"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md18[]" id="m'+x+'_d18"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md19[]" id="m'+x+'_d19"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md20[]" id="m'+x+'_d20"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md21[]" id="m'+x+'_d21"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md22[]" id="m'+x+'_d22"></td><td><input type="text" size="2"  readonly name="mtotal[]" id="m'+x+'_total"></td><td><i onclick="jsdel(this);" id="m'+x+'_del" class="fa fa-trash"></i></td></tr>');
                
            }
            if(jns==2){
                n=$('#'+x+' tr').length;
                $('#'+x+' tr:last').after('<tr><td><div class="autocomplete" style="width:300px;"><input type="text" size="10" id="t'+x+'" name="nama[]" onkeypress="jscaridt(this);" ><input type="hidden" size="2" id="t'+x+'_id" name="id[]"><input type="hidden" value="1" size="2" name="jns[]" id="t'+x+'_jns"></div></td><td><input type="text" size="2"  onkeypress="validate(event);"  onblur="jshitung(this);" style="text-align:right;" name="md1[]" id="t'+x+'_d1"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md2[]" id="t'+x+'_d2"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md3[]" id="t'+x+'_d3"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md4[]" id="t'+x+'_d4"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md5[]" id="t'+x+'_d5"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md6[]" id="t'+x+'_d6"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md7[]" id="t'+x+'_d7"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md8[]" id="t'+x+'_d8"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md9[]" id="t'+x+'_d9"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md10[]" id="t'+x+'_d10"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md11[]" id="t'+x+'_d11"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md12[]" id="t'+x+'_d12"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md13[]" id="t'+x+'_d13"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md14[]" id="t'+x+'_d14"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md15[]" id="t'+x+'_d15"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md16[]" id="t'+x+'_d16"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md17[]" id="t'+x+'_d17"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md18[]" id="t'+x+'_d18"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md19[]" id="t'+x+'_d19"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md20[]" id="t'+x+'_d20"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md21[]" id="t'+x+'_d21"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md22[]" id="t'+x+'_d22"></td><td><input type="text" size="2"  readonly name="mtotal[]" id="t'+x+'_total"></td><td><i onclick="jsdel(this);" id="t'+x+'_del" class="fa fa-trash"></i></td></tr>');
                
            }
            if(jns==3){
                n=$('#'+x+' tr').length;
                $('#'+x+' tr:last').after('<tr><td><div class="autocomplete" style="width:300px;"><input type="text" size="10" id="p'+x+'" name="nama[]" onkeypress="jscaridt(this);" ><input type="hidden" size="2" id="p'+x+'_id" name="id[]"><input type="hidden" value="1" size="2" name="jns[]" id="p'+x+'_jns"></div></td><td><input type="text" size="2"  onkeypress="validate(event);"  onblur="jshitung(this);" style="text-align:right;" name="md1[]" id="p'+x+'_d1"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md2[]" id="p'+x+'_d2"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md3[]" id="p'+x+'_d3"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md4[]" id="p'+x+'_d4"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md5[]" id="p'+x+'_d5"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md6[]" id="p'+x+'_d6"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md7[]" id="p'+x+'_d7"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md8[]" id="p'+x+'_d8"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md9[]" id="p'+x+'_d9"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md10[]" id="p'+x+'_d10"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md11[]" id="p'+x+'_d11"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md12[]" id="p'+x+'_d12"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md13[]" id="p'+x+'_d13"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md14[]" id="p'+x+'_d14"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md15[]" id="p'+x+'_d15"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md16[]" id="p'+x+'_d16"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md17[]" id="p'+x+'_d17"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md18[]" id="p'+x+'_d18"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md19[]" id="p'+x+'_d19"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md20[]" id="p'+x+'_d20"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md21[]" id="p'+x+'_d21"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md22[]" id="p'+x+'_d22"></td><td><input type="text" size="2"  readonly name="mtotal[]" id="p'+x+'_total"></td><td><i onclick="jsdel(this);" id="p'+x+'_del" class="fa fa-trash"></i></td></tr>');
                
            }
            if(jns==4){
                n=$('#'+x+' tr').length;
                $('#'+x+' tr:last').after('<tr><td><div class="autocomplete" style="width:300px;"><input type="text" size="10" id="r'+x+'" name="nama[]" onkeypress="jscaridt(this);" ><input type="hidden" size="2" id="r'+x+'_id" name="id[]"><input type="hidden" value="1" size="2" name="jns[]" id="r'+x+'_jns"></div></td><td><input type="text" size="2"  onkeypress="validate(event);"  onblur="jshitung(this);" style="text-align:right;" name="md1[]" id="r'+x+'_d1"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md2[]" id="r'+x+'_d2"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md3[]" id="r'+x+'_d3"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md4[]" id="r'+x+'_d4"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md5[]" id="r'+x+'_d5"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md6[]" id="r'+x+'_d6"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md7[]" id="r'+x+'_d7"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md8[]" id="r'+x+'_d8"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md9[]" id="r'+x+'_d9"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md10[]" id="r'+x+'_d10"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md11[]" id="r'+x+'_d11"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md12[]" id="r'+x+'_d12"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md13[]" id="r'+x+'_d13"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md14[]" id="r'+x+'_d14"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md15[]" id="r'+x+'_d15"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md16[]" id="r'+x+'_d16"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md17[]" id="r'+x+'_d17"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md18[]" id="r'+x+'_d18"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md19[]" id="r'+x+'_d19"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md20[]" id="r'+x+'_d20"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md21[]" id="r'+x+'_d21"></td><td><input type="text" size="2"  onkeypress="validate(event);" onblur="jshitung(this);" style="text-align:right;" name="md22[]" id="r'+x+'_d22"></td><td><input type="text" size="2"  readonly name="mtotal[]" id="r'+x+'_total"></td><td><i onclick="jsdel(this);" id="r'+x+'_del" class="fa fa-trash"></i></td></tr>');
                
            }
            
            
            
        }
        function jshitung(id){
            var x=$(id).attr('id').split('_');
            var jum=0;
            for(var i=1;i<=22;i++){
                if($('#'+x[0]+'_d'+i).val()!=''){
                    jum=jum+parseInt($('#'+x[0]+'_d'+i).val());
                }
                
            }
            $('#'+x[0]+'_total').val(jum);
            var param={};
            param['_token']='{{ csrf_token() }}';
            var baris=x[0].replace('m','');
            baris=baris.replace('t','');
            baris=baris.replace('p','');
            baris=baris.replace('r','');
            
            param['baris_no']=baris;
            
            param['idx']='{{ $row->id }}';
            param['base_id']=$('#'+x[0]+'_id').val();
            for(var i=1;i<=22;i++){
                
                    param['d'+i]=$('#'+x[0]+'_d'+i).val();
                
                
            }
            param['jenis']=$('#'+x[0]+'_jns').val();
            $.post("{{ URL::to('/') }}/admin-user/save-material-realisasi", param,function(data){
                var dt=data.split('~');
                $('#'+x[0]+'_jum').val(dt[0]);
                $('#'+x[0]+'_jumharga').val(dt[1]);
                jstotal();
            });
            
            
        }
        function jstotal(){
            var i=1;var jum=0;var jumharga=0;
            $('#material tr').each(function() {
                if($.trim($('#m'+i+'_jum').val())!=''){
                    jum=parseInt(jum)+parseInt($('#m'+i+'_jum').val());
                    jumharga=parseInt(jumharga)+parseInt($('#m'+i+'_jumharga').val());
                    
                    
                }
                i++;
            });
            var i=1;
            $('#tools tr').each(function() {
                if($.trim($('#t'+i+'_jum').val())!=''){
                    jum=parseInt(jum)+parseInt($('#t'+i+'_jum').val());
                    jumharga=parseInt(jumharga)+parseInt($('#t'+i+'_jumharga').val());
                    
                    
                }
                i++;
                
            });
            
            
            var i=1;
            $('#personil tr').each(function() {
                if($.trim($('#p'+i+'_jum').val())!=''){
                    jum=parseInt(jum)+parseInt($('#p'+i+'_jum').val());
                    jumharga=parseInt(jumharga)+parseInt($('#p'+i+'_jumharga').val());
                    
                    
                }
                i++;
                
            });
            
            
            var i=1;var jum4=0;
            $('#mesin tr').each(function() {
                if($.trim($('#r'+i+'_jum').val())!=''){
                    jum=parseInt(jum)+parseInt($('#r'+i+'_jum').val());
                    jumharga=parseInt(jumharga)+parseInt($('#r'+i+'_jumharga').val());
                    
                    
                }
                i++;
                
            });
            $('#totaljam').val(formatMoney(jum));
            $('#totalharga').val(formatMoney(jumharga));
            
            
        }
        function jsmaterial(id){
            var param={};
            var arr={};
            param['_token']='{{ csrf_token() }}';
            x=$(id).val().split('-');
            
            param['jns']=$('#'+$(id).attr('id')+'_jns').val();
            param['id']=x[1];
            
            $.post("{{ URL::to('/') }}/admin-user/detail-material", param,function(data){
                arr=data.split('~');
                $('#'+$(id).attr('id')+'_id').val(arr[2]);
                
            });
        }
        function jscaridt(id,jns){
            var param={};
            var arr={};
            
            param['_token']='{{ csrf_token() }}';
            param['material_name']=$(id).val();
            param['jns']=$('#'+$(id).attr('id')+'_jns').val();
            $.post("{{ URL::to('/') }}/admin-user/produksi-material", param,function(data){
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
        <div style="width:900px;overflow-x: auto;height: 500px;">
        <!--<a href="#" class="btn btn-warning waves-effect waves-light" onclick="jsadd('tools',2);"><i class="fa fa-plus" aria-hidden="true"></i></a>-->
        <br><br><table class="table table-bordered" id="tools">        
                       
                                <tr>
                                        <td>Nama Tools</td>
                                        <td>D1</td> 
                                        <td>D2</td> 
                                        <td>D3</td> 
                                        <td>D4</td> 
                                        <td>D5</td> 
                                        <td>D6</td> 
                                        <td>D7</td> 
                                        <td>D8</td> 
                                        <td>D9</td> 
                                        <td>D10</td> 
                                        <td>D11</td> 
                                        <td>D12</td> 
                                        <td>D13</td> 
                                        <td>D14</td> 
                                        <td>D15</td> 
                                        <td>D16</td> 
                                        <td>D17</td> 
                                        <td>D18</td> 
                                        <td>D19</td> 
                                        <td>D20</td>
                                        <td>D21</td> 
                                        <td>D22</td> 
                                        <td>Total</td> 
                                </tr> 
                        
                            <?php
                            $no=1;
                            foreach ($listtools as $tool){
                                $jumtotal +=$tool->real_jumlah;
                                $total +=$tool->real_harga_total;
                            ?>
                                <tr>
                                    <td><div class="autocomplete" style="width:300px;">
                                            
                                            <input type="text" size="10" id="t{{ $no }}" name="nama[]" value="{{ $tool->keterangan }}" onkeypress="jscaridt(this);" >
                                            <input type="hidden" size="2" id="t{{ $no }}_id" name="id[]" value="{{ $tool->base_id }}">
                                            <input type="hidden" value="2" size="2" name="jns[]" id="t{{ $no }}_jns">
                                            
                                        </div>
                                       </td>
                                       <?php
                                       $jum=0;
                                       for($i=1;$i<=22;$i++){
                                           $hr="hari".$i;
                                       ?>
                                       <td>
					   <input type="text" size="2"  onkeypress="validate(event);"  onblur="jshitung(this);" style="text-align:right;" name="md1[]" value="{{ $tool->{$hr} }}" id="t<?php echo $no;?>_d{{ $i }}">
                                       </td> 
                                       <?php
                                            $jum=$jum+$tool->{$hr};
                                       }
                                       ?>
                                       <td>
                                           <input type="text" size="2" value="{{ $jum }}"  readonly name="mtotal[]" id="t{{ $no }}_total">
                                           <input type="hidden"  size="2" name="jum[]" id="t{{ $no }}_jum" value="{{ $jum }}">
                                            <input type="hidden"  size="2" name="jumharga[]" id="t{{ $no }}_jumharga" value="{{ $tool->estimasi_harga*$jum }}">
                                       </td> 
                                       <td>
                                            <!--<i onclick="jsdel(this);" id="t{{ $no }}_del" class="fa fa-trash"></i>-->
                                       </td>
                                        
                                </tr> 
                                <?php
                                $no++;
                                }
                                ?>
                        
                        
        </table>
        </div>
    </div>
    <div class="tab-pane fade" role="tabpanel" id="profile3" aria-labelledby="profile-tab3">
        <div style="width:900px;overflow-x: auto;height: 500px;">
        <!--<a href="#" class="btn btn-warning waves-effect waves-light" onclick="jsadd('personil',3);"><i class="fa fa-plus" aria-hidden="true"></i></a>-->
        <br><br><table class="table table-bordered" id="personil">        
                        
                                <tr>
                                        <td>Nama Personil</td>
                                        <td>D1</td> 
                                        <td>D2</td> 
                                        <td>D3</td> 
                                        <td>D4</td> 
                                        <td>D5</td> 
                                        <td>D6</td> 
                                        <td>D7</td> 
                                        <td>D8</td> 
                                        <td>D9</td> 
                                        <td>D10</td> 
                                        <td>D11</td> 
                                        <td>D12</td> 
                                        <td>D13</td> 
                                        <td>D14</td> 
                                        <td>D15</td> 
                                        <td>D16</td> 
                                        <td>D17</td> 
                                        <td>D18</td> 
                                        <td>D19</td> 
                                        <td>D20</td>
                                        <td>D21</td> 
                                        <td>D22</td> 
                                        <td>Total</td> 
                                </tr> 
                       
                            <?php
                            $no=1;
                            foreach ($listpersonil as $personil){
                                $jumtotal +=$personil->real_jumlah;
                                $total +=$personil->real_harga_total;
                            ?>
                                <tr>
                                    <td><div class="autocomplete" style="width:300px;">
                                            
                                            <input type="text" size="10" value="{{ $personil->keterangan }}" id="p{{ $no }}" name="nama[]" onkeypress="jscaridt(this);" >
                                            <input type="hidden" size="2" id="p{{ $no }}_id" value="{{ $personil->base_id }}" name="id[]">
                                            <input type="hidden" value="3" size="2" name="jns[]" id="p{{ $no }}_jns">
                                           
                                        </div>
                                       </td>
                                       <?php
                                       $jum=0;
                                       for($i=1;$i<=22;$i++){
                                           $hr="hari".$i;
                                       ?>
                                       <td>
                                           <input type="text" value="{{ $personil->{$hr} }}" size="2"  onkeypress="validate(event);"  onblur="jshitung(this);" style="text-align:right;" name="md1[]" id="p{{ $no }}_d{{ $i }}">
                                       </td> 
                                       <?php
                                            $jum=$jum+$tool->{$hr};
                                       }
                                       ?>
                                       
                                       <td>
                                           <input type="text" size="2" value="{{ $jum }}"  readonly name="mtotal[]" id="p{{ $no }}_total">
                                            <input type="hidden" size="2" name="jum[]" id="p{{ $no }}_jum" value="{{ $jum }}">
                                            <input type="hidden" size="2" name="jumharga[]" id="p{{ $no }}_jumharga" value="{{ $jum*$personil->estimasi_harga }}">
                                       </td> 
                                       <td>
                                            <!--<i onclick="jsdel(this);" id="p{{ $no }}_del" class="fa fa-trash"></i>-->
                                       </td>
                                        
                                </tr> 
                                <?php
                                $no++;
                                }
                                ?>
                        
                        
        </table>
        </div>
    </div>
    <div class="tab-pane fade" role="tabpanel" id="profile4" aria-labelledby="profile-tab4">
        <div style="width:900px;overflow-x: auto;height: 500px;">
        <!--<a href="#" class="btn btn-warning waves-effect waves-light" onclick="jsadd('mesin',4);"><i class="fa fa-plus" aria-hidden="true"></i></a>-->
        <br><br><table class="table table-bordered" id="mesin">        
                                <tr>
                                        <td>Nama Mesin</td>
                                        <td>D1</td> 
                                        <td>D2</td> 
                                        <td>D3</td> 
                                        <td>D4</td> 
                                        <td>D5</td> 
                                        <td>D6</td> 
                                        <td>D7</td> 
                                        <td>D8</td> 
                                        <td>D9</td> 
                                        <td>D10</td> 
                                        <td>D11</td> 
                                        <td>D12</td> 
                                        <td>D13</td> 
                                        <td>D14</td> 
                                        <td>D15</td> 
                                        <td>D16</td> 
                                        <td>D17</td> 
                                        <td>D18</td> 
                                        <td>D19</td> 
                                        <td>D20</td>
                                        <td>D21</td> 
                                        <td>D22</td> 
                                        <td>Total</td> 
                                        
                                </tr> 
                            <?php
                            $no=1;
                            foreach ($listmesin as $mesin){
                                $jumtotal +=$mesin->real_jumlah;
                                $total +=$mesin->real_harga_total;
                            ?>
                                <tr>
                                    <td><div class="autocomplete" style="width:300px;">
                                            
                                            <input type="text" size="10" value="{{ $mesin->keterangan }}" id="r{{ $no }}" name="nama[]" onkeypress="jscaridt(this);" >
                                            <input type="hidden" size="2" id="r{{ $no }}_id" value="{{ $mesin->base_id }}" name="id[]">
                                            <input type="hidden" value="4" size="2" name="jns[]" id="r{{ $no }}_jns">
                                            
                                        </div>
                                       </td>
                                       <?php
                                       $jum=0;
                                       for($i=1;$i<=22;$i++){
                                           $hr="hari".$i;
                                       ?>
                                       <td>
                                           <input value="{{ $mesin->{$hr} }}" type="text" size="2"  onkeypress="validate(event);"  onblur="jshitung(this);" style="text-align:right;" name="md1[]" id="r{{ $no }}_d{{ $i }}">
                                       </td> 
                                       <?php
                                            $jum=$jum+$mesin->{$hr};
                                       }
                                       ?>
                                       <td>
                                           <input type="text" size="2"  readonly name="mtotal[]" id="r1_total">
                                           <input type="hidden" size="2" name="jum[]" id="r{{ $no }}_jum" value="{{ $jum }}">
                                            <input type="hidden" size="2" name="jumharga[]" id="r{{ $no }}_jumharga" value="{{ $jum*$mesin->estimasi_harga }}">
                                       </td> 
                                       <td>
                                            <!--<i onclick="jsdel(this);" id="r1_del" class="fa fa-trash"></i>-->
                                       </td>
                                        
                                </tr> 
                                <?php
                                $no++;
                            }
                                
                                ?>
                        
                        
        </table>
        </div>
    </div>
</div>
                <br>
                <br>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-4 col-form-label text-left">Total Jam </label>
                <div class="col-sm-6">

                    <input readonly type="text" maxlength="400" class="form-control" id="totaljam" name="totaljam" value="{{ number_format($jumtotal) }}" data-error="tess"  >
                </div>
            </div>
            <div class="form-group row">
                <label  for="inputName" class="col-sm-4 col-form-label text-left">Total Harga </label>
                <div class="col-sm-6">

                    <input readonly type="text" maxlength="400" class="form-control" id="totalharga" name="totalharga" value="{{ number_format($total) }}" data-error="tess"  >
                </div>
            </div>

<br>
<br>

    

<div class="form-group">
    <button type="submit" id="submit" class="btn btn-primary waves-effect waves-light" ><i class="fa fa-save" aria-hidden="true"></i></button>
    <button type="button" onclick="window.open('/admin-user/realisasi-list/0','_self')" class="btn btn-primary waves-effect waves-light" ><i class="fa fa-rotate-left" aria-hidden="true"></i></button>
    <a target="blank" href="{{ URL::to('/') }}/admin-user/pdf-realisasi/{{ $row->routingslip_no }}"><button type="button" class="btn btn-red" style="background-color: #c12e2a;color: white;font-weight: bold;" ><i class="ico icon-file-pdf" ></i></button></a>
    
</div>


</form>



