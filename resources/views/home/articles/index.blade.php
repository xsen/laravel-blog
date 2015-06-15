@extends('home.layout')

@section('title'){{ setting('site_name').' | '.setting('site_description') }}@stop

@section('header')
    <?php
        $params = [];

        if ( isset($title) )
        {
            $params['title'] = $title;
        }

        if ( isset($description) )
        {
            $params['description'] = $description;
        }
    ?>
    {!! view('home.header.default', $params) !!}
@stop

@section('content')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                @foreach($articles as $article)
                    <div class="post-preview">
                        <a href="/{{ $article->slug }}">
                            <h2 class="post-title">
                                {{ $article->title }}
                            </h2>
                        </a>
                        <p>
                            {!! str_limit($article->body_html, $limit = 300, $end = '...') !!}
                        </p>
                        <p class="post-meta">
                            {{trans('blog.post.in')}}: <a href="/categories/{{ $article->category->slug }}">{{ $article->category->name }}</a>
                            {{ $article->created_at->diffForHumans() }}.

                            {{trans('blog.post.tags')}}:
                            @foreach($article->tags as $key => $tag)
                                <a href="/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
                            @endforeach
                        </p>
                    </div>
                    <hr>
                @endforeach

                <!-- Pager -->
                <ul class="pager">
                    {!! $articles->render() !!}
                </ul>
            </div>
        </div>
    </div>

@stop
