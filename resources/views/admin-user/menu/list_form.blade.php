
<script>
    function jstambah(){
        window.open('/admin-user/inspeksi-create','_self');
    }
    function jscari(){
        
        window.open('/admin-user/produksi-list/'+$('#statusnya option:selected').val(),'_self');
    }
</script>
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
                        <th>Nama Menu</th>
                        <th>Link</th>
                        <th>Icon</th>
                        
                </tr>
        </thead>

        <tbody>
            @php $no=1; @endphp
            @foreach($listdata as $data)
                <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->namamenu }}</a></td>
                        <td>{{ $data->links }}</td>
                        <td>{{ $data->icons }}</td>
                        
                        
                </tr>
            @endforeach
                
        </tbody>
</table>
</div>
