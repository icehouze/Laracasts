@extends ('layouts.master')
@section ('meta-title'){{ $task->body }}@endsection

@section ('content')
		<h1>{{ $task->body }}</h1>
@endsection
