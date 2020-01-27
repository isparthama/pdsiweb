@extends('admin-user.template');
@section('title')
<h1>{{ $judul }}</h1>
@endsection
@section('content')

<script>
        function levelset(strInput){
            var strReplace = strInput.value;
            strInput.value=strInput.value.toLowerCase();
            strInput.value= strReplace.replace(/ /g, "_");
        }
    </script>
<form id="form1" enctype="multipart/form-data"  class="form1" method="post" action="{{ $row==""?route('role.store'):route('role.update') }}">
    {{ csrf_field() }}
    {{ $row==""?"":method_field('POST') }}

@if($row)
    <input id="id" type="hidden" name="id" value="{{ $row->id }}">
@endif
    <div class="form-group row">
        <label  for="inputName" class="col-sm-4 col-form-label text-left">Nama </label>
        <div class="col-sm-6">
            <input type="text" maxlength="100" class="form-control" id="name" name="name" value="{{ $row==""?"":$row->name }}" data-error="tess" placeholder=""  required >
        </div>
    </div> 
    <div class="form-group row">
        <label  for="inputName" class="col-sm-4 col-form-label text-left">Slug </label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="slug" name="slug" value="admin" readonly required >
        </div>
    </div> 
    <div class="form-group row">
        <label  for="inputName" class="col-sm-4 col-form-label text-left">Level </label>
        <div class="col-sm-6">
            <input type="text" maxlength="100" class="form-control" id="level" name="level" value="{{ $row==""?"":$row->level }}" data-error="tess" placeholder="" onkeyup="levelset(this)" required >
        </div>
    </div> 
    <div class="form-group row">
        <label  for="inputName" class="col-sm-4 col-form-label text-left">Deskripsi </label>
        <div class="col-sm-6">
            <textarea rows="4" maxlength="400" class="form-control" id="description" name="description" value="{{ $row==""?"":$row->description }}" data-error="tess" placeholder="" ></textarea>
        </div>
    </div> 
<div class="form-group">
    <input type="submit" name="btnsubmit" class="btn btn-primary waves-effect waves-light" value="Submit">
    <a name="btncancel" onclick="bntCancel()" class="btn btn-warning waves-effect waves-light">Cancel</a>
</div>
</form>
<script>
    document.getElementById("description").value = <?php echo $row==""?"''":"'".$row->description."'"; ?>;
function bntCancel(){
    window.open('/admin-user/config-role','_self');
}
</script>
@endsection