@extends ('layouts.master')

@section('content')
	<h1>Sign in</h1>

	<form action="/login" method="POST">
		{{ csrf_field() }}

		<div class="form-group">
			<label for="email">Email:</label>
			<input type="email" class="form-control" id="email" name="email" required>
		</div>

		<div class="form-group">
			<label for="password">Password:</label>
			<input type="password" class="form-control" id="password" name="password" required>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Sign in</button>
		</div>

		@include('layouts.errors')

	</form>
@endsection