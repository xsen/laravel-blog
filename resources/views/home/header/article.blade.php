<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('/img/post-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-heading">
                    <h1>{{$article->title}}</h1>
                    <h2 class="subheading"></h2>
                    <span class="meta">
                        {{trans('blog.post.in')}}: <a href="/categories/{{ $article->category->slug }}">{{ $article->category->name }}</a>
                        {{ $article->created_at->diffForHumans() }}.
                        {{trans('blog.post.tags')}}:
                        @foreach($article->tags as $key => $tag)
                            <a href="/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
                        @endforeach
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>