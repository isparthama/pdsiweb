
<script>
    function jstambah(){
        window.open('/admin-user/routing-slip-no/create','_self');
    }
    function jscari(){
        
        window.open('/admin-user/routing-slip-no/'+$('#norouting').val(),'_self');
    }
    function jstampil(jdl,id,act,idnya,nomor,labelnya){

        var param={};
        param['_token']='{{ csrf_token() }}';
        param['formname']=id;
        param['id']=idnya;
        
        
        $('#myModalLabel').html('');
        $('.modal-body').html('');
        $.post("{{ URL::to('/') }}/showmodal", param,function(data){
            $('#myModalLabel').html(jdl);
            $('.modal-body').html(data);
            $('#idx').val(idnya);
            $('#nomor').val(nomor);
            $('#labelnya').html(labelnya);
            
            
            $('#formmodal').attr('action','{{ URL::to('/') }}/admin-user/'+act);

          });
    }
</script>

<script language="javascript" type="text/javascript">
        (function() {
             $('.formmodal').ajaxForm({
                beforeSubmit: function() {
                },
                complete: function(xhr) {
                        //alert($.trim(xhr.responseText));
                        var x=$.trim(xhr.responseText).split('~');
                        //dt=$.trim(xhr.responseText).split('~');
                        //$('#boostrapModal-1').css('display','none');
                        $('#sp'+x[0]).html(x[1]);
                        $('#boostrapModal-1').hide();
                        $('.modal-backdrop').hide();
                        //window.open('/admin-user/routing-slip-no/'+$.trim(xhr.responseText),'_self');
                        
                        
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

@if(Session::get('alert-success')!='')

    <div class="alert alert-success">
        <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
    </div>
    @php Session::put('alert-success','') @endphp
@endif
<table>
    <tr>
        <td>Routing No </td>
        
        <td style="padding: 10px;">
      <input type="text" class="form-control" value="{{ $norouting }}" id="norouting" size="10">
            
        </td>
        <!--<td ><a href="javascript:" onclick="jscari();"><button class="btn btn-primary waves-effect waves-light" ><i class="fa fa-search"></i></button></a></td>-->
    </tr>
    <tr>
        <td>Nomor WO </td>
        
        <td style="padding: 10px;">
            <input type="text" readonly class="form-control" value="<?php echo $nomorwo;?>">
              
        </td>
        <td></td>
    </tr>
    <tr>
        <td>Nomor register </td>
        
        <td style="padding: 10px;">
            <input type="text" readonly class="form-control" value="{{ $register }}">
            
        </td>
        <td></td>
    </tr>
    <tr>
        <td>user </td>
        
        <td style="padding: 10px;">
            <input type="text" readonly class="form-control" value="{{ $user }}">
            
        </td>
        <td></td>
    </tr>
    
    
</table>

<br>
<br>
<div class="table-responsive"> 
<table id="examplex" class="table table-striped table-bordered display" style="width:100%">
        <thead>
            
                <tr>
                        <th>No</th>
                        <th>Tahap</th>
                        <th>PIC</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Keluar</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                        
                </tr>
        </thead>

        <tbody>
            @php $no=1; @endphp
            @foreach($listdata as $data)
            <tr <?php echo $data->routing_step_status==1?'style="background-color: #f6ffe8;"':($data->routing_step_status==0?'style="background-color: white;"':'style="background-color: #94b560;"')?> >
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->routingslip_name }}</a></td>
                        <td>{{ $data->nama_jabatan }}</td>
                        <td>{{ $data->tanggal_masuk }}</td>
                        <td>{{ $data->tanggal_keluar }}</td>
                        <td><span id="sp{{ $data->routing_slip_id }}">{{ $data->keterangan }}</span></td>
                        <td>
                            <a data-toggle="modal" data-target="#boostrapModal-1" onclick="jstampil('Form Keterangan','routing','saverouting','{{ $data->routingslip_no."~".$data->routing_slip_id }}','{{ $data->routingslip_no }}','{{ $data->routing_slip_id.". ".$data->routingslip_name }}');" href="javascript:"><i title="edit" class="fa fa-edit" aria-hidden="true"></i></a>
                            
                        </td>
                        
                        
                </tr>
            @endforeach
                
        </tbody>
</table>
</div>
