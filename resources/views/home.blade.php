@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">

		@if(Session::has('success'))
		<div class="alert alert-success">{{ Session::get('success') }}</div>
		@endif

		@if(Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif


	</div>
</div>
@endsection
