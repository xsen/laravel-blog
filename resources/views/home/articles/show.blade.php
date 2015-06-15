@extends('home.layout')

@section('title'){{ $article->title.' | '.setting('site_name') }}@stop

@section('description'){{ setting('site_name').' | '.description_trim($article->body_html) }}@stop

@section('header')
    {!! view('home.header.article', ['article' => $article]) !!}
@stop

@section('content')
    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    {!! $article->body_html !!}
                </div>
            </div>
        </div>
    </article>
@stop
