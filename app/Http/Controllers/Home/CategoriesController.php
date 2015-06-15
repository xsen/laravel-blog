<?php namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Category;

class CategoriesController extends Controller
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
        $category = Category::findBySlug($slug);
        $page_size = setting('page_size');

        $title = 'Категория - '.$category->name;
        $description = " ";
        $articles = \App\Article::with('tags', 'category')->whereHas('category', function ($query) use ($slug) {
            $query->whereSlug($slug);
        })->orderBy('id', 'desc')->simplePaginate($page_size);

        return view('home.articles.index', compact('articles', 'title', 'description'));
    }
}
