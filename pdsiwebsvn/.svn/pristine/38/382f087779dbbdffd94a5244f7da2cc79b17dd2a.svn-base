<script>
    
    function jscari(){
        
        window.open('/admin-user/routing-slip-no-list/'+$('#statusnya option:selected').val(),'_self');
    }
</script>

<table width="100%">
    <tr>
        <td width='20%'>Status 
            <select id="statusnya">
            <option <?php echo $statusnya==0?"selected":"";?> value="0">Draft</option>
            <option <?php echo $statusnya==1?"selected":"";?> value="1">Approval</option>
            <option <?php echo $statusnya==2?"selected":"";?> value="2">Reject</option>
            <option  <?php echo $statusnya==3?"selected":"";?> value="3">All Status</option>

        </select>
            
        </td>
        <td ><a href="javascript:" onclick="jscari();"><button class="btn btn-primary waves-effect waves-light" ><i class="fa fa-search"></i></button></a></td>
        <td style="text-align: right;">
        
        </td>
        
    </tr>
</table>
@if(Session::get('alert-success')!='')

    <div class="alert alert-success">
        <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
    </div>
    @php Session::put('alert-success','') @endphp
@endif



<br>
<br>
<div class="table-responsive"> 
<table id="example" class="table table-striped table-bordered display" style="width:100%">
        <thead>
            
                <tr>
                        <th>No</th>
                        <th>Routing Slip No</th>
                        <th>Form No</th>
                        <th>Tanggal</th>
                        <th>Nama Pelanggan</th>
                        <th>Nomor WO</th>
                        <th>Nomor Register</th>
                        <th>Current Progress</th>
                        <th>Status Dokumen</th>
                        
                        
                </tr>
        </thead>

        <tbody>
            @php $no=1; @endphp
            @foreach($listdata as $data)
                <tr>
                        <td>{{ $no++ }}</td>
                        <td><a href="{{ URL::to('/') }}/admin-user/routing-slip-no/{{ $data->routingslip_no }}">{{ $data->routingslip_no }}</a></td>
                        <td>{{ $data->form_no }}</td>
                        <td>{{ date('Y-m-d',strtotime($data->tanggal)) }}</td>
                        <td>{{ $data->nama_pelanggan }}</td>
                        <td>{{ $data->wo_no }}</td>
                        <td>{{ $data->register_no }}</td>
                        <td>{{ $data->last_routingslip }}</td>
                        <td>{{ $data->routing_slip_sts_desc }}</td>
                        
                        
                        
                </tr>
            @endforeach
                
        </tbody>
</table>
</div>
