<form id="form1" enctype="multipart/form-data"  class="form1" method="post" action="{{ $row==""?route('petugas-management.registrasi'):route('petugas-management.update') }}">
    {{ csrf_field() }}
    {{ $row==""?"":method_field('POST') }}
@if($row)
    <input id="id" type="hidden" name="id" value="{{ $row->id }}">
@endif
<?php 
if(Session::get('role_level') == 'superadmin'){
    $statusReadonly = '';
}else {
    $statusReadonly = 'readonly disabled';
}
?>
    <div class="form-group row">
        <label  for="inputName" class="col-sm-4 col-form-label text-left">Nama </label>
        <div class="col-sm-6">
            <input type="text"  class="form-control" id="fullname" name="fullname" value="{{ $row==""?"":$row->fullname }}" data-error="tess" placeholder=""  required >
        </div>
    </div> 
    <div class="form-group row">
        <label  for="inputName" class="col-sm-4 col-form-label text-left">Username </label>
        <div class="col-sm-6">
            <input type="text"  class="form-control" id="nrk" name="username" value="{{ $row==""?"":$row->username }}" {{$statusReadonly}} required >
        </div>
    </div> 
    <div class="form-group row">
        <label  for="inputName" class="col-sm-4 col-form-label text-left">Password </label>
        <div class="col-sm-6">
            <input type="password"  class="form-control" id="password" name="password" value="{{ $row==""?"":"" }}" {{$statusReadonly}} {{ $row==""?"required":"" }} >
        </div>
    </div> 
    <?php
    if($row==""){
    ?>
    <script>
    function jsconfirm(){
        if($('#password').val()!=$('#confirmpassword').val()){
            $('#confirmpassword').val('');
            $('#confirmpassword').focus();
            alert('Confirm Password harus sama');return false;
        }
    }    
    </script>
    <div class="form-group row">
        <label  for="inputName" class="col-sm-4 col-form-label text-left">Confirm Password </label>
        <div class="col-sm-6">
            <input type="password"  onblur="jsconfirm();" class="form-control" id="confirmpassword" name="confirmpassword"  {{$statusReadonly}}  required >
        </div>
    </div> 
    <?php
    }
    ?>

    <div class="form-group row">
        <label  for="inputName" class="col-sm-4 col-form-label text-left">Email </label>
        <div class="col-sm-6">
            <input type="email" class="form-control" id="email" name="email" value="{{ $row==""?"":$row->email }}" {{$statusReadonly}}  required >
        </div>
    </div> 
<!--    <div class="form-group row">
        <label  for="inputName" class="col-sm-4 col-form-label text-left">Slug </label>
        <div class="col-sm-6">-->
            <input type="hidden" maxlength="100" class="form-control" id="slug" name="slug" value="admin" readonly required >
<!--        </div>
    </div> -->
    <div class="form-group row">
        <label  for="inputName" class="col-sm-4 col-form-label text-left">Role Level </label>
        <div class="col-sm-6">
            <select name="id_role"  class="form-control">
            <?php
            foreach ($select_roles as $roles){
                if($row!=''){
                    if($roles->level==$row->role_id){
                        echo "<option selected value='".$roles->id."'>".$roles->level."</option>";
                    }else{
                        echo "<option value='".$roles->id."'>".$roles->level."</option>";
                    }
                }else{
                    echo "<option value='".$roles->id."'>".$roles->level."</option>";
                }
            }
            ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label  for="inputName" class="col-sm-4 col-form-label text-left">Jabatan </label>
        <div class="col-sm-6">
            <select name="jabatanid"  class="form-control">
            <?php
            foreach ($listjabatan as $jabatan){
                if($row!=''){
                    if($jabatan->id==$row->jabatan_id){
                        echo "<option selected value='".$jabatan->id."'>".$jabatan->nama_jabatan."</option>";
                    }else{
                        echo "<option value='".$jabatan->id."'>".$jabatan->nama_jabatan."</option>";
                    }
                }else{
                    echo "<option value='".$jabatan->id."'>".$jabatan->nama_jabatan."</option>";
                }
            }
            ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label  for="inputName" class="col-sm-4 col-form-label text-left">Site </label>
        <div class="col-sm-6">
            
            
            <?php
            if($row==""){
                foreach ($listsite as $site){
                    echo '<input type="checkbox" name="siteid[]" value="'.$site->id.'">'.$site->nama_site."<br>";
                }
            }else{
                foreach ($listsite as $site){
                    $sql="select count(*)jumlah from user_site where username='".$row->username."' and site_id=".$site->id;
                    $num=collect(DB::select($sql))->first()->jumlah;
                    echo '<input type="checkbox" '.($num>0?'checked':'').' name="siteid[]" value="'.$site->id.'">'.$site->nama_site."<br>";
                }
                
            }
            ?>
            
        </div>
    </div>

    @if($row)
    <div class="form-group row">
            <label for="inputName" class="col-sm-4 col-form-label text-left">Aktif </label>
            <div class="col-sm-6">
                <select name="active"  class="form-control">
                <?php
                foreach ($select_active as $active){
                        if($active->id==$row->active){
                            echo "<option selected value='".$active->id."'>".$active->desc."</option>";
                        }else{
                            echo "<option value='".$active->id."'>".$active->desc."</option>";
                        }
                }
                ?>
                </select>
            </div>
        </div>
    @endif
<div class="form-group">
    <input type="submit" name="btnsubmit" class="btn btn-primary waves-effect waves-light" value="Submit">
    <a name="btncancel" onclick="bntCancel()" class="btn btn-warning waves-effect waves-light">Cancel</a>
</div>
</form>
<script>
    document.getElementById("description").value = <?php echo $row==""?"''":"'".$row->description."'"; ?>;
function bntCancel(){
    window.open('/admin-user/petugas-management','_self');
}
</script>
