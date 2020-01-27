
<script>
    function jstambah(){
        window.open('/admin-user/jabatan-create','_self');
    }
    function jscari(){
        
        window.open('/admin-user/jabatan-list/'+$('#statusnya option:selected').val(),'_self');
    }
</script>

<table width="100%">
    <tr>
        
        <td style="text-align: right;">
            <!--<button onclick="jstambah();" class="btn btn-primary waves-effect waves-light" >Tambah</button>-->
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
                        <th>Nama Jabatan</th>
                        <!--<th>Action</th>-->
                        
                </tr>
        </thead>

        <tbody>
            @php $no=1; @endphp
            @foreach($listdata as $data)
                <tr>
                        <td>{{ $no++ }}</td>
                        <td><a href="{{ URL::to('/') }}/admin-user/role-jabatan/{{ $data->id }}">{{ $data->nama_jabatan }}</a></td>
<!--                        <td>
                            <a href="{{ URL::to('/') }}/admin-user/edit-jabatan/{{ $data->id }}"><i title="edit" class="fa fa-edit" aria-hidden="true"></i></a>
                        </td>-->
                        
                        
                </tr>
            @endforeach
                
        </tbody>
</table>
</div>
