<script language="javascript" type="text/javascript">
        (function() {
            $('.form1').ajaxForm({
                beforeSubmit: function() {
                    $('#submit').prop('disabled', true);
                },
                complete: function(xhr) {
                    $('#submit').prop('disabled', false);
                    window.open('{{ URL::to('/') }}/admin-user/site-list/','_self');
                        
                        
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

<form id="form1" enctype="multipart/form-data"  class="form1" method="post" action="{{ $row==""?URL::to('/').'/admin-user/site-store':URL::to('/').'/admin-user/site-update' }}">
    {{ csrf_field() }}
<ul class="nav nav-tabs" id="myTabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Site</a></li>
            
            
    </ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade active in" role="tabpanel" id="home" aria-labelledby="home-tab">    

        <div class="form-group row">
            <label  for="inputName" class="col-sm-4 col-form-label text-left">Nama Site </label>
            <div class="col-sm-6">
                <input type="hidden" name="id" value="{{ $row==""?"":$row->id }}">
                <input type="text" maxlength="400" class="form-control" id="nama_site" name="nama_site" value="{{ $row==""?"":$row->nama_site }}" data-error="tess"    >
            </div>
        </div>
        
    </div>
    
</div>
    <br>
    <br>
    

<div class="form-group">
    <button type="submit" id="submit" class="btn btn-primary waves-effect waves-light" ><i class="fa fa-save" aria-hidden="true"></i></button>
    
    <button type="button" onclick="window.open('/admin-user/site-list','_self')" class="btn btn-primary waves-effect waves-light" ><i class="fa fa-rotate-left" aria-hidden="true"></i></button>
    
</div>

</form>




