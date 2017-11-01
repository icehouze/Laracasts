@extends ('layouts.master')
@section ('meta-title')
	{{ $post->title }}
@endsection

@section('content')
	<h1>{{ $post->title }}</h1>

	{{ $post->body }}
@endsection