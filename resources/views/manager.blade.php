@extends('layouts.app')

@section('content')
	
	<h1>Feedbacks</h1>


	@foreach($feedbacks as $feedback)
		<ul>
			<li>
				<b>Id:</b> {{ $feedback->id }}
				<br>
				<b>Topic:</b> {{ $feedback->topic }}
				<br>
				<b>User's Name:</b> {{ $feedback->user_name }}
				<br>
				<b>User's Email:</b> {{ $feedback->user_email }}
				<br>
				<b>Message:</b>
				<br>
				<p>{{ $feedback->message }}</p>
				<br>

				@if($feedback->filename)
					<b>Attached File:</b> 
					<form method="GET" action="/{{$feedback->filename}}">
						<button value="submit">Download</button>
					</form>
				@endif
			</li>
		</ul>
		<hr>
	@endforeach

	{{ $feedbacks->links() }}

	<div>
		<form action="/logout" method="POST">
		@csrf
		<button value="submit">Logout</button>
		</form>
	</div>
@endsection