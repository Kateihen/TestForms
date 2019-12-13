@extends('layouts.app')

@section('content')
	<h1>IT WORKS</h1>

	<div>
		<form action="/logout" method="POST">
		@csrf
		<button value="submit">Logout</button>
		</form>
	</div>
@endsection