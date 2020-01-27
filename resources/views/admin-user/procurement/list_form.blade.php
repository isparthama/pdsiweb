
<script>
    function jstambah(){
        window.open('/admin-user/inspeksi-create','_self');
    }
    function jscari(){
        
        window.open('/admin-user/procurement-list/'+$('#statusnya option:selected').val(),'_self');
    }
</script>
@if(Session::get('alert-success')!='')

    <div class="alert alert-success">
        <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
    </div>
    @php Session::put('alert-success','') @endphp
@endif
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


<br>
<br>
<div class="table-responsive"> 
<table id="example" class="table table-striped table-bordered display" style="width:100%">
        <thead>
            
                <tr>
                        <th>No</th>
                        <th>No serah terima</th>
                        <th>Nama Pelanggan</th>
                        <th>Nomor WO</th>
                        <th>Nomor Register</th>
                        <th>Nomor Routing Slip</th>
                        <th>Nomor Produksi</th>
                        <th>Tanggal</th>
                        <th>Status Dokumen</th>
                        <th>Action</th>
                        
                </tr>
        </thead>

        <tbody>
            @php $no=1; @endphp
            @foreach($listdata as $data)
                <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->serah_terima_no }}</a></td>
                        <td>{{ $data->nama_pelanggan }}</td>
                        <td>{{ $data->wo_no }}</td>
                        <td>{{ $data->register_no }}</td>
                        <td>{{ $data->routingslip_no }}</td>
                        <td>{{ $data->production_no }}</td>
                        <td>{{ date('Y-m-d',strtotime($data->production_tgl)) }}</td>
                        <td>{{ $data->form_sts_desc }}</td>
                        <td>
                            <a href="{{ URL::to('/') }}/admin-user/look-produksi/{{ $data->routingslip_no }}"><i title="edit" class="fa fa-search" aria-hidden="true"></i></a>
                            <a <?php echo $data->form_sts_desc=='1-Approve'?" style='display:none;' ":"";?> href="{{ URL::to('/') }}/admin-user/edit-procurement/{{ $data->routingslip_no }}"><i title="edit" class="fa fa-edit" aria-hidden="true"></i></a>
                            <a <?php echo $data->form_sts_desc=='1-Approve'?" style='display:none;' ":"";?> onclick="return confirm('Yakin Approve data ?');" href="{{ URL::to('/') }}/admin-user/approve-procurement/{{ $data->routingslip_no }}"><i title="approve" class="fa fa-check-square" aria-hidden="true"></i></a>
                            
                        </td>
                        
                        
                </tr>
            @endforeach
                
        </tbody>
</table>
</div>
