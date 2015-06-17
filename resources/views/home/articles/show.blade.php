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

            @if (setting('comment_on'))
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <!-- Put this script tag to the <head> of your page -->
                        <script type="text/javascript" src="//vk.com/js/api/openapi.js?116"></script>

                        <script type="text/javascript">
                            VK.init({apiId: 4961783, onlyWidgets: true});
                        </script>

                        <!-- Put this div tag to the place, where the Comments block will be -->
                        <div id="vk_comments"></div>
                        <script type="text/javascript">
                            VK.Widgets.Comments("vk_comments", {limit: 10, width: "680", attach: "*"});
                        </script>
                    </div>
                </div>
            @endif
        </div>
    </article>

@stop
