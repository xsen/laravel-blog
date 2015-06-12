@extends('home.layout')

@section('title'){{ $article->title.' | '.setting('site_name') }}@stop

@section('description'){{ setting('site_name').' | '.description_trim($article->body_html) }}@stop

@section('content')
<div class="col-sm-8 blog-main">
	<div class="blog-post">
		<h2 class="blog-post-title">{{ $article->title }}</h2>
		<div class="blog-post-meta">posted in <a href="/categories/{{ $article->category->slug }}">{{ $article->category->name }}</a> and tagged
		@foreach($article->tags as $key => $tag)
			<a href="/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
		@endforeach
		about {{ $article->created_at->diffForHumans() }}.</div>
		{!! $article->body_html !!}
		@unless(is_null($article->original) || empty($article->original))
			<p>original:<br>{{ $article->original }}</p>
		@endunless
		<p>link:<br>{{ setting('site_url').$article->slug }}</p>
	</div><!-- /.blog-post -->
	<hr>

	<div class="ds-thread" data-thread-key="{{ $article->slug }}" data-title="{{ $article->title }}" data-url="{{ setting('site_url').$article->slug }}"></div>

</div><!-- /.blog-main -->
@stop
