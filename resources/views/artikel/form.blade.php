@extends('layouts.app')

@section('title', 'Form Artikel')

@section('content')	
<div class="card">
  	<div class="card-header">
    	Form Artikel 
    	<a href="{{ route('artikel') }}" class="float-right">back</a>
  	</div>
  	<div class="card-body">
    	<form method="post" action="{{ $url }}" enctype="multipart/form-data">
    		{{ csrf_field() }}
    		<div class="form-group">
			    <label for="title">Title</label>
			    <input type="text" class="form-control" id="title" name="title" value="{{ old('title',$model->title) }}">
			</div>
    		<div class="form-group">
			    <label for="post">Artikel</label>
			    <textarea class="form-control" id="post" name="post" >{{ old('post',$model->post) }}</textarea>
			</div>
			<button type="submit" class="btn btn-primary pull-rigth">SUBMIT</button>
    	</form>
  	</div>
</div>
	
@endsection
@once
	@push('scripts')
	 <script src="https://cdn.ckeditor.com/4.15.0/standard-all/ckeditor.js"></script>
	<script type="text/javascript">
	    $(document).ready(function () {
	        CKEDITOR.replace('post', {
		      	uiColor: '#CCEAEE',
		      	filebrowserUploadUrl: "{{route('upload.image', ['_token' => csrf_token() ])}}",
        		filebrowserUploadMethod: 'form'
		    });
	    });
	</script>
	@endpush
@endonce