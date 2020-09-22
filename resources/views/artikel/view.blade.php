@extends('layouts.app')

@section('title', 'Artikel')

@section('content')	
<div class="card">
  	<div class="card-header">
    	{{ $model->title }} 
  	</div>
  	<div class="card-body">
    	{{ $render }}
  	</div>
</div>
	
@endsection