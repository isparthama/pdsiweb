<!-- include summernote css/js-->
@extends('admin-user.template');
@section('title')
<h1>Output Management</h1>
@endsection
@section('script')
    {{--<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />--}}
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <link href="{{ asset('assets/plugin/summernote/summernote.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/plugin/summernote/summernote.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300,                 // set editor height
                width: "100%",                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                dialogsInBody: true,
                callbacks: {
                    onMediaDelete : function(target) {
                        var editor = $('.summernote').summernote('code');
                        deleteFile(target[0].src,editor);
                    }
                }
            });
            function deleteFile(src,editor) {
                $.ajax({
                    data: {src : src , _token : "{{ csrf_token() }}", idOutput : "{{ $listdata['output']->id }}", template : editor},
                    type: "POST",
                    url: "{{ route('output.deleteImage') }}", // replace with your url
                    cache: false,
                    success: function(resp) {
                        console.log(resp);
                    }
                });
            }
        });
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
        <form method="POST" action="{{ route('output.update',$listdata['output']->id) }}">
            {{ csrf_field() }}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <strong>Nama </strong>
                        <input type="text" maxlength="100" class="form-control" id="fullname" name="name" value="{{ $listdata['output']->name }}" placeholder=""  required>
                        </div>
                    </div> <!-- End Col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <br/>
                            <!-- /.switch -->
                            <div class="switch success"><input type="checkbox" name="active" class="form-control" {{ ($listdata['output']->active == true) ? "checked" : "" }} id="switch-3"><label for="switch-3">Active</label></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <strong>Content</strong>
                    <textarea class="form-control summernote" name="content">{{ $listdata['output']->template }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('output.index') }}" class="btn btn-danger">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
