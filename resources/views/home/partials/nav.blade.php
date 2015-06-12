<div class="blog-masthead">
	<div class="container">
		<nav class="blog-nav">
			<a class="blog-nav-item active" href="/">{{trans('blog.sidebar.blog')}}</a>
			<a class="blog-nav-item" href="/articles">{{trans('blog.sidebar.articles')}}</a>
			<a class="blog-nav-item" href="/about">{{trans('blog.sidebar.about')}}</a>
			@if (Auth::guest())
				<a class="blog-nav-item pull-right" href="/login">Login</a>
			@else
				<a class="blog-nav-item pull-right" href="/admin/index" target="_blank">Dashboard</a>
			@endif
		</nav>
	</div>
</div>
