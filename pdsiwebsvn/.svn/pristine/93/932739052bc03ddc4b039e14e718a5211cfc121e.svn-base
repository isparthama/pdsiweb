<!-- include summernote css/js-->
@extends('admin-user.template');
@section('title')
<h1>Output Management</h1>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endsection
@section('content')

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
<br/>
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('output.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
        <br/>
        <br/>
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered display" style="width:100%">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @if(count($listdata['data']) > 0)
                    @php $i=1; @endphp
                    @foreach($listdata['data'] as $row)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $row['name'] }}</td>
                            <td class="text-center">{!! ($row['active']) ? '<label class="label label-success"><i class="fa fa-check"></i> Aktif </label>' : '<label class="label label-danger"><i class="fa fa-ban"></i> Tidak Aktif </label>' !!}</td>
                            <td>{{ \Carbon\Carbon::parse($row['updated_at'])->format('d M Y H:i') }}</td>
                            <td class="text-center"><a href="/admin-user/output/edit/{{ $row['id'] }}" class="btn btn-xs btn-warning">Detail</a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
