
<script>
    function jstambah(){
        window.open('/admin-user/site-create','_self');
    }
    function jscari(){
        
        window.open('/admin-user/site-list/','_self');
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
        
        <td style="text-align: right;"><button type="button" onclick="jstambah();" class="btn btn-info btn-xs waves-effect waves-light">Tambah Data</button></td>
        
    </tr>
</table>


<br>
<br>
<div class="table-responsive"> 
<table id="example" class="table table-striped table-bordered display" style="width:100%">
        <thead>
            
                <tr>
                        <th>No</th>
                        <th>Nama Site</th>
                        
                        <th>Action</th>
                        
                </tr>
        </thead>

        <tbody>
            @php $no=1; @endphp
            @foreach($listdata as $data)
                <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->nama_site }}</a></td>
                        
                        <td>
                            <a  href="{{ URL::to('/') }}/admin-user/site-edit/{{ $data->id }}"><i title="edit" class="fa fa-edit" aria-hidden="true"></i></a>
                            
                            <a  onclick="return confirm('Yakin hapus data ?');" href="{{ URL::to('/') }}/admin-user/site-delete/{{ $data->id }}"><i title="delete" class="fa fa-trash" aria-hidden="true"></i></a>
                            
                        </td>
                        
                        
                </tr>
            @endforeach
                
        </tbody>
</table>
</div>
