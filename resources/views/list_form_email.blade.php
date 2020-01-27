
<br>
<br>
<div class="table-responsive"> 
<table id="example" class="table table-striped table-bordered display" style="width:100%">
        <thead>
            
                <tr>
                        <th>No</th>
                        <th>Doc Number</th>
                        <th>Email to</th>
                        <th>Action</th>
                        
                </tr>
        </thead>

        <tbody>
            @php $no=1; @endphp
            @foreach($listdata as $data)
                <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->base_doc_no }}</a></td>
                        <td>{{ $data->emailto }}</a></td>
                        
                        <td>
                            <a href="{{ URL::to('/') }}/admin-user/send-mail/{{ $data->id }}"><i title="send mail to {{ $data->emailto }}" class="fa fa-send" aria-hidden="true"> send mail</i></a>
                            
                        </td>
                        
                        
                </tr>
            @endforeach
                
        </tbody>
</table>
</div>
