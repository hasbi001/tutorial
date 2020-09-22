@extends('layouts.app')

@section('title', 'List Artikel')

@section('content')	
	<div class="card">
	  <div class="card-header">
	    List Artikel 
	    <a href="{{ route('artikel.create') }}">Add</a>
	  </div>
	  <div class="card-body">
	    <table id="list-artikel-table" class="table table-striped" style="width:100%">
			<thead>
				<tr>
					<td>Name</td>
					<td>Created At</td>
					<td>Action</td>
				</tr>
			</thead>
		</table>
	  </div>
	</div>
	
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
        	$('#list-artikel-table').DataTable({
		        processing: true,
		        serverSide: true,
		        ajax: '{{ route("artikel.load") }}',
		        columns: [
		            {data: 'title', name: 'title'},
		            {data: 'created_at', name: 'created_at'},
		            {data: 'action', name: 'action', orderable: false, searchable: false}
		        ]
		    });
        });
    </script>
@endpush