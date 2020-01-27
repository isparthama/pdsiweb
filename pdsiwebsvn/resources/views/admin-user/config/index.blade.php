@extends('admin-user.template');
@section('title')
<h1>Config Role User</h1>
@endsection
@section('content')

<script>
    function jstambahrole(){
        window.open('/admin-user/config-role/tambah-role','_self');
    }

    function btnDelete(id){
        swal({
            title: 'Are you sure?',
            text: "It will permanently deleted !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            closeOnConfirm: false,
            confirmButtonText: 'Yes, delete it!'
        }, function(val) {
            if(val){
                $.post('/admin-user/config-role/delete', {id: id, _token: '{{csrf_token()}}'}, function(data){
                    if(data == 'alert-success'){
                        location.reload();
                    } else {
                        swal({
                            title: 'Failed!',
                            text: 'Failed to delete data.',
                            icon: 'error',
                            button: "Ok",
                        });
                    }
                });
            }
        });
    }
</script>
@if(Session::has('alert-success'))
    <div class="alert alert-success">
        <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
    </div>
@endif

@if(Session::has('alert-error'))
    <div class="alert alert-error">
        <strong>{{ \Illuminate\Support\Facades\Session::get('alert-error') }}</strong>
    </div>
@endif

<button type="button" style="margin-bottom:10px;" onclick="jstambahrole();" class="btn btn-info btn-xs waves-effect waves-light">Tambah Role Baru</button>
<div class="table-responsive"> 
<table id="example" class="table table-striped table-bordered display" style="width:100%">
        <thead>
                <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Slug</th>
                        <th>Level</th>
                        <th>Deskripsi</th>
                        
                        <th>Action</th>
                        
                </tr>
        </thead>

        <tbody>
            @if(count($listdata) > 0)

                @php $no=1; @endphp
                @foreach($listdata as $data)
                    <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->slug }}</td>
                            <td>{{ $data->level }}</td>
                            <td>{{ $data->description }}</td>
                            <td>
                                <a href="config-role/edit/{{\Hashids::encode($data->id)}}"><i class="ti-pencil" style="color: blue;"></i></a>
                                @if (Session::get('role_level') == 'superadmin' || Session::get('role_level') == 'kepala_dinas')
                                    <a href="#" onclick="btnDelete(<?=$data->id?>)" ><i class="ti-trash" style="color: red;"></i></a>
                                @endif
                            </td>
                    </tr>
                @endforeach
            @else
                    <tr>
                        <td colspan="10" style="text-align:center">Empty Role</td>
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
@endsection