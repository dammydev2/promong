@extends('layouts.app')

@section('content')
<div class="container">
	@if(Session::has('success'))
	<div class="alert alert-success">{{ Session::get('success') }}</div>
	@endif
	<div class="row">

		@if (Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif

		<div class="col-lg-4"></div>

		<div class="col-lg-4 panel panel-primary">

			<div class="panel-heading">{{ Session::get('tourType') }} Code </div>
			<div class="panel-body">
				
				<table class="table table-bordered">
					<tr>
						<th>Tour Type</th>
						<th>Code Type</th>
						<th>Code</th>
						<th>Promo Starts</th>
						<th>Promo Ends</th>
						<th>Verified By</th>
						<th>Verifier Phone</th>
						<th>Verifier Email</th>
						<th></th>
					</tr>
					@foreach($result as $results)
					<tr>
						<td>{{ $results->type }}</td>
						<td>{{ $results->subtype }}</td>
						<td>{{ $results->code }}</td>
						<td>{{ $results->date_start }}</td>
						<td>{{ $results->date_end }}</td>
						<td>
							@if($results->verified_by === 'to be verified')
							{{ '' }}
							@else 
							{{ $results->verified_by }}
							@endif
						</td>
						<td>
							@if($results->verify_phone === 'to be verified')
							{{ '' }}
							@else 
							{{ $results->verify_phone }}
							@endif
						</td>
						<td>
							@if($results->verify_email === 'to be verified')
							{{ '' }}
							@else 
							{{ $results->verify_email }}
							@endif
						</td>
						<td><a href="{{ url('codeDelete/'.$results->id) }}"><i class="fa fa-trash btn btn-danger"></i></a></td>
					</tr>
					@endforeach
				</table>
				{{ $result->links() }}

			</div>

		</div>


	</div>
</div>
@endsection
