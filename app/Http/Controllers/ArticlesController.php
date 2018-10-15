<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::latest('id')->paginate(9);
        return view('articles.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show', compact('article'));
    }

    public function author($name)
    {
        $articles = Article::where('author', $name)->paginate(9);
        return view('articles.author', compact('articles', 'name'));
    }
}
