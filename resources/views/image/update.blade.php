@extends('layouts.master')

@section('content')

@foreach ( $messages as $msg )
<div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Information</h3>
		</div>
		<div class="panel-body">
			{{ $msg }}
		</div>
	</div>
</div>
@endforeach

@stop