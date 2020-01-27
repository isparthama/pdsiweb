<script language="javascript" type="text/javascript">
        (function() {
            $('.form1').ajaxForm({
                beforeSubmit: function() {
                    $('#submit').prop('disabled', true);
                },
                complete: function(xhr) {
                    $('#submit').prop('disabled', false);
                    window.open('{{ URL::to('/') }}/admin-user/masterpersonil-list/','_self');
                        
                        
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

<form id="form1" enctype="multipart/form-data"  class="form1" method="post" action="{{ $row==""?URL::to('/').'/admin-user/masterpersonil-store':URL::to('/').'/admin-user/masterpersonil-update' }}">
    {{ csrf_field() }}
<ul class="nav nav-tabs" id="myTabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Personil</a></li>
            
            
    </ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade active in" role="tabpanel" id="home" aria-labelledby="home-tab">    

        <div class="form-group row">
            <label  for="inputName" class="col-sm-4 col-form-label text-left">Nama Personil </label>
            <div class="col-sm-6">
                <input type="hidden" name="id" value="{{ $row==""?"":$row->id }}">
                <input type="text" maxlength="400" class="form-control" id="nama_personil" name="nama_personil" value="{{ $row==""?"":$row->nama_personil }}" data-error="tess"    >
            </div>
        </div>
        <div class="form-group row">
            <label  for="inputName" class="col-sm-4 col-form-label text-left">Jabatan</label>
            <div class="col-sm-6">
                <select class="form-control" name="jabatan_id">
                <?php
                if($row==""){
                    foreach ($listjabatan as $jabatan){
                        echo "<option value='".$jabatan->id."'>".$jabatan->nama_jabatan."</option>";
                    }
                }else{
                    foreach ($listjabatan as $jabatan){
                        echo "<option ".($jabatan->id==$row->jabatan_id?"selected":"")." value='".$jabatan->id."'>".$jabatan->nama_jabatan."</option>";
                    }
                }
                
                
                ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label  for="inputName" class="col-sm-4 col-form-label text-left">site</label>
            <div class="col-sm-6">
                <select class="form-control" name="site_id" id="site_id">
                <?php
                if($row==""){
                    foreach ($listsite as $site){
                        echo "<option value='".$site->id."'>".$site->nama_site."</option>";
                    }
                }else{
                    foreach ($listsite as $site){
                        echo "<option ".($site->id==$row->site_id?"selected":"")." value='".$site->id."'>".$site->nama_site."</option>";
                    }
                }
                
                
                ?>
                </select>
            </div>
        </div>
        <script>
            function jstambah(){
                $('#tbfile tr:last').after('<tr><td><input type="file" name="sertifikat[]" ><input type="hidden" name="srtf[]" value="">  </td></tr>');
            }
        </script>
        <div class="form-group row">
            <label  for="inputName" class="col-sm-4 col-form-label text-left">File sertifikat</label>
            <div class="col-sm-6">
                
                <table id="tbfile" width="100%">
                    <?php
                    if($row==""){
                    echo '<tr>
                        <td><input type="file" name="sertifikat[]" >
                            <input type="hidden" name="srtf[]" value=""> 
                        </td>
                    </tr>';
                    }else{
                        echo '<tr>
                        <td><input type="file" name="sertifikat[]" >
                            <input type="hidden" name="srtf[]" value=""> 
                        </td>
                    </tr>';
                        foreach ($listsertifikat as $sertifikat){
                            echo '<tr>
                                    <td><input type="file" name="sertifikat[]" >
                                        <input type="hidden" name="srtf[]" value=""> 
                                        ';
                                        ?>
                                        <a target="blank" href="{{ URL::to('/') }}{{ $sertifikat->sertifikat }}" ><i style="font-size:20px;" class="fa fa-image"></i> {{ $sertifikat->sertifikat }}</a>
                                        <?php
                            echo '
                                    </td>
                                </tr>';
                        }
                    }
                    ?>
                </table>
                <input type="button" class="form-control" value=" + Tambah File " onclick="jstambah()">
            </div>
        </div>
        
        
        
        
    </div>
    
</div>
    <br>
    <br>
    

<div class="form-group">
    <button type="submit" id="submit" class="btn btn-primary waves-effect waves-light" ><i class="fa fa-save" aria-hidden="true"></i></button>
    
    <button type="button" onclick="window.open('/admin-user/masterpersonil-list','_self')" class="btn btn-primary waves-effect waves-light" ><i class="fa fa-rotate-left" aria-hidden="true"></i></button>
    
</div>

</form>




