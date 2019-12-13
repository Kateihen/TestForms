@extends('layouts.app')

@section('content')
	<h2>Please, fill in the feedback form:</h2>

	<form method="POST" action="/forms" enctype="multipart/form-data">
		@csrf

		<div>
			Topic:
			<br>
			<input type="text" name="topic" value="{{ old('title') }}" required>
		</div>

		<div>
			Message:
			<br>
			<textarea name="message" required>{{ old('message') }}</textarea>
		</div>

		<div>
			Attach a file:
			<input type="file" name="attached_file">
		</div>

		<div>
			<button type="submit">Send feedback</button>
		</div>

		@if ($errors->any())

			<div>
				<ul>
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>

		@endif

	</form>

	<br>

	<div>
		<form action="/logout" method="POST">
		@csrf
		<button value="submit">Logout</button>
		</form>
	</div>

@endsection
