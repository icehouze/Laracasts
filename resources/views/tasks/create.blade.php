@extends ('layouts.master')
@section ('meta-title')
	Add a New Task
@endsection

@section('content')

	<h1>Add a New Task</h1>

	<form method="POST" action="/tasks">

		{{ csrf_field() }}

		<div class="form-group">
			<textarea class="form-control" id="body" name="body"></textarea>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Add Task</button>
		</div>

		@include ('layouts.errors')

	</form>

@endsection