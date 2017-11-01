@extends ('layouts.master')

@section ('content')
	<div class="blog-post">
		<h2 class="blog-post-title">Sample blog post</h2>
		<p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p>
		<p>This blog post shows a few different types of content that's supported and styled with Bootstrap. Basic typography, images, and code are all supported.</p>
	</div><!-- /.blog-post -->

	<nav class="blog-pagination">
		<a class="btn btn-outline-primary" href="#">Older</a>
		<a class="btn btn-outline-secondary disabled" href="#">Newer</a>
	</nav>
@endsection