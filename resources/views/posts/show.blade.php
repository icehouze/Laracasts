@extends ('layouts.master')
@section ('meta-title')
	{{ $post->title }}
@endsection

@section('content')
	<h1>{{ $post->title }}</h1>

	<p class="blog-post-meta">
		{{-- Now let's include the author (user) name --}}
		by {{ $post->user->name }}
		{{-- Format date using Carbon: http://carbon.nesbot.com/docs/ --}}
		on {{ $post->created_at->toFormattedDateString() }}
	</p>

	{{ $post->body }}

	<hr>

	<div class="comments">
		<ul class="list-group">
		@foreach ($post->comments as $comment)
			<li class="list-group-item">
				<strong>
					{{ $comment->created_at->diffForHumans() }} <br>
				</strong>
				{{ $comment->body }}
			</li>
		@endforeach
		</ul>
	</div>

	<hr>
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Leave a Comment</h4>

			<form action="/posts/{{ $post->id }}/comments" method="POST">
				{{ csrf_field() }}
				<div class="form-group">
					<textarea name="body" id="body" class="form-control" required></textarea>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Add Comment</button>
				</div>
			</form>

			@include ('layouts.errors')

		</div>
	</div>

@endsection