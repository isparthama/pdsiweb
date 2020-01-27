<script>
    function jstambahrole(){
        window.open('/admin-user/petugas-management/tambah','_self');
    }
</script>

<button type="button" style="margin-bottom:10px;" onclick="jstambahrole();" class="btn btn-info btn-xs waves-effect waves-light">Registrasi Petugas</button>
<div class="table-responsive"> 
<table id="example" class="table table-striped table-bordered display" style="width:100%">
        <thead>
                <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>NRK</th>
                        <th>Role</th>
                        <th>Status</th>
                        
                        <th>Action</th>
                        
                </tr>
        </thead>

        <tbody>
            @if(count($listdata) > 0)

                @php $no=1; @endphp
                @foreach($listdata as $data)
                @php
                    $data->active==1?$status='<span class="label label-success">Aktif</span>':$status='<span class="label label-warning">Tidak Aktif</span>'
                @endphp
                    <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->fullname }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->username }}</td>
                            <td>{{ $data->role_slug }} - {{ $data->role_level }}</td>
                            <td>{!! $status !!}</td>
                            <td>
                                <a href="petugas-management/edit/{{\Hashids::encode($data->id)}}"><i class="ti-settings" style="color: blue;"></i></a>
                            </td>
                    </tr>
                @endforeach
            @else
                    <tr>
                        <td colspan="10" style="text-align:center">Pelatihan Belum Tersedia Saat Ini</td>
                    </tr>
            @endif
        </tbody>
</table>
</div>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
