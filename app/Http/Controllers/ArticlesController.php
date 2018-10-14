<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::latest('id')->paginate(3);
        return view('articles.index', compact('articles'));
    }

    public function show()
    {

        return view('articles.show');
    }
}
