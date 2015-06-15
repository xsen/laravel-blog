<?php namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Tag;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($slug)
    {
        $page_size = setting('page_size');

        $tag = Tag::findBySlug($slug);

        $title = 'Тег - '.$tag->name;
        $description = " ";

        $articles = \App\Article::with('tags', 'category')->whereHas('tags', function ($query) use ($slug) {
            $query->whereSlug($slug);
        })->orderBy('id', 'desc')->simplePaginate($page_size);

        return view('home.articles.index', compact('articles', 'title', 'description'));
    }
}
