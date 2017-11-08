<div class="blog-post">
	<h2 class="blog-post-title">
		<a href="/posts/{{ $post->id }}">
			{{ $post->title }}
		</a>
	</h2>
	<p class="blog-post-meta">
		{{-- Now let's include the author (user) name --}}
		by {{ $post->user->name }}
		{{-- Format date using Carbon: http://carbon.nesbot.com/docs/ --}}
		on {{ $post->created_at->toFormattedDateString() }}
	</p>

	{{ $post->body }}
	
	@if (count($post->tags))
		<ul>
			@foreach ($post->tags as $tag)
				<li>
					<a href="/posts/tags/{{ $tag->name }}">{{ $tag->name }}</a>
				</li>
			@endforeach
		</ul> 
	@endif

</div><!-- /.blog-post -->